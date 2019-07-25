<?php

include '../struct/$MasterPage.php';

if(isset($_POST["p_iva"])) {
	
	// Elaborazione dei parametri passati tramite metodo POST
	$p_iva = $_POST["p_iva"];
	$nome = $_POST["nome"];
	$cognome = $_POST["cognome"];
	$telefono = $_POST["telefono"];
	$mail = $_POST["mail"];
	$password = $_POST["password"];
	
	// Controllo delle stringhe
	controllo_stringa_jquery($p_iva);
	controllo_stringa_jquery($nome);
	controllo_stringa_jquery($cognome);
	controllo_stringa_jquery($telefono);
	controllo_stringa_jquery($password);
	
	// Controllo della mail
	if(!chkEmail($mail)) {
		echo "Mail non valida!";
	}
	
	// Codifica della password
	$password = sha1($password);
	
	// Inserisce un record nella tabella utente
	if(query_inserimento_utente($nome, $cognome, $password, $mail, 1)) {
		// Seleziona l'id dell'utente inserito
		if($id = query_nuovo_id_utente()) {
			// Setta l'autentificazione a 1 del nuovo utente
			if(query_setta_autentificazione($id["id"])) {
				// Inserisce il nuovo sviluppatore
				if(query_inserimento_sviluppatore($id["id"], $nome, $cognome, $telefono, $p_iva)) {
					echo "Sviluppatore aggiunto con successo!";
				}
				else {
					echo "Inserimento fallito!";
				}
			}
		}
	}
	
}

?>