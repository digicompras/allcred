<html>
<head>
<title>ALLCRED FINANCEIRA (16) 3721-0120</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #009900;
	font-weight: bold;
	font-size: 50px;
}
.style2 {
	color: #1328c9;
	font-weight: bold;
	font-size: 12px;
}
.style3 {
	color: #0000FF;
	font-weight: bold;
	font-size: 50px;

}

-->
</style>
<style type="text/css">
<!--
.botao  {
	padding-left: 35px;
	float: left;
	middle:77px;
	
	margin:0px;
	padding:0px;
	width: 130px;
	height:25px;
        }

.botao a:visited {
	font: bold 12px/24px arial, helvetica, sans-aerif;
	padding:0px;
	text-decoration: none;
	text-align:center;

	background:  url('imagens/botao.jpg') no-repeat 
center center;
	width:130px;
	height:25px;
	display:block;
	}

.botao a:hover {
	background:  url('imagens/botao2.jpg') no-repeat 
center center;
	border: #ff4300;
               }
.style4 {
	font: bold 12px/24px arial, helvetica, sans-aerif;
	padding:0px;

	text-decoration: none;
	text-align:center;

float: left;
	middle:77px;
	background:  url('imagens/botao.jpg') no-repeat 
center center;
width:130px;
	height:25px;
	display:block;
	color: #FFFFFF;
}
-->

</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

</head>
<?
require 'conect/conect.php';

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");


$instrucao = $_GET['instrucao'];

?>

<?
	  
$sql = "SELECT * FROM franquia";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$franquia = $linha[1];
}
?>

<?
	  
$sql = "SELECT * FROM a_empresa";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$aempresa = $linha[1];
}
?>

<?
$sql = "select * from hora_encerramento where dia = '$hoje' limit 1";
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

$hora_atual = date('H:i:s');
$date = date('d-m-Y');


$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";
?>
<script language="javascript">
function foco(usuario)
{
document.getElementById(usuario).focus();
}
</script>

<?
$sql = "select * from pag_inicial";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$pagina_inicial = $linha[1];
}
?>


<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="background/<? echo $background; ?>" bgproperties="fixed" onLoad="MM_preloadImages('imagens/arte_esquerda_2.jpg')">

<table width="100%"  border="0" cellpadding="0">
  <tr>
    <td><p><img src="logo/cabecalho_allcred3.jpg" width="998" height="200"><br>
    <img src="imagens/linha_horinzontal.jpg" width="998" height="10"></p>    </td>
  </tr>
</table>
  <table width="100%"  border="0">
    <tr>
      <td><div align="center"><span class="botao"><a href="index.php" target="_top" class="style4">HOME</a></span></div>
</td>
      <td><div align="center"><span class="botao"><a href="index.php?instrucao=franquia" target="_top" class="style4">Franquia</a></span></div></td>
      <td><div align="center"><span class="botao"><a href="index.php?instrucao=aempresa" target="_top" class="style4">A Empresa</a></span></div></td>
      <td><div align="center"><span class="botao"><a href="index.php?instrucao=contato" target="_top" class="style4">Fale Conosco</a></span></div></td>
      <td><div align="center"><span class="botao"><a href="index.php?instrucao=agente" target="_top" class="style4">Área do Agente</a></span></div></td>
      <td><div align="center"><span class="botao"><a href="index.php?instrucao=funcionario" target="_top" class="style4">Área do Funcionário</a></span></div></td>
      <td><div align="center"><span class="botao"><a href="index.php?instrucao=agencias" target="_top" class="style4">Agências</a></span></div></td>
    </tr>
</table>
<table width="100%"  border="0" cellpadding="0">
  <tr>
    <td width="25%" valign="top"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','imagens/arte_esquerda_2.jpg',1)"><img src="imagens/arte_esquerda.jpg" alt="Allcred a tranquilidade na sua feliz idade" name="Image3" width="246" height="267" border="0"></a></td>
    <td width="60%" valign="top"><div align="center">
	

