<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Edi&ccedil;&atilde;o de produtos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 16px;
}
.style2 {font-size: 18px; color: #0000FF;}
-->
</style>
</head>

<body>
<form action="../menu.php" method="post" name="form1" target="_top">
  <input type="submit" name="Submit" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p class="style1">Inseir cor pela 1&ordm; vez da barra lateral esquerda! insira o codigo hexadecimal ex: 0000ff.<br>
   Escolha na tabela abaixo, copie, cole e clique em atualizar. 
<form action="grava_cor_b_lat_esq.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td width="27%">Cor da barra lateral esquerda </td>
      <td width="24%"><input name="barra_lat_esq" type="text" id="barra_lat_esq"></td>
      <td width="49%"><input type="submit" name="Submit2" value="Atualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
