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
@$atendimento=$_POST["atendimento"];


@$reinternacao=$_POST["reinternacao"];
@$sangramento=$_POST["sangramento"];
@$secrecao=$_POST["secrecao"];
@$abriu_pontos=$_POST["abriu_pontos"];
@$reinternacao_cirurgica=$_POST["reinternacao_cirurgica"];
@$intercorrencia_nenhuma=$_POST["intercorrencia_nenhuma"];


@$vermelhidao=$_POST["vermelhidao"];
@$febre=$_POST["febre"];
@$calor=$_POST["calor"];
@$dor=$_POST["dor"];
@$nenhumSinal=$_POST["sinais_nenhuma"];

@$ie_boa_recuperacao=$_POST["ie_boa_recuperacao"];
@$ie_boa_cicatrizacao=$_POST["ie_boa_cicatrizacao"];
@$ie_pontos_incisao=$_POST["ie_pontos_incisao"];
@$dt_previsao_retirada=$_POST["dt_previsao_retirada"];
///recebimento dos dados end
///tratamento dos dados para verificar se o valor é nulo ou nao start

/*if(@$_POST["ie_reinternacao"] == true){
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
	$intercorrencia_nenhuma="Nenhuma";
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
	$nenhumSinal="Nenhum";
}
if(@$_POST["dt_previsao_retirada"] == true){
	$dt_previsao_retirada=$_POST["dt_previsao_retirada"];
}else{
	$dt_previsao_retirada="Já retirou os pontos!";
}
*/
///tratamento dos dados para verificar se o valor é nulo ou nao end

       
      /// Tratamento - Start  
      if ($atendimento == false or $ie_boa_recuperacao==false or $ie_boa_cicatrizacao ==false or $ie_pontos_incisao==false){//se algum dos variaveis estiver vazia retorna ao formulario
           //echo "error";
           echo "<script>alert('Falha ao enviar, Revise suas Respostas!');window.location.href='http://formularioccih.com';</script>";
             //header("Location:");

       }
          

         $valida ="SELECT atendimento FROM formulario WHERE atendimento= '".$atendimento."'";///consulta para ver se o numero de atendimento ja esta cadastrado 

         $resultValida = mysqli_query($okdb,$valida);
         $tCabecalho = mysqli_num_rows($resultValida); ///retorna a quantidade de linhas

          if ($tCabecalho == 0){//caso  n retornar nenhuma faz o insert

    
   
    ///executera a QUERY start
               $execQuery = "
                              INSERT INTO formulario
                              		(
                              		atendimento,
                                   	reinternacao,
                                   	sangramento,
                                   	secrecao,
                                   	abriu_pontos,
                                   	reinternacao_cirurgica,
                                   	intercorrencia_nenhum,
                                   	vermelhidao,
                                   	calor,
                                   	febre,
                                   	dor,
                                   	sinais_nenhum,
                                   	recuperacao_boa,
                                   	cicatrizacao_boa,
                                   	retirou_pontos,
                                   	data_retirada,
                                   	data_resposta
                                                   	
                              		 ) VALUES(
                                        '".$atendimento."',
                              		      '".$reinternacao."',
                                        '".$sangramento."',
                              		      '".$secrecao."',
                              		      '".$abriu_pontos."',
                              		      '".$reinternacao_cirurgica."',
                              		      '".$intercorrencia_nenhuma."',
                              		      '".$vermelhidao."',
                              		      '".$febre."',
                              		      '".$calor."',
                              		      '".$dor."',
                              		      '".$nenhumSinal."',
                              		      '".$ie_boa_recuperacao."',
                              		      '".$ie_boa_cicatrizacao."',
                              		      '".$ie_pontos_incisao."',
                              		      '".$dt_previsao_retirada."',
                              		      '".date("Y-m-d H:i:s") ."'                           		                          		     
                      		      ); ";
                                
                   $result = mysqli_query($okdb,$execQuery)or die(false);

 //echo $execQuery;

           echo "<script>alert('Respostas enviadas com sucesso!');
            window.location.href='https://google.com.br'</script>";
         
         //header("Location:http://site.hananery.com.br");
          
         
           }else{
           echo "<script>alert('Número de atendimento Inválido, Revise-o!');window.location.href='http://formularioccih.com';</script>";
             //header("Location:");
         }
           


?>

