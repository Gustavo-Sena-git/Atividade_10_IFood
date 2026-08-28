<?php

require_once "../config/conexao.php";

$id = $_GET["id"] ?? '';

if (empty($id)) {
    echo "ID do cliente não informado!";
    exit;
}

$sql = "DELETE FROM cliente WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    header("Location: ../pages/index.php");
    exit;

} else {

    echo "Erro ao excluir cliente: " . $stmt->error;
}

$stmt->close();
$conexao->close();

?>