<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php
$server = $_SERVER['HTTP_HOST'];


///controle de session do ususario start
session_start();
	if($_SESSION['controleCcih'] == false){ ///controle login retornar falso sera redirecionado para a  pagina de login com a alert
		header('location:../visao/loginCcih.php?cb5e100e5a9a3e7f6d1fd97512215282=03c7c0ace395d80182db07ae2c30f034');
	}
///controle de session do ususario end

?>