<? 
if(empty($instrucao)){ echo "<div align='center' class='style1'><blink>". $pagina_inicial. "</blink></div>"; }
//if(empty($instrucao)){ echo "<div align='center' class='style3'>DISK EMPRÉSTIMOS </div><br>"; }
//if(empty($instrucao)){ echo "<div align='center' class='style3'>0800-940-0481</div><br>"; }

if($instrucao=="franquia"){ echo "<br><br>".$franquia; }
if($instrucao=="aempresa"){ echo "<br>".$aempresa; }
if($instrucao=="contato"){ 
if($_POST[opc_enviar]) {
    
	//RECEBE OS DADOS DO FORMULÁRIO
	$v_nome      =   $_POST[nome];
	$v_email    =  $_POST[email];
	$v_fone  =  $_POST[fone];
	$v_obs   =  $_POST[obs];
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   "allcred@allcredpromotora.com.br";
	
	//PREPARA O PEDIDO
	$mens  .=  " A sua mensagem foi enviada com sucesso. A Allcred Financeira agradece o seu contato    \n";
	$mens  .=  " Em breve lhe retornaremos sobre o assunto! \n";
	$mens  .=  "Nome: ".$v_nome."                                                       \n";
	$mens  .=  "E-Mail: ".$v_email."                                                    \n";
	$mens  .=  "Telefone: ".$v_fone."                                                    \n";
	$mens  .=  "Mensagem: ".$v_obs."                                                    \n";
	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Allcred - Fale conosco", $mens,"From:".$email_dest."\r\nBcc:".$v_email);
	
	//VERIFICA SE O EMAIL FOI ENVIADO COM SUCESSO
	if($envia) { 
	   //ELIMINA TODAS AS VARIÁVEIS DA SESSÃO
       $_SESSION = array();
       
	   //DESTRÓI A SESSÃO PARA GARANTIR
       @session_destroy(); ?>
<script language="JavaScript">
	   <!--
	      alert("PARABÉNS!!\n\n A Sua mensagem foi enviada com sucesso! Em breve lhe retornaremos sobre o assunto.");
		  window.location.href = "index2.php";
	   //-->
	   </script>
    <?
	}//FECHA IF(envia)
	else {?>
       <script language="JavaScript">
	   <!--
	      alert("ERRO!!\n\n Ocorreu um erro inesperado em seu servidor.\n\nPor favor, tente novamente...");
		  window.location.href = "index2.php";
	   //-->
	   </script>
<?
   }//FECHA ELSE (envia)
}//FECHA IF
?>
   
<table width="519"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <form method="post" name="frmfinalizar" onSubmit="return finaliza();">
        <p align="center"> 
          <input type="hidden" name="opc_enviar" value="1">
          <input type="hidden" name="v_produtos" value="<? echo $v_produtos; ?>">
          <input type="hidden" name="v_nome" value="<? echo $v_nome; ?>">
          <input type="hidden" name="v_email" value="<? echo $v_email; ?>">
          <input type="hidden" name="v_user" value="<? echo $v_user; ?>">
          <input type="hidden" name="v_nomeE" value="<? echo $v_nomeE; ?>">
          <input type="hidden" name="v_EnderecoE" value="<? echo $v_EnderecoE; ?>">
          <input type="hidden" name="v_cidadeE" value="<? echo $v_cidadeE; ?>">
          <input type="hidden" name="v_EstadoE" value="<? echo $v_EstadoE; ?>">
          <input type="hidden" name="v_fonee" value="<? echo $v_fonee; ?>">
          <input type="hidden" name="v_CEPE" value="<? echo $v_CEPE; ?>">
          <input type="hidden" name="v_EmailE" value="<? echo $v_EmailE; ?>">
          <input type="hidden" name="v_insc" value="<? echo $v_insc; ?>">
          <input type="hidden" name="v_cnpj" value="<? echo $v_cnpj; ?>">
          <input type="hidden" name="v_pgto" value="<? echo $v_pgto; ?>">
          <input type="hidden" name="v_transp" value="<? echo $v_transp; ?>">
          <input type="hidden" name="v_total" value="<? echo $total; ?>">
          <input type="hidden" name="v_dataped" value="<? echo $dataped; ?>">
          <input type="hidden" name="v_dataent" value="<? echo $dataent; ?>">
        
      <div align="center">
        <table width="48%"  border="0" align="center" cellpadding="1" cellspacing="1">
                  <!--DWLayoutTable-->
                  <tr > 
                    <td height="29" colspan="4"> <div align="left">
                      <div align="center">Sua 
                            mesagem &eacute; muito importante para n&oacute;s! Queremos 
                        ouv&iacute;-lo!</div>
                    </div></td>
                  </tr>
                  <tr> 
                    <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td width="260" colspan="3" valign="top"><font color="#FFFFFF"><strong> 
                      </strong></font></td>
                  </tr>
                  <tr> 
                    <td width="91" height="26"><div align="left">Nome:</div></td>
                    <td colspan="3" valign="top"><strong> 
                      <input name="nome" type="text" id="cnpj"  size="40" maxlength="40">
                      </strong></td>
                  </tr>
                  <tr> 
                    <td height="26"><div align="left" class="style6">Telefone:</div></td>
                    <td colspan="3" valign="top"><div align="left"><strong> 
                        <input name="fone" type="text" id="fonee2"  size="20" maxlength="20">
                        <font face="Arial" size="2"> </font></strong></div></td>
                  </tr>
                  <tr> 
                    <td height="24"> <div align="left" class="style6">E-Mail:</div></td>
                    <td colspan="3" valign="top"><div align="left"><strong> 
                        <input name="email" type="text" id="nome"  size="40" maxlength="40">
                        <font face="Arial" size="2"> </font></strong></div></td>
                  </tr>
                  <tr valign="bottom"> 
                    <td height="72" valign="top"> <div align="left" class="style6">Mensagem: 
                    </div></td>
                    <td colspan="2" valign="top"><div align="left"> <strong> 
                        <textarea name="obs" cols="30"></textarea>
                        </strong></div></td>
                    <td valign="top"><div align="left"> </div></td>
                  </tr>
                  <tr align="center" valign="middle"> 
                    <td height="26" valign="top"><div align="left"></div></td>
                    <td colspan="2" valign="top"> <div align="left"> <strong> 
                    <input type="submit" name="Submit" value="Enviar">
                    <input type="reset" name="Submit2" value="Limpar">
    </strong></div></td>
                    <td valign="top"><div align="left"><strong> </strong></div></td>
                  </tr>
                </table></div></form></table>
      </div>
    
<? } ?>

