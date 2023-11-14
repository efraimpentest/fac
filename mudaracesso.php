<?php


session_start();

include('conexao.php');
include('validaradmin.php');


$select = "SELECT nome, descricao, nivel.id, login.cpf FROM usuario INNER JOIN login ON usuario.cpf = login.cpf INNER JOIN nivel ON nivel.id = nivel";

$queryselect = mysqli_query($conexao, $select);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudar Acesso</title>
</head>
<body>
    <center>
        <form name="mudatipo" action="mudartipo.php" method="POST">
            <table>
                <tr>
                    <td>Nome</td>
                    <td>Tipo de Usuario</td>
                    <td>Novo Tipo de Usuario</td>
                    <td>Alterar</td>
                </tr>
                <?php 
                while ($linha = mysqli_fetch_row($queryselect)) { ?>
                <tr>
                    <td><?php echo $linha[0]?></td>
                    <td><?php echo $linha[1]?></td>
                    <td>
                        <select name="nivel">
                            <option value="1">Administrador</opition>
                            <opition value="2">Gerente</opition>
                            <opition value="3">Usuario</opition>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="alterar" value="Alterar">
                        <input type="hidden" name="cpf" value="
                        <?php echo $linha[3] ?>"
                    </td>
                </tr>
                

            <?php } ?>
            </table>
            
    </center>
</body>
</html>
