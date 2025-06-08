
<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';

$data_hoje = date('Y-m-d');
	
$solicitacao = $_POST['solicitacao'];

$cpf2 = $_POST['cpf2'];
		
$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];


$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>"> 

<? } ?>

















  <?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>

  <div align="center"></div>

<table width="100%"  border="0">

  <tr>
    <td><form name="form1" method="post" action="../principal.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input class='class01' type="submit" name="Submit" value="Voltar ao menu principal">
    </form></td>
    <td width="38%"><form name="form1" method="post" action="relatorios/index.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input class='class01' type="submit" name="Submit2" value="Relatorios">
    </form></td>
    <td width="28%">&nbsp;</td>
  </tr>
  <tr>

    <td colspan="3">&nbsp;</td>
  </tr>

  <tr>

    <td colspan="3"><form action="index.php" method="post" name="form5">

       <div align="center"> 
         <input name="solicitacao" type="hidden" id="solicitacao" value="porcpf">
         <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        CPF proponente

          <input class='class02' name="cpf2" type="text" id="cpf2" size="15">

        ex: 99999999999

        <input class='class01' type="submit" name="Submit52" value="Pesquisar">
        </div>

    </form></td>
  </tr>

  <tr>

    <td colspan="3"><div align="center">
      <form action="index.php" method="post" name="form3">
<input name="cpf2" type="hidden" class='class02' id="cpf2" value="." size="15">
<input name="solicitacao" type="hidden" id="solicitacao" value="periodico">
<?
$ano_anterior = date('Y')-1;
$ano_atual = date('Y');
$ano_proximo = date('Y')+1;


?>
        De
        <select class='class02' name="dia_inicial" id="dia_inicial">
          <option selected><? echo "$dia_inicial"; ?></option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
                </select>
        <select class='class02' name="mes_inicial" id="mes_inicial">
          <option selected><? echo "$mes_inicial"; ?></option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
        <select class='class02' name="ano_inicial" id="ano_inicial">
          <option selected><? echo $ano_atual ?></option>
            <option><?  echo $ano_anterior;  ?></option>
            <option><?  echo $ano_proximo;  ?></option>
        </select>
at&eacute;
<select class='class02' name="dia_final" id="dia_final">
          <option selected><? echo "$dia_final"; ?></option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
</select>
<select class='class02' name="mes_final" id="mes_final">
          <option selected><? echo "$mes_final"; ?></option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
</select>
<select class='class02' name="ano_final" id="ano_final">
          <option selected><? echo $ano_atual ?></option>
            <option><?  echo $ano_anterior;  ?></option>
            <option><?  echo $ano_proximo;  ?></option>
</select>
<input class='class01' type="submit" name="button" id="button" value="Pesquisar">
                        </form>
      </div></td>
  </tr>
</table>

</p>

