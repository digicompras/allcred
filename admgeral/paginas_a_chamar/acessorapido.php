<div width="14%">
		 
		<form action="links_acessorapido/menu.php" method="post" name="form1" target="_blank">
			<input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />
          <input type="hidden" name="num_proposta" id="num_proposta" />
      <?
			

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		
			?>
      <input class='class01' type=image src="../../imagens/botoes/acessorapido.png" width="100" height="100" name="Submit" title="ACESSO RAPIDO">
      
      
    </form>
	
</div>
