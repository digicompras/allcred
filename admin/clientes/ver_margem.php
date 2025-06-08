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

<title>Untitled Document</title>

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

<?

// dados do cliente

$cod_cli = $_POST['cod_cli'];
$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`clientes` set `codigo` = '$cod_cli',`tem_margem` = 'A VERIFICAR' where `clientes`. `codigo` = '$cod_cli' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao solicitar verificação de margem desse cadastro <br><br>");



?>

<?

// dados do cliente

$status = $_POST['status'];


$nome = $_POST['nome'];

$cpf = $_POST['cpf'];

$resposta = $_POST['resposta'];

$telefone = $_POST['telefone'];

$celular = $_POST['celular'];

$perfil = $_POST['perfil'];
$secretaria = $_POST['secretaria'];
$rg = $_POST['rg'];
$mae = $_POST['mae'];
$data_nasc = $_POST['data_nasc'];
$senha_servidor = $_POST['senha_servidor'];
$fazer_portabilidade = $_POST['fazer_portabilidade'];

//dados do operador



$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];




$num_beneficio = $_POST['num_beneficio'];

$num_beneficio2 = $_POST['num_beneficio2'];

$num_beneficio3 = $_POST['num_beneficio3'];

$num_beneficio4 = $_POST['num_beneficio4'];


$datacadastro = $_POST['datacadastro'];

$horacadastro = $_POST['horacadastro'];



// a função explode é usada para separar uma string em uma matriz de strings usando um delimitador

$hora_possibilidade = date('H:i:s');

$data_possibilidade = date('d-m-Y');


$datapossibilidade = $data_possibilidade;

$datapossibilidade2 = explode("-", $data_possibilidade);



$dia = $datapossibilidade2[0];

$mes = $datapossibilidade2[1];

$ano = $datapossibilidade2[2];

$data_da_possibilidade = "$ano-$mes-$dia";


?>

<?

$comando = "insert into margem_portabilidade(nome,cpf,telefone,celular,operador,cel_operador,email_operador,num_beneficio,num_beneficio2,num_beneficio3,num_beneficio4,dia,mes,ano,hora,resposta,data_da_possibilidade,cod_cli,status,perfil,secretaria,rg,mae,data_nasc,senha_servidor,fazer_portabilidade) values('$nome','$cpf','$telefone','$celular','$operador','$cel_operador','$email_operador','$num_beneficio','$num_beneficio2','$num_beneficio3','$num_beneficio4','$dia','$mes','$ano','$horacadastro','$resposta','$data_da_possibilidade','$cod_cli','$status','$perfil','$secretaria','$rg','$mae','$data_nasc','$senha_servidor','$fazer_portabilidade')";



mysql_query($comando,$conexao) or die("Erro ao gravar pedido de Margem/Portabilidade!");








$sql = "SELECT * FROM margem_portabilidade where cod_cli = '$cod_cli' and status = 'A VERIFICAR' order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$num_pedido_ver_margem = $linha[0];


}




?>







<p>&nbsp;</p>

<table width="100%" border="1">
  <tr>
    <td width="12%"><form name="form1" method="post" action="menu.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit2" value="Voltar">
    </form></td>
    <td width="21%"><form name="form2" method="post" action="editar_cliente.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input type="submit" name="Submit" value="Continuar editando cliente">
    </form></td>
    <td width="28%"><div align="center"><? echo "Pedido de verificação de margem Nº $num_pedido_ver_margem efetuado com sucesso!!!..."; ?></div></td>
    <td width="39%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>