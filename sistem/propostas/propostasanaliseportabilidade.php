<?php
session_start(); //inicia sessÃƒÂ£o...
if ($_SESSION["usuario"] == true) //verifica se a variÃƒÂ¡vel "usuario" ÃƒÂ© verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variÃƒÂ¡vel "senha" ÃƒÂ© verdadeira...
echo ""; //se for emite mensagem positiva.
else //se nÃƒÂ£o for...
header("Location: alerta.php");


$comando = "insert into propostasanalisecreditonovo(num_proposta,cpf,nomecliente,email,senha_servidor,margememprestimo,margememprestimo_parcela,margememprestimo_valorliberado,margememprestimo_bancodigitacao,margemcartao,margemcartao_parcela,margemcartao_valorliberado,margemcartao_bancodigitacao,debitoemconta,debitoemconta_parcela,debitoemconta_valorliberado,debitoemconta_bancodigitacao,creditocarne,creditocarne_parcela,creditocarne_valorliberado,creditocarne_bancodigitacao,creditocontaenergia,creditocontaenergia_parcela,creditocontaenergia_valorliberado,creditocontaenergia_bancodigitacao) values('$num_proposta','$cpf','$nome','$email','$senha_servidor','$margememprestimo','$margememprestimo_parcela','$margememprestimo_valorliberado','$margememprestimo_bancodigitacao','$margemcartao','$margemcartao_parcela','$margemcartao_valorliberado','$margemcartao_bancodigitacao','$debitoemconta','$debitoemconta_parcela','$debitoemconta_valorliberado','$debitoemconta_bancodigitacao','$creditocarne','$creditocarne_parcela','$creditocarne_valorliberado','$creditocarne_bancodigitacao','$creditocontaenergia','$creditocontaenergia_parcela','$creditocontaenergia_valorliberado','$creditocontaenergia_bancodigitacao')";

mysql_query($comando,$conexao);
	
	
	if(empty($parc1)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc1','$banco1','$vencto1','$parcelaspagas1','$taxajuros1','$valorliberado1','$bancodigitacao1','$tipooperacao1','$email','1','$numcontrato1')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc2)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc2','$banco2','$vencto2','$parcelaspagas2','$taxajuros2','$valorliberado2','$bancodigitacao2
','$tipooperacao2','$email','2','$numcontrato2')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc3)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc3','$banco3','$vencto3','$parcelaspagas3','$taxajuros3','$valorliberado3','$bancodigitacao3','$tipooperacao3','$email','3','$numcontrato3')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc4)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc4','$banco4','$vencto4','$parcelaspagas4','$taxajuros4','$valorliberado4','$bancodigitacao4','$tipooperacao4','$email','4','$numcontrato4')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc5)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc5','$banco5','$vencto5','$parcelaspagas5','$taxajuros5','$valorliberado5','$bancodigitacao5','$tipooperacao5','$email','5','$numcontrato5')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc6)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc6','$banco6','$vencto6','$parcelaspagas6','$taxajuros6','$valorliberado6','$bancodigitacao6','$tipooperacao6','$email','6','$numcontrato6')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc7)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc7','$banco7','$vencto7','$parcelaspagas7','$taxajuros7','$valorliberado7','$bancodigitacao7','$tipooperacao7','$email','7','$numcontrato7')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc8)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc8','$banco8','$vencto8','$parcelaspagas8','$taxajuros8','$valorliberado8','$bancodigitacao8','$tipooperacao8','$email','8','$numcontrato8')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc9)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc9','$banco9','$vencto9','$parcelaspagas9','$taxajuros9','$valorliberado9','$bancodigitacao9','$tipooperacao9','$email','9','$numcontrato9')";

mysql_query($comando,$conexao);
	
}
	
	if(empty($parc10)){
}
else{
	
$comando = "insert into propostasanaliseportabilidade(num_proposta,cpf,nomecliente,parc1,banco1,vencto1,parcelaspagas1,taxajuros1,valorliberado1,bancodigitacao1,tipooperacao1,email,linha,numcontrato1) values('$num_proposta','$cpf','$nome','$parc10','$banco10','$vencto10','$parcelaspagas10','$taxajuros10','$valorliberado10','$bancodigitacao10','$tipooperacao10','$email','10','$numcontrato10')";

mysql_query($comando,$conexao);
	
}

?>