<?php
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/
?>
<?php
$server = $_SERVER['HTTP_HOST']; ?>
<html lang= "pt-br">
  <head>
    <meta charset= "utf-8">
      <title>CCIH</title>
       <link rel="stylesheet" href="<?php echo "http://".$server."/css/stilo.css"?>"> <! -- acessa o arquivo de css para a parte estetica da pagina-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
      <style>
            body {
                background-color: #004d40;
                color: white;
            }
      </style>
          <body>
              <h2 id="local">
                <b>Envia mensagem via WhatsApp</b></h2>
                 <div id="erro">
                   <?php    
                        $div="Erro ao se logar, verifique o usuário ou senha digitado.";
                            if (@$_GET[md5("erro")] ==  md5("fail")){
                               echo" $div";///caso o usuario ou a senha esteja incorreta ira aparecer o alert
                            }elseif (@$_GET['cb5e100e5a9a3e7f6d1fd97512215282'] == md5("s")) {
                              echo "<script> alert('Você Deve Logar')</script>";///caso tente logar sem inserir os dados ou copiando a url da pagina e colando no browser ira aparecer o alert 
                            }elseif(count($_GET)>0){
                             header('location:../index.php ');
                              exit();
                              //var_dump($_GET);
                             
                            }
                    ?>
                   </div>                             
                   <div class="card-panel z-depth-5" style="padding-top: 50px; width: 51%;left: 354px;position: relative;top:10px;">
              
                   <div class="card-content  center">
                      <form method="post" action="<?php echo "http://".$server."/controle/"?>loginCcih.php"> <! -- passa os dados desta pagina para fazer a validaçao no loginCcih na pasta controle-->
                             
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" type="text" class="validate black-text valid" name="username" value="" required="" autocomplete="username" autofocus="">
                                <label for="username" class="active">Usuário do Domínio</label>
                               <!--  -->
                            </div>
                        </div>
                        <div class="input-field col s12">
                              <input id="password" type="password" class="validate black-text valid" name="password" required="" autocomplete="current-password">
                              <label for="password" class="active">Senha</label>

                        </div>
                        <div class="row">
                            <div class="col s12 ">
                                <div class="center"><img src="<?php echo "http://".$server."/css/imagem/logo_han.png"?>"></div>

                                <i class="btn z-depth-4 waves-effect waves-light  right darken-3 waves-input-wrapper" style="padding: 10px;"><input type="submit" class="waves-button-input" value="Entrar"></i>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </body>
</html>
