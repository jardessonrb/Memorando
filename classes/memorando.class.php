<?php

class cmemorando{
	public function AdcionaMemorando($dados){
		$c = new conectar();
		$conexao=$c->conexao();
		
		$data = date('Y-m-d');

		$sql = "INSERT into tab_memorando (nome_receptor, justificativa, data_memorando, local, id_funcionario, emissor) VALUES ('$dados[0]', '$dados[1]','$data', '$dados[2]', '$dados[3]', '$dados[4]')";
        
		return mysqli_query($conexao, $sql);
	}
	
	public function eliminarMemorando($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		$sql = "DELETE FROM tab_memorando WHERE id_memorando = '$dados[0]';";
        
		return mysqli_query($conexao, $sql);
	}



}

?>

