		// This is called with the results from from FB.getLoginStatus().
  		function statusChangeCallback(response) {
   			 console.log('statusChangeCallback');
    		 console.log(response);
		    // The response object is returned with a status field that lets the
		    // app know the current login status of the person.
		    // Full docs on the response object can be found in the documentation
		    // for FB.getLoginStatus().
		    if (response.status === 'connected') {
		    	carregarDadosUsuario();	
		    } 
		    else if (response.status === 'not_authorized') {
		      // The person is logged into Facebook, but not your app.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into this app.';

		    } 
		    else {
		      // The person is not logged into Facebook, so we're not sure if
		      // they are logged into this app or not.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into Facebook.';
		    }
  		}

  		// This function is called when someone finishes with the Login
 		// Button.  See the onlogin handler attached to it in the sample
  		// code below.
  		function checkLoginState() {
   			
   			FB.getLoginStatus(function(response) {
      		 	statusChangeCallback(response);
    		});

 	    }

 	    window.fbAsyncInit = function() {
 	    
  			FB.init({

	   			appId      : '1440324569613365',
	    		cookie     : true,  // enable cookies to allow the server to access 
	                        // the session
	   		    xfbml      : true,  // parse social plugins on this page
	    	    version    : 'v2.3' // use version 2.2
  			}); 			

		};

		// Load the SDK asynchronously
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

		function carregarDadosUsuario(){
			var data = new Date();
			var id;
			var nome;
			var cidade;
			var idade;
			var urlFoto;
			var listaIDAmigos = [];


			FB.api('/me', function(response){
				id = response.id;
				nome = response.name;
				cidade = response.location.name;
				idade = parseInt(data.getFullYear()) - parseInt(response.birthday.substring(6,10));
				urlFoto = "http://graph.facebook.com/"+id+"/picture";
				
				if(parseInt(data.getDate()) < parseInt(response.birthday.substring(3,5)) && parseInt(data.getMonth()) <= parseInt(response.birthday.substring(0,2)))
					idade--;
			   
			    FB.api("/me/friends", function(response){
		   			for(i = 0; i < response.data.length; i++)
		   				listaIDAmigos[i] = response.data[i].id;

		   			alert("ID: "+id+"\nNome: "+nome+"\nCidade: "+cidade+"\nIdade: "+idade+"\nUrl Foto: "+urlFoto+"\nID's dos amigos: "+listaIDAmigos);
		   	 	});
		    });
		}