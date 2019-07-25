<!DOCTYPE html>

<?php

include 'struct/$MasterPage.php';

$template = new formattazione();
$template->start();

?>

<html>
<head>
    <title>Registrazione</title>
</head>
<body>

<!-- Form registrazione -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="row">
		
		<!-- Colonna vuota -->
		<div class="col-xs-1 col-md-3 col-sm-3 col-lg-3"></div>
		<!-- Fine colonna vuota -->
			
		<!-- Colonna registrazione -->
		<div class="col-xs-10 col-md-6 col-sm-6 col-lg-6">
			
			<!-- Titolo -->
			<div style="margin-bottom: 0px;" class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<h2><b>Registrati</b></h2>
			</div>
			<!-- Fine titolo -->
			
			<!-- Input nome -->
			<div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
				<label for="nome">Nome</label>
				<input type="text" name="nome" class="form-control" id="nome" placeholder="Inserisci il nome..." required>
			</div>
			<!-- Fine input nome -->
			
			<!-- Input cognome -->
			<div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
				<label for="cognome">Cognome</label>
				<input type="text" name="cognome" class="form-control" id="cognome" placeholder="Inserisci il cognome..." required>
			</div>
			<!-- Fine input cognome -->
			
			<!-- Input citta -->
			<div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
				<label for="citta">Citta</label>
				<input type="text" name="citta" class="form-control" id="citta" placeholder="Inserisci la città..." required>
			</div>
			<!-- Fine input citta -->
			
			<!-- Input indirizzo -->
			<div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
				<label for="indirizzo">Indirizzo</label>
				<input type="text" name="indirizzo" class="form-control" id="indirizzo" placeholder="Inserisci l'indirizzo..." required>
			</div>
			<!-- Fine input indirizzo -->
			
			<!-- Input telefono -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<label for="mail">Telefono</label>  
				<input type="text" name="telefono_cliente" class="form-control" id="telefono_cliente" placeholder="Inserisci il telefono..." required>    
			</div>
			<!-- Fine input telefono -->
			
			<!-- Input mail -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<label for="mail">Email</label>  
				<input type="email" name="mail" class="form-control" id="mail" placeholder="Inserisci la mail..." required>    
			</div>
			<!-- Fine input mail -->
			
			<!-- Input password -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<label for="mail">Password</label>  
				<input type="password" name="password" class="form-control" id="mail" placeholder="Inserisci la password..." required>    
			</div>
			<!-- Fine input password -->
			
			<!--- Checkbox sviluppatore -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<label><input type="checkbox" id="sviluppatore" name="sviluppatore" style="margin-right: 10px;" name="sviluppatore">Sei uno sviluppatore?</label>
			</div>
			<!--- Fine checkbox sviluppatore -->
			
			<!-- Dati sviluppatore -->
			<div id="input_sviluppatore" style="display: none;">
				
				<!-- Input partita iva -->
				<div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
					<label for="p_iva">Partita IVA</label>
					<input type="text" name="p_iva" class="form-control" id="p_iva" placeholder="Inserisci la partita IVA...">
				</div>
				<!-- Fine input partita iva -->
			
				<!-- Input telefono -->
				<div class="form-group col-xs-12 col-md-6 col-sm-6 col-lg-6">
					<label for="telefono">Telefono</label>
					<input type="text" name="telefono" class="form-control" id="telefono" placeholder="Inserisci il telefono...">
				</div>
				<!-- Fine input telefono -->
				
			</div>
			<!-- Fine dati sviluppatore -->
			
			<!-- Bottoni -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<button id="submit" type="submit" style="margin-bottom: 10px;" name="submit" class="btn btn-primary">Registrati</button>
			    o effettua il
			    <a id="login" style="margin-bottom: 10px;" class="btn btn-info" href="Login.php">Login</a>
				<br>
			</div>
			<!-- Fine bottoni -->
			
		</div>
		<!-- Fine colonna registrazione -->
		
		<!-- Colonna vuota -->
		<div class="col-xs-1 col-md-3 col-sm-3 col-lg-3"></div>
		<!-- Fine colonna vuota -->
		
	</div>
</form>
<!-- Fine form registrazione -->

<!-- Riga vuota -->
<div class="col-xs-12" style="margin-top: 30px; width: 100%;">
	<br>
	<br>
</div>
<!-- Fine riga vuota -->

</body>
</html>

<?php

// Verifica se è stato premuto il pulsante submit
if(isset($_POST['submit'])) {
	
    // Elaborazione delle variabili passate tramite metodo POST
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
	$citta = $_POST['citta'];
	$indirizzo = $_POST['indirizzo'];
	$telefono_cliente = $_POST['telefono_cliente'];
	
	// Verifica se l'utente si sta registrando come sviluppatore
	if(isset($_POST["sviluppatore"])) {
		// Verifica se i campi dello sviluppatore sono stati riempiti
		if($_POST["p_iva"] == "" || $_POST["telefono"] == "") {
			alert("Devi riempire tutti i campi per poter continuare!");
			echo "<meta http-equiv='Refresh' content='0'>";
			exit;
		}
		$sviluppatore = 1;
		$p_iva = $_POST["p_iva"];
		$telefono = $_POST["telefono"];
	}
	else {
		$sviluppatore = 0;
		$p_iva = 0;
		$telefono = 0;
	}
	
	// Funzione per la registrazione dell'utente
	if(registrazione_utente($nome, $cognome, $mail, $password, $citta, $indirizzo, $telefono_cliente, $sviluppatore, $p_iva, $telefono)) {
		alert("Registrazione avvenuta con successo. Ti abbiamo inviato una mail contenente i dati per effettuare l'autentificazione!");
	}
	else {
		alert("Registrazione Fallita!");
	}
	
	echo "<meta http-equiv='Refresh' content='0'>";
    exit;
	
}

?>