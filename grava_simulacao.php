
<html>

<head>

<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<?

//require("conexao.php"); or die("erro na requisição");

require 'conect/conect.php';








//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 

$sql = "SELECT * FROM fundo_navegacao";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#<? printf("$linha[1]"); ?>">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  

<? } ?>
<?

//Declaração de uma variável com uma data
$dia = date('d');
$mes = date('m');
$ano = date('Y');

$data_limite_envio_proposta_fisica = "$dia-$mes-$ano";



//echo "Data da efetivação da proposta " . $data_limite_envio_proposta_fisica . "<br />";

 
//Separação dos valores (dia, mês e ano)
$arr = explode("-", $data_limite_envio_proposta_fisica);
 
$dialimite = $arr[0];
$meslimite = $arr[1];
$anolimite = $arr[2];


 
//Período (Qtd. de dias para somar ou subtrair)
$sql = "SELECT * FROM prazo_entrega_fisico limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$periodo = $linha[1];

}
 
//Somar Data
$data_inc = date('d-m-Y', mktime(0, 0, 0, $meslimite, $dialimite + $periodo, $anolimite));



//echo "Data limite para entrega do físico na matriz: " . $data_inc . "<br />";

$data_inc_inversa = date('Y-m-d', mktime(0, 0, 0, $meslimite, $dialimite + $periodo, $anolimite));


$prazo_final = $data_inc_inversa;




 
//Subtrair Data
//$data_dec = date('d-m-Y', mktime(0, 0, 0, $mes, $dia - $periodo, $ano));
//echo "Data decrementada: " . $data_dec . "<br />";
 
//Somar Ano
//$ano_inc = date('d-m-Y', mktime(0, 0, 0, $mes, $dia, $ano + $periodo));
//echo "Ano incrementado: " . $ano_inc . "<br />";
 
//Subtrair Mês
//$mes_dec = date('d-m-Y', mktime(0, 0, 0, $mes - $periodo, $dia, $ano));
//echo "Mês decrementado: " . $mes_dec;




?>


<?

// dados da proposta

$proposal_page = $_POST['proposal_page'];

$proposal_product = $_POST['proposal_product'];

$proposal_date = $_POST['proposal_date'];

$proposal_time = $_POST['proposal_time'];

$proposal_option = $_POST['proposal_option'];





$status = "AGUARDANDO ATIVACAO";

$status_pagto_cliente = "Aguardando_Pagto";

$nome_operador = $_POST['nome_operador'];

$tipo_proposta = "SITE";

$tipo_contrato = "SITE";

$tabela = $_POST['tabela'];

$tipo = $_POST['proposal_convenio'];

$dataproposta = date('d-m-Y');

$horaproposta = date('H:i:s');

$estabelecimento_proposta = "ALLCRED MATRIZ";

$nome = $_POST['proposal_name'];

$resposta = $_POST['resposta'];

$cpf = $_POST['proposal_cpf'];

//$num_beneficio = $_POST['num_beneficio'];

//$num_beneficio2 = $_POST['num_beneficio2'];

//$num_beneficio3 = $_POST['num_beneficio3'];

//$num_beneficio4 = $_POST['num_beneficio4'];

$data_nasc = $_POST['data_nasc'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$emissao = $_POST['emissao'];

$pai = $_POST['pai'];

$mae = $_POST['mae'];

$endereco = $_POST['endereco'];

$numero  = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];

$cep = $_POST['cep'];

$sexo = $_POST['sexo'];

$estadocivil = $_POST['estadocivil'];

$telefone = $_POST['proposal_phone'];

$celular = $_POST['celular'];

$email = $_POST['proposal_email'];

$valor_credito = $_POST['proposal_value'];

$valor_total = $_POST['proposal_value'];

$valor_liquido_cliente = $_POST['proposal_value'];

$valor_liberado = $_POST['proposal_value'];

$quant_parc = $_POST['quant_parc'];

$parcela = $_POST['parcela'];

$banco_pagto = $_POST['banco_pagto'];

$bco_operacao = $_POST['bco_operacao'];

$num_banco = $_POST['num_banco'];

$agencia = $_POST['agencia'];

$conta = $_POST['conta'];

$parc1 = $_POST['parc1'];

$banco1 = $_POST['banco1'];

$vencto1 = $_POST['vencto1'];

