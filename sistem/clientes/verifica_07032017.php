<?

session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");
?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

require '../../conect/conect.php';

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y ");

$hoje = strftime("%A");

?>

<?

$sql = "select * from hora_encerramento where dia = '$hoje' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$dia = $linha[1];
$horas_inicio = $linha[2];
$minutos_inicio = $linha[3];
$segundos_inicio = $linha[4];
$horas_termino = $linha[5];
$minutos_termino = $linha[6];
$segundos_termino = $linha[7];

$h_inicio_proposta = $linha[8];
$m_inicio_proposta = $linha[9];
$s_inicio_proposta = $linha[10];
$h_termino_proposta = $linha[11];
$m_termino_proposta = $linha[12];
$s_termino_proposta = $linha[13];

}

$hora_iniciar_propostas = "$h_inicio_proposta".":"."$m_inicio_proposta".":"."$s_inicio_proposta";
$hora_terminar_propostas = "$h_termino_proposta".":"."$m_termino_proposta".":"."$s_termino_proposta";

?>



<?
$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$sexo = $linha[2];
$estadocivil = $linha[3];
$cpf = $linha[4];
$rg = $linha[5];
$orgao = $linha[6];
$emissao = $linha[7];
$data_nasc = $linha[8];
$pai = $linha[9];
$mae = $linha[10];
$endereco = $linha[11];
$numero = $linha[12];
$bairro = $linha[13];
$complemento = $linha[14];
$cidade = $linha[15];
$estado = $linha[16];
$cep = $linha[17];
$telefone = $linha[18];
$celular = $linha[19];
$email = $linha[20];
$operador = $linha[21];
$cel_operador = $linha[22];
$email_operador = $linha[23];
$estabelecimento = $linha[24];
$cidade_estabelecimento = $linha[25];
$tel_estabelecimento = $linha[26];
$email_estabelecimento = $linha[27];
$obs = $linha[28];
$datacadastro = $linha[29];
$horacadastro = $linha[30];
$dataalteracao = $linha[31];
$horaalteracao = $linha[32];
$operador_alterou = $linha[33];
$cel_operador_alterou = $linha[34];
$email_operador_alterou = $linha[35];
$estabelecimento_alterou = $linha[36];
$cidade_estabelecimento_alterou = $linha[37];
$tel_estabelecimento_alterou = $linha[38];
$email_estabelecimento_alterou = $linha[39];
$usuario_op = $linha[40];
$senha_op = $linha[41];
$tipo_op = $linha[42];
$funcao = $linha[43];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];
$salario = $linha[48];
$vale_alimentacao = $linha[49];
$gratificacao = $linha[50];
$comissao = $linha[51];
$emprestimo = $linha[52];
$admissao = $linha[53];
$demissao = $linha[54];
$meta = $linha[55];
$status = $linha[56];
$bloqueio_parcial = $linha[57];
$tempo_almoco = $linha[58];
$bloqueio_compra = $linha[59];

}

$cpf = $_POST['cpf'];


$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$nome = $linha[1];

//$cpf = $linha[4];
$rg = $linha[5];
$mae = $linha[10];


$telefone = $linha[18];

$celular = $linha[19];

$tipo = $linha[40];
$num_beneficio = $linha[44];

$status_cliente = $linha[89];
$tem_margem = $linha[107];

$date_margem_verificada = $linha[122];
$hora_margem_verificada = $linha[123];

$secretaria = $linha[124];

$fazer_portabilidade = $linha[126];
$obs_das_margens = $linha[127];

$valor_parcela = $linha[128];
$saldo_devedor = $linha[129];
$parcelas_em_aberto = $linha[130];
$prazo_contrato = $linha[131];
$aprovacao = $linha[132];
$valor_liberado = $linha[133];
$categoria = $linha[134];

$valorrenda = $linha[136];

}
?>



<?

if($status_cliente =="Inativo"){
echo "<script>
alert('ATENÇÃO!!!... CLIENTE BLOQUEADO NO SISTEMA, IMPOSSÍVEL EFETUAR PROPOSTA!');
</script>";
}
?>


  <?
if(($reg==1) && ($status_cliente=="Ativo")){
echo "ATENÇÃO!!!...O cliente "?>
  <style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
}
.style2 {font-weight: bold}
-->
  </style>
  <span class="style1"><? echo $nome; ?></span><? echo " já está cadastrado no sistema!<br><br>Nº de Matrícula do Cliente: $codigo ";
//$reg=0;
}
if(($reg==1) && ($status_cliente=="Inativo")){
echo "Cliente impossibilitado de operar na EMPRESA!<br><br> Verifique as informações abaixo!<br><br>";


$sql = "SELECT * FROM observacoes_de_clientes where cpf = '$cpf' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_observacoes = $linha[0];
$cod_cli_observacoes = $linha[1];
$cpf_observacoes = $linha[2];
$data_observacoes = $linha[3];
$hora_observacoes = $linha[4];
$observacoes_do_cliente = $linha[5];
$operador_observacoes = $linha[6];
}

