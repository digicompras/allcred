<?

require '../../conect/conect.php';

?>


  <?
$nome_operador = $_POST['nome_operador'];

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

if($nome_operador=="Todos"){
	
$sql = "SELECT * FROM atribuicao_de_propostas where date between '$data_inicial' and '$data_final' order by num_proposta_atribuida desc";

}
else{

$sql = "SELECT * FROM atribuicao_de_propostas where date between '$data_inicial' and '$data_final' and operador_atribuido = '$nome_operador' order by num_proposta_atribuida desc";

}
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
	

?>


<?

if($nome_operador=="Todos"){
	
$sql = "SELECT * FROM atribuicao_de_propostas where date between '$data_inicial' and '$data_final' order by num_proposta_atribuida desc";

}
else{

$sql = "SELECT * FROM atribuicao_de_propostas where date between '$data_inicial' and '$data_final' and operador_atribuido = '$nome_operador' order by num_proposta_atribuida desc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_proposta_atribuida = $linha[2];



$sql2 = "SELECT * FROM propostas where num_proposta = '$num_proposta_atribuida'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nome_operador_atribuido = $linha[1];

$tipo = $linha[2];

$nome_cli = $linha[4];
$cpf_cli = $linha[7];

$endereco = $linha[14];
$numero = $linha[15];
$bairro = $linha[16];

$telefone = $linha[21];
$celular = $linha[22];

$email_cli = $linha[23];

$parcela_cli = $linha[27];

$dataproposta = $linha[40];


$comissao_op = $linha[101];

$cidade = $linha[18];
$estado = $linha[19];
$cep = $linha[20];


$status = $linha[51];

$tipo_proposta = $linha[83];

$bco_operacao = $linha[86];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];

$meta = $linha[171];

 
 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="10"><div align="center">Total de propostas atribuidas ao operador'." $nome_operador no periodo de $data_inicial ate $data_final ". '--->>> '."$registros_encontrados".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Nº Proposta</b></div></td>';
$html .= '<td><div align="center"><b>Data Proposta</b></div></td>';
$html .= '<td><div align="center"><b>Cliente</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>Telefones</b></div></td>';
$html .= '<td><div align="center"><b>E-Mail</b></div></td>';
$html .= '<td><div align="center"><b>Operador Atribuido</b></div></td>';

$html .= '</tr>';

$html .= '<tr>';
$html .= '<td><div align="center">'."$num_proposta_atribuida".'</div></td>';
$html .= '<td><div align="center">'."$dataproposta".'</div></td>';
$html .= '<td><div align="center">'."$nome_cli".'</div></td>';
$html .= '<td><div align="center">'."$cpf_cli".'</div></td>';
$html .= '<td><div align="center">'."$telefone / $celular".'</div></td>';
$html .= '<td><div align="center">'."$email_cli".'</div></td>';
$html .= '<td><div align="center">'."$nome_operador_atribuido".'</div></td>';

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
}

exit;
 
?>
