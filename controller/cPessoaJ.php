<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPessoaJ
 *
 * @author Menin
 */
class cPessoaJ {
    //put your code here
     public function inserirPessoaJ() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $cnpj = $_POST['cnpj'];
            $nomeFantasia = $_POST['nomeFantasia'];

            $pdo = require '../pdo/connection.php';
            $sql = "insert into pessoa (nome, email, telefone, endereco, cnpj, nomeFantasia) values (?,?,?,?,?,?)";
            $Statement = $pdo->prepare($sql);
            $Statement->bindParam(1, $nome, PDO::PARAM_STR);
            $Statement->bindParam(2, $email, PDO::PARAM_STR);
            $Statement->bindParam(3, $telefone, PDO::PARAM_STR);
            $Statement->bindParam(4, $endereco, PDO::PARAM_STR);
            $Statement->bindParam(5, $cnpj, PDO::PARAM_STR);
            $Statement->bindParam(6, $nomeFantasia, PDO::PARAM_STR);
            $Statement->execute();
            header("location: cadPessoaJ.php");
            unset($Statement);
            unset($pdo);
        }
    }

    public function getPessoaJ() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idPessoa, nome, telefone, email, endereco, cnpj, nomeFantasia from pessoa where cpf is null";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }

    public function getPessoaJById($idPessoa) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select  idPessoa, nome, telefone, email, endereco, cnpj, nomeFantasia from pessoa where idPessoa= ?";
        $sth = $pdo->prepare($sql);
        $sth->execute([$idPessoa]);
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }


}
