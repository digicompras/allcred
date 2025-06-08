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
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../conect/conect.php';
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

<?php
//INICIALIZA A SESSÃO
?>
<title></title>
<tr> 
            <td width="623" height="542" align="left" valign="top">  
              <?php
    
	//RECEBE OS DADOS DO FORMULÁRIO
	//DADOS DA LOJA
	$email      =   $_POST[email];
	$financeira      =   $_POST[financeira];

	//DADOS PESSOAIS
	$nome      =   $_POST[nome];
	$datanasc      =   $_POST[datanasc];
	$estadocivil      =   $_POST[estadocivil];
	$sexo      =   $_POST[sexo];
	$cpf      =   $_POST[cpf];
	$rg      =   $_POST[rg];
	$orgexp      =   $_POST[orgexp];
	$emissao      =   $_POST[emissao];
	$naturalidade      =   $_POST[naturalidade];
	$pai      =   $_POST[pai];
	$mae      =   $_POST[mae];
	$endereco      =   $_POST[endereco];
	$numero      =   $_POST[numero];
	$bairro      =   $_POST[bairro];
	$cidade      =   $_POST[cidade];
	$estado      =   $_POST[estado];
	$cep      =   $_POST[cep];
	$fone      =   $_POST[fone];
	$celular      =   $_POST[celular];
	$tempores      =   $_POST[tempores];
	$tipores      =   $_POST[tipores];
	
	//INFORMAÇÕES PROFISSIONAIS DO FINANCIADO
	$empresatrab      =   $_POST[empresatrab];
	$cnpj      =   $_POST[cnpj];
	$contato      =   $_POST[contato];
	$cargo      =   $_POST[cargo];
	$admissao      =   $_POST[admissao];
	$renda      =   $_POST[renda];
	$foneempresatrab      =   $_POST[foneempresatrab];
	$enderecoempresatrab      =   $_POST[enderecoempresatrab];
	$numeroempresatrab      =   $_POST[numeroempresatrab];
	$bairroempresatrab    =  $_POST[bairroempresatrab];
	$cidadeempresatrab  =  $_POST[cidadeempresatrab];
	$estadoempresatrab   =  $_POST[estadoempresatrab];
	$cepempresatrab      =   $_POST[cepempresatrab];
	
	// DADOS DO CONJUGE
	$nomeconjuge      =   $_POST[nomeconjuge];
	$cpfconjuge      =   $_POST[cpfconjuge];
	$rgconjuge      =   $_POST[rgconjuge];
	$emissaoconjuge      =   $_POST[emissaoconjuge];
	$datanascconjuge      =   $_POST[datanascconjuge];
	$empresatrabconjuge      =   $_POST[empresatabconjuge];
	$foneempresatrabconjuge      =   $_POST[foneempresatrabconjuge];
	$salarioconjuge      =   $_POST[salarioconjuge];
	
	// REFERENCIAS BANCARIAS DO FINANCIADO
	$banco      =   $_POST[banco];
	$agencia      =   $_POST[agencia];
	$conta      =   $_POST[conta];
	$fonebanco      =   $_POST[fonebanco];
	$gerenteconta      =   $_POST[gerenteconta];
	
	//REFERENCIAS PESSOAIS
	$refpessoal1      =   $_POST[refpessoal1];
	$fonerefpessoal1      =   $_POST[fonerefpessoal1];
	$refpessoal2      =   $_POST[refpessoal2];
	$fonerefpessoal2      =   $_POST[fonerefpessoal2];
	
	//DADOS DA OPERACAO
	$valorveiculo      =   $_POST[valorveiculo];
	$valorentrada      =   $_POST[valorentrada];
	$valorcredito      =   $_POST[valorcredito];
	$valortac      =   $_POST[valortac];
	$coeficiente      =   $_POST[coeficiente];
	$tabela      =   $_POST[r];
	$prazo      =   $_POST[prazo];
	$valorparcela      =   $_POST[valorparcela];
	$privencto      =   $_POST[privencto];
	
	//DADOS DO VEICULO A SER FINANCIADO
	$marca      =   $_POST[marca];
	$ano      =   $_POST[ano];
	$modelo      =   $_POST[modelo];
	$placa      =   $_POST[placa];
	$renavam      =   $_POST[renavam];
	$chassi      =   $_POST[chassi];
	$cor      =   $_POST[cor];
	$combustivel      =   $_POST[combustivel];
	$quantportas      =   $_POST[quantportas];
	
	//INFORMAÇOES ADICIONAIS
	$adicionais      =   $_POST[adicionais];
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   "shopcar@shopcarveiculos.com.br";
	$email_copy   =   "reinaldojoliveira@hotmail.com";
	
	//PREPARA O PEDIDO
	$mens  .=  " Proposta de financiamento enviada através do site www.shopcarveiculos.com.br \n";
	$mens  .=  " Obrigado por escolher nossa empresa e seja bem vindo! \n";
	$mens  .=  "  \n";
	$mens  .=  " BANCO/FINANCEIRA ONDE SERÁ ENVIADA A PROPOSTA DE FINANCIAMENTO";
	$mens  .=  "  \n";
	$mens  .=  "Financeira: ".$financeira."   \n";
	$mens  .=  "  \n";
	$mens  .=  " DADOS PESSOAIS DO PROPONENTE";
	$mens  .=  "  \n";
	$mens  .=  "E-Mail: ".$email."   \n";
	$mens  .=  "Nome: ".$nome."   "."Data Nasc: ".$datanasc."   "."Estado Civil: ".$estadocivil."   "."Sexo: ".$sexo."\n";
	$mens  .=  "CPF: ".$cpf."   "."RG: ".$rg."   "."Órgão Expedidor: ".$orgexp."   "."Emissão: ".$emissao."\n";
	$mens  .=  "Naturalidade: ".$naturalidade."   "."Pai: ".$pai."   "."Mãe: ".$mae."\n";
	$mens  .=  "Endereço: ".$endereco."  "."Número: ".$numero."   "."Bairro: ".$bairro."\n";
	$mens  .=  "Cidade: ".$cidade."   "."Estado: ".$estado."   "."CEP: ".$cep."\n";
	$mens  .=  "Telefone: ".$fone."   "."Celular: ".$celular."   "."Tempo de Residência: ".$tempores."   "."Tipo de Residência: ".$tipores."\n";
	$mens  .=  "  \n";	
	$mens  .=  " INFORMAÇÕES PROFISSIONAIS DO FINANCIADO";
	$mens  .=  "  \n";
	$mens  .=  "Empresa que trabalha: ".$empresatrab."   "."CNPJ: ".$cnpj."   "."Contato: ".$contato."\n";
	$mens  .=  "Cargo: ".$cargo."   "."Admissão: ".$admissao."   "."Renda: ".$renda."   "."Telefone: ".$foneempresatrab."\n";
	$mens  .=  "Endereço: ".$enderecoempresatrab."   "."Número: ".$numeroempresatrab."   "."Bairro: ".$bairroempresatrab."\n";
	$mens  .=  "Cidade: ".$cidadeempresatrab."   "."Estado: ".$estadoempresatrab."   "."CEP: ".$cepempresatrab."\n";
	$mens  .=  "  \n";
	$mens  .=  " DADOS DO CÔNJUGE";
	$mens  .=  "  \n";
	$mens  .=  "Nome: ".$nomeconjuge."   "."CPF: ".$cpfconjuge."   "."RG: ".$rgconjuge."   "."Emissão: ".$emissaoconjuge."\n";
	$mens  .=  "Data Nasc: ".$datanascconjuge."   "."Empresa que trabalha: ".$empresatrabconjuge."   "."Telefone: ".$foneempresatrabconjuge."   "."Salário: ".$salarioconjuge."\n";
	$mens  .=  "  \n";
	$mens  .=  " REFERÊNCIAS BANCÁRIAS DO FINANCIADO";
	$mens  .=  "  \n";
	$mens  .=  "Banco: ".$banco."   "."Agência: ".$agencia."   "."Conta Corrente: ".$conta."\n";
	$mens  .=  "Telefone do banco: ".$fonebanco."   "."Gerente da conta: ".$gerenteconta."\n";
	$mens  .=  "  \n";
	$mens  .=  " REFERÊNCIAS PESSOAIS";
	$mens  .=  "  \n";
	$mens  .=  "Nome: ".$refpessoal1."   "."Telefone: ".$fonerefpessoal1."\n";
	$mens  .=  "Nome: ".$refpessoal2."   "."Telefone: ".$fonerefpessoal2."\n";
	$mens  .=  "  \n";
	$mens  .=  " DADOS DA OPERAÇÃO";
	$mens  .=  "  \n";
	$mens  .=  "Valor do veículo: ".$valorveiculo."   "."Valor da entrada: ".$valorentrada."   "."Valor do crédito: ".$valorcredito."\n";
	$mens  .=  "Valor da TAC: ".$valortac."   "."Coeficiente: ".$coeficiente."   "."R: ".$r."   "."Prazo: ".$prazo."\n";
	$mens  .=  "Valor da parcela: ".$valorparcela."   "."1º Vencimento: ".$privencimento."\n";
	$mens  .=  "  \n";
	$mens  .=  " DADOS DO VEÍCULO";
	$mens  .=  "  \n";
	$mens  .=  "Marca: ".$marca."   "."Modelo: ".$modelo."   "."Ano de fabricação: ".$ano."\n";
	$mens  .=  "Cor: ".$cor."   "."Quantidade de portas: ".$quantportas."   "."Combustível: ".$combustivel."\n";	
	$mens  .=  "Placa: ".$placa."   "."Renavam: ".$renavam."   "."Chassi: ".$chassi."\n";
	$mens  .=  "  \n";
	$mens  .=  " INFORMAÇÕES ADICIONAIS";
	$mens  .=  "  \n";
	$mens  .=  "Informações adicionais: ".$adicionais."   \n";
	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Proposta de financiamento", $mens,"From:".$email_dest."\r\nBcc:".$email."\r\nBcc:".$email_copy);
		
