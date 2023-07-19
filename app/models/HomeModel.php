<?php

namespace App\Models;

use Config\Database;
use PDO;
use PDOException;

require_once "./config/database.php";

class HomeModel
{
    protected $con;

    public function __construct()
    {
        $this->con = new Database();
    }

    #Exemplo de uma metodo que busca informação no servidor!
    public function getData()
    {
        $data = [];
        try {
            $sql = "SELECT * FROM users LIMIT 1";
            $stmt = $this->con->prepare($sql);

            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    $data = [
                        'title' => $row["username"],
                        'content' => $row["role"]
                    ];
                }
            }
        } catch (PDOException $e) {
            return ["Erro" => "Erro :" . $e];
        }

        return $data;
    }
}
