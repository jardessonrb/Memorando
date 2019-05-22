<?php 
require_once "../classes/conexao.php";
    $c = new conectar();
	$conexao=$c->conexao();

	$sql = "SELECT id_funcionario FROM funcionarios ";
	$result = mysqli_query($conexao, $sql);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "menu.php"; ?>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
</head>
<body>
<div class="container">
			<h1>Novo Memorando</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmMemorando">
						<label>Funcionário</label>
						<input type="text" class="form-control input-sm" id="funcionario" name="funcionario">
						<label>Emissor do Memorando</label>
						<input type="text" class="form-control input-sm" id="emissor" name="emissor">
						<label>Receptor do Memorando</label>
						<input type="text" class="form-control input-sm" id="receptor" name="receptor">
						<label>Justificativa Memorando</label>
				        <textarea class="form-control input-sm" id="justificativa" name="justificativa"></textarea>
						<label>Local de Emissão</label>
						<input type="text" class="form-control input-sm" id="local" name="local">
						<label>Comentario Memorando</label>
						<textarea class="form-control " id="comentario" name="comentario"></textarea>
						<p></p>
						<span class="btn btn-primary" id="btnNovoMemorando">Salvar Memorando</span>
						<a href="../procedimentos/relatorios/criarRelatorioPdf.php"><span class="btn btn-primary" id="btnRelatorio">Relatorio</span></a>
					</form>
				</div>
				<div class="col-sm-8">
					<input type="text" name="pesq" size="30" placeholder="nome funcionario">
					<a href="funcionarios/tabelaFuncionarios.php"><span class="btn btn-primary" id="btnRelatorio">Pesquisar</span></a>
				</div>
				<div class="col-sm-8">
					<div id="tabelaFuncionariosLoad"></div>
				</div>
			</div>
		</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnNovoMemorando').click(function(){
        $('#tabelaFuncionariosLoad').load("tab_memorando/tabelaMemorando.php");
			vazios=validarFormVazio('frmMemorando');

			if(vazios > 0){
				alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmMemorando').serialize();
			
			$.ajax({
				type:"POST",
				data:dados,
				url:"../procedimentos/login/novo_memorando.php",
				success:function(r){
					//alert(r);

					if(r==1){
						$('#frmMemorando')[0].reset();
						$('#tabelaFuncionariosLoad').load("tab_memorando/tabelaMemorando.php");
						alert("Memorando Cadastrado com Sucesso!!");	
					}else{
						alert("Erro ao Cadastrar Memorando");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaFuncionariosLoad').load("tab_memorando/tabelaMemorando.php");

			$('#btnAdicionarFuncionario').click(function(){

				vazios=validarFormVazio('frmFuncionarios');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmFuncionarios').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/funcionario/adicionarfuncionarios.php",
					success:function(r){

						if(r==1){
							$('#frmFuncionarios')[0].reset();
							$('#tabelaFuncionariosLoad').load("tab_memorando/tabelaMemorando.php");
							alertify.success("Funcionário Adicionado");
						}else{
							alertify.error("Não foi possível adicionar");
						}
					}
				});
			});
		});
	</script>