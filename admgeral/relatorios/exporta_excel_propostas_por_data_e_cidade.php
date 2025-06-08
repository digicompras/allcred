<?

require '../../conect/conect.php';

?>


  <?
$cidade_solicitada = $_POST['cidade'];
if($cidade_solicitada=="Todas"){

$cidade = "";

}
else{

$cidade = " and cidade = '$cidade_solicitada'";

}


$bco_da_operacao = $_POST['bco_operacao'];
if($bco_da_operacao=="Todos"){

$bco_operacao = "";

}
else{

$bco_operacao = " and bco_operacao = '$bco_da_operacao'";

}


$status_solicitado = $_POST['status'];
if($status_solicitado=="TODOS"){

$status = "";

}
else{

$status = $status_solicitado;

}


$tipo_solicitado = $_POST['tipo'];
if($tipo_solicitado=="Todos"){

$tipo = "";

}
else{

$tipo = " and tipo = '$tipo_solicitado'";

}


$tipo_do_contrato_visualizacao = $_POST['tipo_do_contrato'];


$tipo_do_contrato = $_POST['tipo_contrato'];
if($tipo_do_contrato=="Todos"){

$tipo_contrato = "";

}
else{

$tipo_contrato = $tipo_do_contrato;

}


$parcela_inicio = $_POST['parcela_inicial'];

if(empty($parcela_inicio)){

$parcela_inicial = "";

}
else{

$parcela_inicial = " and parcela between $parcela_inicio";

}

$parcela_fim = $_POST['parcela_final'];

if(empty($parcela_fim)){

$parcela_final = "";

}
else{

$parcela_final = " and $parcela_fim";

}


$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];


$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";
		



?>


<?


$sql = "SELECT * FROM propostas where data_proposta between '$data_inicial' and '$data_final' $tipo_contrato $status group by nome asc order by nome_operador asc";
$res = mysql_query($sql);
$total_de_propostas_encontradas = mysql_num_rows($res);


echo " Total de de propostas encontradas -->> $total_de_propostas_encontradas no periodo de $dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final";
?>

<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	

?>


<?


 
 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="10"><div align="center">'." ". ''."".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Proposta</b></div></td>';
$html .= '<td><div align="center"><b>Endereco/Bairro</b></div></td>';
$html .= '<td><div align="center"><b>Cidade/CEP</b></div></td>';
$html .= '<td><div align="center"><b>Cliente</b></div></td>';
$html .= '<td><div align="center"><b>E-Mail</b></div></td>';
$html .= '<td><div align="center"><b>Perfil</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>R$ Parcelas</b></div></td>';
$html .= '<td><div align="center"><b>Telefones</b></div></td>';
$html .= '<td><div align="center"><b>Tipo Contrato</b></div></td>';
$html .= '<td><div align="center"><b>Status</b></div></td>';
$html .= '<td><div align="center"><b>Bco Operação</b></div></td>';

$html .= '</tr>';

$sql = "SELECT * FROM propostas where data_proposta between '$data_inicial' and '$data_final' $tipo_contrato $status group by nome asc order by nome_operador asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];
$tipo = $linha[2];
$nome_cli = $linha[4];
$cpf_cli = $linha[7];
$endereco = $linha[14];
$numero = $linha[15];
$bairro = $linha[16];
$parcela_cli = $linha[27];
$comissao_op = $linha[101];
$cidade = $linha[18];
$estado = $linha[19];
$cep = $linha[20];
$telefone = $linha[21];
$celular = $linha[22];
$email_cli = $linha[23];
$status = $linha[51];
$tipo_proposta = $linha[83];
$bco_operacao = $linha[86];
$valor_total = $linha[113];
$valor_liquido_cliente = $linha[115];
$meta = $linha[171];

	
$html .= '<tr>';
$html .= '<td><div align="center">'."$num_proposta".'</div></td>';
$html .= '<td><div align="center">'."$endereco $numero $bairro".'</div></td>';
$html .= '<td><div align="center">'."$cidade $cep".'</div></td>';
$html .= '<td><div align="center">'."$nome_cli".'</div></td>';
$html .= '<td><div align="center">'."$email_cli".'</div></td>';
$html .= '<td><div align="center">'."$tipo".'</div></td>';
$html .= '<td><div align="center">'."$cpf_cli".'</div></td>';
$html .= '<td><div align="center">'."$parcela_cli".'</div></td>';
$html .= '<td><div align="center">'."$telefone $celular".'</div></td>';
$html .= '<td><div align="center">'."$tipo_do_contrato_visualizacao".'</div></td>';
$html .= '<td><div align="center">'."$status".'</div></td>';
$html .= '<td><div align="center">'."$bco_operacao".'</div></td>';

$html .= '</tr>';

}

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



exit;
 
?>
