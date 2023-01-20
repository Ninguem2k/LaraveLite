<?php
require_once "../Model/SchedulingModel.php";
require_once "../View/SchedulingView.php";

class SchedulingController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new SchedulingModel();
        $this->view = new SchedulingView();
    }

    public function agendar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST["data"];
            $horaInicio = $_POST["hora_inicio"];
            $horaFim = $_POST["hora_fim"];
            $descricao = $_POST["descricao"];
            if ($this->model->verificarDisponibilidade($data, $horaInicio, $horaFim)) {
                if ($this->model->agendar($data, $horaInicio, $horaFim, $descricao)) {
                    $this->view->exibirMensagem("Agendamento criado com sucesso!");
                } else {
                    $this->view->exibirMensagem("Ops! Algo deu errado. Por favor, tente novamente mais tarde.");
                }
            } else {
                $this->view->exibirMensagem("Este horário já está reservado.");
            }
        } else {
            $this->view->exibirPaginaAgendamento();
        }
    }

    public function visualizar($id)
    {
        $agendamento = $this->model->obterAgendamentoPorId($id);
        if ($agendamento) {
            $this->view->exibirPaginaVisualizacao($agendamento);
        } else {
            $this->view->exibirMensagem("Agendamento não encontrado.");
        }
    }

    public function editar($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST["data"];
            $horaInicio = $_POST["hora_inicio"];
            $horaFim = $_POST["hora_fim"];
            $descricao = $_POST["descricao"];
            if ($this->model->verificarDisponibilidade($data, $horaInicio, $horaFim, $id)) {
                if ($this->model->atualizarAgendamento($id, $data, $horaInicio, $horaFim, $descricao)) {
                    $this->view->exibirMensagem("Agendamento atualizado com sucesso!");
                } else {
                    $this->view->exibirMensagem("Ops! Algo deu errado. Por favor, tente novamente mais tarde.");
                }
            } else {
                $this->view->exibirMensagem("Este horário já está reservado.");
            }
        } else {
            $agendamento = $this->model->obterAgendamentoPorId($id);
            if ($agendamento) {
                $this->view->exibirPaginaEdicao($agendamento);
            } else {
                $this->view->exibirMensagem("Agendamento não encontrado.");
            }
        }
    }

    public function excluir($id)
    {
        if ($this->model->excluirAgendamento($id)) {
            $this->view->exibirMensagem("Agendamento excluído com sucesso!");
        } else {
            $this->view->exibirMensagem("Ops! Algo deu errado. Por favor, tente novamente mais tarde.");
        }
    }

    public function listar()
    {
        $agendamentos = $this->model->obterAgendamentos();
        $this->view->exibirPaginaListagem($agendamentos);
    }
}