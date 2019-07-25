<?php

// Funzione per la gestione degli errori
function alert($msg) {
	echo '<script type="text/javascript">alert("'.$msg.'")</script>';
}
// ------------------------------------------------------------------------------

// Funzione per il controllo sul cookie
function controllo_cookie() {
	
	// Controlla se esiste il cookie
	if(isset($_COOKIE['41pfosjwgnw4ifj22232fef39n'])) {
	   
	   // Splitta la stringa dove incontra il marcatore "_&&_"
	   $tmp = split("_&&_", $_COOKIE['41pfosjwgnw4ifj22232fef39n']);
	   
	   // Se il cookie non è corretto viene settata a zero la variabile di controllo per il login
	   if(count($tmp) != 2) {
	      $var_session["login"] = 0;
		  return $var_session;
	   }
	   else {
	      // Controlla se gli identificatori sono presenti nel database
	      $var_session = query_login($tmp[0], $tmp[1]);
		  return $var_session;
	   }
	}
	
	// Se non vi è alcun cookie
	else {
	   $var_session["login"] = 0;
	   return $var_session;
	}
}
// ------------------------------------------------------------------------------

// Funzione per il controllo delle stringhe
function controllo_stringa($stringa) {

	// Rimuove i tags e i caratteri speciali dalla stringa
	$stringa = filter_var($stringa, FILTER_SANITIZE_STRING);
  
    // Rimuoe "<>& e i caratteri ASCII con valore sotto i 32 dalla stringa
	$stringa = filter_var($stringa, FILTER_SANITIZE_SPECIAL_CHARS);
  
    // Rimuove gli spazi dall'inizio e dalla fine della stringa
	trim($stringa);
  
    // Espressione regolare per il controllo dei caratteri consentiti
	if(!preg_match('/^[A-Z0-9a-z \'-]+$/i', $stringa)) {
		alert("Stringa non valida!");
		?>
		<script type="text/javascript">window.history.back();</script>
	    <?php
		exit;
	}
}
// ------------------------------------------------------------------------------

// Funzione per il controllo delle stringhe
function controllo_stringa_jquery($stringa) {

	// Rimuove i tags e i caratteri speciali dalla stringa
	$stringa = filter_var($stringa, FILTER_SANITIZE_STRING);
  
    // Rimuoe "<>& e i caratteri ASCII con valore sotto i 32 dalla stringa
	$stringa = filter_var($stringa, FILTER_SANITIZE_SPECIAL_CHARS);
  
    // Rimuove gli spazi dall'inizio e dalla fine della stringa
	trim($stringa);
  
    // Espressione regolare per il controllo dei caratteri consentiti
	if(!preg_match('/^[A-Z0-9a-z \'-]+$/i', $stringa)) {
		echo("Stringa non valida!");
		exit;
	}
}
// ------------------------------------------------------------------------------

// Funzione per il controllo della password
function controllo_password($password) {
	
	// Controlla la validità della stringa
	controllo_stringa($password);
	
    // Controlla se la password è maggiore di 7 caratteri
    if(strlen($password) < 8) {
        return false;
    }
	return true;
}
// ------------------------------------------------------------------------------

// Funzione per la validazione del login
function login_utente($mail, $password) {
	
	// Controlla la validità della email
    if(!chkEmail($mail)) {
        return false;
    }
	
	// Controlla la validità della password
	if(!controllo_password($password)) {
		return false;
	}
    
    // Codifica della password in formato sha1
    $password = sha1($password);
	
    // Controlla se i dati forniti dall'utente corrispondono a quelli presenti nel database e se è stata effettuata l'autentificazione 
    $var_session = query_login($mail, $password);
    if($var_session["login"] == 1) {
        // Creazione del cookie
        $time_cookie = 60 * 60 * 24 * 1; // Secondi*Minuti*Ore*Giorni
        setcookie("41pfosjwgnw4ifj22232fef39n", $var_session["mail"].'_&&_'.$var_session["password"], time()+$time_cookie);
        return true;
    }
    else {
        return false;
    }
}
// ------------------------------------------------------------------------------

