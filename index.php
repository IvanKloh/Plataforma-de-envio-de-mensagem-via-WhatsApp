<?php
/*
Descricao: buscando dados no banco
Autor: Ivan Kloh
Data: 29/05/2020 até 30/06/2020
*/
?>
 
<?php

session_start();
@include('visao/loginCcih');

///valida se o usuario entrou no sistema start
	if(@$_SESSION['login_ok']==false){///caso nao tenha retorno vai para a visao de login

		include('visao/loginCcih.php');

	}
	elseif(@$_SESSION['login_ok']==true){///caso positivo continua
///valida se o usuario entrou no sistema end
?>
<html>
	<head>
    	<meta charset="UTF-8">
  	  <title>Menu </title>

	</head>
	<body>
		<div class="menu">
  			<?php 
  			
				include('visao/menuSuperior.php'); ///faz o include do menuSuperior
     	 	?>
		</div>
		
		
	</body>
</html>
<?php
}
//echo "Boa ";
//@$_SESSION['login_ok']=false;
?>


