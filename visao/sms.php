<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>

<?php 
//echo ini_set('display_errors',1);
//echo ini_set("log_errors",1);
//echo error_reporting(E_ALL);

//echo"1";



include('cabecalho.php');
include('../controle/listarMov.php');
 


?> 


     <button type = "button" id="botaoModal" class = "btn btn-primary" data-toggle = "modal" data-target = "#myModal" > +SMS </button><! -- botao para abrir o modal para enviar a mensagem-->
 <button type='button' id="botaoModalWhats" class = "btn btn-secondary" onclick='abreModal()'> SEM WHATSAPP </button><! -- botao para abrir o modal para enviar a mensagem-->
<div class="modalWhats"></div>

     
 <div class="container">
      <div id="myModal" class="modal fade" tabindex="-2">
        <div class="modal-dialog"  role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <fieldset id="fieldset" class="modal-title">
    					<legend >Enviar SMS</legend>          
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-2">
                             <div class = "form-group">
			                    <label for = "atendimento" id="labelAten" class = "col-form-label"> Atendimento </label><br>
			                    <input type="text" class = "form-control" id = "atendimento">
			            
			                    <div style="position: relative;bottom: 90px;left: 112px;">
			                    <button id="btn" type="button"  class="btn-floating z-depth-4 blue darken-3 waves-effect waves-light" onclick="buscarInformacao(getElementById('atendimento').value)">
                                           <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                 </button></div>  
                  			</div>
                        </div>
                        <div class="col-sm-2" id="labelNome">
                            <div class="form-group">
                            	<div class="asterisco">*</div> 
                                <label class = "form-control"> Nome</label><br>
                                <input type="text" id="nome" class="form-control"  value=" " >
                            </div>
                        </div>
                 
                         <div class="col-sm-2" id="labelFone">
                            <div class="form-group">
                               <div class="asterisco">*</div> 
                               <label class = "form-control"> Fone</label><br>
                               <input type="text" id="fone" class="form-control" value="">
                           	</div>
                            
                        </div>
                     </div>
                    
                    <div class="col-sm-2" id="mensagem">
                            <div class="form-group"   >
                            	<div class="asterisco">*</div> 
                                <label>Mensagem</label>
                                <div class="dados">
                                <textarea id="primeiroNome" class="form-control">  
                                	Faça a busca por atendimento
                                </textarea>
                            	</div>
                            </div>
                        
                        </div>
                   </fieldset> 

               </div>
                
                <div class="modal-footer">
                          	
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button><! -- botao de fechar-->
                   	<button type="button" class="btn btn-terciary" onclick="limpar()">Limpar</button><! -- botao de limpar-->
                    <button type="button"  class="btn btn-primary" onclick="envia(getElementById('atendimento').value,getElementById('nome').value,getElementById('fone').value,getElementById('primeiroNome').value)">Enviar</button><! --botao de enviar  o dados para o link do whatsapp-->
                </div>
              </div>
    	   </div>
		</div>	
    <div class="table  active bordered" id="tabela">
    <div class="vazio"> </div>
        <table id="tablist" class="display"style="z-index: 50;border-radius: 35px; overflow: hidden;" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Atend</th>
                    <th>Paciente</th> 
                    <th>Fone</th>
                    <th>Usuário</th>
                    <th>Status</th>
                    <th>Data Envio</th>
                    <th>Resposta</th>
                    <th>Whatsapp</th>
                    <th>Formulário</th>
				</tr>
            </thead>
	        <tbody>
     	<?php
     		foreach (@$array_mov as $value) {
				$data = date('d-m-Y H:i:s',strtotime($value['data_envio'])); $value['data_envio'];
					//echo "$dataBras";
		?>
				<tr>		
					<! -- linhas da tabela com link para o arquivo respFormulario com os dados -->		
			 	<?php  echo "<td class='cor'><a href='../visao/respFormulario.php?id_envio=".$value['id_envio']."'>" . $value['id_envio'] ."</a></td>"; ?>
			  	<?php  echo "<td><a href='../visao/respFormulario.php?id_envio=".$value['id_envio']."'>" . $value['atendimento'] ."</a></td>"; ?>
				<?php  echo "<td><a href='../visao/respFormulario.php?id_envio=".$value['id_envio']."'>" . $value['nome_paciente'] ."</a></td>"; ?>
			  	<?php  echo "<td><a href='../visao/respFormulario.php?id_envio=".$value['id_envio']."'>" . $value['telefone'] ."</a></td>"; ?>
			  	<?php  echo "<td><a href='../visao/respFormulario.php?id_envio=".$value['id_envio']."'>" . $value['nome_usuario'] ."</a></td>"; ?>
			 	<?php  echo "<td><a href='../visao/respFormulario.php?id_envio=".$value['id_envio']."'>" . $value['confirmacao_envio'] ."</a></td>"; ?>
			    <?php  echo "<td><a href='../visao/respFormulario.php?id_envio=".$value['id_envio']."'>" . $data ."</a></td>"; ?>
			  
			  	<td class="float"><?php             

					        $sql1="SELECT atendimento FROM formulario WHERE atendimento =".$value['atendimento']."";///consulta para ver se o formulario ja foi respondido
					        
					   		$result1 = mysqli_query($okdb,$sql1);
					    	$tCabecalho = mysqli_num_rows($result1);///mostra a quantidade de linhas
					      		if ($tCabecalho == 0){
					   				echo "<img src='http://".$server."/css/imagem/negativo.png' style='width: 40px;left: 40px;position: relative;'>";
					     		}else{
					      			echo "<img src='http://".$server."/css/imagem/positivo.png' style='width: 40px;left: 40px;position: relative;'>";
					    		}
						?>    
                                <span class="dica"><?php 
                                             if($tCabecalho == 0){ echo " Questionário não respondido!";
                                             }else{
                                             echo "Questionário respondido! ";//$value['saldo']
                                             } ?> 
                                </span>

				   </td>

					 <td class="float"><?php             

						     			 $sqlWhats="SELECT atendimento FROM falha WHERE atendimento =".$value['atendimento']."";///	consulta para ver se o paciente tem whatsapp ou nao
						        
						   				 $resultWhats = mysqli_query($okdb,$sqlWhats);
									 		$whats = mysqli_num_rows($resultWhats);///retorna a quantidade de linhas
									      	if ($whats == 0){///caso de nao retornar mostrar a imagem
									   		?><img src="<?php echo "http://".$server."/css/imagem/"?>verde.png"style="width: 40px;left: 40px;position: relative;"><?php
									     	}else{///caso contrario mostra essa imagem
									      	?><img src="<?php echo "http://".$server."/css/imagem/"?>vermelho.png"style="width: 40px;left: 40px;position: relative;"><?php
									     }
						  				?>
										<span class="dica"><?php 
											 if($whats == 0){ echo " Paciente com Whatsapp!";
											 }else{
											 echo "Paciente sem Whatsapp! ";//$value['saldo']
											 } ?> 
										</span>
				</td>
       <?php echo "<td><a href='http://formularioccih.com?id_envio=".$value['id_envio']."'> <img src='http://localhost/css/imagem/lapis.png' style='width: 40px;left: 40px;position: relative;'></a></td>"; ?>
                    
				</tr>
				<?php
				 	} 
				?>

        	</tbody>
	     </table>
       </div>
    </div>
	<div id="txtHint">
				
	</div>
