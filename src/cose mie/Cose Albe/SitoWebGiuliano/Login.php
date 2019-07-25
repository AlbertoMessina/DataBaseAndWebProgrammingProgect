<!DOCTYPE html>

<?php

include 'struct/$MasterPage.php';

// Verifica se è stato premuto il pulsante submit
if(isset($_POST['submit'])) {
	
    // Elaborazione delle variabili passate tramite metodo POST
    $mail = $_POST['mail'];   
    $password = $_POST['password'];
	
	// Verifica la validità dei dati inseriti
	$risultato = login_utente($mail, $password);
	if($risultato) {
        alert("Login avvenuto con successo");
		echo "<meta http-equiv='Refresh' content='0; url=Account.php'>";
    }
	else {
        alert("Login fallito");
		echo "<meta http-equiv='Refresh' content='0'>";
	}
	
	exit;
}

$template = new formattazione;
$template->start();

// Verifica la presenza dei cookie
$var_session = controllo_cookie();

?>

<html>
<head>
    <title>Login</title>
</head>
<body>
	
<?php

// Se l'utente non è loggato
if($var_session["login"] == 0) {
    ?>
	
<!-- Form login -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="row">
		
    	<!-- Colonna vuota -->
		<div class="col-xs-1 col-md-4 col-sm-3 col-lg-4"></div>
		<!-- Fine colonna vuota -->
			
		<!-- Colonna login -->
		<div class="col-xs-10 col-md-4 col-sm-6 col-lg-4">

			<!-- Titolo -->
			<div style="margin-bottom: 0px;" class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<h2><b>Accedi</b></h2>
			</div>
			<!-- Fine titolo -->

			<!-- Input mail -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
    			<label for="mail">Email</label>  
				<input type="mail" name="mail" class="form-control" id="mail" placeholder="Inserisci la mail..." required>    
			</div>
			<!-- Fine input mail -->
				
			<!-- Input password -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Inserisci la password..." required>    
			</div>
			<!-- Fine input password -->
				
			<!-- Bottoni -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<button id="submit" type="submit" name="submit" class="btn btn-primary">Login</button>
				o se sei nuovo
				<a href="Registrazione.php" id="registrati" class="btn btn-primary">Registrati</a>
			</div>
			<!-- Fine bottoni -->
		
		</div>
		<!-- Fine colonna login -->

		<!-- Colonna vuota -->
		<div class="col-xs-1 col-md-4 col-sm-3 col-lg-4"></div>
		<!-- Fine colonna vuota -->

	</div>
</form>

<!-- Fine form login -->

<!-- Riga vuota -->
<div class="col-xs-12" style="margin-top: 30px; width: 100%;">
	<br>
	<br>
</div>
<!-- Fine riga vuota -->

<?php

}

// Se l'utente è loggato reindirizza alla pagina dell'account
else {
    echo "<meta http-equiv='Refresh' content='0; url=Account.php'>";	
}

?>

</body>
</html>