echo "$data_observacoes - "."$observacoes_do_cliente - "."$operador_observacoes";



}

if($reg==0){
echo "Cliente NÃO cadastrado na base de dados do sistema!<br><br> Clique em CADASTRAR CLIENTE!";
}

?>

  <form name="form1" method="post" action="../propostas/menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Voltar">
</form>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center">
        <?

echo "<blink>Olá! hoje é $data_completa e o horário para efetivação de propostas tem início as $hora_iniciar_propostas e término as $hora_terminar_propostas</blink>";

?>

      </div></td>
    </tr>
  </table>
  <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>

  <table width="100%"  border="0">
  <tr>
    <td width="26%">
	
	<form action="../propostas/informacoes_antecedem_efetuar_proposta.php" method="post" name="form1">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
      <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estab_pertence; ?>">
      <input name="bloqueio_compra" type="hidden" id="bloqueio_compra" value="<? echo $bloqueio_compra; ?>" />
      <input name="valorrenda" type="hidden" id="valorrenda" value="<? echo $valorrenda; ?>" />
      <?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0"."$horacerta".date(':i:s');
}
else{
$hora_atual = "$horacerta".date(':i:s');
}
?>
<?
$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";




?>

  
<?
            //echo "<input type='submit' name='Submit2' value='Efetuar Proposta'>";

if(($reg==1) && ($status_cliente=="Ativo") && ($bloqueio_parcial=="Não") && ($hora_atual>$hora_iniciar_propostas) && ($hora_atual<$hora_terminar_propostas)){
echo('<input type="submit" name="Submit" value="Preencher Proposta">');
}
else{
if($bloqueio_parcial=="Sim"){
echo "Bloqueado para efetuar proposta";
}
else{

if($reg==0){

echo "ATENÇÃO!!!...Impossível efetuar proposta!<br> O cliente dever estar cadastrado no sistema!";

}
else{

echo "ATENÇÃO!!!...Impossível efetuar proposta nesse momento por estar fora do horário limite que é das $hora_iniciar_propostas até as $hora_terminar_propostas";

}
}


}
?>
    </form></td>
    <td width="34%"><form action="cadcli_insert.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
      <? if($reg==0){ 
echo"<select name='resposta' id='select5'>";
    $sql = "select * from como_conheceu_empresa order by resposta asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['resposta']."</option>";
   }
      echo"</select>";

}
  ?>
      <?
if($reg==0){

echo('<input type="submit" name="Submit" value="Cadastrar Cliente">');
}
?>
    </form></td>
    <td width="40%"><form action="editar_cliente.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="cpf" type="hidden" id="cpf5" value="<? echo $cpf; ?>">
<?
if(($reg==1) && ($status_cliente=="Ativo")  && ($funcao<>"Agente")){
echo "<input type='submit' name='Submit2' value='Editar Cliente'>";
}
?>
    </form></td>
  </tr>
</table>




      <table width="100%"  border="0">
        <tr>
          <td><div align="center"><span class="style2">
            <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome = $linha[4];



?>
          Listando todas as propostas do cliente:</span> <span class="style2"><? printf("$linha[4]"); ?><BR>
		   CPF:  <? echo $cpf; ?>        <? } ?> </span></div></td>
        </tr>
      </table>
      
<table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
      <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' order by num_proposta desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tipo_proposta = $linha[83];

$valor_liquido_cliente = $linha[115];



?>            
      <table width="100%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center">N&ordm; da Proposta </div></td>
          <td><div align="center">Tipo Proposta</div></td>
          <td><div align="center">Valor Liquido Cliente</div></td>
          <td width="19%"><div align="center">Quant de parcelas </div></td>
          <td width="17%"><div align="center">Valor das parcelas </div></td>
          <td><div align="center">Status</div></td>
        </tr>
		
        <tr>
          <td width="23%">               <form action="../propostas/imprimir_proposta.php" method="post" name="form2" target="_blank">
            <div align="center">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
              <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
              <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>
              <? printf("$linha[0]"); ?>                
              <input type="submit" name="Submit" value="Visualizar Proposta">
                </div>
          </form></td>
          <td width="22%"><div align="center"><? echo $tipo_proposta; ?></div></td>
          <td width="22%"><div align="center"><strong><font color="#0000FF"><? echo "R$ ". $valor_liquido_cliente; ?></font></strong></div></td>
          <td><div align="center"><? printf("$linha[26]"); ?>
          </div></td>
          <td><div align="center"><? printf("$linha[27]"); ?>
          </div></td>
          <td width="19%"><div align="center"><? printf("$linha[51]"); ?>
          </div></td>
		  <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>
      </table>

