<?php

namespace App\Filament\Resources\ExamPaperMarkingKeyResource\Pages;

use App\Filament\Resources\ExamPaperMarkingKeyResource;
use App\Models\AuditTrail;
use App\Models\ExamPaperMarkingKey;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use function App\Filament\Resources\checkCreateInitiatorPermission;

class ListExamPaperMarkingKeys extends ListRecords
{
    protected static string $resource = ExamPaperMarkingKeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Create Marking Key')
                ->requiresConfirmation()
                ->modalHeading('Confirm Generation')
                ->modalDescription(function ($record) {
                    return 'You are about to initiate generation of a new Marking Key. Confirm to proceed or cancel';
                })
                ->modalSubmitActionLabel('Yes, Confirm')
                ->action(function (){
                    //get latest marking key
                    $exam_paper = ExamPaperMarkingKey::where('status',null)->latest();

                    $initiate = ExamPaperMarkingKey::where('ref_number',$exam_paper->ref_number)->update([
                        "status" => "initiated"
                    ]);
                })
                ->visible(function(){
                    return checkCreateInitiatorPermission();
                }),
        ];
    }

    public function mount(): void
    {
        $user = Auth::user();
        //abort_unless(checkCreateBankNamesPermission(),403);

        $activity = AuditTrail::create([
            "user_id" => $user->id,
            "module" => "Exam paper marking key",
            "activity" => "Viewed Exam paper marking key Page",
            "ip_address" => request()->ip()
        ]);

        $activity->save();
    }
}
