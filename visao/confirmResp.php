<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php 
///recebimento dos dados start
 include('../modelo/conexao.php');

   date_default_timezone_set('America/Sao_Paulo');
$atendimento=$_POST["atendimento"];//echo $atendimento;



@$reinternacao=$_POST["ie_reinternacao"];
@$sangramento=$_POST["ie_sangramento"];
@$secrecao=$_POST["ie_secrecao_ferida"];
@$abriu_pontos=$_POST["ie_abriu_pontos"];
@$reinternacao_cirurgica=$_POST["ie_reinternacao_cirurgica"];
@$intercorrencia_nenhuma=$_POST["ie_intercorrencia_nenhuma"];


@$vermelhidao=$_POST["ie_sinais_hiperemia"];
@$febre=$_POST["ie_sinais_febre"];
@$calor=$_POST["ie_sinais_calor"];
@$dor=$_POST["ie_sinais_dor"];
@$nenhumSinal=$_POST["ie_sinais_nenhuma"];

@$ie_boa_recuperacao=$_POST["ie_boa_recuperacao"];
@$ie_boa_cicatrizacao=$_POST["ie_boa_cicatrizacao"];
@$ie_pontos_incisao=$_POST["ie_pontos_incisao"];
@$dt_previsao_retirada=$_POST["dt_previsao_retirada"];
///recebimento dos dados end
///tratamento dos dados para verificar se o valor é nulo ou nao start

