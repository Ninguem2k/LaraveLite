<?php
class SchedulingView
{

    public function exibirPaginaAgendamento()
    {
        echo "
                <form action='/pedido/agendar' method='post'>

                <label>Data:</label>
                <input type='date' name='data'>

                <label>Hora de Início:</label>
                <input type='time' name='hora_inicio'>

                <label>Hora de Fim:</label>
                <input type='time' name='hora_fim'>

                <label>Descrição:</label>
                <textarea name='descricao'></textarea>

                <input type='submit' value='Agendar'>
           </form>";
    }

    public function exibirPaginaVisualizacao($agendamento)
    {
        $id = $agendamento['id'];
        $data = $agendamento['data'];
        $hora_inicio = $agendamento['hora_inicio'];
        $hora_fim = $agendamento['hora_fim'];
        $descricao = $agendamento['descricao'];

        echo "
            <p>ID: $id</p>
            <p>Data: $data</p>
            <p>Hora de Início: $hora_inicio</p>
            <p>Hora de Fim: $hora_fim</p>
            <p>Descrição: $descricao</p>
            <a href='/pedido/editar/$id'>Editar</a>
            ";
    }

    public function exibirPaginaEdicao($agendamento)
    {
        $id = $agendamento['id'];
        $data = $agendamento['data'];
        $hora_inicio = $agendamento['hora_inicio'];
        $hora_fim = $agendamento['hora_fim'];
        $descricao = $agendamento['descricao'];

        echo "
            <form action='/pedido/editar/$id' method='post'>
                <label>Data:</label>
                <input type='date' name='data' value='$data'>

                <label>Hora de Início:</label>
                <input type='time' name='hora_inicio' value='$hora_inicio'>

                <label>Hora de Fim:</label>
                <input type='time' name='hora_fim' value='$hora_fim'>

                <label>Descrição:</label>
                <textarea name='descricao'>$descricao</textarea>

                <input type='submit' value='Salvar'>
            </form>";
    }

    public function exibirPaginaListagem($agendamentos)
    {
        $pagina = "View\Agenda.php";
        return include('View\layouts\defalt.php');
    }


    public function exibirMensagem($mensagem)
    {
        echo "<p class='mensagem'>$mensagem</p>";
    }
}
