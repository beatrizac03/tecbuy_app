<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login/login.css">
    <title>Login | Tecbuy </title>
</head>
<body>
    <div class="banner-auth">

    </div>
    <main>
        <div class="container">
            <h1>LOGIN</h1>
            <form id="form-login">
                <div class="fields-area">
                    <div class="input-label">
                        <label for="email-nomeusuario">Email ou Nome de usuário</label>
                        <input id="email-nomeusuario" type="text" placeholder="email@dominio.com ou nome de usuário" name="email-nomeusuario" required>
                    </div>
                    <div class="input-label">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" placeholder="digite sua senha" name="senha" required>
                    </div>
                    <span id="feedback-login"></span>
                    <input name="logar-usuario" type="submit" value="Entrar" class="btn-entrar">
                </div>
            </form>
        </div>
    </main>

    <script src="./assets/js/login.js"></script>
</body>
</html>