?>
<?
   }//FECHA ELSE (envia)
}//FECHA IF
?>
</tr>
              <table width="519"  border="0" cellspacing="0" cellpadding="0">
                <!--DWLayoutTable-->
                <tr> 
                  <td width="519"></td>
                </tr>
                <tr> 
                  <td> <form name="frmfinalizar" method="post" onSubmit="return finaliza();">
                      <p> 
                        <input type="hidden" name="opc_enviar" value="1">
                        <input type="hidden" na??N???¸???????????Rme="v_produtos" value="<? echo $v_produtos; ?>">
                        <input type="hidden" name="v_nome" value="<? echo $v_nome; ?>">
                        <input type="hidden" name="v_email" value="<? echo $v_email; ?>">
                        <input type="hidden" name="v_user" value="<? echo $v_user; ?>">
                        <input type="hidden" name="v_nomeE" value="?????e?<? echo $v_nomeE; ?>">
                        <input type="hidden" name="v_EnderecoE" value="<? echo $v_EnderecoE; ?>">
                        <input type="hidden" name="v_cidadeE" value="<? echo $v_cidadeE; ?>">
                        <input type="hidden" name="v_EstadoE" value="<? echo $v_EstadoE; ?>">
                        <input type="hidden" name="v_fonee" value="<? echo $v_fonee; ?>">
                        <input type="hidden" name="v_CEPE" value="<? echo $v_CEPE; ?>">
                        <input type="hidden" name="v_EmailE" value="<? echo $v_EmailE; ?>">
                        <input type="hidden" name="v_insc" value="<? echo $v_insc; ?>">
                        <input type="hidden" name="v_cnpj" value="<? echo $v_cnpj; ?>">
                        <input type="hidden" name="v_pgto" value="<? echo $v_pgto; ?>">
                        <input type="hidden" name="v_transp" value="<? echo $v_transp; ?>">
                        <input type="hidden" name="v_total" value="<? echo $total; ?>">
                        <input type="hidden" name="v_dataped" value="<? echo $dataped; ?>">
                        <input type="hidden" name="v_dataent" value="<? echo $dataent; ?>">
                      </p>
                      <p> 
                        <?php
