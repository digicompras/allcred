<?

require '../../conect/conect.php';

?>


  <?
$tipo = $_POST['tipo'];
$cidade = $_POST['cidade'];
		



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

$sql = "SELECT * FROM propostas where tipo_contrato = 'SITE' group by cpf order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];

$nome = $linha[4];

$cpf_proposta = $linha[7];

$email_proposta = $linha[23];


$sql2 = "SELECT * FROM clientes where cpf = '$cpf_proposta' order by nome asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$email_cadastro = $linha[20];

 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Num Proposta</b></div></td>';
$html .= '<td><div align="center"><b>Cliente</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>Email da Proposta</b></div></td>';
$html .= '<td><div align="center"><b>Telefone</b></div></td>';
$html .= '<td><div align="center"><b>Celular</b></div></td>';

$html .= '</tr>';


$html .= '<tr>';
$html .= '<td><div align="center">'."$num_proposta".'</div></td>';
$html .= '<td><div align="center">'."$nome".'</div></td>';
$html .= '<td><div align="center">'."$cpf_proposta".'</div></td>';
$html .= '<td><div align="center">'."$email_proposta".'</div></td>';
$html .= '<td><div align="center">'."$email_cadastro".'</div></td>';

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
