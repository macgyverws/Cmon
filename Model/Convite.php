<?php

     /**
     * A classe convite apresenta os atributos e métodos responsáveis pela manipulação dos convites para os eventos.
     */

    class Convite{ 
        private $id;
        private $IDconvidado;
        private $IDevento;
        private $confirmado = false;
  
         /**
         *Método responsável por confirmar a participação de um usuário no evento.
        */
        public function setConfirmacao($confirmado){  
          $this->confirmado = $confirmado;
        }
        
        public function setID($id){
          $this->id = $id;
        }

        public function setIDconvidado($IDconvidado){
          $this->IDconvidado = $IDconvidado;
        }

        public function setIDevento($IDevento){
          $this->IDevento = $IDevento;
        }

        public function getID(){
          return $this->id;
        }

        public function getConfirmado(){
          return $this->confirmado;
        }
      
        public function getIDEvento(){
            return $this->IDevento;
        }
        
        public function getIDConvidado(){
            return $this->IDconvidado;
        }
      
    }
?>



