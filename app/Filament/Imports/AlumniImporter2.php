<?php

namespace App\Filament\Imports;

use App\Models\Alumni;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class AlumniImporter extends Importer
{
    protected static ?string $model = Alumni::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('jenis_kelamin')
                ->example('Laki-laki')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nama')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nama_pasangan')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('status')
                ->example('Aktif')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('angkatan')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('tanggal_lahir')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('tempat_lahir')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Alumni
    {
        // return Alumni::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Alumni();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Data Alumni import telah selesai dan ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
