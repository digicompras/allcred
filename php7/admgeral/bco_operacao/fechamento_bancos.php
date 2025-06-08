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
<title>Informa&ccedil;&otilde;es pr&eacute;vias para preenchimento de proposta!</title>
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
</style>
</head>

<body>
<p><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';

$solicitacao = $_POST['solicitacao'];
$codigo = $_POST['codigo'];

$anoatual = date('Y');
$mesatual = date('m');
$diaatual = date('d');
$datacadastro = date('Y-m-d');
$horacadastro = date('H:i:s');

error_reporting(E_ALL);

?>
<?
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigousuario = $linha[0];
$nomeusuario = $linha[1];



}
?>

<?
if($solicitacao=="gravar"){
	
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$data = "$ano-$mes-$dia";

$novogov = $_POST['novogov'];
$refingov = $_POST['refingov'];
$portgov = $_POST['portgov'];
$novoinss = $_POST['novoinss'];
$refininss = $_POST['refininss'];
$portinss = $_POST['portinss'];
$cartao = $_POST['cartao'];
$cartaosaque = $_POST['cartaosaque'];
$seguro = $_POST['aumento'];
$cp = $_POST['cp'];
$veiculos = $_POST['veiculos'];





$comando = "insert into fechamento_bancos(data,ano,mes,dia,datacadastro,horacadastro,novogov,refingov,portgov,novoinss,refininss,portinss,cartao,cartaosaque,seguro,cp,veiculos)
values('$data','$ano','$mes','$dia','$datacadastro','$horacadastro','$novogov','$refingov','$portgov','$novoinss','$refininss','$portinss','$cartao','$cartaosaque','$seguro','$cp','$veiculos')";



mysql_query($comando,$conexao) or die("Erro ao gravar fechamento do dia!");

}


if($solicitacao=="gravareditar"){

$codigo = $_POST['codigo'];
	
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$data = "$ano-$mes-$dia";

$novogov = $_POST['novogov'];
$refingov = $_POST['refingov'];
$portgov = $_POST['portgov'];
$novoinss = $_POST['novoinss'];
$refininss = $_POST['refininss'];
$portinss = $_POST['portinss'];
$cartao = $_POST['cartao'];
$cartaosaque = $_POST['cartaosaque'];
$seguro = $_POST['aumento'];
$cp = $_POST['cp'];
$veiculos = $_POST['veiculos'];

	
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$comando = "update `$linha[1]`.`fechamento_bancos` set `dia` = '$dia',`mes` = '$mes',`ano` = '$ano',`data` = '$data',`novogov` = '$novogov',`refingov` = '$refingov',`portgov` = '$portgov',`novoinss` = '$novoinss',`refininss` = '$refininss',`portinss` = '$portinss',`cartao` = '$cartao',`cartaosaque` = '$cartaosaque',`seguro` = '$seguro',`cp` = '$cp',`veiculos` = '$veiculos' where `fechamento_bancos`. `codigo` = '$codigo' limit 1 ";

}

mysql_query($comando,$conexao) or die("Erro ao alterar dados");
	
	
	
	
	
}


?>
</p>
<form name="form1" method="post" action="fechamento_bancos.php">
  <?
  
$sql = "SELECT * FROM fechamento_bancos where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$sequencianumeromateria = mysql_num_rows($res);

$codigo = $linha[0];

