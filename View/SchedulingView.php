<?php
class SchedulingView
{

    public function exibirPaginaAgendamento()
    {
        echo "
            <form action='/agendar' method='post'>
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
            <a href='/editar/$id'>Editar</a>
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
            <form action='/editar/$id' method='post'>
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
        echo "<table>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Hora de Início</th>
            <th>Hora de Fim</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>";

        foreach ($agendamentos as $agendamento) {
            $id = $agendamento['id'];
            $data = $agendamento['data'];
            $hora_inicio = $agendamento['hora_inicio'];
            $hora_fim = $agendamento['hora_fim'];
            $descricao = $agendamento['descricao'];

            echo "
        <tr>
            <td>$id</td>
            <td>$data</td>
            <td>$hora_inicio</td>
            <td>$hora_fim</td>
            <td>$descricao</td>
            <td>
                <a href='/visualizar/$id'>Visualizar</a>
                <a href='/editar/$id'>Editar</a>
                <a href='/excluir/$id'>Excluir</a>
            </td>
        </tr>";
        }

        echo "</table>";
    }


    public function exibirMensagem($mensagem)
    {
        echo "<p class='mensagem'>$mensagem</p>";
    }
}
