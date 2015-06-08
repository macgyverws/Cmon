<?php
$private conexao;
while(TRUE){
 //Conecta com o banco de dados
        $this->conexao->conectar("macgyverbd");
        //Cria o objeto de acesso a tabela de eventos.
        $eventoDAO = new EventoDAO();
        $dataHora = date("d/m/Y h:i:s");
        echo $dataHora;
        //Percorre o array de eventos.
        //criar array de eventos
        for($i = 0; $i < sizeof($this->eventos); $i++){
          //Acessa a linha onde o evento está armazenado.
         // Acessar todos os eventos e pegar todos as datas e horarios iniciais
         //
         
          //Verifica se os eventos acontecerão na mesma data
          if($linha['data'] == $dataHora){//poderiamos mandar apenas uma vez no dia, ou apenas no dia anterior ao evento, n sendo necessário executar toda hora
           if( ($dataHora <= $linha['data']){
                
                //enviar lembretes 
                //mudar o campo dos eventos para dizer que já foi lembrado
            }
          }
        }
        
       
sleep(3600);  //a rotina será executada a cada hora
}
?>
