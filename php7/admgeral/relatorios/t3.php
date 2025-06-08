<tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros3; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato3; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado3" type="text" class='class02' id="valorliberado3" value="<? echo "$valorliberado3"; ?>" size="5">
              <input name="linha3" type="hidden" class='class02' id="linha3" value="3" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao3" id="bancodigitacao3">
                <option selected><? echo "$bancodigitacao3"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao3" id="tipooperacao3">
              <option selected><? echo "$tipooperacao3"; ?></option>
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