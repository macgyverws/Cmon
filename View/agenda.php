<!DOCTYPE html>
<html>
  <head>
    <title>C'mon - Agenda</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language="javascript" src="js/facebook.js"></script>
  </head>

  <body>

      <?php
          
          // Pega a quantidade de amigos do usuário, enviado via query string.
           $qtdAmigos = $_GET['size'];

          // Pega os dados do usuário enviado pelo Cookie no momento do login via facebook.
           $stringDados = $_COOKIE['nome']; 

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
        
      ?>

      <div class="container">
        <header class="row">
          <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
              <a href="https://www.facebook.com/" target="parent" style="margin-left: 5px"> <img alt = "Página no Facebook" width = "45" height = "45" src="img/btnFacebook.png"> </a>
              <a href="https://www.twitter.com/" target="parent" style="margin-left: 5px;"> <img alt = "Página no Twitter" width = "45" height = "45" src="img/btnTwitter.jpg"> </a>
            </div>
          </div>
        </header>

        <div class="row">
          <div role="main1" class="col-md-6 column">
            <div class="featurette">

            <a href="<?php echo "$dados[4]?height=500"; ?>"><img class="featurette-image img-rounded pull-left" src="<?php echo "$dados[4]?height=250"; ?>"></a>
              <h3 class="featurette-heading" ><?php echo "$dados[1]"; ?></h3>
              <p><?php echo "Cidade: $dados[2]"; ?></p>
              <p><?php echo "Idade: $dados[3] anos"; ?></p>
              <p>Esporte favorito: </p>
            </div>
          </div>
 
          <div role="complementary1" class="col-md-6 column">
            <div class="featurette">
              <img class="featurette-image pull-right" src="img/logoCmon.png">
            </div>
          </div>
        </div>
        
        <div class="row">
          <hr class="featurette-divider">
          <div role="main2" class="col-md-6 column">
            <button type="button" class="btn btn-primary btn-lg" aria-label="right Align">
              <span class="glyphicon glyphicon-plus" aria-hidden="true">  Criar evento</span>
            </button>
          </div>
 
          <div role="complementary2" class="col-md-6 column">
            <button type="button" class="btn btn-primary btn-lg" aria-label="right Align">
              <span class="glyphicon glyphicon-calendar" aria-hidden="true">  Agenda</span>
            </button>
          </div>
        </div>

        <div class="row">
          <div role="main3" class="col-md-8 column">
            <div class="tabbable">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#one" data-toggle="tab">Eventos criados</a></li>
                <li><a href="#two" data-toggle="tab">Eventos pendentes</a></li>
                <li><a href="#twee" data-toggle="tab">Eventos Confirmados</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="one">
                  <div id="borda">
                  </div>
                </div>
                <div class="tab-pane" id="two">
                  <div>
                  </div>
                </div>
                <div class="tab-pane" id="twee">
                  <div>
                  </div>
                </div>
                </div>
            </div>
          </div>
 
          <div role="complementary3" class="col-md-4 column">
            <div id="borda2">
            </div>
          </div>
        </div>

        
        <div class="navbar navbar-fixed-bottom navbar-inverse">
          <div class="navbar-inner" align="center">
            <font color="#CCCCCC"> Copyright © 2015 C'MON. Developed by MacGyver Web Solutions Ltda. </font>
            <img src="img/logoMacgyver.png" width = "40" height = "40">
          </div>
        </div>
      </div>


  </body>

</html>
