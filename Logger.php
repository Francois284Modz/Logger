<?php


class Logger {
    private $logDirectory;    // Directory where log files will be stored
    private $logFileName;     // Name of the log file

    public function __construct($logFileName) {
        $this->logFileName = $logFileName;
        $this->logDirectory = 'logs'; // Default directory name for log files

        // Create the log directory if it doesn't exist
        if (!file_exists($this->logDirectory)) {
            mkdir($this->logDirectory, 0755, true); // Create recursively with proper permissions
        }

        // Create the log file if it doesn't exist
        $this->logFilePath = $this->logDirectory . '/' . $this->logFileName;
        if (!file_exists($this->logFilePath)) {
            touch($this->logFilePath); // Create an empty log file
        }
    }

    // Private method to log a message with a specified log level
    private function logMessage($message, $logLevel) {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] [$logLevel] $message\n";

        // Append the log entry to the log file
        file_put_contents($this->logFilePath, $logEntry, FILE_APPEND);
    }

    // Log an "INFO" level message
    public function info($message) {
        $this->logMessage($message, 'INFO');
    }

    // Log a "DEBUG" level message
    public function debug($message) {
        $this->logMessage($message, 'DEBUG');
    }

    // Log an "ERROR" level message
    public function error($message) {
        $this->logMessage($message, 'ERROR');
    }

    // Log a "WARNING" level message
    public function warning($message) {
        $this->logMessage($message, 'WARNING');
    }

    // Read the content of the log file
    public function readLogs() {
        if ($this->fileExists()) {
            return file_get_contents($this->logFilePath);
        } else {
            return "Log file not found.";
        }
    }

    // Delete the log file (if it exists)
    public function deleteLogFile() {
        if ($this->fileExists()) {
            unlink($this->logFilePath);
        }
    }

    // Check if the log file exists
    public function fileExists() {
        return file_exists($this->logFilePath);
    }
}

// Usage example:
$logFileName = 'myapp.log';
$logger = new Logger($logFileName);
$logger->info('This is an info message.');
$logContent = $logger->readLogs();
echo nl2br(htmlspecialchars($logContent));
$logger->deleteLogFile();
?>
