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

<script language="Javascript">

function right(e) {

if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2)){

alert("ATENÇAO!!!... NÃO É PERMITIDO CÓPIAS!");

return false;

}

else if (navigator.appName == 'Microsoft Internet Explorer' &&

(event.button == 2 || event.button == 3)) {

alert("ATENÇAO!!!... NÃO É PERMITIDO CÓPIAS!");

return false;

}

return true;

}

document.onmousedown=right;

if (document.layers) window.captureEvents(Event.MOUSEDOWN);

window.onmousedown=right;

</script>

<head>

<title>CADASTRO DE CLIENTES</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';



			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body  bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>


<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>

<form name="form2" method="post" action="">

</form>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <input type="hidden" name="codigolancamento" id="codigolancamento">
  <input type="hidden" name="solicitacao" id="solicitacao">
<input type="submit" name="Submit3" value="Voltar">

</form>

<?

$cpf = $_POST['cpf'];



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

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
$categoria = $linha[134];

$funcao_operador = $linha[135];


}

?>

<?

if($status_cliente =="Inativo"){
echo "<script>
alert('ATENÇÃO!!!... CLIENTE BLOQUEADO NO SISTEMA, IMPOSSÍVEL EDITAR O CLIENTE!');

window.location = 'menu.php';

</script>";
}
?>

<?



if($mes_niver == ""){

echo "<script>

alert('ATENÇÃO!!!... INFORME O MÊS DO ANIVERSÁRIO QUE SE ENCONTRA AO LADO DA DATA DE NASCIMENTO!.');

</script>";

}

?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' and status = 'Ativo'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[19];

$email_operador_alterou = $linha[20];

$estabelecimento_alterou = $linha[24];

$cidade_estabelecimento_alterou = $linha[25];

$tel_estabelecimento_alterou = $linha[26];

$email_estabelecimento_alterou = $linha[27];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];





?>

<? } ?>

<?

//Define o caminho da pasta/arquivo

//$pasta = "../../$cpf";

//$jaexiste = "Pasta do cliente existente!";

?>

<div align="center">

  <strong><font color="#0000FF" size="4">Tela de edi&ccedil;&atilde;o do cadastro de clientes!</font></strong>

<form name="form3" method="post" action="cria_diretorio.php">

    <div align="center"> <strong>

      <input name="codigo" type="hidden" id="codigo4" value="<? echo $codigo; ?>">

      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">

      </strong>

        <?

//Checa se o arquivo/pasta existe

//if(file_exists($pasta)) { echo $jaexiste; echo'<input type="hidden" name="criar_pasta" value="Não">';}

//else {

//        echo'<input type="submit" name="Submit2" value="Criar Pasta">';

//		        echo'<input type="hidden" name="criar_pasta" value="Sim">';



//}

?>

    </div>

  </form>

  <p>    

  </div>
<form name="form1" method="post" action="grava_editar_cliente.php">



<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td>N&ordm; de Matr&iacute;cula </td>

      <td><strong><font color="#0000FF"><? echo $codigo; ?></font>

          <input name="codigo" type="hidden" id="codigo3" value="<? echo $codigo; ?>">

      Status<font color="#0000FF"><? echo $status_cliente; ?></font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td colspan="2">Como Conheceu a Empresa?
        <select name="resposta" id="resposta">
          <option selected><? echo $resposta; ?></option>
          <?





    $sql = "select * from como_conheceu_empresa order by resposta asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['resposta']."</option>";

    }

?>
      </select></td>
      <td>Perfil</td>
      <td><strong>
        <select name="tipo" id="tipo">
          <option selected><? echo $tipo; ?></option>
          <?





    $sql = "select * from tipos order by tipo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo']."</option>";

    }

?>
        </select>
      </strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td>Nome</td>

      <td><input name="nome" type="text" id="nome2" value="<? echo $nome; ?>" size="50" maxlength="50"></td>
      <td>Secretaria</td>
      <td><strong>
        <select name="secretaria" id="secretaria">
          <option selected><? echo $secretaria; ?></option>
          <?





    $sql = "select * from secretarias order by secretaria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['secretaria']."</option>";

    }

