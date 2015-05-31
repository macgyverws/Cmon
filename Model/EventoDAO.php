	
<?php 		
	class EventoDAO{ //Classe de Acesso a Dados referentes ao Evento

		//Cadastrar evento no Banco de Dados.
		public function inserirEvento ($nome, $local, $data, $horaInicio, $horaTermino, $minimoParticipantes, $autoCancelamento, $nomeCriador, $observacoes){
			$cadastro = mysql_query ("INSERT INTO evento (`nome`, `local`, `data`, `horaInicio`, `horaTermino`, `minimoParticipantes`, `autoCancelamento`, `nomeCriador`, `observacoes`, `lembrete`) VALUES ('$nome', '$local', '$data', '$horaInicio', '$horaTermino', $minimoParticipantes, $autoCancelamento, '$nomeCriador', '$observacoes', 0)"); //Insere um evento na tabela.
			if(!$cadastro){ //Caso o cadastro do evento não seja efetuado por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso o cadastro do evento seja efetuado com sucesso, a função retorna "true".
		}
		
		//Buscar evento no Banco de Dados.
		public function buscarEvento ($id){
			$buscar = mysql_query ("SELECT * FROM evento WHERE 	`id`=$id"); //Busca os eventos na tabela.
			return $buscar; //Retorna os eventos da tabela.
		}

		//Editar evento no Banco de Dados.
		public function editarEvento ($id, $local, $data, $horaInicio, $horaTermino, $minimoParticipantes, $autoCancelamento, $lembrete, $observacoes){
			$editar_evento = mysql_query ("UPDATE evento SET `local` = '$local', `data` = '$data', `horaInicio` = '$horaInicio', `horaTermino` = '$horaTermino', `minimoParticipantes` = '$minimoParticipantes', `autoCancelamento` = '$autoCancelamento' , `lembrete` = $lembrete, `observacoes` = '$observacoes' WHERE `id` = $id"); //Modifica as informações do evento.
			if(!$editar_evento){ //Caso a modificação não seja realizada por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso a alteração no evento seja efetuada com sucesso, a função retorna "true".
		}
		
		//Deletar evento do Banco de Dados.
		public function deletarEvento ($id){
			$deletar = mysql_query ("DELETE FROM evento WHERE `id` = $id"); //Deleta um evento da tabela.
			if(!$deletar){ //Caso o evento não seja apagado por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso a exclusão do evento seja efetuada com sucesso, a função retorna "true".
		}
	}
?>
