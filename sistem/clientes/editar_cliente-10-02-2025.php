<?php



session_start(); //inicia sessão...



if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...



echo ""; //se for emite mensagem positiva.



if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...



echo ""; //se for emite mensagem positiva.



else //se não for...



header("Location: alerta.php");


require '../../conect/conect.php';


$solicitacao = $_POST['solicitacao'];

if($solicitacao=="excluirarquivo"){

$codigodoarquivointegral = $_POST['codigodoarquivointegral'];


$sql = "SELECT * FROM anexos where codigo = '$codigodoarquivointegral' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

//$codigodoarquivointegral = $linha[0];
	$numerodaproposta = $linha[4];
$anexonome = $linha[7];
$caminhoarquivo = $linha[8];
$tipoanexo_integral_antes = $linha[9];
$statusanexo = $linha[10];


$caminhoarquivoanexonome = "../../$caminhoarquivo$anexonome";

}


	$arquivoaserdeletado = "$caminhoarquivoanexonome";
//$arquivoaserdeletado = $_POST['arquivodeletar'];

unlink("$arquivoaserdeletado");


	
$comando = "delete from `anexos` where `anexos`. `codigo` = '$codigodoarquivointegral' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir anexo");
	
$cpfretorno = $_POST['cpfretorno'];
	
	echo "<script>

alert('Arquivo deletado com sucesso!');



window.location = 'editar_cliente.php?cpf=$cpfretorno';



</script>";
	


}

?>







<html>



<script language="Javascript">



function right(e) {



if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2)){



alert("ATENÇAO!!!... NÃO É PERMITIDO CÓPIAS!");



return false;



}



else if (navigator.appName == 'Microsoft Internet Explorer' &&



(event.button == 2 || event.button == 3)) {



alert("ATENÇAO!!!... NÃO É PERMITIDO CÓPIAS!");



return false;



}



return true;



}



document.onmousedown=right;



if (document.layers) window.captureEvents(Event.MOUSEDOWN);



window.onmousedown=right;



</script>



<head>



<title>CADASTRO DE CLIENTES</title>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

	background-repeat: no-repeat;

	background-attachment: fixed;



}



-->

</style>



</head>

<?









$cpf = $_POST['cpf'];



$cpfget = $_GET['cpf'];



if(empty($cpf)){

$cpfretorno = $cpfget;

}

else{

$cpfretorno = $cpf;

}





?>

<?







$usuario = $_SESSION['usuario'];



$senha = $_SESSION['senha'];











$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' and status = 'Ativo' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$operador_alterando = $linha[1];



$cel_operador_alterando = $linha[19];



$email_operador_alterando = $linha[20];



$estab_pertence_alterando = $linha[44];





}



?>







<?



$sql = "SELECT * FROM clientes where cpf = '$cpfretorno' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];



$nome = $linha[1];
$nomesocial = $linha[140];


$orientacaosexual = $linha[2];



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



//$cel_operador_alterou = $linha[34];



$email_operador_alterou = $linha[35];



$estabelecimento_alterou = $linha[36];



//$cidade_estabelecimento_alterou = $linha[37];



//$tel_estabelecimento_alterou = $linha[38];



//$email_estabelecimento_alterou = $linha[39];



$tipo = $linha[40];



$banco = $linha[41];



$agencia = $linha[42];



$conta = $linha[43];



$num_beneficio = $linha[44];







$parc1 = $linha[45];



$banco1 = $linha[46];



$vencto1 = $linha[47];



$compra1 = $linha[48];







$parc2 = $linha[49];



$banco2 = $linha[50];



$vencto2 = $linha[51];



$compra2 = $linha[52];







$parc3 = $linha[53];



$banco3 = $linha[54];



$vencto3 = $linha[55];



$compra3 = $linha[56];







$parc4 = $linha[57];



$banco4 = $linha[58];



$vencto4 = $linha[59];



$compra4 = $linha[60];







$parc5 = $linha[61];



$banco5 = $linha[62];



$vencto5 = $linha[63];



$compra5 = $linha[64];







$parc6 = $linha[65];



$banco6 = $linha[66];



$vencto6 = $linha[67];



$compra6 = $linha[68];







$parc7 = $linha[69];



$banco7 = $linha[70];



$vencto7 = $linha[71];



$compra7 = $linha[72];







$num_beneficio2 = $linha[73];



$num_beneficio3 = $linha[74];



$num_beneficio4 = $linha[75];







$dataprev2 = $linha[76];



$obs2 = $linha[77];











$dataprev = $linha[76];



$cpf_rg = $linha[78];



$comp_end = $linha[79];



$comp_quit1 = $linha[80];



$comp_quit2 = $linha[81];



$comp_quit3 = $linha[82];



$comp_quit4 = $linha[83];



$comp_quit5 = $linha[84];



$comp_quit6 = $linha[85];



$comp_renda = $linha[86];



$cpf_rg_testemunha = $linha[87];



$mes_niver = $linha[88];



$status_cliente = $linha[89];



$tem_margem = $linha[107];



$saldo1 = $linha[108];

$saldo2 = $linha[109];

$saldo3 = $linha[110];

$saldo4 = $linha[111];

$saldo5 = $linha[112];

$saldo6 = $linha[113];

$saldo7 = $linha[114];

$naturalidade = $linha[115];

$pagto_beneficio = $linha[116];







$resposta = $linha[119];







$secretaria = $linha[124];

$senha_servidor = $linha[125];

$fazer_portabilidade = $linha[126];

$obs_das_margens = $linha[127];





$valor_parcela = $linha[128];

$saldo_devedor = $linha[129];

$parcelas_em_aberto = $linha[130];

$prazo_contrato = $linha[131];

$aprovacao = $linha[132];

$valor_liberado = $linha[133];

$categoria = $linha[134];



$funcao_operador = $linha[135];



$valorrenda = $linha[136];



$idade = $linha[137];



$dia_niver = $linha[138];



$ano_niver = $linha[139];
$holerith = $linha[141];
$rg_foto = $linha[142];
	

}



?>





<?





//-------------------------------------------------------



//$nome = $_POST['nome'];



