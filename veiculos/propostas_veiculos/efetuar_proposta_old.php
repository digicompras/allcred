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
<title>FICHA PROPOSTA DE FINANCIAMENTO DE VEICULO </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../../conect/conect.php';

$estabelecimento_proposta = $_POST['estabelecimento_proposta'];
$cpf = $_POST['cpf'];
$valor_venda = $_POST['valor_venda'];
$valor_entrada = $_POST['valor_entrada'];
$categoria_veiculo = $_POST['categoria_veiculo'];
$r_2 = $_POST['r'];
$r_calcula = $_POST['r']/100;

$r = $r_calcula;

$sql = "SELECT * FROM tac where categoria_veiculo = '$categoria_veiculo'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$tac = $linha[2];
}



$diferenca = bcsub($valor_venda,$valor_entrada,2);


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  
<? } ?>




<form name="form1" method="post" action="pesquiza_cpf.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Voltar">
</form>

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



$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_proposta' and operador_atendente = '$nome_op'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nfantasia = $linha[1];
$fone_estab = $linha[19];
$email_estab = $linha[20];
$proprietario = $linha[20];
$operador_atendente = $linha[41];

}

?>
<form name="form1" method="post" action="grava_proposta.php">

<table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">FICHA PROPOSTA DE FINANCIAMENTO DE VEICULO </font></strong></div></td>
    </tr>
    <tr>
      <td width="16%">Operador</td>
      <td width="35%"><strong><font color="#0000FF"><? echo $operador_atendente; ?>
            <input name="operador_atendente" type="hidden" id="operador_atendente" value="<? echo $operador_atendente; ?>">
</font></strong></td>
      <td width="14%">&nbsp;</td>
      <td width="35%"><strong></strong>      </td>
    </tr>
    <tr>
      <td>Estabelecimento</td>
      <td><strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?>
            <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">
      </font></strong></td>
      <td>Data Proposta </td>
      <td><strong><font color="#0000FF">
            <? echo date('d-m-Y'); ?>
            <input name="dataproposta" type="hidden" id="dataproposta" value="<? echo date('d/m/Y'); ?>">
            <input name="horaproposta" type="hidden" id="horaproposta2" value="<? echo date('H:i:s'); ?>">
            <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo date('m-Y'); ?>">
            <input name="status" type="hidden" id="status" value="<? echo "Em Andamento"; ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td>Perfil do cliente </td>
      <td><strong><font color="#0000FF"><? echo $tipo; ?>
            <select name="tipo" id="tipo">
              <option>Proponente</option>
              <option>Avalista</option>
              <option>Conjuge</option>
            </select>
</font></strong></td>
      <td>Tipo proposta </td>
      <td><strong><font color="#0000FF"><? echo $tipo_proposta; ?>
            <select name="tipo_proposta" id="tipo_proposta">
              <option>CDC</option>
              <option>Leasing</option>
              <option>Cons&oacute;rcio</option>
              <option>Seguro</option>
            </select>
