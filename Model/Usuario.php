<?php

   /**
   * Classe Usuario - representa a entidado usuario no sistema
   */
    class Usuario{ 
	
	private $nome;
        private $email; 
        private $urlFoto;
	private $localizacao;
	private $idade;
	private $esporteFavorito;
	
	/*
	o metodo a seguir é o cosntrutor da classe usuario que 
	tem como parametros o nome,endereço da foto do perfil, localizacao, idade
	esporte favorito e email de um usuario
	*/
	
        public function __construct($nome,$urlFoto,$localizacao,$idade,$esporteFavorito,$email){
		
	$this->nome = $nome;
        $this->urlFoto = $urlFoto;
        $this->localizacao = $localizacao;
	$this->idade = $idade;
        $this->esporteFavorito = $esporteFavorito;
        $this->email= $email;	
        }
	
	public function setEsporteFavorito($esporteFavorito) //setter
        {
        $this->esporteFavorito = $esporteFavorito;
        }
	
	###########Getters da classe usuario##############
	
	
	//retorna o nome do usuario
	public function getNome() 
        {
        return $this->nome;
        } 
	//retorna o email do usuario
	public function getEmail() 
        {
         return $this->email;
        } 
	//retorna a url da foto do usuario
	public function getUrlFoto() 
        {
        return $this->urlFoto;
        } 
	//retorna a localizacao do usuario
	public function getLocalizacao() 
        {
         return $this->localizacao;
        } 
	//retorna a idade do usuario
	public function getIdade() 
        {
        return $this->idade;
        } 
	//retorna o esporte favorito do usuario
	public function getEsporteFavorito() 
        {
        return $this->esporteFavorito;
        } 
	 
	
	}

?>
