<?php
session_start();
$erro = $_SESSION['erro'] ?? '';
unset($_SESSION['erro']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="caixa">
        <h1>Acesso ao Sistema</h1>

        <?php if ($erro): ?>
            <p class="msg erro"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha">

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>