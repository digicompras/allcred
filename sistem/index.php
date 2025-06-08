<?php

require '../conect/conect.php';
include '../css_menus/modal.css';
include '../css_menus/modal2.css';

$sql = "SELECT * FROM tempoexpiracaosenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tempoexpiracaosenha = $linha['1'];


}


/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire($tempoexpiracaosenha);
$cache_expire = session_cache_expire();

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
	
	if ($_SESSION["resposta"] == true)

echo ""; //se for emite mensagem positiva.


else //se não for...

header("Location: alerta.php");




$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$resposta = $_SESSION['resposta'];
?>

<?
  
 $user= "select * from operadores where usuario='$usuario' and  senha='$senha'";

$result=mysql_query($user,$conexao) or die("Falha ao selecionar a tabela user");

if(mysql_num_rows($result)==0){




Header("Location: alerta.php");



}else{
	
	

$sql = "SELECT * FROM operadores where usuario='$usuario' and  senha='$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome = $linha['1'];

$dataultimatrocadesenha = $linha['65'];
$penultimasenha = $linha['66'];
$ultimasenha = $linha['67'];

}

$sql = "SELECT * FROM diaslimitetrocarsenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$diaslimite = $linha['1'];

}



$date = date('Y-m-d');
$hora = date('H:i:s');


// Calcula a diferença em segundos entre as datas
$diferenca = strtotime($date) - strtotime($dataultimatrocadesenha);

//Calcula a diferença em dias
$dias = floor($diferenca / (60 * 60 * 24));


