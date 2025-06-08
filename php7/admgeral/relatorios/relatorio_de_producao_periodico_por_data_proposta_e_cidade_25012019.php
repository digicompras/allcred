<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



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

.style2 {

	color: #0000FF;

	font-weight: bold;

}

.style3 {font-size: 10px}

.style4 {

	font-size: 16px;

	font-weight: bold;

}
.style22 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}

-->

</style>

</head>

<?



require '../../conect/conect.php';





	  

//$nome_operador = $_POST['nome_operador'];

$cidade_solicitada = $_POST['cidade'];
if($cidade_solicitada=="Todas"){

$cidade = "";

}
else{

$cidade = " and cidade = '$cidade_solicitada'";

}


$bco_da_operacao = $_POST['bco_operacao'];
if($bco_da_operacao=="Todos"){

$bco_operacao = "";

}
else{

$bco_operacao = " and bco_operacao = '$bco_da_operacao'";

}


$status_solicitado = $_POST['status'];
if($status_solicitado=="TODOS"){

$status = "";

}
else{

$status = " and status = '$status_solicitado'";

}


$tipo_solicitado = $_POST['tipo'];
if($tipo_solicitado=="Todos"){

$tipo = "";

}
else{

$tipo = " and tipo = '$tipo_solicitado'";

}


$tipo_da_proposta = $_POST['tipo_proposta'];
if($tipo_da_proposta=="Todas"){

$tipo_proposta = "";

}
else{

$tipo_proposta = " and tipo_proposta = '$tipo_da_proposta'";

}


$parcela_inicio = $_POST['parcela_inicial'];

if(empty($parcela_inicio)){

$parcela_inicial = "";

}
else{

$parcela_inicial = " and parcela between $parcela_inicio";

}

$parcela_fim = $_POST['parcela_final'];

if(empty($parcela_fim)){

$parcela_final = "";

}
else{

$parcela_final = " and $parcela_fim";

}


$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];


$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";





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

      <form name="form1" method="post" action="menu.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio por data de propostas e cidade"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="Submit2" value="Voltar">

</form>

      <br>
      
<?

$sql = "SELECT * FROM propostas where data_proposta between '$data_inicial'and '$data_final' $tipo_proposta $status $cidade $bco_operacao $tipo $parcela_inicial $parcela_final group by nome order by parcela desc";
$res = mysql_query($sql);
$total_de_propostas_encontradas = mysql_num_rows($res);


?>


       <? echo "Total de propostas encontradas -->> $total_de_propostas_encontradas <br>
	  Período selecionado de $dia_inicial-$mes_inicial-$ano_inicial até $dia_final-$mes_final-$ano_final Tipo de proposta: $tipo_da_proposta Cidade: $cidade_solicitada Banco de operação: $bco_da_operacao Perfil: $tipo_solicitado Status: $status_solicitado com faixa de parcelas de $parcela_inicio até $parcela_fim";?><br>

<table width="100%"  border="0">

              <tr>

                <td width="35%" valign="middle"><div align="right"></div></td>

				<td width="38%" valign="middle"><form action="exporta_excel_propostas_por_data_e_cidade.php" method="post" name="form3" target="_blank">
				  <span class="style22">
				    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
			      </span>
				  <input name="cidade" type="hidden" id="cidade" value="<? echo $cidade_solicitada; ?>">
				  <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo $bco_da_operacao; ?>">
				  <input name="status" type="hidden" id="status" value="<? echo $status_solicitado; ?>">
				<input name="tipo" type="hidden" id="tipo" value="<? echo $tipo_solicitado; ?>">
					<input name="tipo_proposta" type="hidden" id="tipo_proposta" value="<? echo $tipo_da_proposta; ?>">
					<input name="parcela_inicial" type="hidden" id="parcela_inicial" value="<? echo $parcela_inicio; ?>">
					<input name="parcela_final" type="hidden" id="parcela_final" value="<? echo $parcela_fim; ?>">
					<input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
					<input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
					<input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
					<input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
					<input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
					<input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
				  <input type="submit" name="button" id="button" value="Exportar para Excel">
			    </form></td>
				<td width="27%">&nbsp;</td>

              </tr>

</table>            

      <?
//if(($cidade=="Todas") && ($bco_operacao=="Todos")){
	
//$sql = "SELECT * FROM propostas where status = '$status' and tipo_proposta = '$tipo_proposta' and data_proposta between '$data_inicial'and '$data_final' and tipo = '$tipo' group by nome order by parcela desc";

//}
//else{	


//if($cidade=="Todas"){
	