$nomeget = $_GET['nome'];



if(empty($nome)){

$nomeretorno = $nomeget;

}

else{

$nomeretorno = $nome;

}





//-------------------------------------------------------

	$nomesocialget = $_GET['nomesocial'];



if(empty($nomesocial)){

$nomesocialretorno = $nomesocialget;

}

else{

$nomesocialretorno = $nomesocial;

}





//-------------------------------------------------------







//-------------------------------------------------------



//$telefone = $_POST['telefone'];



$telefoneget = $_GET['telefone'];



if(empty($telefone)){

$telefoneretorno = $telefoneget;

}

else{

$telefoneretorno = $telefone;

}





//-------------------------------------------------------



//$celular = $_POST['celular'];



$celularget = $_GET['celular'];



if(empty($celular)){

$celularretorno = $celularget;

}

else{

$celularretorno = $celular;

}





//-------------------------------------------------------



//$num_beneficio = $_POST['num_beneficio'];



$num_beneficioget = $_GET['num_beneficio'];



if(empty($num_beneficio)){

$num_beneficioretorno = $num_beneficioget;

}

else{

$num_beneficioretorno = $num_beneficio;

}





//-------------------------------------------------------



//$secretaria = $_POST['secretaria'];



$secretariaget = $_GET['secretaria'];



if(empty($secretaria)){

$secretariaretorno = $secretariaget;

}

else{

$secretariaretorno = $secretaria;

}





//-------------------------------------------------------



//$categoria = $_POST['categoria'];



$categoriaget = $_GET['categoria'];



if(empty($categoria)){

$categoriaretorno = $categoriaget;

}

else{

$categoriaretorno = $categoria;

}





//-------------------------------------------------------



//$rg = $_POST['rg'];



$rgget = $_GET['rg'];



if(empty($rg)){

$rgretorno = $rgget;

}

else{

$rgretorno = $rg;

}





//-------------------------------------------------------



//$mae = $_POST['mae'];



$maeget = $_GET['mae'];



if(empty($mae)){

$maeretorno = $maeget;

}

else{

$maeretorno = $mae;

}





//-------------------------------------------------------



//$valorrenda = $_POST['valorrenda'];



$valorrendaget = $_GET['valorrenda'];



if(empty($valorrenda)){

$valorrendaretorno = $valorrendaget;

}

else{

$valorrendaretorno = $valorrenda;

}





//-------------------------------------------------------



//$senha_servidor = $_POST['senha_servidor'];



$senha_servidorget = $_GET['senha_servidor'];



if(empty($senha_servidor)){

$senha_servidorretorno = $senha_servidorget;

}

else{

$senha_servidorretorno = $senha_servidor;

}





//-------------------------------------------------------



//$idade = $_POST['idade'];



$idadeget = $_GET['idade'];



if(empty($idade)){

$idaderetorno = $idadeget;

}

else{

$idaderetorno = $idade;

}





//-------------------------------------------------------



//$email = $_POST['email'];



$emailget = $_GET['email'];



if(empty($email)){

$emailretorno = $emailget;

}

else{

$emailretorno = $email;

}





//-------------------------------------------------------





?>			



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];



}

?>



<body background="../../background/<? echo "$background"; ?>">



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







<form name="form2" method="post" action="">



</form>



<form name="form1" method="post" action="menu.php">



  <?



$usuario = $_SESSION['usuario'];



$senha = $_SESSION['senha'];



?>

  <input type="hidden" name="codigolancamento" id="codigolancamento">

  <input type="hidden" name="solicitacao" id="solicitacao">
  <input class='class01' type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit5" title="VOLTAR">
</form>





<?



if($status_cliente =="Inativo"){
	
echo "<script>

alert('ATENÇÃO!!!... CLIENTE BLOQUEADO NO SISTEMA, IMPOSSÍVEL EDITAR O CLIENTE!');



window.location = 'editar_cliente.php;



</script>";
	


}

?>



<?







if($mes_niver == ""){



echo "<script>



alert('ATENÇÃO!!!... INFORME O MÊS DO ANIVERSÁRIO QUE SE ENCONTRA AO LADO DA DATA DE NASCIMENTO!.');



</script>";



}



?>

<?



//Define o caminho da pasta/arquivo



//$pasta = "../../$cpf";



//$jaexiste = "Pasta do cliente existente!";



?>



<div align="center">



  <strong><font color="#0000FF" size="4">Tela de edi&ccedil;&atilde;o do cadastro de clientes!</font></strong>



<form name="form3" method="post" action="cria_diretorio.php">



    <div align="center"> <strong>



      <input name="codigo" type="hidden" id="codigo4" value="<? echo $codigo; ?>">



      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">



      </strong>



        <?



//Checa se o arquivo/pasta existe



//if(file_exists($pasta)) { echo $jaexiste; echo'<input type="hidden" name="criar_pasta" value="Não">';}



//else {



//        echo'<input type="submit" name="Submit2" value="Criar Pasta">';



//		        echo'<input type="hidden" name="criar_pasta" value="Sim">';







//}



?>

    </div>



  </form>



  </div>

<form action="grava_editar_cliente.php" method="post" enctype="multipart/form-data" name="form1">







<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">



    <tr>

      <td background="../../imagens/fundocelulas1.png">N&ordm; de Matr&iacute;cula      </td>

      <td align="center" background="../../imagens/fundocelulas1.png">Status</td>

      <td background="../../imagens/fundocelulas1.png">Perfil</td>

      <td background="../../imagens/fundocelulas1.png">Data Nasc

      <input name="data_nasc" type="hidden" id="data_nasc" value="<? echo $data_nasc; ?>"></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $codigo; ?></font>

            <input name="codigo" type="hidden" id="codigo3" value="<? echo $codigo; ?>">

      </strong></td>

      <td align="center" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"><? echo $status_cliente; ?></font></strong></td>



      <td background="../../imagens/fundocelulas1.png"><strong>

        <select class='class02' name="tipo" id="tipo">

          <option selected><? echo $tipo; ?></option>

          <?











    $sql = "select * from tipos order by tipo asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['tipo']."</option>";



    }