</font></strong></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">DADOS DO CLIENTE </font></strong></div></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td><input name="nome" type="text" id="nome" value="<? echo $nome_cli; ?>" size="50" maxlength="50"></td>
      <td>Tipo de Pessoa </td>
      <td><select name="tipo_pessoa" id="tipo_pessoa">
        <option>F&iacute;sica</option>
        <option>Jur&iacute;dica</option>
      </select>
       Data Nasc 
       <input name="data_nasc" type="text" id="data_nasc4" value="<? echo $data_nasc_cli; ?>" size="15" maxlength="10"></td>
    </tr>
    <tr>
      <td>CPF</td>
      <td><input name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>">
      <strong></strong></td>
      <td>RG</td>
      <td><input name="rg" type="text" id="rg2" value="<? echo $rg_cli; ?>" size="25" maxlength="25"></td>
    </tr>
    <tr>
      <td>&Oacute;rg&atilde;o Emissor </td>
      <td><input name="orgao" type="text" id="orgao2" value="<? echo $orgao_cli; ?>" size="15" maxlength="14"></td>
      <td>Data de Emiss&atilde;o</td>
      <td><input name="emissao" type="text" id="emissao2" value="<? echo $emissao_cli; ?>" size="15" maxlength="10"></td>
    </tr>
    <tr>
      <td>Sexo</td>
      <td><select name="sexo" id="select3">
        <option selected><? echo $sexo_cli; ?></option>
        <option>Masculino</option>
        <option>Feminino</option>
      </select></td>
      <td>Estado Civil</td>
      <td><select name="estadocivil" id="select6">
        <option selected><? echo $estadocivil_cli; ?></option>
        <?


    $sql = "select * from estado_civil order by estadocivil asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td>Nacionalidade</td>
      <td><select name="nacionalidade" id="select7">
        <option><? echo $nacionalidade_cli; ?></option>
        <option>Brasileira</option>
        <option>Estrangeira</option>
            </select></td>
      <td>Quant Dependentes </td>
      <td><input name="quant_dependente" type="text" id="quant_dependente" size="4" maxlength="2"></td>
    </tr>
    <tr>
      <td>Pai</td>
      <td><input name="pai" type="text" id="pai" value="<? echo $pai_cli; ?>" size="50" maxlength="50"></td>
      <td>M&atilde;e</td>
      <td><input name="mae" type="text" id="mae2" value="<? echo $mae_cli; ?>" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Conjuge</td>
      <td><input name="conjuge" type="text" id="conjuge" size="50" maxlength="50"></td>
      <td>Data nascimento </td>
      <td><input name="data_nasc_conjuge" type="text" id="data_nasc" value="<? echo $data_nasc_cli; ?>" size="15" maxlength="10"></td>
    </tr>
    <tr>
      <td>Endere&ccedil;o</td>
      <td><input name="endereco" type="text" id="endereco2" value="<? echo $endereco_cli; ?>" size="50" maxlength="50"></td>
      <td>N&uacute;mero</td>
      <td><input name="numero" type="text" id="numero" value="<? echo $numero_cli; ?>" size="10" maxlength="10"></td>
    </tr>
    <tr>
      <td>Bairro</td>
      <td><input name="bairro" type="text" id="bairro2" value="<? echo $bairro_cli; ?>" size="50" maxlength="50"></td>
      <td>Complemento</td>
      <td><input name="complemento" type="text" id="complemento" value="<? echo $complemento_cli; ?>" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name="cidade" type="text" id="cidade2" value="<? echo $cidade_cli; ?>" size="50" maxlength="50"></td>
      <td>Estado</td>
      <td><select name="estado" id="select">
        <option selected><? echo $estado_cli; ?></option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td>Cep</td>
      <td><input name="cep" type="text" id="cep2" value="<? echo $cep_cli; ?>" size="9" maxlength="9">
      Use o formato 00000-000</td>
      <td>Endere&ccedil;o corresp</td>
      <td><select name="correspondencia" id="select2">
        <option>Residencial</option>
        <option>Comercial</option>
            </select></td>
    </tr>
    <tr>
      <td>Tipo de residencia </td>
      <td><select name="tipo_residencia" id="select8">
        <option selected><? echo $tipo_residencia; ?></option>
        <?


    $sql = "select * from tipos_residencias order by tipo_residencia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['tipo_residencia']. ">".$x['tipo_residencia']."</option>";
    }
