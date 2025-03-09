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
            <form method="POST" action="src/Controle/processar-cadastro.php">
                <div class="fields-area">
                    <div class="input-label">
                        <label for="nome_usuario">Nome de usuário</label>
                        <input id="nome_usuario" type="text" placeholder="nome de usuário" name="nome_usuario" required>
                        <span id="nome_usuario-feedback"></span>
                    </div>
                    <div class="input-label">
                        <label for="email">Email</label>
                        <input id="email" type="text" placeholder="email@dominio.com" name="email" required>
                        <span id="email-feedback"></span>
                    </div>
                    <div class="input-label">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" placeholder="digite sua senha" name="senha" required>
                    </div>
                    <input type="submit" value="Registrar" class="btn-entrar">
                </div>
            </form>
        </div>
    </main>

    <script src="./assets/js/registro.js"></script>
</body>
</html>