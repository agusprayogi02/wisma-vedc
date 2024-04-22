<?php

namespace App\Filament\Imports;

use App\Models\Customer;
use App\Models\Reservation;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CustomerImporter extends Importer
{
    protected static ?string $model = Customer::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('id_xcalonpeserta')->label('Id Perserta'),
            ImportColumn::make('id_xkelas')->label('Id Kelas'),
            ImportColumn::make('nik')->label('NIK'),
            ImportColumn::make('nama')->label('Nama'),
            ImportColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
            ImportColumn::make('npsn')->label('NPSP Sekolah'),
            ImportColumn::make('sekolah')->label('Nama Sekolah'),
            ImportColumn::make('address')->label('Address'),
            ImportColumn::make('no_hp')->label('HP'),
        ];
    }

    public function resolveRecord(): ?Customer
    {
        $reservasi = Reservation::where('id_xkelas', $this->data['id_xkelas'])->first();
        $this->data['name'] = $this->data['nama'];
        $this->data['phone'] = $this->data['no_hp'];
        $this->data['gender'] = $this->data['jenis_kelamin'] == 'WANITA' ? 'P' : 'L';
        unset($this->data['nama'], $this->data['jenis_kelamin'], $this->data['no_hp']);
        return Customer::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'id_xcalonpeserta' => $this->data['id_xcalonpeserta'],
            'reservation_id' => $reservasi->id,
            'id_xkelas' => $this->data['id_xkelas'],
            'nik' => $this->data['nik'],
            'name' => $this->data['name'],
            'gender' => $this->data['gender'],
            'npsn' => $this->data['npsn'],
            'sekolah' => $this->data['sekolah'],
            'address' => $this->data['address'],
            'phone' => $this->data['phone'],
        ]);

//        return new Customer();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your customer import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