?>

        </select>

      </strong></td>



      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="dia_niver" id="dia_niver">

        <option selected><? echo $dia_niver; ?></option>

        <option>01</option>

        <option>02</option>

        <option>03</option>

        <option>04</option>

        <option>05</option>

        <option>06</option>

        <option>07</option>

        <option>08</option>

        <option>09</option>

        <option>10</option>

        <option>11</option>

        <option>12</option>

        <option>13</option>

        <option>14</option>

        <option>15</option>

        <option>16</option>

        <option>17</option>

        <option>18</option>

        <option>19</option>

        <option>20</option>

        <option>21</option>

        <option>22</option>

        <option>23</option>

        <option>24</option>

        <option>25</option>

        <option>26</option>

        <option>27</option>

        <option>28</option>

        <option>29</option>

        <option>30</option>

        <option>31</option>

      </select>

        <select class='class02' name="mes_niver" id="mes_niver">

          <option selected><? echo $mes_niver; ?></option>

          <option>01</option>

          <option>02</option>

          <option>03</option>

          <option>04</option>

          <option>05</option>

          <option>06</option>

          <option>07</option>

          <option>08</option>

          <option>09</option>

          <option>10</option>

          <option>11</option>

          <option>12</option>

        </select>

        <select class='class02' name="ano_niver" id="ano_niver">

          <option selected><? echo $ano_niver; ?></option>

          <?



    $sql = "select * from ano_niver order by ano_niver asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['ano_niver']."</option>";



    }



?>

        </select></td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas1.png">Como Conheceu a Empresa?</td>

      <td align="center" background="../../imagens/fundocelulas1.png">Nome*</td>

      <td background="../../imagens/fundocelulas1.png">Estado Civil </td>

      <td background="../../imagens/fundocelulas1.png">Idade</td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="resposta" id="resposta">

          <option selected><? echo $resposta; ?></option>

          <?











    $sql = "select * from como_conheceu_empresa order by resposta asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['resposta']."</option>";



    }



?>

      </select></td>

      <td align="center" background="../../imagens/fundocelulas1.png"><input class='class02' name="nome" type="text" id="nome2" value="<? echo $nomeretorno; ?>">
      <br>Nome Social
      <input class='class02' name="nomesocial" type="text" id="nomesocial" value="<? echo $nomesocialretorno; ?>"></td>

      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="estadocivil" id="select3">

        <option selected><? echo $estadocivil; ?></option>

        <?











    $sql = "select * from estado_civil order by estadocivil asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";



    }



?>

      </select></td>

      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="idade" type="text" id="idade" value="<? echo $idaderetorno; ?>" size="15" maxlength="10"></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png">Categoria*</td>

      <td align="center" background="../../imagens/fundocelulas1.png">Secretaria*</td>

      <td background="../../imagens/fundocelulas1.png">Naturalidade</td>

      <td background="../../imagens/fundocelulas1.png">Orientacao Sexual</td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png"><strong>

        <select class='class02' name="categoria" id="categoria">

          <option selected><? echo $categoriaretorno; ?></option>

          <?

    $sql = "select * from categorias_clientes order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>

        </select>

      </strong></td>

      <td align="center" background="../../imagens/fundocelulas1.png"><strong>

        <select class='class02' name="secretaria" id="secretaria">

          <option selected><? echo $secretariaretorno; ?></option>

          <?











    $sql = "select * from secretarias order by secretaria asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['secretaria']."</option>";



    }



?>

        </select>

      </strong></td>

      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="naturalidade" type="text" id="naturalidade" value="<? echo $naturalidade; ?>"></td>

      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="orientacaosexual" id="orientacaosexual">
        <option selected><? echo "$orientacaosexual"; ?></option>
        <?

    $sql = "select * from orientacaosexual order by codigo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['sexo']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas2.png">CPF*</td>

      <td align="center" background="../../imagens/fundocelulas2.png">RG*</td>

      <td background="../../imagens/fundocelulas2.png">&Oacute;rg&atilde;o Emissor RG</td>

      <td background="../../imagens/fundocelulas2.png">Data Emiss&atilde;o RG</td>

    </tr>



    <tr>

      <td width="23%" background="../../imagens/fundocelulas2.png"><input class='class02' name="cpf" type="text" id="cpf" value="<? echo $cpfretorno; ?>" size="18" maxlength="14"></td>

      <td width="27%" align="center" background="../../imagens/fundocelulas2.png"><input class='class02' name="rg" type="text" id="rg" value="<? echo $rgretorno; ?>" size="25" maxlength="25"></td>



      <td width="27%" background="../../imagens/fundocelulas2.png"><input class='class02' name="orgao" type="text" id="cpf3" value="<? echo $orgao; ?>" size="15" maxlength="14"></td>



      <td width="23%" background="../../imagens/fundocelulas2.png"><input class='class02' name="emissao" type="text" id="cpf4" value="<? echo $emissao; ?>" size="15" maxlength="10"></td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas2.png">N&ordm; do Benef&iacute;cio 1*</td>

      <td align="center" background="../../imagens/fundocelulas2.png">N&ordm; Benef&iacute;cio2</td>

      <td background="../../imagens/fundocelulas2.png">N&ordm; Benef&iacute;cio 3 </td>

      <td background="../../imagens/fundocelulas2.png">N&ordm; Benef&iacute;cio 4 </td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="num_beneficio" type="text" id="num_beneficio5" value="<? echo $num_beneficio; ?>"></td>

      <td align="center" background="../../imagens/fundocelulas2.png"><input class='class02' name="num_beneficio2" type="text" id="num_beneficio22" value="<? echo $num_beneficio2; ?>"></td>

      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="num_beneficio3" type="text" id="num_beneficio32" value="<? echo $num_beneficio3; ?>"></td>

      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="num_beneficio4" type="text" id="num_beneficio4" value="<? echo $num_beneficio4; ?>"></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas2.png">Senha do Servidor*</td>

      <td align="center" background="../../imagens/fundocelulas2.png">Senha DATAPREV </td>



      <td background="../../imagens/fundocelulas2.png">Pai</td>



      <td background="../../imagens/fundocelulas2.png">M&atilde;e*</td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas2.png"><font color="#0000FF">

        <input class='class02' name="senha_servidor" type="text" id="senha_servidor" value="<? echo $senha_servidorretorno; ?>">

      </font></td>

      <td align="center" background="../../imagens/fundocelulas2.png"><input class='class02' name="dataprev" type="text" id="num_beneficio23" value="<? echo $dataprev; ?>"></td>



      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="pai" type="text" id="pai" value="<? echo $pai; ?>"></td>



      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="mae" type="text" id="endereco3" value="<? echo $maeretorno; ?>"></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas2.png">Valor Renda*</td>

      <td align="center" background="../../imagens/fundocelulas2.png">Tipo de pagto do Benef&iacute;cio </td>
      <td align="center" background="../../imagens/fundocelulas2.png"><strong>Holerith</strong></td>
      <td align="center" background="../../imagens/fundocelulas2.png"><strong>RG</strong></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="valorrenda" type="text" id="valorrenda" value="<? echo $valorrendaretorno; ?>"></td>

      <td align="center" background="../../imagens/fundocelulas2.png"><select class='class02' name="pagto_beneficio" id="cidade">
        
        <option selected><? echo $pagto_beneficio; ?></option>
        
        <?











    $sql = "select * from pagto_beneficio order by modo_recebimento asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['modo_recebimento']."</option>";



    }