<?
if($instrucao=="agente"){ 

echo "<form name='form1' method='post' action='verifica_correspondente.php' target='_top'>
  <table width='100%' border='0' align='center'>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='4'><span class='style5'><span class='style2'><br>$data_completa</span></span></td>
      <td>&nbsp;</td>
      <td><span class='style5'><span class='style2'>$hora_atual</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='9'><div align='left'>Hor&aacute;rio de funcionamento do sistema! In&iacute;cio as $hora_iniciar - T&eacute;rmino as $hora_terminar</span></div></td>
      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align='center'><span class='style6'>";
        
if($hora_atual<=$hora_iniciar){echo "Prezado correspondente! Seu dia de trabalho ainda n&atilde;o teve inicio!<br>O sistema abrir&aacute; as $hora_iniciar<br>";
}

if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){ echo "<br><br>Prezado correspondente!<br>Fa&ccedil;a seu login e tenha um &Oacute;timo dia de trabalho!<br>";
} 


if($hora_atual>=$hora_terminar){echo "Prezado correspondente! Seu dia de trabalho j&aacute; terminou!<br>J&aacute; s&atilde;o $hora_atual, portanto, n&atilde;o &eacute; poss&iacute;vel acessar o sistema agora!<br> V&aacute; descansar para amanh&atilde; seu dia ser proveitoso!";
}


      "</span></div></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"Usuário ";}"</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='usuario' type='text' id='usuario'><br><br>";}"</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Senha   "; }"</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "<input name='senha' type='password' id='senha'><br><br>"; } 
