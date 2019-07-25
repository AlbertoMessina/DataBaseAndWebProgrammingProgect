<?php
	//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
	include("db.php");
				
	//Connessione host
	$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
	//Selezione database
	mysqli_select_db($connessione,$db) or die("Could not select database");
				
	//Prendo i dati passati
	$codice = $_POST["codice"];
    
	//Query: delete from cliente where CODICE = codice
	$result = mysqli_query($connessione, "delete from CLIENTE where CODICE = $codice;")
			or die("Query failed : " . mysqli_error($connessione));
				
	mysqli_close($connessione);
?>