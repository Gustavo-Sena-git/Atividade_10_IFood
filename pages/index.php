<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="cadastrar.php" method="POST">

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

</body>
</html>