?>
        
      </select></td>
      <td align="center" background="../../imagens/fundocelulas1.png"><input class="class02" type="file" name="holerith" id="holerith"></td>
      <td align="center" background="../../imagens/fundocelulas1.png"><input class="class02" type="file" name="rg_foto" id="rg_foto"></td>

    </tr>
    <tr>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td align="center" background="../../imagens/fundocelulas2.png">&nbsp;</td>
      <td align="center" background="../../imagens/fundocelulas2.png"><a href='documentos/<? echo "$cpf/$holerith"; ?>' target='_blank'>
        <input name="holerith_antigo" type="hidden" id="holerith_antigo" value="<? echo "$holerith"; ?>">
      Visualizar Holerith</a></td>
      <td align="center" background="../../imagens/fundocelulas2.png"><a href='documentos/<? echo "$cpf/$holerith"; ?>' target='_blank'>
        <input name="rg_foto_antigo" type="hidden" id="rg_foto_antigo" value="<? echo "$rg_foto"; ?>">
      </a><a href='documentos/<? echo "$cpf/$rg_foto"; ?>' target='_blank'>Visualizar RG</a></td>
    </tr>



    <tr>

      <td background="../../imagens/fundocelulas1.png">Endere&ccedil;o</td>

      <td align="center" background="../../imagens/fundocelulas1.png">N&uacute;mero</td>

      <td background="../../imagens/fundocelulas1.png">Bairro</td>

      <td background="../../imagens/fundocelulas1.png">Complemento</td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="endereco" type="text" id="endereco" value="<? echo $endereco; ?>"></td>

      <td align="center" background="../../imagens/fundocelulas1.png"><input class='class02' name="numero" type="text" id="numero2" value="<? echo $numero; ?>" size="10" maxlength="10"></td>

      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="bairro" type="text" id="bairro" value="<? echo $bairro; ?>"></td>

      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="complemento" type="text" id="endereco4" value="<? echo $complemento; ?>"></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png">Cidade</td>

      <td align="center" background="../../imagens/fundocelulas1.png">Cep</td>



      <td background="../../imagens/fundocelulas1.png">E-Mail*</td>



      <td background="../../imagens/fundocelulas1.png">Telefone*</td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="cidade" id="estado">

        <option selected><? echo $cidade; ?></option>

        <?











    $sql = "select * from cidades order by cidade asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['cidade']."</option>";



    }



?>

      </select></td>

      <td align="center" background="../../imagens/fundocelulas1.png"><input class='class02' name="cep" type="text" id="cep" value="<? echo $cep; ?>" size="9" maxlength="9">

00000-000</td>



      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="email" type="text" id="email" value="<? echo $emailretorno; ?>"></td>



      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="telefone" type="text" id="endereco5" value="<? echo $telefoneretorno; ?>" size="15" maxlength="14"></td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png">Estado</td>

      <td align="center" background="../../imagens/fundocelulas1.png">&nbsp;</td>

      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

      <td background="../../imagens/fundocelulas1.png">Celular*</td>

    </tr>

    <tr>

      <td background="../../imagens/fundocelulas1.png"><select class='class02' name="estado" id="select7">

        <option selected><? echo $estado; ?></option>

        <?











    $sql = "select * from estados_do_brasil order by estado asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";



    }



?>

      </select></td>

      <td align="center" background="../../imagens/fundocelulas1.png">&nbsp;</td>

      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

      <td background="../../imagens/fundocelulas1.png"><input class='class02' name="celular" type="text" id="telefone" value="<? echo $celularretorno; ?>" size="15" maxlength="14"></td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas2.png"><p>Banco do cliente</p></td>

      <td align="center" background="../../imagens/fundocelulas2.png">Ag&ecirc;ncia</td>



      <td background="../../imagens/fundocelulas2.png">Conta</td>



      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas2.png"><select class='class02' name="banco" id="banco">

          <option selected><? echo $banco; ?></option>

          <?











    $sql = "select * from bancos order by banco asc";



    $result = mysql_query($sql);



    while($x=mysql_fetch_array($result)){



  echo "<option>".$x['banco']."</option>";



    }



?>

      </select></td>

      <td align="center" background="../../imagens/fundocelulas2.png"><input class='class02' name="agencia" type="text" id="agencia" value="<? echo $agencia; ?>"></td>



      <td background="../../imagens/fundocelulas2.png"><input class='class02' name="conta" type="text" id="conta" value="<? echo $conta; ?>"></td>



      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>

      <td align="center" background="../../imagens/fundocelulas2.png">&nbsp;</td>



      <td background="../../imagens/fundocelulas2.png">Observa&ccedil;&otilde;es</td>



      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>

    </tr>



    <tr>

      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>

      <td align="center" background="../../imagens/fundocelulas2.png"><textarea class='class02' name="obs2" cols="45" rows="7"  id="obs2"><? echo $obs2; ?></textarea></td>

      <td background="../../imagens/fundocelulas2.png"><textarea class='class02' name="obs_cli" cols="45" rows="7" readonly id="obs_cli"><?  



