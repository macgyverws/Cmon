<?php

       /**
       * A classe evento contém atributos e métodos responsáveis pela manipulação dos eventos esportivos.
       */
   class Evento{ 
    
      // Número de identificação do evento esportivo.
      private $id;

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

      // Armazena o nome do criador do evento.
      private $criador;

      // Observações sobre o evento.
      private $observacoes;
        
        /**
         * Construtor da classe evento.
         */  
      public function __construct($nome,$local,$data,$horaInicio,$horaTermino,$minimoParticipantes,$autoCancelamento,$criador,$observacoes){
        $this->nome = $nome;
        $this->local = $local;
        $this->data = $data;
        $this->horaInicio = $horaInicio;
        $this->horaTermino = $horaTermino;
        $this->minimoParticipantes = $minimoParticipantes;
        $this->autoCancelamento = $autoCancelamento;
        $this->criador = $criador;
        $this->observacoes = $observacoes;
      }

      //getters --------------------------------------------------------------------------------------------------------------------------------
  	  public function getID( ) {
  	    return $this->id; 
  	  } 
  	   
  	  public function getNome( ) {
  	    return $this->nome; 
  	  }

  	  public function getLocal( ) { 
  	      return $this->local; 
  	  }

  	  public function getData( ) { 
  	      return $this->data; 
  	  }

  	  public function getHoraInicio( ) { 
  	      return $this->horaInicio; 
  	  }

  	  public function getHoraTermino( ) { 
  	      return $this->horaTermino; 
  	  }

  	  public function getMinimoParticipantes( ) { 
  	      return $this->minimoParticipantes; 
  	  }

  	  public function getFoiLembrado( ) { 
  	      return $this->foiLembrado; 
  	  }

  	  public function getAutoCancelamento( ) { 
  	      return $this->autoCancelamento; 
  	  }

  	  public function getCriador ()  { 
  	      return $this->criador; 
  	  }
  	  
      //Setters --------------------------------------------------------------------------------------------------------------------------------
      public function setID($id) {
        $this->id = $id; 
      }

      public function setFoiLembrado($foiLembrado){ 
        $this->foiLembrado = $foiLembrado; 
      }

      public function setAutoCancelamento($autoCancelamento){ 
        $this->autoCancelamento = $autoCancelamento; 
      }

  	  public function setObsevacoes($observacoes ) { 
  	    $this->observacoes= $observacoes; 
  	  }
  	  
  	  public function setHoraInicio($horaInicio ) { 
  	    $this->horaInicio= $horaInicio ; 
  	  }

  	  public function setHoraTermino($horaTermino ) { 
  	    $this->horaTermino= $horaTermino ; 
  	  }

  	  public function setMinimoParticipantes($minimoParticipantes ) { 
  	    $this->minimoParticipantes= $minimoParticipantes ; 
  	  }

      public function setLocal($local) { 
       $this->local = $local; 
      }

      public function setData($data) { 
       $this->data = $data; 
      }

}
?>


