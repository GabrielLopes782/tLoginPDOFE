<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['deletePessoaF'])) {
            $pdo= require_once '../PDO/connection.php';
            $id = $_POST['idPessoa'];
            $sql = "delete from pessoa where idPessoa = $id";
            $sth=$pdo->prepare($sql);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header('Location: ../view/listaPessoaF.php'); //recarrecar a página F5
        }

