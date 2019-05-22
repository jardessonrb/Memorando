<?php

class cmemorando{
	public function AdcionaMemorando($dados){
		$c = new conectar();
		$conexao=$c->conexao();
		
		$data = date('Y-m-d');
		$id_funci = 2;

		$sql = "INSERT into tab_memorando (nome_funcionario, nome_receptor, justificativa, comentario, data_memorando, local, id_funcionario, emissor) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$data', '$dados[4]', '$id_funci', '$dados[5]')";
        
		return mysqli_query($conexao, $sql);
	}


}

?>

