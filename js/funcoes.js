
/*
Descricao: plataforma de envio de mensagem via whatsapp
Autor: Ivan Kloh
Data: 03/05/2021 até 28/05/2021
*/

///funçao de abreModal start
		 function abreModal(){
		      $.ajax({
		        type: 'POST',
		        //Caminho do arquivo do seu modal
		        url: '../visao/modalWhats.php',
		        success: function(data){              
		          $('.modalWhats').html(data);
		          $('#modalWhats').modal('show');
		          
		        }
		      });
		    }
///funçao de abreModal end
		///funçao de buscarInformacao start
			function buscarInformacao(atendimento){
				if(atendimento==""){
					alert('Falha ao Buscar');///caso o alterar tenha algum erro aparecera essa mensagem
				  	return;
				} 
				if (window.XMLHttpRequest)  { ///condiçao para a consulta no servidor
				    xmlhttp = new XMLHttpRequest();
				    } 
				    xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
				    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				    var ola="Olá,";
				    var link="https://formularioccih.hananery.com.br";
				    var mens =" Click no link "+link+" para responder uma pesquisa do Hospital Ana Nery. Se preferir responder por ligação telefônica, responda sim.";
				    numeroAten= " Seu número de atendimento é "+atendimento+". Ele será necessário para preencher o formúlario!"
				    recebe=JSON.parse(xmlhttp.responseText);
				   

	   			 $("#nome").val(recebe[1].NM_PACIENTE);
				 $("#fone").val(recebe[1].NR_TELEFONE_CELULAR);
				 $("#primeiroNome").val(ola + recebe[1].NM_ABREVIADO + mens);
				  nome =recebe[1].NM_PACIENTE;
				mensagem=ola + recebe[1].NM_ABREVIADO + mens;
				 //console.log(mensagem);  

					
				    }
				 	}
				xmlhttp.open("GET","../controle/enviaSMS.php?atendimento="+atendimento,true);///local para onde vai ser enviados os parametros ou valores
				xmlhttp.send();
							
			}
		
	///função buscarInformacao End
	///funçao  envia start
		function envia(atendimento,nome,fone,primeiroNome){
				if(atendimento==""|| nome==""|| fone==""|| primeiroNome==""){
					alert('Falha ao Enviar');///caso o alterar tenha algum erro aparecera essa mensagem
				  	return;
				} 
				if (window.XMLHttpRequest)  { ///condiçao para a consulta no servidor
				    xmlhttp = new XMLHttpRequest();
				    } 
				
			
				    xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
				    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				   
				     fone =recebe[1].NR_TELEFONE_CELULAR;
				     x='51';
					 cortar = fone.substr(-9);//pega o numero de telefone e deixa os 9 ultimos caracteres e apaga o resto para colocar no link do whats
					 cortar[0];
					 if (cortar[0]!=='9'){///se o primeiro numero for diferente de 9 ele o ignora  
					 			cortar1 = cortar.substr(-8);
				
							 $("#bottom").val(cortar1);
				  
								location.href="https://wa.me/55"+x+cortar1+"?text="+mensagem +numeroAten;

				}else{
	   			
					   $("#bottom").val(cortar);
					  
						location.href="https://wa.me/55"+x+cortar+"?text="+mensagem+numeroAten;
				
					}
				    }
				 	}
				xmlhttp.open("GET","../controle/enviaConfirm.php?atendimento="+atendimento+"&nome="+nome+"&fone="+fone+"&primeiroNome="+primeiroNome,true);///local para onde vai ser enviados os parametros ou valores
				xmlhttp.send();
							
				}
