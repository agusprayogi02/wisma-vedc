<?php

namespace App\Filament\Resources\ReservationResource\RelationManagers;

use App\Forms\Components\CheckboxList;
use App\Models\BoardingHouse;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Room;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CustomersRelationManager extends RelationManager
{
    protected static string $relationship = 'customers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)->label('Nama Lengkap'),
                Select::make('room_id')
                    ->label('Ruang')
                    ->relationship('room', 'code', modifyQueryUsing: function (Builder $query) {
                        if (!empty($this->ownerRecord->boardingHouses)) {
                            $query->whereIn('boarding_house_id', $this->ownerRecord->boardingHouses->pluck('id')->toArray());
                        }
                    })
                    ->rules([
                        fn(Get $get, Component $component): Closure => function (string $attr, $value, Closure $fail) use ($get, $component) {
                            $room = Room::find($value)->with('roomType')->first();
                            $cust = Customer::where([
                                ['reservation_id', '=', $get('reservation_id')],
                                ['room_id', '=', $value],
                            ])->count();
                            if ($cust >= $room->roomType->capacity) {
                                $fail('Kamar ini sudah penuh!');
                            }
                        }
                    ])
                    ->required()
                    ->preload()
                    ->searchable(),
                TextInput::make('nik')->label('NIK'),
                TextInput::make('npsn')->label('NPSN Sekolah'),
                TextInput::make('sekolah')->label('Nama Sekolah'),
                Select::make('gender')->options([
                    'P' => 'Perempuan',
                    'L' => 'Laki-laki',
                ])
                    ->rules([
                        fn(Get $get, Component $component): Closure => function (string $attr, $value, Closure $fail) use ($get, $component) {
                            $existCustomer = Customer::where([
                                ['reservation_id', '=', $get('reservation_id')],
                                ['room_id', '=', $get('room_id')],
                            ])->first();
                            $genders = [
                                'P' => 'Perempuan',
                                'L' => 'Laki-laki',
                            ];
                            if ($existCustomer !== null) {
                                if ($existCustomer->gender !== $value) {
                                    $fail('Kamar ini untuk ' . $genders[$existCustomer->gender]);
                                }
                            }
                        }
                    ])->required()->label('Jenis Kelamin'),
                TextInput::make('address')
                    ->label('Alamat'),
                TextInput::make('phone')
                    ->label('Telepon'),
            ]);
    }

    public function table(Table $table): Table
    {
        $rest = $this->ownerRecord->toArray();
        $BHouseIds = Reservation::find($rest['id'])->boardingHouses->pluck('id')->toArray();
        $items = BoardingHouse::where('type', 'internal')->whereIn('id', $BHouseIds)->get();
        $forms = [];
        foreach ($items as $item) {
            if (count($item->rooms) > 0) {
                $forms[] = Forms\Components\Section::make($item->name)
                    ->schema(static::sectionRoom($item, $rest));
            }
        }

        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('room.code')->searchable()->sortable()->label('Ruang'),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('ruangan')->form($forms)
                    ->action(function (Customer $record, array $data) {
                        $arr = call_user_func_array('array_merge', $data);
                        if (count($arr) == 1) {
                            $rest = Reservation::find($record->reservation_id);
                            $arrR = Reservation::where(function ($query) use ($rest) {
                                $query->whereBetween('reservations.date_ci', [$rest->date_ci, $rest->date_co])
                                    ->orWhereBetween('reservations.date_co', [$rest->date_ci, $rest->date_co])
                                    ->orWhere(function ($query) use ($rest) {
                                        $query->where('reservations.date_ci', '<', $rest->date_ci)
                                            ->where('reservations.date_co', '>', $rest->date_co);
                                    });
                            })->pluck('id')->toArray();
                            $customer = Customer::where('room_id', '=', $arr[0])
                                ->whereIn('reservation_id', $arrR)->first();
                            if (isset($customer) && $customer->gender != $record->gender) {
                                Notification::make()->title('Kamar ini untuk ' . ($customer->gender === "L" ? "Laki-laki" : "Perempuan"))->danger()->send();
                                return;
                            }
                            $record->room_id = $arr[0];
                            $record->save();
                        } else {
                            Notification::make()->title('Pilih salah satu ruangan!')->danger()->send();
                        }
                    })
                    ->color(Color::Green)->icon('heroicon-o-map-pin')->infolist(count($forms) <= 0 ? [
                        TextEntry::make('info')->label("Pilih wisma untuk menambahkan data ruangan customer"),
                    ] : null),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function sectionRoom(BoardingHouse $model, ?array $rest): ?array
    {
        $q = $model->rooms->load('roomType');
        $roomIds = $q->pluck('id')->toArray();
        $dataRooms = Room::select([
            'rooms.id as room_id',
            DB::raw('COUNT(customers.room_id) AS qty'),
            'room_types.capacity AS rm_qty',
            DB::raw('CASE
                        WHEN COUNT(customers.room_id) >= room_types.capacity THEN "Penuh"
                        WHEN COUNT(customers.room_id) < room_types.capacity AND COUNT(customers.room_id) > 0 THEN CONCAT("Tersisa ", (room_types.capacity - COUNT(customers.room_id)), " ", customers.gender)
                        ELSE "Kosong"
                    END AS status')
        ])
            ->join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
            ->leftJoin('customers', 'rooms.id', '=', 'customers.room_id')
            ->join('reservations', 'reservations.id', '=', 'customers.reservation_id')
            ->whereIn('rooms.id', $roomIds)
            ->where(function ($query) use ($rest) {
                $query->whereBetween('reservations.date_ci', [$rest["date_ci"], $rest["date_co"]])
                    ->orWhereBetween('reservations.date_co', [$rest["date_ci"], $rest["date_co"]])
                    ->orWhere(function ($query) use ($rest) {
                        $query->where('reservations.date_ci', '<', $rest["date_ci"])
                            ->where('reservations.date_co', '>', $rest["date_co"]);
                    });
            })
            ->groupBy('rooms.id', 'room_types.capacity', 'customers.gender')
            ->get();

        $statuses = $dataRooms->mapWithKeys(fn($rm) => [$rm->room_id => $rm->status])->toArray();
        $options = $q->mapWithKeys(fn(Room $room) => [$room->id => explode('-', $room->code)[1]])->toArray();
        $data = [];
        $desc = [];
        foreach ($options as $key => $value) {
            $fDigit = intval(substr((string)$value, 0, 1));
            if ($fDigit > 0) {
                $data[$fDigit - 1][$key] = $value;
                if (isset($statuses[$key])) {
                    $s = explode(' ', $statuses[$key]);
                    if (count($s) === 3) {
                        $desc[$fDigit - 1][$key] = $s[0] . ' ' . $s[1] . ' ' . ($s[2] === "L" ? "Laki-laki" : "Perempuan");
                    } else {
                        $desc[$fDigit - 1][$key] = $statuses[$key];
                    }
                } else {
                    $desc[$fDigit - 1][$key] = "Kosong";
                }
            }
        }


        return
            collect($data)->map(fn($item, $key) => CheckboxList::make($key)
                ->label('Lantai ' . ($key + 1))
                ->options($item)->descriptions($desc[$key])->columns(5)
                ->bulkToggleable()
            )->toArray();
    }
}

