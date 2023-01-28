<?php include_once "View\layouts\Heder.php" ?>

<head>
    <title>Agenda</title>
    <style>
        input[type=submit] {

            background-color: #F8A428;
            border: none;
            cursor: pointer;
            width: 200px;
            height: 40px;
            font-family: 'Alex Brush';
            border-radius: 70px;

        }
    </style>
</head>

<div class="container-fluid text-center" style="margin-top: 3.5rem ;  background-color: #212529fa; ">

    <?=
    $id = $agendamento['id'];
    $data = $agendamento['data'];
    $hora_inicio = $agendamento['hora_inicio'];
    $hora_fim = $agendamento['hora_fim'];
    $servico = $agendamento['servico']; ?>

    <div class="d-flex  align-items-center justify-content-center" style="height: 100vh;">

        <form action='/pedido/editar/<?php echo $agendamento['id'] ?>' id="form" method='post'>
            <div class=" form-group">
                <label>Data:</label>
                <input type='date' name='data' id="data" value='<?php echo $data ?>' class="form-control" required>
            </div>

            <div class="form-group">

                <label>Hora de Início:</label>

                <input type='time' name='hora_inicio' id="timeInicial" value="<?php echo $agendamento['hora_inicio'] ?>" class="form-control" required>
            </div>

            <?php if (isset($exibirMensagem)) { ?>
                <label style="color:yellowgreen"><?php echo ($exibirMensagem) ?></label>
            <?php } ?>

            <div class="form-group" style="display: block;">
                <label>Hora de Fim:</label>
                <input type='time' name='hora_fim' id="timeFinal" value="<?php echo $agendamento['hora_fim']  ?>" class="form-control">
            </div>

            <div>
                <p class="textoservico">Selecione o Serviço:</p>
            </div>
            <select name="servico" class="servico" id="servico" value="<?php echo $agendamento['servico']  ?>" required>
                <option value="" data-time="0" selected>Selecionar</option>
                <option value="Corte Masculino" data-time="10">Corte Masculino</option>
                <option value="Limpeza de Rosto" data-time="20">Limpeza de Rosto</option>
                <option value="Fazer a Barba" data-time="15">Fazer a Barba</option>
            </select>

            <input type='submit' value='Atualizar' class="btn btn-primary m-3">
        </form>
    </div>

</div>
<script>
    var form = document.getElementById('form');
    var serviceSelect = document.getElementById('servico');
    var initialTimeInput = document.getElementById('timeInicial');
    var finalTimeInput = document.getElementById('timeFinal');

    serviceSelect.addEventListener('change', function() {
        var selectedOption = this.querySelector('option:checked');
        var time = parseInt(selectedOption.getAttribute('data-time'));

        var initialTime = new Date();
        var initialHours = initialTimeInput.value.split(":")[0];
        var initialMinutes = initialTimeInput.value.split(":")[1];
        initialTime.setHours(initialHours);
        initialTime.setMinutes(initialMinutes);
        var finalTime = new Date(initialTime.getTime() + time * 60000);
        finalTimeInput.value = new Date(finalTime).toLocaleTimeString([], {
            hour: '2-digit',
            minute: '2-digit'
        });
        console.log(finalTimeInput);
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        if (!initialTimeInput.value || !finalTimeInput.value || !serviceSelect.value) {
            alert('Por favor, preencha todos os campos de horário.');
            return;
        }
        form.submit();
    });
</script>
<?php include_once "View\layouts\Footer.php" ?>