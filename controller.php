<?php
   public class Evento extends Exception{ 
private function buscarEventosConfirmadosDeUmUsuario($usuario){
	$eventosDoUsuario=ConvitesDAO.buscarConvites($usuario.getID());
	$eventosConfirmados=array();
	$quantidadeDeEventos = sizeof($eventosDoUsuario);
	for($i = 0; $i < $quantidadeDeEventos; $i++){
    	if($eventosDoUsuario[i].getConfirmado()==true){
			array_push($eventosConfirmados,$eventosDoUsuario[i])
		}
	}
		return $eventosConfirmados;
}
private function verificarDisponibilidade($usuario,$data,$horaInicio,$horaTermino){
	$eventosDoUsuario=buscarEventosConfirmadosDeUmUsuario($usuario);
	//array_push($eventosDoUsuario,)
	$quantidadeDeEventos = sizeof($eventosDoUsuario);
	for($i = 0; $i < $quantidadeDeEventos; $i++){
		$eventoAtual=$eventosDoUsuario[$i].getEvento()
		if($eventoAtual.getData()==$data){
			if(($eventoAtual.getHoraInicio()<=$horaInicio && $eventoAtual.getHoraTermino()>=$horaInicio)/*inicio durante o evento*/
			||($eventoAtual.getHoraInicio()<=$horaTermino && $eventoAtual.getHoraTermino()>=$horaTermino)/*termino durante o evento*/
			||($horaInicio<=$eventoAtual.getHoraInicio()&&$horaTermino>=$eventoAtual.getHoraTermino())/*se o inicio for antes e o termino depois de um evento*/){
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
		$eventoCriado.adcionarConvitePendente($conviteNovo);//adciona os convites na lista
	}
	/*TODO
		enviar os convites pelo facebook
	*/
}


public function alterarEvento($eventoCriado,$nomeEvento,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$criador,$observacoes,$amigosSelecionados){
	$horaAntigaI=$eventoCriado.getHoraInicio();
	$horaAntigaF=$eventoCriado.getHoraTermino();
	$eventoCriado.setHoraInicio(null);
	$eventoCriado.setHoraTermino(null);
	if (!verificarDisponibilidade($usuario,$data,$horaInicio,$horaTermino)){//caso o horario seja inconpativel ele não deverá ser alterado...
		$eventoCriado.setHoraInicio($horaAntigaI);
		$eventoCriado.setHoraTermino($horaAntigaF);
		throw new TestableException('Usuario Ja Possui Evento Cadastrado Nesta Hora');
	}
	/*TODO
		enviar as alterações pelo facebook
	*/

}
}