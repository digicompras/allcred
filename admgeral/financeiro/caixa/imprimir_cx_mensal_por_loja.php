<?

session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");
?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

require '../../../conect/conect.php';

$solicitacao = $_POST['solicitacao'];

$nfantasia = $_POST['nfantasia'];
$diainicial = $_POST['diainicial'];
$mesinicial = $_POST['mesinicial'];
$anoinicial = $_POST['anoinicial'];

$diafinal = $_POST['diafinal'];
$mesfinal = $_POST['mesfinal'];
$anofinal = $_POST['anofinal'];

$dateinicial = "$anoinicial-$mesinicial-$diainicial";
$datefinal = "$anofinal-$mesfinal-$diafinal";


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>



<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
}
.style2 {font-weight: bold}
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.style8 {color: #000000}
.style9 {color: #000000; font-weight: bold; }
.style11 {font-size: 10px}
.style12 {color: #000000; font-weight: bold; font-size: 10px; }
.style10 {font-size: 10px;
	font-weight: bold;
}
-->
</style>
<body bgcolor="#<? printf("ffffff"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>




<?
$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];
}


?>

  <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	

}
?>
  <table width="100%"  border="0">
        <tr>
          <td bgcolor="#CCCCCC"><div align="center"><span class="style2">
</span> <span class="style1"><? echo $nome_op; ?></span><span class="style2"> verificando os lan&ccedil;amentos do caixa da loja <? echo $nfantasia; ?> no periodo <? echo "$diainicial-$mesinicial-$anoinicial a $diafinal-$mesfinal-$anofinal"; ?><BR>
	      </span></div></td>
        </tr>
</table>
          
<div align="center"></div>
     <div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><div align="center">
        </div></td>
    </tr>
    <tr>
      <td valign="top"><div align="center">
        <table width="100%"  border="0">
          <tr>
            <td colspan="5"><div align="center"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="30%" valign="top"><table width="100%"  border="1">
              <tr bgcolor="#CCCCCC">
                <td colspan="5"><div align="center"><strong>Entradas</strong></div></td>
              </tr>
              <tr bgcolor="ffffff">
                <td width="15%"><div align="center" class="style10">Data</div></td>
                <td width="23%"><div align="center" class="style3 style8 style11">Valor </div></td>
                <td><div align="center" class="style11"><strong>Verba</strong></div></td>
                <td><div align="center" class="style11"><strong>Cod. Lan&ccedil;.</strong></div></td>
                <td><div align="center" class="style12">Hist&oacute;rico</div></td>
              </tr>
              <?
			

$sql = "SELECT * FROM cx_entradas where datecadastro between '$dateinicial' and '$datefinal' and nfantasia = '$nfantasia' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$nfantasia = $linha[22];
$historico_entrada = $linha[23];
$categoria_conta_entrada = $linha[24];
$valor_entrada = $linha[25];
$num_sete_um = $linha[26];
$modo_pagto = $linha[27];


?>
              <tr>
                <td><div align="center" class="style11"><? echo $datacadastro; ?></div></td>
                <td><div align="center" class="style11"><? echo "R$ ". $valor_entrada; ?> </div></td>
                <td width="29%"><div align="center" class="style11"><? echo $categoria_conta_entrada; ?></div></td>
                <td width="33%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>
                <td width="33%">
                  <div align="center" class="style11"><? echo $historico_entrada; ?></div></td>
              </tr>
              <? } ?>
              <tr>
                <td><div align="center"><span class="style11"></span></div></td>
                <td><span class="style11"></span></td>
                <td><div align="center"><span class="style11"></span></div></td>
                <td><div align="center"><span class="style11"></span></div></td>
                <td><span class="style11"></span></td>
              </tr>
              <tr>
                <td colspan="5"><div align="center"><strong> Total
                          <?


$sql = "select sum(valor) as total_entradas from cx_entradas where datecadastro between '$dateinicial' and '$datefinal' and nfantasia = '$nfantasia'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_entradas = bcadd($linha['total_entradas'],0,2);

