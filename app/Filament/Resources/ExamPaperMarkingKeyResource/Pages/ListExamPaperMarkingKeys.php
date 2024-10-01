<?php

namespace App\Filament\Resources\ExamPaperMarkingKeyResource\Pages;

use App\Filament\Resources\ExamPaperMarkingKeyResource;
use App\Models\AuditTrail;
use App\Models\ExamPaper;
use App\Models\ExamPaperMarkingKey;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
                ->form([
                    Select::make('ref_number')
                        ->label('Choose Exam Ref Number')
                        ->required()
                        ->options(ExamPaper::all()->unique('ref_number')->pluck('ref_number', 'ref_number')->toArray())
                        ,
                    Textarea::make('comment')
                        ->required()
                ])
                ->action(function ($data){
                    //get latest marking key
                    $ref = $data["ref_number"];

                    $exam_papers = ExamPaper::where("ref_number",$ref)->get();

                    if(ExamPaperMarkingKey::where("ref_number",$ref)->count() == 0){
                        foreach ($exam_papers as $exam_paper)
                        {
                            $initiate = ExamPaperMarkingKey::create([
                                "ref_number" => $exam_paper->ref_number,
                                "competency_id" => $exam_paper->competency_id,
                                "program_id" => $exam_paper->program_id,
                                "exam_sitting_date" => $exam_paper->exam_sitting_date,
                                "year" => $exam_paper->year,
                                "month" => $exam_paper->month,
                                "image" => $exam_paper->image,
                                "question" => $exam_paper->question,
                                "option_a" => $exam_paper->option_a,
                                "option_b" => $exam_paper->option_b,
                                "option_c" => $exam_paper->option_c,
                                "option_d" => $exam_paper->option_d,
                                "option_e" => $exam_paper->option_e,
                                "correct_answer" =>$exam_paper->correct_answer,
                                "user_id" => auth()->user()->id,
                                "status" => "initiated",
                                "comment" => $data["comment"]
                            ]);

                            $initiate->save();
                        }

                    }



                    Notification::make()
                        ->success()
                        ->title('Initiated')
                        ->body('Marking Key Download Initiated by '.User::where('id', auth()->user()->id)->first()->name);
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
