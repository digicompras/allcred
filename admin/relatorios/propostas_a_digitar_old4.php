<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');



?>

<html>

<head>

<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO OPERADOR</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style3 {font-size: 10px}

-->

</style>

</head>

<?



require '../../conect/conect.php';



$sql5 = "SELECT * FROM cad_empresa limit 1";

$res5 = mysql_query($sql5);

while($linha=mysql_fetch_row($res5)) {





$razaosocial_empresa = $linha[1];



$nfantasia_empresa = $linha[2];



$cnpj_empresa = $linha[3];

$inscr_est_empresa = $linha[4];





$endereco_empresa = $linha[5];



$numero_empresa = $linha[6];



$bairro_empresa = $linha[7];



$cep_empresa = $linha[9];



$cidade_empresa = $linha[10];



$estado_empresa = $linha[11];



$telefone_empresa = $linha[12];



$fax_empresa = $linha[13];



$email_empresa = $linha[14];



$site_empresa = $linha[15];



}







$solicitacao = $_POST['solicitacao'];

$nome_operador = $_POST['nome_operador'];

$nome_operador_a_atribuir = $_POST['nome_operador_a_atribuir'];

$mes_ano = $_POST['mes_ano'];

$tipo_contrato = $_POST['tipo_contrato'];

	

if($tipo_contrato=="SITE"){

	

$status = "ATRIBUIDO";



}

else{



$status = $_POST['status'];



}

	

$digitacao = $_POST['digitacao'];



$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];



$num_proposta_atualizar = $_POST['num_proposta_atualizar'];

$margemcartao = $_POST['margemcartao'];

$margememprestimo = $_POST['margememprestimo'];



$sql = "SELECT * FROM operadores where nome = '$nome_operador_a_atribuir'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$nome_op_atribuir = $linha[1];

$email_op_atribuir = $linha[20];

$estabelecimento_atribuir = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];





}



$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_atribuir'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$fax = $linha[13];



}











if($solicitacao=="atualizarstatus"){



$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {



$db = $linha[1];

}



	

if($tipo_contrato=="SITE"){

	

$comando = "update `$db`.`propostas` set `digitacao` = '$digitacao',`status` = '$status',`nome_operador` = '$nome_operador_a_atribuir',`estabelecimento_proposta` = '$estabelecimento_atribuir',`margemcartao` = '$margemcartao',`margememprestimo` = '$margememprestimo' where `propostas`. `num_proposta` = '$num_proposta_atualizar' limit 1 ";

}

else{

	

$comando = "update `$db`.`propostas` set `status` = '$status',`nome_operador` = '$nome_operador_a_atribuir',`estabelecimento_proposta` = '$estabelecimento_atribuir',`margemcartao` = '$margemcartao',`margememprestimo` = '$margememprestimo' where `propostas`. `num_proposta` = '$num_proposta_atualizar' limit 1 ";



}

mysql_query($comando,$conexao) or die("Erro ao efetuar atribuição!");











if($status=="REPROVADO"){



$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta_atualizar'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$num_proposta = $linha[0];

$tipo = $linha[2];

$nome_cli = $linha[4];

$email_cli = $linha[23];

}





	//EMAIL DO CLIENTE QUE VAI RECEBER O EMAIL



	//$email_dest   =   $email_cli;

	$email_dest   =   $email_cli;



	//PREPARA O PEDIDO



	$mens   =  "Olá $nome_cli! \n";

	$mens  .=  "Prezado cliente, em uma primeira analise não localizamos margem livre para novos contratos ou cartão consignado porém, podemos analisar a possibilidade de portabilidade de seus contratos, entre em contato com uma de nossas agências para maiores informações. \n";

	







$mens  .=  $to = "$email_cli";

$from = "$email_empresa";

$subject = "Olá $nome_cli! Temos opções para você na $nfantasia_empresa!";

$html = "

<html>

<body>

Olá $nome_cli! Temos opções para você na <b>$nfantasia_empresa<b>!<br><br>



Nº de sua proposta: $num_proposta_atualizar<br>



Prezado cliente, em uma primeira analise não localizamos margem livre para novos contratos ou cartão consignado porém, podemos analisar a possibilidade de portabilidade de seus contratos, entre em contato com uma de nossas agências para maiores informações.<br>

</body>

</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";

$headers = "Content-type: text/html; charset=iso-8859-1\r\n";

$headers .= "From: $from \r\n";



if (mail($to, $subject, $html, $headers)) {

echo "Email enviado com sucesso !";

} else {

echo "Ocorreu um erro durante o envio do email.";

}







}//fecha se status reprovado

