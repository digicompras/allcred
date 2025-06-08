<?php

require '../conect/conect.php';
include '../css_menus/modal.css';
include '../css_menus/modal2.css';

$sql = "SELECT * FROM tempoexpiracaosenha LIMIT 1";
$stmt = $pdo->query($sql);
$tempoexpiracaosenha = 30;
if ($linha = $stmt->fetch(PDO::FETCH_NUM)) {
    $tempoexpiracaosenha = $linha[1];
}

session_cache_limiter('private');
session_cache_expire($tempoexpiracaosenha);
session_start();

if (!isset($_SESSION['usuario'], $_SESSION['senha'], $_SESSION['resposta'])) {
    header("Location: alerta.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$resposta = $_SESSION['resposta'];
?>

<?php
  
$sql = "SELECT * FROM operadores WHERE usuario = ? AND senha = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$usuario, $senha]);

if ($stmt->rowCount() == 0) {
    header("Location: alerta.php");
    exit;
}

$linha = $stmt->fetch(PDO::FETCH_NUM);
$nome = $linha[1];
$dataultimatrocadesenha = $linha[65];
$penultimasenha = $linha[66];
$ultimasenha = $linha[67];

$sql = "SELECT * FROM diaslimitetrocarsenha LIMIT 1";
$stmt = $pdo->query($sql);
$diaslimite = 0;
if ($linha = $stmt->fetch(PDO::FETCH_NUM)) {
    $diaslimite = $linha[1];
}

$date = date('Y-m-d');
$hora = date('H:i:s');
$diferenca = strtotime($date) - strtotime($dataultimatrocadesenha);
$dias = floor($diferenca / (60 * 60 * 24));

if ($dias >= $diaslimite) {
    $_SESSION['nome'] = $nome;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    header("Location: ../ups.php");
    exit;
}else{


?>


<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>
<link rel="stylesheet" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


</head>

<?php

$solicitacao = $_POST['solicitacao'] ?? null;
$hoje = date('Y-m-d');
$mes_atual = date('m');
$mes_anterior = $mes_atual == 1 ? '12' : str_pad($mes_atual - 1, 2, '0', STR_PAD_LEFT);
$mes_anterior_um = str_pad($mes_atual - 2, 2, '0', STR_PAD_LEFT);

$ano_atual = date('Y');
$ano_anterior = $ano_atual - 1;
$ano_proximo = $ano_atual + 1;
$data_hoje = date('Y-m-d');
$data_hoje_br = date('d-m-Y');
$codigo_mensagem = $_POST['codigo_mensagem'] ?? null;
$mensagem_lida = $_POST['mensagem_lida'] ?? null;
$data_leitura = date('d-m-Y');
$hora_leitura = date('H:i:s');

if ($mensagem_lida === "Lida") {
    $res = $pdo->query("SELECT * FROM db");
    while ($linha = $res->fetch(PDO::FETCH_NUM)) {
        $comando = "UPDATE `{$linha[1]}`.`mensagens_ao_funcionario` SET mensagem_lida = ?, data_leitura = ?, hora_leitura = ? WHERE codigo = ? LIMIT 1";
        $stmt = $pdo->prepare($comando);
        $stmt->execute([$mensagem_lida, $data_leitura, $hora_leitura, $codigo_mensagem]);
    }
}




?>


<?php
$sql = "SELECT * FROM background";
$res = $pdo->query($sql);
$background = "default.jpg";
if ($linha = $res->fetch(PDO::FETCH_NUM)) {
    $background = $linha[1];
}
?>

<body background="../background/<?php echo "$background"; ?>">

<?php

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

$sql = "SELECT * FROM operadores WHERE usuario = :usuario AND senha = :senha LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':usuario' => $usuario,
    ':senha' => $senha
]);

$reg = 0;

while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $reg++;

    $codigo_operador   = $linha['codigo'] ?? null;
    $nome_operador     = $linha['nome'] ?? null;
    $senha_op          = $linha['senha_op'] ?? $linha[41] ?? null;
    $tipo_op           = $linha['tipo_op'] ?? $linha[42] ?? null;
    $funcao            = $linha['funcao'] ?? $linha[43] ?? null;
    $email_operador    = $linha['email'] ?? $linha[20] ?? null;
    $celular_operador  = $linha['celular'] ?? $linha[19] ?? null;
    $estab_pertence    = $linha['estab_pertence'] ?? $linha[44] ?? null;
    $bloqueio_parcial  = $linha['bloqueio_parcial'] ?? $linha[57] ?? null;
    $tempo_almoco      = $linha['tempo_almoco'] ?? $linha[58] ?? null;
    $bloqueio_compra   = $linha['bloqueio_compra'] ?? $linha[59] ?? null;
}
?>

<?php
$sql = "SELECT COUNT(*) FROM mensagens_ao_funcionario 
        WHERE nome_operador = :nome_operador AND mensagem_lida = 'Não lida'";
$stmt = $pdo->prepare($sql);
$stmt->execute([':nome_operador' => $nome_operador]);
$reg_mensagem = $stmt->fetchColumn();

if ($reg_mensagem >= 1) {
    echo "<script>window.location = 'index.php#mensagem';</script>";
}
	?>
<?php
	
	$sql = "SELECT * FROM ponto 
        WHERE nome = :nome_operador AND data = :data 
        ORDER BY codigo DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome_operador' => $nome_operador,
    ':data' => $data_hoje_br
]);

$ponto = 0;
$codigo_ponto = null;
$sai_m = null;

if ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $ponto++;
    $codigo_ponto = $linha['codigo'];
    $sai_m = $linha['saida_marcada']; // use a chave real da coluna `sai_m`, ajuste se necessário
}

