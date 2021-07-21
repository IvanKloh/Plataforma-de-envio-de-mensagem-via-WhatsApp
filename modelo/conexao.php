<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php
/* arquivo de conexao com o banco de dados*/
//CONECTAR COM O SERVIDOR

//include('../controle/controleSession.php');

///conexao com o banco e autenticação end


/// conexao mysql start
	$okdb = mysqli_connect('localhost','root','', 'ccih');///host/usuario/senha/nome do banco
/// conexao mysql end
/// conexao Oracle start

	$conn = oci_connect('root', 'teste123','1.1.1.1/informacao');///usuario,senha,servidor/nome do banco 
	
/// conexao Oracle end

















//$okdb = mysqli_connect('localhost', 'root', '', 'estoque');

//SELECIONA BASE DE DADOS (RETORNA 0 ou 1)
//if (!$okdb) {
//die('Problemas ao selecionar a base de dados!!!');
//}else{

	//echo 'ok';
//}/
//CONECTAR COM O SERVIDOR
?>