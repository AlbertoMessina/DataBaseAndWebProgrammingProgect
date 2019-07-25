<?php

include '../struct/$Query.php';
include '../struct/$Funzioni.php';

$query = query_seleziona_moduli();

$tabella = "";

while($row = mysqli_fetch_assoc($query)) {
		
	$update = '<button type=\"button\" name=\"update\" id=\"'.$row["ID"].'\" class=\"btn btn-warning btn-xs update_modulo\"><span class=\"glyphicon glyphicon-edit\"></span></button>';
		
	$tabella.='{
		"id":"'.$row['ID'].'",
		"nome":"'.$row['NOME'].'",
		"funzione":"'.$row['FUNZIONE'].'",
		"costo":"'.$row['COSTO'].'",
		"update":"'.$update.'"
	},';
	
}
	
// Elimina la virgola finale
$tabella = substr($tabella,0, strlen($tabella) - 1);
	
echo '{"data":['.$tabella.']}';
	
?>