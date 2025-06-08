<?php
	$title = "Área do Operador";
	include("../_header.php");

	/* Configuração da hora correta */
	setlocale(LC_TIME, 'pt_BR');
	$data_completa = strftime("%A, %d de %B de %Y<br><br>");
	$hoje = strftime("%A");

	/* Carrega o horário de funcionamento do dia atual */
	$sql = "SELECT * FROM hora_encerramento WHERE dia = '$hoje' LIMIT 1";
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
	}
	$date = date('d-m-Y');

	/* Realiza o ajuste da hoja */
	$sql = "SELECT * FROM hora_certa limit 1";
	$res = mysql_query($sql);
	while($linha=mysql_fetch_row($res)) {
		$acao = $linha[5];
		$hora_ajuste = $linha[2];
	}
	$horacerta = date('H')+$hora_ajuste;
	if($horacerta<=9){
		$hora_atual = "0".$horacerta.date(':i:s');
	} else {
		$hora_atual = $horacerta.date(':i:s');
	}

	/* Carrega o horário de trabalho */
	$sql = "SELECT * FROM hora_ponto limit 1";
	$res = mysql_query($sql);
	while($linha=mysql_fetch_row($res)) {
		$h_ponto = $linha[1];
		$m_ponto = $linha[2];
		$s_ponto = $linha[3];
	}
	$hora_ponto = "$h_ponto:$m_ponto:$s_ponto";
	$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
	$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";

?>
<div class="content">
	<div class="row">
		<div class="large-12">
			<div class="imageholder">
				<img src="images/paginas/slide-operador.png">
			</div>
			<h1 class="columns">Área do Operador</h1>
			<!-- Script de Operador -->
			<?php
				//if ( mysql_num_rows($users) == 1 )
			{
					$date = date('Y-m-d');
					echo "
						<form name='form1' method='post' action='/verifica.php' target='_top'>
							<article class='columns large-6'>
								<p>
									Data de Acesso: <strong>".$data_completa."</strong><br>
									Hora de Acesso: <strong>".$hora_atual."</strong>
								</p>
								
								<p>
									Hor&aacute;rio de funcionamento do sistema! <br>
									In&iacute;cio as <strong>".$hora_iniciar."</strong> - T&eacute;rmino as <strong>".$hora_terminar."</strong>
								</p>
							</article>
							<article class='columns large-6 box'>";
								if ( $hora_atual <= $hora_iniciar ) { 

echo "<h4>Prezado operador! Sistema disponível no momento apenas para usuários com horários diferenciado, para os demais o sistema abrirá as ".$hora_iniciar." </h4>";
								
echo "<input name='estab_pertence' type='hidden' id='estab_pertence' value='".$estab_pertence."'>
										<input name='data_hoje' type='hidden' id='data_hoje' value='".$date."'>
										<p>
											Nome da Agência: <b>".$estab_pertence."</b><br>
											Nome: 
											<select name='nome' id='nome'>";
											$sql = "SELECT * FROM operadores WHERE estab_pertence = '".$estab_pertence."' AND status = 'Ativo' and horariologin = 'diferenciado' ORDER BY nome ASC";
											$result = mysql_query($sql);
											while ( $op = mysql_fetch_array($result) ) {
											echo "<option>".$op['nome']."</option>";
											}
											echo "
											</select>
											Usu&aacute;rio: <input name='usuario' type='text' id='usuario'>
											Senha: <input name='senha' type='password' id='senha'>
											<input type='submit' name='Submit' value='Conectar' class='button'>
										</p>";	







}
								if (( $hora_atual >  $hora_iniciar) && ( $hora_atual < $hora_terminar )) { 
									echo "
										<h5>Prezado operador!<br>PARA SUA SEGURANÇA SEU IP: ".$ip_cadastrado." SERÁ GRAVADO AO REALIZAR SEU LOGIN!<br> Tenha um ótimo dia de trabalho!</h5>
										<input name='estab_pertence' type='hidden' id='estab_pertence' value='".$estab_pertence."'>
										<input name='data_hoje' type='hidden' id='data_hoje' value='".$date."'>
										<p>
											Nome da Agência: <b>".$estab_pertence."</b><br>
											Nome: 
											<select name='nome' id='nome'>";
												if ( $hora_atual <= $hora_ponto ) {
													$sql = "SELECT * FROM operadores WHERE estab_pertence = '".$estab_pertence."' and status = 'Ativo' ORDER BY nome ASC";
													$result = mysql_query($sql);
													while ( $op = mysql_fetch_array($result) ) {
														echo "<option>".$op['nome']."</option>";
													}
												} else {
													$sql = "SELECT * FROM ponto WHERE date = '".$date."' AND ent_m <> 'FALTOU' AND estab_pertence = '$estab_pertence' ORDER BY nome ASC";
													$result = mysql_query($sql);
													while ( $op = mysql_fetch_array($result) ) {
														echo "<option>".$op['nome']."</option>";
													}
												}
									echo "
											</select>
											Usu&aacute;rio: <input name='usuario' type='text' id='usuario'>
											Senha: <input name='senha' type='password' id='senha'>
											<input type='submit' name='Submit' value='Conectar' class='button'>&nbsp;&nbsp;&nbsp;<input type='reset' name='Submit2' value='Limpar' class='button'>
										</p>";

								} 
								if ( $hora_atual >= $hora_terminar ) { echo "<h4>Prezado operador!<br> Seu dia de trabalho j&aacute; terminou!<br><br>J&aacute; s&atilde;o ".$hora_atual.", portanto, n&atilde;o &eacute; poss&iacute;vel acessar o sistema agora!<br><br> V&aacute; descansar para amanh&atilde; seu dia ser proveitoso!</h4>"; }

						echo "</article>
						</form>"; 
						
					} //else {
						//echo "<article class='columns large-6 pull-3 box'><p>ATENÇÃO!!!...<br><br>O IP <strong>". $ip ."</strong> DO LOCAL DE ONDE VOCÊ ESTÁ TENTANDO ACESSAR O SISTEMA NÃO ESTÁ AUTORIZADO PELA ALLCRED FINANCEIRA!<br><br> ACESSE O SISTEMA DE UM LOCAL DEVIDAMENTE AUTORIZADO!</p>";
					//}
				?>
			</article>
			<!-- Script de Operador -->
		</div>
	</div>
</div>
<?php include("../_footer.php") ?>