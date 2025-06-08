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


$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$num_proposta_atualizar = $_POST['num_proposta_atualizar'];
$nome_operador_a_atribuir = $_POST['nome_operador_a_atribuir'];
$status = $_POST['status'];
$margemcartao = $_POST['margemcartao'];
$margememprestimo = $_POST['margememprestimo'];



if($solicitacao=="atualizarstatus"){

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$db = $linha[1];
}

$comando = "update `$db`.`propostas` set `status` = '$status',`nome_operador` = '$nome_operador_a_atribuir',`margemcartao` = '$margemcartao',`margememprestimo` = '$margememprestimo' where `propostas`. `num_proposta` = '$num_proposta_atualizar' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao efetuar atribuição!");





if($status=="REPROVADO"){

$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
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

}

?>

<?

$num_proposta_atribuir = $_POST['num_proposta_atribuir'];
$nome_operador_a_atribuir = $_POST['nome_operador_a_atribuir'];
$margemcartao = $_POST['margemcartao'];
$margememprestimo = $_POST['margememprestimo'];



if($solicitacao=="atribuiroperador"){

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


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `nome_operador` = '$nome_op_atribuir',`estabelecimento_proposta` = '$estabelecimento_atribuir',`margemcartao` = '$margemcartao',`margememprestimo` = '$margememprestimo' where `propostas`. `num_proposta` = '$num_proposta_atribuir' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao efetuar atribuição!");



$sql3 = "SELECT * FROM propostas where num_proposta = '$num_proposta_atribuir'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

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

Nº de sua proposta: $num_proposta_atribuir<br>
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

Nº de sua proposta: $num_proposta_atribuir<br>
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



$sql = "SELECT * FROM atribuicao_de_propostas where num_proposta_atribuida = '$num_proposta_atribuir'";
$res = mysql_query($sql);
$registros_atribuicoes = mysql_num_rows($res);

if($registros_atribuicoes>="1"){

}
else{

$date = date('Y-m-d');

$comando = "insert into atribuicao_de_propostas(date,num_proposta_atribuida,operador_atribuido,margemcartao,margememprestimo) values('$date','$num_proposta_atribuir','$nome_op_atribuir','$margemcartao','$margememprestimo')";


mysql_query($comando,$conexao);



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
    <td><div align="center" class="style3">Valor Solicitado </div></td>
    <td><div align="center" class="style3">Valor liq cliente </div></td>
    <td><div align="center"><span class="style3">Valor Total </span></div></td>
    <td><div align="center"><span class="style3">Tabela</span></div></td>
    <td><div align="center" class="style3">Cliente</div></td>
    <td class="style3"><div align="center">CPF</div></td>
    <td><div align="center" class="style3">Secretaria</div></td>
    <td><div align="center" class="style3">Cargo</div></td>
    <td class="style3"><div align="center">Cidade</div></td>
    <td class="style3"><div align="center">E-Mail</div></td>
    <td class="style3"><div align="center">Telefones</div></td>
    <td width="2%"><div align="center" class="style3">Prazo</div></td>
    <td width="3%"><div align="center" class="style3">R$ Parcelas </div></td>
    <td><div align="center" class="style3">Tipo De Contrato</div></td>
    <td><div align="center" class="style3">Tipo de Proposta </div></td>
    <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
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
    <td width="4%"><div align="center" class="style3">
	<? echo $valor_credito; ?></div></td>
    <td width="3%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>
    <td width="3%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>
    <td width="3%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>
    <td width="7%"><div align="center" class="style3"><? echo $nome; ?></div></td>
    <td width="4%" class="style3"><div align="center"><? echo $cpf; ?></div></td>
    <td width="4%"><div align="center"><span class="style3"><? echo $secretaria; ?></span></div></td>
    <td width="4%"><div align="center" class="style3"><? echo $cargosituacao; ?></div></td>
    <td width="4%" class="style3"><div align="center"><? echo $cidade; ?></div></td>
    <td width="4%" class="style3"><div align="center"><? echo $email; ?></div></td>
    <td width="4%" class="style3"><div align="center"><? echo "$telefone "; ?> <? echo "$celular "; ?></div></td>
    <td><div align="center" class="style3"><? echo $quant_parc; ?></div></td>
    <td><div align="center" class="style3"><? echo $parcela; ?></div></td>
    <td width="3%"><div align="center"><span class="style3">
      <input name="tipo_contrato" type="hidden" id="tipo_contrato" value="<? echo "$tipo_contrato"; ?>">
      <? echo $tipo_contrato; ?></span></div></td>
    <td width="3%"><div align="center" class="style3"><? echo $tipo_proposta; ?></div></td>
    <td width="9%"><div align="center" class="style3"><? echo $bco_operacao; ?></div></td>
    <td width="9%" align="center" class="style3"><strong><font color="#0000FF">
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
    </font></strong></td>
    
    <td width="9%" class="style3"><div align="center"><strong><font color="#0000FF">
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
    </font></strong></div></td>
    <td width="7%" class="style3"><div align="center">
      <input name="margemcartao" type="text" id="margemcartao" value="<? echo "$margemcartao"; ?>" size="10">
    </div></td>
    <td width="9%" class="style3"><div align="center">
      <input name="margememprestimo" type="text" id="margememprestimo" value="<? echo "$margememprestimo"; ?>" size="10">
    </div></td>
    <td width="8%" class="style3"><div align="center">
      <strong><font color="#0000FF">
      <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarstatus">
      <input name="num_proposta_atualizar" type="hidden" id="num_proposta_atualizar" value="<? echo "$num_proposta"; ?>">
      <input name="num_proposta2" type="hidden" id="num_proposta2" value="<? echo "$num_proposta"; ?>">
      </font></strong>
      <input type="submit" name="button" id="button" value="Atualizar">
    </div></td>
    </form>
    </tr>
    <? } ?>
</table>
<p>
<table width="100%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td colspan="15"><div align="center">
            <?	

if($tipo_proposta=="Todas"){

$tipo_proposta = $_POST['tipo_proposta'];

$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and status <> 'REPROVADO' order by data_proposta,horaproposta asc";
}
else{

$tipo_proposta = $_POST['tipo_proposta'];

$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and tipo_proposta = '$tipo_proposta' and status <> 'REPROVADO' order by data_proposta,horaproposta asc";
}

$res = mysql_query($sql);

$registros = mysql_num_rows($res);





echo "Total de registros encontrados por TIPO DE PROPOSTA ---> ".$registros;

?>            
          </div></td>
        </tr>
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center" class="style3">N&ordm; Proposta </div></td>
          <td><div align="center" class="style3">Valor Solicitado </div></td>
          <td><div align="center" class="style3">Valor liq cliente </div></td>
          <td><div align="center"><span class="style3">Valor Total </span></div></td>
          <td><div align="center"><span class="style3">Tabela</span></div></td>
          <td><div align="center" class="style3">Cliente</div></td>
          <td class="style3"><div align="center">Cidade</div></td>
          <td class="style3"><div align="center">E-Mail</div></td>
          <td class="style3"><div align="center">Telefones</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td width="2%"><div align="center" class="style3">Prazo</div></td>
          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>
          <td><div align="center" class="style3">Tipo de Contrato</div></td>
          <td><div align="center" class="style3">Tipo de Proposta </div></td>
          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
        </tr>
<?


if($tipo_proposta=="Todas"){
$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and status <> 'REPROVADO' and cpf <> '' order by data_proposta,horaproposta asc";
}
else{
$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and tipo_proposta = '$tipo_proposta' and status <> 'REPROVADO' order by data_proposta,horaproposta asc";
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


?>
		
        <tr>
          <td width="4%">               <form name="form2" method="post" action="visualizacao_proposta_para_digitacao.php"><div align="center" class="style3">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
  <input name="digitacao" type="hidden" id="digitacao" value="<? echo "Digitada";  ?>">
            <? //echo $num_proposta; ?>                
            <? if($digitacao=="A Digitar"){ echo "<input type='submit' name='button' id='button' value='$num_proposta'>"; } ?>
          </div></form></td>
          <td width="6%"><div align="center" class="style3"><? echo $valor_credito; ?></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>
          <td width="5%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>
          <td width="12%">
            <div align="center" class="style3"><? echo $nome; ?></div></td>
          <td width="7%" class="style3"><div align="center"><? echo $cidade; ?></div></td>
          <td width="7%" class="style3"><div align="center"><? echo $email; ?></div></td>
          <td width="7%" class="style3"><div align="center"><? echo "$telefone "; ?> <? echo "$celular "; ?></div></td>
          <td width="7%"><div align="center" class="style3"><? echo $cpf; ?></div></td>
          <td><div align="center" class="style3"><? echo $quant_parc; ?></div></td>
          <td><div align="center" class="style3"><? echo $parcela; ?></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $tipo_contrato; ?></span></div></td>
          <td width="6%"><div align="center" class="style3"><? echo $tipo_proposta; ?></div></td>
          <td width="11%"><div align="center" class="style3"><? echo $bco_operacao; ?></div></td>

<? } ?>
</table>
<P>
<p>
<p>
<p>
  <?

			
if($titulo_proposta=="Todas"){
$sql = "SELECT * FROM propostas_veiculos where digitacao = 'A Digitar' order by data_proposta,horaproposta asc";
}
else{
$sql = "SELECT * FROM propostas_veiculos where digitacao = 'A Digitar' and titulo_proposta = '$titulo_proposta' order by data_proposta,horaproposta asc";
}
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$num_proposta_veiculos = $linha[0];

$dataproposta = $linha[1];

$horaproposta = $linha[2];

$mes_ano = $linha[3];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status2 = $linha[6];

$tipo = $linha[7];

$tipo_proposta = $linha[8];

$nome = $linha[9];

$tipo_pessoa = $linha[10];

$data_nasc = $linha[11];

$cpf = $linha[12];

$rg = $linha[13];

$orgao = $linha[14];

$emissao = $linha[15];

$sexo = $linha[16];

$estadocivil = $linha[17];

$nacionalidade = $linha[18];

$quant_dependente = $linha[19];

$pai = $linha[20];

$mae = $linha[21];

$conjuge = $linha[22];

$data_nasc_conjuge = $linha[23];

$endereco = $linha[24];

$numero = $linha[25];

$bairro = $linha[26];

$complemento = $linha[27];

$cidade = $linha[28];

$estado = $linha[29];

$cep = $linha[30];

$correspondencia = $linha[31];

$tipo_residencia = $linha[32];

$valor_aluguel = $linha[33];

$tempo_residencia = $linha[34];

$telefone = $linha[35];

$celular = $linha[36];

$tipo_telefone = $linha[37];

$residencia_anterior = $linha[38];

$bairro_anterior = $linha[39];

$cidade_anterior = $linha[40];

$estado_anterior = $linha[41];

$tempo_residencia_anterior = $linha[42];

$email = $linha[43];

$empresa = $linha[44];

$porte_empresa = $linha[45];

$data_admissao = $linha[46];

$inicio_atividade = $linha[47];

$end_empresa = $linha[48];

$numero_empresa = $linha[49];

$complemento_empresa = $linha[50];

$bairro_empresa = $linha[51];

$cep_empresa = $linha[52];

$cidade_empresa = $linha[53];

$estado_empresa = $linha[54];

$telefone_empresa = $linha[55];

$cpt = $linha[56];

$serie = $linha[57];

$cargo = $linha[58];

$natureza_operacao = $linha[59];

$salario = $linha[60];

$atividade_principal = $linha[61];

$data_constituicao = $linha[62];

$cnpj = $linha[63];

$inscr_est = $linha[64];

$capital_social = $linha[65];

$atividade_anterior = $linha[66];

$data_admissao_anterior = $linha[67];

$data_saida = $linha[68];

$cargo_anterior = $linha[69];

$telefone_empresa_anterior = $linha[70];

$outras_rendas = $linha[71];

$ref_pessoal = $linha[72];

$tel_ref_pessoal = $linha[73];

$ref_pessoal2 = $linha[74];

$tel_ref_pessoal2 = $linha[75];

$ref_comercial = $linha[76];

$tel_ref_comercial = $linha[77];

$ref_banco = $linha[78];

$ref_agencia = $linha[79];

$ref_conta = $linha[80];

$ref_tipo_conta = $linha[81];

$ref_conta_desde = $linha[82];

$cartao_credito = $linha[83];

$automovel = $linha[84];

$valor_automoveis = $linha[85];

$residencia = $linha[86];

$valor_residencia = $linha[87];

$outras_propriedades = $linha[88];

$valor_outras_propriedades = $linha[89];

$veiculo = $linha[90];

$ano_modelo = $linha[91];

$renavam = $linha[92];

$num_portas = $linha[93];

$combustivel = $linha[94];

$placa = $linha[95];

$valor_venda = $linha[96];

$valor_entrada = $linha[97];

$tarifa_cadastro = $linha[98];

$valor_financiar2 = $linha[99];

$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas2 = $linha[102];

$valor_parcelas2 = $linha[103];

$vencto_1_parcela = $linha[104];

$r = $linha[105];

$valor_liberado = $linha[106];

$pagto_serv_terc = $linha[107];

$obs = $linha[108];

$operador = $linha[109];

$cel_operador = $linha[110];

$email_operador = $linha[111];

$estab_pertence = $linha[112];

$cidade_estab_pertence = $linha[113];

$tel_estab_pertence = $linha[114];

$email_estab_pertence = $linha[115];

$operador_alterou = $linha[116];

$operador = $linha[117];

$cel_operador_alterou = $linha[118];

$email_operador_alterou = $linha[119];

$estab_alterou = $linha[120];

$cidade_estab_alterou = $linha[121];

$tel_estab_alterou = $linha[122];

$email_estab_alterou = $linha[123];

$dataalteracao = $linha[124];

$horaalteracao = $linha[125];

$recebido = $linha[126];

$comissao_op = $linha[127];

$meses = $linha[128];

$parecer_credito = $linha[145];

$titulo_proposta = $linha[150];

$digitacao_veiculos = $linha[151];

?>
<table width="100%"  border="0">
  <tr bgcolor="#<? echo "008080"; ?>">
    <td><div align="center"><font size="2">N&ordm; da Proposta </font></div></td>
    <td><div align="center"><font size="2">Data Proposta</font></div></td>
    <td><div align="center"><font size="2">Valor Cr&eacute;dito</font></div></td>
    <td width="7%"><div align="center"><font size="2">Quant  parcelas </font></div></td>
    <td width="8%"><div align="center"><font size="2">Valor parcelas </font></div></td>
    <td><div align="center">Titulo Proposta</div></td>
    <td><div align="center"><font size="2">Status</font></div></td>
  </tr>
  <tr>
    <td width="17%"><form name="form2" method="post" action="visualizacao_de_proposta_de_veiculos_para_digitacao.php">
      <div align="center"> <font size="2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta_veiculos; ?>">
        <span class="style3">
        <input name="digitacao" type="hidden" id="digitacao" value="<? echo "Digitada";  ?>">
        </span>      </font> 
        <? if($digitacao_veiculos=="A Digitar"){ echo "<input type='submit' name='button' id='button' value='$num_proposta_veiculos'>"; } ?></div>
    </form></td>
    <td width="10%"><div align="center"><font size="2"><? echo $dataproposta;?></font><font size="2"><? echo " - $horaproposta";?></font></div></td>
    <td width="8%"><div align="center"><font size="2"><? echo "R$ ".$valor_financiar2;?> </font></div></td>
    <td><div align="center"><font size="2"><? echo $num_parcelas2;?> </font></div></td>
    <td><div align="center"><font size="2"><? echo "R$ ".$valor_parcelas2;?> </font></div></td>
    <td width="11%"><div align="center"><font size="2"><? echo $titulo_proposta;?></font></div></td>
    <td width="15%"><div align="center"><font size="2"><? echo $status2;?> </font></div></td>
    <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
    <? } ?>
</table>
<p>&nbsp;</p>



</body>
</html>
