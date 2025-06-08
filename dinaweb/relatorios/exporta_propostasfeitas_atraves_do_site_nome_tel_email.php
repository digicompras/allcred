<?

require '../../conect/conect.php';

?>


  <?

$tipo_proposta = $_POST['tipo_proposta'];

$status = $_POST['status'];

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";


$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$data_final = "$ano_final-$mes_final-$dia_final";
		



?>


<?

if($status=="TODOS"){

$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta' order by nome asc";


}
else{



$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta' and status = '$status' order by nome asc";

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

if($status=="TODOS"){
$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta' and data_proposta_site = '0000-00-00' order by nome asc";
}
else{
$sql = "SELECT * FROM propostas where tipo_proposta = '$tipo_proposta' and data_proposta_site = '0000-00-00' and status = '$status' order by nome asc";
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];
$nome_cliente = $linha[4];
$cpf_cliente = $linha[7];

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

$prazo = $linha[26];
$valor_parcelas = $linha[27];
$status_proposta = $linha[51];
$tipo_proposta = $linha[83];
$bco_operacao = $linha[86];

$comissao_op = $linha[101];
$tabela = $linha[109];
$valor_total = $linha[113];
$valor_liquido_cliente = $linha[115];
$meta = $linha[171];

 
 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="10"><div align="center">Total de propostas'. '--->>> '."$registros_encontrados".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Proposta</b></div></td>';
$html .= '<td><div align="center"><b>Cliente</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>Telefone Liq</b></div></td>';
$html .= '<td><div align="center"><b>Celular</b></div></td>';
$html .= '<td><div align="center"><b>E-Mail</b></div></td>';
$html .= '<td><div align="center"><b>Endereco</b></div></td>';
$html .= '<td><div align="center"><b>Tipo de Proposta</b></div></td>';
$html .= '<td><div align="center"><b>Bco Operacao</b></div></td>';
$html .= '<td><div align="center"><b>Status</b></div></td>';
$html .= '<td><div align="center"><b>teste</b></div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center">'."$num_proposta".'</div></td>';
$html .= '<td><div align="center">'."$nome_cliente".'</div></td>';
$html .= '<td><div align="center">'."$cpf_cliente".'</div></td>';
$html .= '<td><div align="center">'."$telefone".'</div></td>';
$html .= '<td><div align="center">'."$telefone".'</div></td>';
$html .= '<td><div align="center">'."$email".'</div></td>';
$html .= '<td><div align="center">'."$endereco $numero, $complemento, $bairro, $cidade - $estado , $cep".'</div></td>';
$html .= '<td><div align="center">'."$tipo_proposta".'</div></td>';
$html .= '<td><div align="center">'."$bco_operacao".'</div></td>';
$html .= '<td><div align="center">'."$status_proposta".'</div></td>';

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
