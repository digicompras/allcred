

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../../conect/conect.php';



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

$sql = "SELECT * FROM cx_entradas order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

	
$codigo = $linha[0];
$datacadastro = $linha[20];



$data = $datacadastro;

$data2 = explode("-", $data);



$dia = $data2[0];

$mes = $data2[1];

$ano = $data2[2];


$datecadastro = "$ano-$mes-$dia";

?>

<?




$comando = "update `$db`.`cx_entradas` set `datecadastro` = '$datecadastro' where `cx_entradas`. `codigo` = '$codigo'";
mysql_query($comando,$conexao);

?>

<tr>

          <? echo "$codigo  -  $datacadastro  ---->>  $datecadastro"; ?> <br><br>

  </tr>

<? } ?>

		  

	<? echo $registros; ?>	  

</table>

