<?php
session_start(); //inicia sessÃƒÂ£o...
if ($_SESSION["usuario"] == true) //verifica se a variÃƒÂ¡vel "usuario" ÃƒÂ© verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variÃƒÂ¡vel "senha" ÃƒÂ© verdadeira...
echo ""; //se for emite mensagem positiva.
else //se nÃƒÂ£o for...
header("Location: alerta.php");



if(($tipo_proposta=="ANALISE CREDITO") && ($tipo_contrato=="ANALISE CREDITO")){
	
$sql = "SELECT * FROM tipo_contrato where proposta_automatica = 'SIM' limit 3";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$tipo_contrato_para_gerar_proposta_automatica = $linha[1];
	
	
	$comando = "insert into propostas(status,nome_operador,tipo,tipo_proposta,dataproposta,horaproposta,estabelecimento_proposta,nome,cpf,num_beneficio,rg,orgao,emissao,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,sexo,estadocivil,telefone,celular,email,valor_credito,valor_liberado,quant_parc,parcela,banco_pagto,bco_operacao,num_banco,agencia,conta,parc1,banco1,vencto1,compra1,obs,audio,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_beneficio2,num_beneficio3,num_beneficio4,mes_ano,recebido,status_pagto_cliente,dia,mes,ano,tabela,valor_total,valor_liquido_cliente,status_fisico,num_bordero,tipo_contrato,termo_de_responsabilidade,termo,data_proposta,prazo_final,digitacao,tipo_conta,resposta,bco_quitacao,nome_ref1,fone_ref1,grau_relacionamento1,nome_ref2,fone_ref2,grau_relacionamento2,resposta1,resposta2,resposta3,pagto_beneficio,valorrenda,dia_niver,mes_niver,ano_niver,secretaria,categoria,tipovenda,senha_portalpass,tem_margem,tem_emprestimo,numcontrato1,numcontrato2,numcontrato3,numcontrato4,numcontrato5,numcontrato6,numcontrato7,numcontrato8,numcontrato9,numcontrato10,nomesocial,parc2,parc3,parc4,parc5,parc6,parc7,parc8,parc9,parc10,vinculo) values('$status','$nome_operador','$tipo','$tipo_contrato_para_gerar_proposta_automatica','$dataproposta','$horaproposta','$estabelecimento_proposta','$nome','$cpf','$num_beneficio','$rg','$orgao','$emissao','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$orientacaosexual','$estadocivil','$telefone','$celular','$email','$valor_credito','$valor_liberado','$quant_parc','$parcela','$banco_pagto','$bco_operacao','$num_banco','$agencia','$conta','$parc1','$banco1','$vencto1','$compra1','$obs','$audio','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_beneficio2','$num_beneficio3','$num_beneficio4','$mes_ano','$recebido','$status_pagto_cliente','$dia','$mes','$ano','$tabela','$valor_total','$valor_liquido_cliente','$status_fisico','','$tipo_contrato_para_gerar_proposta_automatica','$termo_de_responsabilidade','$termo','$data_proposta','$prazo_final','$digitacao','$tipo_conta','$resposta','$bco_quitacao','$nome_ref1','$fone_ref1','$grau_relacionamento1','$nome_ref2','$fone_ref2','$grau_relacionamento2','$resposta1','$resposta2','$resposta3','$pagto_beneficio','$valorrenda','$dia_niver','$mes_niver','$ano_niver','$secretaria','$categoria','$tipovenda','$senha_portalpass','$tem_margem','$tem_emprestimo','$numcontrato1','$numcontrato2','$numcontrato3','$numcontrato4','$numcontrato5','$numcontrato6','$numcontrato7','$numcontrato8','$numcontrato9','$numcontrato10','$nomesocial','$parc2','$parc3','$parc4','$parc5','$parc6','$parc7','$parc8','$parc9','$parc10','$num_proposta')";

mysql_query($comando,$conexao);
	
	

}

	}// fim da condicional se ANALISE CREDITO

?>