?>
        </select>
      </strong></td>

      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td width="9%">Data Nasc </td>

      <td width="26%"><input name="data_nasc" type="text" id="data_nasc" value="<? echo $data_nasc; ?>" size="15" maxlength="10">

        m&ecirc;s do anivers&aacute;rio

      <input name="mes_niver" type="text" id="mes_niver" value="<? echo $mes_niver; ?>" size="4" maxlength="2"></td>

      <td width="13%">Categoria</td>

      <td width="28%"><strong>
        <select name="categoria" id="categoria">
          <option selected><? echo $categoria; ?></option>
          <?





    $sql = "select * from categorias_clientes order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
        </select>
      </strong></td>
      <td width="24%">&nbsp;</td>
    </tr>

    <tr>
      <td>Naturalidade</td>
      <td><input name="naturalidade" type="text" id="naturalidade" value="<? echo $naturalidade; ?>" size="50" maxlength="50"></td>
      <td>Sexo</td>
      <td><select name="sexo" id="sexo">
        <option selected><? echo $sexo; ?></option>
        <option>Masculino</option>
        <option>Feminino</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td>Estado Civil </td>

      <td><select name="estadocivil" id="select3">

        <option selected><? echo $estadocivil; ?></option>

        <?





    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";

    }

?>

      </select>        </td>

      <td>CPF</td>

      <td><input name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>" size="18" maxlength="14">      </td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>RG</td>

      <td><input name="rg" type="text" id="rg" value="<? echo $rg; ?>" size="25" maxlength="25"> 

        &Oacute;rg&atilde;o 

        <input name="orgao" type="text" id="cpf3" value="<? echo $orgao; ?>" size="15" maxlength="14"></td>

      <td>Emiss&atilde;o</td>

      <td><input name="emissao" type="text" id="cpf4" value="<? echo $emissao; ?>" size="15" maxlength="10"> 

        dd/mm/aaaa </td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Pai</td>

      <td><input name="pai" type="text" id="pai" value="<? echo $pai; ?>" size="50" maxlength="50"></td>

      <td>M&atilde;e</td>

      <td><input name="mae" type="text" id="endereco3" value="<? echo $mae; ?>" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td>Endere&ccedil;o</td>

      <td><input name="endereco" type="text" id="endereco" value="<? echo $endereco; ?>" size="50" maxlength="30">      </td>

      <td>N&uacute;mero</td>

      <td><input name="numero" type="text" id="numero2" value="<? echo $numero; ?>" size="10" maxlength="10">      </td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td><p>Bairro</p></td>

      <td><input name="bairro" type="text" id="bairro" value="<? echo $bairro; ?>" size="50" maxlength="50">      </td>

      <td>Complemento</td>

      <td><input name="complemento" type="text" id="endereco4" value="<? echo $complemento; ?>" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Cidade</td>

      <td><select name="cidade" id="estado">
        <option selected><? echo $cidade; ?></option>
        <?





    $sql = "select * from cidades order by cidade asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['cidade']."</option>";

    }

?>
      </select></td>

      <td>Estado</td>

      <td><select name="estado" id="select7">

        <option selected><? echo $estado; ?></option>

        <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>

      </select></td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td>Cep</td>

      <td><input name="cep" type="text" id="cep" value="<? echo $cep; ?>" size="9" maxlength="9">