$hora_atual_diferenciado_e_padrao = date('H:i');

function calcular_tempo_transc($hora_saida, $hora_atual) {
    $saida = explode(':', $hora_saida);
    $atual = explode(':', $hora_atual);

    $minutos_saida = ($saida[0] * 60) + $saida[1];
    $minutos_atual = ($atual[0] * 60) + $atual[1];
    $diferenca = $minutos_atual - $minutos_saida;

    if ($diferenca <= 59) {
        return $diferenca . ' Minutos';
    } else {
        $horas = floor($diferenca / 60);
        $minutos = $diferenca % 60;

        $horas = str_pad($horas, 2, '0', STR_PAD_LEFT);
        $minutos = str_pad($minutos, 2, '0', STR_PAD_LEFT);

        return $horas . ':' . $minutos . ' Horas';
    }
}

if ($sai_m) {
    $diferenca_em_minutos = (explode(' ', calcular_tempo_transc($sai_m, $hora_atual_diferenciado_e_padrao))[0]) * -1;
    
    $diferenca_hora = bcdiv($diferenca_em_minutos, 60, 0);
    $hora_subtracao = ($diferenca_hora >= 1) ? bcmul($diferenca_hora, 60, 0) : 0;
    $diferenca_minutos = $diferenca_em_minutos - $diferenca_hora;

    $totaldeminutos = $hora_subtracao + $diferenca_minutos;

    echo "$diferenca_minutos - $tempo_almoco";
}
	
	?>
<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td width="29%" align="center"><strong><font color="#0000FF"><?php echo $nome_operador; ?> 

            

</font></strong></td>

      <td width="19%" align="center"><strong><font color="#0000FF"><?php echo $funcao; ?></font></strong></td>
      <td width="28%" align="center"><strong><font color="#0000FF"><?php echo $email_operador; ?></font></strong>     </td>

      <td width="10%" align="center"><strong><font color="#0000FF"><?php echo $celular_operador; ?>

      </font><font color="#0000FF">      </font></strong></td>

      <td width="14%" valign="top"><div align="center">

        <strong><font color="#0000FF">Hoje</font><font color="#0000FF"> 
        </font></strong>

        <strong><font color="#0000FF"><?php echo $data_hoje; ?></font></strong>

           

        </p>

</div></td>
    </tr>


<?php

if ($reg == 3) {
    echo "</tr><tr>";
    $reg = 0;
}

?>



<?php } ?>
</table><h2>PAINEL DE CONTROLE<strong><font color="#0000FF"><?php echo $resposta; ?></font></strong></h2>
  <p></p>


<section>

<div class="bloco_botoes">

			<?php
				  // Se não houver mensagens não lidas, incluir o painel de clientes
if ($reg_mensagem == 0) {
    include("paginas_a_chamar/clientes.php");
}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?php
				// Se não houver mensagens, inclui a página de propostas
if ($reg_mensagem == 0) {
    include("paginas_a_chamar/propostas.php");
}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?php
					// Assumindo que $reg_mensagem já foi definido anteriormente via PDO
if ($reg_mensagem == 0) {
    include("paginas_a_chamar/acessorapido.php");
}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?php
					if ($reg_mensagem == 0) {
    include("paginas_a_chamar/operadores.php");
}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?php
					if($reg_mensagem==0){				
				include("paginas_a_chamar/cartaodeponto.php");
					}
			?>
  </div>
	
	<div class="bloco_botoes">

			<?php
					if($reg_mensagem==0){				
				include("paginas_a_chamar/relatorios.php");
					}
			?>
  </div>
	
</section>

<div id="mensagem" class="modal2" role="dialog" style="overflow:  width: 2000px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b></b>X</a>

    <?php

$sql = "SELECT * FROM mensagens_ao_funcionario WHERE nome_operador = :nome_operador AND mensagem_lida = 'Não lida'";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome_operador', $nome_operador, PDO::PARAM_STR);
$stmt->execute();

$reg_mensagem = 0;
$mensagens = [];

while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $reg_mensagem++;

    $codigo_mensagem = $linha['codigo'];
    $nome_operador = $linha['nome_operador'];
    $data_mensagem = $linha['data_mensagem'];
    $hora_mensagem = $linha['hora_mensagem'];
    $mensagem = $linha['mensagem'];
    $mensagem_lida = $linha['mensagem_lida'];
    $data_leitura = $linha['data_leitura'];
    $hora_leitura = $linha['hora_leitura'];
    $assunto = $linha['assunto'];


?>
  </p>
  <form name="form9" method="post" action="index.php">
    <table width="100%"  border="0">
      <tr>
        <td width="9%"><div align="center"><?php echo $data_mensagem; ?></div></td>
        <td width="9%"><div align="center"><?php echo $hora_mensagem; ?></div></td>
        <td width="62%"><div align="center">
            <textarea name="mensagem" cols="120" rows="7" id="mensagem"><?php echo "$assunto - $mensagem"; ?></textarea>
        </div></td>
        <td width="20%"><div align="center">
            <input name="codigo_mensagem" type="hidden" id="codigo_mensagem" value="<?php echo $codigo_mensagem; ?>">
            <input name="mensagem_lida" type="hidden" id="mensagem_lida" value="Lida">
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center"><strong>
          <input class='class01' type=image src="../imagens/botoes/ciente.png" width="100" height="100" name="Submit2" title="DECLARO QUE LI A MENSAGEM E ESTOU CIENTE!">
        </strong></div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
  <p>
    <?php } ?>
  </p>
<p align="center">
    
    
    
    
</p>
</body>

</html>

</div>
<?php 

//mysql_free_result($res);

mysql_close($conexao);

?>