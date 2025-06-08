<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.





else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../conect/conect.php';

$data_hoje = $_SESSION['data_hoje'];

$dia = date('d');

$mes = date('m');

$ano = date('Y');





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>"> 

<? } ?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM correspondentes where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;





$nome_operador = $linha[1];

$senha_op = $linha[41];

$tipo_op = $linha[42];
$estab_pertence = $linha[44];


$bloqueio_parcial = $linha[57];



?>











  <table width="100%" border="0" cellspacing="4">

    <tr> 

      <td><strong>Ol&aacute;! Seja bem vindo!<br> 

        </strong><strong><font color="#0000FF"><? echo $linha[1]; ?> 

            

</font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td><strong>E-mail:</strong><br>

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

    <tr>

      <td width="32%"><strong>Estabelecimento:</strong> <br>

        <strong><font color="#0000FF"><? echo $linha[44]; ?>

        </font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td width="30%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

        <? echo $linha[46]; ?>

            </font></strong></td>

      <td><strong>Cidade: <br>

          <font color="#0000FF"><? echo $linha[45]; ?>          </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

            <? echo $linha[47]; ?>

      </font></strong></td>

    </tr>

    <tr>

      <td><strong><font color="#0000FF">      </font></strong></td>
      <td><strong><font color="#0000FF">          </font></strong></td>
      <td colspan="2">&nbsp;</td>
    </tr>

<?

if($reg==3){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>

</table>

  <?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>

  <div align="center"></div>

<table width="100%"  border="0">

  

  <tr>

    <td width="44%"><form action="propostas/informacoes_antecedem_efetuar_proposta.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>CPF
      <input type="text" name="cpf" id="cpf">      
      <input type="submit" name="Submit2" value="Efetuar Proposta">
      <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estab_pertence; ?>">
    </form></td>
    <td colspan="2"><form action="propostas/relatorio_de_producao_periodico_por_operador_novo.php" method="post" name="form5">

        <div align="right">

          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          <input name="campanha" type="hidden" id="campanha" value="selecione">

          <input name="nome_operador" type="hidden" id="nome_operador3" value="<? echo $nome_operador; ?>">

          De

          <select name="dia_inicial" id="select3">

            <?





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
          </select>

          <select name="mes_inicial" id="select4">

            <option selected>

            <?  echo $mes;  ?>
            </option>

            <?





    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
          </select>

          <select name="ano_inicial" id="select5">

            <option selected>

            <?  echo $ano;  ?>
            </option>

            <?





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
          </select>

at&eacute;

<select name="dia_final" id="select11">

  <?





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
</select>

<select name="mes_final" id="select12">

  <option selected>

  <?  echo $mes;  ?>
  </option>

  <?





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
</select>

<select name="ano_final" id="select13">

  <option selected>

  <?  echo $ano;  ?>
  </option>

  <?





    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
</select>

<input type="submit" name="Submit5232" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">
        </div>

    </form></td>
  </tr>

  <tr>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>

    <td>&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="31%">&nbsp;</td>
  </tr>

  <tr>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<strong></strong>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>