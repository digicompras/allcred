<?php

require '../conect/conect.php';

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

echo ""; //se for emite mensagem positiva.


else //se não for...

header("Location: alerta.php");



?>


<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

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
	color: #0000FF;
	font-weight: bold;
}
.style2 {color: #FF0000}

-->
</style>
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

$data_hoje = date('Y-m-d');

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


$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_anterior = date('Y')-1;
$ano_atual = date('Y');
$ano_proximo = date('Y')+1;

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

$estab_pertence = $linha[44];

$bloqueio_parcial = $linha[57];

$bloqueio_compra = $linha[59];
?>

<?
$sql = "SELECT * FROM mensagens_ao_funcionario where nome_operador = '$nome_operador' and mensagem_lida = 'Não lida'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg_mensagem++;

}
	?>
  <table width="100%" border="0" cellspacing="4">

    <tr> 

      <td width="15%"><strong>Ol&aacute;! Seja bem vindo!<br> 

        </strong><strong><font color="#0000FF"><? echo $nome_operador; ?> 

            

</font></strong></td>

      <td width="17%"><strong>Fun&ccedil;&atilde;o</strong><br>      
          <span class="style1"><? echo $funcao; ?></span></td>
      <td width="30%"><strong>E-mail:</strong><br>

      <strong><font color="#0000FF"><? echo $linha[20]; ?></font></strong>     </td>

      <td width="15%"><strong>Celular:<font color="#0000FF"><br>

            <? echo $linha[19]; ?>

      </font><font color="#0000FF">      </font></strong></td>

      <td width="23%" valign="top"><div align="center">

        <strong><font color="#0000FF">Confira a data de hoje<br> 

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
</table>

  <table width="100%" border="0">
    <tr>
      <td><div align="center">
        <form name="form1" method="post" action="ponto/marcarponto.php">
          <div align="center">
            <?

$hora = date('H');		



$sql = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$data_hoje' order by date desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_ponto = $linha[0];
$ent_t = $linha[5];

}



?>
            <strong><font color="#0000FF">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">
              <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">
              <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
              </font></strong>
            <? if($funcao<>"Agente"){ echo "<input class='class01' type='submit' name='button' id='button' value='Marcar Ponto'>"; } ?>
          </div>
        </form>
      </div></td>
      <td><div align="center">
        <form name="form2" method="post" action="operadores/editar_operador.php">
          <div align="center">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <? if($reg_mensagem==0){ echo "<input class='class01' type='submit' name='Submit2' value='Editar Dados Cadastrais'>"; } ?>
          </div>
        </form>
      </div></td>
      <td><div align="center">
        <form action="index.php" method="post" name="form5" id="form2">
          <div align="center">
            <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "informativos"; ?>">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <? if($reg_mensagem==0){ echo "<input class='class01' type='submit' name='Submit17' value='Instru&ccedil;&otilde;es'>"; } ?>
          </div>
        </form>
      </div></td>
      <td><div align="center">
        <form action="link_acessorapido/index.php" method="post" name="form5" target="_blank" id="form">
          <div align="center">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <? if($reg_mensagem==0){ echo "<input class='class01' type='submit' name='Submit17' value='Acesso Rapido'>"; } ?>
          </div>
        </form>
      </div></td>
    </tr>
    <tr>
      <td width="15%"><form action="clientes/menu.php" method="post" name="form2">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($funcao<>"Agente")){ echo "<input class='class01' type='submit' name='Submit5' value='Clientes'>"; } ?>
          <input type="hidden" name="codigolancamento" id="codigolancamento">
          <input type="hidden" name="solicitacao" id="solicitacao">
        </div>
      </form></td>
      <td width="21%"><form action="propostas/menu.php" method="post" name="form2">
        <div align="center">
          <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador;  ?>">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <?      

if($reg_mensagem==0){ echo "<input class='class01' type='submit' name='Submit' value='Propostas'>"; }

?>
        </div>
      </form></td>
      <td width="16%">&nbsp;</td>
      <td width="48%"><form action="relatorios/relatorio_de_producao_periodico_por_operador_novo.php" method="post" name="form5">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="campanha" type="hidden" id="campanha" value="selecione">
          <?
       
if($funcao=="Gerente"){ 
        echo "<select name='nome_operador' id='select6'>
          <option selected></option>";
		  

          
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and status = 'Ativo' order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";
  
  
  
  	}

  echo "</select>";
  

}
else{
	
if($funcao=="Parceiro Master"){
	
        echo "<select name='nome_operador' id='select6'>
          <option selected></option>";
		  

          
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and (funcao = 'Parceiro Master' or funcao = 'Parceiro') and status = 'Ativo' order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";
  
  
  
  	}

  echo "</select>";
	
	
	
}
else{
		
echo "<input name='nome_operador' type='hidden' id='nome_operador' value='$nome_operador'>";

}
		
}
        

if($funcao=="Parceiro"){
	
	
}
else{
	
echo "De
        <select name='dia_inicial' id='dia_inicial'>";





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc limit 32";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";
  

    }

        echo "</select>
        <select name='mes_inicial' id='mes_inicial'>";
if($funcao=="Gerente"){
         echo "<option selected>$mes</option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>";

}
else{

$sql = "select * from propostas where mes_alteracao_status = '$mes_atual' group by mes_alteracao_status order by mes_alteracao_status desc limit 3";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";
  echo "<option>"."$mes_anterior"."</option>";
 echo "<option>"."$mes_anterior_um"."</option>";



    }

}
    

        echo "</select>
        <select name='ano_inicial' id='ano_inicial'>";
if($funcao=="Gerente"){
          echo "<option selected>$ano_atual</option>
            <option>$ano_anterior</option>
            <option>$ano_proximo</option>";

}
else{
echo "<option>$ano_anterior</option>";
$sql = "select * from propostas where ano_alteracao_status = '$ano_atual' group by ano_alteracao_status order by ano_alteracao_status desc limit 1";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }
}


        echo "</select>
        ate
        <select name='dia_final' id='dia_final'>";


    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc limit 32";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

        echo "</select>
        <select name='mes_final' id='mes_final'>";
if($funcao=="Gerente"){
          echo "<option>$mes</option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>";

}
else{

$sql = "select * from propostas where mes_alteracao_status = '$mes_atual' group by mes_alteracao_status order by mes_alteracao_status desc limit 3";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";
  echo "<option>"."$mes_anterior"."</option>";
  echo "<option>"."$mes_anterior_um"."</option>";

}

  }  

        
		echo "</select>
        <select name='ano_final' id='ano_final'>";
if($funcao=="Gerente"){
          echo "<option selected>$ano_atual</option>
            <option>$ano_anterior</option>
            <option>$ano_proximo</option>";
			
			}
			else{
				echo "<option>$ano_anterior</option>";
$sql = "select * from propostas where ano_alteracao_status = '$ano_atual' group by ano_alteracao_status order by ano_alteracao_status desc limit 1";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }
			}

echo "</select>";


}

?>
          <? if(($reg_mensagem==0) && ($funcao<>"Parceiro")){ echo "<input class='class01' type='submit' name='Submit5232' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>"; } ?>
        </div>
      </form></td>
    </tr>
  </table>
  <p>
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
        <td><div align="center">
            <input type="submit" name="Submit" value="Declaro que li a mensagem">
        </div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <p>
    <? } ?>
  </p>
<p>&nbsp;</p>
<p align="center">
  
  

  
</p>
</body>

</html>

<? 

//mysql_free_result($res);

mysql_close($conexao);

?>