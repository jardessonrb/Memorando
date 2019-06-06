<?php 

session_start();
require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";




$idusuario = $_SESSION['iduser'];



$obj = new funcionarios();



$dados=array(
	$idusuario,
	$_POST['nome'],
	$_POST['sobrenome'],
	$_POST['endereco'],
	$_POST['email'],
	$_POST['telefone'],
	$_POST['cpf']

);

echo $obj->adicionar($dados);

 ?>