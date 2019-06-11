<?php 
require_once "../../classes/conexao.class.php";
require_once "../../classes/local.class.php";

$obj =  new localClass();

$dados = array(

    $_POST['nome_local'],
    $_POST['nome_predio']

);
 
echo $obj->cadastrarLocal($dados);

?>