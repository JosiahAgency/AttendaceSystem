<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SessionsResource\Pages;
use App\Filament\Resources\SessionsResource\RelationManagers;
use App\Models\Sessiondata;
use App\Models\Sessions;
use App\Models\TeacherAssignment;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class SessionsResource extends Resource
{
    protected static ?string $model = Sessiondata::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $label = 'Sessions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('teacher_assignment_id')
                    ->label('Teacher Assignment')
                    ->searchable()
                    ->options(function () {
                        return TeacherAssignment::with(['teacher', 'group', 'subject'])
                            ->get()
                            ->mapWithKeys(function ($assignment) {
                                $teacherName = $assignment->teacher->name ?? 'Unknown Teacher';
                                $groupName = $assignment->group->name ?? 'Unknown Group';
                                $subjectName = $assignment->subject->name ?? 'Unknown Subject';
                                $label = "{$teacherName} - {$groupName} - {$subjectName}";
                                return [$assignment->id => $label];
                            })
                            ->toArray();
                    }),
                DatePicker::make('scheduled_date'),
                TimePicker::make('start_time'),
                TimePicker::make('end_time'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher_assignment_id')
                    ->label('Session')
                    ->formatStateUsing(function ($state, $record) {
                        $assignment = $record->teacherAssignment;
                        if ($assignment) {
                            $teacherName = $assignment->teacher->name;
                            $groupName = $assignment->group->name;
                            $subjectName = $assignment->subject->name;

                            return "{$teacherName} - {$groupName} - {$subjectName}";
                        }
                    }),
                TextColumn::make('scheduled_date')
                    ->date(),
                TextColumn::make('start_time')
                    ->time(),
                TextColumn::make('end_time')
                    ->time(),
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
