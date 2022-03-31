<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cUsuario
 *
 * @author Menin
 */
class cUsuario {

    //put your code here
    public function inserir() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pass'];
            
            $pdo = require '../pdo/connection.php';
            $sql = "insert into usuario (nome, email, pas) values (?,?,?)";
            $Statement = $pdo->prepare($sql);
            $Statement->bindParam(1, $nome, PDO::PARAM_STR);
            $Statement->bindParam(2, $email, PDO::PARAM_STR);
            $Statement->bindParam(3, $pass, PDO::PARAM_STR);
            $pass = password_hash($pas, PASSWORD_DEFAULT);
            $Statement->execute();
            header("location: cadUsuario.php");
            unset($Statement);
            unset($pdo);
        }
    }
        public function getUsuarios(){
            $pdo= require_once '../pdo/connection.php';
            $sql="select idUser, nome, email from usuario";
            $sth= $pdo->prepare($sql);
            $sth->execute();
            $result= $sth->fetchAll();
            return $result;
            unset($sth);
            unset($pdo);
            
            
        }
         public function getUsuarioById($id){
            $pdo= require_once '../pdo/connection.php';
            $sql="select idUser, nome, email from usuario where idUser= ?";
            $sth= $pdo->prepare($sql);
            $sth->execute([$id]);
            $result= $sth->fetchAll();
            unset($sth);
            unset($pdo);
            return $result;
         }
         
         public function deletarUserBD() {
             
        if (isset($_POST['delete'])) {
            $pdo= require_once '../PDO/connection.php';
            $id = $_POST['idUser'];
            $sql = "delete from usuario where idUser = $id";
            $sth=$pdo->prepare($sql);
            $sth->execute();
            $result=$sth->fetchAll();
            return $result;
            unset($sth);
            unset($pdo);
            
            header('Refresh: 0'); //recarrecar a página F5
        }
    }
    }



?>