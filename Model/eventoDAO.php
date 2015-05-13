<?php 
		include_once 'conexao.php';
	?>
	
	
	<?php 
	
			
	//cadastrar evento no banco
	function inserirEvento ($nome,$local,$data,$horainicio,$horatermino,$minimoparticipantes,$autocancelamento,$urlimagem,$emailcriador,$observacoes,$lembrete){
	$cadastro = mysql_query ("INSERT INTO evento (`nome`, `local`, `data`, `horainicio`, `horatermino`, `minimoparticipantes`, `autocancelamento`, `urlimagem`, `emailcriador`, `observacoes`, `lembrete`) VALUES ('$nome', '$local', '$data', '$horainicio', '$horatermino', '$minimoparticipantes', '$autocancelamento', '$urlimagem', '$emailcriador', '$observacoes', '$lembrete' )");
	}
	//buscar evento 
	function buscarEvento ($id){
	$buscar = mysql_query ("SELECT * FROM evento WHERE id=$id");
	return $buscar;
	}
	//editar evento
	function editarEvento ($id){
	$editar_evento = mysql_query ("UPDATE evento SET nome=$nome, local=$local, data=$data,horainicio=$horainicio, horatermino=$horatermino, minimoparticipantes=$minimoparticipantes, autocancelamento=$autocancelamento,urlimagem=$urlimagem, observacoes=$observacoes, lembrete=$lembrete WHERE id=$id ");
	}
	function deletarEvento($id){
	//deletar evento
	$deletar = mysql_query ("DELETE FROM evento WHERE id=$id");
	}
	?>