function chkEmail($mail) {
	
	// Elimina gli spazi dall'inizio e dalla fine della stringa
	$mail = trim($mail);
	
    // Converte tutti i caratteri maiuscoli in minuscoli
    $mail = strtolower($mail);

	// Viene controllonato che vi sia una sola @ nella stringa
	$num_at = count(explode('@', $mail)) - 1;
	if($num_at != 1) {
		return false;
	}

    // Controlla se la stringa rispetta il formato di una mail
    $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);

    // Viene controllata la lunghezza della stringa
    if(strpos($mail, '@') < 4 || strpos($mail, '@') > 64) {
        return false;
    }

	// Espressione regolare per il controllo della stringa
	if(!preg_match( '/^[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}$/', $mail)) {
		return false;
	}

	return true;
}
// ------------------------------------------------------------------------------

// Funzione per la gestione della registrazione di un utente
function registrazione_utente($nome, $cognome, $mail, $password, $citta, $indirizzo, $telefono_cliente, $sviluppatore, $p_iva, $telefono) {
	
	// Controlla la validità delle stringhe
    controllo_stringa($nome);
    controllo_stringa($cognome);

	// Controlla la validità della password
    if(!controllo_password($password)) {
        return false;
    }
    
    // Codifica della password in formato sha1
    $password_codificata = sha1($password);

    // Controlla la validità della email
    if(!chkEmail($mail)) {
        return false;
    }

    // Controlla se la mail è già presente nel database
    if(!query_valida_mail($mail)) {
        return false;
    }
	
	// Controlla se è uno sviluppatore
	if($sviluppatore) {
		$tipologia = 1;
	}
	else {
		$tipologia = 0;
	}

    // Query di inserimento del nuovo utente
    if($id = query_inserimento_utente($nome, $cognome, $password_codificata, $mail, $tipologia)) {
        
        // Invio della mail di autentificazione
		$headers = "From: noreply@creazione_sito.it\nreply-To: noreply\r\n";
        $subject = "Conferma la tua iscrizione.";
        $messaggio = "Ti ringraziamo per la tua iscrizione.\n";
        $messaggio .= "Il tuo Nome è: ".$nome."\n";
        $messaggio .= "La tuo Cognome è: ".$cognome."\n";
        $messaggio .= "La tua Password è: ".$password."\n";
        $messaggio .= "Per confemare la tua registrazione vai alla pagina http://localhost/Basi_di_Dati/Conferma_Registrazione.php";
        mail($mail, stripslashes($subject), stripslashes($messaggio), $headers);
		
		// Se è uno sviluppatore viene inserito nella tabella sviluppatore
		if($sviluppatore) {
			// Controlla la validità delle stringhe
			controllo_stringa($p_iva);
			controllo_stringa($telefono);
			
			// Effettua l'inserimento dello sviluppatore
			if(query_inserimento_sviluppatore($id, $nome, $cognome, $telefono, $p_iva)) {
				return true;
			}
			// Errore nella query
			else {
				return false;
			}
		}
		// Se non è uno sviluppatore viene inserito nella tabella cliente
		else {
			// Controlla la validità delle stringhe
			controllo_stringa($citta);
			controllo_stringa($indirizzo);
			controllo_stringa($telefono_cliente);
			
			// Effettua l'inserimento del cliente
			if(query_inserimento_cliente($citta, $indirizzo, $telefono_cliente, $id)) {
				return true;
			}
			// Errore nella query
			else {
				return false;
			}
		}
		
		return true;
    }
	// Errore nella query
    else {
        return false;
    }
}
// ------------------------------------------------------------------------------

// Funzione per la conferma della registrazione
function conferma_registrazione($mail, $password) {
	
    // Controlla la validità della mail
    if(!chkEmail($mail)) {
       return false;
    }

    // Controlla la validità della password
    if(!controllo_password($password)) {
        return false;
    }
   
    // Codifica della password in formato sha1
    $password = sha1($password);

	// Verifica se i dati inseriti sono presenti nel database
    $record = query_conferma_registrazione($mail, $password);
	if(isset($record["id"])) {
		return true;
    }
    else {
		return false;
    }
}
// ------------------------------------------------------------------------------

?>