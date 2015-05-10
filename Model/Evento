<?php
require_once "Convite.php";


   /**
   * Classe Publica - Evento
   */
    class Evento{ 
	
	private $id;
    private $URL;
    private $nome;
	private $local ;
    private $data;
	private $horaInicio ;
    private $horaTermino ;
	private $minimoParticipantes;
	private $foiLembrado;
	private $autoCancelamento;
	private $criador;
	private $convitesPendentes = array();
	private $convitesconfirmados = array();
	private $observacoes;
	
	
	public function __construct($nome,$local,$data){
	
	$this->nome = $nome;
    $this->local = $local;
    $this->data = $data;
	
	}
	public function __getid( ) {
		return $this->$id; 
	} 
	public function __getURL( ) {
		return $this->$URL; 
	} 
	public function __getNome( ) {
		return $this->$nome; 
	}
	public function __geLocal( ) { 
	    return $this->$local; 
	}
	public function __getData( ) { 
	    return $this->$data; 
	}
	public function __getHoraInicio( ) { 
	    return $this->$horaInicio; 
	}
	public function __getHoraTermino( ) { 
	    return $this->$horaTermino; 
	}
	public function __getMinimoParticipantes( ) { 
	    return $this->$minimoParticipantes; 
	}
	public function __getFoiLembrado( ) { 
	    return $this->$foiLembrado; 
	}
	public function __getAutoCancelamento( ) { 
	    return $this->$autoCancelamento; 
	}
	public function __getCriador ()  { 
	    return $this->$autoCancelamento; 
	}
	
	public function __getConviterPendentes( ) { 
	    return $this->$convitesPendentes; 
	}
	public function __getConviterConfirmados( ) { 
	    return $this->$convitesPendentes; 
	}
	
	
	
	
	public function __setConvitesPendentes( $convitesPendentes) { 
	   $this->$convitesPendentes = $convitesPendentes;
	}
	
	public function __setConvitesConfirmados($convitesConfirmados ) { 
	   $this->$convitesConfirmados=$convitesConfirmados; 
	}
	public function __setId($id ) { 
	     $this->$id= $id; 
	}
	public function __setObsevacoes($observacoes ) { 
	     $this->$observacoes= $observacoes; 
	}
	
	public function __setURLImagem($url) { 
	     $this->$url= $url; 
	}
	public function __setHoraInicio($horaInicio ) { 
	     $this->$horaInicio= $horaInicio ; 
	}
	public function __setHoraTermino($horaTermino ) { 
	     $this->$horaTermino= $horaTermino ; 
	}
	public function __setMinimoParticipantes($minimoParticipantes ) { 
	     $this->$minimoParticipantes= $minimoParticipantes ; 
	}

   /*
   cada convite deve ter uma chave para não chocar con convites já existentes
   e principalmente na hora de remover um convite
   */
 
    public function addConviteConfirmado($convite, $key ) {
            // metodo isset verifica se já existe algum convite ocupando 
			// aquele local no indice do array
            if (isset($this->$convitesconfirmados[$key])) {
                throw new EventoException("Convite já existente");
            }
            else {
                $this->$convitesconfirmados[$key] = $convite;
            }
        }
    
   /*
   deleta um iten do array de acordo com a chave deste
   */
    public function deletarConvitePendente($key) {
        if (isset($this->convitesPendentes[$key])) {
            unset($this->convitesPendentes[$key]);
			
        }
        else {
            throw new chaveInvalidaException("A chave $key é inválida.");
        }
    }
	
	 public function getConvitePendentes($key) {
        if (isset($this->convitesPendentes[$key])) {
            return $this->convitesPendentes[$key];
        }
        else {
            throw new ChaveInvalidaException("A chave $key é inválida.");
        }
    }
	
	public function getConviteConfirmado($key) {
        if (isset($this->convitesConfirmados[$key])) {
            return $this->convitesConfirmados[$key];
        }
        else {
            throw new ChaveInvalidaException("A chave $key é inválida.");
        }
    }
	
	
	}
     
	 


?>
