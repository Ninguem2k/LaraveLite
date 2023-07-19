<?php

namespace Vendor\Core;

use Vendor\Core\ErrorLogger;

class OpenEnv
{
    protected $envData = [];
    protected $logger;

    public function __construct($filePath)
    {
        if (!file_exists($filePath)) {
            echo ("Arquivo .env não encontrado em $filePath");
        }

        $this->parseEnvFile($filePath);
    }

    protected function parseEnvFile($filePath)
    {
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $this->parseEnvLine($line);
        }
    }

    protected function parseEnvLine($line)
    {
        if (strpos(trim($line), '#') === 0 || empty($line)) {
            return;
        }

        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if (strpos($value, '"') === 0 || strpos($value, "'") === 0) {
            $value = trim($value, '"\'');
        }

        $this->envData[$key] = $value;
    }

    public function getEnvData()
    {
        return $this->envData;
    }
}
