<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
--><?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
} else {
    header("location: login.php");
}
require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
$listUsers = $cadUser->getUsuarios();

?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../assets/estiloLista.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title></title>
    </head>
    <body>
    <header>
    <nav>
            <ul>
                <li><a href="./cadUsuario.php">Cadastro de Usuário</a></li>
                <li><a href="./cadPessoaF.php">Cadastro de Pessoa Física</a></li>
                <li><a href="./cadPessoaJ.php">Cadastro De Pessoa Jurídica</a></li>
            </ul>
        </nav>
</header>
    <div class="container">
        <table><!--cria Tabela-->
            <thead><!-- Cria Cabeçalho da Tabela-->
                <tr><!-- Cria Linha da Tabela-->
                    <th>id</th><th>Usuário</th><th>E-mail</th><th>Funções</th><!--cria Cabeçalho-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUsers as $user): ?>
                    <tr>
                        <td><?php echo $user ['idUser']; ?> </td>
                        <td> <?php echo $user ['nome']; ?> </td>
                        <td> <?php echo $user ['email']; ?> </td>
                        <td> 
                            <form action="../controller/deleteUser.php" method="POST">
                                <input type="hidden" name="idUser" value="<?php echo $user["idUser"]; ?>"/>
                                <input type="submit" name="deleteUser" value="delete"/>
                            </form>
                            <form action="editarUsuario.php" method="POST">
                                <input type="hidden" name="idUser" value="<?php echo $user["idUser"]; ?>"/>
                                <input type="submit" name="Update" value="editar"/>
                            </form>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
            </div>
            <?php
            // put your code here
            ?>
    </body>
</html>
