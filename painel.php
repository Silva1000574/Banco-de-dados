<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="caixa">
        <h1>Bem-vindo ao Sistema!</h1>
        <p class="msg ok">Login realizado com sucesso! Bem-vindo ao sistema.</p>
        <p>Usuário logado: <strong><?= htmlspecialchars($_SESSION["usuario"]) ?></strong></p>
        <a class="botao" href="logout.php">Sair</a>
    </div>
</body>
</html>