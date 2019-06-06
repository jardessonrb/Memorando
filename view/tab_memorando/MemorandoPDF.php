
<?php 
	require_once "../../classes/conexao.class.php";


	$c= new conectar();
	$conexao=$c->conexao();
	$idmemorando=$_GET['idMemorando'];

	$sql="SELECT M.id_memorando, F.nome, M.nome_receptor, M.justificativa, M.data_memorando,M.emissor FROM tab_memorando M JOIN funcionarios F on M.id_funcionario = F.id_funcionario where id_memorando = '$idmemorando';" ;
$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);
	$memorando=$ver[0];
	$funcionario=$ver[1];
	$receptor=$ver[2];
	$justificativa=$ver[3];
	$data=$ver[4];
	$emissor=$ver[5];
	

 ?>	

 	

 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 
 		<style type="text/css">
 			.geral{
 				position: relative;
 			}
 			#data{
 				position: relative;
 				margin-top: -10px;
 				text-align: right;
 				font-size: 12px;
 			}
 			h4{
 				color: #696969;
 				text-align: center;
 			}
 			.titulo{
 				text-align: center;
 				color: #696969;
 				
 			}
 			.conteudo{
 				font-size: 16px;
 				position: relative;
 				font-family: arial;
 				text-align: justify;
 				top: 50px
 			}
 			p .refe{
 				position: justify;
 				padding-left: 1.8em 
 			}
 			
 			hr{
 				width: 100%;
				margin: 0 auto 0 0;
 			}
 			.rodape{
 				position:fixed;
 				height: 100px;
			    bottom:0;
			    width:100%;


 			}

 			#left{
 				position: relative;
 				text-align: left;
 				top: 82px;
 				
 				
 			}
 			#centro{
 				position: relative;
 				text-align: center;
 				top: 42px;
 				
 				
 			}
 			#right{
 				position: relative;
 				text-align: left;
 				top: 0;
 				
 			}
 		</style>
	 		<img src="../../img/logoneuro.png" width="200" height="120">
	 		<br>
	 		<p id="data">Teresina,&nbsp;<?php echo date("d/m/Y", strtotime($data))?>.</p>
	        <h4>Memorando Interno</h4>
		    <div class="geral">
		        <hr id="linha">
		        <div class="refe">
		                <p>De:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $emissor?></p>
			        	<p>Para:&nbsp;&nbsp;<?php echo $receptor?></p>
			        	<p>Assunto:</p>
		        </div>
		        <div class="conteudo">
		        <p class="conteudo" align="center"><?php echo $justificativa ?></p>
		        </div>
		        <div class="rodape">
		        	<div id="left">
		        		_____________________<br>
		        		Assinatura Coordenador
		        	</div>
		        	<div id="centro">
		        		_____________________<br>
		        		Assinatura Administrativa
		        	</div>
		        	<div id="direita" align="right">
		        		_____________________<br>
		        		Assinatura Diretor
		        	</div>
		    </div>
 	    </div>	