<?php

namespace App\Filament\Admin\Resources\AlumniResource\Pages;

use App\Exports\AlumniExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Filament\Admin\Resources\AlumniResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlumnis extends ListRecords
{
    protected static string $resource = AlumniResource::class;

    public function customAction()
    {
        return Excel::download(new AlumniExport, 'alumni.xlsx');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
