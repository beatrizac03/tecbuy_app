<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registro/registro.css">
    <title>Registro</title>
</head>
<body>
    <div class="banner-auth">

    </div>
    <main>
        <div class="container">
            <h1>Crie uma conta</h1>
            <form id="signup_form">
                <div class="fields-area">
                    <div class="input-label">
                        <label for="username*">Nome de usuário</label>
                        <input id="username" name="username" type="text" placeholder="Nome de usuário" required>
                        <span id="username-feedback"></span>
                    </div>
                    <div class="input-label">
                        <label for="email">Email</label>
                        <input id="email" type="text" placeholder="email@dominio.com" name="email" required>
                        <span id="email-feedback"></span>
                    </div>
                    <div class="input-label">
                        <label for="password">Senha</label>
                        <input id="password" type="password" placeholder="digite sua senha" name="password" required>
                    </div>
                    <input type="submit" value="Register" class="btn-signup">
                </div>
            </form>
        </div>
    </main>

    <script src="/../../public/assets/js-2/registro.js"></script>
</body>
</html>