<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SessionsResource\Pages;
use App\Filament\Resources\SessionsResource\RelationManagers;
use App\Models\Sessiondata;
use App\Models\Sessions;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SessionsResource extends Resource
{
    protected static ?string $model = Sessiondata::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $label = 'Sessions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('teacher_assignment_id'),
                TextInput::make('scheduled_date'),
                TextInput::make('start_time'),
                TextInput::make('end_time'),
                TextInput::make('location'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListSessions::route('/'),
            'create' => Pages\CreateSessions::route('/create'),
            'edit' => Pages\EditSessions::route('/{record}/edit'),
        ];
    }
}
