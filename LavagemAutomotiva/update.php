<?php
include_once("conexão.php");

if ($_POST["tabela"] == 'cliente') {
    AtualizaCliente($_POST["input_cpf"], $_POST["input_nome"], $_POST["input_telefone"]);
    header("Location: CadastroCli.php");
} elseif ($_POST["tabela"] == 'veiculo') {
    AtualizaVeiculo($_POST["input_placa"], $_POST["input_cor"], $_POST["input_modelo"], $_POST["input_tipo"], $_POST["input_cpf_cliente"]);
    header("Location: CadastroVeic.php");
} elseif ($_POST["tabela"] == 'veiculolav') {
    AtualizaVeiculoLavagem($_POST["input_cod_lavagem"], $_POST["input_placa"], $_POST["input_data"]);
    header("Location: Agendamento.php");
}

function AtualizaVeiculoLavagem($cod_lavagem, $placa, $data)
{
    $conexao = conectaBD();

    // Atualiza os dados do agendamento do veículo no banco de dados
    $query = "UPDATE veiculolav SET data_agendamento = '{$data}' WHERE cod_lavagem = '{$cod_lavagem}' AND placa = '{$placa}'";
    mysqli_query($conexao, $query) or die(mysqli_error());

    echo "Atualização de Agendamento realizada com sucesso!";

    desconectaBD($conexao);
}
?>
