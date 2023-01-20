<?php
class RegisterView
{
    public function displayRegistro($errors = [])
    {
        echo '
            <form action="cadastrar" method="post">
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
                <div class="form-group">
                    <label>Confirme a Senha</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="error">' . $errors['confirm_password_err'] . '</span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
                <p>Já tem uma conta? <a href="logar">Faça login agora</a>.</p>
            </form>
        ';
    }
}
