
<?php 

	require_once "../../classes/conexao.php";
   
	$c = new conectar();
	$conexao=$c->conexao();

	$sql="SELECT id_memorando, nome_funcionario, nome_receptor, justificativa, data_memorando, emissor
	from tab_memorando order by id_memorando desc limit 8;";

	$result = mysqli_query($conexao, $sql);

?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Memorandos recentes</label></caption>
	<tr>
			<td>Código</td>
			<td>Funcionario</td>
	 		<td>Receptor</td>
	 		<td>justificativa</td>
	 		<td>Data</td>
	 		<td>Emissor</td>
	 		<td>Editar</td>
		    <td>Excluir</td>
	</tr>

	<?php while($mostrar = mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[0]; ?></td>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo $mostrar[3]; ?></td>
		<td><?php echo date("d/m/Y", strtotime($mostrar[4])) ?></td>
		<td><?php echo $mostrar[5]; ?></td>
		
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