///funçao  envia end
///funçao semWhats start
			
			function semWhats(atendimento,nome,fone){
				if(atendimento==""|| nome==""|| fone==""){
					alert('Falha ao Cadastrar');///caso o alterar tenha algum erro aparecera essa mensagem
				  	return;
				} 
				if (window.XMLHttpRequest)  { ///condiçao para a consulta no servidor
				    xmlhttp = new XMLHttpRequest();
				    } 
				
			
				    xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
				    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;				 

				    fone =recebe[1].NR_TELEFONE_CELULAR;
					 
	           	    $("#bottom").val(fone);
				 alert('Paciente sem Whatsapp Cadastrado com Sucesso'); 
				 
					
				    }
				 	}
				xmlhttp.open("GET","../controle/semWhats.php?atendimento="+atendimento+"&nome="+nome+"&fone="+fone,true);///local para onde vai ser enviados os parametros ou valores
				xmlhttp.send();
							
			}
	///função semWhats End
	///funçao cadastraResp start

		
		///funçao cadastraResp End	
		
	///função inicio start
		function inicio(host){
				
					window.location.href = "http://"+host+"/visao/index.php"
				
			}
	///funçao inicio End	
	
	///funcao limpar start
		function limpar(){
				document.getElementById('nome').value='';
				document.getElementById('fone').value='';
				document.getElementById('atendimento').value='';
				document.getElementById('primeiroNome').value='';
				
			}
		///funcao limpar End
		///funçao de sair start
			function sair(host){
				
					window.location.href = "http://"+host+"/controle/sair.php"
				
			}
		///função sair End
		///funçao de inatividade start
			var tempo = 0;
			var mexer=0;
			var clicar=0;
			var tecla=0;



			setInterval(function(){
				tempo++;
			///movimento do cursor start
	

				document.onmousemove =function(){///função onde mexe o mause
					mexer = 1;
				}
				document.onmousedown =function(){///função onde clicar os botões do mause
					clicar = 1;	
				}
				document.onkeypress =function(){///função quando aperta uma tecla do teclado
					tecla = 1;	
				}
				
		
				if(mexer == 1){///quando mexer o mause retorna 1 e começa a contagem de novo
					 mexer = 0;
					 tempo = 0;
					// console.log('Mexeu');
				}
				if (clicar ==1) {//quando clicar o botão do mause retorna 1 e começa a contagem de novo
					 clicar = 0;
					 tempo = 0;
					// console.log('clicar');
				}
				if (tecla == 1) {//quando aperta uma tecla retorna 1 e começa a contagem de novo
					 tecla = 0;
					 tempo = 0;
					 //console.log('tecla');

				}
					
				if(tempo>=900){//quando ficar mais de 15 segundos de inatividade da o alerte e sai do sistema
				tempo = 0;
					alert('Tempo de Sessão Expirado');
					window.location.href=(window.location.protocol + "//" +window.location.host + "/" +"ccih/controle/sair.php"); 
					

				}


			}, 1000);

		///funçao de inatividade end
///dataTables startr
		  $(".button-collapse").sideNav();
	
			        $(".dropdown-button").dropdown();


			        $('#alert_close').click(function () {
			            $("#alert_box").fadeOut("slow", function () {
			            });
			        });

			        $(document).ready(function () {

			            $('#tablist').DataTable({
			                dom: 'lBfrtip',
			                buttons: [
			                    'excel',
			                    'pdf',
			                ],
			                "order": [[0, "desc"]],
			                // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

			                "language": {
			                    "sEmptyTable": "Nenhum registro encontrado",
			                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
			                    "sInfoPostFix": "",
			                    "sInfoThousands": ".", "sLengthMenu": "_MENU_ Linhas &nbsp&nbsp&nbsp ",
			                    "sLoadingRecords": "Carregando...",
			                    "sProcessing": "Processando...",
			                    "sZeroRecords": "Nenhum registro encontrado",
			                    "sSearch": "Pesquisar",
			                    "oPaginate": {
			                        "sNext": "Próximo",
			                        "sPrevious": "Anterior",
			                        "sFirst": "Primeiro",
			                        "sLast": "Último",
			                    },

			                    "oAria": {
			                        "sSortAscending": ": Ordenar colunas de forma ascendente",
			                        "sSortDescending": ": Ordenar colunas de forma descendente"
			                    },
			                    "select": {
			                        "rows": {
			                            "_": "Selecionado %d linhas",
			                            "0": "Nenhuma linha selecionada",
			                            "1": "Selecionado 1 linha"
			                        }
			                    }
			                }
			            });
	///dataTables End
	///modal start		            
			    $('#myModal').click(function() {
 				$('#myModal').modal('show');
 				$(".modal-dialog").css("height", "80%");
 					//$("#nome").val(name);
 					///console.log('aqui');
 					//$("#fone").val(fone);
 				
  				});
 ///modal end		
  });




