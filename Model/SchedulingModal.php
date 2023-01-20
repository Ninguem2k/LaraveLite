<?php
class SchedulingModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function verificarDisponibilidade($data, $horaInicio, $horaFim)
    {
        $sql = "SELECT COUNT(id) FROM agendamentos WHERE data = :data AND (hora_inicio <= :hora_fim AND hora_fim >= :hora_inicio)";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":data", $param_data, PDO::PARAM_STR);
            $stmt->bindParam(":hora_inicio", $param_hora_inicio, PDO::PARAM_STR);
            $stmt->bindParam(":hora_fim", $param_hora_fim, PDO::PARAM_STR);
            $param_data = $data;
            $param_hora_inicio = $horaInicio;
            $param_hora_fim = $horaFim;
            if ($stmt->execute()) {
                return ($stmt->fetchColumn() == 0);
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
    }

    public function agendar($data, $horaInicio, $horaFim, $descricao)
    {
        $sql = "INSERT INTO agendamentos (data, hora_inicio, hora_fim, descricao) VALUES (:data, :hora_inicio, :hora_fim, :descricao)";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":data", $param_data, PDO::PARAM_STR);
            $stmt->bindParam(":hora_inicio", $param_hora_inicio, PDO::PARAM_STR);
            $stmt->bindParam(":hora_fim", $param_hora_fim, PDO::PARAM_STR);
            $stmt->bindParam(":descricao", $param_descricao, PDO::PARAM_STR);
            $param_data = $data;
            $param_hora_inicio = $horaInicio;
            $param_hora_fim = $horaFim;
            $param_descricao = $descricao;
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
    }

    public function obterAgendamentos()
    {
        $sql = "SELECT * FROM agendamentos ORDER BY data, hora_inicio";
        $agendamentos = array();
        if ($stmt = $this->pdo->prepare($sql)) {
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $agendamentos[] = $row;
                }
                return $agendamentos;
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
    }
    public function obterAgendamentoPorId($id)
    {
        $sql = "SELECT * FROM agendamentos WHERE id = :id";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            $param_id = $id;
            if ($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
    }

    public function atualizarAgendamento($id, $data, $horaInicio, $horaFim, $descricao)
    {
        $sql = "UPDATE agendamentos SET data = :data, hora_inicio = :hora_inicio, hora_fim = :hora_fim, descricao = :descricao WHERE id = :id";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            $stmt->bindParam(":data", $param_data, PDO::PARAM_STR);
            $stmt->bindParam(":hora_inicio", $param_hora_inicio, PDO::PARAM_STR);
            $stmt->bindParam(":hora_fim", $param_hora_fim, PDO::PARAM_STR);
            $stmt->bindParam(":descricao", $param_descricao, PDO::PARAM_STR);
            $param_id = $id;
            $param_data = $data;
            $param_hora_inicio = $horaInicio;
            $param_hora_fim = $horaFim;
            $param_descricao = $descricao;
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
    }

    public function excluirAgendamento($id)
    {
        $sql = "DELETE FROM agendamentos WHERE id = :id";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            $param_id = $id;
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
    }
}
