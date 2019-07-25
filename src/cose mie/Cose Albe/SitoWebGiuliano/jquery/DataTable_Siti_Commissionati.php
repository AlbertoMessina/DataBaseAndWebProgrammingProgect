<?php

include '../struct/$Query.php';
include '../struct/$Funzioni.php';

$var_session = controllo_cookie();

if($var_session["login"] == 1) {

$query = query_seleziona_siti_commissionati($var_session["id"]);

$tabella = "";

while($row = mysqli_fetch_assoc($query)) {
			
	$tabella.='{
		"codice":"'.$row['codice'].'",
		"url":"'.$row['url'].'",
		"data":"'.$row['data_p'].'",
		"layout":"'.$row["layout"].'"
	},';
	
}
	
// Elimina la virgola finale
$tabella = substr($tabella,0, strlen($tabella) - 1);
	
echo '{"data":['.$tabella.']}';

}

?>