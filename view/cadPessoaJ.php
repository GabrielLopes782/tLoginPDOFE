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
$cadPessoaJ = new cPessoaJ();
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
    <h1>Cadastro de Pessoa Jurídica</h1>
    <div class="container">
        <form action="<?php $cadPessoaJ->inserirPessoaJ() ?>" method="POST">
            <form method="POST">
                <input type='text' name='nome' placeholder="Nome Aqui..." />
                <br><br>
                <input type='email' name='email' placeholder="E-Mail Aqui..." />
                <br><br>
                <input type='text' name='telefone' oninput="mascaraFone(this)" placeholder="Telefone Aqui..." />
                <br><br>
                <input type='text' name='endereco' placeholder="Endereço Aqui..." />
                <br><br>
                <input type='text' name='cnpj' id="cnpj" oninput="formataCNPJ()" placeholder="CNPJ Aqui..." />
                <br><br>
                <input type='text' name='nomeFantasia' placeholder="Nome Fantasia Aqui..." />
                <br><br>
                <input type='submit' name='salvar' value='salvar' />
                <input type='reset' name='limpar' value="limpar" />
                <input type="button" name="voltar" value="voltar" onclick="location.href = '../index.php'" />
                <input type="button" name="listar" value='listar' onclick="location.href = 'listaPessoaJ.php'" />
            </form>
    </div>
</body>

</html>