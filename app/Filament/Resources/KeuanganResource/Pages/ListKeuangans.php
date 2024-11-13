<?php

namespace App\Filament\Resources\KeuanganResource\Pages;

use Filament\Actions;
use App\Exports\KeuanganExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\KeuanganResource;

class ListKeuangans extends ListRecords
{
    protected static string $resource = KeuanganResource::class;

    public function customAction()
    {
        return Excel::download(new KeuanganExport, 'keuangan.xlsx');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
