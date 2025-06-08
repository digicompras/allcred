<?php
	$title = "Fale Conosco";
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
					<img src="images/paginas/slide-fale-conosco.png" style="width: 100%">
				</figure>
			</div>
			<!-- Main Content -->
			<article class="columns">
				<h2>Central de Relacionamento</h2>
				<div class="large-8 columns">
					<p>A AllCred Promotora visa manter um relacionamento próximo e transparente com seus clientes. Para tanto, disponibiliza canais de comunicação para que haja mais interação entre clientes e empresa.</p>
					<p>A Central de Relacionamento é o canal destinado àqueles que queiram fazer solicitações relacionadas a financiamentos, refinanciamentos, saldos, extratos, transações financeiras e demais serviços.</p>
					<h3>Telefone: (16) 3030-7055</h3>
				</div>
				<div class="large-4 columns" style="border-left: 1px solid #ccc; text-align: center;">
					<h3>Redes Sociais</h3>
					<i class="fa fa-facebook-official fa-5x"></i><br>
					<p><a href="https://www.facebook.com/allcredpromotora?fref=ts" target="_blank">fb.com/<strong>allcredpromotora</strong></a></p>
				</div>
			</article>
			<!-- End Main Content -->
			<!-- Proposal Form Vertical -->
			<aside id="proposal" class="large-12 columns">
				<div class="h-proposal box">
					<div class="box-title">
						<img src="images/paginas/allcred-personagem-2.png" width="82" height="114" align="right">
						<h2>SERVIDOR<span>Solicite</span> um crédito</h2>
					</div>
					<hr>
					<form action="sendproposal.php" method="post" class="simpleform simpleform-proposal" enctype="multipart/form-data">
						<?php
							if (!empty($product)) {
								echo '<input type="hidden" id="proposal_product" name="proposal_product" value="'.$product.'">';
							}
						?>
						<input type="hidden" name="proposal_page" value="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
						<div id="proposal">
							<div class="simpleform-row simpleform-text">
								<label for="proposal_value" class="required">SERVIDOR, de quanto você precisa?</label>
								<input type="text" id="proposal_value" name="proposal_value" required="required" placeholder="R$ ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_name" class="required">Nome</label>
								<input type="text" id="proposal_name" name="proposal_name" required="required" placeholder="Seu nome ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_cpf" class="required">C.P.F.</label>
								<input type="text" id="proposal_cpf" name="proposal_cpf" required="required" placeholder="Seu CPF ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_birth" class="required">Data de Nascimento</label>
								<input type="text" id="proposal_birth" name="proposal_birth" required="required" >
							</div>
							<div class="simpleform-row simpleform-email">
								<label for="proposal_email" class="required">E-mail</label>
								<input type="email" id="proposal_email" name="proposal_email" required="required" placeholder="Seu email ...">
							</div>';
							<div class="simpleform-row simpleform-text">
								<label for="proposal_celwhats" class="required">Celular/WhatsApp (com DDD)</label>
								<input type="text" id="proposal_celwhats" name="proposal_celwhats" required="required" placeholder="Seu celular (com DDD)">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_address" class="required">Endereço</label>
								<input type="text" id="proposal_address" name="proposal_address" required="required" placeholder="Endereço e número ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_zipcode" class="required">Bairro</label>
								<input type="text" id="proposal_zipcode" name="proposal_zipcode" required="required" placeholder="Seu C.E.P. ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_rg" class="required">R.G.</label>
								<input type="text" id="proposal_rg" name="proposal_rg" required="required" placeholder="Seu RG ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_namemom" class="required">Nome da Mãe</label>
								<input type="text" id="proposal_namemom" name="proposal_namemom" required="required" placeholder="Nome da Sua Mãe ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_namedad" class="required">Nome do Pai</label>
								<input type="text" id="proposal_namedad" name="proposal_namedad" required="required" placeholder="Nome do seu Pai ...">
							</div>
							<div class="simpleform-row simpleform-choice">
								<label for="proposal_secretaria">Órgão/Secretarias/Empresas Privadas</label>
								<select id="proposal_secretaria" name="proposal_secretaria">
									<option disabled="disabled" selected="selected">Selecione</option>
									<option value="Funcionario de Empresa Privada">Funcionario de Empresa Privada</option>
									<option value="Antecipação FGTS">Antecipação FGTS</option>
									<option value="Hospital das Clinicas de Ribeirao Preto">Hospital das Clinicas de Ribeirao Preto</option>
									<option value="Aeronautica">Aeronautica</option>
									<option value="Exercito">Exercito</option>
									<option value="Marinha">Marinha</option>
									<option value="Siape">Siape</option>
									<option value="Usp">Usp</option>
									<option value="Unicamp">Unicamp</option>
									<option value="Spprev">Spprev</option>
									<option value="Governo do Estado do AMAZONAS">Governo do Estado do AMAZONAS</option>
									<option value="Governo do Estado do ACRE">Governo do Estado do ACRE</option>
									<option value="Segurança Publica de SP">Segurança Publica de SP</option>
									<option value="Secretaria da Saude de SP">Secretaria da Saude de SP</option>
									<option value="Trinbunal de Contas de SP">Trinbunal de Contas de SP</option>
									<option value="Tribunal da Justiça de SP">Tribunal da Justiça de SP</option>
									<option value="Tribunal Eleitoral de SP">Tribunal Eleitoral de SP</option>
									<option value="Policia Militar">Policia Militar</option>
									<option value="Secretaria da Educação Efetivo">Secretaria da Educação Efetivo</option>
									<option value="Secretaria da Educação Lei 500">Secretaria da Educação Lei 500</option>
									<option value="Secretaria da Educação Categoria O">Secretaria da Educação Categoria O</option>
									<option value="Centro Paula Souza  ( Etec / Fatec)">Centro Paula Souza  ( Etec / Fatec)</option>
									<option value="Aposentado e Pensionista do inss">Aposentado e Pensionista do inss</option>
									<option value="Prefeitura de São Paulo">Prefeitura de São Paulo</option>
									<option value="Prefeitura de Campinas">Prefeitura de Campinas</option>
									<option value="Prefeitura de Ribeirao Preto">Prefeitura de Ribeirao Preto</option>
									<option value="Prefeitura de Sertaozinho">Prefeitura de Sertaozinho</option>
									<option value="Prefeitura de Araraquara">Prefeitura de Araraquara</option>
								</select>
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_matricula" class="required">Matrícula</label>
								<input type="text" id="proposal_matricula" name="proposal_matricula" placeholder="Nº de Matrícula" required="required">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_bankname" class="required">Banco</label>
								<input type="text" id="proposal_bankname" name="proposal_bankname" required="required" placeholder="Nome do banco ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_bankag" class="required">Agência</label>
								<input type="text" id="proposal_bankag" name="proposal_bankag" required="required" placeholder="Nª da Agência ...">
							</div>
							<div class="simpleform-row simpleform-text">
								<label for="proposal_bankcc" class="required">Conta</label>
								<input type="text" id="proposal_bankcc" name="proposal_bankcc" required="required" placeholder="N da Conta ...">
							</div>
							<!--
							<div class="simpleform-row simpleform-text">
								<label for="proposal_portalpass" class="required">Senha do Portal</label>
								<input type="password" id="proposal_portalpass" name="proposal_portalpass" required="required">
							</div>
							-->
						</div>
						<p><strong class="text-center">* Crédito sujeito a análise de crédito</strong></p>
						<div class="g-recaptcha" data-sitekey="6LcMVWYaAAAAAPopOqU8WfztwUXFLT-diAUsTjUm"></div>
						<input type="submit" name="submit" value="SOLICITAR PROPOSTA" class="simpleform-submit">
					</form>
				</div>
			</aside>
			<!-- Proposal Form Vertical -->
		</div>
	</div>
</div>
<?php include("../_footer.php") ?>