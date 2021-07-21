<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php


session_start();
	$_SESSION["login_ok"]=false;///login retornar falso ira destruir os valores armazenados em controleLogin e sera redirecionado o index 
	unset($_SESSION["controleCcih"]);
	header("Location:../index.php");

?>
