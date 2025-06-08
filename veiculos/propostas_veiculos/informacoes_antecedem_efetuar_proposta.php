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
.style1 {
	color: #FF0000;
	font-weight: bold;
}

-->

</style></head>



<body>

<p><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';





$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

$cpf = $_POST['cpf'];

$nome_cli = $_POST['nome_cli'];

$valor_venda = $_POST['valor_venda'];

$valor_entrada = $_POST['valor_entrada'];

$categoria_veiculo = $_POST['categoria_veiculo'];

$r = $_POST['r'];

$coeficiente = $_POST['coeficiente'];

$codigo_tabela = $_POST['codigo_tabela'];

$mista = $_POST['mista'];

$num_parcelas = $_POST['num_parcelas'];

$tipo_pessoa = $_POST['tipo_pessoa'];

$bem = $_POST['bem'];



?>

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];



}

?>





<?



error_reporting(E_ALL);



?>



</p>

<form name="form1" method="post" action="../index.php">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estabPertence = $linha[46];

$email_estab_pertence = $linha[47];

}





?>
  <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
<form action="efetuar_proposta.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>
      <td>&nbsp;</td>
      <td><input name="nome_cli" type="hidden" id="nome_cli" value="<? echo $nome_cli; ?>"></td>
    </tr>
    <tr>

      <td>Estabelecimento da proposta </td>

      <td><? echo $estabelecimento_proposta; ?>        <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>"></td>
    </tr>

    <tr>

      <td width="24%">CPF/CNPJ do cliente<br></td>

      <td width="76%"><? echo $cpf; ?>

        <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>"></td></tr>

    <tr>

      <td>Tipo de Pessoa </td>

      <td><strong><font color="#0000FF">

        <select name="tipo_pessoa" id="tipo_pessoa">

          <option selected><? echo $tipo_pessoa; ?></option>

          <?





    $sql = "select * from tipos_pessoas order by pessoa asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['pessoa']."</option>";

    }

?>
        </select>

      </font></strong></td>
    </tr>

    <tr>

      <td>Valor de venda do bem</td>

      <td>R$ 

      <input name="valor_venda" type="text" id="valor_venda" value="<? echo $valor_venda; ?>">

      Formato 0000.00 </td>
    </tr>

    <tr>

      <td>Valor de entrada </td>

      <td>R$ 

      <input name="valor_entrada" type="text" id="valor_entrada" value="<? echo $valor_entrada; ?>">

      Formato 0000.00 </td>
    </tr>


    <tr>

      <td>Coeficiente</td>

      <td><input name="coeficiente" type="text" id="coeficiente" value="<? echo $coeficiente; ?>"> 
        <span class="style1">Aten&ccedil;&atilde;o para o formato 0.03500</span></td>
    </tr>

    <tr>

      <td>N&ordm; de parcelas </td>

      <td><select name="num_parcelas" id="num_parcelas">

        <option><? echo $num_parcelas; ?></option>

        <option>12</option>

        <option>18</option>

        <option>24</option>

        <option>36</option>

        <option>42</option>

        <option>48</option>

        <option>50</option>

        <option>60</option>

        <option>72</option>

      </select></td>
    </tr>

    <tr>

      <td>Servi&ccedil;o de terceiros </td>

      <td><select name="r" id="select5">
        <option><? echo $r; ?></option>

        <option>0</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>

      </select></td>
    </tr>

    <tr>

      <td>Tipo de ve&iacute;culo a ser financiado </td>

      <td><strong>

        <select name="categoria_veiculo" id="select8">

          <option selected></option>

          <?





    $sql = "select * from categorias_veiculos order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
        </select>

      </strong></td>
    </tr>

    <tr>

      <td>Tipo do bem </td>

      <td><strong><font color="#0000FF">

        <select name="bem" id="select11">

          <option selected><? echo $bem; ?></option>

          <?





    $sql = "select * from tipos_bens order by bem desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['bem']."</option>";

    }

?>
        </select>

      </font></strong></td>
    </tr>

    <tr>

      <td><input name="codigo_tabela" type="hidden" id="codigo_tabela" value="<? echo $codigo_tabela; ?>">
        <input name="mista" type="hidden" id="mista" value="<? echo "Não"; ?>"></td>

      <td><input name="valor_liberado" type="hidden" id="valor_liberado" value="<? echo 0.00; ?>">      </td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit" value="Efetuar Proposta"></td>
    </tr>
  </table>

</form>



<p>&nbsp;</p>

</body>

</html>

