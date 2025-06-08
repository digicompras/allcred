<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.





else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../conect/conect.php';

$data_hoje = $_SESSION['data_hoje'];



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>"> 

<? } ?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;





$nome_operador = $linha[1];

//$senha_op = $linha[41];

//$tipo_op = $linha[42];

$estabelecimento_proposta = $linha[44];


?>











  <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td><strong>Ol&aacute;! Seja bem vindo!<br> 

        </strong><strong><font color="#0000FF"><? echo $nome_operador; ?> 

            

</font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td><strong>E-mail:</strong><br>

      <strong><font color="#0000FF"><? echo $linha[20]; ?></font></strong>     </td>

      <td width="15%"><strong>Celular:<font color="#0000FF"><br>

            <? echo $linha[19]; ?>

      </font><font color="#0000FF">      </font></strong></td>

      <td width="23%" valign="top"><div align="center">

        <strong><font color="#0000FF">Confira a data de hoje<br> </font></strong>

        <strong><font color="#0000FF"><? echo $data_hoje; ?></font></strong>

           

        </p>

      </div></td>

    </tr>

    <tr>

      <td width="32%"><strong>Estabelecimento:</strong> <br>

        <strong><font color="#0000FF"><? echo $linha[44]; ?>

        </font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td width="30%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

        <? echo $linha[46]; ?>

            </font></strong></td>

      <td><strong>Cidade: <br>

          <font color="#0000FF"><? echo $linha[45]; ?>          </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

            <? echo $linha[47]; ?>

      </font></strong></td>

    </tr>

<?

if($reg==3){

echo "</tr><tr>";

$reg=0;

}

?>




</table>
<? } ?>

<?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>

  <div align="center"></div>

<table width="100%"  border="0">

  <tr>
    <td><form action="clientes/menu.php" method="post" name="form2">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit6" value="Clientes">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <td width="21%"><form action="propostas_veiculos/informe_operador_para_gerar_relatorio_mensal.php" method="post" name="form5">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">

      <input type="submit" name="Submit523" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">

    </form></td>

    <td width="21%"><form action="propostas_veiculos/pesquiza_cpf.php" method="post" name="form2">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit" value="Capturar Proposta">

    </form></td>

    <td width="50%"><form action="index.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        CPF Cliente
        <input name="cpf" type="text" id="cpf" size="11" maxlength="11">
        ex: 99999999999
        <input type="submit" name="Submit3" value="Acompanhar Proposta">
      </div>
    </form></td>
    <td width="8%">&nbsp;</td>
  </tr>

  <tr>

    <td colspan="4"><div align="center">
      <form name="form4" method="post" action="index.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="nome" type="text" id="nome" value="TODOS" size="50">
        <input type="submit" name="Submit5" value="Buscar">
      </form>
    </div></td>
  </tr>
</table>

<strong></strong>

<div align="center"></div>

  <?

$cpf = $_POST['cpf'];

if(empty($cpf)){

$sql = "select * from propostas_veiculos where cpf = '..............' and operador_atendente = '$nome_operador' order by nome asc";


}

else{

$sql = "select * from propostas_veiculos where cpf = '$cpf' and operador_atendente = '$nome_operador' order by nome asc";

}

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



$num_proposta = $linha[0];

$dataproposta = $linha[1];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status = $linha[6];

$nome = $linha[9];

$cpf = $linha[12];



$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas = $linha[102];

$valor_parcelas = $linha[103];

$r = $linha[105];

$valor_liberado = $linha[106];

$pagto_serv_terceiros = $linha[107];



?>


<table width="100%"  border="0">

  <tr>

    <td colspan="7"><div align="center"></div></td>

    <td width="10%">&nbsp;</td>
  </tr>



  <tr bgcolor="#CCCCCC">

    <td width="9%"><div align="center"><font size="2"><strong>N&ordm; Proposta </strong></font></div></td>

    <td width="7%"><div align="center"><font size="2"><strong>Data</strong></font></div></td>

    <td width="10%"><div align="center"><font size="2"><strong>Status</strong></font></div></td>

    <td width="9%"><div align="center"><strong>Altera&ccedil;&otilde;es</strong></div></td>
    <td width="14%"><div align="center"><font size="2"><strong>Loja</strong></font></div></td>

    <td width="17%"><div align="center"><font size="2"><strong>Operador</strong></font></div></td>

    <td width="24%"><div align="center"><font size="2"><strong>Nome</strong></font></div></td>

    <td><div align="center"><font size="2"><strong>CPF</strong></font></div></td>
  </tr>




  <tr valign="middle">

    <td>

      <form action="propostas_veiculos/imprimir_proposta.php" method="post" name="form3" target="_blank">

        <div align="center"> <font size="1"><? echo $num_proposta; ?>

            <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

            <input type="submit" name="Submit4" value="Visualizar">

        </font></div>
    </form>    </td>

    <td><div align="center"><font size="1"><? echo $dataproposta; ?></font></div></td>

    <td>

      <form action="altera_status.php" method="post" name="form3">

