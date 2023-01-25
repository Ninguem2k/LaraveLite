<?php include_once "View\layouts\Heder.php" ?>
<header>
    <title>Home</title>
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

    <section id="destaque" style="margin-top: 4.5rem;">
        <div class="container">
            <h2 class="text-center top-30">Destaque</h2>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center flex-wrap">
                    <img src="public\acents\imgs\barba.jpg" alt="Corte de Cabelo 1" class="img-fluid m-5 " width="350">

                </div>
                <div class="col-md-6 d-flex justify-content-center flex-wrap">
                    <img src="public\acents\imgs\corte.jpg" alt="Corte de Cabelo 2" class="img-fluid m-5 " width="350">

                </div>
                <div class="col-md-6 d-flex justify-content-center flex-wrap">
                    <img src="public\acents\imgs\limpeza.jpg" alt="Corte de Cabelo 3" class="img-fluid m-5 " width="350">

                </div>
                <div class="col-md-6 d-flex justify-content-center flex-wrap">
                    <img src="public\acents\imgs\sobrancelha.jpg" alt="Corte de Cabelo 3" class="img-fluid m-5 " width="350">

                </div>
            </div>
            <div class="text-center">
                <a href="<?PHP $_SERVER['HTTP_HOST'] ?>/agendar" class="btn btn-primary">Agende hoje!</a>
            </div>
        </div>
    </section>
    <section style="margin-top: 3rem;" id="servicos">
        <div class="container">
            <h2 class="text-center">Serviços</h2>
            <div class="row">
                <div class="col-md-4">
                    <h3>Cortes de Cabelo</h3>
                    <p>Oferecemos cortes de cabelo masculinos personalizados para atender às suas necessidades.</p>
                </div>
                <div class="col-md-4">
                    <h3>Barba</h3>
                    <p>Oferecemos serviços de barba, como aparar, modelar e pentear.</p>
                </div>
                <div class="col-md-4">
                    <h3>Limpeza de pele</h3>
                    <p>Oferecemos serviços de barba, como aparar, modelar e pentear.</p>
                </div>
                <div class="col-md-4">
                    <h3>Sobrancelha</h3>
                    <p>Oferecemos serviços de barba, como aparar, modelar e pentear.</p>
                </div>
                <div class="col-md-4">
                    <h3>Penteado</h3>
                    <p>Oferecemos serviços de barba, como aparar, modelar e pentear.</p>
                </div>
                <div class="col-md-4">
                    <h3>Outros Serviços</h3>
                    <p>Oferecemos outros serviços, como coloração e penteados.</p>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 3rem;" id="produtos">
        <div class="container">
            <h2 class="text-center"> Produtos</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="public\acents\imgs\91Lf-MNHcxS.jpg" alt=" Produto 1" class="img-fluid">
                    <h3>Produto 1</h3>
                    <p>Descrição do produto 1</p>
                </div>
                <div class="col-md-4">
                    <img src="public\acents\imgs\81ONSzIsfdL._SX425_.jpg" alt="Produto 2" class="img-fluid">
                    <h3>Produto 2</h3>
                    <p>Descrição do produto 2</p>
                </div>
                <div class="col-md-4">
                    <img src="public\acents\imgs\U02c9115a6d5c4cc6ba32785861cb9a1ci.jpg" alt="Produto 3" class="img-fluid">
                    <h3>Produto 3</h3>
                    <p>Descrição do produto 3</p>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 3rem;" id="avaliacoes">
        <div class="container">
            <h2 class="text-center">Avaliações de Clientes</h2>
            <div class="row">
                <div class="col-md-4">
                    <blockquote>
                        <p>Fiz o corte com o João e ficou incrível! Ele é muito atencioso e profissional.</p>
                        <footer>Cliente 1</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote>
                        <p>Adorei a experiência no salão. O atendimento foi excelente e o corte ficou perfeito.</p>
                        <footer>Cliente 2</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote>
                        <p>Recomendo o salão! O João é muito talentoso e fez um ótimo trabalho com minha barba.</p>
                        <footer>Cliente 3</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <?php include_once "View\layouts\Footer.php" ?>