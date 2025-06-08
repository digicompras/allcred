<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros10; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato10; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado10" type="text" class='class02' id="valorliberado10" value="<? echo "$valorliberado10"; ?>" size="5">
              <input name="linha10" type="hidden" class='class02' id="linha10" value="10" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao10" id="bancodigitacao10">
                <option selected><? echo "$bancodigitacao10"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao10" id="tipooperacao10">
              <option selected><? echo "$tipooperacao10"; ?></option>
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