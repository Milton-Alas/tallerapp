<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\User;
use App\Models\Producto;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Hidden;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Datos del producto')
                    ->description('Complete los datos del producto')
                    ->icon('heroicon-o-rectangle-stack')
                    ->schema([
                        Hidden::make('user_id')
                        ->default(auth()->id()),
                        Select::make('color')
                            ->label('Color')
                            ->options([
                                'Blanco' => 'Blanco',
                                'Negro' => 'Negro',
                                'Otro' => 'Otro',
                            ])
                            ->required(),
                        Select::make('talla')
                            ->label('Talla')
                            ->options([
                                '8' => '8',
                                '10' => '10',
                                '12' => '12',
                                '14' => '14',
                                '16' => '16',
                                'S' => 'S',
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                                'XXL' => 'XXL',
                            ])
                            ->required()
                            ->placeholder('Selecciona una talla'),
                        TextInput::make('precio_docena') // Corrected component name
                            ->label('Precio por Docena')
                            ->numeric()
                            ->step(0.01)
                            ->prefix('$')
                            ->required()
                            ->rules(['numeric', 'min:0']),
                        Textarea::make('comentario')
                            ->label('Comentario')
                            ->maxLength(65535)
                            ->rows(3)
                            ->nullable(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        
            ->columns([
                TextColumn::make('user.name')
                    ->label('Usuario')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('color')
                    ->label('Color')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('talla')
                    ->label('Talla')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('precio_docena')
                    ->label('Precio por Docena')
                    ->money('USD')
                    ->sortable(),
                TextColumn::make('comentario')
                    ->label('Comentario')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}