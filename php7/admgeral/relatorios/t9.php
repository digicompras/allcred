<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros9; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato9; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado9" type="text" class='class02' id="valorliberado9" value="<? echo "$valorliberado9"; ?>" size="5">
              <input name="linha9" type="hidden" class='class02' id="linha9" value="9" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao9" id="bancodigitacao9">
                <option selected><? echo "$bancodigitacao9"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao9" id="tipooperacao9">
              <option selected><? echo "$tipooperacao9"; ?></option>
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