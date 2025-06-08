<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros4; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato4; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado4" type="text" class='class02' id="valorliberado4" value="<? echo "$valorliberado4"; ?>" size="5">
              <input name="linha4" type="hidden" class='class02' id="linha4" value="4" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao4" id="bancodigitacao4">
                <option selected><? echo "$bancodigitacao4"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao4" id="tipooperacao4">
              <option selected><? echo "$tipooperacao4"; ?></option>
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