<?

require '../../conect/conect.php';

?>


<?

$sql = "SELECT * FROM propostas order by num_proposta asc";
$res = mysql_query($sql);
$registros_encontrados = mysql_num_rows($res);


?>

<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	//$email_dest   =   $email_empresa;
		$email_dest   =   "";

	
	//PREPARA O PEDIDO
	$mens   =  "Ola! Seu cliente $nfantasia_empresa! acabou de efetuar um Download do relatorio de fichas enviadas para fabrica! Confira abaixo:   \n";
	$mens  .=  " \n";
	$mens  .=  "Cliente: ".$nfantasia."                                                       \n";
	$mens  .=  "Data do Download: ".$data_download."                                                    \n";
	$mens  .=  "Hora: ".$hora."                                                    \n\n";
	
	$mens  .=  "Periodo escolhido: ".$dia_inicial."-".$mes_inicial."-".$ano_inicial." ate ".$dia_final."-".$mes_final."-".$ano_final."                                       \n";
	$mens  .=  "Total de pares no periodo: ".$total_producao."                                                    \n";
	

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Download de relatorio em $data_download - ".$hora, $mens,"From:".$nfantasia."@$nfantasia.com.br");

?>


<?
$ano = $_POST['ano'];
$secretaria = $_POST['secretaria'];


$sql = "SELECT * FROM propostas where ano = '$ano' and secretaria = '$secretaria' order by num_proposta asc";
$res = mysql_query($sql);
$propostas_encontrados = mysql_num_rows($res);
while($linha=mysql_fetch_row($res)) {




$num_proposta = $linha[0];

$nome_operador = $linha[1];

$tipo = $linha[2];

$estabelecimento_proposta = $linha[3];

$nome = $linha[4];

$sexo = $linha[5];

$estadocivil = $linha[6];

$cpf = $linha[7];

$rg = $linha[8];

$orgao = $linha[9];

$emissao = $linha[10];

$data_nasc = $linha[11];

$pai = $linha[12];

$mae = $linha[13];

$endereco = $linha[14];

$numero = $linha[15];

$bairro = $linha[16];

$complemento = $linha[17];

$cidade = $linha[18];

$estado = $linha[19];

$cep = $linha[20];

$telefone = $linha[21];

$celular = $linha[22];

$email = $linha[23];

$num_beneficio = $linha[24];

$num_beneficio2 = $linha[80];

$num_beneficio3 = $linha[81];

$num_beneficio4 = $linha[82];

$valor_credito = $linha[25];

$quant_parc = $linha[26];

$parcela = $linha[27];

$banco_pagto = $linha[28];

$num_banco = $linha[29];

$agencia = $linha[30];

$conta = $linha[31];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$obs = $linha[39];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];

$status = $linha[51];



$parc = $linha[52];

$banco = $linha[53];

$vencto = $linha[54];

$compra = $linha[55];



$parc = $linha[52];

$banco = $linha[53];

$vencto = $linha[54];

$compra = $linha[55];



$parc1 = $linha[52];

$banco1 = $linha[53];

$vencto1 = $linha[54];

$compra1 = $linha[55];



$parc2 = $linha[56];

$banco2 = $linha[57];

$vencto2 = $linha[58];

$compra2 = $linha[59];



$parc3 = $linha[60];

$banco3 = $linha[61];

$vencto3 = $linha[62];

$compra3 = $linha[63];



$parc4 = $linha[64];

$banco4 = $linha[65];

$vencto4 = $linha[66];

$compra4 = $linha[67];



$parc5 = $linha[68];

$banco5 = $linha[69];

$vencto5 = $linha[70];

$compra5 = $linha[71];



$parc6 = $linha[72];

$banco6 = $linha[73];

$vencto6 = $linha[74];

$compra6 = $linha[75];



$parc7 = $linha[76];

$banco7 = $linha[77];

$vencto7 = $linha[78];

$compra7 = $linha[79];

$tipo_proposta = $linha[83];

$bco_operacao = $linha[86];

$valor_liberado = $linha[97];

$obs2 = $linha[102];

$tabela = $linha[109];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];

$status_fisico = $linha[120];

$num_bordero = $linha[121];
	
$data_alteracao_status_fisico = $linha[123];

$termo_de_responsabilidade = $linha[149];

$termo = $linha[150];

$data_proposta = $linha[152];

$prazo_final = $linha[153];
$datadigitacao = $linha[155];
$horadigitacao = $linha[156];

$tipo_conta = $linha[159];

$resposta = $linha[160];

$bco_quitacao = $linha[161];
$nome_ref1 = $linha[162];
$fone_ref1 = $linha[163];
$grau_relacionamento1 = $linha[164];
$nome_ref2 = $linha[165];
$fone_ref2 = $linha[166];
$grau_relacionamento2 = $linha[167];
$resposta1 = $linha[168];
$resposta2 = $linha[169];
$resposta3 = $linha[170];

