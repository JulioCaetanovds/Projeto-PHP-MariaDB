<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Cadastrar Cliente</title>
</head>
<BODY>
   <b><font color="#0000FF">Lista de CLIENTES</font></b>
      </br> </br>

     <table border = "1">
      <tr>
        <td><b>Cpf</b></td>
        <td><b>Nome</b></td>
        <td><b>Telefone</b></td>
        <td><b>Editar</b></td>
        <td><b>Excluir</b></td>
     </tr>

       <?php
            include_once("conexão.php"); // conecta Banco
            $conn = conectaBD();

            $clientes = "SELECT * FROM cliente order by nome";
            $resultado = mysqli_query($conn, $clientes);

            while($i = mysqli_fetch_assoc($resultado)){
        ?>
             <tr>
                <td><?php echo $i['cpf'];?></td>
                <td><?php echo $i['nome'];?></td>
                <td><?php echo $i['telefone'];?></td>

               <td><a class="edit" href="<?php echo "ClienteFormEditar.php?var_cod=" . $i['cpf'] . "&var_Nome=" . $i['nome'] ?>">Alterar</a></td>
               <td><a class="delete" href="<?php echo "delete.php?var_cod=" . $i['cpf'] . "&tabela=cliente" ?>">Excluir</a></td>
             </tr>
            <?php
           }
            ?>
     </table>

     <h4><a href="ClienteFormInsert.html">Cadastrar novo CLIENTE</a></h4>

</BODY>
</HTML>