$data = $linha[6];
$dia = $linha[7];
$mes = $linha[8];
$ano = $linha[9];
$novogov = $linha[10];
$refingov = $linha[11];
$portgov = $linha[12];
$novoinss = $linha[13];
$refininss = $linha[14];
$portinss = $linha[15];
$cartao = $linha[16];
$cartaosaque = $linha[17];
$seguro = $linha[18];
$aumento = $linha[19];
$cp = $linha[20];
$veiculos = $linha[21];

}
?>

  <table width="100%"  border="0">
    <tr>
      <td><div align="center">Data</div></td>
      <td><div align="center">Novo Gov.</div></td>
      <td><div align="center">Refin Gov.</div></td>
      <td><div align="center">Port Gov.</div></td>
      <td><div align="center">Novo INSS</div></td>
      <td><div align="center">Refin INSS</div></td>
    </tr>
    <tr>
      <td width="33%"><div align="center">
        <select name="dia" id="dia">
          <option selected><? if($solicitacao=="editar"){
		  echo $dia; }else{ echo $diaatual; } ?></option>
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
          <option>31</option>
        </select>
        <select name="mes" id="mes">
          <option selected><? if($solicitacao=="editar"){
		  echo $mes; }else{ echo $mesatual;  }  ?></option>
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
        <select name="ano" id="ano">
          <option>
            <? $ano_anterior = bcsub($anoatual,1); echo $ano_anterior; ?>
            </option>
          <option selected><? if($solicitacao=="editar"){
		 $ano_atual = $ano; echo $ano_atual; }else{ echo $anoatual; } ?></option>
          <option>
            <? $ano_posterior = bcadd($anoatual,1); echo $ano_posterior; ?>
            </option>
        </select>
      </div></td>
      <td width="35%"><div align="center">
        <input name="novogov" type="text" id="novogov" value="<? if($solicitacao=="editar"){
		  echo $novogov; } ?>">
      </div></td>
      <td width="32%"><div align="center">
        <input type="text" name="refingov" id="refingov" value="<? if($solicitacao=="editar"){
		  echo $refingov; }else{  }   ?>">
      </div></td>
      <td width="32%"><div align="center">
        <input type="text" name="portgov" id="portgov" value="<? if($solicitacao=="editar"){
		  echo $portgov; }else{  }   ?>">
      </div></td>
      <td width="32%"><div align="center">
        <input type="text" name="novoinss" id="novoinss" value="<? if($solicitacao=="editar"){
		  echo $novoinss; }else{  }   ?>">
      </div></td>
      <td width="32%"><div align="center">
        <input type="text" name="refininss" id="refininss" value="<? if($solicitacao=="editar"){
		  echo $refininss; }else{  }   ?>">
      </div></td>
    </tr>
    
   
    <tr>
      <td><div align="center">Port INSS</div></td>
      <td><div align="center">Cart&atilde;o</div></td>
      <td><div align="center">Cart&atilde;o Saque</div></td>
      <td><div align="center">Seguro</div></td>
      <td><div align="center">Aumento</div></td>
      <td><div align="center">CP</div></td>
    </tr>
    <tr>
      <td><div align="center">
        <input type="text" name="portinss" id="portinss" value="<? if($solicitacao=="editar"){
		  echo $portinss; }else{  }   ?>">
      </div></td>
      <td><div align="center">
        <input type="text" name="cartao" id="cartao" value="<? if($solicitacao=="editar"){
		  echo $cartao; }else{  }   ?>">
      </div></td>
      <td><div align="center">
        <input type="text" name="cartaosaque" id="cartaosaque" value="<? if($solicitacao=="editar"){
		  echo $cartaosaque; }else{  }   ?>">
      </div></td>
      <td><div align="center">
        <input type="text" name="seguro" id="seguro" value="<? if($solicitacao=="editar"){
		  echo $seguro; }else{  }   ?>">
      </div></td>
      <td><div align="center">
        <input type="text" name="aumento" id="aumento" value="<? if($solicitacao=="editar"){
		  echo $aumento; }else{  }   ?>">
      </div></td>
      <td><div align="center">
        <input type="text" name="cp" id="cp" value="<? if($solicitacao=="editar"){
		  echo $cp; }else{  }   ?>">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Veiculos</div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center">
        <input type="text" name="veiculos" id="veiculos" value="<? if($solicitacao=="editar"){
		  echo $veiculos; }else{  }   ?>">
      </div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
   
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center">
        <? if($solicitacao=="editar"){ echo "<input name='codigo' type='hidden' id='codigo' value='$codigo'>"; } ?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? if(empty($solicitacao)){ echo "gravar"; } else{ echo "gravar$solicitacao"; } ?>">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class01" type="submit" name="Submit4" value="<? if(empty($solicitacao)){ echo "Incluir"; } else{ echo "Salvar Edição"; } ?>">
      </div></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="5%">Data</td>
    <td width="7%">Novo Gov</td>
    <td width="8%">Refin Gov.</td>
    <td width="9%">Port. Gov.</td>
    <td width="9%">Novo INSS</td>
    <td width="9%">Refin INSS</td>
    <td width="10%">Port INSS</td>
    <td width="10%">Cart&atilde;o</td>
    <td width="10%">Cart&atilde;o Saque</td>
    <td width="8%">Seguro</td>
    <td width="8%">Aumento</td>
    <td width="7%">CP</td>
    <td width="10%">Veiculos</td>
    <td width="10%"><div align="center">#</div></td>
  </tr>
  <?
$sql = "SELECT * FROM fechamento_bancos order by data asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$sequencianumeromateria = mysql_num_rows($res);

$codigo = $linha[0];

$data = $linha[6];
$dia = $linha[7];
$mes = $linha[8];
$ano = $linha[9];
$novogov = $linha[10];
$refingov = $linha[11];
$portgov = $linha[12];
$novoinss = $linha[13];
$refininss = $linha[14];
$portinss = $linha[15];
$cartao = $linha[16];
$cartaosaque = $linha[17];
$seguro = $linha[18];
$aumento = $linha[19];
$cp = $linha[20];
$veiculos = $linha[21];



?>
  <tr>
    <td><? echo "$dia-$mes-$ano"; ?></td>
    <td><? echo $novogov; ?></td>
    <td><? echo $refingov; ?></td>
    <td><? echo $portgov; ?></td>
    <td><? echo $novoinss; ?></td>
    <td><? echo $refininss; ?></td>
    <td><? echo $portinss; ?></td>
    <td><? echo $cartao; ?></td>
    <td><? echo $cartaosaque; ?></td>
    <td><? echo $seguro; ?></td>
    <td><? echo $aumento; ?></td>
    <td><? echo $cp; ?></td>
    <td><? echo $veiculos; ?></td>
    <td><div align="center">
      <form name="form2" method="post" action="fechamento_bancos.php">
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "editar"; ?>">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="button" id="button" value="Editar">
      </form>
    </div></td>
  </tr>
  <? } ?>
</table>
<p>
<p>&nbsp;</p>
</body>
</html>