//$sql = "SELECT * FROM propostas where status = '$status' and tipo_proposta = '$tipo_proposta' and data_proposta between '$data_inicial'and '$data_final' and bco_operacao = '$bco_operacao' and tipo = '$tipo' group by nome order by parcela desc";
	
//}
//else{

//if($bco_operacao=="Todos"){
	
//$sql = "SELECT * FROM propostas where status = '$status' and cidade = '$cidade' and tipo_proposta = '$tipo_proposta' and data_proposta between '$data_inicial'and '$data_final' and tipo = '$tipo' group by nome order by parcela desc";
	
//}
//else{

//if($tipo_proposta=="Todas"){
	
//$sql = "SELECT * FROM propostas where status = '$status' and cidade = '$cidade' and bco_operacao = '$bco_operacao' data_proposta between '$data_inicial'and '$data_final' and tipo = '$tipo' group by nome order by parcela desc";
	
//}
//else{

	

//$sql = "SELECT * FROM propostas where status = '$status' and cidade = '$cidade' and tipo_proposta = '$tipo_proposta' and data_proposta between '$data_inicial'and '$data_final' and bco_operacao = '$bco_operacao' and tipo = '$tipo' group by nome order by parcela desc";

//}

//}

//}


//}

$sql = "SELECT * FROM propostas where data_proposta between '$data_inicial'and '$data_final' $tipo_proposta $status $cidade $bco_operacao $tipo $parcela_inicial $parcela_final group by nome order by parcela desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$num_proposta = $linha[0];


$tipo = $linha[2];

$nome_cli = $linha[4];
$cpf_cli = $linha[7];

$endereco = $linha[14];
$numero = $linha[15];
$bairro = $linha[16];


$parcela_cli = $linha[27];

$comissao_op = $linha[101];

$cidade = $linha[18];
$estado = $linha[19];
$cep = $linha[20];

$telefone = $linha[21];
$celular = $linha[22];
	
$email_cli = $linha[23];

$status = $linha[51];

$tipo_proposta = $linha[83];

$bco_operacao = $linha[86];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];

$meta = $linha[171];

?>

      <table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">
			<td><div align="center" class="style3">Proposta</div></td>

          <td><div align="center" class="style3">Endereco/Bairro </div></td>

          <td><div align="center"><span class="style3">Cidade/Cep</span></div></td>

          <td class="style3"><div align="center">Cliente</div></td>
          <td align="center" class="style3">E-Mail</td>
		  <td class="style3"><div align="center">Perfil</div></td>
          <td class="style3"><div align="center">CPF</div></td>
          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>

          <td><div align="center" class="style3">Telefones</div></td>
          <td class="style3"><div align="center">Tipo Proposta</div></td>
          <td><div align="center" class="style3">Status</div></td>

          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
        </tr>

		

        <tr>
          <td width="6%" align="center"><form name="form2" method="post" action="">
            <div align="center" class="style3">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo "$num_proposta"; ?>">
              <? echo "$num_proposta"; ?> </div>
          </form></td>

          <td width="6%">               <form name="form2" method="post" action=""><div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo "$num_proposta"; ?>">

            <? echo "End: $endereco, Nº: $numero  - Bairro: $bairro"; ?>                

          </div></form></td>

          <td width="7%"><div align="center"><span class="style3"><? echo "$cidade Cep: $cep"; ?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $nome_cli; ?></span></div></td>
          <td width="7%" align="center"><span class="style3"><? echo $email_cli; ?></span></td>
		  <td width="7%"><div align="center"><span class="style3"><? echo $tipo; ?></span></div></td>
          <td width="7%"><div align="center">
            <form action="../propostas/pesquiza_propostas_por_cpf.php" method="post" name="form3" target="_blank">
              <span class="style3">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <? echo $cpf_cli; ?>
              <input name="cpf" type="hidden" id="cpf" value="<? echo "$cpf_cli"; ?>">
              </span>
            </form>
          </div></td>
          <td><div align="center" class="style3"><? echo $parcela_cli;?></div></td>

          <td width="7%"><div align="center" class="style3"><? echo "$telefone / $celular"; ?></div></td>
          <td width="8%" class="style3"><div align="center"><? echo "$tipo_proposta"; ?></div></td>
          <td width="8%"><div align="center"><span class="style3"><? echo $status; ?></span></div></td>

          <td width="8%"><div align="center" class="style3"><? echo $bco_operacao; ?></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

<? } ?>
        <tr>
          <td align="center">&nbsp;</td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>
          <td>&nbsp;</td>

          <td class="style3"><div align="center"></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
</table>



<p>&nbsp;</p>







</body>

</html>