function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i);

    if (texto.substring(0,1) != saida){
        documento.value += texto.substring(0,1);
    }

}

function exibe(i) {

    document.getElementById(i).readOnly= true;

}

function desabilita(i){

        document.getElementById(i).disabled = true;


}


function habilita(i,j){

        document.getElementById(i).disabled = false;
        document.getElementById(j).disabled = false;

}

function exibe_div(a,b){

		if(document.getElementById(a).style.visibility == "hidden"  ){
			document.getElementById(a).style.visibility = "visible";
		    document.getElementById(b).style.visibility = "visible";
		}else{
	        document.getElementById(a).style.visibility = "hidden";
		    document.getElementById(b).style.visibility = "hidden";
		}


}


function habilita_residente(a,b,c,d,e,f,g,h,i){

	if(document.getElementById(d).value==3){

    document.getElementById(a).style.visibility = "hidden";
    document.getElementById(b).style.visibility = "hidden";
    document.getElementById(c).style.visibility = "visible";

    document.getElementById(e).disabled = true;
    document.getElementById(f).disabled = true;
    document.getElementById(g).disabled = false;
    document.getElementById(h).disabled = false;
    document.getElementById(i).disabled = false;

	}else{

		document.getElementById(a).style.visibility = "visible";
	    document.getElementById(b).style.visibility = "visible";
	    document.getElementById(c).style.visibility = "hidden";

	    document.getElementById(e).disabled = false;
	    document.getElementById(f).disabled = false;
	    document.getElementById(g).disabled = true;
	    document.getElementById(h).disabled = true;
	    document.getElementById(i).disabled = true;

	}

}

function habilita(i,j){

        document.getElementById(i).disabled = false;
        document.getElementById(j).disabled = false;

}
function habilitaCheck(a,b,c,i,j,l)
{

    if(document.getElementById(a).checked == true){


        document.getElementById(b).disabled = true;
        document.getElementById(c).disabled = true;
        document.getElementById(i).disabled = true;
        document.getElementById(j).disabled = true;
        document.getElementById(l).disabled = true;

        document.getElementById(b).checked = false;
        document.getElementById(c).checked = false;
        document.getElementById(i).checked = false;
        document.getElementById(j).checked = false;
        document.getElementById(l).checked = false;

    }else{

        document.getElementById(b).disabled = false;
        document.getElementById(c).disabled = false;
        document.getElementById(i).disabled = false;
        document.getElementById(j).disabled = false;
        document.getElementById(l).disabled = false;
    }
}
function habilitaCheck2(a,b,c,i,j )
{

    if(document.getElementById(a).checked == true){


        document.getElementById(b).disabled = true;
        document.getElementById(c).disabled = true;
        document.getElementById(i).disabled = true;
        document.getElementById(j).disabled = true;


        document.getElementById(b).checked = false;
        document.getElementById(c).checked = false;
        document.getElementById(i).checked = false;
        document.getElementById(j).checked = false;
       
    }else{

        document.getElementById(b).disabled = false;
        document.getElementById(c).disabled = false;
        document.getElementById(i).disabled = false;
        document.getElementById(j).disabled = false;

    }
}
function habilitaCheckConvenio( a,b,c,d,e,f,g)
{


    if(document.getElementById(a).disabled == true){

        document.getElementById(a).disabled = false;
        document.getElementById(b).disabled = false;
        document.getElementById(c).disabled = false;
        document.getElementById(d).disabled = false;
        document.getElementById(e).disabled = false;
        document.getElementById(f).disabled = false;
        document.getElementById(g).disabled = false;

    }else{

        document.getElementById(a).disabled = true;
        document.getElementById(b).disabled = true;
        document.getElementById(c).disabled = true;
        document.getElementById(d).disabled = true;
        document.getElementById(e).disabled = true;
        document.getElementById(f).disabled = true;
        document.getElementById(g).disabled = true;

    }
}


