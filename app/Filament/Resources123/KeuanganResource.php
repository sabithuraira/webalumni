<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Alumni;
use App\Models\Keuangan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\ImportAction;
use App\Filament\Imports\KeuanganImporter;
use App\Filament\Resources\KeuanganResource\Pages;

class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('deskripsi')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                DatePicker::make('tanggal')
                    ->label('Tanggal Transaksi')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                Select::make('kategori')
                    ->options([
                        'Pemasukan' => 'Pemasukan',
                        'Pengeluaran' => 'Pengeluaran',
                    ])
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                TextInput::make('jumlah')
                    ->numeric()
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                Select::make('penerima')
                    ->label('Penerima')
                    ->options(Alumni::all()->pluck('nama', 'id'))
                    ->searchable()
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->columns([
                TextColumn::make('deskripsi')
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->sortable(),
                TextColumn::make('kategori')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pemasukan' => 'success',
                        'Pengeluaran' => 'danger',
                    }),
                TextColumn::make('jumlah')
                    ->sortable(),
                TextColumn::make('penerima')
                    ->getStateUsing(function ($record) {
                        return Alumni::find($record->penerima)?->nama;
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tanggal', 'desc')
            ->searchOnBlur(true)
            ->headerActions([
                ImportAction::make()
                    ->importer(KeuanganImporter::class),
                Action::make('customButton')
                    ->label('Export keuangans')
                    ->color('primary')
                    ->action('customAction'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }
}
