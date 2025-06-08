<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMINISTRAÇÃO GERAL</title>
</head>

<frameset rows="111,*" cols="*" frameborder="yes" border="2" framespacing="0">
  <frame src="cabecalho.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="268,*" framespacing="0" frameborder="no" border="0">
    <frame src="menu_lateral_esquerda.php" name="leftFrame" scrolling="yes" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="inicial_admgeral.php" name="navegacao" id="navegacao" title="navegacao" />
  </frameset>
</frameset>
<noframes><body>
</body>
</noframes></html>
