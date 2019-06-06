<?php 

session_start();

require_once "../../classes/conexao.class.php";
require_once "../../classes/usuarios.class.php";


$obj = new usuarios();



$dados=array(
	
	$_POST['email'],
	$_POST['senha']
	

);



echo $obj->login($dados);

 ?>