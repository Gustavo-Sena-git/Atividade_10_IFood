<?php

$conexao = new mysqli("localhost", "root", "", "delivery");

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");

?>