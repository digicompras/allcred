<?



require '../conect/conect.php';
include '../css_menus/modal.css';


$hoje = date('Y-m-d');
$mes_atual = date('m');
$mes_anterior = bcsub($mes_atual,1);

$ano_atual = date('Y');
$ano_anterior = bcsub($ano_atual,1);

$data_hoje = $_SESSION['data_hoje'];

$data2 = explode("-", $hoje);

$dia_hoje = $data2[2];

$mes_hoje = $data2[1];

$ano_hoje = $data2[0];

$data_hoje_brasil = "$dia_hoje-$mes_hoje-$ano_hoje";

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$dia_de_hoje = strftime("%A");

$sql = "select * from hora_encerramento_admin where dia = '$dia_de_hoje' limit 1";
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

$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";

$ip = $_SERVER['REMOTE_ADDR'];

$user= "select * from ips_admin where ip = '$ip' limit 1";
$result=mysql_query($user);
while($linha=mysql_fetch_row($result)) {


$ip_cadastrado = $linha[1];
$estab_pertence = $linha[2];
}

 
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
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #000000}
.style3 {color: #000000; font-weight: bold; }

-->

</style>
</head>

<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../background/<? echo "$background"; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="31%">&nbsp;</td>
    <td width="35%"><div align="center">
      <form name="form1" method="post" action="index.php?usuario=<? echo $usuario; ?>&senha=<? echo $senha; ?>#abrirlogin" >
        <div align="center">
          <input name="codigo_do_cliente_agendado" type="hidden" id="codigo_do_cliente_agendado" value="<? echo "$cod_cliente"; ?>">
          <input name="solicitacao" type="hidden" id="solicitacao" value="abrircontatodaagenda">
          <input name="cpf_sobrepor" type="hidden" id="cpf_sobrepor" value="<? echo $cpf;  ?>">
          <? 
			//if(mysql_num_rows($result)==1){
				//if(($hora_atual>$hora_iniciar) && ($hora_atual<$hora_terminar)){
			
          echo "<input type='submit' class='class01' name='button3' id='button3' value='Login'>";
			//}//} ?>
        </div>
      </form>
    </div></td>
    <td width="34%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
      <?
    $sql = "SELECT * FROM logo";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$largura = $linha['2'];
$altura = $linha['3'];

//echo "<img src='../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'>";

 } 
 ?>
    </div></td>
  </tr>
</table>
<div id="abrirlogin" class="modal" role="dialog">
<a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
<form action="verifica.php" method="post" name="form1" id="form1">

<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td></td>
    <td valign="baseline" bgcolor="#FFFFCC"><div align="center" class="style1 style2">Usu&aacute;rio
        <? $data = date('d/m/Y');
$date = date('Y-m-d');
 //echo date($data, strtotime(" -2 days ",strtotime('20-07-2011'))); ?>
    </div></td>
    <td valign="baseline" bgcolor="#FFFFCC"><div align="center" class="style3">Senha</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="2%"></td>
    <td width="12%" valign="baseline" background="../imagens/fundocelulas1.png">
        <div align="center">
          <script language='JavaScript' type='text/javascript'>
document.itens.usuario.focus()
          </script>
          <input class='class02' name="usuario" type="text" id="usuario" />
        </div></td>
    <td width="14%" valign="baseline" background="../imagens/fundocelulas1.png"><div align="center">
      <input class='class02' name="senha" type="password" id="senha2" />
    </div></td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" background="../imagens/fundocelulas1.png"><div align="center">
      <input class='class01' type="submit" name="Submit" value="Conectar" />
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>

<p>&nbsp; </p>
</body>

</html>

<?

mysql_close($conexao);

?>