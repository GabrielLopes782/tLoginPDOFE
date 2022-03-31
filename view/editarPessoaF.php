<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/cLogout.php'>Sair</a>";
} else {

    header("location: login.php");
}
require_once '../controller/cPessoaFisica.php';
$cadPessoaF = new cPessoaFisica();
$pessoas = null;
if (isset($_POST['UpdatePessoaF'])) {
    $pessoas = $cadPessoaF->getPessoaFById($_POST['idPessoa']);
}
?>
<html>

<head>
    <script type="text/javascript">
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

        function formataCPF() {
            var cpf = document.getElementById("cpf");

            if (cpf.value.length == 3 || cpf.value.length == 7) {
                cpf.value += ".";
            } else if (cpf.value.length == 11) {}
        }

        function mascara(i) {
            const v = i.value;
            if (isNaN(v[v.length - 1])) {
                i.value = v.substring(0, v.length - 1);
                return;
            }
            i.setAttribute("maxlength", "14");
            if (v.length == 3 || v.length == 7) i.value += ".";
            if (v.length == 11) i.value += "-";
        }
    </script>
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
<h1>Editar Pessoa</h1>
<div class="container">
    <form action="../controller/updatePessoaF.php" method="Post">
        <input type="hidden" name="idPessoa" value="<?php echo $pessoas[0]['idPessoa']; ?>" />
        <label>Nome:</label>
        <br>
        <input value="<?php echo $pessoas[0]['nome']; ?>" type="text" name="nome" id="nome" />
        <br>
        <label>Telefone:</label>
        <br>
        <input value="<?php echo $pessoas[0]['telefone']; ?>" type="text" name="telefone" id="telefone" oninput="mascaraFone(this)" />
        <br>
        <label>Endereço:</label>
        <br>
        <input value="<?php echo $pessoas[0]['endereco']; ?>" type="text" name="endereco" id="endereco" />
        <br>
        <label>E-Mail:</label>
        <br>
        <input value="<?php echo $pessoas[0]['email']; ?>" type="text" name="email" id="email" />
        <br>
        <label>CPF:</label>
        <br>
        <input value="<?php echo $pessoas[0]['cpf']; ?>"  type="text" name="cpf" id="cpf" oninput="mascara(this)" />
        <br><br>
        <input type="submit" value="Salvar" name="UpdatePessoaF" />
    </form>
</div>

<body>
    
    <?php
    // put your code here
    ?>
</body>

</html>