<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
} else {
    header("location: login.php");
}
?>
<?php
require_once '../controller/cPessoaJ.php';
$cadPessoaJ= new cPessoaJ();
$listPessoaJ=$cadPessoaJ->getPessoaJ();
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../assets/estiloLista.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="UTF-8">
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
                    <th>id</th><th>Nome</th><th>Telefone</th><th>E-mail</th><th>CNPJ</th><th>Nome Fantasia</th><th>Funções</th><!--cria Cabeçalho-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listPessoaJ as $pessoaJ): ?>
                    <tr>
                        <td><?php echo $pessoaJ ['idPessoa']; ?> </td>
                        <td> <?php echo $pessoaJ ['nome']; ?> </td>
                        <td> <?php echo $pessoaJ ['telefone']; ?> </td>
                        <td> <?php echo $pessoaJ ['email']; ?> </td>
                        <td> <?php echo $pessoaJ ['cnpj']; ?> </td>
                        <td> <?php echo $pessoaJ ['nomeFantasia']; ?> </td>
                        <td> 
                            <form action="../controller/deletePessoaJ.php" method="POST">
                                <input type="hidden" name="idPessoa" value="<?php echo $pessoaJ["idPessoa"]; ?>"/>
                                <input type="submit" name="deletePessoaJ" value="Deletar"/>
                            </form>
                            <form action="../view/editarPessoaJ.php" method="POST">
                                <input type="hidden" name="idPessoa" value="<?php echo $pessoaJ["idPessoa"]; ?>"/>
                                <input type="submit" name="UpdatePessoaJ" value="Editar"/>
                            </form>
                        </td>
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