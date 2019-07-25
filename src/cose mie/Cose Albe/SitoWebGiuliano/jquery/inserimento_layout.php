<?php

include '../struct/$MasterPage.php';

if(isset($_POST["sviluppatore_layout"])) {
	
	// Elaborazione dei parametri passati tramite metodo POST
	$sviluppatore = $_POST["sviluppatore_layout"];

	$moduli = $_POST["checkbox_value"];
	$modulo = split("_", $moduli);
 
	if(query_inserimento_layout($sviluppatore, $modulo)) {
		echo "Layout inserito con successo!";
	}
	else {
		echo "Inserimento fallito!";
	}
	
}

?>