<?php
	$title = "Sorteio Hotel Leão de Judá";
	include("../_header.php");
?>
<div class="content">
	<div class="row">
		<div class="large-12">
			<!-- Main Slider -->
			<style>
				figure#imagestrip img { width: 100%; height: auto; float: left; }
			</style>
			<div id="slider">
				<figure style="width:100%; animation: 6s slidy1 infinite; -webkit-animation: 6s slidy1 infinite;">
					<img src="images/paginas/slide-sorteio.png" style="width: 100%">
				</figure>
			</div>
			<!-- Main Content -->
			<article class="large-6 columns">
				<h2>PROFESSORES E SERVIDORES ESTADUAIS</h2>
				<p>Participem do sorteio de <b>1(um) Fim de Semana</b> no Pousada Leão de Judá para <b>Você + 1 Acompanhante</b> com tudo pago pela AllCred.</p>
				<video preload="auto"  style="width:100%" autoplay controls>
					 <source src="images/leao-de-juda.mp4" type="video/mp4">	
				</video>
			</article>
			<div class="large-6 columns">
				<img src="images/paginas/leao-de-juda.jpg" style="padding: 30px 10px;">
			</div>
			<!-- End Main Content -->
			<div class="large-12 columns">
				<h3>Cadastre-se agora e concorra!</h3>
				<form action="sendproposal.php" method="post" class="simpleform simpleform-workwithus" enctype="multipart/form-data">
					<input type="hidden" id="proposal_product" name="proposal_product" value="sorteio">
					<div id="workwithus">
						<div class="simpleform-row simpleform-text">
							<label for="proposal_name">Nome</label>
							<input type="text" id="workwithus_name" name="proposal_name" placeholder="Nome Completo">
						</div>
						<div class="simpleform-row simpleform-text">
							<label for="proposal_phone">Telefone (com DDD)</label>
							<input type="text" id="proposal_phone" name="proposal_phone" placeholder="Seu telefone (com DDD)">
						</div>
						<div class="simpleform-row simpleform-email">
							<label for="proposal_email">E-mail</label>
							<input type="email" id="workwithus_email" name="proposal_email" placeholder="Seu email ...">
						</div>
						<div class="simpleform-row simpleform-text">
							<label for="proposal_matricula">Matrícula</label>
							<input type="text" id="proposal_matricula" name="proposal_matricula" placeholder="Nº de Matrícula ...">
						</div>
						<div class="simpleform-row simpleform-text">
							<input type="submit" name="submit" value="Quero Participar!" class="simpleform-submit" style="display:block; margin:0 auto;">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("../_footer.php") ?>