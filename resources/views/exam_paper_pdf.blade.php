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
            <h2>FOR</h2> 
            <h2>{{ strtoupper(\App\Models\Program::find($program_id)->name) }}</h2> <!-- Transform the program name to uppercase -->
        </div>

        <!-- Exam Information -->
        <div align="center" style="margin-top: 30px;">
            <h3>TIME ALLOWED: {{ $exam_sitting_time }} HOURS FROM 09:00 - 12:00 HOURS</h3> <!-- Time from the database or passed dynamically -->
            <h3>DATE: {{ $exam_sitting_date }}</h3> <!-- Date from the database -->
        </div>

        <!-- Instructions -->
        <div class="instructions">
            <h4>Instructions to Candidate</h4> <!-- Aligned to the left, bold, and underlined -->
            <ol>
                <li>Fill in your Details on the Answer Sheet provided and ensure they are correct.</li>
                <li>This paper consists of 150 Multiple Choice Questions (<strong>MCQs</strong>).</li>
                <li>Read all the questions in this paper carefully. Attempt ALL questions.</li>
                <li class="bold-instruction">Shade completely the circle for correct single best response to each question with a pencil or dark pen in the Answer Sheet provided.</li> <!-- This line is bold -->
                <li><strong>No</strong> mark will be subtracted for any wrong answer(s).</li>
                <li>Total Marks are <strong>100</strong>.</li>
            </ol>
        </div>

        <!-- Footer -->
        <div class="footer">
            <h4>DO NOT TURN THIS PAGE UNTIL YOU ARE TOLD TO DO SO BY THE INVIGILATOR</h4> <!-- Footer with border -->
        </div>
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
                <td>A. {{ $exam->option_a }}</td>
            </tr>
            <tr>
                <td>B. {{ $exam->option_b }}</td>
            </tr>
            <tr>
                <td>C. {{ $exam->option_c }}</td>
            </tr>
            <tr>
                <td>D. {{ $exam->option_d }}</td>
            </tr>
            <tr>
                <td>E. {{ $exam->option_e }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h4 style="text-align: center;"><strong>END OF PAPER</strong></h4>
</div>
</body>
</html>
