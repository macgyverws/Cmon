<?php
$private conexao;
while(TRUE){
 //Conecta com o banco de dados
        $this->conexao->conectar("macgyverbd");
        //Cria o objeto de acesso a tabela de eventos.
        $eventoDAO = new EventoDAO();
        $dataHora = date("d/m/Y h:i:s");
        echo $dataHora;
        //Percorre o array de convites confirmados.
        for($i = 0; $i < sizeof($this->convitesConfirmados); $i++){
          //Acessa a linha onde o evento correspondente ao convite está armazenado.
          $result = $eventoDAO->buscarEvento($this->convitesConfirmados[$i]->getIDEvento());
          $linha = mysql_fetch_array($result);
          //Verifica se os eventos acontecerão na mesma data
          if($linha['data'] == $data){
            //Verifica a probabilidade de concidirem os horários
            if( ($horaInicio <= $linha['dataHora']){
                
                //enviar lembretes 
                //mudar o campo dos eventos para dizer que já foi lembrado
            }
          }
        }
        
       
sleep(3600);  //a rotina será executada a cada hora
}
?>
