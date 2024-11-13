<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Alumni;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\AlumniResource\Pages;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('profpic')
                    ->label('Foto Alumni')
                    ->imageEditor(),
                TextInput::make('nama')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                TextInput::make('angkatan')
                    ->filled()
                    ->regex('/^\d+$/')
                    ->validationMessages([
                        'regex' => 'Angkatan harus bilangan bulat',
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                Select::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Pensiun' => 'Pensiun',
                    ])
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                TextInput::make('nama_pasangan')
                    ->label('Nama Pasangan')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                Repeater::make('pendidikans')
                    ->label('Riwayat Pendidikan')
                    ->relationship('pendidikanAlumni')
                    ->schema([
                        TextInput::make('mulai_tahun')
                            ->filled()
                            ->regex('/^\d+$/')
                            ->validationMessages([
                                'regex' => 'Angkatan harus bilangan bulat',
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        TextInput::make('selesai_tahun')
                            ->filled()
                            ->regex('/^\d+$/')
                            ->validationMessages([
                                'regex' => 'Angkatan harus bilangan bulat',
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        Select::make('jenjang')
                            ->options([
                                'SD/MI/Sederajat' => 'SD/MI/Sederajat',
                                'SMP/MTs/Sederajat' => 'SMP/MTs/Sederajat',
                                'SMA/K/MA/K/Sederajat' => 'SMA/K/MA/K/Sederajat',
                                'Perguruan Tinggi' => 'Perguruan Tinggi',
                            ])
                            ->filled()
                            ->validationMessages([
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        TextInput::make('sekolah')
                            ->filled()
                            ->validationMessages([
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        TextInput::make('keterangan'),
                    ])
                    ->minItems(1)
                    ->maxItems(3),
                Repeater::make('jabatans')
                    ->label('Riwayat Jabatan')
                    ->relationship('jabatanAlumni')
                    ->schema([
                        TextInput::make('mulai_tahun')
                            ->filled()
                            ->regex('/^\d+$/')
                            ->validationMessages([
                                'regex' => 'Angkatan harus bilangan bulat',
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        TextInput::make('selesai_tahun')
                            ->filled()
                            ->regex('/^\d+$/')
                            ->validationMessages([
                                'regex' => 'Angkatan harus bilangan bulat',
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        TextInput::make('unit')
                            ->filled()
                            ->validationMessages([
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        TextInput::make('jabatan')
                            ->filled()
                            ->validationMessages([
                                'filled' => 'Isian tidak boleh kosong',
                            ]),
                        TextInput::make('keterangan'),
                    ])
                    ->minItems(1)
                    ->maxItems(3),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->columns([
                TextColumn::make('nama')
                    ->sortable(),
                TextColumn::make('angkatan')
                    ->sortable(),
                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Pensiun' => 'gray',
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
            ->defaultSort('angkatan', 'desc')
            ->searchOnBlur(true)
            ->headerActions([
                Action::make('customButton')
                    ->label('Export alumnis')
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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
