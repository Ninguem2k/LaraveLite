<?PHP session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: Logar");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0A0D1D;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Barbearia do Heitor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pedido/listar">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicos">Servicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produtos">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#avaliacoes">Avaliações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Contato</a>
                    </li>
                </ul>
                <?php if ($_SESSION['loggedin'] == "true") { ?>
                    <div class="d-flex">
                        <label class="form-control me-2"><?php echo $_SESSION['username']; ?></label>
                        <a href="logar" style="text-decoration: none;">
                            <button class=" btn btn-outline-danger" type="submit">Sair</button>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="d-flex">
                        <label class="form-control me-2">Visitante</label>
                        <a href="logar" style="text-decoration: none;">
                            <button class=" btn btn-outline-success" type="submit">Logar</button>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>
</header>

<body>
    <footer id="contato" style="background-color: #0A0D1D; float: bootton;">
        <div class="container">
            <h2 class="text-center text-white">Contato</h2>
            <div class="row  d-flex  align-items-center">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="nome" class="text-white">Nome</label>
                            <input type="text" class="form-control" id="nome">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-white">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="mensagem" class="text-white">Mensagem</label>
                            <textarea class="form-control" id="mensagem"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary m-2">Enviar</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Localização</h5>
                            <p class="card-text">Rua tal, número tal</p>
                            <p class="card-text">Bairro, Cidade - Estado</p>
                            <h5 class="card-title">Redes Sociais</h5>
                            <a href="#">
                                <p class="card-text">Whatsapp: (xx) xxxxx-xxxx</p>
                            </a>
                            <a href="#">
                                <p class="card-text">Instagram: @Babeariadoheitor</p>
                            </a>
                        </div>
                    </div>
                </div>
                <h5 class="text-center text-white">Horários de funcionamento: Segunda a Sábado, das 9h às 19h</h5>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js">
    </script>
</body>

</html>