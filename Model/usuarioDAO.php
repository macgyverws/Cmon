<?php 
	//Inclusão da Classe de Conexão com o Banco de Dados.
	include_once 'conexao.php';
?>
	
<?php 	
	public class UsuarioDAO{ //Classe de Acesso a Dados referentes ao Usuário.
		
		//Cadastrar usuário no Banco de Dados.
		public function cadastrarUsuario ($id, $nome, $cidade, $urlfoto, $idade, $esportefavorito){
			$cadastro = mysql_query ("INSERT INTO usuario (`id`, `nome`, `cidade`, `urlfoto`, `idade`, `esportefavorito`) VALUES ('$id', '$nome', '$cidade', '$urlfoto', '$idade', '$esportefavorito')"); //Insere na tabela as informações que compõem o perfil do usuário.
			if(!$cadastro){ //Caso o cadastro do usuário não seja efetuado por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso o cadastro do usuário seja efetuado com sucesso, a função retorna "true".
		}

		//Buscar usuário no Banco de Dados.
		public function buscarUsuario ($id){
			$buscar = mysql_query ("SELECT * FROM usuario WHERE id=$id"); //Busca os usuários na tabela.
			return $buscar; //Retorna os usuários da tabela.
		}

		//Editar as informações do usuário no Banco de Dados.
		public function editarUsuario ($id, $nome, $cidade, $urlfoto, $idade, $esportefavorito){
			$editar_usuario = mysql_query ("UPDATE usuario SET nome=$nome, cidade=$cidade, urlfoto=$urlfoto, idade=$idade, esportefavorito=$esportefavorito WHERE id=$id"); //Atualiza na tabela as informações que compõem o perfil do usuário.
			if(!$editar_usuario){ //Caso a modificação não seja realizada por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso a alteração nas informações do usuário seja efetuada com sucesso, a função retorna "true".
		}

		//Deletar usuário do Banco de Dados.
		public function deletarUsuario ($id){
			$deletar = mysql_query ("DELETE FROM usuario WHERE id=$id"); //Deleta um usuário da tabela.
			if(!$deletar){ //Caso o usuário não seja apagado por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso a exclusão do usuário seja efetuada com sucesso, a função retorna "true".
		}
	}
?>