$compra1 = $_POST['compra1'];

$bco_quitacao = $_POST['bco_quitacao'];



$obs = $_POST['obs'];

$recebido = $_POST['recebido'];

$termo_de_responsabilidade = $_POST['termo_de_responsabilidade'];

$termo = $_POST['termo'];

$data_proposta = date('Y-m-d');

$tipo_conta = $_POST['tipo_conta'];

$pagto_beneficio = $_POST['pagto_beneficio'];


//dados do operador



$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];



$operador_alterou = $_POST['operador_alterou'];

$cel_operador_alterou = $_POST['cel_operador_alterou'];

$email_operador_alterou = $_POST['email_operador_alterou'];



//dados do estabelecimento



$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];

$estabelecimento_alterou = $_POST['estabelecimento_alterou'];

$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];

$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];

$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];




$mes_ano = date('m-Y');






$status_fisico = "PENDENTE DE ENVIO";

$digitacao = "A Digitar";







$sql = "SELECT * FROM clientes where cpf = '$cpf'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cod_cli = $linha[0];

$telefone_cli = $linha[18];

$celular_cli = $linha[19];


$num_beneficio = $linha[44];

$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];

}



//Aqui começa a verificação do telefone do cliente



if($telefone<>$telefone_cli){

$sql = "SELECT * FROM telefones_de_clientes where cod_cli = '$cod_cli' and telefone = '$telefone'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$lista_telefone = $linha[2];



}

if($lista_telefone==""){

$comando = "insert into telefones_de_clientes(cod_cli,telefone) values('$cod_cli','$telefone')";

mysql_query($comando,$conexao);





}



// Aqui começa a verificação do celular do cliente

}





if($celular<>$celular_cli){

$sql = "SELECT * FROM telefones_de_clientes where cod_cli = '$cod_cli' and telefone = '$celular'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$lista_telefone = $linha[2];



}

if($lista_telefone==""){

$comando = "insert into telefones_de_clientes(cod_cli,telefone) values('$cod_cli','$celular')";

mysql_query($comando,$conexao);





}





}












$comando = "insert into propostas(status,nome_operador,tipo,tipo_proposta,dataproposta,horaproposta,estabelecimento_proposta,nome,cpf,num_beneficio,data_nasc,rg,orgao,emissao,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,sexo,estadocivil,telefone,celular,email,valor_credito,valor_liberado,quant_parc,parcela,banco_pagto,bco_operacao,num_banco,agencia,conta,parc1,banco1,vencto1,compra1,obs,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_beneficio2,num_beneficio3,num_beneficio4,mes_ano,recebido,status_pagto_cliente,dia,mes,ano,tabela,valor_total,valor_liquido_cliente,status_fisico,num_bordero,tipo_contrato,termo_de_responsabilidade,termo,data_proposta,prazo_final,digitacao,tipo_conta,resposta,bco_quitacao,nome_ref1,fone_ref1,grau_relacionamento1,nome_ref2,fone_ref2,grau_relacionamento2,resposta1,resposta2,resposta3,pagto_beneficio) values('$status','$nome_operador','$tipo','$tipo_proposta','$dataproposta','$horaproposta','$estabelecimento_proposta','$nome','$cpf','$num_beneficio','$data_nasc','$rg','$orgao','$emissao','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$sexo','$estadocivil','$telefone','$celular','$email','$valor_credito','$valor_liberado','$quant_parc','$parcela','$banco_pagto','$bco_operacao','$num_banco','$agencia','$conta','$parc1','$banco1','$vencto1','$compra1','$obs','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_beneficio2','$num_beneficio3','$num_beneficio4','$mes_ano','$recebido','$status_pagto_cliente','$dia','$mes','$ano','$tabela','$valor_total','$valor_liquido_cliente','$status_fisico','','$tipo_contrato','$termo_de_responsabilidade','$termo','$data_proposta','$prazo_final','$digitacao','$tipo_conta','$resposta','$bco_quitacao','$nome_ref1','$fone_ref1','$grau_relacionamento1','$nome_ref2','$fone_ref2','$grau_relacionamento2','$resposta1','$resposta2','$resposta3','$pagto_beneficio')";





mysql_query($comando,$conexao);





//echo "Proposta efetuada com sucesso!<br><br>";


?>




















<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>