<?php



session_start(); //inicia sessão...



if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...



echo ""; //se for emite mensagem positiva.



if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...



echo ""; //se for emite mensagem positiva.



else //se não for...



header("Location: alerta.php");




ini_set('default_charset','UTF8_general_mysql500_ci');


?>
<?





require '../../conect/conect.php';



error_reporting(E_ALL);







$dia = date('d');



$mes = date('m');



$ano = date('Y');







$solicitacao = $_POST['solicitacao'];

$comissao = $_POST['comissao'];







?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<?

if($solicitacao=="relatorio por data de propostas e cidade"){

echo "<form action='relatorio_de_producao_periodico_por_data_proposta_e_cidade.php' target='_blank' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='4'><div align='center'><strong>Relatório por data de propostas e cidade 2024</strong></div></td>

    </tr>

    <tr>

      <td><div align='center'>Período desejado</div></td>

	  <td><div align='center'>Tipo Contrato</div></td>

      <td><div align='center'>Status</div></td>

      

    </tr>

    <tr>

	<td width='33%'>

        De

        <select name='dia_inicial' id='dia_inicial'>";


    $sql = "select * from propostas group by dia order by dia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";



    }

                echo "</select>

        <select name='mes_inicial' id='mes_inicial'>

          <option selected>";

              echo "$mes";  

          echo "</option>";

    $sql = "select * from propostas group by mes order by mes desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }
        echo "</select>

        <select name='ano_inicial' id='ano_inicial'>

          <option selected>";

              echo "$ano"; 

          echo "</option>";

    $sql = "select * from propostas group by ano order by ano desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }
        echo "</select>

at&eacute;

<select name='dia_final' id='dia_final'>";

    $sql = "select * from propostas group by dia order by dia desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }

echo "</select>

<select name='mes_final' id='mes_final'>

  <option selected>";

  echo "$mes"; 

  echo "</option>";

    $sql = "select * from propostas group by mes order by mes desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }

echo "</select>

<select name='ano_final' id='ano_final'>

  <option selected>";

  echo "$ano"; 

  echo "</option>";

    $sql = "select * from propostas group by ano order by ano desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }

echo "</select>      </td>



<td><div align='center'>



<select name='tipo_contrato' id='tipo_contrato'>";

          echo "<option selected>TODOS</option>";

    $sql = "select * from tipo_contrato group by tipo_contrato order by tipo_contrato asc";
    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo_contrato']."</option>";

    }

        echo "</select>

		

		</div></td>



      <td><div align='center'>

	  


<select name='status' id='status'>
          


<option>TODOS</option>";


    $sql = "select * from status where setor = 'CONSIGNADO' order by status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['status']."</option>";
    }

                
				
				echo "</select>
				
				

	   </div></td>

      

		

		

		

	   

	   
		

    </tr>

    <tr>

      <td><div align='center'></div></td>

	  

      <td width='34%'><div align='center'></div></td>

      

      

      <td colspan='3'>";

	  



$usuario = $_SESSION['usuario'];



$senha = $_SESSION['senha'];





          echo "<input type='submit' name='Submit3' value='Gerar Relatorio'>      </td>

    </tr>

	<tr>

      <td width='34%'><div align='center'></div></td>

      <td width='34%'><div align='center'></div></td>

	  <td width='34%'><div align='center'></div></td>

	  <td width='34%'><div align='center'></div></td>

	  </tr>

	  

  </table>

</form>";



}



?>
</body>
</html>
