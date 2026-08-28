
<?php

require_once "../config/conexao.php";


/* =========================
   ABRIR FORMULÁRIO DE EDIÇÃO
   ========================= */

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $id = $_GET["id"] ?? '';

    if (empty($id)) {
        echo "ID do cliente não informado!";
        exit;
    }

    $sql = "SELECT * FROM cliente WHERE id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $cliente = $result->fetch_assoc();

    if (!$cliente) {
        echo "Cliente não encontrado!";
        exit;
    }

    $stmt->close();
}


/* =========================
   ATUALIZAR CLIENTE
   ========================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"] ?? '';

    $nome = $_POST["nome"] ?? '';
    $email = $_POST["email"] ?? '';
    $telefone = $_POST["telefone"] ?? '';
    $cep = $_POST["cep"] ?? '';
    $rua = $_POST["rua"] ?? '';
    $numero = $_POST["numero"] ?? '';
    $complemento = $_POST["complemento"] ?? '';

    if (empty($id) || empty($nome) || empty($email) || empty($telefone) || empty($cep) || empty($rua) || empty($numero)) {

        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    $sql = "UPDATE cliente 
            SET nome = ?, email = ?, telefone = ?, cep = ?, rua = ?, numero = ?, complemento = ? 
            WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssssssi",
        $nome,
        $email,
        $telefone,
        $cep,
        $rua,
        $numero,
        $complemento,
        $id
    );

    if ($stmt->execute()) {

        header("Location: ../pages/index.php");
        exit;

    } else {

        echo "Erro ao atualizar cliente: " . $stmt->error;
    }

    $stmt->close();
}

$conexao->close();

?>


<?php if ($_SERVER["REQUEST_METHOD"] === "GET"): ?>

<h2>Editar cliente</h2>

<form method="POST">

    <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

    Nome:<br>
    <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required><br>

    E-mail:<br>
    <input type="email" name="email" value="<?= $cliente['email'] ?>" required><br>

    Telefone:<br>
    <input type="tel" name="telefone" value="<?= $cliente['telefone'] ?>" required><br>

    Endereço:<br>

    CEP:<br>
    <input type="text" name="cep" value="<?= $cliente['cep'] ?>" required><br>

    Rua:<br>
    <input type="text" name="rua" value="<?= $cliente['rua'] ?>" required><br>

    Número da casa:<br>
    <input type="text" name="numero" value="<?= $cliente['numero'] ?>" required><br>

    Complemento:<br>
    <input type="text" name="complemento" value="<?= $cliente['complemento'] ?>"><br><br>

    <button type="submit">Salvar alterações</button>

</form>

<?php endif; ?>

