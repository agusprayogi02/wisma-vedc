<?php

namespace App\Filament\Imports;

use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ReservationImporter extends Importer
{
    protected static ?string $model = Reservation::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('id_xkelas')->label('ID Kelas'),
            ImportColumn::make('nama_xdiklat_kategori')->label('Category'),
            ImportColumn::make('nick_name')->label('Nick Name'),
            ImportColumn::make('kls_tgl_mulai')->label('Check In'),
            ImportColumn::make('kls_tgl_selesai')->label('Check Out'),
        ];
    }

    public function resolveRecord(): ?Reservation
    {
        $this->data['date_ci'] = Carbon::createFromFormat('d/m/Y', $this->data['kls_tgl_mulai'], 'Asia/Jakarta');
        $this->data['date_co'] = Carbon::createFromFormat('d/m/Y', $this->data['kls_tgl_selesai'], 'Asia/Jakarta');
        unset($this->data['kls_tgl_mulai'], $this->data['kls_tgl_selesai']);
        return Reservation::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'id_xkelas' => $this->data['id_xkelas'],
            'nama_xdiklat_kategori' => $this->data['nama_xdiklat_kategori'],
            'nick_name' => $this->data['nick_name'],
            'date_order' => now(),
            'date_ci' => $this->data['date_ci'],
            'date_co' => $this->data['date_co'],
            'quantity' => 15,
            'user_id' => auth()->user()->id,
            'orderer_id' => 1,
        ]);

//        return new Reservation();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your reservation import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