Use o formato 00000-000</td>

      <td>Telefone</td>

      <td><input name="telefone" type="text" id="endereco5" value="<? echo $telefone; ?>" size="15" maxlength="14"> </td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td>Celular</td>

      <td><input name="celular" type="text" id="telefone" value="<? echo $celular; ?>" size="15" maxlength="14"></td>

      <td>E-Mail</td>

      <td><input name="email" type="text" id="email" value="<? echo $email; ?>" size="50" maxlength="50"></td>
      <td rowspan="6">&nbsp;</td>
    </tr>

    <tr>

      <td>Banco para pagto </td>

      <td><select name="banco" id="banco">

	  <option selected><? echo $banco; ?></option>

        <?





    $sql = "select * from bancos order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>

      </select></td>

      <td>Ag&ecirc;ncia</td>

      <td><input name="agencia" type="text" id="agencia" value="<? echo $agencia; ?>"></td>
    </tr>

    <tr>

      <td>Conta</td>

      <td><input name="conta" type="text" id="conta" value="<? echo $conta; ?>"></td>

      <td>Senha DATAPREV </td>

      <td><input name="dataprev" type="text" id="num_beneficio23" value="<? echo $dataprev; ?>"></td>
    </tr>

    <tr>

      <td>N&ordm; do Benef&iacute;cio </td>

      <td><input name="num_beneficio" type="text" id="num_beneficio5" value="<? echo $num_beneficio; ?>"></td>

      <td>N&ordm; Benef&iacute;cio2</td>

      <td><input name="num_beneficio2" type="text" id="num_beneficio22" value="<? echo $num_beneficio2; ?>"></td>
    </tr>

    <tr>

      <td>N&ordm; Benef&iacute;cio 3 </td>

      <td><input name="num_beneficio3" type="text" id="num_beneficio32" value="<? echo $num_beneficio3; ?>"></td>

      <td>N&ordm; Benef&iacute;cio 4 </td>

      <td><input name="num_beneficio4" type="text" id="num_beneficio4" value="<? echo $num_beneficio4; ?>"></td>
    </tr>

    <tr>
      <td colspan="2">Tipo de pagto do Benef&iacute;cio      
        <select name="pagto_beneficio" id="cidade">
          <option selected><? echo $pagto_beneficio; ?></option>
          <?





    $sql = "select * from pagto_beneficio order by modo_recebimento asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['modo_recebimento']."</option>";

    }

?>
        </select></td>
      <td>Senha do Servidor</td>
      <td><font color="#0000FF">
        <input name="senha_servidor" type="text" id="senha_servidor" value="<? echo $senha_servidor; ?>">
      </font></td>
    </tr>

    <tr>
      <td colspan="5"><div align="left">____________________________________________________________________________________________________________________________________________________________</div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center"><strong>RESPOSTA PUBLICO / VER MARGEM</strong></div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center">
        <?
//----------------------INICIO DA GRAVA&Ccedil;&Atilde;O E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="responder"){

$codigolancamento = $_POST['codigolancamento'];
$cod_cli_gravar = $_POST['cod_cli'];
$date_gravar = date('Y-m-d');
$hora_gravar = date('H:i:s');
$status = $_POST['status'];
$operador_gravar = $_POST['operador'];

$margem_disponivel = $_POST['margem_disponivel'];
$obs = $_POST['obs'];

$valor_parcela = $_POST['valor_parcela'];
$saldo_devedor = $_POST['saldo_devedor'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_contrato = $_POST['prazo_contrato'];
$aprovacao = $_POST['aprovacao'];
$valor_liberado = $_POST['valor_liberado'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`margem_portabilidade` set `data_resposta` = '$date_gravar',`hora_resposta` = '$hora_gravar',`status` = '$status',`margem_disponivel` = '$margem_disponivel',`obs` = '$obs' where `margem_portabilidade`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "SELECT * FROM parcelas_pedido_margem where pedido = '$codigolancamento' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo_parcelas_pedido_margem = $linha[0];


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`parcelas_pedido_margem` set `pedido` = '$codigolancamento',`status` = '$status' where `parcelas_pedido_margem`. `codigo` = '$codigo_parcelas_pedido_margem'";
}

mysql_query($comando,$conexao);

}




}


//---------------------FIM DA GRAVA&Ccedil;&Atilde;O E ENVIO PARA O OPERADOR------------------------
?>
        <?

$sql = "SELECT * FROM margem_portabilidade where cod_cli = '$codigo' and (status = 'Analisado' or status = 'Pendente') order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$cod_cli = $linha[18];

$nome = $linha[1];

$cpf = $linha[2];

$operador_solicitante = $linha[5];

$num_beneficio = $linha[8];

$num_beneficio2 = $linha[9];

$num_beneficio3 = $linha[10];

$num_beneficio4 = $linha[11];

$horacadastro = $linha[15];

$datacadastro = $linha[17];

$secretaria = $linha[21];

$status = $linha[19];

$tipo = $linha[20];

$rg = $linha[22];

$mae = $linha[23];

$data_nasc = $linha[24];

$senha_servidor = $linha[25];

$fazer_portabilidade = $linha[26];

$data_resposta = $linha[27];

$hora_resposta = $linha[28];

$obs = $linha[29];