echo "R$ ".$valor_total_entradas;
?>
                </strong></div></td>
              </tr>
            </table></td>
            <td width="1%">&nbsp;</td>
            <td width="41%" align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"><strong>Total Geral</strong></td>
                <td colspan="3" align="center"><strong>Total Comiss&atilde;o Empresa</strong></td>
              </tr>
              <tr>
                <td><div align="center"><strong>
                  <?
	
											
$sql7 = "select sum(valor_credito) as total from propostas where data_alteracao between '$dateinicial' and '$datefinal' and status = 'PAGO AO CLIENTE'";
$resultado7=mysql_query($sql7, $conexao);
$linha=mysql_fetch_array($resultado7);


$valor_total_brutogeral = $linha['total'];

$valortotalbrutogeral = bcadd($valor_total_brutogeral,0,2);
					
echo "R$ ".$valortotalbrutogeral;
?>
                </strong></div></td>
                <td colspan="3" align="center"><strong>
                  <?
						
$sql8 = "select sum(valor_a_receber) as total from propostas where data_alteracao between '$dateinicial' and '$datefinal' and status = 'PAGO AO CLIENTE'";
$resultado8=mysql_query($sql8, $conexao);
$linha=mysql_fetch_array($resultado8);


$valor_total_comissao_empresageral = $linha['total'];

$valortotalcomissaoempresageral = bcadd($valor_total_comissao_empresageral,0,2);
					
					echo "R$ ".$valortotalcomissaoempresageral;
?>
                </strong></td>
              </tr>
              <tr>
                <td width="51%" bgcolor="#4475AA"><div align="center"><strong>Agencia</strong></div></td>
                <td width="24%" bgcolor="#4475AA"><div align="center"><strong>Total do M&ecirc;s</strong></div></td>
                <td width="12%" bgcolor="#4475AA"><div align="center"><strong>Comiss&atilde;o Empresa</strong></div></td>
                <td width="13%" align="center" bgcolor="#4475AA"><strong>#</strong></td>
              </tr>
              <tr>
                <td colspan="4" bgcolor="#4475AA"><div align="center">
                  <?
	
					
$sql = "SELECT * FROM propostas where estabelecimento_proposta = '$nfantasia' and data_alteracao between '$dateinicial' and '$datefinal' and status = 'PAGO AO CLIENTE' group by estabelecimento_proposta ";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
	$nome_operador = $linha[1];
$estabelecimento_proposta = $linha[3];
$mes_alteracao_status = $linha[111];
$ano_alteracao_status = $linha[112];
	


?>
                  <table id="<? echo "$data_detalhada_abrir"; ?> "width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="51%"><div align="center"><strong><? echo "$estabelecimento_proposta"; ?></strong></div></td>
                      <td width="24%"><div align="center"><strong><? 
	$sql2 = "select sum(valor_credito) as total from propostas where estabelecimento_proposta = '$nfantasia' and data_alteracao between '$dateinicial' and '$datefinal' and status = 'PAGO AO CLIENTE'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);


$valor_total_bruto = $linha['total'];

$valortotalbrutogeral = bcadd($valor_total_bruto,0,2);
					
echo "R$ ".$valortotalbrutogeral;
	
	
$percetualdecontribuicaodaagenciaparvalortotal = bcdiv($valor_total_bruto,$valor_total_brutogeral,9);
	
$percetualdecontribuicaodaagenciaparvalortotal2 = bcmul($percetualdecontribuicaodaagenciaparvalortotal,100,5);
	
echo "<br> ($percetualdecontribuicaodaagenciaparvalortotal2%)";
	
	
						  ?></strong></div></td>
                      <td width="25%" align="center"><strong><? 
	$sql3 = "select sum(valor_a_receber) as total from propostas where estabelecimento_proposta = '$nfantasia' and data_alteracao between '$dateinicial' and '$datefinal' and status = 'PAGO AO CLIENTE'";
$resultado3=mysql_query($sql3, $conexao);
$linha=mysql_fetch_array($resultado3);


$valor_total_comissao_empresa = $linha['total'];

$valortotalcomissaoempresa = bcadd($valor_total_comissao_empresa,0,2);
	
	echo "R$ $valortotalcomissaoempresa"; 
	
	
$percetualdecontribuicaodaagenciaparcomissaogeral = bcdiv($valor_total_comissao_empresa,$valor_total_comissao_empresageral,9);
	
