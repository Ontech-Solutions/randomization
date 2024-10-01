<?php

namespace App\Filament\Resources\ExamPaperMarkingKeyResource\Pages;

use App\Filament\Resources\ExamPaperMarkingKeyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use function App\Filament\Resources\checkCreateApproverPermission;

class EditExamPaperMarkingKey extends EditRecord
{
    protected static string $resource = ExamPaperMarkingKeyResource::class;

protected static ?string $title = 'Exam Paper Marking Key Details';

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
            Actions\Action::make("Download PDF")
                ->label("Download PDF")
                ->color('success')
                ->action(function($record){
                    return redirect('/key/pdf/'.$record->ref_number);
                })
                ->visible(function (){
                    return checkCreateApproverPermission();
                })
        ];
    }

    protected function getFormActions(): array
    {
        return [

        ];
    }
}
