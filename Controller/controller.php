<?php
  
  include('../Model/Usuario.php');
  include('../Model/Convite.php');    
  include('../Model/Evento.php');

  include ('../Model/UsuarioDAO.php');
  include ('../Model/EventoDAO.php');
  include ('../Model/ConviteDAO.php');

  include ('../Model/Conexao.php');

  class Controller{ 

    //Array de amigos do usuário
    private $amigos = [];
    
    //Convites para eventos que ainda não foram confirmados.
    private $convitesPendentes = [];

    //Convites para eventos que foram confirmados.
    private $convitesConfirmados = [];

    //Convites para eventos criados pelo usuário.
    private $convitesCriados = [];
    
    //Dados do usuário
    private $usuario;

    //Conexão com o banco de dados
    private $conexao;

    //Retorna o array de amigos do usuário
    public function getAmigos(){
      return $this->amigos;
    }

    //Retorna os dados do usuário
    public function getUsuario(){
      return $this->usuario;
    }

    /*
      Carrega os dados do usuário logo após o login no aplicativo e os insere ou atualiza no banco de dados. Também guarda a identificação dos amigos no usuário.
      
      Parâmetros:
        $stringDados - dados que vieram do login e devem ser segregados do array.
        $qtdAmigos - número de amigos, do usuário logado, que usam o aplicativo.

    */
    public function carregarDadosDoLogin($stringDados, $qtdAmigos){
       $controla = 0;

       // Array que armazena os dados do usuário de forma organizada.
       $dados = [];
       $auxiliar = "";

       // Guarda os dados do usuário em diferentes posições do vetor 
      for($i = 0; $i < strlen($stringDados); $i++){
              
        if($stringDados[$i] == ','){
          $dados[$controla] = $auxiliar;
          $auxiliar = "";
          $controla++;
          $i++;
        }

        $auxiliar = $auxiliar.$stringDados[$i];
      }

      // Armazena o ultimo amigo no vetor.
      $dados[$controla] = $auxiliar;

      // Passa os amigos encontrados no login para o array de amigos do usuário.
      for($i = 5; $i < 5 + $qtdAmigos; $i++)
        array_push($this->amigos, $dados[$i]);

      // Carrega os dados do usuário.
      $this->usuario = new Usuario($dados[1], $dados[4], $dados[2], $dados[3],"nenhum",$dados[0]);

      //Conecta ao servidor
      $this->conexao = new Conexao("localhost", "root", "1234");

      //Conecta com o banco de dados
      $this->conexao->conectar("macgyverbd");
      
      //Cria o objeto de acesso a tabela de usuários.
      $usuarioDAO = new UsuarioDAO();

      //Verifica se o usuário já está cadastrado no banco de dados
      $result = $usuarioDAO->buscarUsuario($this->usuario->getID());

      //Se estiver cadastrado, é feito um update.
      if(mysql_num_rows($result) > 0)
        $usuarioDAO->editarUsuario($this->usuario->getID(), $this->usuario->getNome(), $this->usuario->getCidade(), $this->usuario->getUrlFoto(), $this->usuario->getIdade(), $this->usuario->getEsporteFavorito());
      
      //Se não tiver, é cadastrado.
      else
        $usuarioDAO->cadastrarUsuario($this->usuario->getID(), $this->usuario->getNome(), $this->usuario->getCidade(), $this->usuario->getUrlFoto(), $this->usuario->getIdade(), $this->usuario->getEsporteFavorito());
      
      //Carrega os convites do usuário.
      $this->carregarConvites();

    }

    /*
      Pega os dados dos amigos (nome, cidade, idade e esporte favorito) através do número de identificação dos mesmos.      
      
      Parâmetro:
        $idAmigos - array com o número de identificação de todos os amigos do usuário, que usam o aplicativo.

      Retorno:
        A lista de amigos com os dados correspondentes a eles.

    */
    public function carregaDadosDeAmigos($idAmigos){
      
      //Conecta com o banco de dados
      $this->conexao->conectar("macgyverbd");

      //Cria o objeto de acesso a tabela de usuários.
      $usuarioDAO = new UsuarioDAO();
      
      //Array que guardará os dados de todos os amigos.
      $amigos = [];

      //Controla a posição em que os dados de cada usuário ficará no array.
      $controlador = 0;

      for($i = 0; $i < sizeof($idAmigos); $i++){

        //Executa a busca pelo usuário de tal ID.
        $result = $usuarioDAO->buscarUsuario($idAmigos[$i]);

        //Pega os dados deste usuário no banco de dados.
        $linha = mysql_fetch_array($result);

        //Pega o nome do usuário
        $amigos[$controlador] = $linha['nome'];
        //Pega a foto do usuário
        $amigos[$controlador + 1] = $linha['urlFoto'];
        //Pega a cidade do usuário
        $amigos[$controlador + 2] = $linha['cidade'];
        //Pega a idade do usuário
        $amigos[$controlador + 3] = $linha['idade'];
        //Pega o esporte favorito do usuário
        $amigos[$controlador + 4] = $linha['esporteFavorito'];

        $controlador+=5;

      }

      return $amigos;

    }

    /*
      Cria um evento caso o usuário não esteja confirmado em um outro evento que coincida com este.      
      
      Parâmetros:
        $nome - nome do evento.
        $data - data de acontecimento do evento.
        $horaInicio - hora em que o evento se iniciará.
        $horaTermino - hora em que o evento encerrará.
        $minimoParticipantes - número mínimo de participantes para que o evento aconteça.
        $observacoos - informações adicionais sobre o evento.
        $amigosSelecionados - array com o número de identificação dos amigos convidados.

      Retorno:
        Se algum evento coincidiu com o que o usuario tentou criar.

    */
    public function criarEvento($nome, $local, $data, $horaInicio, $horaTermino, $minimoParticipantes, $autoCancelamento, $observacoes, $amigosSelecionados){
      //Conecta com o banco de dados
      $this->conexao->conectar("macgyverbd");

      //Verifica se existe algum evento que coincide com o que está sendo criado.
      $disponivel = $this->verificaDisponibilidade($data, $horaInicio, $horaTermino);

      if($disponivel){

        //Cria o objeto de acesso a tabela de eventos.
        $eventoDAO = new EventoDAO();

        //Insere o evento no banco de dados.
        $eventoDAO->inserirEvento($nome, $local, $data, $horaInicio, $horaTermino, $minimoParticipantes, $autoCancelamento, $this->usuario->getNome(), $observacoes);
        
        //Retorna o id do evento criado.
        $idEvento = mysql_insert_id();
        
        //Cria o objeto de acesso a tabela de convites.
        $conviteDAO = new ConviteDAO();

        //Guarda no banco de dados o convite de todos os amigos selecionados.
        for($i = 0; $i < sizeof($amigosSelecionados); $i++){
         $conviteDAO->inserirConvite ($idEvento, $amigosSelecionados[$i]);
        }

        //Guarda um convite para o criador do evento
        $conviteDAO->inserirConvite($idEvento, $this->usuario->getID());

        //Retorna o id do convite criado.
        $idConvite = mysql_insert_id();

        //Confirma a presença do criador do evento.
        $conviteDAO->editarConvite($idConvite, 1);

         //Cria um objeto do tipo Convite, guardando os dados de um convite lido do banco
        $novoConvite = new Convite();
        $novoConvite->setID($idConvite);
        $novoConvite->setConfirmacao(1);
        $novoConvite->setIDconvidado($this->usuario->getID());
        $novoConvite->setIDevento($idEvento);

        //Coloca o convite criado na lista de convites confirmados.
        array_push($this->convitesConfirmados, $novoConvite);

        //INSERIR O CÓDIGO DE AGENDAR NO GOOGLE CALENDAR DO PRÓPRIO USUÁRIO

        return true;

      }

      return false;
    }

    /*
      Verifica se o usuário está disponível para participar de um evento.      
      
      Parâmetros:
        $data - data de acontecimento do evento.
        $horaInicio - hora em que o evento se iniciará.
        $horaTermino - hora em que o evento encerrará.
      
      Retorno:
        Se algum evento coincidiu com o que o usuario tentou criar.

    */
    private function verificaDisponibilidade($data, $horaInicio, $horaTermino){

        //Conecta com o banco de dados
        $this->conexao->conectar("macgyverbd");

        //Cria o objeto de acesso a tabela de eventos.
        $eventoDAO = new EventoDAO();

        //Percorre o array de convites confirmados.
        for($i = 0; $i < sizeof($this->convitesConfirmados); $i++){

          //Acessa a linha onde o evento correspondente ao convite está armazenado.
          $result = $eventoDAO->buscarEvento($this->convitesConfirmados[$i]->getIDEvento());
          $linha = mysql_fetch_array($result);

          //Verifica se os eventos acontecerão na mesma data
          if($linha['data'] == $data){

            //Verifica a probabilidade de concidirem os horários
            if( ($horaInicio >= $linha['horaInicio'] && $horaInicio <= $linha['horaTermino'])
            ||  ($horaTermino >= $linha['horaInicio'] && $horaTermino <= $linha['horaTermino'])
            ||  ($horaInicio < $linha['horaInicio'] && $horaTermino > $linha['horaTermino']) ){
                
                return false;
            }
          }
        }
        
        //Deve retornar novo evento.
        return true;

    }

    /*
        Carrega os convites dos eventos que o usuário foi convidado.
    */
    private function carregarConvites(){

        //Conecta com o banco de dados
        $this->conexao->conectar("macgyverbd");

        //Cria o objeto de acesso a tabela de convites.
        $conviteDAO = new ConviteDAO();

        //Cria o objeto de acesso a tabela de eventos.
        $eventoDAO = new EventoDAO();

        //Pega as linhas com convites pertencentes ao usuário.
        $result = $conviteDAO->buscarConvites($this->usuario->getID());

        //Cria um objeto do tipo Convite, guardando os dados de um convite lido do banco
        $novoConvite = new Convite();

        //LÊ todos os convites retornado pelo $result
        while($linha = mysql_fetch_array($result)){

          $novoConvite->setID($linha['id']);
          $novoConvite->setConfirmacao($linha['confirmacao']);
          $novoConvite->setIDconvidado($linha['idConvidado']);
          $novoConvite->setIDevento($linha['idEvento']);
          
          //Insere no array de convites confirmados, caso o usuário tenha confirmado presença.
          if($novoConvite->getConfirmado() == 1)
            array_push($this->convitesConfirmados, $novoConvite);

          //Insere no array de convites pendentes, caso o usuário não tenha confirmado presença ainda.
          else
            array_push($this->convitesPendentes, $novoConvite);

          //Busca o evento ao qual se refere o convite
          $result2 = $eventoDAO->buscarEvento($novoConvite->getIDEvento());
          $linha = mysql_fetch_array($result2);

          //Insere o convite na lista de convitesCriados caso o criador do evento seja o usuário.
          if($linha['nomeCriador'] == $this->usuario->getNome())
            array_push($this->convitesCriados, $novoConvite);

        }
    }

    /*
        Altera a presença do usuário em um evento.

        Parâmetro:
            $idEvento - identificação do evento.
            $confirmarPresenca - define qual tipo de alteração será feita. Confirmação ou cancelamento de presença

    */
    public function mudarPresenca($idEvento, $confirmarPresenca){
        
        //Conecta com o banco de dados
        $this->conexao->conectar("macgyverbd");

        //Cria o objeto de acesso a tabela de convites.
        $conviteDAO = new ConviteDAO();

        //Escolhe a lista onde será procurado o evento, com base no tipo de mudança de presença.
        if($confirmarPresenca){
          $confirmacao = 1;
          $listaDeConvites = $this->convitesPendentes;
        }

        else{
          $listaDeConvites = $this->convitesConfirmados;
          $confirmacao = 0;
        }
           
        //Percorre a lista de convites a procura do evento que será confirmado ou cancelado.
        for($i = 0; $i < sizeof($listaDeConvites); $i++){

            //Muda a confirmação do convite no banco de dados
            if($idEvento == $listaDeConvites[$i]->getIDEvento()){

              $conviteDAO->editarConvite($listaDeConvites[$i]->getID(), $confirmacao);

              //Deleta o convite do bd, caso seja cancelado.
              if($confirmacao == 0)
                $conviteDAO->deletarConvite($listaDeConvites[$i]->getID());

              break;
            }

        }

        //Limpa os arrays de convites para que possam ser carregados após a alteração.
        $this->convitesPendentes = [];
        $this->convitesCriados = [];
        $this->convitesConfirmados = [];

        //Carrega os convites do usuário.
        $this->carregarConvites();

    }

  }

  

?>
