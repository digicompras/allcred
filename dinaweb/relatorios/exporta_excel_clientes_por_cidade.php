<?

require '../../conect/conect.php';

?>


  <?
$cidade = $_POST['cidade'];
		



?>


<?

$sql = "SELECT * FROM clientes where cidade = '$cidade' order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_encontrados = mysql_num_rows($res);

}

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


<?php
 
 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="10"><div align="center">Total de clientes no cidade'." $cidade ". '--->>> '."$registros_encontrados".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Nome</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>Telefone</b></div></td>';
$html .= '<td><div align="center"><b>Celular</b></div></td>';
$html .= '<td><div align="center"><b>Cidade</b></div></td>';
$html .= '<td><div align="center"><b>Estado</b></div></td>';

$html .= '</tr>';


$sql = "SELECT * FROM clientes where cidade = '$cidade' order by nome asc";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {




$nome = $linha[1];

$cpf = $linha[4];

$cidade = $linha[15];

$estado = $linha[16];

$telefone = $linha[18];

$celular = $linha[19];



$html .= '<tr>';
$html .= '<td><div align="center">'."$nome".'</div></td>';
$html .= '<td><div align="center">'."$cpf".'</div></td>';
$html .= '<td><div align="center">'."$telefone".'</div></td>';
$html .= '<td><div align="center">'."$celular".'</div></td>';
$html .= '<td><div align="center">'."$cidade".'</div></td>';
$html .= '<td><div align="center">'."$estado".'</div></td>';

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
