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
require_once '../controller/cPessoaFisica.php';
$cadPessoaF= new cPessoaFisica();
$listPessoaF=$cadPessoaF->getPessoaF();
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
                    <th>id</th><th>Nome</th><th>Telefone</th><th>E-mail</th><th>CPF</th><th>Sexo</th><th>Funções</th><!--cria Cabeçalho-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listPessoaF as $pessoaF): ?>
                    <tr>
                        <td><?php echo $pessoaF ['idPessoa']; ?> </td>
                        <td> <?php echo $pessoaF ['nome']; ?> </td>
                        <td> <?php echo $pessoaF ['telefone']; ?> </td>
                        <td> <?php echo $pessoaF ['email']; ?> </td>
                        <td> <?php echo $pessoaF ['cpf']; ?> </td>
                        <td> <?php echo $pessoaF ['sexo']; ?> </td>
                        <td> 
                            <form action="../controller/deletePessoaF.php" method="POST"/>
                                <input type="hidden" name="idPessoa" value="<?php echo $pessoaF["idPessoa"]; ?>">
                                <input type="submit" name="deletePessoaF" value="Deletar"/>
                            </form>
                            <form action="editarPessoaF.php" method="POST">
                                <input type="hidden" name="idPessoa" value="<?php echo $pessoaF["idPessoa"]; ?>"/>
                                <input type="submit" name="UpdatePessoaF" value="Editar"/>
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