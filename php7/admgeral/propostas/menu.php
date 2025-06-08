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

      <td colspan="3"><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);

?>





</td>

    </tr>

    <tr>

      <td width="13%">&nbsp;</td>

      <td width="40%"><strong><font color="#0000FF" size="4">O que deseja fazer com as propostas?</font></strong></td>
      <td width="55%">&nbsp;</td>

    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit4" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form action="pesquiza_propostas_por_cpf.php" method="post" name="form5">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit5" value="Pesquisar Propostas por CPF">
      </form></td>
      <td>Prazo Limite para envio &agrave; Matriz
        <form name="form6" method="post" action="autalizar_prazo_entrega_do_fisico.php">
          <?

$sql = "SELECT * FROM prazo_entrega_fisico limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$dias = $linha[1];
$ativar_bloqueio = $linha[2];
$date_inicio = $linha[3];

}


?>
          <input name="dias" type="text" id="dias" value="<? echo $dias; ?>" size="2" maxlength="4">
          dias Ativar Bloqueio? 
          <select name="ativar_bloqueio" id="ativar_bloqueio">
            <option selected><? echo $ativar_bloqueio; ?></option>
            <option>Não</option>
            <option>Sim</option>
          </select>
          <input type="submit" name="button" id="button" value="Alterar">
      </form></td>

    </tr>

    <tr>

      <td><div align="center"></div></td>

      <td><form action="informe_num_proposta_para_edicao_de_proposta.php" method="post" name="form3">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit3" value="Editar Proposta por N&ordm; de proposta">
      </form></td>
      <td><form name="form4" method="post" action="informe_num_proposta_para_impressao.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit" value="Impress&atilde;o de propostas">
      </form></td>

    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="exporta_propostas_excel.php" method="post" target="_blank" name="form3">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit2" value="Exporta Propostas excel">
        <strong>
		<br>Secretaria
        <select class='class02' name="secretaria" id="secretaria">
          <option selected><? echo $secretariaretorno; ?></option>
          <?











    $sql = "select * from secretarias order by secretaria asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['secretaria']."</option>";



    }



?>
        </select>
        
      ano
      <input name="ano"  class='class02' type="text" id="ano" size="10" maxlength="4">
	  </strong>
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td colspan="3"><div align="center"><strong><font color="#FF0000">ALTERA&Ccedil;&Atilde;O DE PROPOSTAS SEM ALTERARA&Ccedil;&Atilde;O DE DATAS</font></strong></div></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><form action="editar_proposta_por_num_proposta_sem_alterar_datas.php" method="post" name="form3">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="num_proposta" type="text" id="num_proposta">

        <input type="submit" name="Submit32" value="Editar Proposta por N&ordm; de proposta">

      </form></td>
      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
      <td>&nbsp;</td>

    </tr>

  </table>

<p>&nbsp; </p>

</body>

</html>

