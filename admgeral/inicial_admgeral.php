<?php

ini_set('default_charset','UTF8_general_mysql500_ci');

require '../conect/conect.php';

?>

<?

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");

$dia = date('d');

$mes = date('m');

$ano = date('Y');

$datacadastro = date('d-m-Y');

$horacadastro = date('H:i:s');

$date = date('Y-m-d');

$historico = "Lançamento efetuado automaticamente pelo sistema na virada do mês!!!...";

$valor = "0.00";

$num_sete_um = $_POST['num_sete_um'];

if($dia<="03"){

$sql = "SELECT * FROM estabelecimentos order by nfantasia asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$nfantasia = $linha[2];


$sql2= "select * from cx_entradas where nfantasia = '$nfantasia' and mes = '$mes' and ano = '$ano'";
$result=mysql_query($sql2,$conexao);

if(mysql_num_rows($result)==0){

$sql3 = "SELECT * FROM categorias_receitas where status_categoria_receita = 'Ativo' order by categoria asc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {



$categoria_conta = $linha[1];



$comando = "insert into cx_entradas(dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,valor,num_sete_um,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento) values('$dia','$mes','$ano','$datacadastro','$horacadastro','$nfantasia','$historico','$categoria_conta','$valor','$num_sete_um','Lançamento Automático','Lançamento Automático','Lançamento Automático','Lançamento Automático','Lançamento Automático','Lançamento Automático','Lançamento Automático')";


mysql_query($comando,$conexao);

}



}



}



}


?>







<?



$dataatual = date('Y-m-d');







$periodo_atual = "$diaatual-$mesatual";



$sql = "SELECT * FROM estacoesdoano where '$dataatual' between datainicio and datatermino";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$estacaodoano = $linha[1];



$imagem_da_estacao = $linha[4];



$datainicio = $linha[2];

$datatermino = $linha[3];



}





?>





<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="refresh" content="120" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

	background-image: url(../background/preview.jpg);

	background-repeat: no-repeat;

	background-attachment:fixed

}

.style1 {

	font-size: 16px;

	font-weight: bold;

}

.style2 {font-size: 9px}

.style3 {font-size: 10px; }

.style5 {font-size: 10px; font-weight: bold; }

.style7 {font-size: 16px}



.style8 {

	color: #0000FF;

	font-size: 16px;

	font-weight: bold;

}

.style9 {

	color: #FF0000;

	font-size: 16px;

	font-weight: bold;

}-->

</style></head>



<body>

<table width="100%" border="0">

  <tr>

    <td colspan="9" bgcolor="#B1C3D9">

    

      <div align="center">

        <form action="inicial_admgeral.php" method="post" name="form4" target="navegacao">

          <span class="style1">

          <?





$num_dia = date('w');

$sql = "SELECT * FROM dias_semana where num_dia = '$num_dia' limit 1";



$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$dia_hoje = $linha[2];

$dia_semana = $linha[2];



}



?>

          <?

$sql = "SELECT * FROM hora_certa limit 1";



$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {





$acao = $linha[5];

$hora_ajuste = $linha[2];



}



$horacerta = date('H')+$hora_ajuste;

if($horacerta<=9){

$hora_atual = "0".$horacerta.date(':i:s');

}

else{

$hora_atual = $horacerta.date(':i:s');

}





?>

          <?

$sql = "SELECT * FROM hora_ponto limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$h_ponto = $linha[1];

$m_ponto = $linha[2];

$s_ponto = $linha[3];



}



$hora_ponto = "$h_ponto:$m_ponto:$s_ponto";

?>

          <?

$data = date('d-m-Y');





$mes_ano = date('m-Y');





$dia = date('d');

$mes = date('m');

$ano = date('Y');



?>

          <?



