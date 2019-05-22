<?php 

session_start();

require_once "../../classes/conexao.php";
require_once "../../classes/cmemorando.php";


$obj = new cmemorando();



$dados=array(
	
	$_POST['funcionario'],
	$_POST['receptor'],
	$_POST['justificativa'],
	$_POST['comentario'],
	$_POST['local'],
	$_POST['emissor']
	
	

);


echo $obj->AdcionaMemorando($dados);

 ?>