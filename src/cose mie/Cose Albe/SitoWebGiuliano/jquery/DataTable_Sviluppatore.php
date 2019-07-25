<?php

include '../struct/$Query.php';
include '../struct/$Funzioni.php';

$query = query_seleziona_sviluppatori();

$tabella = "";

while($row = mysqli_fetch_assoc($query)) {
			
	$update = '<button type=\"button\" name=\"update\" id=\"'.$row["PIVA"].'\" class=\"btn btn-warning btn-xs update\"><span class=\"glyphicon glyphicon-edit\"></span></button>';
			
	$tabella.='{
		"p_iva":"'.$row['PIVA'].'",
		"nome":"'.$row['NOME'].'",
		"cognome":"'.$row['COGNOME'].'",
		"telefono":"'.$row['TELEFONO'].'",
		"update":"'.$update.'"
	},';
	
}
	
// Elimina la virgola finale
$tabella = substr($tabella,0, strlen($tabella) - 1);
	
echo '{"data":['.$tabella.']}';
	
?>