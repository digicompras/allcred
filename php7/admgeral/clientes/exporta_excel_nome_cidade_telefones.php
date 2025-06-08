<?

require '../../conect/conect.php';

?>


  <?
//$tipo = $_POST['tipo'];
$cidade = $_POST['cidade'];
		



?>


<?

$sql = "SELECT * FROM clientes order by nome asc";
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


$sql2 = "SELECT * FROM clientes order by nome asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {




$nome = $linha[1];

$cpf = $linha[4];

$data_nasc = $linha[8];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];
	
$categoria = $linha[134];

 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Nome</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>Telefone</b></div></td>';
$html .= '<td><div align="center"><b>Celular</b></div></td>';
$html .= '<td><div align="center"><b>Data Nasc</b></div></td>';
$html .= '<td><div align="center"><b>Categoria</b></div></td>';

$html .= '</tr>';


$html .= '<tr>';
$html .= '<td><div align="center">'."$nome".'</div></td>';
$html .= '<td><div align="center">'."$cpf".'</div></td>';
$html .= '<td><div align="center">'."$telefone".'</div></td>';
$html .= '<td><div align="center">'."$celular".'</div></td>';
$html .= '<td><div align="center">'."$data_nasc".'</div></td>';
$html .= '<td><div align="center">'."$categoria".'</div></td>';

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
