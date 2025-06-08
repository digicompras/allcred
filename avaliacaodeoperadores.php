<?


$num_proposta=$_POST['num_proposta'];

$nome_operador=$_POST['nome_operador'];

$notadooperador=$_POST['notadooperador'];

$indicariaallcred=$_POST['indicariaallcred'];

$comentario=$_POST['comentario'];



require '../conect/conect.php';


$sql5 = "SELECT * FROM cad_empresa limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$email_empresa = $linha[14];

}



$date = date('Y-m-d');
$hora = date('H:i:s');

$comando = "insert into propostas_avaliacao_atendimento(num_proposta,nome_operador,notadooperador,indicariaallcred,comentario,date,hora) values('$num_proposta','$nome_operador','$notadooperador','$indicariaallcred','$comentario','$date','$hora')";


//DISPARA O EMAIL PARA O OPERADOR
	
$mens  .=  $to = "alessandro.mendes@allcredpromotora.com.br";
$from = "$email_empresa";
$subject = "Avaliação de operador chegando!";
$html = "
<html>
<body>
Avaliação de atendimento de operador<br><br>

Proposta: $num_proposta<br>
Operador(a): $nome_operador<br><br>

Nota do operador: $notadooperador<br>
Indicaria a Allcred?: $indicariaallcred<br>
Comentário: $comentario<br>
Data: $date<br>
hora: $hora<br>
</body>
</html>";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (@mail($to, $subject, $html, $headers)) {
//echo "Email enviado com sucesso para $email_operador!";
} else {
//echo "Ocorreu um erro durante o envio do email para $email_operador.";
}



echo "<script>

alert('A Allcred agradece sua avaliação! É de suma importância para melhorarmos a cada dia!!!...');
window.location = 'http://http://www.allcredpromotora.com.br/raiz/.php';

</script>";



?> 

