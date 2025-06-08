<html>
<head>
   <title></title>
</head>
<body>


<?php
/* Script para listar arquivos do diretório, com os respectivos links */

$local = "G:/";
//chmod ("c:\Meus Documentos",0777);

 
$path="$local"; 
$diretorio=dir($path); 

echo "Diretorio ".$path.":<br><br>"; 

while ($arquivo = $diretorio->read()) 
{ 
    echo $arquivo."<br>"; 
} 
$diretorio->close(); 


?>


</body>
</html>