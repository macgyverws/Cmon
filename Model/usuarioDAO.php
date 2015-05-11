<?php 
		include_once 'conexao.php';
	?>
	
	
	<?php 
	
			
	function cadastrarUsuario ($email,$nome,$localizacao,$urlfoto,$idade,$esportefavorito){
	//cadastrar usuario no banco
	$cadastro = mysql_query ("INSERT INTO usuario ( `email`, `nome`, `localizacao`, `urlfoto`, `idade`, `esportefavorito`) VALUES ('$email', '$nome', '$localizacao', $urlfoto, $idade, $esportefavorito)");
	}
	function buscarUsuario ($id){
	//buscar usuario
	$buscar = mysql_query ("SELECT * FROM usuario WHERE id=$id");
	return $buscar;
	}
	function editarEvento ($id,$esportefavorito){
	//editar usuario
	$editar_evento = mysql_query ("UPDATE usuario SET esportefavorito=$esportefavorito WHERE id=$id");
	}
	function deletarUsuario($id){
	//deletar usuario
	$deletar = mysql_query ("DELETE FROM usuario WHERE id=$id");
	}
	?>