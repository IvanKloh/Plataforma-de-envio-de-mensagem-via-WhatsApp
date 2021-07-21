<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php

include('../modelo/conexao.php');

$server = $_SERVER['HTTP_HOST'];
 date_default_timezone_set('America/Sao_Paulo');
///recebimento dos dados start
$atendimento=$_GET['atendimento']; //echo $atendimento."<br>";
$nome=$_GET['nome'];//echo $nome."<br>";
$fone=$_GET['fone'];//echo $fone."<br>";
//$usuario =$_SESSION['user'];//echo $usuario."<br>";

////recebimmento dos dados end

 $valida ="SELECT atendimento FROM falha WHERE atendimento= '".$atendimento."'";

         $resultValida = mysqli_query($okdb,$valida);
         $tCabecalho = mysqli_num_rows($resultValida);


if ($tCabecalho == 0) {
  
    ///executera a QUERY start
               $execQuery = " INSERT INTO falha
                              		(
                                  atendimento,
                              		nome_paciente,
                                 	telefone                                                 	
                              		 ) 
                                   VALUES(
                              			  '".$atendimento."',
                                      '".$nome."',
                              		    '".$fone."'
                              		     
                              		                  		                          		     
                      		      ); ";
                                
                           //  echo $execQuery;
                   $result = mysqli_query($okdb,$execQuery)or die(false);


 ////tratamneto dos dados end
    }
?>
