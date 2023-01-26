<?php



require_once "./Config/Config.php";
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

    public function agendar($data, $horaInicio, $horaFim, $servico)
    {
        $sql = "INSERT INTO agendamentos (user_id,data, hora_inicio, hora_fim, servico) VALUES (:user_id,:data, :hora_inicio, :hora_fim, :servico)";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":user_id", $param_user_id, PDO::PARAM_STR);
            $stmt->bindParam(":data", $param_data, PDO::PARAM_STR);
            $stmt->bindParam(":hora_inicio", $param_hora_inicio, PDO::PARAM_STR);
            $stmt->bindParam(":hora_fim", $param_hora_fim, PDO::PARAM_STR);
            $stmt->bindParam(":servico", $param_servico, PDO::PARAM_STR);

            session_start();
            $param_user_id = $_SESSION['id'];
            $param_data = $data;
            $param_hora_inicio = $horaInicio;
            $param_hora_fim = $horaFim;
            $param_servico = $servico;
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

    public function obterAgendamentosUser()
    {
        session_start();
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM agendamentos WHERE user_id = $id ORDER BY data, hora_inicio";
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


    public function relacionamentoUserAgenda($user_id)
    {

        $sql = "SELECT users.username
            FROM users
            JOIN agendamentos ON users.id = agendamentos.user_id
            WHERE agendamentos.id = $user_id;
            SELECT users.username, agendamentos.id
            FROM users
            JOIN agendamentos ON users.id = agendamentos.user_id
            WHERE agendamentos.id = $user_id";
        if ($stmt = $this->pdo->prepare($sql)) {
            if ($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
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

    public function atualizarAgendamento($id, $data, $horaInicio, $horaFim, $servico)
    {
        $sql = "UPDATE agendamentos SET data = :data, hora_inicio = :hora_inicio, hora_fim = :hora_fim, servico = :servico WHERE id = :id";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            $stmt->bindParam(":data", $param_data, PDO::PARAM_STR);
            $stmt->bindParam(":hora_inicio", $param_hora_inicio, PDO::PARAM_STR);
            $stmt->bindParam(":hora_fim", $param_hora_fim, PDO::PARAM_STR);
            $stmt->bindParam(":servico", $param_servico, PDO::PARAM_STR);
            $param_id = $id;
            $param_data = $data;
            $param_hora_inicio = $horaInicio;
            $param_hora_fim = $horaFim;
            $param_servico = $servico;
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
