<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros7; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato7; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado7" type="text" class='class02' id="valorliberado7" value="<? echo "$valorliberado7"; ?>" size="5">
              <input name="linha7" type="hidden" class='class02' id="linha7" value="7" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao7" id="bancodigitacao7">
                <option selected><? echo "$bancodigitacao7"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao7" id="tipooperacao7">
              <option selected><? echo "$tipooperacao7"; ?></option>
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