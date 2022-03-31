<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["Update"])) {
    $idUser = $_POST['idUser'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "update usuario set nome=?, email=? where usuario.idUser=?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $nome, PDO::PARAM_STR);
    $sth->bindParam(2, $email, PDO::PARAM_STR);
    $sth->bindParam(3, $idUser, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaUsuarios.php");
}

