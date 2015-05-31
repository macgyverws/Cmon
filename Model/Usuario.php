<?php

   /**
   * A classe usuário apresenta os atributos e métodos responsáveis pela manipulação do usuário.
   */
  class Usuario{ 
    private $nome;
    private $ID; 
    private $urlFoto;
    private $cidade;
    private $idade;
    private $esporteFavorito;
  
  /*
  * Construtor da classe usuário.
  */
  
   public function __construct($nome, $urlFoto, $cidade, $idade, $esporteFavorito, $ID){

      $this->nome = $nome;
      $this->urlFoto = $urlFoto;
      $this->cidade = $cidade;
      $this->idade = $idade;
      $this->esporteFavorito = $esporteFavorito;
      $this->ID= $ID; 

    }
  
    public function setEsporteFavorito($esporteFavorito){
      $this->esporteFavorito = $esporteFavorito;
    }
    public function getNome(){
      return $this->nome;
    } 
    public function getID(){
      return $this->ID;
    } 
    public function getUrlFoto(){
      return $this->urlFoto;
    } 
    public function getCidade(){
      return $this->cidade;
    } 
    public function getIdade(){
      return $this->idade;
    } 
    public function getEsporteFavorito(){
      return $this->esporteFavorito;
    } 
   
  }

?>



