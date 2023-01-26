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


    <div class="d-flex  align-items-center justify-content-center" style="height: 100vh;">

        <form action='/pedido/agendar' method='post'>

            <center>
                <input type="button" class="m-2" value="Horarios disponiveis">
            </center>
            <div class=" form-group">
                <label>Data:</label>
                <input type='date' name='data' class="form-control">
            </div>

            <div class="form-group">
                <label>Hora de Início:</label>
                <input type='time' name='hora_inicio' class="form-control">
            </div>

            <?php if (isset($exibirMensagem)) { ?>
                <label style="color:yellowgreen"><?php echo ($exibirMensagem) ?></label>
            <?php } ?>

            <div class="form-group" style="display: none;">
                <label>Hora de Fim:</label>
                <input type='time' name='hora_fim' class="form-control">
            </div>

            <div>
                <p class="textoservico">Selecione o Serviço:</p>
            </div>
            <select name="servico" class="servico" id="servico">
                <option value="" time="10" selected>Selecionar</option>
                <option value="Corte Masculino" time="10">Corte Masculino</option>
                <option value="Limpeza de Rosto" time="20">Limpeza de Rosto</option>
                <option value="Fazer a Barba" time="15">Fazer a Barba</option>
            </select>
            <div class="form-group">
            </div>

            <input type='submit' value='Agendar' class="btn btn-primary m-3">
        </form>
    </div>

</div>
<script>
    var select = document.getElementById('servico')

    select.addEventListener('change', function() {
        console.log(select.value)
    })
</script>
<?php include_once "View\layouts\Footer.php" ?>