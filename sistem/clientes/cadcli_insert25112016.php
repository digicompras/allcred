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

<title>CADASTRO DE CLIENTES</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';
error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );



$resposta = $_POST['resposta'];

//-------------------------------------------------------

$nome = $_POST['nome'];

$nomeget = $_GET['nome'];

if(empty($nome)){
$nomeretorno = $nomeget;
}
else{
$nomeretorno = $nome;
}


//-------------------------------------------------------

$cpf = $_POST['cpf'];

$cpfget = $_GET['cpf'];

if(empty($cpf)){
$cpfretorno = $cpfget;
}
else{
$cpfretorno = $cpf;
}


//-------------------------------------------------------

$telefone = $_POST['telefone'];

$telefoneget = $_GET['telefone'];

if(empty($telefone)){
$telefoneretorno = $telefoneget;
}
else{
$telefoneretorno = $telefone;
}


//-------------------------------------------------------

$celular = $_POST['celular'];

$celularget = $_GET['celular'];

if(empty($celular)){
$celularretorno = $celularget;
}
else{
$celularretorno = $celular;
}


//-------------------------------------------------------

$num_beneficio = $_POST['num_beneficio'];

$num_beneficioget = $_GET['num_beneficio'];

if(empty($num_beneficio)){
$num_beneficioretorno = $num_beneficioget;
}
else{
$num_beneficioretorno = $num_beneficio;
}


//-------------------------------------------------------

$secretaria = $_POST['secretaria'];

$secretariaget = $_GET['secretaria'];

if(empty($secretaria)){
$secretariaretorno = $secretariaget;
}
else{
$secretariaretorno = $secretaria;
}


//-------------------------------------------------------

$categoria = $_POST['categoria'];

$categoriaget = $_GET['categoria'];

if(empty($categoria)){
$categoriaretorno = $categoriaget;
}
else{
$categoriaretorno = $categoria;
}


//-------------------------------------------------------

$rg = $_POST['rg'];

$rgget = $_GET['rg'];

if(empty($rg)){
$rgretorno = $rgget;
}
else{
$rgretorno = $rg;
}


//-------------------------------------------------------

$mae = $_POST['mae'];

$maeget = $_GET['mae'];

if(empty($mae)){
$maeretorno = $maeget;
}
else{
$maeretorno = $mae;
}


//-------------------------------------------------------

$valorrenda = $_POST['valorrenda'];

$valorrendaget = $_GET['valorrenda'];

if(empty($valorrenda)){
$valorrendaretorno = $valorrendaget;
}
else{
$valorrendaretorno = $valorrenda;
}


//-------------------------------------------------------

$senha_servidor = $_POST['senha_servidor'];

$senha_servidorget = $_GET['senha_servidor'];

if(empty($senha_servidor)){
$senha_servidorretorno = $senha_servidorget;
}
else{
$senha_servidorretorno = $senha_servidor;
}


//-------------------------------------------------------







			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

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



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome = $linha[1];

$celular = $linha[19];

$email = $linha[20];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$funcao_operador = $linha[43];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];





?>

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

<? } ?>

<form name="form1" method="post" action="grava_cadcli.php">



<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td colspan="5"><strong><font color="#0000FF" size="4">Cadastro 

        de clientes! O N&ordm; da matr&iacute;cula ser&aacute; informado ao t&eacute;rmino do cadastro! Data Cadastro </font><font color="#0000FF"><? echo date('d-m-Y'); ?>

        <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">

        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo $hora_atual; ?>">

        <input name="criar_pasta" type="hidden" id="criar_pasta" value="<? echo "Não"; ?>">

</font></strong></td>
    </tr>

    <tr>
      <td>Como Conheceu a Empresa?</td>
      <td><select name="resposta" id="resposta">
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
      <td><select name="tipo" id="tipo">
        <option selected><? echo $tipo; ?></option>
        <?





    $sql = "select * from tipos order by tipo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo']."</option>";

    }