if($hora_atual>=$hora_ponto){



$sql = "SELECT * FROM operadores where status = 'Ativo' and funcao <> 'Agente' and cidade_estab_pertence <> 'Franca' order by nome ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {









$nome_operador = $linha[1];



$funcionario = $linha[42];



$funcao = $linha[43];



$estab_pertence = $linha[44];



$horariologin = $linha[61];

$horaslogin = $linha[62];

$minutoslogin = $linha[63];

$segundoslogin = $linha[64];











$sql2 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date' order by date desc";



$resultado=mysql_query($sql2);



$registros_total = mysql_num_rows($resultado);



//echo $registros_total;







if($registros_total>="1"){



//$mensagem = "Já marcou o ponto, Por essa razão não foi lançada falta para esse funcionário!";



}

else{







if(($dia_semana<>"Sábado") && ($dia_semana<>"Domingo")){



if($horariologin=="diferenciado"){



}

else{



$comando = "insert into ponto(nome,data,ent_m,mes_ano,sai_m,ent_t,sai_t,dia_semana,dia,mes,ano,date,estab_pertence)

values('$nome_operador','$data','FALTOU','$mes_ano','FALTOU','FALTOU','FALTOU','$dia_semana','$dia','$mes','$ano','$date','$estab_pertence')";



mysql_query($comando,$conexao);



}







}



}



}

}



?>

          <?



if($hora_atual>=$hora_ponto){





if($dia_hoje=="Sexta-Feira"){





$sql = "SELECT * FROM operadores where status = 'Ativo' and funcao <> 'Agente' order by nome ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {









$nome_operador = $linha[1];



$funcionario = $linha[42];



$funcao = $linha[43];



$estab_pertence = $linha[44];







$num_dia_somar = date('w')+1;



if($num_dia_somar>="7"){

$num_dia = "0";

}

else{

$num_dia = $num_dia_somar;



}

$sql2 = "SELECT * FROM dias_semana where num_dia = '$num_dia'";



$res2 = mysql_query($sql2);



while($linha=mysql_fetch_row($res2)) {



$dia_semana_sabado = $linha[2];



}





$date_sabado = date('Y-m-d', strtotime("+1 day"));



$data_sabado = explode("-", $date_sabado);







$dia_sabado = $data_sabado[2];



$ano_sabado = $data_sabado[0];



$mes_sabado = $data_sabado[1];





$data_sabado2 = "$dia_sabado-$mes_sabado-$ano_sabado";

$mes_ano_sabado = "$mes_sabado-$ano_sabado";





$sql3 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date_sabado' order by date desc";



$resultado3=mysql_query($sql3);



$registros_total_sabado = mysql_num_rows($resultado3);















if($registros_total_sabado>="1"){

}

else{



$comando = "insert into ponto(nome,data,ent_m,mes_ano,sai_m,ent_t,sai_t,dia_semana,dia,mes,ano,date,estab_pertence)

values('$nome_operador','$data_sabado2','DSR','$mes_ano_sabado','DSR','DSR','DSR','$dia_semana_sabado','$dia_sabado','$mes_sabado','$ano_sabado','$date_sabado','$estab_pertence')";



mysql_query($comando,$conexao);



}



}





}



}

?>

          <?



if($hora_atual>=$hora_ponto){





if($dia_hoje=="Sexta-Feira"){





$sql = "SELECT * FROM operadores where status = 'Ativo' and funcao <> 'Agente' order by nome ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {









$nome_operador = $linha[1];



$funcionario = $linha[42];



$funcao = $linha[43];



$estab_pertence = $linha[44];







$num_dia_somar = date('w')+2;



if($num_dia_somar>="7"){

$num_dia = "0";

}

else{

$num_dia = $num_dia_somar;



}

$sql2 = "SELECT * FROM dias_semana where num_dia = '$num_dia'";



$res2 = mysql_query($sql2);



while($linha=mysql_fetch_row($res2)) {



$dia_semana_domingo = $linha[2];



}





$date_domingo = date('Y-m-d', strtotime("+2 day"));



$data_domingo = explode("-", $date_domingo);







$dia_domingo = $data_domingo[2];



$ano_domingo = $data_domingo[0];



$mes_domingo = $data_domingo[1];





$data_domingo2 = "$dia_domingo-$mes_domingo-$ano_domingo";

$mes_ano_domingo = "$mes_domingo-$ano_domingo";







$sql3 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date_domingo' order by date desc";



$resultado3=mysql_query($sql3);



$registros_total_domingo = mysql_num_rows($resultado3);















if($registros_total_domingo>="1"){

}

else{



$comando = "insert into ponto(nome,data,ent_m,mes_ano,sai_m,ent_t,sai_t,dia_semana,dia,mes,ano,date,estab_pertence)

values('$nome_operador','$data_domingo2','DSR','$mes_ano_domingo','DSR','DSR','DSR','$dia_semana_domingo','$dia_domingo','$mes_domingo','$ano_domingo','$date_domingo','$estab_pertence')";



mysql_query($comando,$conexao);



}



}





}



}

