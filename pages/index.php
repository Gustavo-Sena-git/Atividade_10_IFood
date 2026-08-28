<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../script/script.js"></script>
</head>
<body>

    <form action="../services/cadastroCliente.php" method="POST">

        Nome:<br>
        <input type="text" id="nome" name="nome" required><br>
        
        E-mail:<br>
        <input type="email" id="email" name="email" required><br>
        
        Telefone:<br>
        <input type="tel" id="telefone" name="telefone" required><br>
        
        Endereço:<br>
        
        CEP:<br>
        <input type="text" id="cep" name="cep" required><br>
        
        Rua:<br>
        <input type="text" id="rua" name="rua" required><br>
        
        Número da casa:<br>
        <input type="text" id="numero" name="numero" required><br>
        
        Complemento:<br>
        <input type="text" id="complemento" name="complemento"><br>
        

        <button type="submit">Cadastrar Cliente</button><br>

    </form>
    <div>
        
        <?php
        require_once "../config/conexao.php";

        $sql = "SELECT id, nome, email, telefone, cep, rua, numero, complemento
                FROM cliente";

        $result = $conexao->query($sql);
        ?>

        <table border="1" cellpadding="8">

            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                
                <th>Ações</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>

            <tr>
                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['telefone']) ?></td>

                <td>
                    <a href="#" onclick="mostrarEndereco(
                        '<?= htmlspecialchars($row['cep']) ?>',
                        '<?= htmlspecialchars($row['rua']) ?>',
                        '<?= htmlspecialchars($row['numero']) ?>',
                        '<?= htmlspecialchars($row['complemento']) ?>'
                    ); return false;">
                        Endereço
                    </a>

                    <a href="../controllersCliente/editar.php?id=<?= $row['id'] ?>">
                        Editar
                    </a>

                    <a href="../controllersCliente/excluir.php?id=<?= $row['id'] ?>"
                    onclick="return confirm('Tem certeza que deseja excluir?')">
                        Excluir
                    </a>
                </td>
            </tr>

            <?php endwhile; ?>

        </table>
        <div id="modalEndereco" style="display: none;">
            <div>
                <h3>Endereço do cliente</h3>

                <p>CEP: <span id="enderecoCep"></span></p>
                <p>Rua: <span id="enderecoRua"></span></p>
                <p>Número: <span id="enderecoNumero"></span></p>
                <p>Complemento: <span id="enderecoComplemento"></span></p>

                <button type="button" onclick="fecharEndereco()">Fechar</button>
            </div>
        </div>


    </div>

   
    <h2>Cadastro de Restaurante</h2>

    <form action="../controllersRestaurante/cadastro.php" method="POST">

        Nome:<br>
        <input type="text" name="nome" required><br>

        Categoria:<br>
        <input type="text" name="categoria" required><br>

        Telefone:<br>
        <input type="tel" name="telefone" required><br>

        CEP:<br>
        <input type="text" name="cep" required><br>

        Rua:<br>
        <input type="text" name="rua" required><br>

        Número da casa:<br>
        <input type="text" name="numero" required><br>

        Complemento:<br>
        <input type="text" name="complemento"><br><br>

        <button type="submit">Cadastrar restaurante</button>

    </form>

    <?php

        require_once "../config/conexao.php";

        $sql = "SELECT id, nome, categoria, telefone, cep, rua, numero, complemento
        FROM restaurante";

        $result = $conexao->query($sql);

        ?>

        <table border="1" cellpadding="8">

            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Telefone</th>
                <th>CEP</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Ações</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>

            <tr>

                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td><?= htmlspecialchars($row['categoria']) ?></td>
                <td><?= htmlspecialchars($row['telefone']) ?></td>
                <td><?= htmlspecialchars($row['cep']) ?></td>
                <td><?= htmlspecialchars($row['rua']) ?></td>
                <td><?= htmlspecialchars($row['numero']) ?></td>
                <td><?= htmlspecialchars($row['complemento']) ?></td>

                <td>

                    <a href="../controllersRestaurante/editar.php?id=<?= $row['id'] ?>">
                        Editar
                    </a>

                    <a href="../controllersRestaurante/excluir.php?id=<?= $row['id'] ?>"
                    onclick="return confirm('Tem certeza que deseja excluir?')">
                        Excluir
                    </a>

                </td>

            </tr>

        <?php endwhile; ?>

        </table>
</body>
</html>