$sql = "SELECT * FROM observacoes_de_clientes where cpf = '$cpf' order by codigo desc";



$res = mysql_query($sql);



$reg = 0;



//echo "<tr>";



while($linha=mysql_fetch_row($res)) {







//$codigo = $linha[0];



$cod_cli = $linha[1];



$cpf = $linha[2];



$data = $linha[3];



$hora = $linha[4];



$observacoes_do_cliente = $linha[5];



$operador = $linha[6];











echo "$data - $hora - "."$observacoes_do_cliente - "."$operador";



?>







<?







if($reg==1){



//echo "</tr>";



$reg=0;



}











}



	  



	  



	  



	  



	   ?>

      </textarea></td>



      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>

    </tr>



    <tr>

      <td colspan="4"><div align="left">________________________________________________________________________________________________________________________________________</div></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong>RESPOSTA PUBLICO / VER MARGEM</strong></div></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center">

        <?

//----------------------INICIO DA GRAVA&Ccedil;&Atilde;O E ENVIO PARA O OPERADOR--------------------



if($solicitacao=="responder"){



$codigolancamento = $_POST['codigolancamento'];

$cod_cli_gravar = $_POST['cod_cli'];

$date_gravar = date('Y-m-d');

$hora_gravar = date('H:i:s');

$status = $_POST['status'];

$operador_gravar = $_POST['operador'];



$margem_disponivel = $_POST['margem_disponivel'];

$obs = $_POST['obs'];



$valor_parcela = $_POST['valor_parcela'];

$saldo_devedor = $_POST['saldo_devedor'];

$parcelas_em_aberto = $_POST['parcelas_em_aberto'];

$prazo_contrato = $_POST['prazo_contrato'];

$aprovacao = $_POST['aprovacao'];

$valor_liberado = $_POST['valor_liberado'];





$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`margem_portabilidade` set `data_resposta` = '$date_gravar',`hora_resposta` = '$hora_gravar',`status` = '$status',`margem_disponivel` = '$margem_disponivel',`obs` = '$obs' where `margem_portabilidade`. `codigo` = '$codigolancamento' limit 1 ";

}



mysql_query($comando,$conexao);









$sql = "SELECT * FROM parcelas_pedido_margem where pedido = '$codigolancamento' order by codigo asc";



$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {







$codigo_parcelas_pedido_margem = $linha[0];





$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`parcelas_pedido_margem` set `pedido` = '$codigolancamento',`status` = '$status' where `parcelas_pedido_margem`. `codigo` = '$codigo_parcelas_pedido_margem'";

}



mysql_query($comando,$conexao);



}









}





//---------------------FIM DA GRAVA&Ccedil;&Atilde;O E ENVIO PARA O OPERADOR------------------------

?>

        <?



$sql = "SELECT * FROM margem_portabilidade where cod_cli = '$codigo' and (status = 'Analisado' or status = 'Pendente') order by codigo desc limit 1";



$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {







$codigolancamento = $linha[0];



$cod_cli = $linha[18];



$nome = $linha[1];



$cpf = $linha[2];



$operador_solicitante = $linha[5];



$num_beneficio = $linha[8];



$num_beneficio2 = $linha[9];



$num_beneficio3 = $linha[10];



$num_beneficio4 = $linha[11];



$horacadastro = $linha[15];



$datacadastro = $linha[17];



$secretaria = $linha[21];



$status = $linha[19];



$tipo = $linha[20];



$rg = $linha[22];



$mae = $linha[23];



$data_nasc = $linha[24];



$senha_servidor = $linha[25];



$fazer_portabilidade = $linha[26];



$data_resposta = $linha[27];



$hora_resposta = $linha[28];



$obs = $linha[29];



$margem_disponivel = $linha[30];



$margem_disponivel2 = $linha[31];



$bco_operacao1 = $linha[32];



$bco_operacao2 = $linha[33];



$margem_rmc = $linha[35];





?>

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td colspan="6"><div align="center" class="style9">

              <strong>

            <? $sql2 = "SELECT * FROM margem_portabilidade where cod_cli = '$codigo' and (status = 'A Verificar' or status = 'Pendente') order by codigo desc limit 1";



$res2 = mysql_query($sql2);



while($linha=mysql_fetch_row($res2)) {

$registros_portabilidade = mysql_num_rows($res2);







$num_pedido_ver_margem = $linha[0];



}



if($registros_portabilidade>=1){

	

echo "O pedido nº $num_pedido_ver_margem está em análise!";



}



?>

              </strong></div></td>

            </tr>

          <tr>

            <td colspan="2" background="../../imagens/fundocelulas1.png">Resposta do pedido N&ordm; <? echo $codigolancamento; ?></td>

            <td width="6%" background="../../imagens/fundocelulas1.png">Status</td>

            <td width="11%" background="../../imagens/fundocelulas1.png"><table width="100%" border="1">

              <tr>

                <td><? echo $status; ?></td>

              </tr>

            </table></td>

            <td width="16%" background="../../imagens/fundocelulas1.png"><div align="center">Data / Hora da resposta: </div></td>

            <td width="21%" background="../../imagens/fundocelulas1.png"><table width="100%" border="1">

              <tr>

                <td><? echo "$data_resposta / $hora_resposta"; ?></td>

              </tr>

            </table></td>

            </tr>

          <tr>

            <td width="15%" background="../../imagens/fundocelulas1.png">Margem Disponivel 1</td>

            <td colspan="2" background="../../imagens/fundocelulas1.png"><table width="100%" border="1">

              <tr>

                <td><? echo $margem_disponivel; ?></td>

              </tr>

            </table></td>

            <td background="../../imagens/fundocelulas1.png"><div align="right">Bco Opera&ccedil;&atilde;o</div></td>

            <td background="../../imagens/fundocelulas1.png"><? echo $bco_operacao1; ?></td>

            <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

            </tr>

          <tr>

            <td background="../../imagens/fundocelulas1.png">Margem Disponivel 2</td>

            <td colspan="2" background="../../imagens/fundocelulas1.png"><table width="100%" border="1">

              <tr>

                <td><? echo $margem_disponivel2; ?></td>

              </tr>

            </table></td>

            <td background="../../imagens/fundocelulas1.png"><div align="right">Bco Opera&ccedil;&atilde;o</div></td>

            <td background="../../imagens/fundocelulas1.png"><? echo $bco_operacao2; ?></td>

            <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

            </tr>

          <tr>

            <td background="../../imagens/fundocelulas1.png">Margem p/ RMC</td>

            <td colspan="2" background="../../imagens/fundocelulas1.png"><table width="100%" border="1">

              <tr>

                <td><? echo $margem_rmc; ?></td>

              </tr>

            </table></td>

            <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

            <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

            <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

            </tr>

          <tr>

            <td background="../../imagens/fundocelulas1.png">Observa&ccedil;&otilde;es<strong>

              <input name="obs" type="hidden" id="obs" value="<? echo $obs; ?>">

            </strong></td>

            <td colspan="4" background="../../imagens/fundocelulas1.png"><table width="100%" border="1">

              <tr>

                <td>

<?

				 

//$sql = "SELECT * FROM margem_portabilidade where cod_cli = '$codigo' order by data_resposta desc limit 1";

//$res = mysql_query($sql);

//while($linha=mysql_fetch_row($res)) {





//$ultima_obs = $linha[29];





//}



echo $obs; 



?></td>

                </tr>

            </table></td>

            <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

            </tr>

        </table>

        <? } ?>

      </div></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center">

        <table width="100%" border="0" align="center">

          <tr>

            <td colspan="5"><div align="center"></div></td>

          </tr>

          <?



