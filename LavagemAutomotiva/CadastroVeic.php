<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Cadastro de Veículos</title>
</head>
<body>
    <b><font color="#0000FF">Lista de VEÍCULOS</font></b>
    </br></br>

    <table border="1">
        <tr>
            <td><b>Placa</b></td>
            <td><b>Cor</b></td>
            <td><b>Modelo</b></td>
            <td><b>Tipo</b></td>
            <td><b>CPF do Cliente</b></td>
            <td><b>Editar</b></td>
            <td><b>Excluir</b></td>
        </tr>

        <?php
        include_once("conexão.php");
        $conn = conectaBD();

        $veiculos = "SELECT * FROM veiculo";
        $resultado = mysqli_query($conn, $veiculos);

        while ($veiculo = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td><?php echo $veiculo['placa']; ?></td>
                <td><?php echo $veiculo['cor']; ?></td>
                <td><?php echo $veiculo['modelo']; ?></td>
                <td><?php echo $veiculo['tipo']; ?></td>
                <td><?php echo $veiculo['cpf_cliente']; ?></td>
                <td><a class="edit" href="<?php echo "VeiculoFormEditar.php?placa=" . $veiculo['placa']; ?>">Alterar</a></td>
                <td><a class="delete" href="<?php echo "delete.php?placa=" . $veiculo['placa'] . "&tabela=veiculo"; ?>">Excluir</a></td>
            </tr>
            <?php
        }
        desconectaBD($conn);
        ?>
    </table>

    <h4><a href="VeiculoFormInsert.html">Cadastrar novo VEÍCULO</a></h4>
</body>
</html>
