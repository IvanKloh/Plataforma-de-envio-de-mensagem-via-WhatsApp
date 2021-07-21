<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php 
include('../modelo/conexao.php');

header('Content-Type: application/json');
header('Character-Encoding: utf-8');

$acaoLista=0;

 
$atendimento=$_GET["atendimento"];
//echo "$atendimento";


                $sql="SELECT     
                                A.nr_atendimento,
                                A.nm_paciente,
                                obter_primeiro_nome(A.nm_paciente)nm_abreviado,
                                p.nr_ddd_celular || A.nr_telefone_celular nr_telefone_celular,
                                A.dt_alta
                              FROM
                                atendimento_paciente_v  A,
                                pessoa_fisica           p
                              WHERE
                                p.cd_pessoa_fisica = A.cd_pessoa_fisica
                              AND A.nr_atendimento ='".$atendimento."'";///consulta que retorna informacoes do paciente atraves do numero de atedimento


                  //echo $sql;
    $parse = oci_parse($conn,$sql);///comando para mostrar todos os elementos da tabela */
     
                        
             //"SELECT * FROM mov_estoque ORDER BY `mov_estoque`.`id_mov` DESC"
      
 //echo "Numero de cadastros: ".mysqli_num_rows($result); ///mostra a quantidade de linhas

         $conar = 0;
         $array_mov=array();
         $result = oci_execute($parse,OCI_DEFAULT);


            while(($row = oci_fetch_assoc($parse))) {
             $conar ++;
           // $array_mov[$conar]['ID'] = $row['ID'];
            $array_mov[$conar]['NR_ATENDIMENTO'] = $row['NR_ATENDIMENTO']; 
            $nome=$array_mov[$conar]['NM_PACIENTE'] = $row['NM_PACIENTE'];
            $primeiroNome=$array_mov[$conar]['NM_ABREVIADO'] = $row['NM_ABREVIADO'];
            $cel=  $array_mov[$conar]['NR_TELEFONE_CELULAR'] = $row['NR_TELEFONE_CELULAR'];
            $array_mov[$conar]['DT_ALTA'] = $row['DT_ALTA']; 
          
///armazenar dados na variavel para preencher os input start
       }
       $resultJson = json_encode($array_mov);
       print_r($resultJson);

                        
?>