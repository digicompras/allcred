<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros2; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato2; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado2" type="text" class='class02' id="valorliberado2" value="<? echo "$valorliberado2"; ?>" size="5">
              <input name="linha2" type="hidden" class='class02' id="linha2" value="2" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao2" id="bancodigitacao2">
                <option selected><? echo "$bancodigitacao2"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao2" id="tipooperacao2">
              <option selected><? echo "$tipooperacao2"; ?></option>
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