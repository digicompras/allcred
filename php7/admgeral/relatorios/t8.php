<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros8; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato8; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado8" type="text" class='class02' id="valorliberado8" value="<? echo "$valorliberado8"; ?>" size="5">
              <input name="linha8" type="hidden" class='class02' id="linha8" value="8" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao8" id="bancodigitacao8">
                <option selected><? echo "$bancodigitacao8"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao8" id="tipooperacao8">
              <option selected><? echo "$tipooperacao8"; ?></option>
              <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' and status = 'Ativo' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
            </select></td>
          </tr>