else{

	

$sql3 = "SELECT * FROM propostas where num_proposta = '$num_proposta_atualizar'";

$res3 = mysql_query($sql3);

while($linha=mysql_fetch_row($res3)) {


$num_proposta = $linha[0];
	
$nome_cli = $linha[4];

$email_cli = $linha[23];



}









$mens  .=  $to = "$email_cli";

$from = "$email_op_atribuir";

$subject = "Olá $nome_cli! Você será atendido em breve pois já foi designado uma pessoa para lhe atender na $nfantasia_empresa!";

$html = "

<html>

<body>

Olá $nome_cli! Você será atendido em breve pois já foi designado uma pessoa para lhe atender na <b>$nfantasia_empresa<b>!<br><br>



Nº de sua proposta: $num_proposta_atualizar<br>

Operador(a) que lhe irá atender: $nome_op_atribuir<br><br>



Caso prefira, fique a vontade em ligar para a pessoa que lhe irá atender!<br>

Agencia: $estabelecimento_atribuir<br>

Cidade: $cidade_estab_pertence<br>

Telefone: $tel_estab_pertence<br>

Celular: $fax<br>

</body>

</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";

$headers = "Content-type: text/html; charset=iso-8859-1\r\n";

$headers .= "From: $from \r\n";



if (@mail($to, $subject, $html, $headers)) {

echo "Email enviado com sucesso para $email_cli!";

} else {

echo "Ocorreu um erro durante o envio do email para $email_cli.";

}

	

	//DISPARA O EMAIL PARA O OPERADOR

	

$mens  .=  $to = "$email_op_atribuir";

$from = "$email_op_atribuir";

$subject = "Olá $nome_cli! Você será atendido em breve pois já foi designado uma pessoa para lhe atender na $nfantasia_empresa!";

$html = "

<html>

<body>

Olá $nome_cli! Você será atendido em breve pois já foi designado uma pessoa para lhe atender na <b>$nfantasia_empresa<b>!<br><br>



Nº de sua proposta: $num_proposta_atualizar<br>

Operador(a) que lhe irá atender: $nome_op_atribuir<br><br>



Caso prefira, fique a vontade em ligar para a pessoa que lhe irá atender!<br>

Agencia: $estabelecimento_atribuir<br>

Cidade: $cidade_estab_pertence<br>

Telefone: $tel_estab_pertence<br>

Celular: $fax<br>

</body>

</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";

$headers = "Content-type: text/html; charset=iso-8859-1\r\n";

$headers .= "From: $from \r\n";



if (@mail($to, $subject, $html, $headers)) {

echo "Email enviado com sucesso para $email_op_atribuir!";

} else {

echo "Ocorreu um erro durante o envio do email para $email_op_atribuir.";

}







$sql = "SELECT * FROM atribuicao_de_propostas where num_proposta_atribuida = '$num_proposta_atualizar'";

$res = mysql_query($sql);

$registros_atribuicoes = mysql_num_rows($res);



if($registros_atribuicoes>="1"){



}

else{



$date = date('Y-m-d');

$hora_atribuicao = date('H:i:s');



$comando = "insert into atribuicao_de_propostas(date,num_proposta_atribuida,operador_atribuido,margemcartao,margememprestimo,hora_atribuicao) values('$date','$num_proposta_atualizar','$nome_op_atribuir','$margemcartao','$margememprestimo','$hora_atribuicao')";





mysql_query($comando,$conexao);







}



}



}



?>



















<?



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" 

  

<? } ?>





<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <form action="../principal.php" method="post" name="form1" target="_top">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit2" value="Voltar ao menu principal">

</form>

