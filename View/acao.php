<html>
  <head>
    <title>C'mon</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language="javascript" src="js/facebook.js"></script>
  </head>
    
    <body>

     <?php
        // Carrega os dados do login
        include('../Controller/controller.php');
        $controller = new Controller();
        $controller->carregarDadosDoLogin($_COOKIE['nome'], $_GET['size']);

        //Verifica a ação que deve ser tomada
        $acao = $_GET['action'];

     ?>

      <?php
        

        /*
            Inicia a ação de criação de um evento, pegando todos os dados do formulário inclusive a lista de amigos selecionados.
        */
        if($acao == 0){

          //Lista com o id de todos os amigos do usuário logado.
          $amigos = $controller->getAmigos();

          //Guardará os amigos que foram selecionados para o evento.
          $amigosSelecionados = [];

          //Pega o nome, local de realização, data e horário em que se inicia o evento.
          $nomeEvento = $_POST['nome_evento'];
          $local = $_POST['local'];
          $data = $_POST['data'];
          $horaInicio = $_POST['hora_inicio'];

          //Verifica se o evento terá hora para acabar e guarda, caso tenha.
          if(empty($_POST['hora_fim']))
            $horaFim = "23:59";
          else
            $horaFim = $_POST['hora_fim'];

          //Define se o evento será cancelado automaticamente caso não atinja o número minimo de participantes.
          if(isset($_POST['auto_cancel']) && !empty($_POST['minimo_P']))
            $autoCancel = 1;
          else
            $autoCancel = 0;

          //Verifica se o evento tem observações e guarda, caso tenha.
          if(empty($_POST['observações']))
            $observacoes = "vazio";
          else
            $observacoes = $_POST['observações'];

          //Verifica se o evento tem um número mínimo de participantes para que aconteça e guarda, caso tenha.
          if(empty($_POST['minimo_P'])){
            $minimo_P = 0;
          }
          else
            $minimo_P = $_POST['minimo_P'];

          //Passa os amigos selecionados são passados para o array $amigosSelecionados.
          for ($i=0; $i < sizeof($amigos); $i++) { 

            if(isset($_POST[$amigos[$i]])){
              array_push($amigosSelecionados, $amigos[$i]);
            }

          } 

          //Verifica se o horário de inicio do evento é menor igual ao horário de encerramento
          $verificaHorario = $horaInicio <= $horaFim;
          $verificaData = $data >= ("20".date("y-m-d"));

          //Se a data for correta
          if($verificaData){

            //Se o período for correto.
            if($verificaHorario){

              //Chama o método do controller que realiza a criação do evento
              $disponivel = $controller->criarEvento($nomeEvento, $local, $data, $horaInicio, $horaFim, $minimo_P, $autoCancel, $observacoes, $amigosSelecionados);

              //Publica no facebook marcando as os convidados.
              if($disponivel){
                echo "
                      <h2>Evento criado com sucesso!</h2>
                      <button type='button' onclick = 'convidarParaEvento(amigosSelecionados, nomeEvento , local, horaInicio, data, totalAmigos);'>Ir para Agenda</button>
                     ";
              }

              else{
                echo "
                      <h2>Você não está disponível esse horário. O evento não pode ser criado!</h2>
                      <button type='button' onclick = ''>Ir para Agenda</button>
                     ";
              }

            } 

            //Se não for.
            else
              echo "
                      <h2>Você entrou com um horário inválido. O evento não pode ser criado!</h2>
                      <button type='button' onclick = ''>Ir para Agenda</button>
                     ";
          }  
          else
            echo "
                    <h2>Você só pode criar eventos para ser realizado amanhã em diante. O evento não pode ser criado!</h2>
                    <button type='button' onclick = ''>Ir para Agenda</button>
                   ";
        }


        //Aqui deverá ficar a edição de evento.
        else if($acao == 1){

        }

      ?>

      <!--
        Passa os valores do evento para javascript para que seja notificado no facebook.
      -->
      <script type="text/javascript">
        var nomeEvento = "<?php echo $nomeEvento; ?>";
        var local = "<?php echo $local; ?>";
        var horaInicio = "<?php echo $horaInicio; ?>";
        var data = "<?php echo $data; ?>";  
        var amigosSelecionados = "<?php echo implode(',', $amigosSelecionados); ?>";
        var totalAmigos = "<?php echo $_GET['size']; ?>"; 

        var dia = data.substring(8,10);
        var mes = data.substring(5,7);
        var ano = data.substring(0,4);
        data = dia+'/'+mes+'/'+ano;

      </script>

    </body>
</html>
