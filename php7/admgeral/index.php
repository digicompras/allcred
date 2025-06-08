<?php



require '../conect/conect.php';





 
$solicitacao = $_POST['solicitacao'];
 
if($solicitacao=="confirmaralteracaodesenha"){
$codigo_admgeral = $_POST['codigo_admgeral'];
$usuario = $_POST['usuario_admgeral'];
$senha = $_POST['senha_admgeral'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`admgeral` set `usuario` = '$usuario',`senha` = '$senha' where `admgeral`. `codigo` = '$codigo_admgeral' limit 1 ";
}

mysql_query($comando,$conexao);




} 
 
 ?>



<html>

<head>

<title>Autentica&ccedil;&atilde;o</title>

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

</style>
</head>

<?php
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../background/<?php echo "$background"; ?>">
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
            <?php $data = date('d/m/Y');
$date = date('Y-m-d');
 //echo date($data, strtotime(" -2 days ",strtotime('20-07-2011'))); ?>
            Login</strong>: 
            <input class='class01' name="usuario" type="text" id="usuario" />
            <strong>Senha:</strong> 
            <input class='class01' name="senha" type="password" id="senha2" />
            <input class='class01' type="submit" name="Submit" value="Ok" />
      </form>
    </div></td>
    <td width="25%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center">
    <?php
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
</body>

</html>

<?php

mysql_close($conexao);

?>