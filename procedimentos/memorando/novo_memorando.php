<?php 

session_start();

require_once "../../classes/conexao.class.php";
require_once "../../classes/memorando.class.php";


$obj = new cmemorando();



$dados=array(

	$_POST['receptor'],
	$_POST['justificativa'],
	$_POST['local'],
	$_POST['funcionario'],
	$_POST['emissor']
	

);


echo $obj->AdcionaMemorando($dados);

 ?>