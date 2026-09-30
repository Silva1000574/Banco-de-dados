<?php
session_start();
require "conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$usuario = trim($_POST["usuario"] ?? "");
$senha   = $_POST["senha"] ?? "";

// Testes 4 e 5: campos vazios
if ($usuario === "" || $senha === "") {
    $_SESSION['erro'] = "Preencha o usuário e a senha!";
    header("Location: index.php");
    exit;
}

// Consulta com prepared statement
$stmt = $conn->prepare("SELECT id, usuario, senha FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$dados = $resultado->fetch_assoc();

// Testes 1, 2 e 3
if ($dados && password_verify($senha, $dados["senha"])) {
    session_regenerate_id(true);
    $_SESSION["usuario_id"] = $dados["id"];
    $_SESSION["usuario"]    = $dados["usuario"];
    header("Location: painel.php");
    exit;
}

$_SESSION['erro'] = "Usuário ou senha inválidos!";
header("Location: index.php");
exit;