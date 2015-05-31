  		
		//Usa o estado do login para realizar as devidas ações.
  		function statusChangeCallback(response) {
   			 console.log('statusChangeCallback');
    		 console.log(response);
		   	
		   	// Se o usuário estiver conectado, é chamada a função de carregar os dados do usuário.
		    if (response.status === 'connected') {
		    	carregarDadosUsuario();	
		    } 
		    else if (response.status === 'not_authorized') {
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into this app.';

		    } 
		    else {
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into Facebook.';
		    }
  		}

  		//Função chamada pelo botão de login e responsável por checar o status do login.
  		function checkLoginState() {

   			//Usa a função getLoginStatus passando o response para statusChangeCallback, para então ser verificado o status do login.
   			FB.getLoginStatus(function(response) {
      		 	statusChangeCallback(response);
    		});

 	    }

 	    //Inicia os dados do aplicativo
 	    window.fbAsyncInit = function() {
 	    
  			FB.init({

  				//Id do aplicativo no facebook
	   			appId      : '1440324569613365',

	   			//Ativa o cookie para ter acesso ao servidor.
	    		cookie     : true,  

	    		//Ativa o usuo do social plugin
	   	   		xfbml      : true,  

	   	   		//Versão do aplicativo no facebook.
	    	    version    : 'v2.3' 
  			}); 			

		};

		// Inicia o SDK assíncrono
  		(function(d, s, id) {
   			 var js, fjs = d.getElementsByTagName(s)[0];
    		 if (d.getElementById(id)) return;
    		 js = d.createElement(s); js.id = id;
    		 js.src = "//connect.facebook.net/pt_BR/sdk.js";
    		 fjs.parentNode.insertBefore(js, fjs);
  		}(document, 'script', 'facebook-jssdk'));

		(function(d, s, id) {
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) return;
			 js = d.createElement(s); js.id = id;
     		 js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=1440324569613365";
 			 fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		//Carrega todos os dados do usuário logado, inclusive a identificação dos seus amigos que usam o aplicativo.
		function carregarDadosUsuario(){

			//Guarda a data atual do sistema.
			var data = new Date();

			//Guarda o número de identificação do usuário logado.
			var id;

			//Guarda o nome do usuário logado.
			var nome;

			//Guarda a cidade onde o usuário logado mora.
			var cidade;

			//Guarda a idade do usuário logado.
			var idade;

			//Guarda o url da foto de perfil do usuário logado.
			var urlFoto;

			//Guarda o número de idenficação dos amigos, que usam o aplicativo, do usuário logado.
			var listaIDAmigos = [];

			//Acessa os dados do usuário do facebook que logou no aplicativo.
			FB.api('/me', function(response){

				//Atribui os dados retornados pela api do Facebook às variáveis.
				id = response.id;
				nome = response.name;
				cidade = response.location.name;
				idade = parseInt(data.getFullYear()) - parseInt(response.birthday.substring(6,10));
				urlFoto = "http://graph.facebook.com/"+id+"/picture";
				
				//Calcula a idade do usuário através da data atual do sistema e a data de nascimento fornecida pelo Facebook.
				if(parseInt(data.getMonth()) <= parseInt(response.birthday.substring(0,2))){
					idade--;

					if(parseInt(data.getMonth()) == parseInt(response.birthday.substring(0,2)) && parseInt(data.getDate()) > parseInt(response.birthday.substring(3,5)))
						idade++;
			   	
			   	} 

			   	//Acessa os amigos do usuário logado que usam o aplicativo.
			    FB.api("/me/friends", function(response){

			    	//Guarda o id de cada amigo.
		   			for(i = 0; i < response.data.length; i++)
		   				listaIDAmigos[i] = response.data[i].id;

		   			//Coloca todos os dados que foram carregados com o login em um array.
		   			dados = [id, nome, cidade, idade, urlFoto, listaIDAmigos];

		   			//Coloca estes dados no cookie do navegador, para ser acessado em outras páginas.
		   			document.cookie = " nome = "+dados+" ";
		   			
		   			//Redireciona para a página da agenda do usuário.
					location.href = "agenda.php?size="+listaIDAmigos.length+"";

		   	 	});
		    });
		}

		//Publica no facebook, marcando todos os convidados nesta publicação, a informação de convite para um evento.
		function convidarParaEvento(idsConvidados, nomeEvento, local, horaInicio, data, totalAmigos){
			FB.getLoginStatus(function(response) {
      		 	FB.api("/me/feed",
		   			
		   			"POST",
		   			{
		   				name: "Convite para evento",
		   				description: "E aí, gosta de esportes? Venho aqui convidá-lo para o meu evento, "+nomeEvento+", que acontecerá em "+local+" às "+horaInicio+" Hrs do dia "+data+". Conto com sua presença!",
		   				caption: "Ir ao C'mon",
        				link: 'http://localhost/Cmon/View/login.php',
        				picture: 'http://imageshack.com/a/img537/3034/1pP7VS.png',
        				place: 'http://localhost/Cmon/View/login.php',
        				tags: idsConvidados
    				}, 

    				function(response){
    					location.href = "agenda.php?size="+totalAmigos+"";
					}
				);
    		});

			
		}

		//Publica no facebook, marcando todos os convidados nesta publicação, a informação de que um evento mudou.
		function avisarMudancaNoEvento(idsConvidados, nomeEvento, totalAmigos){

			FB.getLoginStatus(function(response) {
      		 	FB.api("/me/feed",
		   			
		   			"POST",
		   			{
		   				name: "Aviso de mudança no evento",
		   				description: "Lembra do evento "+nomeEvento+"? Venho aqui avisá-lo que houve uma mudança nele e você continua confirmado!",
		   				caption: "Ir ao C'mon",
        				link: 'http://localhost/Cmon/View/login.php',
        				picture: 'http://imageshack.com/a/img537/3034/1pP7VS.png',
        				place: 'http://localhost/Cmon/View/login.php',
        				tags: idsConvidados    				
        			}, 

    				function(response){
    					location.href = "agenda.php?size="+totalAmigos+"";
					}
				);
    		});	
		}

		//Publica no facebook, marcando todos os convidados nesta publicação, a informação de que um evento foi cancelado.
		function avisarCancelamentoDoEvento(idsConvidados, nomeEvento, totalAmigos){

			FB.getLoginStatus(function(response) {
      		 	FB.api("/me/feed",
		   			
		   			"POST",
		   			{
		   				name: "Aviso de cancelamento do evento",
		   				description: "Lembra do evento "+nomeEvento+"? Venho aqui avisá-lo que infelizmente foi cancelado. Agradeço a sua compreensão...",
		   				caption: "Ir ao C'mon",
        				link: 'http://localhost/Cmon/View/login.php',
        				picture: 'http://imageshack.com/a/img537/3034/1pP7VS.png',
        				place: 'http://localhost/Cmon/View/login.php',
        				tags: idsConvidados
    				}, 

    				function(response){
			   			location.href = "agenda.php?size="+totalAmigos+"";
					}
				);
    		});

			
		}

		//Publica no facebook, marcando todos os convidados nesta publicação, o lembrete de que o evento acontecerá no dia seguinte.
		function lembreteDoEvento(idsConvidados, nomeEvento, totalAmigos){

			FB.getLoginStatus(function(response) {
      		 	FB.api("/me/feed",
		   			
		   			"POST",
		   			{
		   				name: "Lembrete do evento",
		   				description: "Lembra do evento "+nomeEvento+"? Venho aqui avisá-lo que acontecerá amanhã, se prepare!",
		   				caption: "Ir ao C'mon",
        				link: 'http://localhost/Cmon/View/login.php',
        				picture: 'http://imageshack.com/a/img537/3034/1pP7VS.png',
        				place: 'http://localhost/Cmon/View/login.php',
        				tags: idsConvidados
    				}, 

    				function(response){
			   			location.href = "agenda.php?size="+totalAmigos+"";
					}
				);
    		});

			
		}
