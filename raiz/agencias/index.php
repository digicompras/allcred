<?php
	$title = "Agências AllCred Promotora";
	include("../_header.php");
	$agencies = mysql_query("SELECT * FROM estabelecimentos WHERE aparecer_site = 'Sim' ORDER BY posicao ASC");
?>
<div class="content">
	<div class="row">
		<div class="large-12">
			<div class="imageholder">
				<img src="images/paginas/slide-agencias.png">
			</div>

			<article class="large-10 large-offset-1 columns teaser">
				<div class="imageholder">
					<img src="images/agencias/agencia-matriz-full.png" style="width:100%;">
				</div>
				<h3>Agência Matriz - Franca</h3>
				<p align="center">
					Rua Doutor Júlio Cardoso, 2007<br />
					Franca - SP<br />
					14400-730<br />
					(16) 3409-6454<br />
					sac@allcredpromotora.com.br
				</p>
			</article>
			<!--
			<h1 class="columns">Agência AllCred mais perto de você</h1>
			<p class="columns">Aqui você tem a relação de todas as agências AllCred Promotora</p>
			<hr>
			<?php
				while ( $agency = mysql_fetch_array($agencies, MYSQL_ASSOC) ) {
					$image_name = strtolower( str_replace(" ", "_", trim( $agency['nfantasia'])) );
					$image_file = '/home2/allcred/public_html/raiz/images/agencias/'.$image_name.'.png';
					if ( !file_exists ( $image_file ) ) { $image_name = "agencia"; }
					/*$ag_phone = $agency['celular'];
					if ( empty($ag_phone) ) $ag_phone = $agency['telefone'];*/
					if ( !empty($agency['endereco']) && $agency['nfantasia'] != "AGENCIA 0004" ) {
						echo '
							<article class="large-4 columns teaser">
								<div class="imageholder">
									<img src="images/agencias/'.$image_name.'.png">
								</div>
								<h3>'.$agency['nfantasia'].'</h3>
								<p align="center">
									'.htmlentities($agency['endereco']).', '.$agency['numero'].'<br />
									'.htmlentities($agency['cidade']).' - '.$agency['estado'].'<br />
									'.$agency['cep'].'<br />
									'.$agency['telefone'].'<br />
									'.$agency['celular'].'<br />
									'.$agency['email'].'
								</p>
							</article>';
					}
				}
			?>
			-->
		</div>
	</div>
</div>
<?php include("../_footer.php") ?>