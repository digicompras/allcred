<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

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





	  

$nome_operador = $_POST['nome_operador'];

$mes_ano = $_POST['mes_ano'];

$tipo = $_POST['tipo'];

$tipo_proposta = $_POST['tipo_proposta'];

$tabela = $_POST['tabela'];





//$dia_inicial = $_POST['dia_inicial'];

//$mes_inicial = $_POST['mes_inicial'];

//$ano_inicial = $_POST['ano_inicial'];



//$dia_final = $_POST['dia_final'];

//$mes_final = $_POST['mes_final'];

//$ano_final = $_POST['ano_final'];



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

      <form name="form1" method="post" action="informe_operador_para_gerar_relatorio_mensal.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit2" value="Voltar">

</form>

      <table width="100%"  border="0">

        <tr>

          <td colspan="6"><div align="left"><span class="style2">

            <?

$nome_operador = $_POST['nome_operador'];

			

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$nome_operador = $linha[1];







?>

          Listando todas as propostas do operador:</span> <span class="style2"><? echo $nome_operador; ?>

          <? } ?>

          </span></div></td>

        </tr>

        <tr>

          <td colspan="6">&nbsp;</td>

        </tr>

        <tr>

          <td width="8%">&nbsp;</td>

          <td width="14%"><div align="center">Total 

  



   Meta

  

        </div></td>

          <td width="18%"><div align="center">

            <strong>

            <?

$sql = "select sum(meta) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo $valor_total."%";

?>

            </strong>          </div></td>

          <td width="24%"><div align="right">Total L&iacute;quido de Opera&ccedil;&otilde;es </div></td>

          <td width="22%">

            <div align="center"><strong>

            <?

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

            </strong> </div></td>

          <td width="14%">&nbsp;</td>

        </tr>

        <tr>

          <td>&nbsp;</td>

          <td><div align="center">Total Premia&ccedil;&atilde;o </div></td>

          <td><div align="center">

            <strong>

            <?

$sql = "select sum(comissao_op) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

            </strong>          </div></td>

          <td><div align="right">Valor bruto de opera&ccedil;&atilde;o </div></td>

          <td class="style4">            <div align="center"><strong>

          <strong>

          <?

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

          </strong> </strong> </div></td>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td><div align="right">Valor liquido cliente </div></td>

          <td><div align="center"><strong>

            <?

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_liquido_cliente = $linha['total'];



echo "R$ ".$valor_liquido_cliente;

?>

          </strong></div></td>

          <td>&nbsp;</td>

        </tr>

</table>

      <br>

	  <?

	  $nome_operador = $_POST['nome_operador'];

$data_inicial = $_POST['data_inicial'];

$data_final = $_POST['data_final'];



	  ?>

      Per&iacute;odo de <? echo $mes_ano;?><br>

      <?



$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";



$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$comissao_op = $linha[101];

$tabela = $linha[109];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];

$meta = $linha[171];


?>

<table width="120%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">N&ordm; Proposta </div></td>

          <td><div align="center" class="style3">Valor Solicitado </div></td>

          <td><div align="center" class="style3">Valor liq cliente </div></td>

          <td><div align="center"><span class="style3">Valor Total </span></div></td>

          <td><div align="center"><span class="style3">Tabela</span></div></td>

          <td><div align="center" class="style3">Cliente</div></td>

          <td><div align="center" class="style3">CPF</div></td>

          <td width="2%"><div align="center" class="style3">Prazo</div></td>

          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>

          <td><div align="center" class="style3">Tipo de Proposta </div></td>

          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>

          <td><div align="center" class="style3">Status</div></td>

          <td><div align="center" class="style3"> Meta </div></td>

          <td><div align="center" class="style3">Premia&ccedil;&atilde;o</div></td>

        </tr>

		

        <tr>

          <td width="6%">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php"><div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

            <? printf("$linha[0]"); ?>                

          </div></form></td>

          <td width="8%"><div align="center" class="style3"><? printf("R$ $linha[25]");?> </div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>

          <td width="15%">

            <div align="center" class="style3"><? printf("$linha[4]");?> </div></td>

          <td width="9%"><div align="center" class="style3"><? printf("$linha[7]");?> </div></td>

          <td><div align="center" class="style3"><? printf("$linha[26]"); ?> </div></td>

          <td><div align="center" class="style3"><? printf("$linha[27]"); ?> </div></td>

          <td width="7%"><div align="center" class="style3"><? printf("$linha[83]"); ?> </div></td>

          <td width="8%"><div align="center" class="style3"><? printf("$linha[86]"); ?></div></td>

          <td width="8%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>

          <td width="4%"><div align="center" class="style3"><? echo "$meta%";?></div></td>

          <td width="7%"><div align="center" class="style3"><? echo "R$ ".$comissao_op;?></div></td>

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

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

        <tr>

          <td><span class="style3">Total</span></td>

          <td><div align="center" class="style3">

            <strong>

              <?

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

            </strong>          </div></td>

          <td><div align="center"><span class="style3"><strong>

            <?

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_liquido_cliente = $linha['total'];



echo "R$ ".$valor_liquido_cliente;

?>

          </strong></span></div></td>

          <td><div align="center"><span class="style3"><strong>

            <?

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

          </strong></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="right" class="style3">Total Meta </div></td>

          <td><div align="center" class="style3">

            <strong>

            <?

$sql = "select sum(meta) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'APROVADO E PAGO' and tipo = '$tipo' and tipo_proposta = '$tipo_proposta' and tabela = '$tabela' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo $valor_total."%";

?>

            </strong>          </div></td>

          <td><span class="style3"></span></td>

</table>



      <p>&nbsp;</p>







</body>

</html>

