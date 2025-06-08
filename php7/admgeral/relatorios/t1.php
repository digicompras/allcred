 <tr>
            <td align="center"><strong><font color="#0000FF"><? echo $parc1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $banco1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $vencto1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $parcelaspagas1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $taxajuros1; ?></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><? echo $numcontrato1; ?></font></strong></td>
            <td align="center" valign="baseline"><input name="valorliberado1" type="text" class='class02' id="valorliberado1" value="<? echo "$valorliberado1"; ?>" size="5">
              <input name="linha1" type="hidden" class='class02' id="linha1" value="1" size="5" readonly="readonly"></td>
            <td align="center" valign="baseline"><strong><font color="#0000FF">
              <select class='class02' name="bancodigitacao1" id="bancodigitacao1">
                <option selected><? echo "$bancodigitacao1"; ?></option>
                <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
            </select>
            </font></strong></td>
            <td align="center" valign="baseline"><select class='class02' name="tipooperacao1" id="tipooperacao1">
              <option selected><? echo "$tipooperacao1"; ?></option>
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