?>

          </span> <span class="style1">

          <? 





$usuario = $_SESSION['usuario'];



$senha = $_SESSION['senha'];





	

$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo_admgeral = $linha[0];

$nome_admgeral = $linha[1];

$usuario_admgeral = $linha[40];

$senha_admgeral = $linha[41];





}



$sql2 = "SELECT * FROM login_admgeral where nome = '$nome_admgeral'";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {

$registros = mysql_num_rows($res2);



}



echo "Olá $nome_admgeral esse é seu acesso de nº $registros!";

  ?>

          </span>

                <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterarsenhaadmgeral"; ?>">

                <input name="codigo_admgeral" type="hidden" id="codigo_admgeral" value="<? echo "$codigo_admgeral"; ?>">

                <input type="submit" name="button4" id="button4" value="Alterar senha">

        </form>

    </div></td>

  </tr>

  

  <tr>

    <td colspan="8" bgcolor="#ECE9D8"><div align="center">

      <table width="100%" border="0">

        <tr>

<?

$datehoje = date('Y-m-d');

  

$date_antes_do_vencto = "$ano-$mes-16";



$date_do_vencto = "$ano-$mes-21";

$data_do_vencto = "21-$mes-$ano";









if($datehoje <= $date_do_vencto){

	

$cor_utilizar = "style8";



}

else{

	

$cor_utilizar = "style9";

	

}



?>

          <td><div align="center" class="<? echo "$cor_utilizar"; ?>">

            <form action="gss.php" method="post" name="form5" target="_top">

            

              <? 

$solicitacao = $_POST['solicitacao'];

 



if($datehoje == $date_antes_do_vencto){

	

//$sql = "SELECT * FROM mensalidade_sistema where vencto_date = '$date_do_vencto' and status = 'Em Aberto' order by vencto_date desc";

//$res = mysql_query($sql);

//while($linha=mysql_fetch_row($res)) {

//$mensalidade_do_mes_lancada = mysql_num_rows($res);







}



if($mensalidade_do_mes_lancada >= 1){

	

}

else{



	

//$comando = "insert into mensalidade_sistema(operacao,valor,vencto,status,pagto,banco,ag,conta,num_parcela,vencto_date) values('Manutencao de Sistema','1687.00.00','$data_do_vencto','Em Aberto','','BRADESCO','263-1','83012-7','$mes/$ano','$date_do_vencto')";

//mysql_query($comando,$conexao);



}



//}





//$sql = "SELECT * FROM mensalidade_sistema where status = 'Em Aberto' order by vencto_date desc";

//$res = mysql_query($sql);

//$reg = 0;

//while($linha=mysql_fetch_row($res)) {







//$codigo = $linha[0];



//$operacao = $linha[1];



//$valor = $linha[2];



//$vencto = $linha[3];



//$status = $linha[4];



//$pagto = $linha[5];



//$banco = $linha[6];

//$ag = $linha[7];

//$op = $linha[8];

//$conta = $linha[9];

//$num_parcela = $linha[10];

//$obs = $linha[11];

//$vencto_date = $linha[12];







//echo "$operacao Parcela Nº: $num_parcela Valor R$ $valor Vencto: $vencto Status: $status<br> Ivan Campos de Araujo Banco: $banco Ag: $ag C/C: $conta ";

//}



?>

              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "confirmaralteracaodesenha"; ?>">



<?

if($solicitacao=="alterarsenhaadmgeral"){

$codigo_admgeral = $_POST['codigo_admgeral'];



             echo "Usuario: 

			 <input name='codigo_admgeral' type='hidden' id='codigo_admgeral' value='$codigo_admgeral'>

             <input name='usuario' type='text' id='usuario' value='$usuario_admgeral'> 

             Senha: 

             <input name='senha' type='password' id='senha' value='$senha_admgeral'>

			 

			 <input type='submit' name='button5' id='button5' value='Salvar'>";

			 } 

			 

			 