$percetualdecontribuicaodaagenciaparcomissaogeral2 = bcmul($percetualdecontribuicaodaagenciaparcomissaogeral,100,5);
	
echo "<br> ($percetualdecontribuicaodaagenciaparcomissaogeral2%)";
	
						  ?></strong></td>
                      <td width="25%"><div align="center">
                        <form name="form1" method="post" action="imprimir_cx_mensal_por_loja.php".php#<? echo "$data_detalhada_abrir"; ?>">
                          <strong>
                            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                            </strong>
                          <input name="solicitacao" type="hidden" id="solicitacao" value="<? if($solicitacao=="analitico"){ echo "sintetico"; }else{ echo "analitico"; } ?>">
                          <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo "$nfantasia"; ?>">
                          <input name="diainicial" type="hidden" id="diainicial" value="<? echo "$diainicial";  ?>">
                          <input name="mesinicial" type="hidden" id="mesinicial" value="<? echo "$mesinicial"; ?>">
                          <input name="anoinicial" type="hidden" id="anoinicial" value="<? echo "$anoinicial"; ?>">
                          <input name="diafinal" type="hidden" id="diafinal" value="<? echo "$diafinal"; ?>">
                          <input name="mesfinal" type="hidden" id="mesfinal" value="<? echo "$mesfinal"; ?>">
                          <input name="anofinal" type="hidden" id="anofinal" value="<? echo "$anofinal"; ?>">
                          <input type="submit" class='class01' name="button2" id="button2" value="<? if($solicitacao=="analitico"){ echo "-"; }else{ echo "+"; } ?>">
                        </form>
                      </div></td>
                    </tr>
                    <tr>
                      <td colspan="4"><div align="center">
                        <?
	
	
if($solicitacao=="analitico"){


?>
                        <?
$sql4 = "SELECT * FROM propostas where data_alteracao between '$dateinicial' and '$datefinal' and estabelecimento_proposta = '$nfantasia' and status = 'PAGO AO CLIENTE' group by nome_operador order by nome_operador asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$reg++;

$codigo = $linha[0];
$nome_operador = $linha[1];
	$estabelecimento_proposta = $linha[3];
$mes = $linha[111];
$ano = $linha[112];
	
	
	

?>
                        <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                          <tr bgcolor="ffffff">
                            <td width="27%" bgcolor="#696969"><div align="center" class="style10">Operador</div></td>
                            <td width="37%" bgcolor="#696969"><div align="center" class="style3 style8 style11">Total Produ&ccedil;&atilde;o </div></td>
                            <td width="36%" bgcolor="#696969"><div align="center" class="style11"><strong>Total Comiss&atilde;o Empresa</strong></div></td>
                            </tr>
                          <tr>
                            <td><div align="center" class="style11"><? echo "$nome_operador"; ?></div></td>
                            <td><div align="center" class="style11"><? 
	$sql5 = "select sum(valor_credito) as total from propostas where estabelecimento_proposta = '$nfantasia' and nome_operador = '$nome_operador' and data_alteracao between '$dateinicial' and '$datefinal' and status = 'PAGO AO CLIENTE' ";
$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);


$valor_total_brutooperador = $linha['total'];

$valortotalbrutooperador = bcadd($valor_total_brutooperador,0,2);
	
	echo "R$ ". $valortotalbrutooperador; 
								
								
$percetualdecontribuicaodooperadorreferenteavalortotalbrutodaagencia = bcdiv($valor_total_brutooperador,$valor_total_bruto,9);
	
$percetualdecontribuicaodooperadorreferenteavalortotalbrutodaagencia2 = bcmul($percetualdecontribuicaodooperadorreferenteavalortotalbrutodaagencia,100,5);
	
echo "<br> ($percetualdecontribuicaodooperadorreferenteavalortotalbrutodaagencia2%)";
	
								?></div></td>
                            <td><div align="center" class="style11"><?
	$sql6 = "select sum(valor_a_receber) as total from propostas where estabelecimento_proposta = '$nfantasia' and nome_operador = '$nome_operador' and data_alteracao between '$dateinicial' and '$datefinal' and status = 'PAGO AO CLIENTE' ";
