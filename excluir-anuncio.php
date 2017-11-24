<?php
require_once './config.php';
if(empty($_SESSION['login'])){ 
    header("Location: /");
    exit;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once 'classes/anuncios.class.php';
    $a = new Anuncios();
    $id = addslashes(filter_input(INPUT_GET, "id"));
    $a->excluir($id);
}
header("Location: meus-anuncios.php");

