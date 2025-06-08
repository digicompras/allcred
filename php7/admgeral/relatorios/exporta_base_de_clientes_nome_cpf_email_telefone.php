<?

require '../../conect/conect.php';

?>


  <?
$tipo = $_POST['tipo'];
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

$e_mail = $linha[20];

 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Nome</b></div></td>';
$html .= '<td><div align="center"><b>Data Nasc</b></div></td>';
$html .= '<td><div align="center"><b>CPF</b></div></td>';
$html .= '<td><div align="center"><b>Telefone</b></div></td>';
$html .= '<td><div align="center"><b>Celular</b></div></td>';
$html .= '<td><div align="center"><b>E-Mail</b></div></td>';

$html .= '</tr>';


$html .= '<tr>';
$html .= '<td><div align="center">'."$nome".'</div></td>';
$html .= '<td><div align="center">'."$data_nasc".'</div></td>';
$html .= '<td><div align="center">'."$cpf".'</div></td>';
$html .= '<td><div align="center">'."$telefone".'</div></td>';
$html .= '<td><div align="center">'."$celular".'</div></td>';
$html .= '<td><div align="center">'."$e_mail".'</div></td>';

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
<style type="text/css">
.style71 {font-size: 16px}
</style>
<table width="100%" border="1">
  <tbody>
    <tr>
      <td width="31%"><form action="exporta_cliente_somente_telefone.php" method="post" name="form2" target="_blank">
        <strong><span class="style71">
          <? 	

$sql = "SELECT * FROM clientes ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_cli = mysql_num_rows($res);



}



  ?>
          </span></strong>
        <input class="class01" type="submit" name="button2" id="button2" value="<? echo "Somente telefone"; ?>">
      </form></td>
      <td width="30%"><form action="exporta_cliente_somente_email.php" method="post" name="form2" target="_blank">
        <strong><span class="style71">
          <? 	

$sql = "SELECT * FROM clientes ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_cli = mysql_num_rows($res);



}



  ?>
          </span></strong>
        <input class="class01" type="submit" name="button" id="button" value="<? echo "Somente Email"; ?>">
      </form></td>
      <td width="39%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
