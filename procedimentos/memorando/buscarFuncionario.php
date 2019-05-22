<?php 

session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/memorando.php";




$idusuario = $_SESSION['iduser'];



$obj = new cmemorando();



$dados=array(

	$_POST['buscar'],
	
);

echo $obj->buscarClientes($dados);

 ?>