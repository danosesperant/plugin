<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoitureResource\Pages;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use PluginVoiture\Models\Voiture;

class VoitureResource extends Resource
{
    protected static ?string $model = Voiture::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    TextInput::make('marque')->required(),
                    TextInput::make('modele')->required(),
                    TextInput::make('annee')->required(),
                    TextInput::make('prix')->required(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('marque'),
            TextColumn::make('modele'),
            TextColumn::make('annee'),
            TextColumn::make('prix'),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListVoitures::route('/'),
            'create' => Pages\CreateVoiture::route('/create'),
            'edit' => Pages\EditVoiture::route('/{record}/edit'),
        ];
    }
}