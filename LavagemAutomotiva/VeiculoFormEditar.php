<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Editar Veículo</title>
</head>
<body>
    <?php
    include_once("conexão.php");

    if (isset($_GET['placa'])) {
        $placa = $_GET['placa'];

        $conn = conectaBD();
        $query = "SELECT * FROM veiculo WHERE placa = '{$placa}'";
        $resultado = mysqli_query($conn, $query);
        $veiculo = mysqli_fetch_assoc($resultado);
    ?>
        <h2>Editar Veículo</h2>
        <form name="EditaVeiculo" method="POST" action="update.php">
            <input type="hidden" name="tabela" value="veiculo">
            <input type="hidden" name="input_placa" value="<?php echo $veiculo['placa']; ?>">

            <label>
                <strong>Cor:</strong><br>
                <input type="text" name="input_cor" value="<?php echo $veiculo['cor']; ?>" required><br>
            </label>
            <label>
                <strong>Modelo:</strong><br>
                <input type="text" name="input_modelo" value="<?php echo $veiculo['modelo']; ?>" required><br>
            </label>
            <label>
                <strong>Tipo:</strong><br>
                <input type="text" name="input_tipo" value="<?php echo $veiculo['tipo']; ?>" required><br>
            </label>
            <label>
                <strong>CPF do Cliente:</strong><br>
                <input type="text" name="input_cpf_cliente" value="<?php echo $veiculo['cpf_cliente']; ?>" required><br>
            </label>

            <input type="submit" value="Atualizar">
        </form>
    <?php
        desconectaBD($conn);
    } else {
        echo "Parâmetros inválidos para a edição do veículo.";
    }
    ?>
</body>
</html>
