<?php

namespace Vendor\Core;

class ErrorLogger
{
    public function logError($message)
    {

        $logFile = __DIR__ . '\..\..\public\logs\error.log';
        $logMessage = date('[Y-m-d H:i:s]') . ' ' . $message . "\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
        header("Location:/404");
        exit;
    }
}
