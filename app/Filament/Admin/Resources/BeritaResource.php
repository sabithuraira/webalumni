<?php

namespace App\Filament\Admin\Resources;

use Filament\Tables;
use App\Models\Berita;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Admin\Resources\BeritaResource\Pages;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;
    protected static ?string $navigationLabel = 'Berita';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $slug = 'news';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('dokum')
                    ->label('Foto')
                    ->imageEditor(),
                DatePicker::make('tanggal')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                TextInput::make('judul')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
                RichEditor::make('isi')
                    ->label('Konten')
                    ->filled()
                    ->validationMessages([
                        'filled' => 'Isian tidak boleh kosong',
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->columns([
                TextColumn::make('tanggal')
                    ->sortable(),
                TextColumn::make('judul')
                    ->sortable(),
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
            ->searchOnBlur(true);
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