//CONECTA COM O BANCO DE DADOS

?>
                        <?php
//SQL 

?>
                      
                      <form name="form1" method="post" action="">
                        <table width="997"  border="0" align="left" cellpadding="1" cellspacing="1">
                          <!--DWLayoutTable-->
                          <tr align="center">
                            <td height="40" colspan="2">
                              <div align="cen?????e?ter"><font size="4"><strong>PROPOSTA DE FINANCIAMENTO</strong></font></div></td>
                          </tr>
                          <tr>
                            <td height="26"> Email:<strong>
                              <input name="email" type="text" id="email2" size="70" maxlength="70">
                              </strong><strong>Banco/Financeira:
                              <input name="financeira" type="text" id="financeira">
                            </strong></td>
                            <td width="21"></td>
                          </tr>
                          <tr>
                            <td height="26"><div align="center"><strong>DADOS PESSOAIS</strong></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Nome<strong>:
                                  <input name="nome" type="text" id="nome2"  size="50" maxlength="60">
                              </strong>Data Nasc:
                              <input name="datanasc" type="text" id="datanasc">
      Estado Civil:
      <select name="estadocivil" id="estadocivil">
        <option selected>Selecione o item</option>
        <option>Casado</option>
        <option>Solteiro</option>
        <option>Vi&uacute;vo</option>
        <option>Desquitado</option>
        <option>Separado</option>
        <option>Divorciado</option>
        <option>Outros</option>
      </select>
      Sexo:
      <select name="sexo" id="sexo">
        <option>Masc</option>
        <option>Fem</option>
    </select></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">CPF:
                                <input name="cpf" type="text" id="cpf" size="30" maxlength="40">
      RG:
      <input name="rg" type="text" id="rg" size="30">