?>
      </select></td>
      <td>Valor do aluguel R$ </td>
      <td><input name="valor_aluguel" type="text" id="valor_aluguel"></td>
    </tr>
    <tr>
      <td>Tempo de resid&ecirc;ncia </td>
      <td><input name="tempo_residencia" type="text" id="tempo_residencia"></td>
      <td>Telefone com DDD </td>
      <td><input name="telefone" type="text" id="telefone2" value="<? echo $telefone_cli; ?>" size="15" maxlength="14"></td>
    </tr>
    <tr>
      <td>Celular com DDD </td>
      <td><input name="celular" type="text" id="celular2" value="<? echo $celular_cli; ?>" size="15" maxlength="14"></td>
      <td>Tipo de telefone </td>
      <td><select name="tipo_telefone" id="select9">
        <option selected><? echo $tipo_telefone; ?></option>
        <?


    $sql = "select * from tipo_telefones order by tipo_telefone asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['tipo_telefone']. ">".$x['tipo_telefone']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td>Residencia anterior </td>
      <td><input name="residencia_anterior" type="text" id="residencia_anterior" size="50" maxlength="50"></td>
      <td>Bairro</td>
      <td><input name="bairro_anterior" type="text" id="bairro_anterior" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name="cidade_anterior" type="text" id="cidade_anterior" size="50" maxlength="50"></td>
      <td>Estado</td>
      <td><select name="estado_anterior" id="select10">
        <option selected><? echo $estado_cli; ?></option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td>Tempo</td>
      <td><input name="tempo_residencia_anterior" type="text" id="tempo_residencia_anterior"></td>
      <td>E-Mail</td>
      <td><input name="email" type="text" id="email" value="<? echo $email_cli; ?>" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">INFORMA&Ccedil;&Otilde;ES PROFISSIONAIS</font></strong></div></td>
    </tr>
    <tr> 
      <td>Empresa</td>
      <td><input name="empresa" type="text" id="empresa" size="50" maxlength="50"></td>
      <td>Porte da empresa </td>
      <td><select name="porte_empresa" id="select11">
        <option selected><? echo $porte_empresa; ?></option>
        <?


    $sql = "select * from porte_empresas order by porte_empresa asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['porte_empresa']. ">".$x['porte_empresa']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td>Tempo de servi&ccedil;o </td>
      <td>Anos
        <input name="data_admissao" type="text" id="data_admissao" size="10" maxlength="10"> 
        meses 
        <input name="meses" type="text" id="meses" size="10" maxlength="10"></td>
      <td>Inicio da atividade  PJ </td>
      <td><input name="inicio_atividade" type="text" id="inicio_atividade"></td>
    </tr>
    <tr>
      <td>Endere&ccedil;o</td>
      <td><input name="end_empresa" type="text" id="end_empresa" size="50" maxlength="50"></td>
      <td>N&uacute;mero</td>
      <td><input name="numero_empresa" type="text" id="numero_empresa" size="10" maxlength="10"></td>
    </tr>
    <tr>
      <td>Complemento</td>
      <td><input name="complemento_empresa" type="text" id="complemento_empresa"></td>
      <td>Bairro</td>
      <td><input name="bairro_empresa" type="text" id="bairro_empresa" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>CEP</td>
      <td><input name="cep_empresa" type="text" id="cep_empresa"></td>
      <td>Cidade</td>
      <td><input name="cidade_empresa" type="text" id="cidade_empresa" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><select name="estado_empresa" id="select12">
        <option selected><? echo $estado_cli; ?></option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";
    }
