
<?php 

	require_once "../../classes/conexao.class.php";
   
	$c = new conectar();
	$conexao=$c->conexao();

	$sql="SELECT M.id_memorando, F.nome, M.nome_receptor, M.justificativa, M.data_memorando,M.emissor FROM tab_memorando M JOIN funcionarios F on M.id_funcionario = F.id_funcionario ORDER BY id_memorando DESC LIMIT 8;";

	$result = mysqli_query($conexao, $sql);

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="../../lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../lib/select2/css/select2.css">
<script type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../css/estilo.css">



<script src="../../lib/jquery-3.2.1.min.js"></script>
<script src="../../lib/alertifyjs/alertify.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.js"></script>
<script src="../../lib/select2/js/select2.js"></script>
<script src="../../js/funcoes.js"></script>
<div id="botao">
	<a href="../memorando.php"><input id="btnNV" type="submit" name="btnNV" value="NOVO MEMORANDO +">
</a>

</div>
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
              <li><a href="tabelaMemorando.php">Memorando</a></li>
              <li><a href="../TelaTeste.php">Telas de Teste</a></li>
            </ul>
          </li>

             </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Gestão Pessoas <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../funcionarios.php">Funcionário</a></li>
              <li><a href="../funcionario/tabelaFuncionarios.php">Lista Funcionários</a></li>
              <li><a href="#">Usuário</a></li>
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
<section class="row" id="lisMemorando">
<form>
	<center>
<table class="table  table-condensed table-bordered" style="text-align:  center; width: 80% ">
	<caption><label>Memorandos recentes</label></caption>
	<tr class="bg-success">
			<td>Código</td>
			<td>Funcionario</td>
	 		<td>Receptor</td>
	 		<td>Data</td>
	 		<td>Emissor</td>
      <td>Imprimir</td>
		  <td>Excluir</td>
	</tr>

	<?php while($mostrar = mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[0]; ?></td>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo date("d/m/Y", strtotime($mostrar[4])) ?></td>
		<td><?php echo $mostrar[5]; ?></td>

    <td>
      <a href="../../procedimentos/relatorios/ImprimirMemorandoPDF.php?idMemorando=<?php echo $mostrar[0]?>" class="btn btn-primary btn-xs"><span>
        <span class="glyphicon glyphicon-print"></span>
      </span></a>
    </td>
		
		<td>

			 <span class="btn btn-danger btn-xs" onclick="excluirMemorando('<?php echo $mostrar[0]?>')"><span>
        <span class="glyphicon glyphicon-remove"></span>
      </span>
		</td>
	</tr>



<?php endWhile; ?>
</table>
</center>
</form>
</section>
<script type="text/javascript">
  function excluirMemorando(idMemorando){
  var res = window.confirm("Excluir Memorando?");
  if (res) {
    $.ajax({
      type:"POST",
      data:"idMemorando=" + idMemorando,
      url:"../../procedimentos/memorando/eliminarMemorando.php",
      success:function(r){
        if (r==1) {
          window.location.href="../../view/tab_memorando/tabelaMemorando.php";
        }else{
          alert('Memorando Não Excluido!');
        }
      }

    });
  }else{
    alert("Operação Cancelada!");
  }
  };
</script>

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
