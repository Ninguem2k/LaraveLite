<?php
if (isset($_POST['username'])) {
    $_POST['username'];
} else {
    $_POST['username'] = null;
}
if (isset($errors['username_err'])) {
    $errors['username_err'];
} else {
    $errors['username_err'] = null;
}
if (isset($errors['password_err'])) {
    $errors['password_err'];
} else {
    $errors['password_err'] = null;
}
if (isset($errors['confirm_password_err'])) {
    $errors['confirm_password_err'];
} else {
    $errors['confirm_password_err'] = null;
}
// $arrayErros = ["username_err", "password_err", "confirm_password_err"];
// $_POST['username'] = isset($_POST['username']) ? $_POST['username'] : NULL;
// foreach ($arrayErros as $key => $value) {
//     $errors[$key] = isset($errors[$arrayErros[$key]]) ? $errors[$arrayErros[$key]] : null;
// }
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link href="public\acents\css\login.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin" id="corpo-form">
        <form action="cadastrar" method="post">
            <div class="form-group">
                <label for="username">Nome de Usuario</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Nome de usuário" value="<?php $_POST['username'] ?>">
                <span class="error"><?php echo ($errors['username_err']) ?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Whatsapp</label>
                <input type="text" name="whatsapp" class="form-control" id="exampleInputWhatsapp1" placeholder="(99) 99999-9999">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                <span class="error"><?php echo ($errors['password_err']) ?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirme a Senha</label>
                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="repita sua Senha">
                <span class="error"><?php echo ($errors['confirm_password_err']) ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Logar</button>
            <p>Já tem uma conta? <a href="logar">Faça login agora</a>.</p>
        </form>
    </main>
</body>

</html>

</html>