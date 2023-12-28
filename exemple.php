<?php
require_once 'Logger.php'; // Include the Logger class file

// Create a log file named "myapp.log" inside the "logs" directory
$logFileName = 'myapp.log';
$logger = new Logger($logFileName);

// Log messages with different levels
$logger->info('This is an INFO message.');
$logger->debug('This is a DEBUG message.');
$logger->error('This is an ERROR message.');
$logger->warning('This is a WARNING message.');

// Reading and displaying log content
$logContent = $logger->readLogs();
echo nl2br(htmlspecialchars($logContent));

// Delete the log file (and create it if it doesn't exist)
$logger->deleteLogFile();
?>
