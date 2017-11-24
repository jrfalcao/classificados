<?php
include_once 'config.php';
include 'classes/usuarios.class.php';

$email = addslashes($_POST['email']);
$senha = $_POST['senha'];
$u = new usuarios();
$user = $u->logar($email, $senha);

if(isset($user['id']) && !empty($user['id'])){
    $_SESSION['login'] = $user['id'];
    exit('sucesso');
}