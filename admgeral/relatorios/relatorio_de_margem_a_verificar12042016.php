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

<title>LISTANDO TODOS OS PEDIDOS DE POSSIBILIDADES DO PERIODO</title>

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
.style2 {
	color: #0000FF;

	font-weight: bold;
}
.style5 {font-size: 18px}
.style5 {font-size: 24px}

-->

</style>
</head>

<?



require '../../conect/conect.php';


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

<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];


}


?>

<?

$nome_operador = $_POST['nome_operador'];

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";



?>








      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <p><br>

  <?
if($nome_operador=="Todos"){

$sql = "SELECT * FROM margem_portabilidade where data_resposta between '$datainicial' and '$datafinal'";

}
else{

$sql = "SELECT * FROM margem_portabilidade where operador = '$nome_operador' and data_resposta between '$datainicial' and '$datafinal'";

}

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?><br>
        
      <?

$sql = "SELECT * FROM allcred limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>
      <table width="70%"  border="0" align="center">
        <tr>
          <td colspan="5"><div align="center"><span class="style2">
          
            Listando todos os pedidos de verificação de margem da empresa <? echo $nfantasia; ?> no periodo:</span> <span class="style2"><? echo "$datainicial ate $datafinal"; ?>
              
            </span></div></td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td width="33%"><div align="center">Total de Clientes que foram verificadas as margens</div></td>
          <td width="13%"><div align="center"><strong><? echo " $registros";?></strong></div></td>
          <td width="14%">&nbsp;</td>
          <td width="18%">&nbsp;</td>
          <td width="22%"><div align="center"></div></td>
        </tr>
      </table>
<p>
        <?

if($nome_operador=="Todos"){

$sql = "SELECT * FROM margem_portabilidade where data_resposta between '$datainicial' and '$datafinal' order by data_resposta,hora_resposta desc";

}
else{

$sql = "SELECT * FROM margem_portabilidade where operador = '$nome_operador' and data_resposta between '$datainicial' and '$datafinal' order by data_resposta,hora_resposta desc";

}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$nome = $linha[1];

$cpf = $linha[2];

$telefone = $linha[3];

$celular = $linha[4];

$operador = $linha[5];

$num_beneficio = $linha[8];

$num_beneficio2 = $linha[9];

$num_beneficio3 = $linha[10];

$num_beneficio4 = $linha[11];

$hora = $linha[15];

$data_da_possibilidade = $linha[17];

$secretaria = $linha[21];

$data_resposta = $linha[27];

$hora_resposta = $linha[28];

$margem = $linha[30];





?>
        
            </p>
<table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td class="style3"><div align="center">Operador</div></td>
          <td class="style3"><div align="center">Secretaria</div></td>

          <td><div align="center" class="style3">Nome</div></td>
          <td class="style3"><div align="center">Data Solicita&ccedil;&atilde;o</div></td>
          <td class="style3"><div align="center">Data Resposta</div></td>
          <td class="style3"><div align="center">Margem</div></td>
          <td><div align="center" class="style3">CPF</div></td>

          <td><div align="center"><span class="style3">N&ordm; Ben<span class="style3">ef&iacute;cio</span></span><span class="style3">1</span></div></td>

          <td><div align="center"><span class="style3">N&ordm; Benef&iacute;cio2</span></div></td>

          <td width="7%"><div align="center" class="style3">Telefone</div></td>

          <td width="7%"><div align="center"><span class="style3">Celular</span></div></td>
  </tr>

		

        <tr>

          <td width="8%" class="style3"><div align="center"><span class="style3"><? echo $operador;?></span></div></td>
          <td width="8%" class="style3"><div align="center"><span class="style3"><? echo $secretaria;?></span></div></td>

          <td width="8%"><div align="center"><span class="style3"><? echo $nome;?></span></div></td>
          <td width="8%" class="style3"><div align="center"><? echo "$data_da_possibilidade $hora";?></div></td>
          <td width="8%" class="style3"><div align="center"><? echo "$data_resposta $hora_resposta";?></div></td>
          <td width="8%" class="style3"><div align="center"><? echo $margem;?></div></td>
          <td width="8%"><div align="center" class="style3"><? echo $cpf;?></div></td>

          <td width="9%"><div align="center"><span class="style3"><? echo $num_beneficio;?></span></div></td>

          <td width="9%"><div align="center"><span class="style3"><? echo $num_beneficio2;?></span></div></td>

          <td><div align="center" class="style3"><? echo "$telefone";?></div></td>

          <td><div align="center"><span class="style3"><? echo $celular;?></span></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>


<? } ?>
        <tr>

          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>

          <td>&nbsp;</td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td>&nbsp;</td>
  </tr>
</table>






<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><span class="style5"><strong><? echo $site; ?></strong></span> <br>
  <? echo $endereco; ?> , <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?> <br>
  <? echo "Telefone / Fax: ". $telefone." "; ?> / <? echo $fax; ?> <br>
  <? echo "E-Mail: ". $email_empresa; ?></p>
</body>

</html>

