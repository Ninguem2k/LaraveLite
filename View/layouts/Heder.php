<?PHP session_start(); ?>
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
                <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
                    <div class="d-flex">
                        <label class="form-control me-2">Visitante</label>
                        <a href="logar" style="text-decoration: none;">
                            <button class=" btn btn-outline-success" type="submit">Logar</button>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="d-flex">
                        <label class="form-control me-2"><?php echo $_SESSION['username']; ?></label>
                        <a href="Controller\LogoutController.php" style="text-decoration: none;">
                            <button class=" btn btn-outline-danger" type="submit">Sair</button>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>
</header>

<body>