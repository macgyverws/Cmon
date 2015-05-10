<?php
require_once "Evento.php";
require_once "Usuario.php";
     /*
     classe convite representa a entidade convite do sistema
  
    */

    class Convite{ 
    
     private $convidado;
     private $evento;
     private $confirmado =  false;
	
      /*
      construtor da classe Convite 
      recebendo um usuario e um evento como parametros
      */
      public function __construct($usuario,$evento){
	  	
     $this->convidado = $usuario; 
     this->evento = $evento;
     }
	
     public function confirmarParticipacao() 
     {
     /*quando o usuario confirmar participacao no convite
     esse convite é deletado dos pendentes e adicionado nos confirmados*/
     $evento->deletarConvitePendente($chave);
     $evento->adicionaConviteConfirmado($evento,$chave);
     }
     
     /*função que cancela  participacao de um convidado num convite
     deletando um convite da lista de convites pendetes de um evento*/
     public function cancelarParticipacao() 
     {
       $evento->deletarConvitePendente($chave); 
     }
    
    #############Getters da classe####################
	
	
    //retorna o atributo "confirmado"
    public function getComfirmado() 
    {
    return $this->$confirmado;
    }
    // retorna o atributo "evento"
    public function getEvento() 
    {
      return $this->$evento;
    }
    //retorna o atributo Convidado
    public function getConvidado() 
    {
      return $this->$convidado;
    }
	
    }



?>
