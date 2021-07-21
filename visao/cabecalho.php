<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php
@include('../controle/controleSession.php');///inclusao do arquivo de controleSession

$server = $_SERVER['HTTP_HOST'];


?>
<html>
    <head>
    	<meta charset="UTF-8">
		<title>Busca Ativa Pós Alta</title>
	</head>
	 	
			<link href="<?php echo "http://".$server."/css/stilo.css"?>" rel="stylesheet"><! -- acessa o arquivo de css para a parte estetica da pagina-->
			<link rel="stylesheet" href="<?php echo "http://".$server."/css/font-awesome-4.7.0/css/font-awesome.min.css"?>"> <! -- acessa o arquivo de css para a parte dos icónes da pagina-->

			<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> <! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> <! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://unpkg.com/axios/dist/axios.min.js"></script><! -- link para ter acesso a biblioteca dataTables-->
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    <! -- link para ter acesso a biblioteca dataTables--> 
        	<!-- Última versão JavaScript compilada e minificada -->
        	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script><! -- link para ter acesso a biblioteca dataTables-->
			<script language="JavaScript" src="<?php echo "http://".$server."/js/"?>funcoes.js"></script> <! -- percorre o arquivo das funçoes-->
	
				<body class="#fafafa grey lighten-5" >
			
			        <nav>
			            <div  id= "topo"class="nav-wrapper teal darken-3 z-depth-4" style="">

			              <div title="Meu Baner" onclick="inicio('<?php echo $server?>');" style="width: 100px;">
		
                        
                            <div class="title waves-effect waves-teal white z-depth-4" style="height: 110px;"><img src="<?php echo "http://".$server."/css/imagem/logo_login.png"?>" alt="Home"></div>
                      		 </div> 

            
                   <div id="user">
			                    
							  <?php

								echo $_SESSION['user'];
							  
							  ?>
				  </div>		
                              
			  	<div id ="sair" onclick="sair('<?php echo $server?>');">Sair</div>
		
                     
        
		</div>
	</body>
</html>