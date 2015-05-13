<?php 
		include_once 'conexao.php';
	?>
	
	
	<?php 
	
			
	function inserirConvite ($idevento,$confirmacao,$emailconvidado){
	//cadastrar convite no banco
	$cadastro = mysql_query ("INSERT INTO convite (`idevento`, `confirmacao`, `emailconvidado`) VALUES ('$idevento', '%confirmacao', '%emailconvidado')");
	}
	function buscarConvite ($idevento,$idusuario){
	//buscar convite de um usuário
	$buscar = mysql_query ("SELECT * FROM convite WHERE id_evento=id_usuario");
	return $buscar;
	}
	//editar convite
	function editarConvite ($idConvite, $confirmacao){
	$editar_evento = mysql_query ("UPDATE convite SET confirmacao=$confirmacao,  WHERE id=$idConvite");
	}
	function deletarConvite ($idConvite){
	//deletar convite
	$deletar = mysql_query ("DELETE FROM convite WHERE id=$idConvite");
	}
	?>