<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('../index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] != 1){
		echo "<script> alert('Permesso negato'); window.location.assign('../home.php'); </script>";
	}
?>
<?php
	//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
	include("../db.php");
				
	//Connessione host
	$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
	//Selezione database
	mysqli_select_db($connessione,$db) or die("Could not select database");
				
	//Prendo i dati passati
	$codice = $_POST["codice"];
    
	/*Query: delete from sito web where CODICE = codice. Nota che potrei effettuare solo la cancellazione del sito Web e impostare
	 *il set null on delete dal db, ma per mantenere il db così come ce lo hanno dato ho preferito farlo qui */
	$result1 = mysqli_query($connessione, "delete from VISITA where SITO = $codice;")
			or die("Query failed : " . mysqli_error($connessione));
	$result2 = mysqli_query($connessione, "delete from VISITATORE where IP =any(select IP from VISITA where sito = '$codice');")
			or die("Query failed : " . mysqli_error($connessione));
	$result3 = mysqli_query($connessione, "delete from SITO_WEB where CODICE = $codice;")
			or die("Query failed : " . mysqli_error($connessione));
				
	mysqli_close($connessione);
?>