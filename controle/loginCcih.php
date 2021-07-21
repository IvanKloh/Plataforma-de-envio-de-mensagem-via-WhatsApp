<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php

session_start();
set_time_limit(30);
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1); 
 ldap_set_option(@$ldap, LDAP_OPT_REFERRALS, 0);
 ldap_set_option(@$ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
// config
$ldapserver = 'ldap://1.1.1.1';///ip do servidor
$dominio = "@teste.com";//dominio
$ldapuser = $_POST['username'].$dominio;//usuario+dominio
$ldappass = $_POST['password'];//senha
$ldaptree    = "dc=teste,dc=com,dc=br";


///conexao com o banco  e autenticação start 
$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

if($ldapconn) {
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die (header('location:../visao/loginCcih.php?a2843ebd03a7d7dd62b503956566a1cc=e11185b6e35c1b767174dc988aa0f179').ldap_error($ldapconn));
    
///conexao com o banco e autenticação end
/// tratamento dos dados start   
    if ($ldapbind) {
    
       $corta     = substr( $ldapuser , 0 ,-16 );
       $character = "(samaccountname=".$corta.")";echo "$character";
       $ADGroup   = "CN=CCIHSMS,OU=Grupos Sistemas ,OU=Grupo,DC=teste,DC=com,DC=br";//caminho do grupo
       $filter    = "(& ".$character."(memberOf=".$ADGroup."))";//variavel que será utilizada para fazer o filtro


//$result = ldap_search($ldapconn,$ldaptree, "cn=CCIHSMS") or die ("Error in search query: ".ldap_error($ldapconn));//tira as informações do grupo. com estas informaçoes se tem o caminho 
      $result = ldap_search($ldapconn,$ldaptree,$filter) or die ("Error in search query: ".ldap_error($ldapconn)); ///faz a consulta para ver se o usúario é inegrante do grupo
        //echo "$result";
      $nome = ldap_search($ldapconn,$ldaptree, "samaccountname=".$corta) or die ("Error in search query: ".ldap_error($ldapconn));//faz a consulta para tirar o nome da pessoa logada
     // echo "$nome";
      $data = ldap_get_entries($ldapconn, $result);///Lê várias entradas do resultado fornecido e, em seguida, lê os atributos e vários valores.
      $resultNome = ldap_get_entries($ldapconn, $nome);///Lê várias entradas do resultado fornecido e, em seguida, lê os atributos e vários valores.
        // SHOW ALL DATA
//echo '<h1></h1><pre>';
      //var_dump($data[0])."<br>";
      
         $usuario=($resultNome[0]['displayname'][0]);
          echo($usuario)."<br>";
        echo($data['count']);


        if ($data['count']==true ) {///se $data['count'] retornar 1 será direcionado para o arquivo index caso retorne 0 irá ser direcionado para a tela de login novamente
            
              $_SESSION['login_ok']=true;//pode acessar
             $_SESSION['controleCcih'] = true;//esta logado
             $_SESSION['user'] = $usuario;///armazena o valor de $usuario em  $_SESSION['user']
           header('location:../index.php ');
           
       }else{
            $_SESSION['login_ok']=false;//nao pode acessar
           unset($_SESSION['controleCcih']);//
           header('location:../visao/loginCcih.php?a2843ebd03a7d7dd62b503956566a1cc=e11185b6e35c1b767174dc988aa0f179');
       }
       
        echo '</pre>'; 
    }

}
/// tratamento dos dados end

ldap_close($ldapconn); ///fecha a conexao 

?>