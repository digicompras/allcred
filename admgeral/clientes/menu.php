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

<style type="text/css">
.style1 {color: #000000;
	font-size: 12px;
	font-weight: bold;
}
.style2 {color: #000000;
	font-size: 24px;
	font-weight: bold;
}

.style71 {font-size: 16px}
.style71 {font-size: 16px}
.class01 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
.style711 {font-size: 16px}
</style>
</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="3"><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);



?>                    </td>
    </tr>

    <tr>

      <td colspan="2"><form action="../principal.php" method="post" name="form1" target="_top">
        <input class="class01" type="submit" name="Submit7" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form>        <strong><font color="#0000FF" size="4">O que deseja fazer com os clientes?</font></strong></td>
      <td width="44%">&nbsp;</td>
    </tr>

    <tr>

      <td width="32%"><form name="form6" method="post" action="informe_cpf_para_exclusao.php">
        <strong class="style2">
        <?
			
$sql = "select * from clientes where cpf = ''";

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



echo "Foram encontrados ".$registros_total." registros sem o CPF no cadastro!!!...";

?>
        </strong>
        <input type="hidden" name="cpf" id="cpf">
        <input class="class01" type="submit" name="button" id="button" value="Verificar">
      </form></td>
      <td width="24%"><form action="../relatorios/exporta_cliente_somente_telefone.php" method="post" name="form2" target="_blank">
        <strong><span class="style71">
          <? 	

$sql = "SELECT * FROM clientes ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_cli = mysql_num_rows($res);



}



  ?>
          </span></strong>
        <input class="class01" type="submit" name="button2" id="button2" value="<? echo "Somente telefone"; ?>">
      </form></td>
      <td><form action="../relatorios/exporta_cliente_somente_email.php" method="post" name="form2" target="_blank">
        <strong><span class="style711">
          <? 	

$sql = "SELECT * FROM clientes ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_cli = mysql_num_rows($res);



}



  ?>
          </span></strong>
        <input class="class01" type="submit" name="button3" id="button3" value="<? echo "Somente Email"; ?>">
      </form></td>
    </tr>

    <tr>

      <td colspan="2"><form action="pesquiza_cpf.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class="class01" type="submit" name="Submit2" value="Cadastrar Cliente ">

      </form></td>
      <td><form action="exporta_excel_nome_cidade_telefones.php" method="post" name="form4" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class01" type="submit" name="Submit4" value="Listagem e totaliza&ccedil;&atilde;o de clientes cadastrados">
      </form></td>
    </tr>

    <tr>

      <td colspan="2"><form name="form5" method="post" action="editar_cliente_por_codigo.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class02" name="codigo" type="text" id="codigo">
        <input class="class01" type="submit" name="Submit" value="Editar Cliente por N&ordm; de Matr&iacute;cula">
      </form></td>
      <td><form action="../relatorios/relatorio_de_alteracao_de_clientes.php" method="post" name="form5" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <select class="class02" name="operador_alterou" id="nome">
          <option selected>Selecione o(a) operador(a)</option>
          <?

    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }

?>
        </select>
        <select class="class02" name="dataalteracao" id="operador_alterou">
          <option selected>
            <?

    $sql = "select * from clientes group by dataalteracao order by dataalteracao desc limit 500";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dataalteracao']."</option>";

    }

?>
          </option>
        </select>
        <input class="class01" type="submit" name="Submit6" value="Relat&oacute;rio de clientes alterados por data">
      </form></td>
    </tr>

    <tr>

      <td colspan="2"><form name="form3" method="post" action="editar_cliente.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class02" name="cpf" type="text" id="cpf">
        <input class="class01" type="submit" name="Submit3" value="Editar Cliente por CPF">
      </form></td>
      <td><form name="form4" method="post" action="informe_cpf_para_exclusao.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class01" type="submit" name="Submit42" value="Excluir Cliente ">
      </form></td>
    </tr>

    <tr>
      <td colspan="2"><form action="editar_cliente_por_email.php" method="post" name="form5">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class02" name="email" type="text" id="nome3" value="" size="50">
