<?php

// Controlla se i dati inseriti dall'utente corrispondo a quelli presenti nel database e se l'utente ha effettuato l'autentificazione
function query_login($mail, $password) {

	include '$Connessione.php';
	
	// Preleva i dati dell'utente
    $query_login = mysqli_query($connessione, "SELECT id, password, mail, tipologia, nome, cognome FROM utente WHERE mail = '".$mail."' AND password = '".$password."' AND autentificazione > 0");
	if(mysqli_num_rows($query_login) > 0) {
		
        // Salva i dati degli utenti in un arry e inizializza la variabile di login
        $record = mysqli_fetch_array($query_login);
		$record["login"] = 1;
		
		mysqli_close($connessione);
		return $record;
    }

	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

// Controlla se la mail è già presente nel database
function query_valida_mail($mail) {
	
	include '$Connessione.php';
	
	// Controlla se la mail coincide con una mail nel database
	$query_mail = mysqli_query($connessione,"SELECT mail FROM utente WHERE mail = '".$mail."'");
	if(mysqli_num_rows($query_mail) > 0) {
		mysqli_close($connessione);
		return false;
	}
	
	mysqli_close($connessione);
	return true;
}
// ------------------------------------------------------------------------------

// Inserisce un nuovo utente nel database
function query_inserimento_utente($nome, $cognome, $password, $mail, $tipologia) {
	
	include '$Connessione.php';
	
	// Inserisce un nuovo utente
    if(mysqli_query($connessione, "INSERT INTO utente (nome, cognome, password, mail, tipologia) VALUES('$nome','$cognome','$password', '$mail', '$tipologia')")) {
		
		// Seleziona l'id dell'utente inserito
		$id = mysqli_insert_id($connessione);
		mysqli_close($connessione);
		return $id;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Inserisce un nuovo sviluppatore nel database
function query_inserimento_sviluppatore($id, $nome, $cognome, $telefono, $p_iva) {
	
	include '$Connessione.php';
	
	// Inserisce un nuovo sviluppatore
    if(mysqli_query($connessione, "INSERT INTO sviluppatore (PIVA, NOME, COGNOME, TELEFONO, ID_UTENTE) VALUES('$p_iva','$nome','$cognome', '$telefono', '$id')")) {
		mysqli_close($connessione);
		return true;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Inserisce un nuovo cliente nel database
function query_inserimento_cliente($citta, $indirizzo, $telefono_cliente, $id) {
	
	include '$Connessione.php';
	
	// Inserisce un nuovo cliente
    if(mysqli_query($connessione, "INSERT INTO cliente (CITTA, INDIRIZZO, TELEFONO, ID_UTENTE) VALUES('$citta','$indirizzo','$telefono_cliente', '$id')")) {
		mysqli_close($connessione);
		return true;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Controlla se i dati inseriti corrispondono a quelli di registrazione
function query_conferma_registrazione($mail, $password) {

	include '$Connessione.php';
	
	// Controlla se i dati dell'utente sono corretti
    $query_controllo = mysqli_query($connessione, "SELECT id, password, mail, tipologia, nome, cognome FROM utente WHERE mail = '".$mail."' AND password = '".$password."'");
    if(mysqli_num_rows($query_controllo) > 0) {
		
		// Salva i dati dell'utente in un array
		$record = mysqli_fetch_array($query_controllo);
		
		if(query_setta_autentificazione($record["id"])) {
        
			// Salva la variabile di connessione nell'array dell'utente
			$record["login"] = 1;
		
			mysqli_close($connessione);
			return $record;
		}
    }

	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

// Setta l'autentificazione di un dato utente ad 1
function query_setta_autentificazione($id) {

	include '$Connessione.php';
	
	// Setta l'autentificazione di un dato utente ad 1
    if(mysqli_query($connessione, "UPDATE utente SET autentificazione = 1 WHERE id = '".$id."'")) {

		mysqli_close($connessione);
		return true;
    }

	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

// Inserisce un nuovo modulo nel database
function query_inserimento_modulo($nome, $funzione, $costo) {
	
	include '$Connessione.php';
    
	// Inserisce un modulo
	if(mysqli_query($connessione, "INSERT INTO modulo (NOME, FUNZIONE, COSTO) VALUES('$nome','$funzione', '$costo')")) {
		mysqli_close($connessione);
		return true;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona gli sviluppatori
function query_seleziona_sviluppatori() {
	
	include '$Connessione.php';
	
	// Seleziona gli sviluppatori
    if($query = mysqli_query($connessione, "SELECT * FROM sviluppatore")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona gli id degli utenti
function query_seleziona_id_utente() {
	include '$Connessione.php';
	
	// Seleziona gli id degli utenti
    if($query = mysqli_query($connessione, "SELECT id FROM utente WHERE tipologia = 0")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i codici dei clienti
function query_seleziona_id_cliente() {
	
	include '$Connessione.php';
	
	// Seleziona i codici dei clienti
    if($query = mysqli_query($connessione, "SELECT CODICE FROM cliente")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i moduli
function query_seleziona_moduli() {
	
	include '$Connessione.php';
    
	// Seleziona i moduli
	if($query = mysqli_query($connessione, "SELECT * FROM modulo")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i layout
function query_seleziona_layout() {
	
	include '$Connessione.php';
	
	// Seleziona i layout
    if($query = mysqli_query($connessione, "SELECT * FROM layout")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona la partita iva di un dato utente
function query_select_piva($id) {
	include '$Connessione.php';
	
	// Seleziona la partita iva di un dato utente
	if($query = mysqli_query($connessione, "SELECT PIVA FROM sviluppatore WHERE ID_UTENTE = '".$id."'")) {
		$record = mysqli_fetch_array($query);
		mysqli_close($connessione);
		return $record["PIVA"];
	}
	
	mysqli_close($connessione);
}
// ------------------------------------------------------------------------------

// Inserisce un nuovo layout
function query_inserimento_layout($sviluppatore, $modulo) {
	
	include '$Connessione.php';
	
	// Inizializzazione del costo totale
	$costo_totale = 0;
	
	// Ottiene il costo totale di tutti i moduli
	if($query_costo = mysqli_query($connessione, "SELECT COSTO, ID FROM modulo")) {
		
		while($record = mysqli_fetch_assoc($query_costo)) {
			
			$i = 0;
			
			// Scorre l'array dei moduli
			while(isset($modulo[$i])) {
				
				// Se il modulo coincide con il modulo inserito incremente il costo totale
				if($modulo[$i] == $record["ID"]) {
					$costo_totale += $record["COSTO"];
				}
				$i++;
			}
		}
	}
	else {
		mysqli_close($connessione);
		return false;
	}
	
	// Inserisce il layout
	if(mysqli_query($connessione, "INSERT INTO layout (SVILUPPATORE, COSTO_TOTALE) VALUES ('$sviluppatore', '$costo_totale')")) {
		
		// Seleziona l'id del layout inserito
		$id_layout = mysqli_insert_id($connessione);
		
		$i = 0;
		
		// Inserisce i moduli nella tabella dei moduli
		while(isset($modulo[$i])) {
			
			$id_modulo = $modulo[$i];
			
			// Inserisce la corrispondenza modulo-layout nella tabella componente
			mysqli_query($connessione, "INSERT INTO componente (ID_LAYOUT, ID_MODULO) VALUES ('$id_layout', '$id_modulo')");
			$i++;
		}
		
		mysqli_close($connessione);
		return true;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Modifica i dati di un dato sviluppatore
function query_aggiornamento_sviluppatore($p_iva, $nome, $cognome, $telefono) {
	
	include '$Connessione.php';
	
	// Modifica i dati di un dato sviluppatore
	if(mysqli_query($connessione, "UPDATE sviluppatore SET NOME = '".$nome."', COGNOME = '".$cognome."', TELEFONO = '".$telefono."' WHERE PIVA = '".$p_iva."'")) {
		$query = mysqli_query($connessione, "SELECT ID_UTENTE FROM sviluppatore WHERE PIVA = '".$p_iva."'");
		$row = mysqli_fetch_array($query);
		$id = $row["ID_UTENTE"];
		mysqli_close($connessione);
		return $id;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Modifica i dati di un dato modulo
function query_aggiornamento_modulo($id, $nome, $funzione, $costo) {
	
	include '$Connessione.php';
	
	// Modifica i dati di un dato modulo
	if(mysqli_query($connessione, "UPDATE modulo SET NOME = '".$nome."', FUNZIONE = '".$funzione."', COSTO = '".$costo."' WHERE ID = '".$id."'")) {
		mysqli_close($connessione);
		return true;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i layout di un dato sviluppatore
function query_layout_sviluppatore($sviluppatore) {
	
	include '$Connessione.php';
	
	// Seleziona i layout di un dato sviluppatore
	if($query = mysqli_query($connessione, "SELECT * FROM layout WHERE SVILUPPATORE = '".$sviluppatore."'")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i siti web di un cliente
function query_seleziona_siti($cliente) {
	
	include '$Connessione.php';
	
	// Seleziona i siti web di un cliente
	if($query = mysqli_query($connessione, "SELECT * FROM sito_web WHERE CLIENTE = '".$cliente."'")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i moduli di un layout
function query_seleziona_moduli_di_layout($layout) {
	
	include '$Connessione.php';
	
	// Seleziona i moduli di un layout
	if($query = mysqli_query($connessione, "SELECT m.ID as id, m.NOME as nome, m.FUNZIONE as funzione, m.COSTO as costo FROM componente c join modulo m on m.ID = c.ID_MODULO WHERE c.ID_LAYOUT = '".$layout."'")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i layout venduti da uno sviluppatore
function query_seleziona_layout_venduti($id_utente) {
	
	include '$Connessione.php';
	
	// Seleziona i layout venduti da uno sviluppatore
	if($query = mysqli_query($connessione, "SELECT l.ID as id, l.COSTO_TOTALE as costo, w.URL as url FROM ((utente u join sviluppatore s on s.ID_UTENTE = u.id) join layout l on l.SVILUPPATORE = s.PIVA) join sito_web w on w.LAYOUT = l.ID WHERE u.id = '".$id_utente."'")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona i siti web commissionati da un cliente
function query_seleziona_siti_commissionati($id_utente) {
	
	include '$Connessione.php';
	
	// Seleziona i siti web commissionati da un cliente
	if($query = mysqli_query($connessione, "SELECT s.CODICE as codice, s.URL as url, s.DATA_PUBBLICAZIONE as data_p, s.LAYOUT as layout FROM (utente u join cliente c on u.id = c.ID_UTENTE) join sito_web s on s.CLIENTE = c.CODICE WHERE u.id = '".$id_utente."'")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;
}
// ------------------------------------------------------------------------------

// Seleziona sviluppatore da una data partita iva
function query_seleziona_sviluppatore_piva($piva) {
	
	include '$Connessione.php';
	
	// Seleziona sviluppatore da una data partita iva
	if($query = mysqli_query($connessione, "SELECT * FROM sviluppatore WHERE PIVA = '".$piva."' LIMIT 1")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

// Seleziona modulo da una dato id
function query_seleziona_modulo_id($id) {
	
	include '$Connessione.php';
	
	// Seleziona modulo da una dato id
	if($query = mysqli_query($connessione, "SELECT * FROM modulo WHERE ID = '".$id."' LIMIT 1")) {
		mysqli_close($connessione);
		return $query;
	}
	
	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

// Selezione il nome e il cognome di un dato utente
function query_selezione_dati_utente($id) {
	
	include '$Connessione.php';
	
	// Seleziona il nome e il cognome di un dato utente
	if($query = mysqli_query($connessione, "SELECT nome, cognome FROM utente WHERE id = '".$id."'")) {
		$dati = mysqli_fetch_array($query);
		mysqli_close($connessione);
		return $dati;
	}
	
	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

// Seleziona l'id dell'utente inserito
function query_nuovo_id_utente() {
	
	include '$Connessione.php';
	
	// Seleziona l'id dell'utente inserito
	if($query = mysqli_query($connessione, "SELECT MAX(id) as id FROM utente")) {
		$id = mysqli_fetch_array($query);
		mysqli_close($connessione);
		return $id;
	}
	
	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

// Aggiorna il dati di un dato utente
function query_aggiornamento_utente($id, $nome, $cognome) {
	
	include '$Connessione.php';
	
	// Aggiorna il dati di un dato utente
	if(mysqli_query($connessione, "UPDATE utente SET nome = '".$nome."', cognome = '".$cognome."' WHERE id = '".$id."'")) {
		mysqli_close($connessione);
		return true;
	}
	
	mysqli_close($connessione);
	return false;

}
// ------------------------------------------------------------------------------

?>