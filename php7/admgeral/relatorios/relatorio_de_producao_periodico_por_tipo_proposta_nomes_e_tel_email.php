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

$tipo_proposta = $_POST['tipo_proposta'];

//$campanha_filtro = $_POST['campanha'];

$status = $_POST['status'];

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";


$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

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
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio por tipo de propostas e status"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="Submit2" value="Voltar">

</form>

<table width="100%"  border="0">


        <tr>

          <td width="8%">&nbsp;</td>
          <td width="24%"><div align="right">Total de propostas encontradas</div></td>
          <td width="22%"><div align="center">
            <?	
if($status=="TODOS"){

$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta'";
$res = mysql_query($sql);

$registros_consignado = mysql_num_rows($res);

}
else{

$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta' and status = '$status'";
$res = mysql_query($sql);

$registros_consignado = mysql_num_rows($res);

}

echo $registros_consignado;
?>
          </div></td>
          <td width="14%">&nbsp;</td>
        </tr>
</table>

<p><br>
<? echo " Tipo de Proposta $tipo_proposta Status $status";?></p>
<table width="100%"  border="0">
  <tr>
    <td width="35%" valign="middle"><div align="right"></div></td>
    <td width="38%" valign="middle"><form action="exporta_propostasfeitas_atraves_do_site_nome_tel_email.php" method="post" name="form3" target="_blank">
      <span class="style22">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="<? echo $tipo_proposta; ?>">
      <input name="status" type="hidden" id="status" value="<? echo $status; ?>">
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
if($status=="TODOS"){

$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta' order by num_proposta";


}
else{



$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta' and status = '$status' order by num_proposta";

}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];
	
$nome_operador = $linha[1];

$nome = $linha[4];

$cpf = $linha[7];

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




?>
</p>
<table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">N&ordm; Proposta </div></td>
          <td>Operador</td>
          <td><div align="center" class="style3">Cliente</div></td>

          <td><div align="center" class="style3">CPF</div></td>

          <td width="7%"><div align="center" class="style3">Telefone</div></td>

          <td width="8%"><div align="center" class="style3">Celular</div></td>

          <td><div align="center" class="style3">E-Mail</div></td>
          <td><div align="center">Endere&ccedil;o</div></td>
        </tr>

		

        <tr>

          <td width="7%">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php"><div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

            <? echo $num_proposta; ?>                

          </div></form></td>
          <td width="7%"><span class="style3"><? echo "$nome_operador"; ?></span></td>
          <td width="16%">

            <div align="center" class="style3"><? echo $nome; ?></div></td>

          <td width="9%"><div align="center" class="style3"><? echo $cpf; ?></div></td>

          <td><div align="center" class="style3"><? echo $telefone; ?></div></td>

          <td><div align="center" class="style3"><? echo $celular; ?></div></td>

          <td width="17%"><div align="center" class="style3"><? echo $email; ?></div></td>
          <td width="36%"><div align="center"><span class="style3"><? echo "$endereco $numero, $complemento, $bairro, $cidade - $estado , $cep"; ?></span></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

<? } ?>
        <tr>

          <td><span class="style3"></span></td>
          <td>&nbsp;</td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>
          <td>&nbsp;</td>
        <tr>

          <td><span class="style3">Total</span></td>
          <td>&nbsp;</td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>
          <td>&nbsp;</td>
</table>



<p>&nbsp;</p>







</body>

</html>

