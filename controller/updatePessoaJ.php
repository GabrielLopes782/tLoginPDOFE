<?php

if (isset($_POST["UpdatePessoaJ"])) {
    $idPessoa = $_POST['idPessoa'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cnpj = $_POST['cnpj'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "update pessoa set nome=?, telefone=?, email=?, endereco=?, cnpj=?, nomeFantasia=? where idPessoa=?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $nome, PDO::PARAM_STR);
    $sth->bindParam(2, $telefone, PDO::PARAM_STR);
    $sth->bindParam(3, $email, PDO::PARAM_STR);
    $sth->bindParam(4, $endereco, PDO::PARAM_STR);
    $sth->bindParam(5, $cnpj, PDO::PARAM_STR);
    $sth->bindParam(6, $nomeFantasia, PDO::PARAM_STR);
    $sth->bindParam(7, $idPessoa, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaPessoaJ.php");
}
