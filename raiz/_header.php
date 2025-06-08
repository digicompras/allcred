
<!DOCTYPE html>
<html>
<head>
	<?
		define("ROOT", $_SERVER['DOCUMENT_ROOT']);
		//define("ROOT", "http://allcredpromotora.com.br");
		require(ROOT."/conect/conect.php");
		$ip = $_SERVER['REMOTE_ADDR'];
		$users = mysql_query("SELECT * FROM ips WHERE ip = '".$ip."' AND estab_pertence <> '' LIMIT 1");
		while( $user = mysql_fetch_row($users) ) {
			$ip_cadastrado = $user[1];
			$estab_pertence = $user[2];
		}
	?>
	<meta charset="utf-8">
	<base href="https://allcredpromotora.com.br/raiz/">
	<!--[if IE]>
	<script type="text/javascript">
		// Fix for IE ignoring relative base tags.
		(function() {
			var baseTag = document.getElementsByTagName('base')[0];
			baseTag.href = baseTag.href;
		})();
	</script>
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Dinaweb Marketing Digital">
	<!-- <link rel="canonical" href="http://allcred.byethost7.com/">	    -->
	<title><?php echo ($title<>""? $title." | ":""); ?>AllCred Financeira</title>

	<!-- CSS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/simpleforms.css" media="screen">
	<link rel="stylesheet" href="css/foundation.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/responsive.css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/style-ie.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		<script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
		<script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    <![endif]-->


	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- Hotjar Tracking Code for allcredpromotora.com.br -->
	<script>
		(function(f,b){
			var c;
			f.hj=f.hj||function(){(f.hj.q=f.hj.q||[]).push(arguments)};
			f._hjSettings={hjid:33233, hjsv:4};
			c=b.createElement("script");c.async=1;
			c.src="//static.hotjar.com/c/hotjar-"+f._hjSettings.hjid+".js?sv="+f._hjSettings.hjsv;
			b.getElementsByTagName("head")[0].appendChild(c); 
		})(window,document);
	</script>
	<!-- RECAPTCHA V2 -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<?php
	if( mysql_num_rows($users)==1 ){ 
		echo '<a href="operador/" class="button large fixed" target="_blank">Acesso ao operador</a>'; 
	}
	?>
	<div class="container">
		<aside>
			<header>
				<div id="logo">
					<a href="tel:16 3722 0269"><div id="contact-phone">(16) 3030 7055</div></a>
					<div class="toggle-topbar menu-icon"><a>☰ menu</a></div>
				</div>
				<nav id="mainmenu">
					<ul>
						<li class="first active"><a href="/" class="">Home</a></li>
						<li class=""><a href="empresa" title="" class="">Empresa</a></li>
						<li class="has-dropdown">
							<a href="produtos" class="">Produtos</a>
                            <ul class="dropdown">
								<li class="first"><a href="produtos/cartao-de-credito-servidor" title="" class="">Cartão BENEFÍCIO p/ SERVIDOR SP</a></li>
								<li class=""><a href="produtos/fgts" title="" class="">Antecipe seu FGTS</a></li>
								<li class=""><a href="produtos/emprestimos-servidores-forcas" title="" class="">Servidores Exército Marinha Aeronáutica</a></li>
								<li class=""><a href="produtos/emprestimo-servidores-estado-de-sao-paulo-sp" title="" class="">Servidores de São Paulo</a></li>
								<li class=""><a href="produtos/emprestimos-servidores-federal" title="" class="">Servidores FEDERAL</a></li>
								<li class=""><a href="produtos/emprestimo-servidores-pm" title="" class="">Servidor Polícia Militar e SPPREV</a></li>
								<li class=""><a href="produtos/cartao-de-credito-servidor" title="" class="">Cartão Crédito p/ SERVIDOR SP</a></li>
								<li class=""><a href="produtos/cartao-de-credito-servidor-federal" title="" class="">Cartão Crédito p/ SERVIDOR FEDERAL</a></li>
								<li class=""><a href="produtos/emprestimo-servidores-campinas" title="" class="">Servidor Pref. São Paulo e Pref. Ribeirão Preto</a></li>
								<li class=""><a href="produtos/emprestimo-para-aposentados-e-pensionistas-do-inss" title="" class="">Empréstimo Aposentados e Pensionistas</a></li>
								<li class=""><a href="produtos/emprestimo-servidor-tribunal-de-justica" title="" class="">Empréstimo Servidor Tribunal de Justiça</a></li>
								<!-- <li class=""><a href="produtos/refinanciamento-de-imoveis-e-com-a-allcred" title="" class="">Crédito com Garantia de Imóvel</a></li> -->
								<!-- <li class="last"><a href="produtos/bradesco-dental" title="" class="">BRADESCO DENTAL</a></li> -->
                            </ul>
						</li>
						<li class=""><a href="seja-uma-promotora" title="" class"">Seja Uma Promotora</a></li>
						<li class=""><a href="agencias" class="">Agências</a></li>
						<li class=""><a href="trabalhe-conosco" title="" class="">Trabalhe Conosco</a></li>
						<li class="last"><a href="fale-conosco" title="" class="">Fale Conosco</a></li>
					</ul>
				</nav>
				<div id="social">
					<a href="https://www.facebook.com/allcredpromotora" target="_blank">facebook</a>
				</div>
			</header>
			<div id="adbanner">
				<a href="produtos/emprestimo-servidores-estado-de-sao-paulo-sp" title="" class=""><img src="images/banner-sidebar-02.png"></a>
			</div>
			<div id="partners">
				<h3>Parceiros</h3>
				<!--<img src="images/logo-bradesco-promotora.png" alt="Bradesco Promotora" style="padding: 10px 0">-->
				<!--<img src="images/logo-ole.png" alt="Olé Consignado" style="padding: 10px 0">-->
				<img src="images/logo-banco-daycoval.png" alt="Banco Daycoval" style="padding: 10px 0">
			</div>
		</aside>