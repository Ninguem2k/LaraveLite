<?php


class LoginView
{
    public function displayLogin($errors = [])
    {
        echo '
                <form action="logar" method="post">
                    <div class="form-group">
                        <label>Nome de usuário</label>
                        <input type="text" name="username" class="form-control" value="' . $_POST['username'] . '">
                        <span class="error">' . $errors['username_err'] . '</span>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="password" class="form-control">
                        <span class="error">' . $errors['password_err'] . '</span>
                    </div>
                    <div <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>Não tem uma conta? <a href="cadastrar">Cadastre-se agora</a>.</p>
                </form>
        ';
    }
}
