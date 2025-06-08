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

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";



?>


<?

if($nome_operador=="Todos"){

$sql = "SELECT * FROM margem_portabilidade where data_resposta between '$datainicial' and '$datafinal'";

}
else{

$sql = "SELECT * FROM margem_portabilidade where operador = '$nome_operador' and data_resposta between '$datainicial' and '$datafinal'";

}

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


<?

if($nome_operador=="Todos"){

$sql = "SELECT * FROM margem_portabilidade 
where data_resposta between '$datainicial' and '$datafinal' 
group by nome 
order by nome asc";

}
else{

$sql = "SELECT * FROM margem_portabilidade 
where operador = '$nome_operador' and data_resposta between '$datainicial' and '$datafinal' 
group by nome 
order by nome asc";

}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$nome = $linha[1];

$cpf = $linha[2];

$telefone = $linha[3];

$celular = $linha[4];

$operador = $linha[5];

$num_beneficio = $linha[8];

$num_beneficio2 = $linha[9];

$num_beneficio3 = $linha[10];

$num_beneficio4 = $linha[11];

$hora = $linha[15];

$data_da_possibilidade = $linha[17];

$secretaria = $linha[21];

$data_resposta = $linha[27];

$hora_resposta = $linha[28];

$margem = $linha[30];

$email_cliente = $linha[36];


$sql2 = "SELECT * FROM clientes 
where cpf = '$cpf'";
$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {


$endereco = $linha[11];

$numero = $linha[12];
$bairro = $linha[13];
$cidade = $linha[15];
$cep = $linha[17];

}

 
 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="10"><div align="center">Total de clientes no cidade'." $cidade ". '--->>> '."$registros_encontrados".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Secretaria</b></div></td>';
$html .= '<td><div align="center"><b>Nome</b></div></td>';
$html .= '<td><div align="center"><b>Endereco/N/Bairro</b></div></td>';
$html .= '<td><div align="center"><b>Cidade/CEP</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>N Beneficio 1</b></div></td>';
$html .= '<td><div align="center"><b>N Beneficio 2</b></div></td>';
$html .= '<td><div align="center"><b>Telefone</b></div></td>';
$html .= '<td><div align="center"><b>Celular</b></div></td>';
$html .= '<td><div align="center"><b>E-Mail</b></div></td>';

$html .= '</tr>';

$html .= '<tr>';
$html .= '<td><div align="center">'."$secretaria".'</div></td>';
$html .= '<td><div align="center">'."$nome".'</div></td>';
$html .= '<td><div align="center">'."$endereco/$numero/$bairro".'</div></td>';
$html .= '<td><div align="center">'."$cidade/$cep".'</div></td>';
$html .= '<td><div align="center">'."$cpf".'</div></td>';
$html .= '<td><div align="center">'."$num_beneficio".'</div></td>';
$html .= '<td><div align="center">'."$num_beneficio2".'</div></td>';
$html .= '<td><div align="center">'."$telefone".'</div></td>';
$html .= '<td><div align="center">'."$celular".'</div></td>';
$html .= '<td><div align="center">'."$email_cliente".'</div></td>';

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
