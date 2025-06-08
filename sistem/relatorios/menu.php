<?php

require '../../conect/conect.php';

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




$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
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
	
$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_proximo = date('Y')+1;

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




?>


<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">

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
<table width="100%" border="0">
  <tr>
      <td width="48%"><form action="relatorio_de_producao_periodico_por_operador_novo.php" method="post" name="form5">
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
    <tr>
      <td><form action="relatorio_de_producao_periodico_por_status_e_operador.php" method="post" name="form5" target="_blank">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


?>
			<input name='status' type='hidden' id='status' value='<? echo "BOLETO PAGO"; ?> '>
			<input name='operador' type='hidden' id='operador' value='<? echo "$nome_operador"; ?> '>
		  <select name='dia_inicial' id='dia_inicial'>
		    <option >
            <? echo "$dia"; ?>
            </option>
          <option selected>01</option>
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
          <option>12</option>
		<option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
		<option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
		<option>31</option>
          
			
        </select>
			
          <select name='mes_inicial' id='mes_inicial'>
            <option selected>
              <? echo "$mes"; ?>
            </option>
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
            <option>12</option>
            
			
          </select>
          <select name='ano_inicial' id='ano_inicial'>
            <option selected><? echo "$ano_atual"; ?> </option>
            <option><? echo "$ano_anterior"; ?></option>
            <option><? echo "$ano_proximo"; ?></option>
           </select>
          ate
          <select name='dia_final' id='dia_final'>
            <option > <? echo "$dia"; ?> </option>
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
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option selected>31</option>
            
			
        
          </select>
          <select name='mes_final' id='mes_final'>
            <option selected> <? echo "$mes"; ?> </option>
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
            <option>12</option>
            
			
          
          </select>
          <select name='ano_final' id='ano_final'>
            <option selected><? echo "$ano_atual"; ?></option>
            <option><? echo "$ano_anterior"; ?></option>
            <option><? echo "$ano_proximo"; ?></option>
          </select>
			
          <? if(($reg_mensagem==0) && ($funcao<>"Parceiro")){ echo "<input class='class01' type='submit' name='Submit5232' value='Relat&oacute;rio de BOLETO PAGO'>"; 
} ?>
        </div>
      </form></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">
  
  

  
</p>
</body>

</html>
<?  }}  ?>
<? 

//mysql_free_result($res);

mysql_close($conexao);

?>