if($dias>=$diaslimite){
	
	//echo "erro!! tente novamente em alguns instantes $dias - $diaslimite ";
	
	$_SESSION['nome'] = $nome;

	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	Header("Location: ../ups.php");
	
}else{


?>


<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>
<link rel="stylesheet" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


</head>

<?

$solicitacao = $_POST['solicitacao'];
	



$hoje = date('Y-m-d');
$mes_atual = date('m');

if($mes_atual>=11){
	
$mes_anterior = bcsub($mes_atual,1);
$mes_anterior_um = bcsub($mes_anterior,1);
	
}
else{
if($mes_atual=="01"){
	
$mes_anterior = "12";
	
}
else{
	
//if(($mes_atual>01) && ($mes_atual<=09)){
$mes_anterior = "0".bcsub($mes_atual,1);
$mes_anterior_um = "0".bcsub($mes_anterior,1);
//}
	
	
}
	
}

$ano_atual = date('Y');
$ano_anterior = bcsub($ano_atual,1);
	
$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_proximo = date('Y')+1;

$data_hoje = date('Y-m-d');
	$data_hoje_br = date('d-m-Y');

$codigo_mensagem = $_POST['codigo_mensagem'];

$mensagem_lida = $_POST['mensagem_lida'];

$data_leitura = date('d-m-Y');

$hora_leitura = date('H:i:s');





if($mensagem_lida=="Lida"){

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mensagens_ao_funcionario` set `codigo` = '$codigo_mensagem',`mensagem_lida` = '$mensagem_lida',`data_leitura` = '$data_leitura',`hora_leitura` = '$hora_leitura' where `mensagens_ao_funcionario`. `codigo` = '$codigo_mensagem' limit 1 ";

}

mysql_query($comando,$conexao);

}




?>


<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../background/<? echo "$background"; ?>">

<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;


$codigo_operador = $linha[0];

$nome_operador = $linha[1];

$senha_op = $linha[41];

$tipo_op = $linha[42];

$funcao = $linha[43];
	$email_operador = $linha[20];
	$celular_operador = $linha[19];

$estab_pertence = $linha[44];

$bloqueio_parcial = $linha[57];
$tempo_almoco = $linha[58];
$bloqueio_compra = $linha[59];
?>

<?
$sql = "SELECT * FROM mensagens_ao_funcionario where nome_operador = '$nome_operador' and mensagem_lida = 'Não lida'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg_mensagem++;

}
	if($reg_mensagem>=1){
	
	echo "<script>

window.location = 'index.php#mensagem';

</script>";
	}
	?>
<?
	
	$sql = "SELECT * FROM ponto where nome = '$nome_operador' and data = '$data_hoje_br' order by codigo desc limit 1 ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$ponto++;



$codigo_ponto = $linha[0];
$sai_m = $linha[4];

}
	
$hora_atual_diferenciado_e_padrao = date('H:i');

function calcular_tempo_trasnc($sai_m,$hora_atual_diferenciado_e_padrao){
    $separar[1]=explode(':',$sai_m);
    $separar[2]=explode(':',$hora_atual_diferenciado_e_padrao);

$total_minutos_trasncorridos[1] = ($separar[1][0]*60)+$separar[1][1];
$total_minutos_trasncorridos[2] = ($separar[2][0]*60)+$separar[2][1];
$total_minutos_trasncorridos = $total_minutos_trasncorridos[2]-$total_minutos_trasncorridos[1];
if($total_minutos_trasncorridos<=59) return($total_minutos_trasncorridos.' Minutos');
elseif($total_minutos_trasncorridos>59){
$HORA_TRANSCORRIDA = round($total_minutos_trasncorridos/60);
if($HORA_TRANSCORRIDA<=9) $HORA_TRANSCORRIDA='0'.$HORA_TRANSCORRIDA;
$MINUTOS_TRANSCORRIDOS = $total_minutos_trasncorridos%60;
if($MINUTOS_TRANSCORRIDOS<=9) $MINUTOS_TRANSCORRIDOS='0'.$MINUTOS_TRANSCORRIDOS;
return ($HORA_TRANSCORRIDA.':'.$MINUTOS_TRANSCORRIDOS.' Horas');
} }
	
	//chamamos a fun&ccedil;&atilde;o e imprimimos
$diferenca =  calcular_tempo_trasnc(date($hora_atual_diferenciado_e_padrao),$sai_m)*-1;

$diferenca_hora = bcdiv($diferenca,60,0);
if($diferenca_hora>="1"){ 
$hora_subtracao = bcmul($diferenca_hora,60,0);
}
$diferenca_minutos = $diferenca-$diferenca_hora;
	
	$totaldeminutos = $hora_subtracao+$diferenca_minutos;
	
	echo "$diferenca_minutos - $tempo_almoco";
	
	?>
<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td width="29%" align="center"><strong><font color="#0000FF"><? echo $nome_operador; ?> 

            

</font></strong></td>

      <td width="19%" align="center"><strong><font color="#0000FF"><? echo $funcao; ?></font></strong></td>
      <td width="28%" align="center"><strong><font color="#0000FF"><? echo $email_operador; ?></font></strong>     </td>

      <td width="10%" align="center"><strong><font color="#0000FF"><? echo $celular_operador; ?>

      </font><font color="#0000FF">      </font></strong></td>

      <td width="14%" valign="top"><div align="center">

        <strong><font color="#0000FF">Hoje</font><font color="#0000FF"> 
        </font></strong>

        <strong><font color="#0000FF"><? echo $data_hoje; ?></font></strong>

           

        </p>

</div></td>
    </tr>


<?

if($reg==3){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>
</table><h2>PAINEL DE CONTROLE<strong><font color="#0000FF"><? echo $resposta; ?></font></strong></h2>
  <p></p>


<section>

<div class="bloco_botoes">

			<?
				  if($reg_mensagem==0){					
				include("paginas_a_chamar/clientes.php");
				  }
			?>
  </div>
	
	<div class="bloco_botoes">

			<?
				if($reg_mensagem==0){					
				include("paginas_a_chamar/propostas.php");
				}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?
					if($reg_mensagem==0){				
				include("paginas_a_chamar/acessorapido.php");
					}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?
					if($reg_mensagem==0){				
				include("paginas_a_chamar/operadores.php");
					}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?
					if($reg_mensagem==0){				
				include("paginas_a_chamar/cartaodeponto.php");
					}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?
					if($reg_mensagem==0){				
				include("paginas_a_chamar/relatorios.php");
					}
			?>
  </div>
	
</section>

<div id="mensagem" class="modal2" role="dialog" style="overflow:  width: 2000px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b></b>X</a>

    <?

$sql = "SELECT * FROM mensagens_ao_funcionario where nome_operador = '$nome_operador' and mensagem_lida = 'Não lida'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg_mensagem++;

$codigo_mensagem = $linha[0];

$nome_operador = $linha[1];

$data_mensagem = $linha[2];

$hora_mensagem = $linha[3];

$mensagem = $linha[4];

$mensagem_lida = $linha[5];

$data_leitura = $linha[6];

$hora_leitura = $linha[7];

$assunto = $linha[8];


?>
  </p>
  <form name="form9" method="post" action="index.php">
    <table width="100%"  border="0">
      <tr>
        <td width="9%"><div align="center"><? echo $data_mensagem; ?></div></td>
        <td width="9%"><div align="center"><? echo $hora_mensagem; ?></div></td>
        <td width="62%"><div align="center">
            <textarea name="mensagem" cols="120" rows="7" id="mensagem"><? echo "$assunto - $mensagem"; ?></textarea>
        </div></td>
        <td width="20%"><div align="center">
            <input name="codigo_mensagem" type="hidden" id="codigo_mensagem" value="<? echo $codigo_mensagem; ?>">
            <input name="mensagem_lida" type="hidden" id="mensagem_lida" value="Lida">
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><strong>
          <input class='class01' type=image src="../imagens/botoes/ciente.png" width="100" height="100" name="Submit2" title="DECLARO QUE LI A MENSAGEM E ESTOU CIENTE!">
        </strong></div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <p>
    <? } ?>
  </p>
<p align="center">
    
    
    
    
</p>
</body>

</html>
<?  }}  ?>
</div>
<? 

//mysql_free_result($res);

mysql_close($conexao);

?>