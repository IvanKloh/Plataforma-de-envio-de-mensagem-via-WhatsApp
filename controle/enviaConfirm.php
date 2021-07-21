<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php

include('../modelo/conexao.php');
include('controleSession.php');

$server = $_SERVER['HTTP_HOST'];
 date_default_timezone_set('America/Sao_Paulo');
///recebimento dos dados start
	$atendimento=$_GET['atendimento']; //echo $atendimento."<br>";
	$nome=$_GET['nome'];//echo $nome."<br>";
	$fone=$_GET['fone'];///echo $fone."<br>";
	$usuario =$_SESSION['user'];
	//echo $usuario."<br>";

////recebimmento dos dados end

    $valida ="SELECT atendimento FROM envio WHERE atendimento= '".$atendimento."'";///consulta para ver se o numero de atendimento ja esta cadastrado 

         $resultValida = mysqli_query($okdb,$valida);
         $tCabecalho = mysqli_num_rows($resultValida); ///retorna a quantidade de linhas

          if ($tCabecalho == 0){//caso  n retornar nenhuma faz o insert

    

    ///executera a QUERY start
               $execQuery = " INSERT INTO envio
                              		(
                              		nome_paciente,
                              		atendimento,
                                   	telefone,
                                   	nome_usuario,
                                   	confirmacao_envio,
                                   	data_envio
                                   	
                                   	
                                                   	
                              		 ) VALUES(
                              			  '".$nome."',
                                          '".$atendimento."',
                              		      '".$fone."',
                              		      '".$usuario."',
                              		      	'Mensagem Enviada',
                              		      '".date("Y-m-d H:i:s")."' 
                              		                  		                          		     
                      		      ); ";
                                
                           //  echo $execQuery;
                   $result = mysqli_query($okdb,$execQuery)or die(false);


           }else{
            $update=" UPDATE envio SET nome_paciente='".$nome."',atendimento='".$atendimento."',telefone='".$fone."',nome_usuario='".$usuario."',confirmacao_envio='Mensagem Enviada',data_envio='".date("Y-m-d H:i:s")."' WHERE atendimento = '".$atendimento."' ";
          echo $update;
             $resultUpdate = mysqli_query($okdb,$update)or die(false);


           }

  ////tratamneto dos dados end
?>
