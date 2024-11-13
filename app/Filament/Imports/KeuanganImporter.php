<?php

namespace App\Filament\Imports;

use App\Models\Keuangan;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class KeuanganImporter extends Importer
{
    protected static ?string $model = Keuangan::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('deskripsi')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('tanggal')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('kategori')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('jumlah')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('penerima')
                ->rules(['max:36']),
            ImportColumn::make('created_by')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('updated_by')
                ->numeric()
                ->rules(['integer']),
        ];
    }

    public function resolveRecord(): ?Keuangan
    {
        // return Keuangan::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Keuangan();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your keuangan import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
