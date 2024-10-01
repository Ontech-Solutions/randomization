<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ImportExamQuestions extends Command
{
    protected $signature = 'exam:import-questions {file}';
    protected $description = 'Import exam questions from a Word document';

    public function handle()
    {
        $filePath = $this->argument('file');
        $pythonScript = storage_path('app/scripts/import_questions.py');

        $this->info("Python Script Path: $pythonScript");
        $this->info("File Path: $filePath");

        if (!file_exists($pythonScript)) {
            $this->error("Python script not found at: $pythonScript");
            return;
        }

        if (!file_exists($filePath)) {
            $this->error("Input file not found at: $filePath");
            return;
        }

        $dbHost = config('database.connections.mysql.host');
        $dbName = config('database.connections.mysql.database');
        $dbUser = config('database.connections.mysql.username');
        $dbPass = config('database.connections.mysql.password');

        $this->info("Database: $dbName on $dbHost");

        $process = new Process([
            'python',
            $pythonScript,
            $filePath,
            $dbHost,
            $dbName,
            $dbUser,
            $dbPass
        ]);

        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                $this->error($buffer);
            } else {
                $this->info($buffer);
            }
        });

        if (!$process->isSuccessful()) {
            $this->error('The command failed.');
            throw new ProcessFailedException($process);
        }

        $this->info('Import completed successfully.');
    }
}