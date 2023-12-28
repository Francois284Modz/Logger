# PHP Logger

A simple PHP class for logging messages with different log levels and managing log files.

## Usage

1. **Include the Logger class:**

    ```php
    require_once 'Logger.php';
    ```

2. **Create a Logger instance:**

    ```php
    $logFileName = 'myapp.log';
    $logger = new Logger($logFileName);
    ```

3. **Log messages:**

   - Log an "INFO" level message:

     ```php
     $logger->info('This is an INFO message.');
     ```

   - Log a "DEBUG" level message:

     ```php
     $logger->debug('This is a DEBUG message.');
     ```

   - Log an "ERROR" level message:

     ```php
     $logger->error('This is an ERROR message.');
     ```

   - Log a "WARNING" level message:

     ```php
     $logger->warning('This is a WARNING message.');
     ```

4. **Read and display log content:**

    ```php
    $logContent = $logger->readLogs();
    echo nl2br(htmlspecialchars($logContent));
    ```

5. **Delete the log file (and create it if it doesn't exist):**

    ```php
    $logger->deleteLogFile();
    ```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
