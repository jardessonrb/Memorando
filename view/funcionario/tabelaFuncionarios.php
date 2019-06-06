
<?php 

require_once "../../classes/conexao.class.php";
	$c = new conectar();
		$conexao=$c->conexao();

	$sql = "SELECT id_funcionario, nome, sobrenome, endereco, email, telefone, cpf FROM funcionarios";
	$result = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<!--inserção de bibliotecas-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../lib/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="../../css/menu.css">
<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

<script src="../../lib/jquery-3.2.1.min.js"></script>
<script src="../../lib/alertifyjs/alertify.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.js"></script>
<script src="../../lib/select2/js/select2.js"></script>
<script src="../../js/funcoes.js"></script>
<!-- Finalização da inserção-->
  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive logo img-thumbnail" src="../img/logoneuro.png" alt="" width="200px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="../inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>

            
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Gestão administrativo <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../tab_memorando/tabelaMemorando.php">Memorando</a></li>
              <li><a href="#.php">Serviços</a></li>
            </ul>
          </li>

             </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Gestão Pessoas <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../funcionarios.php">Funcionário</a></li>
              <li><a href="#">Lista Funcionários</a></li>
              <li><a href="../../registrar.php">Usuário</a></li>
            </ul>
          </li>     

         

          glyphicon glyphicon-user
          
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario:   <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->


<table class="table table-hover table-condensed table-bordered" style="text-align:  center; width: 80% ">
	<caption><label>Funcionarios</label></caption>
	<tr>    
			<td>Nome</td>
	 		<td>Sobrenome</td>
	 		<td>Endereço</td>
	 		<td>Email</td>
	 		<td>Telefone</td>
	 		<td>CPF</td>
	 		<td>Editar</td>
		<td>Excluir</td>
	</tr>

	<?php while($mostrar = mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo $mostrar[3]; ?></td>
		<td><?php echo $mostrar[4]; ?></td>
		<td><?php echo $mostrar[5]; ?></td>
		<td><?php echo $mostrar[6]; ?></td>
		<td>
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalFuncionariosUpdate" onclick="adicionarDado('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarFuncionario('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>


<?php endWhile; ?>
</table>
<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );
</script>