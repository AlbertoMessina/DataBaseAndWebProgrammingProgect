<?php

include '../struct/$MasterPage.php';

if(isset($_POST["nome_modulo"])) {
	
	// Elaborazione dei parametri passati tramite metodo POST
	$nome = $_POST["nome_modulo"];
	$funzione = $_POST["funzione"];
	$costo = $_POST["costo"];
	
	// Controllo delle stringhe
	controllo_stringa_jquery($nome);
	controllo_stringa_jquery($funzione);
	controllo_stringa_jquery($costo);	
	
	if(query_inserimento_modulo($nome, $funzione, $costo)) {
		echo "Modulo aggiunto con successo!";
	}
	else {
		echo "Inserimento fallito!";
	}
	
}

?>