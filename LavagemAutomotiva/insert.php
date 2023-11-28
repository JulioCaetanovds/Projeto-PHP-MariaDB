<?php
include_once("conexão.php");

if (isset($_POST["tabela"])) {
    $tabela = $_POST["tabela"];

    if ($tabela == 'cliente') {
        CadastraCliente($_POST["input_cpf"], $_POST["input_nome"], $_POST["input_telefone"]);
        header("Location: CadastroCli.php");
    } elseif ($tabela == 'veiculo') {
        CadastraVeiculo($_POST["input_placa"], $_POST["input_cor"], $_POST["input_modelo"], $_POST["input_tipo"], $_POST["input_cpf_cliente"]);
        header("Location: CadastroVeic.php");
    } elseif ($tabela == 'veiculolav') {
        AgendarServico($_POST["input_cod_lavagem"], $_POST["input_placa"], $_POST["input_data"]);
        header("Location: Agendamento.php");
    } elseif ($tabela == 'agenda') {
        AgendarServico($_POST["input_cod_lavagem"], $_POST["input_placa"], $_POST["input_data"]);
        header("Location: Agendamento.php");
    }
}

function CadastraCliente($cpf, $nome, $telefone)
{
    $conexao = conectaBD();

    $dados = "INSERT INTO cliente(cpf, nome, telefone) VALUES ('{$cpf}', '{$nome}', '{$telefone}')";
    mysqli_query($conexao, $dados) or die(mysqli_error());

    echo "Cadastro de Cliente com Sucesso!";

    desconectaBD($conexao);
}

function CadastraVeiculo($placa, $cor, $modelo, $tipo, $cpf_cliente)
{
    $conexao = conectaBD();

    $dados = "INSERT INTO veiculo(placa, cor, modelo, tipo, cpf_cliente) VALUES ('{$placa}', '{$cor}', '{$modelo}', '{$tipo}', '{$cpf_cliente}')";
    mysqli_query($conexao, $dados) or die(mysqli_error());

    echo "Cadastro de Veículo com Sucesso!";

    desconectaBD($conexao);
}

function AgendarServico($cod_lavagem, $placa, $data)
{
    $conexao = conectaBD();

    // Verifica se o código de lavagem existe na tabela lavagem
    if (!VerificaCodLavagem($cod_lavagem)) {
        // Se não existir, adiciona o código de lavagem à tabela lavagem
        AdicionaCodLavagem($cod_lavagem);
    }

    // Verifica se o registro existe na tabela veiculolav
    if (!VerificaVeiculoLav($cod_lavagem, $placa)) {
        // Se não existir, adiciona o registro na tabela veiculolav
        $queryVeiculoLav = "INSERT INTO veiculolav(cod_lavagem, placa, data_agendamento) VALUES ('{$cod_lavagem}', '{$placa}', STR_TO_DATE('{$data}', '%d/%m/%Y'))";
        mysqli_query($conexao, $queryVeiculoLav) or die(mysqli_error());
    }

    // Agendamento na tabela agenda
    $queryAgenda = "INSERT INTO agenda(cod_lavagem, placa, data_agendamento) VALUES ('{$cod_lavagem}', '{$placa}', STR_TO_DATE('{$data}', '%d/%m/%Y'))";
    mysqli_query($conexao, $queryAgenda) or die(mysqli_error());

    echo "Agendamento de Serviço realizado com Sucesso!";

    desconectaBD($conexao);
}

function VerificaCodLavagem($cod_lavagem)
{
    $conexao = conectaBD();

    $query = "SELECT * FROM lavagem WHERE cod_lavagem = '{$cod_lavagem}'";
    $resultado = mysqli_query($conexao, $query);

    desconectaBD($conexao);

    return mysqli_num_rows($resultado) > 0;
}

function AdicionaCodLavagem($cod_lavagem)
{
    $conexao = conectaBD();

    $query = "INSERT INTO lavagem(cod_lavagem) VALUES ('{$cod_lavagem}')";
    mysqli_query($conexao, $query) or die(mysqli_error());

    desconectaBD($conexao);
}

function VerificaVeiculoLav($cod_lavagem, $placa)
{
    $conexao = conectaBD();

    $query = "SELECT * FROM veiculolav WHERE cod_lavagem = '{$cod_lavagem}' AND placa = '{$placa}'";
    $resultado = mysqli_query($conexao, $query);

    desconectaBD($conexao);

    return mysqli_num_rows($resultado) > 0;
}