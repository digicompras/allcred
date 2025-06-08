<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros6; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato6; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado6" type="text" class='class02' id="valorliberado6" value="<? echo "$valorliberado6"; ?>" size="5">
              <input name="linha6" type="hidden" class='class02' id="linha6" value="6" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao6" id="bancodigitacao6">
                <option selected><? echo "$bancodigitacao6"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao6" id="tipooperacao6">
              <option selected><? echo "$tipooperacao6"; ?></option>
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