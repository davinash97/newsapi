<?php

class ErrorLogger
{
    public static function logError($errorMessage) {
        $logFile = 'error.log';
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] $errorMessage" . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND);
    }

    public static function handleException($exception) {
        $errorMessage = 'Exception: ' . $exception->getMessage() . ' in ' . $exception->getFile() . ' on line ' . $exception->getLine();
        self::logError($errorMessage);
    }
}

set_error_handler([ErrorLogger::class, 'logError']);
set_exception_handler([ErrorLogger::class, 'handleException']);

?>