<?php

namespace App\Http\Controllers;

use App\Models\ExamPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    public function pdf($ref_number)
    {
        // Fetch the exam paper using the reference number
        $examPaper = ExamPaper::where('ref_number', $ref_number)->first();

        if (!$examPaper) {
            abort(404, 'Exam paper not found');
        }

        // Retrieve the program_id, exam_sitting_date, and time from the fetched exam paper
        $program_id = $examPaper->program_id;
        $exam_sitting_date = $examPaper->exam_sitting_date; // Assuming you store the exam date in this field
        $exam_sitting_time = '3'; // This can be hardcoded or fetched dynamically if it's stored elsewhere

        // Fetch the exam questions related to the ref_number
        $exam_questions = ExamPaper::where('ref_number', $ref_number)->get();

        // Prepare data for the PDF
        $data = [
            'logo' => public_path('imgs/logo.png'),
            'ref_number' => $ref_number,
            'program_id' => $program_id,
            'exam_sitting_date' => $exam_sitting_date,
            'exam_sitting_time' => $exam_sitting_time,
            'exam_questions' => $exam_questions,
        ];

        // Log data for debugging
        Log::info("PDF generation for Ref Number: " . $ref_number . ", Program ID: " . $program_id);

        // Generate the PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('exam_paper_pdf', $data);

        // Download the PDF
        return $pdf->download($ref_number . '_exam_paper.pdf');
    }

    public function keyPdf($ref_number)
    {
        // Fetch the exam paper using the reference number
        $examPaper = ExamPaper::where('ref_number', $ref_number)->first();

        if (!$examPaper) {
            abort(404, 'Exam paper not found');
        }

        // Retrieve the program_id, exam_sitting_date, and time from the fetched exam paper
        $program_id = $examPaper->program_id;
        $exam_sitting_date = $examPaper->exam_sitting_date; // Assuming you store the exam date in this field
        $exam_sitting_time = '3'; // This can be hardcoded or fetched dynamically if it's stored elsewhere

        // Fetch the exam questions related to the ref_number
        $exam_questions = ExamPaper::where('ref_number', $ref_number)->get();

        // Prepare data for the PDF
        $data = [
            'logo' => public_path('imgs/logo.png'),
            'ref_number' => $ref_number,
            'program_id' => $program_id,
            'exam_sitting_date' => $exam_sitting_date,
            'exam_sitting_time' => $exam_sitting_time,
            'exam_questions' => $exam_questions,
        ];

        // Log data for debugging
        Log::info("PDF generation for Ref Number: " . $ref_number . ", Program ID: " . $program_id);

        // Generate the PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('marking_key_pdf', $data);

        // Download the PDF
        return $pdf->download($ref_number . '_marking_key.pdf');
    }
}
