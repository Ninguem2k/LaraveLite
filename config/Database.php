<?php

namespace Config;

use PDO;
use PDOException;
use Vendor\Core\OpenEnv;
use Vendor\Core\ErrorLogger;

require_once "./vendor/core/OpenEnv.php";
require_once "./vendor/core/ErrorHandling.php";

class Database extends PDO
{
    public function __construct()
    {
        $dotenvParser = new OpenEnv(__DIR__ . '/../.env');
        $_ENV = $dotenvParser->getEnvData();

        try {
            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_DATABASE'];
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];

            $dsn = "mysql:host=$host;dbname=$dbname";
            parent::__construct($dsn, $username, $password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $errorLogger = new ErrorLogger();
            $errorLogger->logError('Database connection error: ' . $e->getMessage());

            exit('Erro ao conectar a Database.');
        }
    }
}
