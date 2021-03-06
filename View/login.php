<!DOCTYPE html>
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
      <div class="container-fluid">
        <header class="row">
          <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
              <a href="https://www.facebook.com/" target="parent" style="margin-left: 5px"> <img alt = "Página no Facebook" width = "45" height = "45" src="img/btnFacebook.png"> </a>
              <a href="https://www.twitter.com/" target="parent" style="margin-left: 5px;"> <img alt = "Página no Twitter" width = "45" height = "45" src="img/btnTwitter.jpg"> </a>
            </div>
          </div>
        </header>

        <div class="row">
          <div id="myCarousel" class="carousel slide">
          <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
              <div class="item active">
                <img src="http://lorempixel.com/1600/500/sports/1" style="width:100%" class="img-responsive">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Titulo 1</h1>
                    <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely changed.</p>
                    </p>
                  </div>
                </div>
              </div>

              <div class="item">
              <img src="http://lorempixel.com/1600/500/sports/2" style="width:100%" class="img-responsive">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Titulo 2</h1>
                    <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely changed.</p>
                  </div>
                </div>
              </div>

              <div class="item">
              <img src="http://lorempixel.com/1600/500/sports/3" style="width:100%" class="img-responsive">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Titulo 3</h1>
                    <p>With "mobile-first" there is now only one percentage-based grid.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
        </div>

        <div class="row">

          <div role="main" class="col-md-12 column">
            <div class="featurette">
              <img class="featurette-image pull-center" src="img/logoCmon.png">
                <p id="botao"><div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"
                scope = "public_profile, email, user_friends, user_birthday, user_location, read_stream, user_posts, publish_actions" onlogin = "checkLoginState();"></div></p>
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