$margem_disponivel = $linha[30];



?>
        <table width="100%" border="0" align="center">
          <tr>
            <td colspan="2">Resposta do pedido N&ordm; <? echo $codigolancamento; ?></td>
            <td width="6%">Status</td>
            <td width="11%"><table width="100%" border="1">
              <tr>
                <td><? echo $status; ?></td>
              </tr>
            </table></td>
            <td width="16%"><div align="center">Data / Hora da resposta: </div></td>
            <td width="21%"><table width="100%" border="1">
              <tr>
                <td><? echo "$data_resposta / $hora_resposta"; ?></td>
              </tr>
            </table></td>
            <td width="6%">&nbsp;</td>
            <td width="6%">&nbsp;</td>
            <td width="6%">&nbsp;</td>
            <td width="6%">&nbsp;</td>
          </tr>
          <tr>
            <td width="15%">Margem Disponivel</td>
            <td colspan="2"><table width="100%" border="1">
              <tr>
                <td><? echo $margem_disponivel; ?></td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Observa&ccedil;&otilde;es</td>
            <td colspan="4"><table width="100%" border="1">
              <tr>
                <td><? echo $obs; ?></td>
                </tr>
            </table></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <? } ?>
      </div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center">
        <table width="100%" border="0" align="center">
          <tr>
            <td colspan="5"><div align="center"></div></td>
          </tr>
          <?

echo "<form name='form1' method='post' action='margem_a_verificar.php'>

  <tr>
    <td><div align='center'>
      <input name='solicitacao' type='hidden' id='solicitacao' value='gravar_parcela'>
      <input name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>
      <input name='cod_cli' type='hidden' id='cod_cli' value='$cod_cli'>
      <input name='status' type='hidden' id='status' value='A VERIFICAR'>
      Valor Parcela</div></td>
    <td><div align='center'>Banco a ser Portado</div></td>
    <td><div align='center'>Valor Liberado</div></td>
    <td><div align='center'>Parcelas em Aberto</div></td>
    <td><div align='center'>Prazo do contrato</div></td>
    <td><div align='center'>Faixa RCO</div></td>
  </tr>";
  

$sql = "SELECT * FROM parcelas_pedido_margem where pedido = '$codigolancamento' and (status = 'Analisado' or status = 'Pendente') order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$pedido = $linha[0];
$valor_parcela = $linha[8];
$banco_a_ser_portado = $linha[9];
$valor_liberado = $linha[10];
$parcelas_em_aberto = $linha[11];
$prazo_do_contrato = $linha[12];
$faixa_rco = $linha[14];


echo "<tr>
          <td><table width='100%' border='1'><tr><td><div align='center'>$valor_parcela</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$banco_a_ser_portado</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$valor_liberado</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$parcelas_em_aberto</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$prazo_do_contrato</div></td></tr></table></td>
          <td><table width='100%' border='1'><tr><td><div align='center'>$faixa_rco</div></td></tr></table></td>
        </tr>";
		
}
	

?>
        </table>
      </div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="left">____________________________________________________________________________________________________________________________________________________________</div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center"><strong>RESPOSTA VER MARGEM AT&Eacute; 10-07-2015</strong></div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center">
        <textarea name="obs4" cols="100" rows="4" <?  echo "readonly='readonly'"; ?> id="obs4"><? echo $obs_das_margens; ?></textarea>
      </div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center"><strong>RESPOSTA INSS / VER POSSIBILIADES</strong></div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center">
        <textarea name="hiscon" cols="150" rows="10" readonly="readonly" id="hiscon"><?  

$sql = "SELECT * FROM hiscon where cpf = '$cpf' order by codigo desc";

$res = mysql_query($sql);

$reg = 0;

//echo "<tr>";

while($linha=mysql_fetch_row($res)) {



//$codigo = $linha[0];

$cod_cli = $linha[1];

$cpf = $linha[2];

$data = $linha[3];

$hora = $linha[4];

$observacoes_do_cliente = $linha[5];

$operador = $linha[6];





echo "$data - $hora - "."$observacoes_do_cliente - "."$operador";

?>



<?



if($reg==1){

//echo "</tr>";

$reg=0;

}





}

	  

	  

	  

	  

	   ?>
        </textarea>
      </div></td>
    </tr>
    <tr>

      <td>Obs</td>

      <td colspan="2">      <strong><font color="#0000FF"><? echo $obs; ?>

