<?php
    require_once "Evento.php";
    require_once "Usuario.php";
     /**
     * A classe convite apresenta os atributos e métodos responsáveis pela manipulação dos convites para os eventos.
     */

    public class Convite{ 
     private $id;
     private $IDconvidado;
     private $IDevento;
     private $confirmado =  false;
  
      /**
      * Construtor da classe convite.
      */
      public function __construct($IDconvidado, $IDevento){
        $this->IDconvidado = $IDconvidado; 
        $this->IDevento = $IDevento; //tava sem o cifrão
     }
     /**
     *Método responsável por confirmar a participação de um usuário no evento.
     */
      public function confirmarParticipacao(){  
        $confirmado = true;
     }
     
     /**
     *Método responsável por cancelar a participação de um usuário no evento.
     */
     public function cancelarParticipacao(){
        $confirmado = false;
     }
  
    public function getID(){
      return $this->$id;
    }

    public function getConfirmado(){
      return $this->$confirmado;
    }
  
    public function getIDEvento(){
        return $this->$IDevento;
    }
    
    public function getIDConvidado(){
        return $this->$IDconvidado;
    }
  
    }
?>



