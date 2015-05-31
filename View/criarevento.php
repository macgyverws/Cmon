<!DOCTYPE html>
<html>
  <head>
    <title>C'mon</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
    <body>

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

        <!-- Informações do usuário -->
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

        <form method="POST" action="acao.php?size=<?php echo($_GET['size']);?>&action=0">

                  <!-- Formulário para criar evento -->
                  <div role="complementary3" class="col-md-12 column">
                        
                      <div id="borda2">
                        <div id= "dados"></div>

                		    <br/>          
                        
                        <table width="1000" border="0" align="center">
                           <tr>
                             <td><h4 align="center">Dados do Evento</h4></td>
                             <td><h4 align="center">Envio de Convites</h4></td>
                           </tr>
                        </table>
                        
                        <div id="rect" class>
                          <div style="width:100px; height:80px; float:right; margin-right:30px; margin-top:20px;" id="img_evento"></div>

                            <table width="400" border="0" >
                              <tr>
                                <td>
                                Nome do Evento:
                                <p>
                                <input type="text" id="nome_evento" required="" name="nome_evento" class="input_txt"></input></td>
                              </tr>
                              <tr>
                                <td>
                                Local:<br/>
                                <input type="text" id="local" required="" name="local" class="input_txt"></input>
                                <br/>
                                </td>
                              </tr>
                              <tr>
                                <td> </td>
                              </tr>
                              <tr>
                               <table width="400">
                               <br/>
                              <tr>
                                <td>Data:
                                <input type="date" required="" id="data" name="data"></input>
                                </td>
                                <td>Início:
                                <input type="time" required="" name="hora_inicio" id="i_hora"></td>
                                <td>Término:
                                <input type="time" name = "hora_fim" id="f_hora">
                                </td>

                              </tr>
                              </table >
                              <br/>
                              <td>Número minímo de participantes: <input type="number" name="minimo_P" id="minimo_P" class="number"></input></td>
                              <br />

                              </tr>
                              <tr> 
                                <td>
                              </tr>
                              <table width="400" >
                              <tr>
                                <td>
                                <input type="checkbox" name="auto_cancel" id="auto_cancel"></input> Cancelamento automático</td></td>
                                <br/>
                              <tr>
                                Observações: <textarea class="form-control" name="observações" cols="20" maxlength=200 rows="3"></textarea>
                              </tr>
                              <center>
                                <td><input type="submit" id="criar_evento" name="criar_evento" value="Criar Evento" class="btn btn-sm btn-primary"></input></td>
                              </center>
                              </tr><br/>
                            </table>
                            <br />
           
                          </table>
                        </div>

                        <div id="rect2" class >
                          <div id="teste">
                              <input type="button" name="selecionar" id="selecionar_todos" value="Selecionar" class="btn btn-sm btn-primary" ></input></td>
                              <input type="button" name="desmarcar" id="desmarcar_todos" value="Desmarcar" class="btn btn-sm btn-info" ></input></td>
                          </div>

                          <form class="navbar-form" role="search">
                        		    <div class="input-group add-on">
                        		      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                        		      <div class="input-group-btn">
                        		        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        		      </div>
                        		    </div>
                        	</form>
                        	
                         

                          
                          <div id="lista" border="0" class >
                          
                            <?php 

                              // Pega a identificação de todos os amigos.
                              $idAmigos = $controller->getAmigos();

                              //Pega todos os dados dos amigos.
                              $amigos = $controller->carregaDadosDeAmigos($idAmigos);

                              //Controla a distribuição de dados.
                              $controlador = 0;

                              for($i = 0; $i < sizeof($idAmigos); $i++){

                                //Posição de cada tipo de dado dos usuários.
                                $indexFoto = $controlador + 1;
                                $indexCidade = $controlador + 2;
                                $indexIdade = $controlador + 3;
                                $indexEsporte = $controlador + 4;

                                echo ("

                                  <div class='list-group'>
                                        
                                        <input type='checkbox' id='escolha' name = $idAmigos[$i]></input>
                                        <center>
                                
                                           <img class='featurette-image img-rounded pull-left' id='img3' src= $amigos[$indexFoto]?height=400>
                                           <h4 class='list-group-item-heading'>$amigos[$controlador] </h4>
                                           <p class='list-group-item-text'>Cidade: $amigos[$indexCidade]</p>
                                           <p class='list-group-item-text'>Idade: $amigos[$indexIdade] anos</p>
                                           <p class='list-group-item-text'>Esporte favorito: $amigos[$indexEsporte]</p>
                                        </center>
                                       
                                       </div>");

                                $controlador += 5;

                              }


                            ?>

                          </div>
                          <button type="button" id="selecionar" name="selecionar"class="btn btn-link">Selecionados</button>
                        </div>
           
                  </div>
                     
                  </div>
          </tr>
          </table>  
                          
                        </div><!--rect2-->
                      
                      </div>
                    </div>
        
        </form>

        <!-- Rodapé -->
        <div class="navbar navbar-fixed-bottom navbar-inverse">
          <div class="navbar-inner" align="center">
            <font color="#CCCCCC"> Copyright © 2015 C'MON. Developed by MacGyver Web Solutions Ltda. </font>
            <img src="img/logoMacgyver.png" width = "40" height = "40">
          </div>
        </div>
      </div>

    </body>
</html>