?>
      </select></td>
      <td>Telefone</td>
      <td><input name="telefone_empresa" type="text" id="telefone_empresa"></td>
    </tr>
    <tr>
      <td>Cargo</td>
      <td><input name="cargo" type="text" id="cargo" size="50" maxlength="50"></td>
      <td>Natureza da opera&ccedil;&atilde;o </td>
      <td><select name="natureza_operacao" id="select13">
        <option>Funcion&aacute;rio P&uacute;blico</option>
        <option>Aut&ocirc;nomo</option>
        <option>Profissional Liberal</option>
        <option selected>Empresa Privada - CLT</option>
        <option>Empresa P&uacute;blica</option>
        <option>Propriet&aacute;rio-S&oacute;cio-Rendas</option>
        <option>Aposentado-Pensionista</option>
        <option>Do lar-Estudante</option>
      </select></td>
    </tr>
    <tr>
      <td>Sal&aacute;rio/Rendimentos</td>
      <td>R$ 
        <input name="salario" type="text" id="salario"></td>
      <td>Atividade principal </td>
      <td><input name="atividade_principal" type="text" id="atividade_principal" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Data constitui&ccedil;&atilde;o </td>
      <td><input name="data_constituicao" type="text" id="data_constituicao"></td>
      <td>CNPJ</td>
      <td><input name="cnpj" type="text" id="cnpj" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>INSCR. EST </td>
      <td><input name="inscr_est" type="text" id="inscr_est" size="50" maxlength="50"></td>
      <td>Telefone contador com DDD </td>
      <td><input name="capital_social" type="text" id="capital_social"></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">ATIVIDADE/EMPREGO ANTERIOR </font></strong></div></td>
    </tr>
    <tr>
      <td>Atividade/emprego anterior </td>
      <td><input name="atividade_anterior" type="text" id="atividade_anterior" size="50" maxlength="50"></td>
      <td>Data admiss&atilde;o</td>
      <td><input name="data_admissao_anterior" type="text" id="data_admissao_anterior"></td>
    </tr>
    <tr>
      <td>Sa&iacute;da</td>
      <td><input name="data_saida" type="text" id="data_saida"></td>
      <td>Cargo</td>
      <td><input name="cargo_anterior" type="text" id="cargo_anterior" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><input name="telefone_empresa_anterior" type="text" id="telefone_empresa_anterior"></td>
      <td>Outras rendas </td>
      <td><input name="outras_rendas" type="text" id="outras_rendas" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">FONTES DE REFER&Ecirc;NCIA </font></strong></div></td>
    </tr>
    <tr>
      <td>Pessoal - Nome </td>
      <td><input name="ref_pessoal" type="text" id="ref_pessoal" size="50"></td>
      <td>Telefone com DDD </td>
      <td><input name="tel_ref_pessoal" type="text" id="tel_ref_pessoal"></td>
    </tr>
    <tr>
      <td>Pessoal - Nome </td>
      <td><input name="ref_pessoal2" type="text" id="ref_pessoal2" size="50"></td>
      <td>Telefone com DDD </td>
      <td><input name="tel_ref_pessoal2" type="text" id="tel_ref_pessoal2"></td>
    </tr>
    <tr>
      <td>Comercial - Nome </td>
      <td><input name="ref_comercial" type="text" id="ref_comercial" size="50"></td>
      <td>Telefone com DDD </td>
      <td><input name="tel_ref_comercial" type="text" id="tel_ref_comercial"></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">REFER&Ecirc;NCIAS FINANCEIRAS </font></strong></div></td>
    </tr>
    <tr>
      <td>Banco</td>
      <td><input name="ref_banco" type="text" id="ref_banco" size="50"></td>
      <td>Ag&ecirc;ncia</td>
      <td><input name="ref_agencia" type="text" id="ref_agencia"></td>
    </tr>
    <tr>
      <td>Conta</td>
      <td><input name="ref_conta" type="text" id="ref_conta" size="50"></td>
      <td>Tipo</td>
      <td>        <select name="ref_tipo_conta" id="ref_tipo_conta">
        <option>Especial</option>
        <option>Sal&aacute;rio</option>
        <option>Comum</option>
        <option>Poupan&ccedil;a</option>
        <option selected>N&atilde;o Tem</option>
        </select></td>
    </tr>
    <tr>
      <td>Conta desde </td>
      <td><input name="ref_conta_desde" type="text" id="ref_conta_desde"></td>
      <td>Cart&atilde;o de cr&eacute;dito </td>
      <td><select name="cartao_credito" id="cartao_credito">
        <option>N&atilde;o tem</option>
        <option>Amex</option>
        <option>Diners</option>
        <option>Visa</option>
        <option>Credicard</option>
        <option>Outros</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">REFER&Ecirc;NCIAS DE BENS </font></strong></div></td>
    </tr>
    <tr>
      <td>Autom&oacute;vel</td>
      <td><select name="automovel" id="automovel">
        <option>N&atilde;o tem</option>
        <option>Tem um</option>
        <option>Tem mais de um</option>
      </select></td>
      <td>Valor total R$ </td>
      <td><input name="valor_automoveis" type="text" id="valor_automoveis"> 
        0000.00 </td>
    </tr>
    <tr>
      <td>Resid&ecirc;ncia</td>
      <td><select name="residencia" id="residencia">
        <option>N&atilde;o tem</option>
        <option>Resid&ecirc;ncia Pr&oacute;pria</option>
        <option>Resid&ecirc;ncia Financiada</option>
      </select></td>
      <td>Valor tota R$ </td>
      <td><input name="valor_residencia" type="text" id="valor_residencia"> 
        0000.00 </td>
    </tr>
    <tr>
      <td>Outras Propriedades </td>
      <td><select name="outras_propriedades" id="outras_propriedades">
        <option>N&atilde;o tem</option>
        <option>Terreno(s)</option>
        <option>Fazenda(s)</option>
        <option>Ch&aacute;cara(s)</option>
        <option>Outras Urbanas</option>
      </select></td>
      <td>Valor total R$ </td>
      <td><input name="valor_outras_propriedades" type="text" id="valor_outras_propriedades">
        0000.00</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">DADOS DA OPERA&Ccedil;&Atilde;O </font></strong></div></td>
    </tr>
    <tr>
      <td>Ve&iacute;culo</td>
      <td><input name="veiculo" type="text" id="veiculo" value="Digitar igual no CRV" size="50"></td>
      <td>Ano/Modelo</td>
      <td><input name="ano_modelo" type="text" id="ano_modelo"></td>
    </tr>
    <tr>
      <td>Renavam</td>
      <td><input name="renavam" type="text" id="renavam" size="50"></td>
      <td>N&ordm; de portas </td>
      <td><input name="num_portas" type="text" id="num_portas"></td>
    </tr>
    <tr>
      <td>Combust&iacute;vel</td>
      <td><select name="combustivel" id="combustivel">
        <option>Gasolina</option>
        <option>Alcool</option>
        <option>Diesel</option>
        <option>G&aacute;s Natural</option>
        <option>Biodiesel</option>
        <option>Querosene</option>
      </select></td>
      <td>Placa</td>
      <td><input name="placa" type="text" id="placa"></td>
    </tr>
    <tr>
      <td>Valor venda NF R$ </td>
      <td>
	    <strong>
	    <font color="#0000FF">
	  <input name="valor_venda" type="text" id="valor_venda" value="<? echo $valor_venda; ?>">
	  </font></strong> </td>
      <td>Valor de entrada R$ </td>
      <td><font color="#0000FF"><strong>
        <input name="valor_entrada" type="text" id="valor_entrada" value="<? echo $valor_entrada; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td>Tarifa cadastro </td>
      <td><strong><font color="#0000FF"><? echo $tac; ?></font></strong>        <input name="tarifa_cadastro" type="hidden" id="tarifa_cadastro2" value="<? echo $tac; ?>"></td>
      <td>Valor a financiar R$</td>
      <td><font color="#0000FF"><strong>
        <input name="valor_financiar" type="text" id="valor_financiar2" value="<? $financiar = bcadd($diferenca,$tac,2);
	  echo $financiar;
	   ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td>Codigo da tabela</td>
      <td><input name="codigo_tabela" type="text" id="codigo_tabela"></td>
      <td>Coeficiente</td>
      <td><font color="#0000FF"><strong>
        <input name="coeficiente" type="text" id="coeficiente">
      </strong></font></td>
    </tr>
    <tr>
      <td>Servi&ccedil;os Terceiros</td>
      <td><strong><font color="#0000FF"><? echo $r_2; ?>        </font></strong>        <input name="r" type="hidden" id="r" value="<? echo $r_2; ?>"></td>
      <td>Valor Liberado</td>
      <td><font color="#0000FF"><strong><? echo "0.00"; ?>
        <input name="valor_liberado" type="hidden" id="valor_liberado" value="<? echo "0.00"; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td>N&ordm; de parcelas</td>
      <td>        <select name="num_parcelas" id="num_parcelas">
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
      <td>Valor da parcela</td>
      <td><input name="valor_parcelas" type="text" id="valor_parcelas"></td>
    </tr>
    <tr>
      <td>Vencto 1&ordm; parcela</td>
      <td><input name="vencto_1_parcela" type="text" id="vencto_1_parcela">
