<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php

include('../modelo/conexao.php');///arquivo de conexao com o banco
//include('../visao/sms.php');
$acaoLista = 'lista';

$sql = 'SELECT * FROM envio';
//echo $sql;

    $conar = 0;
    $result = mysqli_query($okdb,$sql);
    

     $array_mov=array();
        while($rows = $result->fetch_assoc()){
           $conar ++;

       
           $array_mov[$conar]['id_envio']     = $rows['id_envio']; ///recebe os valores e passa os valores para array_mov
           $array_mov[$conar]['nome_paciente'] = $rows['nome_paciente'] ; ///recebe os valores e passa os valores para array_mov
           $array_mov[$conar]['atendimento'] = $rows['atendimento'] ; ///recebe os valores e passa os valores para array_mov
           $array_mov[$conar]['telefone']    = $rows['telefone']; ///recebe os valores e passa os valores para array_mov
           $array_mov[$conar]['nome_usuario']    = $rows['nome_usuario']; ///recebe os valores e passa os valores para array_mov
           $array_mov[$conar]['confirmacao_envio']         = $rows['confirmacao_envio']; ///recebe os valores e passa os valores para array_mov
           $array_mov[$conar]['data_envio']         = $rows['data_envio']; ///recebe os valores e passa os valores para array_mov
           
         
        //echo $array_mov[$conar]['atendimento'] = $rows['atendimento']."<br>" ;
    }
   
   
?>