$pagto_beneficio = $linha[176];

$valorrenda = $linha[183];

$margemcartao = $linha[209];
$margememprestimo = $linha[210];

$dia_niver = $linha[211];
$mes_niver = $linha[212];
$ano_niver = $linha[213];

$secretaria = $linha[214];
$categoria = $linha[215];
$proposal_celwhats = $linha[216];
$operadorquedigitou = $linha[217];

$tipovenda = $linha[219];
	
	$senha_portalpass = $linha[249];
	$tem_margem = $linha[250];
	$tem_emprestimo = $linha[251];
	
	$fazer_contarto_novo = $linha[252];
	$refinanciar_daycoval = $linha[253];
	$fazer_cc_consignado = $linha[254];
	$promotora = $linha[255];
	
	$numcontrato1 = $linha[257];
	$numcontrato2 = $linha[258];
	$numcontrato3 = $linha[259];
	$numcontrato4 = $linha[260];
	$numcontrato5 = $linha[261];
	$numcontrato6 = $linha[262];
	$numcontrato7 = $linha[263];
	$numcontrato8 = $linha[264];
	$numcontrato9 = $linha[265];
	$numcontrato10 = $linha[266];
	
	$servicos = $linha[267];
 
 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="10"><div align="center">Total de propostas'." $secretaria ". '--->>> '."$propostas_encontrados".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Nome</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>Endereço</b></div></td>';
$html .= '<td><div align="center"><b>Numero</b></div></td>';
$html .= '<td><div align="center"><b>Bairro</b></div></td>';
$html .= '<td><div align="center"><b>Complemento</b></div></td>';
$html .= '<td><div align="center"><b>Cidade</b></div></td>';
$html .= '<td><div align="center"><b>Estado</b></div></td>';
$html .= '<td><div align="center"><b>CEP</b></div></td>';
$html .= '<td><div align="center"><b>Telefone</b></div></td>';
$html .= '<td><div align="center"><b>Celular</b></div></td>';
$html .= '<td><div align="center"><b>Valor Bruto da Operaçao</b></div></td>';
$html .= '<td><div align="center"><b>Valor Liquido Cliente</b></div></td>';
$html .= '<td><div align="center"><b>Quant Parcelas</b></div></td>';
$html .= '<td><div align="center"><b>Valor Parcelas</b></div></td>';
$html .= '<td><div align="center"><b>Bco Operacao</b></div></td>';
$html .= '<td><div align="center"><b>Bco Cliente</b></div></td>';
$html .= '<td><div align="center"><b>Tipo conta</b></div></td>';
$html .= '<td><div align="center"><b>Bco a ser portado</b></div></td>';

$html .= '</tr>';

$html .= '<tr>';
$html .= '<td><div align="center">'."$nome".'</div></td>';
$html .= '<td><div align="center">'."$cpf".'</div></td>';
$html .= '<td><div align="center">'."$endereco".'</div></td>';
$html .= '<td><div align="center">'."$numero".'</div></td>';
$html .= '<td><div align="center">'."$bairro".'</div></td>';
$html .= '<td><div align="center">'."$complemento".'</div></td>';
$html .= '<td><div align="center">'."$cidade".'</div></td>';
$html .= '<td><div align="center">'."$estado".'</div></td>';
$html .= '<td><div align="center">'."$cep".'</div></td>';
$html .= '<td><div align="center">'."$telefone".'</div></td>';
$html .= '<td><div align="center">'."$celular".'</div></td>';
$html .= '<td><div align="center"><b>'."$valor_total".'</b></div></td>';
$html .= '<td><div align="center"><b>'."$valor_liquido_cliente".'</b></div></td>';
$html .= '<td><div align="center"><b>'."$quant_parc".'</b></div></td>';
$html .= '<td><div align="center"><b>'."$parcela".'</b></div></td>';
$html .= '<td><div align="center"><b>'."$bco_operacao".'</b></div></td>';
$html .= '<td><div align="center"><b>'."$banco_pagto".'</b></div></td>';
$html .= '<td><div align="center"><b>'."$tipo_conta".'</b></div></td>';
$html .= '<td><div align="center"><b>'."$bco_quitacao".'</b></div></td>';

$html .= '</tr>';



$html .= '</table>';


// Definimos o nome do arquivo que será exportado

$data = date('d-m-Y');
$hora_download = date('H:i:s');

$arquivo = "$nfantasia_empresa-$data-$hora_download.xls";

 
// Configurações header para forçar o download
header ("Expires: Mon, 16 Abril 2014 21:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
 
// Envia o conteúdo do arquivo
echo $html;

}

exit;
 
?>
