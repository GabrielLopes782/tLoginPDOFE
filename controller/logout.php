<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Incializar a sessão
session_start();
//renovar todas as variáveis da sessão
$_SESSION=array();

//Destruir a Sessão
session_destroy();

//Redirecionar pro login
header('Location: ../view/login.php');
exit;