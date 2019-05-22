<?php  
require_once "../../classes/conexao.php";


	$c= new conectar();
	$conexao=$c->conexao();
	//$idvenda=$_GET['idvenda'];

 $sql="SELECT id_memorando from tab_memorando;";
 $result=mysqli_query($conexao,$sql);
 while ($mostrar = mysqli_fetch_row($result)) {
  ?>
 <?php 
    $idmemorando = $mostrar[0];
   }
 ?>

<?php 
	require_once "../../classes/conexao.php";


	$c= new conectar();
	$conexao=$c->conexao();
	//$idvenda=$_GET['idvenda'];

 $sql="SELECT id_memorando, nome_funcionario, nome_receptor, justificativa, data_memorando, emissor
	from tab_memorando where id_memorando = '$idmemorando'";

$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	$comp=$ver[0];
	$funcionario=$ver[1];
	$receptor=$ver[2];
	$justificativa=$ver[3];
	$data=$ver[4];
	$emissor=$ver[5];
	
	
	

 ?>	

 	

 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 
 		<img src="../../img/logoneuro.png" width="200" height="120">
 		<br>

 		<style type="text/css">
 			h4{
 				
 				text-align: center;

 			}
 			hr{
 				color: gray;
 			}
 			p{
 				size: 20px;
 				color: gray;
 			}

 		</style>

 		<h4>Memorado, Teresina, <?php echo $data ?></h3>
 		<hr>
 		<br>
 		<p>De: <?php echo $emissor ?></p>
 		<p>Para: <?php echo $receptor ?></p>
 		<br><br>
 		<p>Venho por meio deste, informar que o funcionario <?php echo $funcionario ?>, por motivos de <?php echo $justificativa ?> faltará com suas obrigações!</p><br><br>
 		atencionamente, <?php echo $emissor ?>.

 			