?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td>Nome*</td>

      <td><input name="nome" type="text" id="nome2" value="<? echo $nomeretorno; ?>" size="50" maxlength="50"></td>

      <td>Secretaria*</td>

      <td><strong>
        <select name="secretaria" id="secretaria">
          <option selected><? echo $secretariaretorno; ?></option>
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

      <td width="18%">Data Nasc </td>

      <td width="23%"><input name="data_nasc" type="text" id="data_nasc" size="15" maxlength="10"></td>

      <td width="17%">Categoria*</td>

      <td width="23%"><strong>
        <select name="categoria" id="categoria">
          <option selected><? echo $categoriaretorno; ?></option>
          <?





    $sql = "select * from categorias_clientes order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
        </select>
      </strong></td>
      <td width="19%">&nbsp;</td>
    </tr>

    <tr>
      <td>Naturalidade</td>
      <td><input name="naturalidade" type="text" id="naturalidade" size="50" maxlength="50"></td>
      <td>Sexo</td>
      <td><select name="sexo" id="sexo">
        <option>Masculino</option>
        <option>Feminino</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td>Estado Civil </td>

      <td><select name="estadocivil" id="select3">

        <option selected>Selecione</option>

        <?





    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";

    }

?>

      </select>        </td>

      <td>CPF*</td>

      <td><input name="cpf" type="text" id="cpf" value="<? echo $cpfretorno; ?>" size="18" maxlength="14">

        <strong><font color="#0000FF">

        <input name="status_cliente" type="hidden" id="status_cliente" value="<? echo "Ativo"; ?>">

      </font></strong>      </td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>RG*</td>

      <td><input name="rg" type="text" id="rg" value="<? echo $rgretorno; ?>" size="25" maxlength="25"> 

        &Oacute;rg&atilde;o 

      <input name="orgao" type="text" id="cpf3" size="15" maxlength="14"></td>

      <td>Emiss&atilde;o</td>

      <td><input name="emissao" type="text" id="cpf4" size="15" maxlength="10"> 

        dd/mm/aaaa </td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Pai</td>

      <td><input name="pai" type="text" id="pai" size="50" maxlength="50"></td>

      <td>M&atilde;e*</td>

      <td><input name="mae" type="text" id="endereco3" value="<? echo $maeretorno; ?>" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td>Endere&ccedil;o</td>

      <td><input name="endereco" type="text" id="endereco" size="50" maxlength="30">      </td>

      <td>N&uacute;mero</td>

      <td><input name="numero" type="text" id="numero2" size="10" maxlength="10">      </td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td><p>Bairro</p></td>

      <td><input name="bairro" type="text" id="bairro" size="50" maxlength="50">      </td>

      <td>Complemento</td>

      <td><input name="complemento" type="text" id="endereco4" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Cidade</td>

      <td><select name="cidade" id="estado">
        <option selected>Selecione</option>
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

        <option selected>Selecione</option>

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

      <td><input name="cep" type="text" id="cep" size="9" maxlength="9">

Use o formato 00000-000</td>

      <td>Telefone*</td>

      <td><input name="telefone" type="text" id="endereco5" value="<? echo $telefoneretorno; ?>" size="15" maxlength="14"> </td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td>Celular*</td>

      <td><input name="celular" type="text" id="telefone" value="<? echo $celularretorno; ?>" size="15" maxlength="14"></td>

      <td>E-Mail</td>

      <td><input name="email" type="text" id="email" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Banco do cliente </td>

      <td><select name="banco" id="banco">

        

        <?





    $sql = "select * from bancos order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>

      </select></td>

      <td>Ag&ecirc;ncia</td>

      <td><input name="agencia" type="text" id="agencia"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Conta</td>

      <td><input name="conta" type="text" id="conta"></td>

      <td>Senha DATAPREV </td>

      <td><input name="dataprev" type="text" id="dataprev"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>N&ordm; do Benef&iacute;cio 1*</td>

      <td><input name="num_beneficio" type="text" id="num_beneficio5" value="<? echo $num_beneficioretorno; ?>"></td>

      <td>N&ordm; Benef&iacute;cio2</td>

      <td><input name="num_beneficio2" type="text" id="num_beneficio22"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>N&ordm; Benef&iacute;cio 3 </td>

      <td><input name="num_beneficio3" type="text" id="num_beneficio32"></td>

      <td>N&ordm; Benef&iacute;cio 4 </td>

      <td><input name="num_beneficio4" type="text" id="num_beneficio4"></td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td colspan="2">Tipo de pagto do Benef&iacute;cio 
        <select name="pagto_beneficio" id="cidade">
          <option selected>Selecione</option>
          <?





    $sql = "select * from pagto_beneficio order by modo_recebimento asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['modo_recebimento']."</option>";

    }

