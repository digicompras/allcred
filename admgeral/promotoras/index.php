<?php

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

<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>



<body>

<table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="5">

        <?

require '../../conect/conect.php';


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[19];

$email_operador_alterou = $linha[20];

$estabelecimento_alterou = $linha[24];

$cidade_estabelecimento_alterou = $linha[25];

$tel_estabelecimento_alterou = $linha[26];

$email_estabelecimento_alterou = $linha[27];


}

?>

	  </td>

    </tr>

    <tr>

      <td width="12%">&nbsp;</td>

      <td colspan="4"><strong><font color="#0000FF" size="4">TRABALHANDO AS PROMOTORAS</font></strong></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td width="33%" colspan="2"><div align="center">
        <?
  $solicitacao = $_POST['solicitacao'];
  $promotora = $_POST['promotora'];
  $situacao = "Ativo";


if($solicitacao=="inserir"){
	
	if(empty($promotora)){
		
		echo "<script>

alert('ATENCAO!!!... $operador_alterou Voce deve preencher o campo Promotora pois, o mesmo não deve estar vaizo');

</script>";
		
	}
	else{
		
	$sql = "select * from promotoras where promotora = '$promotora'";
$res = mysql_query($sql);
$registros_encontrados = mysql_num_rows($res);
		
		
		if($registros_encontrados>=1){
			
			echo "<script>

alert('ATENCAO!!!... $operador_alterou Voce tentou inserir a nomenclatura $promotora já existente!!!... Edite-a!');

</script>";
		}
		else{

$comando = "insert into promotoras(promotora,situacao) values('$promotora','$situacao')";
mysql_query($comando,$conexao) or die("Erro ao gravar Promotora");

echo "Promotora inserida com sucesso<br>";
			
		}

	}

}

?>
      </div></td>
      <td width="21%">&nbsp;</td>
      <td width="34%"><?
  $solicitacao = $_POST['solicitacao'];
   $codigo = $_POST['codigo'];
  $situacao_alterar = $_POST['situacao'];
 
  

if($solicitacao=="editar"){
	
if($situacao_alterar=="Ativo"){
	
$situacao = "Inativo";

}

if($situacao_alterar=="Inativo"){
	
$situacao = "Ativo";

}
	
	
	

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}


$comando = "update `$db`.`promotoras` set `situacao` = '$situacao' where `promotoras`. `codigo` = '$codigo' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar Promotora");

}

?></td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

  </table>
<p>&nbsp; </p>
<table width="100%" border="0">
  <tr>
    <td width="46%" valign="top"><div align="center">
      <form name="form3" method="post" action="index.php">
        <table width="100%" border="0">
          <tr>
            <td width="2%"><div align="center"></div></td>
            <td width="43%"><div align="center">Promotora</div></td>
            <td width="19%"><div align="center"></div></td>
            <td width="3%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <input name="solicitacao" type="hidden" id="solicitacao" value="inserir">
              <input class="class02" name="promotora" type="text" id="promotora">
            </div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center">
              <input class="class01" type="submit" name="Submit2" value="Inserir">
            </div>              <div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
      </form>
    </div>      <div align="center"></div></td>
    <td width="8%"><div align="center"></div></td>
    <td width="46%"><div align="center">
      <table width="100%" border="0">
        <tr>
          <td width="2%"><div align="center"></div></td>
          <td width="31%"><div align="center">Promotoras</div></td>
          <td width="26%"><div align="center"></div></td>
          <td width="9%"><div align="center"></div></td>
        </tr>
<?



$sql = "select * from promotoras order by promotora asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg = 0;

$codigo = $linha[0];
$promotora = $linha[1];
$situacao = $linha[2];

?>
        <tr>
          <td><div align="center"></div></td>
          <td><div align="center"><? echo $promotora; ?></div></td>
          <td><div align="center">
            <form name="form4" method="post" action="index.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="editar">
              <input name="situacao" type="hidden" id="situacao" value="<? echo $situacao; ?>">
              <input class="class01" type="submit" name="button" id="button" value="<? echo $situacao; ?>">
              </form>
          </div></td>
          <td><div align="center"></div></td>
        </tr>
<?

}

?>
        </table>
    </div>      <div align="center"></div></td>
  </tr>
</table>
</body>

</html>