&Oacute;rg&atilde;o Expedidor:
      <input name="orgexp" type="text" id="orgexp" size="10">
      Emiss&atilde;o:
      <input name="emissao" type="text" id="emissao" size="15"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Naturalidade:
                                <input name="naturalidade" type="text" id="naturalidade" size="30">
      Pai:
      <input name="pai" type="text" id="pai" size="40">
      M&atilde;e:
      <input name="mae" type="text" id="mae" size="40"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Endere&ccedil;o:
                                <input name="endereco" type="text" id="endereco3" size="60" maxlength="60">
      N&uacute;mero:
      <input name="numero" type="text" id="numero" size="10">
      Bairro:
      <input name="bairro" type="text" id="bairro3" size="30" maxlength="50"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Cidade: <strong>
                              <input name="cidade" type="text" id="cidade"  size="30" maxlength="50">
                              </strong>Estado:<strong>
                              <select name="estado" id="select2">
                                <option selected>Selecione</option>
                                <option>Acre</option>
                                <option>Amap&aacute;</option>
                                <option>Alagoas</option>
                                <option>Amazonas</option>
                                <option>Bahia</option>
                                <option>Cear&aacute;</option>
                                <option>Distrito Federal</option>
                                <option>Esp&iacute;rito Santo</option>
                                <option>Goi&aacute;s</option>
                                <option>Maranh&atilde;o</option>
                                <option>Mato Grosso</option>
                                <option>Mato Grosso do Sul</option>
                                <option>Minas Gerais</option>
                                <option>Par&aacute;</option>
                                <option>Para&iacute;ba</option>
                                <option>Paran&aacute;</option>
                                <option>Pernambuco</option>
                                <option>Piau&iacute;</option>
                                <option>Rio de Janeiro</option>
                                <option>Rio Grande do Norte</option>
                                <option>Rio Grande do Sul</option>
                                <option>Rond&ocirc;nia</option>
                                <option>Roraima</option>
                                <option>Santa Catarina</option>
                                <option>S&atilde;o Paulo</option>
                                <option>Sergipe</option>
                                <option>Tocantins</option>
                              </select>
                              </strong> CEP: <strong>
                              <input name="cep" type="text" id="cep2" size="30" maxlength="30">
                            </strong></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Telefone:
                                <input name="fone" type="text" id="fone" size="20">
      Celular:
      <input name="celular" type="text" id="celular" size="20">
      Tempo de resid&ecirc;ncia:
      <input name="tempores" type="text" id="tempores" size="20">
      Tipo de Resid&ecirc;ncia:
      <select name="tipores" id="tipores">
        <option selected>Selecione</option>
        <option>Pr&oacute;pria</option>
        <option>Alugada</option>
        <option>Emprestada</option>
    </select></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26"><div align="center"><strong>INFORMA&Ccedil;&Otilde;ES PROFISSIONAIS DO PROPONENTE</strong></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Empresa onde trabalha:
                                <input name="empresatrab" type="text" id="empresatrab" size="40">
      CNPJ:
      <input name="cnpj" type="text" id="cnpj2" size="30" maxlength="18">
      Contato:
      <input name="contato" type="text" id="contato" size="25"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Cargo:
                                <input name="cargo" type="text" id="cargo" size="25">
      Tempo que trabalha:
      <input name="admissao" type="text" id="admissao">
      Sal&aacute;rio :
      <input name="renda" type="text" id="renda" size="20">
      Telefone/Ramal:
      <input name="foneempresatrab" type="text" id="foneempresatrab" size="10"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Endere&ccedil;o:
                                <input name="enderecoempresatrab" type="text" id="enderecoempresatrab" size="60">
      N&uacute;mero:
      <input name="numeroempresatrab" type="text" id="numeroempresatrab" size="10">
      Bairro:
      <input name="bairroempresatrab" type="text" id="bairroempresatrab" size="30"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Cidade:
                                <input name="cidadeempresatrab" type="text" id="cidadeempresatrab" size="30">
      Estado: <strong>
      <select name="estadoempresatrab" id="select3">
        <option selected>Selecione</option>
        <option>Acre</option>
        <option>Amap&aacute;</option>
        <option>Alagoas</option>
        <option>Amazonas</option>
        <option>Bahia</option>
        <option>Cear&aacute;</option>
        <option>Distrito Federal</option>
        <option>Esp&iacute;rito Santo</option>
        <option>Goi&aacute;s</option>
        <option>Maranh&atilde;o</option>
        <option>Mato Grosso</option>
        <option>Mato Grosso do Sul</option>
        <option>Minas Gerais</option>
        <option>Par&aacute;</option>
        <option>Para&iacute;ba</option>
        <option>Paran&aacute;</option>
        <option>Pernambuco</option>
        <option>Piau&iacute;</option>
        <option>Rio de Janeiro</option>
        <option>Rio Grande do Norte</option>
        <option>Rio Grande do Sul</option>
        <option>Rond&ocirc;nia</option>
        <option>Roraima</option>
        <option>Santa Catarina</option>
        <option>S&atilde;o Paulo</option>
        <option>Sergipe</option>
        <option>Tocantins</option>
      </select>
      </strong>CEP:
      <input name="cepempresatrab" type="text" id="cepempresatrab" size="30"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26"><div align="center"><strong>DADOS DO C&Ocirc;NJUGE</strong></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Nome do c&ocirc;njuge:
                                <input name="nomeconjuge" type="text" id="nomeconjuge" size="60">
      CPF:
      <input name="cpfconjuge" type="text" id="cpfconjuge" size="30">
                            </td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">RG:
                                <input name="rgconjuge" type="text" id="rgconjuge" size="30">
      Emiss&atilde;o:
      <input name="emissaoconjuge" type="text" id="emissaoconjuge">
      Data Nsc:
      <input name="datanascconjuge" type="text" id="datanascconjuge"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Empresa onde trabalha:
                                <input name="empresatrabconjuge" type="text" id="empresatrabconjuge" size="40">
      Telefone:
      <input name="foneempresatrabconjuge" type="text" id="foneempresatrabconjuge">
      Sal&aacute;rio:
      <input name="salarioconjuge" type="text" id="salarioconjuge"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26"><div align="center"><strong>REFER&Ecirc;NCIAS BANC&Aacute;RIAS - POSSUI CONTA EM BANCO? - INFORME ABAIXO</strong></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Banco:
                                <input name="banco" type="text" id="banco" size="30">
      Ag&ecirc;ncia:
      <input name="agencia" type="text" id="agencia">
      Conta Corrente:
      <input name="conta" type="text" id="conta" size="30"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Telefone:
                                <input name="fonebanco" type="text" id="fonebanco" size="30">
      Gerente:
      <input name="gerenteconta" type="text" id="gerenteconta" size="30"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26"><div align="center"><strong>REFER&Ecirc;NCIAS</strong> <strong>PESSOAIS: - 2 PESSOAS QUE TE CONHECAM E POSSAM DAR INFORMA&Ccedil;&Otilde;ES SOBRE VOC&Ecirc;</strong></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Nome:
                                <input name="refpessoal1" type="text" id="refpessoal1" size="50">
      Telefone:
      <input name="fonerefpessoal1" type="text" id="fonerefpessoal1" size="50"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">
                              <div align="left"><strong> </strong></div>
                              Nome:
                              <input name="refpessoal2" type="text" id="refpessoal2" size="50">
      Telefone:
      <input name="fonerefpessoal2" type="text" id="fonerefpessoal2" size="50"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26"><div align="left"></div>
                                <div align="center"><strong><font face="Arial">DADOS DA OPERA&Ccedil;&Atilde;O - FINANCIAMENTO</font></strong></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26"><font color="#000000">Valor de compra do ve&iacute;culo R$:
                        <input name="valorveiculo" type="text" id="valorveiculo" size="20">
      Valor da Entrada R$:
      <input name="valorentrada" type="text" id="valorentrada" size="20">
      Valor a financiar R$:
      <input name="valorcredito" type="text" id="valorcredito" size="20">
                            </font></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Quantidade de parcelas:
                                <input name="prazo" type="text" id="prazo">
      1&ordm; vencimento para:
      <input name="privencto" type="text" id="privencto"></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26"><div align="center"><strong><font face="Arial">DADOS DO VE&Iacute;CULO</font></strong></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Marca:
                                <input name="marca" type="text" id="marca">
      Ano:
      <input name="ano" type="text" id="ano" size="10">
      Modelo:
      <input name="modelo" type="text" id="modelo" size="10">
                            </td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Cor:
                                <input name="cor" type="text" id="cor">
      Quant de portas:
      <input name="quantportas" type="text" id="quantportas2" size="10">
      Combust&iacute;vel:
      <select name="select">
        <option selected>Selecione</option>
        <option>Gasolina</option>
        <option>Alcool</option>
        <option>Diesel</option>
        <option>G&aacute;s Natural</option>
        <option>Biodiesel</option>
        <option>El&eacute;trico</option>
    </select></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="26">Placa:
                                <input name="placa" type="text" id="placa2" size="20">
      Renavam:
      <input name="renavam" type="text" id="renavam2" size="30">
      Chassi:
      <input name="chassi" type="text" id="chassi" size="40">
                            </td>
                            <td></td>
                          </tr>
                          <tr>
                            <td height="24"><strong>INFORMA&Ccedil;&Otilde;ES ADICIONAIS</strong></td>
                            <td></td>
                          </tr>
                          <tr valign="bottom">
                            <td height="249" valign="top">
                              <div align="le?????e?ft">
                                <p><strong>
                                  <textarea name="adicionais" cols="80" rows="6" id="adicionais"></textarea>
                                </strong></p>
                                <p><strong>
                                  <input name="enviar" type="submit" id="enviar2" value="Enviar">
                                  <input type="reset" name="Submit2" value="Limpar">
                                </strong></p>
                            </div></td>
                            <td></td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td height="79" valign="top">
                              <div align="left"><strong> </strong></div>
                              <div align="left"> <strong> </strong></div></td>
                            <td></td>
                          </tr>
                        </table>
                      </form>
                      <p>                                            
                  </body>
</html>
