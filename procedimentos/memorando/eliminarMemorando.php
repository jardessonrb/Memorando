<?php 

session_start();

require_once "../../classes/conexao.class.php";
require_once "../../classes/memorando.class.php";


$obj = new cmemorando();


//var_dump($_POST['idMemorando']);
$dados=array(
	
    $_POST['idMemorando']

);


echo $obj->eliminarMemorando($dados);

 ?>