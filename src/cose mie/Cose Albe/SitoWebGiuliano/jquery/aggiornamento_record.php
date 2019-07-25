<?php

include '../struct/$MasterPage.php';

// Aggiornamento sviluppatore
if(isset($_POST["p_iva_h"])) {

	// Elaborazione della variabili passate tramite metodo post
	$p_iva_l = $_POST["p_iva_h"];
	$nome_l = $_POST["nome_u"];
	$cognome_l = $_POST["cognome_u"];
	$telefono_l = $_POST["telefono_u"];
	
	// Controllo delle stringhe
	controllo_stringa_jquery($nome_l);
	controllo_stringa_jquery($cognome_l);
	controllo_stringa_jquery($telefono_l);
	
	if($id = query_aggiornamento_sviluppatore($p_iva_l, $nome_l, $cognome_l, $telefono_l)) {
		if(query_aggiornamento_utente($id, $nome_l, $cognome_l)) {
			echo "Aggiornamento eseguito con successo!";
		}
	}
	else {
		echo "Aggiornamento fallito!";
	}

}

// Aggiornamento modulo
if(isset($_POST["id_h"])) {

	// Elaborazione della variabili passate tramite metodo post
	$id_m = $_POST["id_h"];
	$nome_m = $_POST["nome_m"];
	$funzione_m = $_POST["funzione_m"];
	$costo_m = $_POST["costo_m"];

	// Controllo delle stringhe
	controllo_stringa_jquery($nome_m);
	controllo_stringa_jquery($funzione_m);
	controllo_stringa_jquery($costo_m);
	
	if(query_aggiornamento_modulo($id_m, $nome_m, $funzione_m, $costo_m)) {
		echo "Aggiornamento eseguito con successo!";
	}
	else {
		echo "Aggiornamento fallito!";
	}

}

?>