$resultado6=mysql_query($sql6, $conexao);
$linha=mysql_fetch_array($resultado6);


$valor_total_comissao_empresaoperador = $linha['total'];

$valortotalcomissaoempresaoperador = bcadd($valor_total_comissao_empresaoperador,0,2);
	
	
	echo $valortotalcomissaoempresaoperador; 
	
	
$percetualdecontribuicaodooperadorreferenteacomissaodaagencia = bcdiv($valor_total_comissao_empresaoperador,$valor_total_comissao_empresa,9);
	
$percetualdecontribuicaodooperadorreferenteacomissaodaagencia2 = bcmul($percetualdecontribuicaodooperadorreferenteacomissaodaagencia,100,5);
	
echo "<br> ($percetualdecontribuicaodooperadorreferenteacomissaodaagencia2%)";
								
								
								
								?></div></td>
                            </tr>
                          </table>
                        <?  } } ?>
                      </div>
                        <div align="center"></div></td>
                    </tr>
                  </table>
                  <br>
                  <? } ?>
                </div></td>
              </tr>
            </table></td>
            <td width="1%">&nbsp;</td>
            <td width="27%" valign="top"><table width="100%"  border="1">
              <tr bgcolor="#CCCCCC">
                <td colspan="6"><div align="center"><strong>Sa&iacute;das</strong></div></td>
              </tr>
              <tr bgcolor="ffffff">
                <td width="12%"><div align="center" class="style11"><strong>Data</strong></div></td>
                <td width="15%"><div align="center" class="style3 style8 style11">Valor</div></td>
                <td><div align="center" class="style11"><strong>Verba</strong></div></td>
                <td><div align="center" class="style10">Cod. Lan&ccedil;.</div></td>
                <td><div align="center" class="style10">Modo Pagto </div></td>
                <td><div align="center" class="style12">Hist&oacute;rico</div></td>
              </tr>
			                  <?
			

$sql = "SELECT * FROM cx_saidas where datecadastro between '$dateinicial' and '$datefinal' and nfantasia = '$nfantasia' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$nfantasia = $linha[22];
$historico_saida = $linha[23];
$categoria_conta_saida = $linha[24];
$valor_saida = $linha[25];
$num_sete_um = $linha[26];
$modo_pagto = $linha[27];


?>

              <tr>
                <td><div align="center"><span class="style11"><? echo $datacadastro; ?></span></div></td>
                <td><div align="center" class="style11"><? echo "R$ ". $valor_saida; ?> </div></td>
                <td width="21%"><div align="center"><span class="style11"><? echo $categoria_conta_saida; ?></span></div></td>
                <td width="10%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>
                <td width="15%"><div align="center"><span class="style11"><? echo $modo_pagto; ?></span></div></td>
                <td width="27%">
                  <div align="center" class="style11"><? echo $historico_saida; ?></div></td>
              </tr>
              <? } ?>
              <tr>
                <td><div align="center"><span class="style11"></span></div></td>
                <td><span class="style11"></span></td>
                <td><div align="center"><span class="style11"></span></div></td>
                <td><div align="center"><span class="style11"></span></div></td>
                <td><div align="center"><span class="style11"></span></div></td>
                <td><span class="style11"></span></td>
              </tr>
              <tr>
                <td colspan="6"><div align="center"><strong> Total
                          <?


$sql = "select sum(valor) as total_saidas from cx_saidas where datecadastro between '$dateinicial' and '$datefinal' and nfantasia = '$nfantasia'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_saidas = bcadd($linha['total_saidas'],0,2);
					


echo "R$ ".$valor_total_saidas;
?>
                </strong></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
    <br>
<table width="100%"  border="1">
  <tr>
    <td width="33%"><div align="right"></div></td>
    <td width="34%" bgcolor="#CCCCCC"><div align="left"></div>      
    <div align="center" class="style2">Saldo 
      <?
$saldo = bcsub($valor_total_entradas,$valor_total_saidas,2);

echo "R$ ".$saldo;
?>
    </div></td>
    <td width="33%">&nbsp;</td>
  </tr>
</table><br><br>
<p>&nbsp;</p>
