<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StagiaireResource\Pages;
use App\Models\Stagiaire;
use Filament\Forms;
use Filament\Forms\Form;  // ✅ Ajouté - nouveau import
use Filament\Tables;
use Filament\Tables\Table;  // ✅ Ajouté - nouveau import
use Filament\Resources\Resource;
// ❌ Supprimé: use Filament\Resources\Form;
// ❌ Supprimé: use Filament\Resources\Table;

class StagiaireResource extends Resource
{
    protected static ?string $model = Stagiaire::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Stagiaires';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user.name')->required()->label('Nom complet'),
                Forms\Components\TextInput::make('user.email')->required()->email()->label('Email'),
                Forms\Components\TextInput::make('user.telephone')->label('Téléphone'),
                Forms\Components\DatePicker::make('date_debut')->label('Date début'),
                Forms\Components\DatePicker::make('date_fin')->label('Date fin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Nom'),
                Tables\Columns\TextColumn::make('user.email')->label('Email'),
                Tables\Columns\TextColumn::make('coaches_count')->label('Nombre de coachs')->counts('coaches'),
                Tables\Columns\TextColumn::make('date_debut')->label('Début'),
                Tables\Columns\TextColumn::make('date_fin')->label('Fin'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStagiaires::route('/'),
            'create' => Pages\CreateStagiaire::route('/create'),
            'edit' => Pages\EditStagiaire::route('/{record}/edit'),
        ];
    }
}