dd/mm/aaaa </td>
      <td>Pagto Serv Terceiros </td>
      <td><strong>
        <font color="#0000FF">
        <? $serv_terceiros = bcmul($diferenca,$r,2);  echo $serv_terceiros; ?>
        <input name="pagto_serv_terc" type="hidden" id="pagto_serv_terc" value="<? echo $serv_terceiros; ?>">
      </font>      </strong></td>
    </tr>
    <tr>
      <td>Observa&ccedil;&otilde;es</td>
      <td colspan="2"><textarea name="obs" cols="50" rows="5" id="obs"></textarea>
        <strong><font color="#0000FF">
        <input name="recebido" type="hidden" id="recebido2" value="<? echo "Não"; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><strong><font color="#0000FF">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
        <input name="cidade_estab_pertence" type="hidden" id="cidade_estab_pertence" value="<? echo $cidade_estab_pertence; ?>">
        <input name="tel_estab_pertence" type="hidden" id="tel_estab_pertence" value="<? echo $tel_estab_pertence; ?>">
        <input name="email_estab_pertence" type="hidden" id="email_estab_pertence" value="<? echo $email_estab_pertence; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
      <td><input name="cpt" type="hidden" id="cpt2" value="">
        <input name="serie" type="hidden" id="serie" value=""></td>
    </tr>
    <tr> 
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Concluir efetiva&ccedil;&atilde;o da proposta"> 
          <input type="reset" name="Submit2" value="Limpar"> </td><td><div align="right"> </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="2"><strong>Operador<br>
      </strong><strong><font color="#0000FF"><? echo $nome_op; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email_op; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%"><strong>Celular:<font color="#0000FF"><br>
              <? echo $celular_op; ?> </font><font color="#0000FF"> </font></strong></td>
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
</form>
</body>
</html>
