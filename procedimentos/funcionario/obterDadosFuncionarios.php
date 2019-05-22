<?php 

require_once "../../classes/conexao.php";
require_once "../../classes/funcionario.php";


$obj = new funcionario();

echo json_encode($obj->obterDados($_POST['idfuncionario']));


 ?>

