<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>


<?php
$server = $_SERVER['HTTP_HOST'];
  include('cabecalho.php');
  include('../modelo/conexao.php');
?>

       
        <div class="container" style="margin-top: 2rem ; font:1.9rem bold">
        <a href="<?php echo "http://".$server."/visao/"?>sms.php" class="btn z-depth-4 waves-effect waves-light blue darken-3 rigth " style="margin-bottom: 1rem">Voltar</a><! -- botao de voltar-->
          <div class="row">
              <h4>Busca Ativa Pós Alta</h4>
          </div>
          <fieldset>
              <legend class="center">
                  <?php
                  $nome =@$_GET['id_envio'];
                
 
                   $sqlNome="SELECT  nome_paciente,atendimento FROM envio WHERE id_envio = '".$nome."' ";//consulta para mostrar  o nome do paciente e o numero de atendimneto
                                       
                  $result = mysqli_query($okdb,$sqlNome);
                  while($rows = $result->fetch_assoc()){

                   echo  $rows['nome_paciente']." - Atendimento:".$rows['atendimento']." ";
                        $atendimento =$rows['atendimento'];
                  }

                  $sqlValida="SELECT  atendimento FROM formulario WHERE atendimento='".$atendimento."'";///consulta para ver se o formulario ja foi respondido ou nao
                  $resultValida = mysqli_query($okdb,$sqlValida);
                       $linhas = mysqli_num_rows($resultValida);///retorna a quantidade de linhas
                          if ($linhas == 0){//caso nao retornar mostra a div
                          ?>
                          <div class="retorno">
                              Questionário Não Respondido!
                      
                          </div>
                          <?php   
                                }else{ ///caso contrario segue o codigo
                                         
                              $sqlAtend="SELECT id_formulario, atendimento, reinternacao, sangramento, secrecao, abriu_pontos, reinternacao_cirurgica, intercorrencia_nenhum, vermelhidao, calor, febre, dor, sinais_nenhum, recuperacao_boa, cicatrizacao_boa, retirou_pontos, data_retirada, data_resposta FROM formulario WHERE 
                              atendimento='".$atendimento."'";///consulta para mostrar os dados da tabela

       
                
                                     $result1 = mysqli_query($okdb,$sqlAtend);
                                     while($rows1 = $result1->fetch_assoc()){

                                      $reinternacao= $rows1['reinternacao'];
                                      $sangramento= $rows1['sangramento'];
                                      $secrecao= $rows1['secrecao'];
                                      $abriu_pontos= $rows1['abriu_pontos'];
                                      $reinternacao_cirurgica= $rows1['reinternacao_cirurgica'];
                                      $intercorrencia_nenhum= $rows1['intercorrencia_nenhum'];
                                      $vermelhidao= $rows1['vermelhidao'];
                                      $calor= $rows1['calor'];
                                      $febre= $rows1['febre'];
                                      $dor= $rows1['dor'];
                                      $sinais_nenhum= $rows1['sinais_nenhum'];
                                      $recuperacao_boa= $rows1['recuperacao_boa'];
                                      $cicatrizacao_boa= $rows1['cicatrizacao_boa'];
                                      $retirou_pontos= $rows1['retirou_pontos'];
                                      $data_retirada= $rows1['data_retirada'];
                                      $data_resposta= $rows1['data_resposta'];
                                     
                    }
              ?> 
            </legend>
              <ul>
                <fieldset>
                    <legend>Intercorrencias :</legend>

                        <li> Reinternação : <?php  echo $reinternacao;?> </li><br>
                        <li> Sangramento : <?php  echo $sangramento;?></li><br>
                        <li> Secreção na Ferida : <?php  echo $secrecao;?></li><br>
                        <li> Abriu Pontos : <?php  echo $abriu_pontos;?></li><br>
                        <li> Reintervenção Cirúrgica : <?php  echo $reinternacao_cirurgica;?></li><br>               
        
               </fieldset>
                <br>

                <fieldset>
                    <legend>Sinais e sintomas :</legend>
                    <li>Vermelhidão : <?php  echo $vermelhidao;?></li><br>
                    <li>Febre : <?php  echo $febre;?></li><br>
                    <li>Calor : <?php  echo $calor;?></li><br>
                    <li>Dor : <?php  echo $dor;?></li><br>   
                </fieldset>

                <fieldset>
                    <legend>Recuperação</legend>
                    <li>Boa recuperação : <?php  echo $recuperacao_boa;?></li><br>
                    <li>Boa Cicatrização : <?php  echo $cicatrizacao_boa;?></li><br>
                    <li>Retirou pontos da incisão : <?php  echo $retirou_pontos;?> </li><br>
                    <li>Previsão de Retirada : <?php  if($data_retirada=='Já retirou os pontos!'){
                      echo "Já retirou os pontos!";
                    }else{
                      echo  $data = date('d-m-Y',strtotime($data_retirada));
                    } ?></li><br>
                   
                </fieldset>
                    <li>Data da resposta : <?php echo  $data = date('d-m-Y H:i:s',strtotime($data_resposta)); ?></li><br>
            </ul>
  
               </fieldset>
            </div>
           <?php
            }
            ?>