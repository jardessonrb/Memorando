<?php 


require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";

$id = $_POST['idfuncionario'];

$obj = new funcionario();
echo $obj->excluir($id);

?>