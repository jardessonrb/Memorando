<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/funcionario.php";

$id = $_POST['idfuncionario'];

$obj = new funcionario();
echo $obj->excluir($id);

?>