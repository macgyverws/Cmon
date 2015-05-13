<?php
   public class Controller extends Exception{ 
   	private $eventosCriados=array();
   	private $eventosConfirmados=array();
   	private $eventosPendentes=array();

private function buscarEventosConfirmadosDeUmUsuario($usuario){
	$eventosDoUsuario=ConvitesDAO.buscarConvites($usuario->getID());
	$eventosConfirmados=array();
	$quantidadeDeEventos = sizeof($eventosDoUsuario);
	for($i = 0; $i < $quantidadeDeEventos; $i++){
    	if($eventosDoUsuario[$i].getConfirmado()==true){
			array_push($eventosConfirmados,$eventosDoUsuario[$i])
		}
	}
		return $eventosConfirmados;
}
private function buscarEventosPendentesDeUmUsuario($usuario){
	$eventosDoUsuario=ConvitesDAO.buscarConvites($usuario->getID());
	$eventosConfirmados=array();
	$quantidadeDeEventos = sizeof($eventosDoUsuario);
	for($i = 0; $i < $quantidadeDeEventos; $i++){
    	if($eventosDoUsuario[$i]->getConfirmado()==false){
			array_push($eventosConfirmados,$eventosDoUsuario[$i])
		}
	}
		return $eventosConfirmados;
}
private function buscarEventosCriadosPorUmUsuario($usuario){
	$eventosDoUsuario=ConvitesDAO.buscarConvites($usuario->getID());
	$eventosConfirmados=array();
	$quantidadeDeEventos = sizeof($eventosDoUsuario);
	for($i = 0; $i < $quantidadeDeEventos; $i++){
    if(strcmp($eventosDoUsuario[$i]->getCriador(), $usuario)==0){
			array_push($eventosConfirmados,$eventosDoUsuario[$i])
		}
	}
		return $eventosConfirmados;
}

private function verificarDisponibilidade($usuario,$data,$horaInicio,$horaTermino){
	$eventosDoUsuario=buscarEventosConfirmadosDeUmUsuario($usuario);
	//array_push($eventosDoUsuario,)
	$quantidadeDeEventos = sizeof($eventosDoUsuario);
	for($i = 0; $i < $quantidadeDeEventos; $i++){
		$eventoAtual=$eventosDoUsuario[$i]->getEvento()
		if($eventoAtual.getData()==$data){
			if(($eventoAtual->getHoraInicio()<=$horaInicio && $eventoAtual->getHoraTermino()>=$horaInicio)/*inicio durante o evento*/
			||($eventoAtual->getHoraInicio()<=$horaTermino && $eventoAtual->getHoraTermino()>=$horaTermino)/*termino durante o evento*/
			||($horaInicio<=$eventoAtual->getHoraInicio()&&$horaTermino>=$eventoAtual->getHoraTermino())/*se o inicio for antes e o termino depois de um evento*/){
				return false;//encontrou um compromisso na mesma
			}
		}
		
	}
	return true;//usuario nao possui um compromisso na mesma hora
}
public function criarEvento($nomeEvento,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$criador,$observacoes,$amigosSelecionados){
	if (!verificarDisponibilidade($usuario,$data,$horaInicio,$horaTermino)){
		throw new TestableException('Usuario Ja Possui Evento Cadastrado Nesta Hora');
	}
	$eventoCriado = new Evento($nomeEvento,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$criador,$observacoes,$amigosSelecionados);
	$quantidadeConvites=sizeof($amigosSelecionados);
	for($i=0;$i<$quantidadeConvites;$i++){
		$conviteNovo = new Convite($amigosSelecionados[$i],$eventoCriado);
		$eventoCriado->adcionarConvitePendente($conviteNovo);//adciona os convites na lista
	}
		array_push($eventosCriados,$eventoCriado);
	/*TODO
		enviar os convites pelo facebook
	*/
}


public function alterarEvento($eventoCriado,$nomeEvento,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$observacoes,$amigosSelecionados){
	$horaAntigaI=$eventoCriado.getHoraInicio();
	$horaAntigaF=$eventoCriado.getHoraTermino();
	$eventoCriado->setHoraInicio(null);
	$eventoCriado->setHoraTermino(null);
	if (!verificarDisponibilidade($usuario,$data,$horaInicio,$horaTermino)){//caso o horario seja inconpativel ele não deverá ser alterado...
		$eventoCriado->setHoraInicio($horaAntigaI);
		$eventoCriado->setHoraTermino($horaAntigaF);
		throw new TestableException('Usuario Ja Possui Evento Cadastrado Nesta Hora');
	}
	else{
		$max=sizeof($eventosCriados){
			for($i=0;$i<$max;$i++){
				if($evetosCriados[$i]->getID==$eventoCriado->getID()){
					$evetosCriados[$i]->setNomeEvento($nomeEvento);
					$evetosCriados[$i]->setLocal($local);
					$evetosCriados[$i]->setData($data);
					$evetosCriados[$i]->setHoraInicio($horaInicio);
					$evetosCriados[$i]->setHoraTermino($horaTermino);
					$evetosCriados[$i]->setMinimoParticipantes($minimoParticipantes);
					$evetosCriados[$i]->setAutoCancelamento($autoCancelamento);
					$evetosCriados[$i]->setObservacoes($observacoes);
					$evetosCriados[$i]->adcionarConvidados($amigosSelecionados);
				}
			}			
		}
	}
	/*TODO
		enviar as alterações pelo facebook
	*/

}


public function cancelarEvento($evento) {
	$chave=array_search($eventosCriados,$evento)
	if($chave == null){
		throw new DadoNaoEncontradoException("Evento nao foi encontrado");
	}
	array_splice($eventosCriados,$evento)
	
	/*TODO
		enviar o cancelamento para o facebook
	*/
}


public function visualizarEventos($valor,$usuario){
	$eventos = array();
	if($valor==0){//retorna criados
		$eventos=buscarEventosCriadosPorUmUsuario($usuario);
	}
	else if($valor==1){//retorna pednentes
		$eventos=buscarEventosPendentesDeUmUsuario($usuario);
	}
	else if($valor==2){//retorna confirmados
		$eventos=buscarEventosConfirmadosDeUmUsuario($usuario);
	}
	return $eventos;
}


public function confirmarParticipacao($IDEventoPendente,$usuario){
	$eventosPendentes=buscarEventosPendentesDeUmUsuario($usuario);
	$tamP=sizeof($eventosPendentes);
	for ($i=0; $i < $tamP; $i++) { //compara o evento que quero confirmar com os eventos do array de pendentes.
		if($IDEventoPendente == $eventosPendentes[$i]->getID()) { //se o evento que quero confirmar for o mesmo do array de pendentes...
			try{
			$eventosPendentes[$i]->confirmarPresenca($usuario->getID());
			array_push($eventosConfirmados,$eventosPendentes[$i]);
			return true; //o convite foi confirmado;
			}
			catch (DadoNaoEncontradoException e){
				throw new DadoNaoEncontradoException("Usuario não encontrado");
			}
			
		}
	}
	return false;//convite não foi confirmado
}


public function cancelarParticipacao($IDEventoPendente,$usuario){
	$eventosPendentes=buscarEventosPendentesDeUmUsuario($usuario);
	array_push($eventosPendentes,buscarEventosConfirmadosDeUmUsuario($usuario));
	$tamP=sizeof($eventosPendentes);
	for ($i=0; $i < $tamP; $i++) { //compara o evento que quero confirmar com os eventos do array de pendentes.
		if($IDEventoPendente == $eventosPendentes[$i]->getID()) { //se o evento que quero confirmar for o mesmo do array de pendentes...
			try{
			$eventosPendentes[$i]->cancelarPresenca($usuario->getID());
			return true; //o convite foi confirmado;
			}
			catch (DadoNaoEncontradoException e){
				throw new DadoNaoEncontradoException("Usuario não encontrado");
			}
			
		}
	}
	return false;//convite não foi confirmado
}

}