<?
	if(empty($cpf2)){
		
	}
	else{
if($solicitacao=="periodico"){

		$sql = "SELECT * FROM propostas_veiculos where data_proposta between '$datainicial'and '$datafinal' order by data_proposta,horaproposta asc";
	}
		
if($solicitacao=="porcpf"){	

$sql = "SELECT * FROM propostas_veiculos where cpf = '$cpf2' and status <> '' order by data_proposta,horaproposta asc";
	}
	

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$num_proposta = $linha[0];

$dataproposta = $linha[1];

$horaproposta = $linha[2];

$mes_ano = $linha[3];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status2 = $linha[6];

$tipo = $linha[7];

$tipo_proposta = $linha[8];

$nome = $linha[9];

$tipo_pessoa = $linha[10];

$data_nasc = $linha[11];

$cpf = $linha[12];

$rg = $linha[13];

$orgao = $linha[14];

$emissao = $linha[15];

$sexo = $linha[16];

$estadocivil = $linha[17];

$nacionalidade = $linha[18];

$quant_dependente = $linha[19];

$pai = $linha[20];

$mae = $linha[21];

$conjuge = $linha[22];

$data_nasc_conjuge = $linha[23];

$endereco = $linha[24];

$numero = $linha[25];

$bairro = $linha[26];

$complemento = $linha[27];

$cidade = $linha[28];

$estado = $linha[29];

$cep = $linha[30];

$correspondencia = $linha[31];

$tipo_residencia = $linha[32];

$valor_aluguel = $linha[33];

$tempo_residencia = $linha[34];

$telefone = $linha[35];

$celular = $linha[36];

$tipo_telefone = $linha[37];

$residencia_anterior = $linha[38];

$bairro_anterior = $linha[39];

$cidade_anterior = $linha[40];

$estado_anterior = $linha[41];

$tempo_residencia_anterior = $linha[42];

$email = $linha[43];

$empresa = $linha[44];

$porte_empresa = $linha[45];

$data_admissao = $linha[46];

$inicio_atividade = $linha[47];

$end_empresa = $linha[48];

$numero_empresa = $linha[49];

$complemento_empresa = $linha[50];

$bairro_empresa = $linha[51];

$cep_empresa = $linha[52];

$cidade_empresa = $linha[53];

$estado_empresa = $linha[54];

$telefone_empresa = $linha[55];

$cpt = $linha[56];

$serie = $linha[57];

$cargo = $linha[58];

$natureza_operacao = $linha[59];

$salario = $linha[60];

$atividade_principal = $linha[61];

$data_constituicao = $linha[62];

$cnpj = $linha[63];

$inscr_est = $linha[64];

$capital_social = $linha[65];

$atividade_anterior = $linha[66];

$data_admissao_anterior = $linha[67];

$data_saida = $linha[68];

$cargo_anterior = $linha[69];

$telefone_empresa_anterior = $linha[70];

$outras_rendas = $linha[71];

$ref_pessoal = $linha[72];

$tel_ref_pessoal = $linha[73];

$ref_pessoal2 = $linha[74];

$tel_ref_pessoal2 = $linha[75];

$ref_comercial = $linha[76];

$tel_ref_comercial = $linha[77];

$ref_banco = $linha[78];

$ref_agencia = $linha[79];

$ref_conta = $linha[80];

$ref_tipo_conta = $linha[81];

$ref_conta_desde = $linha[82];

$cartao_credito = $linha[83];

$automovel = $linha[84];

$valor_automoveis = $linha[85];

$residencia = $linha[86];

$valor_residencia = $linha[87];

$outras_propriedades = $linha[88];

$valor_outras_propriedades = $linha[89];

$veiculo = $linha[90];

$ano_modelo = $linha[91];

$renavam = $linha[92];

$num_portas = $linha[93];

$combustivel = $linha[94];

$placa = $linha[95];

$valor_venda = $linha[96];

$valor_entrada = $linha[97];

$tarifa_cadastro = $linha[98];

$valor_financiar2 = $linha[99];

$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas2 = $linha[102];

$valor_parcelas2 = $linha[103];

$vencto_1_parcela = $linha[104];

$r = $linha[105];

$valor_liberado = $linha[106];

$pagto_serv_terc = $linha[107];

$obs = $linha[108];

$operador = $linha[109];

$cel_operador = $linha[110];

$email_operador = $linha[111];

$estab_pertence = $linha[112];

$cidade_estab_pertence = $linha[113];

$tel_estab_pertence = $linha[114];

$email_estab_pertence = $linha[115];

$operador_alterou = $linha[116];

$operador = $linha[117];

$cel_operador_alterou = $linha[118];

$email_operador_alterou = $linha[119];

$estab_alterou = $linha[120];

$cidade_estab_alterou = $linha[121];

$tel_estab_alterou = $linha[122];

$email_estab_alterou = $linha[123];

$dataalteracao = $linha[124];

$horaalteracao = $linha[125];

$recebido = $linha[126];

$comissao_op = $linha[127];

$meses = $linha[128];

$parecer_credito = $linha[145];

$titulo_proposta = $linha[150];



?>            



<table width="100%"  border="0">

  <tr bgcolor="#<? echo "008080"; ?>">

    <td><div align="center"><font size="2">N&ordm; da Proposta </font></div></td>

    <td><div align="center"><font size="2">Data Proposta</font></div></td>
    <td><div align="center"><font size="2">Alterar Status </font></div></td>

    <td><div align="center"><font size="2">Imprimir</font></div></td>

    <td><div align="center"><font size="2">Valor Cr&eacute;dito</font></div></td>

    <td width="7%"><div align="center"><font size="2">Quant  parcelas </font></div></td>

    <td width="8%"><div align="center"><font size="2">Valor parcelas </font></div></td>

    <td><div align="center">Titulo Proposta</div></td>
    <td><div align="center"><font size="2">Status</font></div></td>
  </tr>



  <tr>

    <td width="17%">

        <form name="form2" method="post" action="editar_proposta.php"><div align="center">

          <font size="2">

          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          <input class='class01' name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
          <? printf("$linha[0]"); ?>

          <input class='class01' type="submit" name="Submit3" value="Editar Proposta">

          <strong><font color="#0000FF">

          <input class='class01' name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d/m/Y'); ?>">

          <input class='class01' name="horaalteracao" type="hidden" id="horaproposta" value="<? echo date('H:i:s'); ?>">

          </font></strong> </font>

        </div></form>    </td>

    <td width="10%"><div align="center"><font size="2"><? echo $dataproposta;?></font><font size="2"><? echo " - $horaproposta";?></font></div></td>
    <td width="13%">

      <form name="form2" method="post" action="altera_status.php">

        <div align="center">

        <font size="2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class='class01' name="num_proposta" type="hidden" id="num_proposta3" value="<? echo $num_proposta; ?>">

        <input class='class01' type="submit" name="Submit3222" value="Alterar Status">
      </font>      </div></form>    </td>

    <td width="11%">

      <form action="imprimir_proposta.php" method="post" name="form2" target="_blank"><div align="center">

        <font size="2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class='class01' name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

        <input class='class01' type="submit" name="Submit32"  value="Imprimir">

        <strong><font color="#0000FF">

        <input class='class01' name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d/m/Y'); ?>">

        <input class='class01' name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo date('H:i:s'); ?>">

        </font></strong> </font>

      </div></form>    </td>

    <td width="8%"><div align="center"><font size="2"><? echo "R$ ".$valor_financiar2;?> </font></div></td>

    <td><div align="center"><font size="2"><? echo $num_parcelas2;?> </font></div></td>

    <td><div align="center"><font size="2"><? echo "R$ ".$valor_parcelas2;?> </font></div></td>

    <td width="11%"><div align="center"><font size="2"><? echo $titulo_proposta;?></font></div></td>
    <td width="15%"><div align="center"><font size="2"><? echo $status2;?> </font></div></td>

	</tr>


    
</table>
<? } 
	}
	?>
<p></p>







</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>