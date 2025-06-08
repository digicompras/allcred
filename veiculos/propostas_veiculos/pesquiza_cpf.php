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

<title>Edi&ccedil;&atilde;o de produtos</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<?



require '../../conect/conect.php';



			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>



<form name="form1" method="post" action="../index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estabPertence = $linha[46];

$email_estab_pertence = $linha[47];

}





?>

  <input type="submit" name="Submit2" value="Voltar ao menu principal">

</form>

<form action="verifica.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>

      <td>Informe o estabelecimento a que pertence a proposta </td>

      <td><strong><font color="#0000FF"><? echo $estab_pertence; ?></font></strong>
      <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estab_pertence; ?>"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td width="37%">Informe o CPF/CNPJ do proponente <br></td>

      <td width="27%"><input name="cpf" type="text" id="cpf" size="14" maxlength="14"> 

      Ex: 99999999999 </td>

      <td width="36%"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit" value="Avan&ccedil;ar"></td></tr>

  </table>

</form>



<form action="pesquiza_cpf.php" method="post" enctype="multipart/form-data" name="form1">
</form>

<br>

<?



$estabelecimento_proposta = $_POST['estabelecimento_proposta'];



$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_proposta' and operador_atendente = '$nome_op'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$codigo = $linha[0];

$razaosocial = $linha[1];

$nfantasia = $linha[2];

$cnpj = $linha[3];

$inscr_est = $linha[4];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$complemento = $linha[8];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email = $linha[14];

$site = $linha[15];

$proprietario = $linha[16];

$cpf = $linha[17];

$rg = $linha[18];

$operador = $linha[24];

$cel_operador = $linha[25];

$email_operador = $linha[26];

$estabelecimento = $linha[27];

$cidade_estabelecimento = $linha[28];

$tel_estabelecimento = $linha[29];

$email_estabelecimento = $linha[30];

$obs = $linha[19];

$datacadastro = $linha[20];

$horacadastro = $linha[21];

$dataalteracao = $linha[22];

$horaalteracao = $linha[23];

$operador_alterou = $linha[31];

$cel_operador_alterou = $linha[32];

$email_operador_alterou = $linha[33];

$estabelecimento_alterou = $linha[34];

$cidade_estabelecimento_alterou = $linha[35];

$tel_estabelecimento_alterou = $linha[36];

$email_estabelecimento_alterou = $linha[37];

$operador_atendente = $linha[41];

$status = $linha[42];

$usuario_estab = $linha[43];

$senha_estab = $linha[44];

$num_banco = $linha[45];

$agencia = $linha[46];

$conta = $linha[47];



}



?>



<p align="center">

<?

if($estabelecimento_proposta<>""){



echo "Prezado Operador $nome_op <br><br>";



echo "Seu cliente $nfantasia, se encontra $status pelo motivo abaixo<br><br>";



echo "Motivo: $obs";



}



?>

</p>

</body>

</html>

