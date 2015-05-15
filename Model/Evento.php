<?php
require_once "Convite.php";


       /**
       * A classe evento contém atributos e métodos responsáveis pela manipulação dos eventos esportivos.
       */
    public class Evento{ 
    
      // Número de identificação do evento esportivo.
      private $id;

      // Url da imagem de apresentação do evento.
      private $URLImagem;

      // Nome do evento.
      private $nome;

      // Local onde será realizado o evento
      private $local ;

      // Data de realização do evento.
      private $data;

      // Momento em que se inicia o evento.
      private $horaInicio ;

      // Momento em que se finaliza o evento.
      private $horaTermino ;

      // Número mínimo de participantes para que o evento possa ser realizado.
      private $minimoParticipantes;

      // Informa se o acontecimento do evento já foi lembrado aos convidados
      private $foiLembrado = false;

      // Auto cancela o evento caso esteja há um dia deste acontecer e não possua o número mínimo de convidados confirmados
      private $autoCancelamento;

      // Armazena os dados do criador do evento.
      private $criador;

      // Lista de convites que ainda estão pendentes.
      private $convitesPendentes = array();

      // Lista de convites que já foram confirmados.
      private $convitesconfirmados = array();

      // Observações sobre o evento.
      private $observacoes;
        
        /**
         * Construtor da classe evento.
         */  
      public function __construct($nome,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$criador,$convitesPendentes,$observacoes,$URLImagem){
        $this->nome = $nome;
        $this->local = $local;
        $this->data = $data;
        $this->horaInicio = $horaInicio;
        $this->horaTermino = $horaTermino;
        $this->minimoParticipantes = $minimoParticipantes;
        $this->autoCancelamento = $autoCancelamento;
        $this->criador = $criador;
        $this->convitesPendentes = $convitesPendentes;
        $this->observacoes = $observacoes;
        $this->URLImagem = $URLImagem;
      }

	  public function getID( ) {
	    return $this->$id; 
	  } 
	  public function getURL( ) {
	    return $this->$URL; 
	  } 
	  public function getNome( ) {
	    return $this->$nome; 
	  }
	  public function getLocal( ) { 
	      return $this->$local; 
	  }
	  public function getData( ) { 
	      return $this->$data; 
	  }
	  public function getHoraInicio( ) { 
	      return $this->$horaInicio; 
	  }
	  public function getHoraTermino( ) { 
	      return $this->$horaTermino; 
	  }
	  public function getMinimoParticipantes( ) { 
	      return $this->$minimoParticipantes; 
	  }
	  public function getFoiLembrado( ) { 
	      return $this->$foiLembrado; 
	  }
	  public function getAutoCancelamento( ) { 
	      return $this->$autoCancelamento; 
	  }
	  public function getCriador ()  { 
	      return $this->$autoCancelamento; 
	  }
	  public function getConviterPendentes( ) { 
	      return $this->$convitesPendentes; 
	  }
	  public function getConviterConfirmados( ) { 
	      return $this->$convitesPendentes; 
	  }

  
	  public function setObsevacoes($observacoes ) { 
	       $this->$observacoes= $observacoes; 
	  }
	  public function setURLImagem($url) { 
	       $this->$url= $url; 
	  }
	  public function setHoraInicio($horaInicio ) { 
	       $this->$horaInicio= $horaInicio ; 
	  }
	  public function setHoraTermino($horaTermino ) { 
	       $this->$horaTermino= $horaTermino ; 
	  }
	  public function setMinimoParticipantes($minimoParticipantes ) { 
	       $this->$minimoParticipantes= $minimoParticipantes ; 
	  }

       /**
       * O método abaixo serve para confirmar a presença de um usuário no evento.
       */
       public function confirmarPresenca($idConvidado) {
      	$max=sizeof($convitesPendentes);
           for($i=0;$i<$max;$i++){
              if($convitesPendentes[$i]->getIDConvidado()==$idConvidado){
              		$convitesPendentes[$i]->confirmarParticipacao();
              		$convite=$convitesPendentes[$i];
              		array_splice($convitesPendentes, $convite);//deleta convite
            		array_push($convitesConfirmados, $convite);//insereconvite
        			return; 
			  }
      	   }
		throw new DadoNaoEncontradoException(“Não foi possível confirmar presença neste evento, usuário não encontrado na lista de pendentes”);
         }
         
        /*
        * O método abaixo serve para cancelar a presença de um usuário no evento.
        */
       public function cancelarPresenca($idConvidado, $confirmado) {  //deletar também na lista de convites do controller, para excluir do bd
    	if(!$confirmado){
 			$max=sizeof($convitesPendentes);
			for($i=0;$i<$max;$i++){
   				 if($convitesPendentes[$i]->getIDConvidado()==$idConvidado){
    				$convitesPendentes[$i]->cancelarParticipacao();
    				$convite=$convitesPendentes[$i];
    				array_splice($convitesPendentes, $convite);
    				return ;
				 }
  			}
 	   }
  
  		else{
    	   $max=sizeof($convitesConfirmados);
           for($i=0;$i<$max;$i++){
              if($convitesConfirmados[$i]->getIDConvidado()==$idConvidado){
      			 $convitesConfirmados[$i]->cancelarParticipacao();
     			 $convite=$convitesConfirmados[$i];
     			 array_splice($convitesConfirmados, $convite);
      			 return ;
				}
          }
		}
		throw new dadoNaoEncontradoException(“Não foi possível localizar o usuário”);
     }

    /**
    * O método abaixo serve para listar os convidados confirmados ou pendentes de um evento.
    */
      public function listarConvidados($confirmados) {//true = confirmados false =pendentes’-’
  	   $convites;
  	   if($confirmados)
       		$convites = $convitesConfirmados;
 	   else
       		$convites = $convitesPendentes;

       $max=sizeof($convites);
	   if($max==0){
			throw new dadoNaoEncontradoException("Não há convidados pedentes para este evento");
       }
       else{
     		$listaConvidados=array();
        	for($i=0;$i<$max;$i++){
            	array_push($listaConvidados,$convites[$i]->getIDConvidado());
         	}         
       		return $listaConvidados;
      }
 	}

  public function adcionarConvidados($listaConvidados){
    array_push($convitesPendentes,$listaConvidados);   
  }

}
?>