echo "<form name='form1' method='post' action='margem_a_verificar.php'>



<tr>

<td colspan='6'><div align='center'>PORTABILIDADES A SEREM FEITAS</div></td>

</tr>



  <tr>

    <td><div align='center'>

      <input name='solicitacao' type='hidden' id='solicitacao' value='gravar_parcela'>

      <input name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>

      <input name='cod_cli' type='hidden' id='cod_cli' value='$cod_cli'>

      <input name='status' type='hidden' id='status' value='A VERIFICAR'>

      Valor Parcela</div></td>

    <td><div align='center'>Banco a ser Portado</div></td>

    <td><div align='center'>Valor Liberado</div></td>

    <td><div align='center'>Parcelas em Aberto</div></td>

    <td><div align='center'>Prazo do contrato</div></td>

    <td><div align='center'>Faixa RCO</div></td>

	<td><div align='center'>Bco Operação</div></td>

  </tr>";

  



$sql = "SELECT * FROM parcelas_pedido_margem where pedido = '$codigolancamento' and (status = 'Analisado' or status = 'Pendente') order by codigo asc";



$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {







$pedido = $linha[0];

$valor_parcela = $linha[8];

$banco_a_ser_portado = $linha[9];

$valor_liberado = $linha[10];

$parcelas_em_aberto = $linha[11];

$prazo_do_contrato = $linha[12];

$faixa_rco = $linha[14];

$bco_operacao_parcela = $linha[15];





echo "<tr>

          <td><table width='100%' border='1'><tr><td><div align='center'>$valor_parcela</div></td></tr></table></td>

          <td><table width='100%' border='1'><tr><td><div align='center'>$banco_a_ser_portado</div></td></tr></table></td>

          <td><table width='100%' border='1'><tr><td><div align='center'>$valor_liberado</div></td></tr></table></td>

          <td><table width='100%' border='1'><tr><td><div align='center'>$parcelas_em_aberto</div></td></tr></table></td>

          <td><table width='100%' border='1'><tr><td><div align='center'>$prazo_do_contrato</div></td></tr></table></td>

          <td><table width='100%' border='1'><tr><td><div align='center'>$faixa_rco</div></td></tr></table></td>

		  <td><table width='100%' border='1'><tr><td><div align='center'>$bco_operacao_parcela</div></td></tr></table></td>

        </tr>";

		

}

	



?>

        </table>

      </div></td>

    </tr>

    <tr>

      <td colspan="4"><div align="left">____________________________________________________________________________________________________________________________________________________________</div></td>

    </tr>

    <tr>

      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"><strong>HISTORICO RESPOSTA PUBLICO / MARGEM</strong></div></td>

    </tr>

    <tr>

      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center">

        <textarea class='class02' name="obs4" cols="100" rows="4" <?  echo "readonly='readonly'"; ?> id="obs4"><?  



$sql = "SELECT * FROM margem_portabilidade where cod_cli = '$codigo' order by data_resposta desc";



$res = mysql_query($sql);



$reg = 0;



while($linha=mysql_fetch_row($res)) {







$operador_respodeu = $linha[5];



$data_resposta = $linha[27];



$hora_resposta = $linha[28];



$obs = $linha[29];











echo "$data_resposta - $hora_resposta -"."$obs - $operador_respodeu";



?>







<?







if($reg==1){



//echo "</tr>";



$reg=0;



}











}



	  

?>

	  



	  



	  



</textarea>

      </div></td>

    </tr>

    <tr>

      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"><strong>RESPOSTA INSS / VER POSSIBILIADES</strong></div></td>

    </tr>

    <tr>

      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center">

        <textarea class='class02' name="hiscon" cols="100" rows="10" readonly id="hiscon"><?  



$sql = "SELECT * FROM hiscon where cpf = '$cpf' order by codigo desc";



$res = mysql_query($sql);



$reg = 0;



//echo "<tr>";



