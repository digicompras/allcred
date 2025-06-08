<div width="14%">
		 
  <form action="estabelecimentos/menu.php" method="post" name="form1" target="_blank">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		
			?>
      <input class='class01' type=image src="../../imagens/botoes/estabelecimentos.png" width="100" height="100" name="Submit" title="CADASTRO DE ESTABELECIMENTOS">
      
      
    <input name="operador" type="hidden" id="operador" value="<? echo "$operador"; ?>">
	<input name="date" type="hidden" id="date" value="<? echo "$date"; ?>">
    <input name="hora" type="hidden" id="hora" value="<? echo "$hora"; ?>">
    <input name="area" type="hidden" id="area" value="<? echo "CADASTRO DE ESTABELECIMENTOS"; ?>">
    <input name="valor" type="hidden" id="valor" value="<? echo "1"; ?>">
  </form>
	
</div>