?>

            </form>

            </div></td>

        </tr>

        <tr>

          <td><div align="center" class="style9">

            <strong>
            <marquee>
            </marquee>

            </strong></div></td>

        </tr>

      </table>

    </div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="2" bgcolor="#ECE9D8"><div align="center"><strong>Informações sobre seu domínio</strong></div></td>

    <td>  <div align="center"></div></td>

    <td colspan="2" bgcolor="#ECE9D8"><div align="center"><strong>Informações sobre Database</strong></div></td>

    <td width="1%">&nbsp;</td>

    <td colspan="2" bgcolor="#ECE9D8"><div align="center"><strong>Fatos  em <? echo $data_completa; ?></strong></div></td>

    <td width="17%">&nbsp;</td>

  </tr>

  

  

  <tr>

    <td width="4%" bgcolor="#E3E9F1" class="style5"><span class="style5">Domínio</span></td>

    <td width="19%" bgcolor="#E3E9F1" class="style5"><div align="center" class="style5">www.allcredfinanceira.com.br</div></td>

    <td width="1%" class="style5"><div align="center"></div></td>

    <td width="11%" bgcolor="#E3E9F1" class="style5"><strong>Total Clientes cadastrados</strong></td>

    <td width="13%" bgcolor="#E3E9F1" class="style5"><div align="center">

      <form action="relatorios/exporta_base_de_clientes_nome_cpf_email_telefone.php" method="post" name="form2" target="_blank">

        <strong><span class="style7">

        <? 	

$sql = "SELECT * FROM clientes";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_cli = mysql_num_rows($res);



}



  ?>

        </span></strong>

            <input class="class01" type="submit" name="button2" id="button2" value="<? echo $registros_cli; ?>">

      </form>

      </div></td>

    <td class="style5">&nbsp;</td>

    <td width="11%" bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Clientes cadastrados</strong></div></td>

    <td width="23%" bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	





$sql = "SELECT * FROM clientes where date = '$date'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_cli_cadastrados_hoje = mysql_num_rows($res);



}



echo "$registros_cli_cadastrados_hoje";

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td bgcolor="#E3E9F1" class="style5"><span class="style5">Titular</span></td>

    <td bgcolor="#E3E9F1" class="style5">

      <div align="center" class="style5">

        <pre>ALLCRED SERVIÇOS DE INTERMEDIAÇÃO FINANCEIRA LTDA</pre>

    </div></td>

    <td class="style5"><div align="center"></div></td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Total Propostas registradas</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM propostas";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_propostas = mysql_num_rows($res);



}



echo "$registros_propostas";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Propostas registradas</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM propostas where data_proposta = '$date'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_propostas_registradas_hoje = mysql_num_rows($res);



}



echo "$registros_propostas_registradas_hoje";

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td bgcolor="#E3E9F1" class="style5"><span class="style5">Documento</span></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center" class="style5">

      008.768.992/0001-03

    </div></td>

    <td class="style5"><div align="center"></div></td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Fornecedores cadastrados</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM fornecedores";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_for = mysql_num_rows($res);



}



echo "$registros_for";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Propostas (Simulação) SITE</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center">

      <form action="relatorios/propostas_atraves_do_site.php" method="post" name="form3" target="_blank">

        <strong><span class="style7">

        <? 	

$sql = "SELECT * FROM propostas where tipo_proposta = 'SITE' and tipo_contrato = 'SITE' and data_proposta = '$date'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_propostas_simulacao_hoje = mysql_num_rows($res);



}



//echo "$registros_propostas_simulacao_hoje";

  ?>

        <input name="date" type="hidden" id="date" value="<? echo $date; ?>">

        </span></strong>

        <input type="submit" name="button3" id="button3" value="<? echo $registros_propostas_simulacao_hoje; ?>">

      </form>

    </div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td bgcolor="#E3E9F1" class="style5">Responsável</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center">ALESSANDRO MENDES RODRIGUES</div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Imobilizado registrado</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM imobilizado";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_imob = mysql_num_rows($res);



}



echo "$registros_imob";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5">Verificação de emails</td>

    <td bgcolor="#E3E9F1" class="style5"><form action="relatorios/relatorio_de_verificacao_de_emails.php" method="post" name="form3" target="_blank">

      <input type="submit" name="button5" id="button5" value="Comparação de emails Propostas/Cadastro">

    </form></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td bgcolor="#E3E9F1" class="style5">Criado</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center" class="style5">

      <pre>15/06/2009</pre>

    </div></td>

    <td class="style5"><div align="center"></div></td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Logins Incorretos</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM registros_de_login_errados_operadores";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_error = mysql_num_rows($res);



}



