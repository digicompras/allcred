<?php

/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire(60);
$cache_expire = session_cache_expire();


session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



require '../conect/conect.php';
include '../css_menus/modal.css';
include '../css_menus/modal2.css';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>

<?

$user= "select * from admgeral where usuario='$usuario' and  senha='$senha'";

$result=mysql_query($user,$conexao) or die("Falha ao selecionar a tabela user");

if(mysql_num_rows($result)==0){




Header("Location: alerta.php");



}else{
	
	

$sql = "SELECT * FROM admgeral where usuario='$usuario' and  senha='$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome = $linha['1'];

$dataultimatrocadesenha = $linha['55'];
$penultimasenha = $linha['56'];
$ultimasenha = $linha['57'];

}

$sql = "SELECT * FROM diaslimitetrocarsenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$diaslimite = $linha['1'];

}



$date = date('Y-m-d');
$hora = date('H:i:s');


// Calcula a diferença em segundos entre as datas
$diferenca = strtotime($date) - strtotime($dataultimatrocadesenha);

//Calcula a diferença em dias
$dias = floor($diferenca / (60 * 60 * 24));


if($dias>=$diaslimite){
	
	//echo "erro!! tente novamente em alguns instantes $dias - $diaslimite ";
	
	$_SESSION['nome'] = $nome;

	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	Header("Location: ups.php");
	
}else{


?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMINISTRAÇÃO GERAL</title>
</head>
	<body background="../background/<? echo "$background"; ?>">
	<h2>PAINEL DE CONTROLE</h2>
		<section>
		
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/estabelecimentos.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/cartaodeponto.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/tiposdevenda.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/termoderesponsabilidade.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/mensagensaosfuncionarios.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/cidades.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/verificarmargemportabilidade.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/tabelas.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/operacoes_a_serem_executadas.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/alterastatus.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/propostasadigitar.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/propostas.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/tiposcontratos.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/etiquetasdemaladireta.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/departamentopessoal.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/clientes.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/secretarias.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/categoriasdedespesas.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/financeiro.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/relatorios.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/acessorapido.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/perfis.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/autorizacaodeips.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/horariosdosistema.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/mapadeproducao.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/verificarstatusporoperador.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/tiposdepropostas.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/status.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/bancosdeoperacao.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/bancos.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/promotoras.php");
				
			?>
		</div>
			
			<div class="bloco_botoes">

			<?
									
				include("paginas_a_chamar/categoriasclientes.php");
				
			?>
		</div>
			
			
	
		
			</section>
</body>
</html>


<? }} ?>
