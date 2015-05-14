<?php 

// Classe de conexão com o banco de dados e acesso as tabelas do cmon.
public class Conexao{
  
  // O servidor onde o sistema funciona.
  private $servidor;
  
  // O banco que será acessado pelo sistema.
  private $banco;
  
  // O usuário de acesso ao servidor.
  private  $usuario;
  
  // A senha de acesso ao servidor
  private $senha;
  
  // O construtor da classe recebendo os dados do servidor.
  public function __construct($servidor, $usuario, $senha){
    $this->servidor = $servidor; 
    $this->usuario = $usuario;
    $this->senha = $senha;
  }
  
  // Conecta o sistema a um banco de dados.
  public function conectar($banco){
    $link = mysql_connect($this->servidor, $this->usuario, $this->senha);
    
    if (!$link) {
     die('Could not connect: ' . mysql_error());
    }
    
    $db = mysql_select_db($banco,$link);
    
    if (!$db_selected) {
      die ('Can\'t use foo : ' . mysql_error());
    }
  }
  
}


?>
