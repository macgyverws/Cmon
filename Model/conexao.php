<?php 
$servidor = 'localhost';
$banco    = 'cmon';
$usuario  = 'root';
$senha    = 'bia12345';
$link     = mysql_connect($servidor, $usuario, $senha);
$db       = mysql_select_db($banco,$link);

?>