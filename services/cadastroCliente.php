<?php

require_once "../config/conexao.php";

$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$telefone = $_POST["telefone"] ?? '';
$cep = $_POST["cep"] ?? '';
$rua = $_POST["rua"] ?? '';
$numero = $_POST["numero"] ?? '';
$complemento = $_POST["complemento"] ?? '';

if (
    empty($nome) ||
    empty($email) ||
    empty($telefone) ||
    empty($cep) ||
    empty($rua) ||
    empty($numero)
) {
    echo "Preencha todos os campos obrigatórios!";
    exit;
}

$sql = "INSERT INTO cliente (nome, email, telefone, cep, rua, numero, complemento)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssssss",
    $nome,
    $email,
    $telefone,
    $cep,
    $rua,
    $numero,
    $complemento
);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conexao->close();

?>