<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .es-wrapper {
            width: 100%;
            margin: 0 auto;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .es-content-body {
            width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .question-section {
            page-break-before: always; /* This ensures the questions start on a new page */
        }
        table {
            width: 100%;
        }
        td, th {
            padding: 10px;
        }
        .header {
            text-align: center;
        }
        .header img {
            height: 90px; /* Adjust logo size */
            width: 160px;
            display: inline-block;
            margin-bottom: 15px; /* Add space below the image */
        }
        .header h2 {
            margin: 5px 0; /* Reduce the spacing between h2 elements */
        }
        .footer {
            text-align: center;
            border: 2px solid black;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
        }
        .instructions {
            margin-top: 20px;
            padding: 10px;
            border: 0px solid #000;
        }
        .instructions h4 {
            text-align: left;
            font-weight: bold;
            text-decoration: underline; /* Make the text bold and underlined */
        }
        ol {
            padding-left: 20px;
            margin-top: 10px; /* Add space above the list */
            margin-bottom: 10px; /* Add space below the list */
        }
        ol li {
            margin-bottom: 10px; /* Add space between list items */
        }
        .bold-instruction {
            font-weight: bold;
        }
        /* Adjust the visual layout */
        .es-content-body {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<!-- Cover Page Section -->
<div class="es-wrapper cover-page">
    <div class="es-content-body">
        <!-- Logo and Header Section -->
        <div class="header">
            <img src="{{ $logo }}" alt="HPCZ Logo" />
            <h2>LICENSURE EXAMINATION</h2>
            <h2>MARKING KEY FOR</h2>
            <h2>{{ strtoupper(\App\Models\Program::find($program_id)->name) }}</h2> <!-- Transform the program name to uppercase -->
        </div>


        <!-- Exam Information -->
        <div align="center" style="margin-top: 30px;">
            <h3>TIME ALLOWED: {{ $exam_sitting_time }} HOURS FROM 09:00 - 12:00 HOURS</h3> <!-- Time from the database or passed dynamically -->
            <h3>EXAM DATE: {{  \Illuminate\Support\Carbon::parse($exam_sitting_date)->toDateString() }}</h3> <!-- Date from the database -->
        </div>

        <!-- Instructions -->
        <div class="instructions">
            <h4>Instructions to Candidate</h4> <!-- Aligned to the left, bold, and underlined -->
            <ol>
                <li>This document contains the official answers to all 150 Multiple Choice Questions (MCQs).</li>
                <li>Correct responses for each question are indicated next to the question.</li>
                <li>Marks should be awarded based on the exact match of the answer key.</li>
                <li class="bold-instruction">No mark deduction is applied for incorrect answers.</li> <!-- This line is bold -->
                <li>No mark deduction is applied for incorrect answers.</li>
            </ol>
        </div>

        <!-- Footer -->
    </div>
</div>

<!-- Question Section -->
<div class="es-wrapper question-section">
    <table style="border-collapse: collapse; width: 640px; border: 1px solid #ffffff; background-color: #ffffff;">
        <tbody>
        @foreach($exam_questions as $exam)
            <tr>
                <td style="border: 1px solid #ffffff; padding: 8px; width: 370px; font-weight: bold;">{{ $loop->iteration }}. {{ $exam->question }}</td>
            </tr>
            <tr>
                @if($exam->correct_answer == "A" || $exam->correct_answer == "a")
                    <td style="border: 1px solid black;">A. {{ $exam->option_a }}</td>
                    @else
                <td>A. {{ $exam->option_a }}</td>
                @endif
            </tr>
            <tr>
                @if($exam->correct_answer == "B" || $exam->correct_answer == "b")
                    <td style="border: 1px solid black;">B. {{ $exam->option_b }}</td>
                @else
                    <td>B. {{ $exam->option_b }}</td>
                @endif
            </tr>
            <tr>
                @if($exam->correct_answer == "C" || $exam->correct_answer == "c")
                    <td style="border: 1px solid black;">C. {{ $exam->option_c }}</td>
                @else
                    <td>C. {{ $exam->option_c }}</td>
                @endif
            </tr>
            <tr>
                @if($exam->correct_answer == "D" || $exam->correct_answer == "d")
                    <td style="border: 1px solid black;">D. {{ $exam->option_d }}</td>
                @else
                    <td>D. {{ $exam->option_d }}</td>
                @endif
            </tr>
            <tr>
                @if($exam->correct_answer == "E" || $exam->correct_answer == "e")
                    <td style="border: 1px solid black;">E. {{ $exam->option_e }}</td>
                @else
                    <td>E. {{ $exam->option_e }}</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <h4 style="text-align: center;"><strong>END OF PAPER</strong></h4>
</div>
</body>
</html>