<input class="class01" type="submit" name="Submit12" value="Busca por email">
      </form></td>
      <td><form action="../relatorios/relatorio_de_clientes_por_categoria.php" method="post" name="form5" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <select class="class02" name="categoria" id="categoria">
          <option selected>
            <?

    $sql = "select * from categorias_clientes where situacao = 'Ativo' order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
          </option>
        </select>
        <input class="class01" type="submit" name="Submit8" value="Relat&oacute;rio de clientes por categoria">
      </form></td>
    </tr>
    <tr>

      <td colspan="2"><form name="form4" method="post" action="menu.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class02" name="nome" type="text" id="nome2" value="TODOS" size="50">
        <input class="class01" type="submit" name="Submit9" value="Buscar">
      </form></td>
      <td><form action="../relatorios/relatorio_de_clientes_por_secretaria.php" method="post" name="form5" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <select class="class02" name="secretaria" id="secretaria">
          <option selected>
            <?

    $sql = "select * from secretarias group by secretaria order by secretaria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['secretaria']."</option>";

    }

?>
          </option>
        </select>
        <input class="class01" type="submit" name="Submit11" value="Relat&oacute;rio de clientes por secretaria">
      </form></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><form action="../etiquetas/cidade_e_secretaria.php" method="post" name="form5" target="_blank">
        <p style="font-weight: bold">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          Cidade
          <select class="class02" name="cidade" id="cidade">
            <?
    $sql = "select * from cidades order by cidade asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['cidade']."</option>";

    }

?>
          </select>
        Secretaria
        <select class="class02" name="secretaria" id="secretaria">
          <option selected>
            <?

    $sql = "select * from secretarias group by secretaria order by secretaria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['secretaria']."</option>";

    }

?>
            </option>
        </select>
        <input class="class01" type="submit" name="Submit13" value="Relatorio de clientes por cidade e  secretaria">
        <span style="text-align: center"></span></p>
      </form></td>
    </tr>
  </table>

<p>&nbsp; </p>
<table width="100%"  border="0">
  <tr class="style1">
    <td><div align="center" class="style1">Nome do Cliente </div></td>
    <td><div align="center" class="style1"><strong>Cadastro efetuado por</strong></div></td>
    <td><div align="center" class="style1">cpf</div></td>
    <td><div align="center" class="style1">Celular</div></td>
    <td><div align="center" class="style1">#</div></td>
  </tr>
  <?
$nome = $_POST['nome'];



if($nome=="TODOS"){

$sql = "select * from clientes order by nome asc";

}

else{

if(empty($nome)){

$sql = "select * from clientes where nome = '.' order by nome asc";



}

else{

$sql = "select * from clientes where nome like '$nome%' order by nome asc";

}}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo = $linha[0];

$nome = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

//$operador_alterou = $linha[33];

//$cel_operador_alterou = $linha[34];

//$email_operador_alterou = $linha[35];

//$estabelecimento_alterou = $linha[36];

//$cidade_estabelecimento_alterou = $linha[37];

//$tel_estabelecimento_alterou = $linha[38];

//$email_estabelecimento_alterou = $linha[39];

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$obs2 = $linha[77];





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[107];

$saldo1 = $linha[108];
$saldo2 = $linha[109];
$saldo3 = $linha[110];
$saldo4 = $linha[111];
$saldo5 = $linha[112];
$saldo6 = $linha[113];
$saldo7 = $linha[114];
$naturalidade = $linha[115];
$pagto_beneficio = $linha[116];



$resposta = $linha[119];



$secretaria = $linha[124];
$senha_servidor = $linha[125];
$fazer_portabilidade = $linha[126];
$obs_das_margens = $linha[127];


$valor_parcela = $linha[128];
$saldo_devedor = $linha[129];
$parcelas_em_aberto = $linha[130];
$prazo_contrato = $linha[131];
$aprovacao = $linha[132];
$valor_liberado = $linha[133];




?>
  <tr>
    <td width="20%" valign="top"><div align="center">
      <form name="form1" method="post" action="editar_cliente.php" >
        <div align="center">
          <input name="cpf" type="hidden" id="codigo2" value="<? echo $cpf;  ?>">
          <input class="class01" type="submit" name="Submit5" value="<? echo $nome; ?>">
          </div>
        </form>
    </div></td>
    <td width="17%" valign="top"><div align="center"><strong><font color="#0000FF"><? echo $operador; ?></font></strong></div></td>
    <td width="13%" valign="top"><div align="center"><strong><font color="#0000FF"><? echo $cpf; ?></font></strong></div></td>
    <td width="14%" valign="top"><div align="center"><strong><font color="#0000FF"><? echo $celular; ?></font></strong></div></td>
    <td width="23%" valign="top"><div align="center">
      <form name="form1" method="post" action="excluir_cliente.php" >
        <div align="center">
          <input name="codigo" type="hidden" id="codigo3" value="<? echo $cpf;  ?>">
          <input class="class01" type="submit" name="Submit10" value="Excluir">
        </div>
      </form>
    </div></td>
  </tr>
  <? } ?>
</table>
</body>

</html>

