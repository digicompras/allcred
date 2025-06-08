<?

require '../conect/conect.php';

?>

<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	background-attachment: fixed;

}
-->
</style></head>
<script language="javascript">
function foco(usuario)
{
document.getElementById(usuario).focus();
}
</script>

<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../background/<? echo "$background"; ?>"><?

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");


$instrucao = $_GET['instrucao'];

?>
<?
$sql = "select * from hora_encerramento_admin where dia = '$hoje' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$dia = $linha[1];
$horas_inicio = $linha[2];
$minutos_inicio = $linha[3];
$segundos_inicio = $linha[4];
$horas_termino = $linha[5];
$minutos_termino = $linha[6];
$segundos_termino = $linha[7];

}
//$ajuste_horario = 2;
//$horacerta = date('H')+2;
//$hora_atual = "0".$horacerta.date(':i:s');
$date = date('d-m-Y');
?>
<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>
<?
$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="2%"></td>
    <td width="13%"></td>
    <td width="58%" valign="baseline" background="../imagens/fundocelulas2.png"><div align="right">
      <form action="verifica.php" method="post" name="form1" id="form1">
        <script language='JavaScript' type='text/javascript'>
document.itens.usuario.focus()
          </script>
        <strong>
          <? $data = date('d/m/Y');
$date = date('Y-m-d');
 //echo date($data, strtotime(" -2 days ",strtotime('20-07-2011'))); ?>
          <?
$ip = $_SERVER['REMOTE_ADDR'];

$user= "select * from ips_admin where ip = '$ip' limit 1";
$result=mysql_query($user);
while($linha=mysql_fetch_row($result)) {


$ip_cadastrado = $linha[1];
$estab_pertence = $linha[2];
}



if(mysql_num_rows($result)==1){


echo "<form name='form1' method='post' action='verifica.php' target='_top'>";  
if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Login"; } 
if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='usuario' type='text' id='usuario'>";} 
if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"Senha"; }
if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='senha' type='password' id='senha'>"; }
echo "<input name='data_hoje' type='hidden' id='data_hoje' value='$date'>"; 
if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input class='class01' type='submit' name='Submit' value='Ok'>"; } 
echo "</form>"; 

}
else {
echo "ATEN&Ccedil;&Atilde;O!!!...O IP $ip N&Atilde;O AUTORIZADO!";
}

?>
        </strong>
       
      </form>
    </div></td>
    <td width="25%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center">
      <?
    $sql = "SELECT * FROM logo";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$largura = $linha['2'];
$altura = $linha['3'];

echo "<img src='../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'>";

 } 
 ?>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>  

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>