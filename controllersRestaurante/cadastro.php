<?php

require_once "../config/conexao.php";

$nome = $_POST["nome"] ?? '';
$categoria = $_POST["categoria"] ?? '';
$telefone = $_POST["telefone"] ?? '';
$cep = $_POST["cep"] ?? '';
$rua = $_POST["rua"] ?? '';
$numero = $_POST["numero"] ?? '';
$complemento = $_POST["complemento"] ?? '';

if (empty($nome) || empty($categoria) || empty($telefone) || empty($endereco)) {

    echo "Preencha todos os campos obrigatórios!";
    exit;
}

$$sql = "INSERT INTO restaurante (nome, categoria, telefone, cep, rua, numero, complemento)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssssss",
    $nome,
    $categoria,
    $telefone,
    $cep,
    $rua,
    $numero,
    $complemento
);

if ($stmt->execute()) {

    header("Location: ../pages/index.php");
    exit;

} else {

    echo "Erro ao cadastrar restaurante: " . $stmt->error;
}

$stmt->close();
$conexao->close();

?>