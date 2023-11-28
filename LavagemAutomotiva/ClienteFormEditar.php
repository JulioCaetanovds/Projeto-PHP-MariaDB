<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Editar Cliente</title>
</head>
<body>
    <?php
    include_once("conexão.php");

    if (isset($_GET['var_cod']) && isset($_GET['var_Nome'])) {
        $cpf = $_GET['var_cod'];
        $nome = $_GET['var_Nome'];

        // Recupera as informações do cliente a ser editado
        $conexao = conectaBD();
        $query = "SELECT * FROM cliente WHERE cpf = '{$cpf}'";
        $resultado = mysqli_query($conexao, $query);
        $cliente = mysqli_fetch_assoc($resultado);

        // Exibe o formulário preenchido com as informações do cliente
    ?>
        <h2>Editar Cliente</h2>
        <form name="EditaCliente" method="POST" action="update.php">
            <input type="hidden" name="tabela" value="cliente">
            <input type="hidden" name="input_cpf" value="<?php echo $cliente['cpf']; ?>">

            <label>
                <strong>Nome:</strong><br>
                <input type="text" name="input_nome" value="<?php echo $cliente['nome']; ?>" required><br>
            </label>
            <label>
                <strong>Telefone:</strong><br>
                <input type="text" name="input_telefone" value="<?php echo $cliente['telefone']; ?>" required><br>
            </label>

            <input type="submit" value="Atualizar">
        </form>
    <?php
        desconectaBD($conexao);
    } else {
        echo "Parâmetros inválidos para a edição do cliente.";
    }
    ?>
</body>
</html>