<br>

      <table width="100%"  border="0" align="center">

        <tr>

          <td width="18%" valign="middle">&nbsp;</td>

          <td width="51%" valign="middle"><div align="center"><strong>Selecione o tipo de proposta que deseja filtrar</strong></div></td>

          <td width="31%">&nbsp;</td>

        </tr>

        <tr>

          <td colspan="2" valign="middle"><form name="form3" method="post" action="propostas_a_digitar.php">

            <div align="center"><strong><font color="#0000FF">

            Consignado

            <select name="tipo_proposta" id="tipo_proposta">

              <option selected>Todas</option>

              <?











    $sql = "select * from tipos_propostas group by tipo_proposta order by tipo_proposta asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['tipo_proposta']."</option>";



    }



?>

            </select> 

            Veiculos / CP

            </font></strong>

              <strong><font color="#0000FF">

              <select name="titulo_proposta" id="titulo_proposta">

                <option selected>Todas</option>

                <?











    $sql = "select * from titulos_propostas group by titulo_proposta order by titulo_proposta asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['titulo_proposta']."</option>";



    }



?>

              </select>

              </font></strong>

              <input type="submit" name="Submit" value="Filtrar TIPO PROPOSTA">

            </div>

          </form></td>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td valign="middle">&nbsp;</td>

          <td valign="middle"><div align="center">TOTAL DE PROPOSTAS NA FILA 

            <?	



$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' order by data_proposta,horaproposta asc";



$res = mysql_query($sql);



$registros_propostas = mysql_num_rows($res);











echo $registros_propostas;



?>

          </div></td>

          <td>&nbsp;</td>

        </tr>

      </table>

      

<br>

<?

echo "<table align='center'><tr>";





$sql = "select * from tipo_contrato where status = 'Ativo' group by tipo_contrato asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;







$tipo_do_contrato = $linha[1];







$sql2 = "SELECT * FROM propostas where digitacao = 'A Digitar' and tipo_contrato = '$tipo_do_contrato'";

$res2 = mysql_query($sql2);



$registros_encontrados = mysql_num_rows($res2);











echo "<td><form name='form4' method='post' action='propostas_a_digitar.php'>";

     



  	$_SESSION['usuario'] = $usuario;



	$_SESSION['senha'] = $senha;



      echo "<input type='hidden' name='tipo_contrato' id='tipo_contrato' value='$tipo_do_contrato'>";









      echo "<input type='submit' name='button' id='button' value='$tipo_do_contrato $registros_encontrados'>";

	  

	  

	  



echo "</form>";





if($reg<=5){

	

echo "</td><td>";



}

else{

	

echo "</td></tr><br>";

	

$reg=0;



}





}



echo "</table>";



?>

<br>









<table width="100%"  border="0">

  <tr bgcolor="#<? echo $cor ?>">

    <td colspan="22"><div align="center">

      <?	



if($tipo_contrato=="Todas"){

$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and status <> 'REPROVADO' and cpf <> '' order by data_proposta,horaproposta asc";

}

else{

$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and tipo_contrato = '$tipo_contrato' and status <> 'REPROVADO' order by data_proposta,horaproposta asc";

}



$res = mysql_query($sql);



$registros = mysql_num_rows($res);











echo "Total de registros encontrados por TIPO DE CONTRATO $tipo_contrato---> ".$registros;



?>      

    </div></td>

  </tr>

  <tr bgcolor="#<? echo $cor ?>">

    <td><div align="center" class="style3">N&ordm; Proposta </div></td>

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td><div align="center" class="style3">Valor Solicitado </div></td>

    <?

	}

	?>

    <td><div align="center" class="style3">Valor liq cliente </div></td>

    <td><div align="center"><span class="style3">Valor Total </span></div></td>

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td><div align="center"><span class="style3">Tabela</span></div></td>

    <?

	}

	?>

    <td><div align="center" class="style3">Cliente</div></td>

    <td class="style3"><div align="center">CPF</div></td>

    <td><div align="center" class="style3">Secretaria</div></td>

    <td><div align="center" class="style3">Cargo</div></td>

    <td class="style3"><div align="center">Cidade</div></td>

    <td class="style3"><div align="center">E-Mail</div></td>

    <td class="style3"><div align="center">Telefones</div></td>

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td width="2%"><div align="center" class="style3">Prazo</div></td>

    <?

	}

	?>

    

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td width="3%"><div align="center" class="style3">R$ Parcelas </div></td>

    <?

	}

	?>

    <td><div align="center" class="style3">Tipo De Contrato</div></td>

    <td><div align="center" class="style3">Tipo de Proposta </div></td>

    

    

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>

    <?

	}

	?>

    <td align="center" class="style3">Operador</td>

    <td class="style3"><div align="center">Status</div></td>

    <td class="style3"><div align="center">Margem Cat&atilde;o</div></td>

    <td class="style3"><div align="center">Margem Emprestimo</div></td>

    <td class="style3"><div align="center">#</div></td>

  </tr>

  <?





