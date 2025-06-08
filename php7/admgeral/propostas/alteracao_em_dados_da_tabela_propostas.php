

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../conect/conect.php';



$hoje = date('d/m/Y')+1;


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$db = $linha[1];	
}

?>



<style type="text/css">

<!--

.style2 {font-weight: bold}

.style4 {

	color: #FFFFFF;

	font-weight: bold;

}

.style5 {color: #000000}

.style6 {color: #000000; font-weight: bold; }

-->

</style>

<body bgcolor="#ffffff" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0"></body> 



<table width="100%"  border="0">

  <?

$sql = "SELECT * FROM propostas where status = 'ACEITE DIA 27/09' order by num_proposta asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

	
$num_proposta = $linha[0];

$status = $linha[51];


	//$dataproposta = "31-12-2015";
//$tipo_proposta = $linha[83];
	
//if(empty($tipo_contrato)){
	
//$tipo_contrato = "CONSIGNADO";
//}


// a função explode é usada para separar uma string em

// uma matriz de strings usando um delimitador

//$data = $dataproposta;

//$data2 = explode("-", $data);



//$dia = $data2[0];

//$mes = $data2[1];

//$ano = $data2[2];


//$data_da_proposta = "$ano-$mes-$dia";
	
	
$satatus = "$status";

?>

<?



//if(empty($tipo_contrato)){
$comando = "update `$db`.`propostas` set `satatus` = '$satatus' where `propostas`. `num_proposta` = '$num_proposta'";
mysql_query($comando,$conexao);
//}
?>

<tr>

          <? echo "$num_proposta  -  $status  ---->>  $satatus"; ?> <br><br>

  </tr>

<? } ?>

		  

	<? echo $registros; ?>	  

</table>

