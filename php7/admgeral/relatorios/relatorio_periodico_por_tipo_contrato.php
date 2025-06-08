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











$tipo_contrato = $_POST['tipo_contrato'];



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

        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio periodico de tipo de contrato"; ?>">

        <input type="hidden" name="comissao" id="comissao">

        <input type="submit" name="Submit2" value="Voltar">



</form>



      <br>





      Período selecionado de <? echo "$dia_inicial-$mes_inicial-$ano_inicial até $dia_final-$mes_final-$ano_final tipo do contrato $tipo_contrato";?><br>



<table width="100%"  border="0">



              <tr>



                <td width="35%" valign="middle"><div align="right"></div></td>



				<td width="38%" valign="middle"><div align="center">

				  <form action="exporta_excel_propostas_atribuidas.php" method="post" name="form3" target="_blank">

                    <span class="style22">

                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

                    </span>

                    <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">

                    <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">

                    <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">

                    <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">

                    <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">

                    <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">

                    <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">

				  </form>

				</div></td>

				<td width="27%">&nbsp;</td>



              </tr>



</table>            





      <table width="100%"  border="0">



        <tr bgcolor="#<? echo $cor ?>">



          <td><div align="center" class="style3">N&ordm; Proposta</div></td>



          <td><div align="center"><span class="style3">Data Proposta</span></div></td>



          <td class="style3"><div align="center">Cliente</div></td>

		  <td class="style3"><div align="center">CPF</div></td>

          <td class="style3"><div align="center">Telefones</div></td>

          <td width="5%"><div align="center" class="style3">email</div></td>



          <td><div align="center" class="style3">Operador</div></td>

          <td class="style3"><div align="center"></div></td>

          <td><div align="center" class="style3"></div></td>



          <td><div align="center" class="style3"></div></td>

        </tr>



		

      <?

if($tipo_contrato=="Todos"){

	

$sql2 = "SELECT * FROM propostas where data_proposta between '$data_inicial' and '$data_final' order by nome asc";



}

else{



$sql2 = "SELECT * FROM propostas where data_proposta between '$data_inicial' and '$data_final' and tipo_contrato = '$tipo_contrato' order by nome asc";



}



$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {



$num_proposta = $linha[0];



$nome_operador = $linha[1];



$nome_cli = $linha[4];



$cpf_cli = $linha[7];



$telefone = $linha[21];



$celular = $linha[22];



$email_cli = $linha[23];



$valor_credito = $linha[25];



$bco_operacao = $linha[86];



$valor_a_receber = $linha[87];



$comissao_op = $linha[101];



$tabela = $linha[109];



$valor_total = $linha[113];



$valor_liquido_cliente = $linha[115];



$data_proposta = $linha[152];





$meta = $linha[171];







?>



        <tr>



          <td width="6%">               <form action="../propostas/imprimir_proposta.php" method="post" name="form2" target="_blank">

            <div align="center" class="style3">



              <?



$usuario = $_SESSION['usuario'];



$senha = $_SESSION['senha'];



?>



              



  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

            <? echo "$num_proposta"; ?></div>

          </form></td>



          <td width="7%"><div align="center"><span class="style3"><? echo "$data_proposta"; ?></span></div></td>



          <td width="7%"><div align="center"><span class="style3"><? echo $nome_cli; ?></span></div></td>

		  <td width="7%"><div align="center"><span class="style3"><? echo $cpf_cli; ?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo "$telefone / $celular"; ?></span></div></td>

          <td><div align="center" class="style3"><? echo $email_cli;?></div></td>



          <td width="7%"><div align="center" class="style3"><? echo "$nome_operador"; ?></div></td>

          <td width="8%" class="style3"><div align="center"></div></td>

          <td width="8%"><div align="center"></div></td>



          <td width="8%"><div align="center" class="style3"></div></td>

</tr>



<? } ?>



        <tr>



          <td><span class="style3"></span></td>



          <td><div align="center"><span class="style3"></span></div></td>



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



