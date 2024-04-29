<?php

namespace App\Filament\Resources\ReservationResource\RelationManagers;

use App\Enums\PaymentTypeEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->label("Tanggal Bayar")->default(now())->readOnly(),
                Forms\Components\Select::make('payment_type')
                    ->options([
                        PaymentTypeEnum::DP->name => "DP",
                        PaymentTypeEnum::PELUNASAN->name => "Lunas",
                    ])->required(),
                Forms\Components\Textarea::make('descript')->label("Catatan")
                    ->maxLength(500),
                Forms\Components\TextInput::make('amount')->numeric()->label("Nominal")
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('payment_type')
            ->columns([
                Tables\Columns\TextColumn::make('payment_type'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
