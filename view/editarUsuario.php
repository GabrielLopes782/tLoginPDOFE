<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/cLogout.php'>Sair</a>";
} else {

    header("location: login.php");
}
require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
$Users = null;
if (isset($_POST['Update'])) {
    $Users = $cadUser->getUsuarioById($_POST['idUser']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../assets/estiloCad.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title></title>
    </head>
<header>
    <nav>
            <ul>
                <li><a href="./cadUsuario.php">Cadastro de Usuário</a></li>
                <li><a href="./cadPessoaF.php">Cadastro de Pessoa Física</a></li>
                <li><a href="./cadPessoaJ.php">Cadastro De Pessoa Jurídica</a></li>
            </ul>
        </nav>
</header>
    <h1>Editar Usuario</h1>
    <div class="container">
    <form action="../controller/updateUser.php" method="Post">
        <input type="hidden" name="idUser" value="<?php echo $Users[0]['idUser']; ?>"/>
        <label>Nome:</label>
        <br><br>
        <input value="<?php echo $Users[0]['nome']; ?>" type="text" name="nome" id="nome"/>
        <br>
        <br>
        <label>Email:</label>
        <br><br>
        <input value="<?php echo $Users[0]['email']; ?>" type="email" name="email" id="email" />
        <br>
        <br>
        <input type="submit" value="Salvar" name="Update" />
    </form>
    </div>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
