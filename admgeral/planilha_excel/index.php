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

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2"><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);
error_reporting(E_ALL ^ E_NOTICE);


?> 

<?
$dia = $_POST['dia'];

$mes = $_POST['mes'];

$ano = $_POST['ano'];

$ano_atual = date('Y');


if(empty($ano)){
	
$ano_para_lancamento = $ano_atual;

}
else{
	
$ano_para_lancamento = $ano;
	
}



$ano_anterior = bcsub($ano_atual,1);

$ano_posterior = bcadd($ano_atual,1);

$mes_atual = date('m');

$mes_ano = date('m-Y');






$operador = $_POST['operador'];

if(empty($operador)){
	
$qual_operador = "Todos";

}
else{
	
$qual_operador = $operador;
	
}



$dia_semana = $_POST['dia_semana'];

$tipo_lancamento = $_POST['tipo_lancamento'];




$mes_ano = "$mes-$ano";

$data = "$dia-$mes-$ano";

$date = "$ano-$mes-$dia";

?>
                   </td>
    </tr>

    <tr>

      <td width="22%">&nbsp;</td>

      <td width="78%"><strong><font color="#0000FF" size="4">O que deseja fazer com as planilhas de analise?</font></strong></td>
    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <input class="class01" type="submit" name="Submit" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form3" method="post" action="selecione_funcionario_para_gerar_cartao_ponto.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        
      </form></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><form name="form3" method="post" action="listar_cartao_de_ponto_todos_funcionarios.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <strong><font color="#0000FF">
        mm-aa<select class="class02" name="mes_ano" id="mes_ano">
          <?

    $sql = "select * from analiseplanilha group by mes_ano order by date desc limit 60";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_ano']."</option>";

    }

?>
                </select>
        </font></strong> 
<input class="class01" type="submit" name="Submit4" value="Visualizar analise todos Funcion&aacute;rios">
      </form></td>
    </tr>
    <tr>

      <td>&nbsp;</td>

      <td><form action="inserir.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class="class01" type="submit" name="Submit2" value="Inserir">

      </form></td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
    </tr>
  </table>
<p>&nbsp; </p>



</body>

</html>

