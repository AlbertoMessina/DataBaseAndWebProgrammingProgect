<?php

include '../struct/$Query.php';
include '../struct/$Funzioni.php';

$query = query_seleziona_layout();

$tabella = "";

while($row = mysqli_fetch_assoc($query)) {
			
	$tabella.='{
		"id":"'.$row['ID'].'",
		"costo_totale":"'.$row['COSTO_TOTALE'].'",
		"sviluppatore":"'.$row['SVILUPPATORE'].'"
	},';
	
}
	
// Elimina la virgola finale
$tabella = substr($tabella,0, strlen($tabella) - 1);
	
echo '{"data":['.$tabella.']}';
	
?>