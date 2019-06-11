
	<!DOCTYPE html>
	<html>
	<head>
		<title>Funcionarios</title>
		<?php require_once "menu.php"; ?>
		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px">
			<h1>Cadastro de Local</h1>
			<div class="row">
				<div class="col-sm-5">
					<form id="frmLocal">
						<label>Nome Local</label>
						<input type="text" class="form-control input-sm" id="nome_local" name="nome_local" placeholder="Ex: Anexo">
						<label>Nome Prédio</label>
						<input type="text" class="form-control input-sm" id="nome_predio" name="nome_predio" placeholder="Ex: Laura">
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarLocal">Cadastrar</span>
					</form>
				</div>
			</div>
		</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAdicionarLocal').click(function(){

			vazios=validarFormVazio('frmLocal');

			if(vazios > 0){
				alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmLocal').serialize();
			
			$.ajax({
				type:"POST",
				data:dados,
				url:"../procedimentos/local/cadastrarlocal.php",
				success:function(r){
					//alert(r);

					if(r==1){
						$('#frmLocal')[0].reset();
						alert("Local Inserido com Sucesso!!");
					}else{
						alert("Erro ao Inserir");
					}
				}
			});
		});
	});
</script>