</font>

          <input name="obs" type="hidden" id="obs" value="<? echo $obs; ?>">

      <font color="#0000FF">      </font></strong></td>

      <td>&nbsp;</td>
      <td>Obs Telemarketing</td>
    </tr>

    <tr>

      <td>Obs</td>

      <td><textarea name="obs2" cols="45" rows="7"  id="obs2"><? echo $obs2; ?></textarea></td>

      <td colspan="2" valign="top"><textarea name="obs_cli" cols="45" rows="7" readonly="readonly" id="obs_cli"><?  

$sql = "SELECT * FROM observacoes_de_clientes where cpf = '$cpf' order by codigo desc";

$res = mysql_query($sql);

$reg = 0;

//echo "<tr>";

while($linha=mysql_fetch_row($res)) {



//$codigo = $linha[0];

$cod_cli = $linha[1];

$cpf = $linha[2];

$data = $linha[3];

$hora = $linha[4];

$observacoes_do_cliente = $linha[5];

$operador = $linha[6];





echo "$data - $hora - "."$observacoes_do_cliente - "."$operador";

?>



<?



if($reg==1){

//echo "</tr>";

$reg=0;

}





}

	  

	  

	  

	  

	   ?></textarea></td>
      <td valign="top"><textarea name="obs_telemarketing" cols="45" rows="7" readonly="readonly" id="obs_telemarketing"><?  

$sql = "SELECT * FROM obs_telemarketing where cod_cliente = '$codigo' order by codigo desc";

$res = mysql_query($sql);

$reg = 0;

//echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$cod_cliente = $linha[1];

$dia = $linha[2];

$mes = $linha[3];

$ano = $linha[4];

$hora = $linha[5];

$operador = $linha[6];

$estab_pertence = $linha[7];

$cidade_estab_pertence = $linha[8];

$obs = $linha[9];



echo "$dia/$mes/$ano - $hora - "."$operador - $estab_pertence - $cidade_estab_pertence - "."$obs";

?>



<?



