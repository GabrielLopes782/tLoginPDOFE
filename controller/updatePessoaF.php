<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["UpdatePessoaF"])) {
    $idPessoa = $_POST['idPessoa'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "update pessoa set nome=?, telefone=?, email=?, endereco=?, cpf=? where idPessoa=?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $nome, PDO::PARAM_STR);
    $sth->bindParam(2, $telefone, PDO::PARAM_STR);
    $sth->bindParam(3, $email, PDO::PARAM_STR);
    $sth->bindParam(4, $endereco, PDO::PARAM_STR);
    $sth->bindParam(5, $cpf, PDO::PARAM_STR);
    $sth->bindParam(6, $idPessoa, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaPessoaF.php");
}


