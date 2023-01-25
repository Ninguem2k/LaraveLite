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
}