if($tipo_proposta=="Todas"){

$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and cpf <> '' order by data_proposta,horaproposta asc";

}

else{

$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and tipo_contrato = '$tipo_contrato' order by data_proposta,horaproposta asc";

}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$num_proposta = $linha[0];

$nome_operador = $linha[1];

$tipo = $linha[2];

$estabelecimento_proposta = $linha[3];

$nome = $linha[4];

$sexo = $linha[5];

$estadocivil = $linha[6];

$cpf = $linha[7];

$rg = $linha[8];

$orgao = $linha[9];

$emissao = $linha[10];

$data_nasc = $linha[11];

$pai = $linha[12];

$mae = $linha[13];

$endereco = $linha[14];

$numero = $linha[15];

$bairro = $linha[16];

$complemento = $linha[17];

$cidade = $linha[18];

$estado = $linha[19];

$cep = $linha[20];

$telefone = $linha[21];

$celular = $linha[22];

$email = $linha[23];

$num_beneficio = $linha[24];

$num_beneficio2 = $linha[80];

$num_beneficio3 = $linha[81];

$num_beneficio4 = $linha[82];

$tipo_proposta = $linha[83];

$valor_credito = $linha[25];

$quant_parc = $linha[26];

$parcela = $linha[27];

$banco_pagto = $linha[28];

$num_banco = $linha[29];

$agencia = $linha[30];

$conta = $linha[31];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$obs = $linha[39];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];

$status = $linha[51];



$parc = $linha[52];

$banco = $linha[53];

$vencto = $linha[54];

$compra = $linha[55];



$parc = $linha[52];

$banco = $linha[53];

$vencto = $linha[54];

$compra = $linha[55];



$parc1 = $linha[52];

$banco1 = $linha[53];

$vencto1 = $linha[54];

$compra1 = $linha[55];



$parc2 = $linha[56];

$banco2 = $linha[57];

$vencto2 = $linha[58];

$compra2 = $linha[59];



$parc3 = $linha[60];

$banco3 = $linha[61];

$vencto3 = $linha[62];

$compra3 = $linha[63];



$parc4 = $linha[64];

$banco4 = $linha[65];

$vencto4 = $linha[66];

$compra4 = $linha[67];



$parc5 = $linha[68];

$banco5 = $linha[69];

$vencto5 = $linha[70];

$compra5 = $linha[71];



$parc6 = $linha[72];

$banco6 = $linha[73];

$vencto6 = $linha[74];

$compra6 = $linha[75];



$parc7 = $linha[76];

$banco7 = $linha[77];

$vencto7 = $linha[78];

$compra7 = $linha[79];

$bco_operacao = $linha[86];



$valor_liberado = $linha[97];

$obs2 = $linha[102];

$tabela = $linha[109];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];

$tipo_contrato = $linha[136];

$digitacao = $linha[154];

$datadigitacao = $linha[155];

$horadigitacao = $linha[156];



$cargosituacao = $linha[207];

$margemcartao = $linha[209];

$margememprestimo = $linha[210];



$secretaria = $linha[214];





