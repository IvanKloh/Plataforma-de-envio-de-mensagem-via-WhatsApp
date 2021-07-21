<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
 <?php


$server = $_SERVER['HTTP_HOST'];
//echo "$server";

  include('../modelo/conexao.php');
?>

     
 
 <link href="<?php echo "http://localhost/css/stilo.css"?>" rel="stylesheet">

 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
   
<script language="JavaScript" src="<?php echo "http://localhost/js/"?>funcoes.js"></script> <! -- percorre o arquivo das funçoes-->

     <body class="#fafafa grey lighten-5" onunload="con();">
            <div id="app">
               <div class="navbar-fixed">
                  <nav>
                    <div class="nav-wrapper teal darken-3 z-depth-4" style="padding: 0 10px;">
                     <div title="Meu Baner" >
                       <div class="title waves-effect waves-teal white z-depth-4" style="height: 85px;"><img src="<?php echo "http://localhost/css/imagem/logo_login.png"?>" alt="Home"></div>
                       </div> 
                                
                         </div>
                        </nav>
                    </div>
                </div>
    <div class="container" style="margin-top: 2rem">
        <fieldset>
            <div class="center">
                
            </div>
            <form id="formdados" name="formdados" method="post" action="http://localhost/visao/confirmResp.php" >
             <label for = "nome" class = "col-form-label" style="position: relative;top: 2px;"> Número de Atendimento </label><br>
                <input type="text" class = "form-control" value=" <?php
                $value = 0;
                  $nome =@$_GET['id_envio'];
                  if($nome !== 0){
                  $sqlNome="SELECT  nome_paciente,atendimento FROM envio WHERE id_envio = '".$nome."' ";//consulta para mostrar  o nome do paciente e o numero de atendimneto
              
                                       
                  $result = mysqli_query($okdb,$sqlNome);
                  while($rows = $result->fetch_assoc()){

                   echo  $rows['atendimento'];
                  
                       
                  }
                  }else{

                  }

                  ?>" for="atendimento" name="atendimento" id = "atendimento" placeholder="Digite seu Número de Atendimento" style=" width: 100%;color: black;position: relative; bottom: 1px;">
            
                


                

                <fieldset>
                    <legend  class="center"style=" color: black;"><b>Houve alguma intercorrência ?</b></legend>
                    <div class="row radio col s12" >
                        <div class="row col s12">
                            <div class="col s12  left">
                                <input type="checkbox" value="Sim"id="ie_reinternacao" name="ie_reinternacao"/>
                                <label for="ie_reinternacao">Reinternação</label>
                            </div>
                            <div class="col s12   left">
                                <input type="checkbox" value="Sim" id="ie_sangramento" name="ie_sangramento"/>
                                <label for="ie_sangramento">Sangramento</label>
                            </div>

                            <div class="col s12   left">
                                <input type="checkbox" value="Sim"id="ie_secrecao_ferida" name="ie_secrecao_ferida"/>
                                <label for="ie_secrecao_ferida">Secreção na ferida operatória</label>
                            </div>
                            <div class="col s12   left">
                                <input type="checkbox" value="Sim"id="ie_abriu_pontos" name="ie_abriu_pontos"/>
                                <label for="ie_abriu_pontos">"Abriu" espontaneamente os pontos</label>
                            </div>

                            <div class="col s12   left">
                                <input type="checkbox" value="Sim"id="ie_reinternacao_cirurgica" name="ie_reinternacao_cirurgica"/>
                                <label for="ie_reinternacao_cirurgica">Reintervenção cirúrgica</label>
                            </div>
                            <div class="col s12   left">
                                <input type="checkbox"value="Sim"
                                       onclick="habilitaCheck('ie_intercorrencia_nenhuma','ie_reinternacao','ie_sangramento','ie_secrecao_ferida','ie_abriu_pontos','ie_reinternacao_cirurgica')"
                                       id="ie_intercorrencia_nenhuma" name="ie_intercorrencia_nenhuma"/>
                                <label for="ie_intercorrencia_nenhuma">Nenhuma</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="center" style=" color: black;"><b>Sinais e sintomas?</b></legend>
                    <div class=" row col s12">

                        <div class="col s6  left">
                            <input type="checkbox" value="Sim"class="left" id="ie_sinais_hiperemia" name="ie_sinais_hiperemia"/>
                            <label for="ie_sinais_hiperemia">Vermelhidão</label>
                        </div>
                        <div class="col s6  left">
                            <input type="checkbox" value="Sim"class="left" id="ie_sinais_febre" name="ie_sinais_febre"/>
                            <label for="ie_sinais_febre">Febre</label>
                        </div>
                    </div>

                    <div class="row col s12">
                        <div class="col s6  left">
                            <input type="checkbox" value="Sim"id="ie_sinais_calor" name="ie_sinais_calor"/>
                            <label for="ie_sinais_calor">Calor</label>
                        </div>
                        <div class="col s6  left">
                            <input type="checkbox" value="Sim"id="ie_sinais_dor" name="ie_sinais_dor"/>
                            <label for="ie_sinais_dor">Dor</label>
                        </div>
                    </div>

                    <div class="row col s12">
                        <div class="col s6  left">
                            <input type="checkbox"value="Sim"
                                   onclick="habilitaCheck2('ie_sinais_nenhuma','ie_sinais_hiperemia','ie_sinais_febre','ie_sinais_calor','ie_sinais_dor','')"
                                   id="ie_sinais_nenhuma" name="ie_sinais_nenhuma"/>
                            <label for="ie_sinais_nenhuma">Nenhuma</label>
                        </div>
                    </div>
                </fieldset>
  
                <fieldset class="center">
                    <legend style=" color: black; cursor: pointer;"><b>Boa recuperação?</b></legend>
                    <div class="row radio col s12" style=" ">

                        <div class="  col   s6">
                            <input name="ie_boa_recuperacao" type="radio" value="Sim" id="ie_boa_recuperacao_sim"/>
                            <label for="ie_boa_recuperacao_sim">Sim</label>
                        </div>
                        <div class="  col   s6">
                            <input name="ie_boa_recuperacao" type="radio" value="Não" id="ie_boa_recuperacao_nao"/>
                            <label for="ie_boa_recuperacao_nao">Não</label>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="center">
                    <legend style=" color: black;"><b>Boa Cicatrização?</b></legend>
                    <div class="row radio col s12" style=" ">
                        <div class="  col   s6">
                            <input name="ie_boa_cicatrizacao" type="radio" value="Sim" id="ie_boa_cicatrizacao_sim"/>
                            <label for="ie_boa_cicatrizacao_sim">Sim</label>
                        </div>
                        <div class="  col   s6">
                            <input name="ie_boa_cicatrizacao" type="radio" value="Não" id="ie_boa_cicatrizacao_nao"/>
                            <label for="ie_boa_cicatrizacao_nao">Não</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset >
                    <legend class="center" style=" color: black;"><b>Retirou pontos da incisão?</b></legend>
                    <div class="row radio col s12" style=" ">
                        <div class=" center col   s6">
                            <input name="ie_pontos_incisao" type="radio" value="Sim" id="ie_pontos_incisao_sim"/>
                            <label for="ie_pontos_incisao_sim">Sim</label>
                        </div>
                        <div class=" center col   s6">
                            <input name="ie_pontos_incisao" type="radio" value="Não" id="ie_pontos_incisao_nao"/>
                            <label for="ie_pontos_incisao_nao">Não</label>
                        </div>

                        <div class="  col s12" style="margin-top: 5px">

                            <label for="dt_previsao_retirada"><b>Previsão de retirada</b></label>
                            <input  name="dt_previsao_retirada"  id="dt_previsao_retirada" type="date"   >
                        </div>
                    </div>
                </fieldset>

                <div class="input-field  col s12 ">

                    
                    <button id="2" class="btn waves-effect waves-light right" type="submit"  name="action"  >Enviar</button>
                </div>
            </form>
        </fieldset>
    </div>

