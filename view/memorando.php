<?php 
require_once "../classes/conexao.class.php";
    $c = new conectar();
	$conexao=$c->conexao();

	$sql = "SELECT id_funcionario FROM funcionarios ";
	$result = mysqli_query($conexao, $sql);
 ?>
 <?php
 require_once "../classes/conexao.class.php";
    $c = new conectar();
	$conexao=$c->conexao();

	$sql = "SELECT id_funcionario, nome FROM funcionarios ORDER BY nome asc";
	$nomes = mysqli_query($conexao, $sql);
 ?>
 <?php
 require_once "../classes/conexao.class.php";
    $c = new conectar();
	$conexao=$c->conexao();

	$sql = "SELECT id_local, nome_local FROM tab_local";
	$locais = mysqli_query($conexao, $sql);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "menu.php"; ?>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
	<!--Textarea-->
	<script type="text/javascript" src="../lib/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../lib/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({ 
	 	  selector:'#justificativa'
	 	});
	</script>
</head>
<body>

<div class="container" style="position: relative; margin-left: 400px" >
			<h1>Novo Memorando</h1>
			<div class="row">
				<div class="col-sm-7">
					<form id="frmMemorando">
						<label>Funcionário</label>
						<select class="form-control input-sm" name="funcionario" id="funcionario" required>
							<option value="0" selected="Selecione Funcionario">Selecione Funcionario</option>
							<?php while($mostra = mysqli_fetch_row($nomes)):?>
								<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]; ?></option>
							<?php endWhile; ?>	
						</select>
						<label>Emissor do Memorando</label>
						<input type="text" class="form-control input-sm" id="emissor" name="emissor">
						<label class="input-label">Receptor do Memorando</label>
						<input type="text" class="form-control input-sm" id="receptor" name="receptor">
						<label>Local de Emissão</label>
 							<select class="form-control input-sm" name="local" id="local">
							<option value="0" selected="Selecione Funcionario">Selecione Local</option>
							<?php while($mostra = mysqli_fetch_row($locais)):?>
								<option value="<?php echo $mostra[1] ?>"><?php echo $mostra[1]; ?></option>
							<?php endWhile; ?>	
						</select>
						<label>Justificativa do memorando</label>
						<textarea name="justificativa" id="justificativa" rows="5" class="form-control" style="height:280px;"></textarea>
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 412px" id="btnNovoMemorando">Salvar Memorando</span>
						
					</form>
				</div>
			</div>
		</div>
	
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnNovoMemorando').click(function(){	
			vazios=validarFormVazio('frmMemorando');
			if(vazios > 0){
				alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmMemorando').serialize();
			
			$.ajax({
				type:"POST",
				data:dados,
				url:"../procedimentos/memorando/novo_memorando.php",
				success:function(r){
					if(r==1){
						$('#frmMemorando')[0].reset();
						alert("Memorando Cadastrado com Sucesso!!");
						window.location.href="../view/tab_memorando/tabelaMemorando.php";
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