<div align="center"> 
  <p><font size="1">
    
    <? echo $status; ?>
    
    <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
  </font><br><font size="1">
    <? if($status<>"PAGO AO CLIENTE") {echo '<input type="submit" name="Submit42" value="Alterar Status">'; } ?>
  </font></p>
</div>
    </form>    </td>

    <td><div align="center">
      <form action="editar_proposta.php" method="post" name="form3">
        <div align="center"> <font size="1">
          <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
        </font><font size="1"> <? if($status<>"PAGO AO CLIENTE") { echo '<input type="submit" name="Submit42" value="Editar">'; } else {echo "Não permitida";} ?> </font></div>
      </form>
    </div></td>
    <td><div align="center"><font size="1"><? echo $estabelecimento_proposta; ?></font></div></td>

    <td><div align="center"><font size="1"><? echo $operador_atendente; ?></font></div></td>



    <td><div align="center"><font size="1"><? echo $nome; ?></font></div></td>

    <td><div align="center"><font size="1"><? echo $cpf; ?></font></div></td>

    <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

  <? } ?>
</table>

<?

$nome = $_POST['nome'];

if($nome=="TODOS"){

$sql = "select * from propostas_veiculos where operador_atendente = '$nome_operador' order by nome asc";

}

else{

if(empty($nome)){

$sql = "select * from propostas_veiculos where nome = '...' and operador_atendente = '$nome_operador' order by nome asc";



}

else{

$sql = "select * from propostas_veiculos where nome like '$nome%' and operador_atendente = '$nome_operador' order by nome asc";

}}

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



$num_proposta = $linha[0];

$dataproposta = $linha[1];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status = $linha[6];

$nome = $linha[9];

$cpf = $linha[12];



$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas = $linha[102];

$valor_parcelas = $linha[103];

$r = $linha[105];

$valor_liberado = $linha[106];

$pagto_serv_terceiros = $linha[107];



?>
  <table width="100%"  border="0">
  <tr>
    <td colspan="7"><div align="center"></div></td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="9%"><div align="center"><font size="2"><strong>N&ordm; Proposta </strong></font></div></td>
    <td width="7%"><div align="center"><font size="2"><strong>Data</strong></font></div></td>
    <td width="10%"><div align="center"><font size="2"><strong>Status</strong></font></div></td>
    <td width="9%"><div align="center"><strong>Altera&ccedil;&otilde;es</strong></div></td>
    <td width="14%"><div align="center"><font size="2"><strong>Loja</strong></font></div></td>
    <td width="17%"><div align="center"><font size="2"><strong>Operador</strong></font></div></td>
    <td width="24%"><div align="center"><font size="2"><strong>Nome</strong></font></div></td>
    <td><div align="center"><font size="2"><strong>CPF</strong></font></div></td>
  </tr>
  <tr valign="middle">
    <td><form action="propostas_veiculos/imprimir_proposta.php" method="post" name="form3" target="_blank">
      <div align="center"> <font size="1"><? echo $num_proposta; ?>
              <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
              <input type="submit" name="Submit2" value="Visualizar">
      </font></div>
    </form></td>
    <td><div align="center"><font size="1"><? echo $dataproposta; ?></font></div></td>
    <td><form action="altera_status.php" method="post" name="form3">
      <div align="center">
        <p><font size="1"> <? echo $status; ?>
              <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
          </font><br>
          <font size="1">
          <? if($status<>"PAGO AO CLIENTE") {echo '<input type="submit" name="Submit42" value="Alterar Status">'; } ?>
          </font></p>
      </div>
    </form></td>
    <td><div align="center">
      <form action="editar_proposta.php" method="post" name="form3">
        <div align="center"> <font size="1">
          <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
        </font><font size="1"> <? if($status<>"PAGO AO CLIENTE") {echo '<input type="submit" name="Submit42" value="Editar">'; } else {echo "Não permitida";} ?> </font></div>
      </form>
    </div></td>
    <td><div align="center"><font size="1"><? echo $estabelecimento_proposta; ?></font></div></td>
    <td><div align="center"><font size="1"><? echo $operador_atendente; ?></font></div></td>
    <td><div align="center"><font size="1"><? echo $nome; ?></font></div></td>
    <td><div align="center"><font size="1"><? echo $cpf; ?></font></div></td>
    <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
    <? } ?>
</table>
<p>&nbsp;</p>
<p align="center">

</p>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>