<?php
require_once "Evento.php";
 
 require_once "Usuario.php";



  class Convite{ 
    
	
    private $convidado;
	private $evento;
	private $confirmado =  false;
	
	
	public function __construct($usuario,$evento){
     

     $this->convidado = $usuario;
	 $this->evento = $evento;
    }
	
	public function confirmarParticipacao() 
    {
	   //quando o usuario confirmar participacao no convite
	   //esse convite é deletado dos pendentes e adicionado nos confirmados
       $evento->deletarConvitePendente($chave);
	   $evento->adicionaConviteConfirmado($evento,$chave);
	}
     
	public function cancelarParticipacao() 
    {
       $evento->deletarConvitePendente($chave); 
	}
    
	public function getComfirmado() 
    {
      return $this->$confirmado;
    }
	
	public function getEvento() 
    {
      return $this->$evento;
    }
	public function getConvidado() 
    {
      return $this->$convidado;
    }
	
  }



?>