echo "<input name='data_hoje' type='hidden' id='data_hoje' value='$date'>"; "</td>
      <td>&nbsp; </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "<input type='submit' name='Submit' value='Conectar'>"; } 
       if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "<input type='reset' name='Submit2' value='Limpar'>"; } "</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>";

}

?>

<?
if($instrucao=="funcionario"){

echo "<form name='form1' method='post' action='verifica.php' target='_top'>
  <table width='100%' border='0' align='center'>
    <tr>
      <td><span class='style5'><span class='style2'><br>$data_completa</span></span></td>
      <td>&nbsp;</td>
      <td><span class='style5'><span class='style2'>$hora_atual</span></span></td>
    </tr>
    <tr>
      <td colspan='6'><div align='left'>Hor&aacute;rio de funcionamento do sistema! In&iacute;cio as $hora_iniciar - T&eacute;rmino as $hora_terminar</div></td>
    </tr>
    <tr>
      <td colspan='3'><div align='center'><span class='style6'>";
          
if($hora_atual<=$hora_iniciar){echo "Prezado operador! Seu dia de trabalho ainda n&atilde;o teve inicio!<br><br>O sistema abrir&aacute; as $hora_iniciar <br>";
}

if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){ echo "<br><br>Prezado operador!<br><br>Fa&ccedil;a seu login e tenha um &Oacute;timo dia de trabalho!<br>";
} 


if($hora_atual>=$hora_terminar){echo "Prezado operador! Seu dia de trabalho j&aacute; terminou!<br><br>J&aacute; s&atilde;o $hora_atual, portanto, n&atilde;o &eacute; poss&iacute;vel acessar o sistema agora!<br><br> V&aacute; descansar para amanh&atilde; seu dia ser proveitoso!<br> "; 
}



      "</span></div></td>
    </tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Usuário "; } "</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='usuario' type='text' id='usuario'><br><br>";} "</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td width='28%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"Senha"; } "</td>
      <td width='46%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='senha' type='password' id='senha'><br><br>"; }
      echo "<input name='data_hoje' type='hidden' id='data_hoje' value='$date'>"; "</td>
      <td width='26%'>&nbsp; </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='submit' name='Submit' value='Conectar'>"; } 
      if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='reset' name='Submit2' value='Limpar'>"; } "</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>"; 


}

?>

<?
if($instrucao=="agencias"){ ?>

<TABLE width="100%" border=0 align="center" cellPadding=3 cellSpacing=7>
    <?
	
	
$sql = "SELECT * FROM estabelecimentos order by codigo asc";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

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

?>
            <td valign="middle">    <div align="center"><span class="style2"><? if($endereco<>""){echo $nfantasia."<br>"; } ?>        
            <? if($endereco<>""){echo $endereco.","; } ?>  <? if($endereco<>""){echo $numero."<br>"; } ?>        
            <? if($endereco<>""){echo $cidade." - "; } ?>   <? if($endereco<>""){echo $estado."<br>"; } ?>
            <? if($endereco<>""){echo $cep."<br>"; } ?>
            <? if($endereco<>""){echo $telefone."<br>"; } ?>
            <? if($endereco<>""){echo $email."<br>"; } ?>
		    </span>  </div></td>




          <?
if($reg==2){
echo "</tr><tr></tr><tr>";
$reg=0;
}
?>
<? } ?>

</TABLE>
<?
}


?></td>
    <td width="4%" valign="top">&nbsp;</td>
  </tr>
</table>
</body>
</html>
