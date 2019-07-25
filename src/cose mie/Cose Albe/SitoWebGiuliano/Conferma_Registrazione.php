<!DOCTYPE html>
   
<?php

include 'struct/$MasterPage.php';

$template = new formattazione();
$template->start();

?>

<html>
<body>

<!-- Form conferma registrazione -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="row">
	
		<!-- Colonna vuota -->
		<div class="col-xs-1 col-md-4 col-sm-3 col-lg-4"></div>
		<!-- Fine colonna vuota -->
			
		<!-- Colonna conferma registrazione -->
		<div class="col-xs-10 col-md-4 col-sm-6 col-lg-4">
			
			<!-- Titolo -->
			<div style="margin-bottom: 0px;" class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<h2><b>Conferma Registrazione</b></h2>
			</div>
			<!-- Fine titolo -->
			
			<!-- Input mail -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<label for="mail">Mail</label>
				<input type="email" name="mail" class="form-control" id="mail" placeholder="Inserisci la mail..." required>
			</div>
			<!-- Fine input mail -->
		
			<!-- Input password -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<label for="password">Password</label>  
				<input type="password" name="password" class="form-control" id="password" placeholder="Inserisci la password..." required>    
			</div>
			<!-- fine input password -->
			
			<!-- Bottone -->
			<div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<button id="submit" type="submit" name="submit" class="btn btn-primary">Conferma</button>
			</div>
			<!-- Fine bottone -->
			
		</div>
		<!-- Fine colonna conferma registrazione -->
		
		<!-- Colonna vuota -->
		<div class="col-xs-1 col-md-4 col-sm-3 col-lg-4"></div>
		<!-- Fine colonna vuota -->
		
	</div>
</form>
<!-- Fine form conferma registrazione -->

<!-- Riga vuota -->
<div class="col-xs-12" style="margin-top: 30px; width: 100%;">
	<br>
	<br>
</div>
<!-- Fine riga vuota -->

</body>
</html>

<?php

// Verifica se è stato premuto il tasto submit
if(isset($_POST['submit'])) {

	// Elaborazione delle variabili passate tramite metodo POST
    $mail = $_POST['mail'];
    $password = $_POST['password'];
	
	// Conferma i dati inseriti e, in caso positivo, effettua l'autentificazione
	if(conferma_registrazione($mail, $password)) {
		alert("Autentificazione effettuata con successo!");
		echo "<meta http-equiv='Refresh' content='0; url=index.php'>";
	}
	else {
		alert("Autentificazione fallita!");
		echo "<meta http-equiv='Refresh' content='0'>";
	}
}

?>