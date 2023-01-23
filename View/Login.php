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
?>
<form action="logar" method="post" style="margin-top: 4.5rem;">
    <div class="form-group">
        <label>Nome de usuário</label>
        <input type="text" name="username" class="form-control" value="<?php $_POST['username'] ?>">
        <span class="error"><?php echo ($errors['username_err']) ?></span>
    </div>
    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="password" class="form-control">
        <span class="error"><?php echo ($errors['password_err']) ?></span>
    </div>
    <div>

    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Login">
    </div>
    <p>Não tem uma conta? <a href="cadastrar">Cadastre-se agora</a>.</p>
</form>