echo "$registros_error";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Propostas alteradas (Status)</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM propostas where data_proposta = '$date'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_propostas_registradas_hoje = mysql_num_rows($res);



}



echo "$registros_propostas_registradas_hoje";

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td bgcolor="#E3E9F1" class="style5">Expiração</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center" class="style5">

      <pre>15/06/2020</pre>

    </div></td>

    <td class="style5"><div align="center"></div></td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Logins Corretos</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM registros_de_login_corretos_operadores";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_ok = mysql_num_rows($res);



}



echo "$registros_ok";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Propostas Digitadas</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM propostas where data_digitacao = '$date'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_propostas_digitadas_hoje = mysql_num_rows($res);



}



echo "$registros_propostas_digitadas_hoje";

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td bgcolor="#E3E9F1" class="style5">Status</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center" class="style5">

      <pre>Publicad</pre>

    </div></td>

    <td class="style5"><div align="center"></div></td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Mensagens aos Funcionários</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM mensagens_ao_funcionario";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_mens = mysql_num_rows($res);



}



echo "$registros_mens";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Solicitação de Possibilidades</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM possibilidades where data_da_possibilidade = '$date'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_possibilidade_hoje = mysql_num_rows($res);



}



echo "$registros_possibilidade_hoje";

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td bgcolor="#E3E9F1" class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center" class="style5"></div></td>

    <td class="style5"><div align="center"></div></td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Funcionários Ativos Total</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM operadores where status = 'Ativo'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_func_ativo = mysql_num_rows($res);



}



echo "$registros_func_ativo";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Possibilidades Respondidas</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM possibilidades where data_da_possibilidade = '$date' and status = 'respondido'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_possibilidade_hoje = mysql_num_rows($res);



}



echo "$registros_possibilidade_hoje";

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="2" bgcolor="#ECE9D8" class="style5"><div align="center"><span class="style2"><span class="style3"></span></span></div></td>

    <td class="style5"><div align="center"></div></td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Funcionários Adm Geral</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM admgeral";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_func_admgeral = mysql_num_rows($res);



}



echo "$registros_func_admgeral";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>Funcionários Ativos/Faltantes</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center">

      <form action="relatorios/relatorio_periodico_de_faltas.php" method="post" name="form1" target="_blank">

        <strong><span class="style7">

          <? 	

$sql = "SELECT * FROM operadores where status = 'Ativo'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$funcionarios_ativos = mysql_num_rows($res);



}



echo "$funcionarios_ativos";

  ?>/

          <? 	





$sql = "SELECT * FROM ponto where date = '$date' and ent_m = 'FALTOU'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_funcionarios_faltantes_hoje = mysql_num_rows($res);



}





  ?>

          </span></strong>

        <? $nb = $registros_funcionarios_faltantes_hoje; ?>

        <input type="submit" name="button" id="button" value="<? echo "$nb"; ?>">

      </form>

    </div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td class="style5">&nbsp;</td>

    <td class="style5">&nbsp;</td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><strong>Funcionários Admin</strong></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	

$sql = "SELECT * FROM adm";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_func_admin = mysql_num_rows($res);



}



echo "$registros_func_admin";

  ?>

    </span></strong></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>DSR <? echo $data_sabado2; ?> Lançados</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	





$sql = "SELECT * FROM ponto where date = '$date_sabado' and ent_m = 'DSR'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_funcionarios_dsr_sabado = mysql_num_rows($res);



}



echo $registros_funcionarios_dsr_sabado;

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td class="style5">&nbsp;</td>

    <td class="style5">&nbsp;</td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"></div></td>

    <td class="style5">&nbsp;</td>

    <td bgcolor="#E3E9F1" class="style5"><div align="left"><strong>DSR <? echo $data_domingo2; ?> Lançados</strong></div></td>

    <td bgcolor="#E3E9F1" class="style5"><div align="center"><strong><span class="style7">

      <? 	





$sql = "SELECT * FROM ponto where date = '$date_domingo' and ent_m = 'DSR'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros_funcionarios_dsr_domingo = mysql_num_rows($res);



}



echo $registros_funcionarios_dsr_domingo;

  ?>

    </span></strong></div></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="9"><div align="center"></div></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td><div align="center"></div></td>

    <td>&nbsp;</td>

  </tr>

</table>



<p> </p>

<p>&nbsp;</p>

<div align="center"></div>

</body>

</html>

