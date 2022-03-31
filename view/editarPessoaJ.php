<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/cLogout.php'>Sair</a>";
} else {

    header("location: login.php");
}
require_once '../controller/cPessoaJ.php';
$cadPessoaJ = new cPessoaJ();
$pessoasJ = null;
if (isset($_POST['UpdatePessoaJ'])) {
    $pessoasJ = $cadPessoaJ->getPessoaJById($_POST['idPessoa']);
}
?>
<html>

<head>
    <script type="text/javascript">
        function formataCNPJ() {

            /**/
            var CNPJ = document.getElementById("cnpj");
            if (CNPJ.value.length == 2 || CNPJ.value.length == 6) {
                CNPJ.value += ".";
            } else if (CNPJ.value.length == 10) {
                CNPJ.value += "/";
            } else if (CNPJ.value.length == 15) {
                CNPJ.value += "-";
            }
        }
        function mascaraFone(i) {
            const v = i.value;
            if (isNaN(v[v.length - 1])) {
                i.value = v.substring(0, v.length - 1);
                return;
            }
            i.setAttribute("maxlength", "15");
            if (v.length == 1) i.value = "(" + i.value;
            if (v.length == 3) i.value += ") ";
            if (v.length == 10) i.value += "-";
        }

    </script>
    <link rel="stylesheet" type="text/css" href="../assets/estiloCad.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8">
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
<h1>Editar Pessoa Jurídica</h1>
<div class="container">
    <form action="../controller/updatePessoaJ.php" method="Post">
        <input type="hidden" name="idPessoa" value="<?php echo $pessoasJ[0]['idPessoa']; ?>" />
        <label>Nome:</label>
        <br>
        <input value="<?php echo $pessoasJ[0]['nome']; ?>" type="text" name="nome" id="nome" />
        <br>
        <label>Telefone:</label>
        <br>
        <input value="<?php echo $pessoasJ[0]['telefone']; ?>" oninput="mascaraFone(this)" type="text" name="telefone" id="telefone" />
        <br>
        <label>E-Mail:</label>
        <br>
        <input value="<?php echo $pessoasJ[0]['email']; ?>" type="text" name="email" id="email" />
        <br>
        <label>CNPJ:</label>
        <br>
        <input value="<?php echo $pessoasJ[0]['cnpj']; ?>" oninput="formataCNPJ()" type="text" name="cnpj" id="cnpj" />
        <br>
        <label>Nome Fantasia:</label>
        <br>
        <input value="<?php echo $pessoasJ[0]['nomeFantasia']; ?>" type="text" name="nomeFantasia" id="nomeFantasia" />
        <br>
        <br>
        <input type="submit" value="Salvar" name="UpdatePessoaJ" />
    </form>
</div>

<body>
    <?php
    // put your code here
    ?>
</body>

</html>