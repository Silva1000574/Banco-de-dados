<?php
require "conexao.php";

$usuarios = [
    ["ana",   "1234"],
    ["bruno", "abcd"],
    ["carla", "senha123"],
];

$stmt = $conn->prepare("INSERT INTO usuarios (usuario, senha) VALUES (?, ?)");

foreach ($usuarios as [$u, $s]) {
    $hash = password_hash($s, PASSWORD_DEFAULT);
    $stmt->bind_param("ss", $u, $hash);
    $stmt->execute();
    echo "Usuário $u cadastrado.<br>";
}