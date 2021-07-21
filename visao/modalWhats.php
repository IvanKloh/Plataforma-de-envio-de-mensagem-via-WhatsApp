<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>

<?php 
@include('../controle/controleSession.php');///inclusao do arquivo de controleSession

@include('../controle/listarMov.php');
?>   
<body class="#fafafa grey lighten-5" onunload="con();">
		
			
 <div id="modalWhats" class="modal fade" tabindex="-2">
        <div class="modal-dialog"  role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <fieldset  class="modal-title" style=" height: 177px;width: 664px;">
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
                    
                   
                   </fieldset> 

               </div>
                
                <div class="modal-footer">
                	
                	
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button><! -- botao de fechar-->
                   	<button type="button" class="btn btn-terciary" onclick="limpar()">Limpar</button><! -- botao de limpar-->
                   <button type="button"  id ="enviar"class="btn btn-primary" onclick="semWhats(getElementById('atendimento').value,getElementById('nome').value,getElementById('fone').value)">CADASTRAR</button><! -- botao para enviar os dados para pessoas sem whatsapp--></button><! --botao de enviar  o dados para o link do whatsapp-->
                </div>
              </div>
    	   </div>
		</div>	