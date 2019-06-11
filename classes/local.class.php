<?php 

Class localClass{

	public function cadastrarLocal($dados){

		$c = new conectar();
		$conexao  = $c->conexao();

		$sql = "INSERT INTO tab_local (nome_local, predio) VALUES ('$dados[0]', '$dados[1]');";


		return mysqli_query($conexao, $sql);
	}
}



?>