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

$sql = "SELECT * FROM propostas where tipo_proposta <> '$tipo_proposta' and data_proposta <='2015-05-11'";
$res = mysql_query($sql);

$registros_consignado = mysql_num_rows($res);

}
else{

$sql = "SELECT * FROM propostas where tipo_proposta <> '$tipo_proposta' and status = '$status' and data_proposta <='2015-05-11'";
$res = mysql_query($sql);

$registros_consignado = mysql_num_rows($res);

}

echo $registros_consignado;
?>
          </div></td>
          <td width="14%">&nbsp;</td>
        </tr>
</table>

<br>


      Per&iacute;odo de <? echo "(Anterior 12-05-2015 ) Tipo de Proposta $tipo_proposta Status $status";?><br>
      <?
if($status=="TODOS"){

$sql = "SELECT * FROM propostas where tipo_proposta <> '$tipo_proposta' and data_proposta <='2015-05-14' order by num_proposta";


}
else{



$sql = "SELECT * FROM propostas where tipo_proposta <> '$tipo_proposta' and status = '$status' and data_proposta <='2015-05-14' order by num_proposta";

}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];

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

      <table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">N&ordm; Proposta </div></td>

          <td><div align="center" class="style3">Cliente</div></td>

          <td><div align="center" class="style3">CPF</div></td>

          <td width="10%"><div align="center" class="style3">Telefone</div></td>

          <td width="11%"><div align="center" class="style3">Celular</div></td>

          <td><div align="center" class="style3">E-Mail</div></td>
          <td><div align="center">Endere&ccedil;o</div></td>
        </tr>

		

        <tr>

          <td width="10%">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php"><div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

            <? echo $num_proposta; ?>                

          </div></form></td>

          <td width="22%">

            <div align="center" class="style3"><? echo $nome; ?></div></td>

          <td width="13%"><div align="center" class="style3"><? echo $cpf; ?></div></td>

          <td><div align="center" class="style3"><? echo $telefone; ?></div></td>

          <td><div align="center" class="style3"><? echo $celular; ?></div></td>

          <td width="34%"><div align="center" class="style3"><? echo $email; ?></div></td>
          <td width="34%"><div align="center"><span class="style3"><? echo "$endereco $numero, $complemento, $bairro, $cidade - $estado , $cep"; ?></span></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

<? } ?>
        <tr>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>
          <td>&nbsp;</td>
        <tr>

          <td><span class="style3">Total</span></td>

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

