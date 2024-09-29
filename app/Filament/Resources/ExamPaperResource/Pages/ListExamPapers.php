<?php

namespace App\Filament\Resources\ExamPaperResource\Pages;

use App\Filament\Resources\ExamPaperResource;
use App\Models\AuditTrail;
use App\Models\Competency;
use App\Models\ExamPaper;
use App\Models\ExamQuestion;
use App\Models\Program;
use Filament\Actions;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function App\Filament\Resources\BusinessResource\Pages\generateAccNumber;

class ListExamPapers extends ListRecords
{
    protected static string $resource = ExamPaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make("Generate New Exam Paper")
                ->requiresConfirmation()
                ->modalHeading('Confirm Generation')
                ->modalDescription(function ($record) {
                    return 'You are about to generate a new Exam Paper. Confirm to proceed or cancel';
                })
                ->modalSubmitActionLabel('Yes, Confirm')
                ->form([
                    Select::make('program_id')
                        ->label('Choose Exam Program')
                        ->required()
                        ->options(Program::all()->pluck('name', 'id')->toArray()),
                    DateTimePicker::make("exam_sitting_date")
                ])
                ->action(function ($data){
                    try {
                        // Generate the reference number
                        $new_ref_number = $this->generateRefNumber();
                        Log::info("Generating exam paper with Ref Number " . $new_ref_number);

                        // Fetch the selected questions
                        $selectedQuestionIds = $this->selectQuestions($data['program_id']);

                        if (count($selectedQuestionIds) < 150) {
                            throw new \Exception("Less than 150 questions selected");
                        }

                        // Insert selected questions into the ExamPaper table
                        $this->saveExamPaper($selectedQuestionIds, $new_ref_number, $data);
                        Log::info("Exam Paper Generated Successfully");

                        Notification::make()
                            ->success()
                            ->title('Exam Paper')
                            ->body('Exam Paper Generated Successfully');
                    } catch (\Exception $e) {
                        Log::error($e->getMessage());
                        Notification::make()
                            ->danger()
                            ->title('Exam Paper Generation Failed')
                            ->body('Failed to generate exam paper: ' . $e->getMessage());
                    }
                })
        ];
    }

    private function selectQuestions($program_id) {
        $totalExamPaperQuestions = 150;
        $selectedQuestionIds = [];

        $program_competences = Competency::where("program_id", $program_id)->get();

        foreach ($program_competences as $program_competence) {
            $percentageDecimal = floatval($program_competence->weight) / 100;
            $total_competence_questions = ceil($percentageDecimal * $totalExamPaperQuestions);

            $questions = ExamQuestion::where('competency_id', $program_competence->id)
                ->where('program_id', $program_id)
                ->inRandomOrder()
                ->take($total_competence_questions)
                ->pluck('id')
                ->toArray();

            $selectedQuestionIds = array_merge($selectedQuestionIds, array_diff($questions, $selectedQuestionIds));
        }

        // Ensure exactly 150 questions
        return array_slice($selectedQuestionIds, 0, $totalExamPaperQuestions);
    }

    private function saveExamPaper($selectedQuestionIds, $ref_number, $data) {
        foreach ($selectedQuestionIds as $questionId) {
            $question = ExamQuestion::where('id', $questionId)->where('program_id', $data["program_id"])->first();

            $examPaper = new ExamPaper();
            $examPaper->ref_number = $ref_number;
            $examPaper->exam_sitting_date = $data["exam_sitting_date"];
            $examPaper->program_id = $data["program_id"];
            $examPaper->competency_id = $question->competency_id;
            $examPaper->year = $question->year;
            $examPaper->month = $question->month;
            $examPaper->image = $question->image;
            $examPaper->question = $question->question;
            $examPaper->option_a = $question->option_a;
            $examPaper->option_b = $question->option_b;
            $examPaper->option_c = $question->option_c;
            $examPaper->option_d = $question->option_d;
            $examPaper->option_e = $question->option_e;
            $examPaper->correct_answer = $question->correct_answer;
            $examPaper->user_id = Auth::user()->id;
            $examPaper->save();
        }
    }

    function generateRefNumber()
    {
        $prefix = 'HPCZ'; // Prefix for the reference number
        $random = rand(1000000000, 9999999999); // Random 10-digit number

        $ref_number = $prefix . $random;

        // Check if the reference number already exists in the database
        if (DB::table('exam_papers')->where('ref_number', $ref_number)->exists()) {
            return $this->generateRefNumber(); // Recursively generate a new one if it exists
        }
        return $ref_number;
    }

    public function mount(): void
    {
        $user = Auth::user();

        $activity = AuditTrail::create([
            "user_id" => $user->id,
            "module" => "Exam Paper",
            "activity" => "Viewed Page",
            "ip_address" => request()->ip()
        ]);

        $activity->save();
    }
}