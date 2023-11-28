<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Editar Agendamento</title>
</head>
<body>
    <h2>Editar Agendamento</h2>

    <?php
    include_once("conexão.php");

    if (isset($_GET['cod_lavagem']) && isset($_GET['placa'])) {
        $cod_lavagem = $_GET['cod_lavagem'];
        $placa = $_GET['placa'];

        $conexao = conectaBD();

        // Recupera os detalhes do agendamento
        $query = "SELECT * FROM veiculolav WHERE cod_lavagem = '{$cod_lavagem}' AND placa = '{$placa}'";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $agendamento = mysqli_fetch_assoc($resultado);
            ?>
            <form name="EditarAgendamento" method="POST" action="update.php">
                <input type="hidden" name="tabela" value="veiculolav">
                <input type="hidden" name="input_cod_lavagem" value="<?php echo $agendamento['cod_lavagem']; ?>">
                <input type="hidden" name="input_placa" value="<?php echo $agendamento['placa']; ?>">

                <label>
                    <strong>Nova Data do Agendamento (Formato: dd/mm/yyyy):</strong><br>
                    <input type="text" name="input_data" value="<?php echo $agendamento['data_agendamento']; ?>" required><br>
                </label>

                <input type="submit" value="Salvar Alterações"/>
            </form>
            <?php
        } else {
            echo "Agendamento não encontrado.";
        }

        desconectaBD($conexao);
    } else {
        echo "Parâmetros inválidos para edição.";
    }
    ?>
</body>
</html>