if(@$_POST["ie_reinternacao"] == true){
	$reinternacao=$_POST["ie_reinternacao"];
}else{
	$reinternacao="Não";//echo "$reinternacao";
}
if(@$_POST["ie_sangramento"] == true){
	$sangramento=$_POST["ie_sangramento"];
}else{
	$sangramento="Não";
}
if(@$_POST["ie_secrecao_ferida"] == true){
	$secrecao=$_POST["ie_secrecao_ferida"];
}else{
	$secrecao="Não";
}
if(@$_POST["ie_abriu_pontos"] == true){
	$abriu_pontos=$_POST["ie_abriu_pontos"];
}else{
	$abriu_pontos="Não";
}
if(@$_POST["ie_reinternacao_cirurgica"] == true){
	$reinternacao_cirurgica=$_POST["ie_reinternacao_cirurgica"];
}else{
	$reinternacao_cirurgica="Não";
}
if(@$_POST["ie_intercorrencia_nenhuma"] == true){
	$intercorrencia_nenhuma=$_POST["ie_intercorrencia_nenhuma"];
}else{
	$intercorrencia_nenhuma="Não";
}
if(@$_POST["ie_sinais_hiperemia"] == true){
	$vermelhidao=$_POST["ie_sinais_hiperemia"];
}else{
	$vermelhidao="Não";
}
if(@$_POST["ie_sinais_febre"] == true){
	$febre=$_POST["ie_sinais_febre"];
}else{
	$febre="Não";
}
if(@$_POST["ie_sinais_calor"] == true){
	$calor=$_POST["ie_sinais_calor"];
}else{
	$calor="Não";
}
if(@$_POST["ie_sinais_dor"] == true){
	$dor=$_POST["ie_sinais_dor"];
}else{
	$dor="Não";
}
if(@$_POST["ie_sinais_nenhuma"] == true){
	$nenhumSinal=$_POST["ie_sinais_nenhuma"];
}else{
	$nenhumSinal="Não";
}
if(@$_POST["dt_previsao_retirada"] == true){
	$dt_previsao_retirada=$_POST["dt_previsao_retirada"];
}else{
	$dt_previsao_retirada="Já retirou os pontos!";
}
///tratamento dos dados para verificar se o valor é nulo ou nao end
?> 
 <link href="<?php echo "http://ccih1.hananery.com.br/css/stilo.css"?>" rel="stylesheet">

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
        <div class="container" style="margin-top: 2rem ; font:1.9rem bold">
        <form id="formdados" name="formdados" method="post" action="http://localhost/controle/recebeFormulario.php" >
          <div class="row">
              <h4>Revise Seus Dados</h4>
          </div>
          <fieldset>
              <legend class="center" name="atendimento">
                  <?php
                 
                
 
                   $sqlNome="SELECT  nome_paciente,atendimento FROM envio WHERE atendimento = '".$atendimento."' ";//consulta para mostrar  o nome do paciente e o numero de atendimneto
                   //echo "$sqlNome";
                                       
                  $result = mysqli_query($okdb,$sqlNome);

                $tCabecalho = mysqli_num_rows($result); ///retorna a quantidade de linhas

          if ($tCabecalho == 0){//caso  n retornar nenhuma faz o insert

    
                  echo "<h3>Número de atendimento inválido</h3>";
          }else{
            while($rows = $result->fetch_assoc()){

                   echo "Seu nome é ".$rows['nome_paciente']." e seu  Atendimento é:".$rows['atendimento']." ";
                       $atendimento =$rows['atendimento'];
                  }

           }      
                      
              ?> 
            </legend>
              <ul>
                <fieldset>
                    <legend>Intercorrencias :</legend>
                    		<input type="text" class = "input"  value=" <?php echo $atendimento;?>"id="atendimento" name="atendimento"style="display: none;">
                    	 <label class="confirm"for="reinternacao">Reinternação:</label>
                                <input type="text" class="input" value="<?php  echo $reinternacao;?>"id="reinternacao" name="reinternacao"><br>
                                
                          <label class="confirm" for="sangramento">Sangramento:
                                <input type="text" class="input" value="<?php  echo $sangramento;?>"id="sangramento" name="sangramento"><br>
                         </label>
                          <label class="confirm" for="secrecao">Secreção na Ferida:
                                <input type="text" class="input" value="<?php  echo $secrecao;?>"id="secrecao" name="secrecao"><br>
                         </label>
                          <label class="confirm" for="abriu_pontos">Abriu Pontos:
                                <input type="text" class="input" value="<?php  echo $abriu_pontos;?>"id="abriu_pontos" name="abriu_pontos"><br>
                         </label>
                          <label class="confirm" for="reinternacao_cirurgica">Reintervenção Cirúrgica :
                                <input type="text" class="input" value="<?php  echo $reinternacao_cirurgica;?>"id="reinternacao_cirurgica" name="reinternacao_cirurgica"><br>
                         </label> 
                          <label class="confirm" for="intercorrencia_nenhuma"> Intercorrencias Nenhuma:
                                <input type="text" class="input" value="<?php  echo $intercorrencia_nenhuma;?>"id="intercorrencia_nenhuma" name="intercorrencia_nenhuma"><br>
                         </label>

                        
               </fieldset>
                <br>

                <fieldset>
                    <legend>Sinais e sintomas :</legend>
                     <label  class="confirm" for="vermelhidao">Vermelhidão:
                                <input type="text" class="input" value="<?php  echo $vermelhidao;?>"id="vermelhidao" name="vermelhidao"><br>
                         </label>
                          <label class="confirm" for="febre">Febre:
                                <input type="text" class="input" value="<?php  echo $febre;?>"id="febre" name="febre"><br>
                         </label>
                          <label class="confirm" for="calor">Calor:
                                <input type="text" class="input" value="<?php  echo $calor;?>"id="calor" name="calor"><br>
                         </label>
                          <label class="confirm" for="dor">Dor:
                                <input type="text" class="input" value="<?php  echo $dor;?>"id="dor" name="dor"><br>
                         </label>
                          <label class="confirm" for="nenhumSinal">Sinais Nenhum:
                                <input type="text" class="input" value="<?php  echo $nenhumSinal;?>"id="nenhumSinal" name="nenhumSinal"><br>
                         </label>
                         
                   
                </fieldset>

                <fieldset>
                    <legend>Recuperação</legend>
                     <label class="confirm" for="ie_boa_recuperacao">Boa recuperação:
                                <input type="text" class="input" value="<?php  echo $ie_boa_recuperacao;?>"id="ie_boa_recuperacao" name="ie_boa_recuperacao"><br>
                         </label>
                          <label class="confirm" for="ie_boa_cicatrizacao">Boa Cicatrização :
                                <input type="text" class="input" value="<?php  echo $ie_boa_cicatrizacao;?>"id="ie_boa_cicatrizacao" name="ie_boa_cicatrizacao"><br>
                         </label>
                          <label class="confirm" for="ie_pontos_incisao">Retirou pontos da incisão:
                                <input type="text" class="input" value="<?php  echo $ie_pontos_incisao;?>"id="ie_pontos_incisao" name="ie_pontos_incisao"><br>
                         </label>
                         <label class="confirm"for="dt_previsao_retirada">Previsão de Retirada:
                                <input type="text" class="input" value="<?php if($dt_previsao_retirada=='Já retirou os pontos!'){
                      echo "Já retirou os pontos!";
                    }else{
                      echo  $data = date('d-m-Y',strtotime($dt_previsao_retirada));
                    }?>"id="dt_previsao_retirada" name="dt_previsao_retirada"><br>
                         </label>
                    <br>
                   
                </fieldset>
                
            </ul>
  
               </fieldset>
            
             
			 <button id="2" class="btn waves-effect waves-light right" type="submit"  name="action"  >Enviar</button>
        
       </form>
        <button class="btn z-depth-4 waves-effect waves-light blue darken-3 rigth " onclick='history.go(-1)'style="position: relative;bottom: 29px;">
			
				VOLTAR
			</button> 
    </div> 
    </div>