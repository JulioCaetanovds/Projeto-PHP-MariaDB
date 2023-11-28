<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Agendamento</title>
</head>
<body>
    <b><font color="#0000FF">Lista de AGENDAMENTOS</font></b>
    </br></br>

    <table border="1">
        <tr>
            <td><b>Código da Lavagem</b></td>
            <td><b>Placa do Veículo</b></td>
            <td><b>Data do Agendamento</b></td>
            <td><b>Editar</b></td>
            <td><b>Excluir</b></td>
        </tr>

        <?php
        include_once("conexão.php");
        $conn = conectaBD();

        $agendamentos = "SELECT * FROM veiculolav";
        $resultado = mysqli_query($conn, $agendamentos);

        while ($agendamento = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td><?php echo $agendamento['cod_lavagem']; ?></td>
                <td><?php echo $agendamento['placa']; ?></td>
                <td><?php echo $agendamento['data_agendamento']; ?></td>
                <td><a class="edit" href="<?php echo "AgendamentoFormEditar.php?cod_lavagem=" . $agendamento['cod_lavagem'] . "&placa=" . $agendamento['placa']; ?>">Alterar</a></td>
                <td><a class="delete" href="<?php echo "delete.php?cod_lavagem=" . $agendamento['cod_lavagem'] . "&placa=" . $agendamento['placa'] . "&tabela=veiculolav"; ?>">Excluir</a></td>
            </tr>
            <?php
        }
        desconectaBD($conn);
        ?>
    </table>

    <h4><a href="AgendamentoFormInsert.html">Agendar novo Serviço</a></h4>
</body>
</html>
