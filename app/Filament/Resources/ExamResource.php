<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExamResource\Pages;
use App\Filament\Resources\ExamResource\RelationManagers;
use App\Models\Exam;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ExamResource extends Resource
{
    protected static ?string $model = Exam::class;

    protected static ?string $navigationIcon = 'heroicon-c-inbox-stack';

    protected static ?string $navigationGroup = 'System Settings';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // Optionally, you can customize the badge color
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Word Document Upload';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->aside()
                    ->description("Upload a MS Word file formatted as follows: Times New Roman font. Start with 'Program ID:' and 'Competency ID:' (both integers) on different lines. Number questions (e.g., '1.', '2.') ending with '?', followed by 5 options labeled A to E, one per line. End each question with 'Correct Answer: [A/B/C/D/E]'. Use single line breaks between elements and double line breaks between questions. Ensure the name of the document is without spaces.")
                    ->schema([
                        FileUpload::make('word_doc')
                            ->label('Upload Word Document')
                            ->directory('examination')
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxSize(102400) // 100MB in kilobytes
                            ->preserveFilenames()
                            ->openable()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('word_doc'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListExams::route('/'),
            'create' => Pages\CreateExam::route('/create'),
            'edit' => Pages\EditExam::route('/{record}/edit'),
        ];
    }
}