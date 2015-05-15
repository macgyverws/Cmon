<?php
	
	include('/Model/Convite.php');
	include('/Model/Evento.php');
	include('/Model/Usuario.php');
	include('/Model/conviteDAO.php');
	include('/Model/eventoDAO.php');
	include('/Model/usuarioDAO.php');
	include('/Model/conexao.php');
	
	public class Controller extends Exception{ 

   		private $eventosCriados=array();
   		private $eventosConfirmados=array();
   		private $eventosPendentes=array();
   		private $amigos=array();
		private $convitesDAO=ConviteDAO();	
   		private $eventosDAO=EventoDAO();	
   		private $usuariosDAO=UsuarioDAO();	


		private function carregarConvites($IDUsuario){
			$eventosDoUsuario=$conviteDAO->buscarConvites($IDUsuario);
			$quantidadeDeEventos = sizeof($eventosDoUsuario);
			$eventosConfirmadosTemp()=array();
			$eventosPendentesTemp()=array();
			$eventosCriadosTemp()=array();
			for($i = 0; $i < $quantidadeDeEventos; $i++){
    			if($eventosDoUsuario[$i]->getConfirmado()==true){//se o usuario estiver confirmado no evento
					array_push($eventosConfirmadosTemp,$eventosDoUsuario[$i])
					if($eventosDoUsuario[$i]->getCriador()->getID()==$IDUsuario){//se o usuário for o dono do evento
						array_push($eventosCriadosTemp,$eventosDoUsuario[$i]);
					}
				}
				else{//se não estiver confirmado
					array_push($eventosPendentesTempo,$eventosDoUsuario[$i])
				}
			}
			$eventosCriados=$eventosCriadosTemp();//sobrescreve a lista de eventos criados
			$eventosPendentes=$eventosPendentesTemp();//sobrescreve a lista de eventos pendentes
			$eventosConfirmados=$eventosConfirmadosTemp();//sobrescreve a lista de eventos confirmados
		}

		private function listarEventos($valor){
			$eventos=array();
			if($valor==0){//eventos Criados
				$quantidadeDeEventos = sizeof($eventosCriados);
					for($i = 0; $i < $quantidadeDeEventos; $i++){
						$eventoAtual=$eventoDAO->buscarEvento($eventosCriados[$i]->getIDevento());//busca o evento através do seu ID contido dentro de um convite
						array_push($eventos,$eventoAtual);
			}
			if($valor==1){//eventos Confirmados
				$quantidadeDeEventos = sizeof($eventosConfirmados);
					for($i = 0; $i < $quantidadeDeEventos; $i++){
						$eventoAtual=$eventoDAO->buscarEvento($eventosConfirmados[$i]->getIDevento());//busca o evento através do seu ID contido dentro de um convite
						array_push($eventos,$eventoAtual);
			}
			if($valor==2){//eventos Pendentes
				$quantidadeDeEventos = sizeof($eventosPendentes);
					for($i = 0; $i < $quantidadeDeEventos; $i++){
						$eventoAtual=$eventoDAO->buscarEvento($eventosPendentes[$i]->getIDevento());//busca o evento através do seu ID contido dentro de um convite
						array_push($eventos,$eventoAtual);
			}
			return $eventos;

		}

		private function verificarDisponibilidade($IDUsuario,$data,$horaInicio,$horaTermino){
			carregarConvites($IDUsuario);
			$eventos=buscarEvento(1);//cria uma lista de eventos criados
			$quantidadeDeEventos = sizeof($eventos);//verifica o tamanho da lista dos eventos criados
			for($i = 0; $i < $quantidadeDeEventos; $i++){
				if($eventoAtual->getData()==$data){
					if(($eventos[$i]->getHoraInicio()<=$horaInicio && $eventos[$i]->getHoraTermino()>=$horaInicio)/*inicio durante o evento*/
					||($eventos[$i]->getHoraInicio()<=$horaTermino && $eventos[$i]->getHoraTermino()>=$horaTermino)/*termino durante o evento*/
					||($horaInicio<=$eventos[$i]->getHoraInicio()&&$horaTermino>=$eventos[$i]->getHoraTermino())/*se o inicio for antes e o termino depois de um evento*/){
						return false;//encontrou um compromisso na mesma hora
					}
				}
			}
			return true;//usuario nao possui um compromisso na mesma hora
		}

		public function criarEvento($nomeEvento,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$IDcriador,$observacoes,$amigosSelecionados,$URLImagem){
			if (!verificarDisponibilidade($usuario,$data,$horaInicio,$horaTermino)){
				throw new TestableException('Usuario Ja Possui Evento Cadastrado Nesta Hora');
			}
			$eventoCriado = new Evento($nomeEvento,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$IDcriador,$observacoes,$URLImagem);
			$quantidadeConvites=sizeof($amigosSelecionados);
			for($i=0;$i<$quantidadeConvites;$i++){
				$conviteNovo = new Convite($amigosSelecionados[$i]->getID(),$eventoCriado->getID());
				$conviteDAO->inserirConvite($amigosSelecionados[$i]->getID(),$eventoCriado->getID());
				$eventoCriado->adcionarConvidados($conviteNovo);//adciona os convites na lista
			}
			$eventoDAO->inserirEvento($nomeEvento, $local, $data, $horainicio, $horatermino, $minimoparticipantes, $autocancelamento, $URLImagem, $IDCriador, $observacoes);

			/*TODO
				enviar os convites pelo facebook
			*/
		}
		private function buscarEvento($idEvento,$valor){
			$eventos=listarEventos($valor);
			$max = sizeof($eventos);
			for($i=0 ; $i<$max ; $i++){
				if($eventos[$i]->getID() == $idEvento){
					return $eventos[$i];
				}
			}
			return null;
		}
		public function alterarEvento($idEvento,$idUsuario,$nomeEvento,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$observacoes,$amigosSelecionados, $urlimagem){
			$eventoCriado=buscarEvento($idEvento,0);
			if($eventoCriado==null){
				throw new TestableException('Evento não encontrado');
			}
			$eventoCriado->setHoraInicio(null);
			$eventoCriado->setHoraTermino(null);
			if (!verificarDisponibilidade($idUsuario,$data,$horaInicio,$horaTermino)){//caso o horario seja inconpativel ele não deverá ser alterado...
				$eventoCriado->setHoraInicio($horaAntigaI);
				$eventoCriado->setHoraTermino($horaAntigaF);
				throw new TestableException('Usuario Ja Possui Evento Cadastrado Nesta Hora');
			}
			else{
				$eventoDAO->editarEvento ($idEvento, $nomeEvento, $local, $data, $horainicio, $horatermino, $minimoparticipantes, $autocancelamento, $urlimagem, $observacoes)
			}
			/*TODO
				enviar as alterações pelo facebook
			*/
		}

		public function cancelarEvento($idEvento) {
			$eventoCriado=buscarEvento($idEvento,0);
			if($eventoCriado == null){
				throw new DadoNaoEncontradoException("Evento nao foi encontrado");
			}
			$eventoDao->deletarEvento($idEvento);
			
			/*TODO
				enviar o cancelamento para o facebook
			*/
		}


		public function confirmarParticipacao($IDEventoPendente,$IDusuario){
			$eventoPendente=buscarEvento($IDEventoPendente,2);
			if ($eventoPendente==null){
				throw new DadoNaoEncontradoException('Evento não encontrado');
			}
			try{
				$eventoPendente->confirmarPresenca($IDusuario);
				$conviteDAO->editarConvite($conviteDao->buscarConvite($IDusuario)->getID,true);//evento alterado no banco de dados
				return true; //o convite foi confirmado;
			}
			catch (DadoNaoEncontradoException e){
				throw new DadoNaoEncontradoException('Usuario não encontrado');
			}
			return false;
		}

		public function cancelarParticipacao($IDEventoPendente,$IDusuario){
			$eventoPendente=buscarEvento($IDEventoPendente,2);
			if ($eventoPendente==null){
				$eventoPendente=buscarEvento($IDEventoPendente,1);
				if ($eventoPendente==null){
					throw new DadoNaoEncontradoException('Evento não encontrado');
				}
			}
			try{
				$eventoPendente->cancelarPresenca($IDusuario);
				$conviteDAO->editarConvite($conviteDao->buscarConvite($IDusuario)->getID,false);//evento alterado no banco de dados , agora como deletar se nao possuo IDCONVITE
				return true; //o convite foi confirmado;
			}
			catch (DadoNaoEncontradoException e){
				throw new DadoNaoEncontradoException('Usuario não encontrado');
			}
			return false;
		}
	

}
?>