function showhide()
{
    var div = document.getElementById("newpost");

    if(idade()>=18){

        div.style.display = "none";
    }
    else if(idade()<18) {
        div.style.display = "inline";
    }

}
function ajax(ibge)
{

       $.get('/get-cidades/'+ibge,function(dados) {

               document.getElementById('cidade').value=(dados.ds_cidade);
               document.getElementById('estado').value=(dados.ds_uf);
               document.getElementById('CD_MUNICIPIO').value=(dados.cd_municipio);
               document.getElementById('pais').value=('Brasil');

       });

}
function ajaxc(ibge)
{
       $.get('/get-cidades/'+ibge,function(dados) {

               document.getElementById('cidadec').value=(dados.ds_cidade);
               document.getElementById('estadoc').value=(dados.ds_uf);
               document.getElementById('CD_MUNICIPIOC').value=(dados.cd_municipio);
               document.getElementById('paisc').value=('Brasil');

       });

}

function coletaDados(id){
   var ids = document.getElementsByClassName('editar');
   coletaIDs(ids,id);
}

function coletaIDs(dados,id){

   var array_dados = dados;
   var newArray = [];
   for(var x = 0; x <= array_dados.length; x++){
        if(typeof array_dados[x] == 'object'){
          if(array_dados[x].checked){
             newArray.push(array_dados[x].id)
          }
        }
   }
  if(newArray.length <= 0){
    alert("Selecione um pelo menos 1 item!");
  }else{

      var requestData = JSON.stringify(newArray);

    console.log(requestData);
    //logs correct json object
    var request;

    request = $.ajax({
                url: "/convenio-ajax?data="+requestData+"&id="+id,
                method: "get",
                dataType: "json",

    });

    alert(request);
  }
}


