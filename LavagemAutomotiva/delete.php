<?php
include_once("conexão.php");

if (isset($_GET['cod_lavagem']) && isset($_GET['placa']) && isset($_GET['tabela'])) {
    $cod_lavagem = $_GET['cod_lavagem'];
    $placa = $_GET['placa'];
    $tabela = $_GET['tabela'];

    if ($tabela == 'veiculolav') {
        ExcluirVeiculoLavagem($cod_lavagem, $placa);
    }

    header("Location: Agendamento.php");
} else {
    echo "Parâmetros inválidos para exclusão.";
}

function ExcluirVeiculoLavagem($cod_lavagem, $placa)
{
    $conexao = conectaBD();

    // Remova as entradas relacionadas na tabela 'agenda'
    $query_remove_agenda = "DELETE FROM agenda WHERE cod_lavagem = '{$cod_lavagem}' AND placa = '{$placa}'";
    mysqli_query($conexao, $query_remove_agenda) or die(mysqli_error());

    // Agora, exclui o agendamento do veículo
    $query_remove_veiculolav = "DELETE FROM veiculolav WHERE cod_lavagem = '{$cod_lavagem}' AND placa = '{$placa}'";
    mysqli_query($conexao, $query_remove_veiculolav) or die(mysqli_error());

    echo "Exclusão realizada com sucesso!";

    desconectaBD($conexao);
}