?>
        </select></td>
      <td>Senha do Servidor*</td>
      <td><font color="#0000FF">
        <input type="text" name="senha_servidor" id="senha_servidor">
      </font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tem Margem nova?</td>
      <td><input name="tem_margem" type="hidden" id="tem_margem"></td>
      <td>Valor Renda*</td>
      <td><input name="valorrenda" type="text" id="valorrenda" value="<? echo $valorrendaretorno; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td><div align="center">Valor Parcela </div></td>

      <td><div align="center">Saldo Devedor</div></td>

      <td><div align="center">Quant Parcelas em Aberto</div></td>

      <td><div align="center">Prazo do contrato</div></td>
      <td><div align="center"></div></td>
    </tr>

    <tr>
      <td><div align="center">
        <input type="text" name="valor_parcela" id="valor_parcela">
      </div></td>
      <td><div align="center">
        <input type="text" name="saldo_devedor" id="saldo_devedor">
      </div></td>
      <td><div align="center">
        <input type="text" name="parcelas_em_aberto" id="parcelas_em_aberto">
      </div></td>
      <td><div align="center">
        <select name="prazo_contrato" id="prazo_contrato">
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
          <option>32</option>
          <option>33</option>
          <option>34</option>
          <option>35</option>
          <option>36</option>
          <option>37</option>
          <option>38</option>
          <option>39</option>
          <option>40</option>
          <option>41</option>
          <option>42</option>
          <option>43</option>
          <option>44</option>
          <option>45</option>
          <option>46</option>
          <option>47</option>
          <option>48</option>
          <option>46</option>
          <option>50</option>
          <option>51</option>
          <option>52</option>
          <option>53</option>
          <option>54</option>
          <option>55</option>
          <option>56</option>
          <option>57</option>
          <option>58</option>
          <option>59</option>
          <option>60</option>
          <option>61</option>
          <option>62</option>
          <option>63</option>
          <option>64</option>
          <option>65</option>
          <option>66</option>
          <option>67</option>
          <option>68</option>
          <option>69</option>
          <option>70</option>
          <option>71</option>
          <option>72</option>
          <option>73</option>
          <option>74</option>
          <option>75</option>
          <option>76</option>
          <option>77</option>
          <option>78</option>
          <option>79</option>
          <option>80</option>
          <option>81</option>
          <option>82</option>
          <option>83</option>
          <option>84</option>
          <option>85</option>
          <option>86</option>
          <option>87</option>
          <option>88</option>
          <option>89</option>
          <option>90</option>
          <option>91</option>
          <option>92</option>
          <option>93</option>
          <option>94</option>
          <option>95</option>
          <option>96</option>
          <option>97</option>
          <option>98</option>
          <option>99</option>
          <option>100</option>
        </select>
      </div></td>
      <td><div align="center"></div></td>
    </tr>

    <tr>

      <td>Obs</td>

      <td colspan="2"><textarea name="obs" cols="50" rows="7" id="obs"></textarea></td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td colspan="2"><strong><font color="#0000FF">

        <input name="operador" type="hidden" id="operador3" value="<? echo $nome; ?>">

        <input name="funcao_operador" type="hidden" id="funcao_operador" value="<? echo $funcao_operador; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">

        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">

        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence; ?>">

        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence; ?>">

        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence; ?>">

        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence; ?>">

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

        <input type="submit" name="Submit" value="Cadastrar Cliente"> 

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

      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br>

      </strong><strong><font color="#0000FF"><? echo $nome; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%"><strong>Celular:<font color="#0000FF"><br>

              <? echo $celular; ?> </font><font color="#0000FF"> </font></strong></td>

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

