<?php

interface LoggerInterface
{
    // Log a message
    public function log(string $message): void;
}

// file logger php
class FileLogger implements LoggerInterface
{
    private string $filePath;

    // Constructor to initialize file path
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    // Implement the log method to write to a file
    public function log(string $message): void
    {
        file_put_contents($this->filePath, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);
    }
}

class DatabaseLogger implements LoggerInterface
{

    // Simulate database logging
    public function log(string $message): void
    {
        // In a real scenario, this is where you would insert into a database
        echo "Saving to database: " . $message . "\n";
    }
}


$fileLogger = new FileLogger('app.log');
$fileLogger->log('This is a file log entry.');
echo "File log entry has been written.\n";

// Example usage of DatabaseLogger
$databaseLogger = new DatabaseLogger();
$databaseLogger->log('This is a database log entry.');