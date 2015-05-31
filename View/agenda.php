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

          ########## Google Settings.. Client ID, Client Secret from https://cloud.google.com/console #############
          $google_client_id     = '1024869722973-7vf41jtl0nopiat2uktfjvt8tmr3f8cl.apps.googleusercontent.com';
          $google_client_secret   = '_9W2EGbTPSgev-jK4N1EKLQh';
          $google_redirect_url  = 'http://localhost/Cmon-master/View/agenda.php'; //path to your script
          $google_developer_key   = 'AIzaSyAj6hOfVHeZCcH7Q6hC-1b-2TdsNGcUPiw';

          ###################################################################

          //include google api files
          require_once 'src/Google_Client.php';
          require_once 'src/contrib/Google_Oauth2Service.php';

          //start session
          session_start();

          $gClient = new Google_Client();
          $gClient->setApplicationName('Login to Sanwebe.com');
          $gClient->setClientId($google_client_id);
          $gClient->setClientSecret($google_client_secret);
          $gClient->setRedirectUri($google_redirect_url);
          $gClient->setDeveloperKey($google_developer_key);

          $google_oauthV2 = new Google_Oauth2Service($gClient);

          //If user wish to log out, we just unset Session variable
          if (isset($_REQUEST['reset'])) 
          {
            unset($_SESSION['token']);
            $gClient->revokeToken();
            header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
          }

          //If code is empty, redirect user to google authentication page for code.
          //Code is required to aquire Access Token from google
          //Once we have access token, assign token to session variable
          //and we can redirect user back to page and login.
          if (isset($_GET['code'])) 
          { 
            $gClient->authenticate($_GET['code']);
            $_SESSION['token'] = $gClient->getAccessToken();
            header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
            return;
          }


          if (isset($_SESSION['token'])) 
          { 
            $gClient->setAccessToken($_SESSION['token']);
          }


          if ($gClient->getAccessToken()) 
          {
              //For logged in user, get details from google using access token
              $user         = $google_oauthV2->userinfo->get();
              $user_id        = $user['id'];
              $user_name      = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
              $email        = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
              $profile_url      = filter_var($user['link'], FILTER_VALIDATE_URL);
              $profile_image_url  = filter_var($user['picture'], FILTER_VALIDATE_URL);
              $personMarkup     = "$email<div><img src='$profile_image_url?sz=50'></div>";
              $_SESSION['token']  = $gClient->getAccessToken();
          }
          else 
          {
            //For Guest user, get google login url
            $authUrl = $gClient->createAuthUrl();
          }
      ?>



      
      <?php

        // Carrega os dados do login
        include('../Controller/controller.php');  

        $controller = new Controller();
        $controller->carregarDadosDoLogin($_COOKIE['nome'], $_GET['size']);

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

               <?php

                //Pega os dados do usuário que está armazenado no controller.
                $dadosUsuario = [];
                $dadosUsuario[0] = $controller->getUsuario()->getUrlFoto();
                $dadosUsuario[1] = $controller->getUsuario()->getNome();
                $dadosUsuario[2] = $controller->getUsuario()->getCidade();
                $dadosUsuario[3] = $controller->getUsuario()->getIdade();
                $dadosUsuario[4] = $controller->getUsuario()->getEsporteFavorito();

                //Mostra os dados
                echo ("

                        <a href='$dadosUsuario[0]?height=500'><img class='featurette-image img-rounded pull-left' src='$dadosUsuario[0]?height=500'></a>
                        <h3 class='featurette-heading' >$dadosUsuario[1]</h3>
                        <p>Cidade: $dadosUsuario[2]</p>
                        <p>Idade: $dadosUsuario[3]</p>
                        <p>Esporte favorito: $dadosUsuario[4]</p>

              ");

              ?>
              
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
            <button type="button" class="btn btn-primary btn-lg" aria-label="right Align" onclick="location.href = 'criarevento.php?size=<?php echo($_GET['size']);?>';">
              <span class="glyphicon glyphicon-plus" aria-hidden="true">  Criar evento</span>
            </button>
          </div>
 
          <div role="complementary2" class="col-md-6 column">
            <button type="button" class="btn btn-primary btn-lg" aria-label="right Align" onclick="location.href = 'agenda.php?size=<?php echo($_GET['size']);?>';">
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