?>

  <tr>

    <td width="3%"><form name="form2" method="post" action="visualizacao_proposta_para_digitacao.php">

      <div align="center" class="style3">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

        <input name="digitacao" type="hidden" id="digitacao" value="<? echo "Digitada";  ?>">

        <? //echo $num_proposta; ?>

        <? if($digitacao=="A Digitar"){ echo "<input type='submit' name='button' id='button' value='$num_proposta'>"; } ?>

      </div>

    </form></td>

    

    <form name="form2" method="post" action="propostas_a_digitar.php">

    

    

    

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td width="4%"><div align="center" class="style3">

	<? echo $valor_credito; ?></div></td>

    <?

	}

	?>

    

    

    

    <td width="3%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>

    <td width="3%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>

    

    

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td width="3%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>

    <?

	}

	?>

    

    

    

    <td width="7%"><div align="center" class="style3"><? echo $nome; ?></div></td>

    <td width="4%" class="style3"><div align="center"><? echo $cpf; ?></div></td>

    <td width="4%"><div align="center"><span class="style3"><? echo $secretaria; ?></span></div></td>

    <td width="4%"><div align="center" class="style3"><? echo $cargosituacao; ?></div></td>

    <td width="4%" class="style3"><div align="center"><? echo $cidade; ?></div></td>

    <td width="4%" class="style3"><div align="center"><? echo $email; ?></div></td>

    <td width="4%" class="style3"><div align="center"><? echo "$telefone "; ?> <? echo "$celular "; ?></div></td>

    

    

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td><div align="center" class="style3"><? echo $quant_parc; ?></div></td>

    <?

	}

	?>

    

    

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td><div align="center" class="style3"><? echo $parcela; ?></div></td>

    <?

	}

	?>

    

    

    

    <td width="3%"><div align="center"><span class="style3">

      <input name="tipo_contrato" type="hidden" id="tipo_contrato" value="<? echo "$tipo_contrato"; ?>">

      <? echo $tipo_contrato; ?></span></div></td>

    <td width="3%"><div align="center" class="style3"><? echo $tipo_proposta; ?></div></td>

    

    

    <? if($tipo_contrato=="SITE"){

	}

	else{

		 ?>

    <td width="9%"><div align="center" class="style3"><? echo $bco_operacao; ?></div></td>

    <?

	}

	?>

    

    

    

    <td width="9%" align="center" class="style3"><strong><font color="#0000FF">

    <? if($tipo_contrato=="SITE"){

		 ?>

      <select name="nome_operador_a_atribuir" id="nome_operador_a_atribuir">

<option selected><? echo $nome_operador; ?></option>

        <?



    $sql = "select * from operadores where status = 'Ativo' order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['nome']."</option>";



    }



?>

      </select> 

		

       <?  

	  }

	  else{

		  

		  echo $nome_operador;

	  }

		  ?>

        

      

    </font></strong></td>

    

    <td width="9%" class="style3"><div align="center"><strong><font color="#0000FF">

    <? if($tipo_contrato=="SITE"){

		 ?>

      <select name="status" id="select11">

        <option selected><? echo $status; ?></option>

        <?



    $sql = "select * from status where setor = 'CONSIGNADO' and status <> 'PAGO AO CLIENTE' order by status asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['status']."</option>";



    }



?>

      </select>

      <?

	}

	else{

		

	echo "$status";

		

	}

	?>

    </font></strong></div></td>

    <td width="7%" class="style3"><div align="center">

    <? if($tipo_contrato=="SITE"){

		 ?>

      <input name="margemcartao" type="text" id="margemcartao" value="<? echo "$margemcartao"; ?>" size="10">

      <?

	}

	else{

		

echo "$margemcartao";

		

	}

	?>

    </div></td>

    <td width="9%" class="style3"><div align="center">

    <? if($tipo_contrato=="SITE"){

		 ?>

      <input name="margememprestimo" type="text" id="margememprestimo" value="<? echo "$margememprestimo"; ?>" size="10">

      <?

	}

	else{

		

echo "$margememprestimo";	

		

	}

	?>

    </div></td>

    <td width="8%" class="style3"><div align="center">

      <strong><font color="#0000FF">

      <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarstatus">

      <input name="num_proposta_atualizar" type="hidden" id="num_proposta_atualizar" value="<? echo "$num_proposta"; ?>">

      <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo "$num_proposta"; ?>">

      </font></strong>

      <input name="digitacao" type="hidden" id="digitacao" value="<? echo "Digitada";  ?>">

      <? if($tipo_contrato=="SITE"){

		 ?>

      <input type="submit" name="button" id="button" value="Atualizar">

      <?

	  }

	  else{ 

		  

	  }

	  ?>

    </div></td>

    </form>

    </tr>

    <? } ?>

</table>

<p>
<p>
<p>&nbsp;</p>







</body>

</html>

