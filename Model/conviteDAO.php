<?php 
	//Inclusão da Classe de Conexão com o Banco de Dados.
	include_once 'conexao.php';
?>
	
<?php 
	public class ConviteDAO{ //Classe de Acesso a Dados referentes ao Convite.

		//Cadastrar convite no Banco de Dados.
		public function inserirConvite ($idEvento, $emailConvidado){
			$cadastro = mysql_query ("INSERT INTO convite (`idEvento`, `confirmacao`, `idConvidado`) VALUES ('$idEvento', '0', '$idConvidado')"); //Insere na tabela convite, o id do evento, o estado de confirmação e o id da pessoa convidada.
			if(!$cadastro){ //Caso o cadastro do convite não seja efetuado por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso o cadastro do convite seja efetuado com sucesso, a função retorna "true".
		}

		//Buscar convites de um usuário no Banco de Dados.
		public function buscarConvites ($idUsuario){
			$buscar = mysql_query ("SELECT * FROM convite WHERE $idConvidado = $idUsuario"); //Busca todos os convites de um usuário.
			return $buscar; //Retorna os convites de um usuário.
		}
		
		//Editar convite no Banco de Dados.
		public function editarConvite ($idConvite, $confirmacao){
			$editar_convite = mysql_query ("UPDATE convite SET confirmacao = $confirmacao,  WHERE id = $idConvite"); //Modifica o estado do convite.
			if(!$editar_convite){ //Caso a modificação não seja realizada por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso a alteração no convite seja efetuada com sucesso, a função retorna "true".
		}

		//Deletar convite do Banco de Dados.
		public function deletarConvite ($idConvite){
			$deletar = mysql_query ("DELETE FROM convite WHERE id = $idConvite"); //Deleta um convite da tabela.
			if(!$deletar){//Caso o convite não seja apagado por algum motivo, a função retorna "false".
				return false;
			}
			return true; //Caso a exclusão do convite seja efetuada com sucesso, a função retorna "true".
		}
	}
?>