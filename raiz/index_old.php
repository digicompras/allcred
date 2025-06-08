<?php
	$title = "Seja uma Promotora";
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
					<img src="images/paginas/slide-trabalhe-conosco.png" style="width: 100%">
				</figure>
			</div>
			<!-- Main Content -->
			<article class="columns">
				<h2>Monte Seu Negócio com a AllCred</h2>
				<p>Venha fazer parte do projeto de expansão da Rede AllCred. Se você tem uma promotora de crédito ou quem investir em um novo negócio, essa é a oportunidade.</p>
				<p>Além disso, temos como premissa o aprofundamento das relações com o público interno e externo, os relacionamentos são de longo prazo e isso se reflete no excelente ambiente de trabalho.</p>
				<p>Nós buscamos profissionais que tenham identidade com nossos valores, Solidez, Ética, Respeito, Empreendedorismo e União, que apreciem desafios e tenham espírito de equipe.</p>
				<p>Se você deseja fazer parte dessa empresa, envie uma prévia de seu currículo para apreciação de nosso RH. Seus dados ficarão em nosso sistema e, surgindo uma oportunidade, faremos contato para que você participe do processo seletivo.</p>
			</article>
			<!-- End Main Content -->
			<div class="large-12 columns">
				<h3>Envie uma prévia de seu curriculo para apreciação de nosso RH</h3>
				<form action="sendcurriculum.php" method="post" class="simpleform simpleform-workwithus" enctype="multipart/form-data">
					<div id="workwithus">
						<div class="simpleform-row simpleform-text">
							<label for="workwithus_name">Nome</label>
							<input type="text" id="workwithus_name" name="workwithus_name" placeholder="Nome Completo">
						</div>
						<div class="simpleform-row simpleform-text">
							<label for="workwithus_phone">Telefone (com DDD)</label>
							<input type="text" id="workwithus_phone" name="workwithus_phone" placeholder="Seu telefone (com DDD)">
						</div>
						<div class="simpleform-row simpleform-email">
							<label for="workwithus_email">E-mail</label>
							<input type="email" id="workwithus_email" name="workwithus_email" placeholder="Seu email ...">
						</div>
						<div class="simpleform-row simpleform-date">
							<label>Data de Nascimento</label>
							<div id="workwithus_birthdate">
								<select id="workwithus_birthdate_day" name="workwithus_birthdate_day">
									<option value=""></option>
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
								<select id="workwithus_birthdate_month" name="workwithus_birthdate_month">
									<option value=""></option>
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
								<input type="text" id="workwithus_birthdate_year" name="workwithus_birthdate_year">
							</div>
						</div>
						<div class="simpleform-row simpleform-text">
							<label for="workwithus_address">Endereço</label>
							<input type="text" id="workwithus_address" name="workwithus_address" placeholder="Seu Endereço">
						</div>
						<div class="simpleform-row simpleform-integer">
							<label for="workwithus_addressnumber">Número</label>
							<input type="number" id="workwithus_addressnumber" name="workwithus_addressnumber">
						</div>
						<div class="simpleform-row simpleform-text">
							<label for="workwithus_bairro">Bairro</label>
							<input type="text" id="workwithus_bairro" name="workwithus_bairro" placeholder="Seu Bairro ...">
						</div>
						<div class="simpleform-row simpleform-text">
							<label for="workwithus_city">Cidade</label>
							<input type="text" id="workwithus_city" name="workwithus_city" placeholder="Sua Cidade ...">
						</div>
						<div class="simpleform-row simpleform-choice">
							<label for="workwithus_graduation">Escolaridade</label>
							<select id="workwithus_graduation" name="workwithus_graduation">
								<option value="">Selecione sua Escolaridade</option>
								<option value="1º Grau Incompleto">1º Grau Incompleto</option>
								<option value="1º Grau Completo">1º Grau Completo</option>
								<option value="2º Grau Incompleto">2º Grau Incompleto</option>
								<option value="2º Grau Completo">2º Grau Completo</option>
								<option value="Técnico Incompleto">Técnico Incompleto</option>
								<option value="Técnico Completo">Técnico Completo</option>
								<option value="Superior Incompleto">Superior Incompleto</option>
								<option value="Superior Completo">Superior Completo</option>
								<option value="Pós Graduação Incompleto">Pós Graduação Incompleto</option>
								<option value="Pós Graduação Completo">Pós Graduação Completo</option>
								<option value="MBA Incompleto">MBA Incompleto</option>
								<option value="MBA Completo">MBA Completo</option>
								<option value="Mestrado">Mestrado</option>
								<option value="Doutorado">Doutorado</option>
							</select>
						</div>
						<div class="simpleform-row simpleform-text">
							<label for="workwithus_course">Curso</label>
							<input type="text" id="workwithus_course" name="workwithus_course" placeholder="Curso de Formação ...">
						</div>
						<div class="simpleform-row simpleform-textarea">
							<label for="workwithus_profexperience">Experências Profissionais</label>
							<textarea id="workwithus_profexperience" name="workwithus_profexperience" placeholder="Fale um pouco de suas experiencias profissionais ..."></textarea>
						</div>
						<div class="simpleform-row simpleform-textarea">
							<label for="workwithus_companies">Empresas e Atividades</label>
							<textarea id="workwithus_companies" name="workwithus_companies" placeholder="Cite as Empresas onde trabalhou e quais as atividades desenvolvidas ..."></textarea>
						</div>
						<div class="simpleform-row simpleform-textarea">
							<label for="workwithus_whyallcred">Porquê a AllCred</label>
							<textarea id="workwithus_whyallcred" name="workwithus_whyallcred" placeholder="Por que deseja trabalhar na Allcred Promotora?"></textarea>
						</div>
					</div>
					<input type="submit" name="submit" value="Enviar Currículo" class="simpleform-submit">
				</form>
			</div>
		</div>
	</div>
</div>
<?php include("../_footer.php") ?>