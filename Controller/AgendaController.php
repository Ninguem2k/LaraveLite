<?php

require_once "Class\kernel.php";
require_once "./Model/SchedulingModal.php";

class AgendaController extends kernel
{

    private $model;

    public function __construct()
    {
        $this->model = new SchedulingModel();
    }

    public function crete()
    {
        return $this->view('View\Agendar.php', []);
    }

    public function store()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST["data"];
            $horaInicio = $_POST["hora_inicio"];
            $horaFim = $_POST["hora_fim"];
            $servico = $_POST["servico"];

            if ($this->model->verificarDisponibilidade($data, $horaInicio, $horaFim)) {
                if ($this->model->agendar($data, $horaInicio, $horaFim, $servico)) {
                    return $this->view('View\Agendar.php', ["exibirMensagem" => "Agendamento criado com sucesso!"]);
                } else {
                    return $this->view('View\Agendar.php', ["exibirMensagem" => "Ops! Algo deu errado. Por favor, tente novamente mais tarde."]);
                }
            } else {
                return $this->view('View\Agendar.php', ["exibirMensagem" => "Este horário já está reservado."]);
            }
        } else {
            return $this->view('View\Agendar.php', []);
        }
    }

    public function show()
    {
        $agendamentos = $this->model->obterAgendamentos();
        return $this->view('View\Agenda.php', ["agendamentos" => $agendamentos]);
    }

    public function userShow()
    {
        $agendamentos = $this->model->obterAgendamentosUser();
        return $this->view('View\UserAgenda.php', ["agendamentos" => $agendamentos]);
    }

    public function index($id)
    {
        $agendamento = $this->model->obterAgendamentoPorId($id);
        $user =  $this->model->relacionamentoUserAgenda($id);
        if ($agendamento) {
            return $this->view('View\VisualizarSevico.php', ["agendamento" => $agendamento, "user" => $user]);
        } else {
            return $this->view('View\VisualizarSevico.php', ["exibirMensagem" => "Agendamento não encontrado"]);
        }
    }

    public function destroy($id)
    {
        $agendamentos = $this->model->obterAgendamentos();
        if ($this->model->excluirAgendamento($id)) {
            return $this->view('View\Agenda.php', ["exibirMensagem" => "Agendamento excluído com sucesso!", "agendamentos" => $agendamentos]);
        } else {
            return $this->view('View\Agenda.php', ["exibirMensagem" => "Ops! Algo deu errado. Por favor, tente novamente mais tarde.", "agendamentos" => $agendamentos]);
        }
    }

    public function update($id)
    {
        $agendamentos = $this->model->obterAgendamentos();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST["data"];
            $horaInicio = $_POST["hora_inicio"];
            $horaFim = $_POST["hora_fim"];
            $servico = $_POST["servico"];
            if ($this->model->verificarDisponibilidade($data, $horaInicio, $horaFim, $id)) {
                if ($this->model->atualizarAgendamento($id, $data, $horaInicio, $horaFim, $servico)) {
                    $MSG = "Agendamento atualizado com sucesso!";
                } else {
                    $MSG = "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
                }
            } else {
                $MSG = "Este horário já está reservado.";
            }
        } else {
            $agendamento = $this->model->obterAgendamentoPorId($id);
            if ($agendamento) {
                return $this->view('View\EditarServico.php', ["agendamento" => $agendamento, "id_servico" => $id]);
            } else {
                $MSG = "Agendamento não encontrado";
            }
        }
        return $this->view('View\Agenda.php', ["exibirMensagem" => $MSG, "agendamentos" => $agendamentos]);
    }
}