while($linha=mysql_fetch_row($res)) {







//$codigo = $linha[0];



$cod_cli = $linha[1];



$cpf = $linha[2];



$data = $linha[3];



$hora = $linha[4];



$observacoes_do_cliente = $linha[5];



$operador = $linha[6];











echo "$data - $hora - "."$observacoes_do_cliente - "."$operador";



?>







<?







if($reg==1){



//echo "</tr>";



$reg=0;



}











}



	  



	  



	  



	  



	   ?>

        </textarea>

      </div></td>

    </tr>
    <tr>
      <td colspan="4" align="center" background="../../imagens/fundocelulas2.png">Inserir Arquivo</td>
    </tr>
    <tr>
      <td colspan="4" align="center" background="../../imagens/fundocelulas2.png">Num Proposta
        <label for="num_proposta">:</label>
        <input class='class02' type="text" name="num_proposta" id="num_proposta">
        <label for="anexointegralproposta">:</label>
      <input class='class02' type="file" name="anexointegralproposta" id="anexointegralproposta">
      Link externo 
      <label for="linkexterno">:</label>
      <input class='class02' type="text" name="linkexterno" id="linkexterno">
      (Opcional)</td>
    </tr>

    <tr>

      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center">

        <?



$usuario = $_SESSION['usuario'];



$senha = $_SESSION['senha'];



?>
        <input class='class01' type=image src="../../imagens/botoes/salvar.png" width="100" height="100" name="Submit" title="SALVAR">
      </div></td>

    </tr>
    <tr>
      <td colspan="4" background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>

    



    <tr> 



      <td colspan="4"><input name="parc1" type="hidden" id="parc1" value="<? echo $parc1; ?>">

        <input name="parc2" type="hidden" id="parc2" value="<? echo $parc2; ?>">

        <input name="parc3" type="hidden" id="parc3" value="<? echo $parc3; ?>">

        <input name="parc4" type="hidden" id="parc4" value="<? echo $parc4; ?>">

        <input name="parc5" type="hidden" id="parc5" value="<? echo $parc5; ?>">

        <input name="parc6" type="hidden" id="parc6" value="<? echo $parc6; ?>">

        <input name="parc7" type="hidden" id="parc7" value="<? echo $parc7; ?>">

        <input name="banco1" type="hidden" id="banco1" value="<? echo $banco1; ?>">

        <input name="banco2" type="hidden" id="banco2" value="<? echo $banco2; ?>">

        <input name="banco3" type="hidden" id="banco3" value="<? echo $banco3; ?>">

        <input name="banco4" type="hidden" id="banco4" value="<? echo $banco4; ?>">

        <input name="banco5" type="hidden" id="banco5" value="<? echo $banco5; ?>">

        <input name="banco6" type="hidden" id="banco6" value="<? echo $banco6; ?>">

        <input name="banco7" type="hidden" id="banco7" value="<? echo $banco7; ?>">

        <input name="vencto1" type="hidden" id="vencto1" value="<? echo $vencto1; ?>">

        <input name="vencto2" type="hidden" id="vencto2" value="<? echo $vencto2; ?>">

        <input name="vencto3" type="hidden" id="vencto3" value="<? echo $vencto3; ?>">

        <input name="vencto4" type="hidden" id="vencto4" value="<? echo $vencto4; ?>">

        <input name="vencto5" type="hidden" id="vencto5" value="<? echo $vencto5; ?>">

        <input name="vencto6" type="hidden" id="vencto6" value="<? echo $vencto6; ?>">

        <input name="vencto7" type="hidden" id="vencto7" value="<? echo $vencto7; ?>">

        <input name="compra1" type="hidden" id="compra1" value="<? echo $compra1; ?>">

        <input name="compra2" type="hidden" id="compra3" value="<? echo $compra2; ?>">

        <input name="compra3" type="hidden" id="compra4" value="<? echo $compra3; ?>">

        <input name="compra4" type="hidden" id="compra5" value="<? echo $compra4; ?>">

        <input name="compra5" type="hidden" id="compra6" value="<? echo $compra5; ?>">

        <input name="compra6" type="hidden" id="compra7" value="<? echo $compra6; ?>">

        <input name="compra7" type="hidden" id="compra8" value="<? echo $compra7; ?>">

        <input name="saldo1" type="hidden" id="compra2" value="<? echo $saldo1; ?>">

        <input name="saldo2" type="hidden" id="compra9" value="<? echo $saldo2; ?>">

        <input name="saldo3" type="hidden" id="compra10" value="<? echo $saldo3; ?>">

        <input name="saldo4" type="hidden" id="compra11" value="<? echo $saldo4; ?>">

        <input name="saldo5" type="hidden" id="compra12" value="<? echo $saldo5; ?>">

        <input name="saldo6" type="hidden" id="compra13" value="<? echo $saldo6; ?>">

      <input name="saldo7" type="hidden" id="compra14" value="<? echo $saldo7; ?>"></td>

    </tr>

  </table>



</form>
<table width="100%" border="0">
  
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center">Data da Inser&ccedil;&atilde;o</td>
    <td align="center" valign="middle">Nome do Arquivo</td>
    <td align="center" valign="middle">Numero da Proposta</td>
    <td align="center" valign="middle">#</td>
    <td align="center" valign="middle">Link Externo(Opcional)</td>
  </tr>
	<?
		
$sql = "SELECT * FROM anexos where numeroprotocolo = '$codigo' order by codigo desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registrosdeprotocolo = mysql_num_rows($res);

$codigodoarquivointegral = $linha[0];
$datadainsercao = $linha[1];
$numerodaproposta = $linha[4];
$anexonome = $linha[7];
$caminhoarquivo = $linha[8];
$tipoanexo_integral_antes = $linha[9];
$statusanexo = $linha[10];
$linkexterno = $linha[12];

$caminhoarquivoanexonome = "../../$caminhoarquivo$anexonome";
	
$estadodocampo_excluirarquivos = "<input class='class01' type='submit' name='button8' id='button10' value='x'>";

