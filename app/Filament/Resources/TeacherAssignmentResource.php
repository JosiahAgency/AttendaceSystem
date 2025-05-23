<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherAssignmentResource\Pages;
use App\Filament\Resources\TeacherAssignmentResource\RelationManagers;
use App\Models\Studentgroups;
use App\Models\Subjects;
use App\Models\TeacherAssignment;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherAssignmentResource extends Resource
{
    protected static ?string $model = TeacherAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('teacher_id')
                    ->label('Teachers name')
                    ->searchable()
                    ->options(User::where('role', 'teacher')
                        ->pluck('name', 'id')),
                Select::make('group_id')
                    ->label('Group')
                    ->searchable()
                    ->options(Studentgroups::all()
                        ->pluck('name', 'id')),
                Select::make('subject_id')
                    ->label('Subject')
                    ->searchable()
                    ->options(Subjects::all()
                        ->pluck('name', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher.name'),
                TextColumn::make('group.name'),
                TextColumn::make('subject.name'),
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
            'index' => Pages\ListTeacherAssignments::route('/'),
            'create' => Pages\CreateTeacherAssignment::route('/create'),
            'edit' => Pages\EditTeacherAssignment::route('/{record}/edit'),
        ];
    }
}
