<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?> 
<?php

@include('../controle/controleSession.php');///faz o include do arquivo controleSession

	$server = $_SERVER['HTTP_HOST'];
	include('cabecalho.php');
  ?>		    		
 

		<title> CCIH </title>
		<body class="#fafafa grey lighten-5" >
			<div id="app">
			   <div class="navbar-fixed">
			     
		            
			        <div class="container">
                        <div class="quadro">
			                <a href="<?php echo "http://".$server."/visao/"?>sms.php">
			                	<div class="col s4 m4  red z-depth-3" style="width: 100px; height: 80px;">
			                        <h5 class="white-text">SMS</h5>
			                        <i class="material-icons background-round mt-5">sms</i>
			                    </div>
		                        <div id="quadro">
		                       		 <h5>BUSCA ATIVA PÓS ALTA</h5>
		                        </div>
                           </a>             
					    </div>
			        </div>
		       </div>
	       

			   
			    
			    
			  
			  