if($reg==1){

//echo "</tr>";

$reg=0;

}





}

	  

	  

	  

	  

	   ?>

      </textarea></td>
    </tr>

    <tr>

      <td colspan="2"><strong><font color="#0000FF">

        <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d-m-Y'); ?>">

        <input name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo $hora_atual; ?>">

        <input name="operador_alterou" type="hidden" id="operador3" value="<? echo $operador_alterou; ?>">
        <input name="funcao_operador" type="hidden" id="funcao_operador" value="<? echo $funcao_operador; ?>">

        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $cel_operador_alterou; ?>">

        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_operador_alterou; ?>">
        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estab_pertence; ?>">
        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estab_pertence; ?>">
        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estab_pertence; ?>">
        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estab_pertence; ?>">
      </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit" value="Alterar dados do Cliente"> 

          <input type="reset" name="Submit2" value="Limpar"> </td><td><div align="right"> </div></td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="5"><input name="parc1" type="hidden" id="parc1" value="<? echo $parc1; ?>">
        <input name="parc2" type="hidden" id="parc2" value="<? echo $parc2; ?>">
        <input name="parc3" type="hidden" id="parc3" value="<? echo $parc3; ?>">
        <input name="parc4" type="hidden" id="parc4" value="<? echo $parc4; ?>">
        <input name="parc5" type="hidden" id="parc5" value="<? echo $parc5; ?>">
        <input name="parc6" type="hidden" id="parc6" value="<? echo $parc6; ?>">
        <input name="parc7" type="hidden" id="parc7" value="<? echo $parc7; ?>">
        <input name="banco1" type="hidden" id="banco1" value="<? echo $banco1; ?>">
        <input name="banco2" type="hidden" id="banco2" value="<? echo $banco2; ?>">
        <input name="banco3" type="hidden" id="banco3" value="<? echo $banco3; ?>">
        <input name="banco4" type="hidden" id="banco4" value="<? echo $banco4; ?>">
        <input name="banco5" type="hidden" id="banco5" value="<? echo $banco5; ?>">
        <input name="banco6" type="hidden" id="banco6" value="<? echo $banco6; ?>">
        <input name="banco7" type="hidden" id="banco7" value="<? echo $banco7; ?>">
        <input name="vencto1" type="hidden" id="vencto1" value="<? echo $vencto1; ?>">
        <input name="vencto2" type="hidden" id="vencto2" value="<? echo $vencto2; ?>">
        <input name="vencto3" type="hidden" id="vencto3" value="<? echo $vencto3; ?>">
        <input name="vencto4" type="hidden" id="vencto4" value="<? echo $vencto4; ?>">
        <input name="vencto5" type="hidden" id="vencto5" value="<? echo $vencto5; ?>">
        <input name="vencto6" type="hidden" id="vencto6" value="<? echo $vencto6; ?>">
        <input name="vencto7" type="hidden" id="vencto7" value="<? echo $vencto7; ?>">
        <input name="compra1" type="hidden" id="compra1" value="<? echo $compra1; ?>">
        <input name="compra2" type="hidden" id="compra3" value="<? echo $compra2; ?>">
        <input name="compra3" type="hidden" id="compra4" value="<? echo $compra3; ?>">
        <input name="compra4" type="hidden" id="compra5" value="<? echo $compra4; ?>">
        <input name="compra5" type="hidden" id="compra6" value="<? echo $compra5; ?>">
        <input name="compra6" type="hidden" id="compra7" value="<? echo $compra6; ?>">
        <input name="compra7" type="hidden" id="compra8" value="<? echo $compra7; ?>">
        <input name="saldo1" type="hidden" id="compra2" value="<? echo $saldo1; ?>">
        <input name="saldo2" type="hidden" id="compra9" value="<? echo $saldo2; ?>">
        <input name="saldo3" type="hidden" id="compra10" value="<? echo $saldo3; ?>">
        <input name="saldo4" type="hidden" id="compra11" value="<? echo $saldo4; ?>">
        <input name="saldo5" type="hidden" id="compra12" value="<? echo $saldo5; ?>">
        <input name="saldo6" type="hidden" id="compra13" value="<? echo $saldo6; ?>">
      <input name="saldo7" type="hidden" id="compra14" value="<? echo $saldo7; ?>"></td>
    </tr>
  </table>

</form>

<form name="form1" method="post" action="">

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2"><strong>Cadastro efetuado por <br>

        </strong><strong><font color="#0000FF"><? echo $operador; ?>

        

      </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td width="20%"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estab_pertence; ?>        </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estab_pertence; ?>

      </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estab_pertence; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estab_pertence; ?>          </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><strong>Data do Cadastro <br>

              <font color="#0000FF"><? echo $datacadastro; ?> </font></strong></td>

      <td><strong>Hora que foi efetuado o Cadastro <br>

              <font color="#0000FF"><? echo $horacadastro; ?> </font></strong></td>

      <td><strong></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>

</form>

<form name="form1" method="post" action="">

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

?>



  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2" valign="top" bgcolor="#CCCCCC"><strong>&Uacute;ltima altera&ccedil;&atilde;o efetuada pelo operador: <br>

      </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%" valign="top" bgcolor="#CCCCCC"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estab_pertence; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%" valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estab_pertence; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td valign="top" bgcolor="#CCCCCC"><strong>Data do Cadastro <br>

            <font color="#0000FF"><? echo $dataalteracao; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong>Hora que foi efetuado o Cadastro <br>

            <font color="#0000FF"><? echo $horaalteracao; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong></strong></td>

      <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <? } ?>

</form>

<form name="form1" method="post" action="">

  <?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' and status = 'Ativo'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[19];

$email_operador_alterou = $linha[20];

$estabelecimento_alterou = $linha[24];

$cidade_estabelecimento_alterou = $linha[25];

$tel_estabelecimento_alterou = $linha[26];

$email_estabelecimento_alterou = $linha[27];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];





?>

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2"><strong><font color="#FF0000">Cadastro atualmente sendo alterado por: </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br>

      </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estab_pertence; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estab_pertence; ?> </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>

      <td><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><strong><font color="#0000FF"> </font><font color="#0000FF"> </font></strong></td>

      <td>&nbsp;</td>

      <td><strong></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

<? } ?>

</form>

</body>

</html>

