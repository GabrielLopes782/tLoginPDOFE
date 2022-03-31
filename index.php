<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='controller/logout.php'>Sair</a>";
} else {
    header("location: view/login.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device.width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./assets/estiloCad.css" />
        <title>Criptos</title>
    </head>
    <body>
        <h1>Login- Teste de Criptografia</h1>
        <nav>
            <ul>
                <li><a href="view/cadUsuario.php">Cadastro de Usuário</a></li>
                <li><a href="view/cadPessoaF.php">Cadastro de Pessoa Física</a></li>
                <li><a href="view/cadPessoaJ.php">Cadastro De Pessoa Jurídica</a></li>
            </ul>
        </nav>
        <h2>Criptografias, Session, Autenticação, CRUD </h2>
        
        
       
            </body>
</html>
