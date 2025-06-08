<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros5; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato5; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado5" type="text" class='class02' id="valorliberado5" value="<? echo "$valorliberado5"; ?>" size="5">
              <input name="linha5" type="hidden" class='class02' id="linha5" value="5" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao5" id="bancodigitacao5">
                <option selected><? echo "$bancodigitacao5"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao5" id="tipooperacao5">
              <option selected><? echo "$tipooperacao5"; ?></option>
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