function buscaCidades(busca){

 var dados = carregarDados(busca);

  $('input.autocomplete').autocomplete({
    data: {
      "Apple": null,
      "Microsoft": null,
      "Google": 'https://placehold.it/250x250'
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });

}
function buscaAtend(){

    var busca = document.getElementById('nr_atendimento').value;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'post',
        url:'/atend',

        data:{busca},

        success:function(response) {

            if(response.success === true){

                document.querySelector('input[name=nr_atendimento]').value = response.atendimento;
                document.querySelector('input[name=nm_paciente]').value = response.nm_paciente;
                document.querySelector('input[name=nr_telefone]').value = response.nr_telefone;
                document.querySelector('input[name=atendimento]').value = response.atendimento;
                // document.querySelector('input[name=dt_alta]').value = response.dt_alta;
                //alert(response.nome);

            }else{
                alert('ERRO');
            }


    }
    });
}
    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados(){
        var busca = $('#busca').val();

        if(busca != "" && busca.length >= 2){
            $.ajax({
                url: "/busca-cidade",
                dataType: "json",
                data: {
                    acao: 'consulta',
                    parametro: $('#busca').val()
                },
                success: function( data ) {
                   return data;
                }
            });
        }
    }


    function message(msg,cor) {
        Materialize.toast("<strong>"+msg+"</strong>",3000,cor);
    }


 // JavaScript Document
  //adiciona mascara de cnpj
  function MascaraCNPJ(cnpj){
          if(mascaraInteiro(cnpj)==false){
                  event.returnValue = false;
          }
          return formataCampo(cnpj, '00.000.000/0000-00', event);
  }

  //adiciona mascara de cep
  function MascaraCep(cep){
                  if(mascaraInteiro(cep)==false){
                  event.returnValue = false;
          }
          return formataCampo(cep, '00.000-000', event);
  }

  //adiciona mascara de data
  function MascaraData(data){
          if(mascaraInteiro(data)==false){
                  event.returnValue = false;
          }
          return formataCampo(data, '00/00/0000', event);
  }

  //adiciona mascara ao telefone
  function MascaraTelefone(tel){
          if(mascaraInteiro(tel)==false){
                  event.returnValue = false;
          }
          return formataCampo(tel, '(00) 0000-0000', event);
  }

  //adiciona mascara ao CPF
  function MascaraCPF(cpf){
          if(mascaraInteiro(cpf)==false){
                  event.returnValue = false;
          }
          return formataCampo(cpf, '000.000.000-00', event);
  }

  //valida telefone
  function ValidaTelefone(tel){
          exp = /\(\d{2}\)\ \d{4}\-\d{4}/
          if(!exp.test(tel.value))
                  alert('Numero de Telefone Invalido!');
  }

  //valida CEP
  function ValidaCep(cep){
          exp = /\d{2}\.\d{3}\-\d{3}/
          if(!exp.test(cep.value))
                  alert('Numero de Cep Invalido!');
  }

  //valida data
  function ValidaData(data){
          exp = /\d{2}\/\d{2}\/\d{4}/
          if(!exp.test(data.value))
                  alert('Data Invalida!');
  }

  //valida o CPF digitado
  function ValidarCPF(Objcpf){
          var cpf = Objcpf.value;
          exp = /\.|\-/g
          cpf = cpf.toString().replace( exp, "" );
          var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
          var soma1=0, soma2=0;
          var vlr =11;

          for(i=0;i<9;i++){
                  soma1+=eval(cpf.charAt(i)*(vlr-1));
                  soma2+=eval(cpf.charAt(i)*vlr);
                  vlr--;
          }
          soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
          soma2=(((soma2+(2*soma1))*10)%11);

          var digitoGerado=(soma1*10)+soma2;
          if(digitoGerado!=digitoDigitado)
                  alert('CPF Invalido!');
  }

  //valida numero inteiro com mascara
  function mascaraInteiro(){
          if (event.keyCode < 48 || event.keyCode > 57){
                  event.returnValue = false;
                  return false;
          }
          return true;
  }

  //valida o CNPJ digitado
  function ValidarCNPJ(ObjCnpj){
          var cnpj = ObjCnpj.value;
          var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
          var dig1= new Number;
          var dig2= new Number;

          exp = /\.|\-|\//g
          cnpj = cnpj.toString().replace( exp, "" );
          var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

          for(i = 0; i<valida.length; i++){
                  dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);
                  dig2 += cnpj.charAt(i)*valida[i];
          }
          dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
          dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

          if(((dig1*10)+dig2) != digito)
                  alert('CNPJ Inválido!');

  }

  //formata de forma generica os campos
  function formataCampo(campo, Mascara, evento) {
          var boleanoMascara;

          var Digitato = evento.keyCode;
          exp = /\-|\.|\/|\(|\)| /g
          campoSoNumeros = campo.value.toString().replace( exp, "" );

          var posicaoCampo = 0;
          var NovoValorCampo="";
          var TamanhoMascara = campoSoNumeros.length;;

          if (Digitato != 8) { // backspace
                  for(i=0; i<= TamanhoMascara; i++) {
                          boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                  || (Mascara.charAt(i) == "/"))
                          boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
                                                                  || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
                          if (boleanoMascara) {
                                  NovoValorCampo += Mascara.charAt(i);
                                    TamanhoMascara++;
                          }else {
                                  NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                                  posicaoCampo++;
                            }
                    }
                  campo.value = NovoValorCampo;
                    return true;
          }else {
                  return true;
          }
  }
//adiciona mascara ao RG
  function MascaraRG(rg){
          if((rg)==false){
                  event.returnValue = false;
          }
          return formataCampo(rg, '00.000.000-0', event);
  }

function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

 
		
	
		
		