?>
  <tr>
    <td width="20%" valign="middle">
		<form name="form4" method="post" action="editar_cliente.php">
		<div align="center">
      <input name="codigodoarquivointegral" type="hidden" id="codigodoarquivointegral" value="<? echo "$codigodoarquivointegral"; ?>">
      <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "excluirarquivo"; ?>">
      <input name="arquivodeletar" type="hidden" id="arquivodeletar" value="<? echo "$caminhoarquivoanexonome"; ?>">
      <input name="cpfretorno" type="hidden" id="cpfretorno" value="<? echo "$cpf"; ?>">
			
      <strong><font color="#0000FF">
       
        </font></strong>
      <input name="protocologerado" type="hidden" id="protocologerado" value="<? echo "$protocolomateria"; ?>">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <? echo "$estadodocampo_excluirarquivos"; ?>
			
		  </div>
		</form>
	</td>
    <td width="12%" align="center"><? echo "$datadainsercao"; ?></td>
    <td width="18%" valign="middle"><div align="center"><? echo "$anexonome"; ?></div></td>
    <td width="19%" valign="middle"><div align="center"><? echo "<a href='../propostas/imprimir_proposta.php?num_proposta=$numerodaproposta' target='_blank'>$numerodaproposta</a> "; ?></div></td>
    <td width="19%" valign="middle"><div align="center"><? echo "<a href='$caminhoarquivoanexonome' target='_blank'>Visualizar/Download</a>"; ?></div></td>
    <td width="12%" align="center" valign="middle"><? if(empty($linkexterno)){}else{ echo "<a href='$linkexterno' target='_blank'>Link Externo</a>"; } ?></td>
  </tr>
  <?  }  ?>
</table>
<form name="form1" method="post" action="">



  <table width="100%" border="0" cellpadding="0" cellspacing="0">



    <tr>



      <td colspan="2" background="../../imagens/fundocelulas1.png"><strong>Cadastro efetuado por <br>



        </strong><strong><font color="#0000FF"><? echo $operador; ?>



        



      </font></strong><strong><font color="#0000FF"> </font></strong></td>



<td width="35%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>



              <? echo $email_operador; ?>



      </font><font color="#0000FF"> </font></strong></td>



<td width="20%" background="../../imagens/fundocelulas1.png"><strong>Celular:<font color="#0000FF"><br>



              <? echo $cel_operador; ?>



      </font><font color="#0000FF"> </font></strong></td>

    </tr>



    <tr>



      <td width="18%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>



          <strong><font color="#0000FF"><? echo $estab_pertence; ?>        </font></strong><strong><font color="#0000FF"> </font></strong></td>



<td width="26%" background="../../imagens/fundocelulas1.png"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>



              <? echo $tel_estab_pertence; ?>



      </font></strong></td>



<td background="../../imagens/fundocelulas1.png"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>



              <? echo $email_estab_pertence; ?>



      </font><font color="#0000FF"> </font></strong></td>



  <td background="../../imagens/fundocelulas1.png"><strong>Cidade: <br>



            <font color="#0000FF"><? echo $cidade_estab_pertence; ?>          </font></strong></td>

    </tr>



    <tr>



      <td background="../../imagens/fundocelulas1.png"><strong>Data do Cadastro <br>



              <font color="#0000FF"><? echo $datacadastro; ?> </font></strong></td>



<td background="../../imagens/fundocelulas1.png"><strong>Hora que foi efetuado o Cadastro <br>



              <font color="#0000FF"><? echo $horacadastro; ?> </font></strong></td>



      <td background="../../imagens/fundocelulas1.png"><strong></strong></td>



      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

    </tr>

  </table>



  <?



  	$_SESSION['usuario'] = $usuario;



	$_SESSION['senha'] = $senha;



	?>



</form>



<form name="form1" method="post" action="">











  <table width="100%" border="0" cellpadding="0" cellspacing="0">



    <tr>



      <td colspan="2" valign="top" background="../../imagens/fundocelulas2.png"><strong>&Uacute;ltima altera&ccedil;&atilde;o efetuada pelo operador: <br>



      </strong><strong><font color="#0000FF"><? echo "$operador_alterou em $dataalteracao as $horaalteracao"; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>



<td width="35%" valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>



              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>



<td width="20%" valign="top" background="../../imagens/fundocelulas2.png"><strong>Celular:<font color="#0000FF"><br>



              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

    </tr>



    <tr>



      <td width="18%" valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>



          <strong><font color="#0000FF"><? echo $estabelecimento_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>



<td width="26%" valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>



              <? echo $tel_estab_pertence; ?> </font></strong></td>



<td valign="top" background="../../imagens/fundocelulas2.png"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>



              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>



  <td valign="top" background="../../imagens/fundocelulas2.png"><strong>Cidade: <br>



            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>

    </tr>

  </table>





</form>



<form name="form1" method="post" action="">





  <table width="100%" border="0" cellpadding="0" cellspacing="0">



    <tr>



      <td colspan="2" background="../../imagens/fundocelulas1.png"><strong>Cadastro atualmente sendo alterado por: </strong></td>



      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>



      <td background="../../imagens/fundocelulas1.png">&nbsp;</td>

    </tr>



    <tr>



      <td colspan="2" background="../../imagens/fundocelulas1.png"><strong><? echo $operador_alterando; ?></strong></td>



<td width="35%" background="../../imagens/fundocelulas1.png"> <strong>E-Mail do operador: <br>



              <? echo $email_operador_alterando; ?>  </strong></td>



      <td width="20%" background="../../imagens/fundocelulas1.png"><strong>Celular:<br>



              <? echo $cel_operador_alterou; ?>  </strong></td>

    </tr>



    <tr>



      <td width="18%" background="../../imagens/fundocelulas1.png"><strong> Estabelecimento:</strong> <br>



          <strong><? echo $estab_pertence_alterando; ?> </strong> </td>



      <td width="26%" background="../../imagens/fundocelulas1.png"><strong>Tel do estabelecimento: <br>



              <? echo $tel_estab_pertence; ?> </strong></td>



      <td background="../../imagens/fundocelulas1.png"><strong>E-Mail do estabelecimento: <br>



              <? echo $email_estab_pertence; ?>  </strong></td>



      <td background="../../imagens/fundocelulas1.png"><strong>Cidade: <br>

        <? echo $cidade_estab_pertence; ?> </strong></td>

    </tr>



    <tr>



      <td><strong><font color="#0000FF"> </font><font color="#0000FF"> </font></strong></td>



      <td>&nbsp;</td>



      <td><strong></strong></td>



      <td>&nbsp;</td>

    </tr>

  </table>





</form>



</body>



</html>



