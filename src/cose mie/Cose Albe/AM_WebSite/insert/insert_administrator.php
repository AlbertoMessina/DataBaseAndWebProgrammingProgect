<?php
	/* PAGINA PER INSERIRE L'AMMINISTATORE SENZA USARE IL DB. OVVIAMENTE NON E' UNA PAGINA DEL SITO (è solo per praticità che la tengo)*/

	//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
	include("../db.php");
				
	//Connessione host
	$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
	//Selezione database
	mysqli_select_db($connessione,$db) or die("Could not select database");
				
	//Inserisco un amministratore
	$tipologia=1;
	$username='administrator';
	$password='demo'; $password = md5 ($password);
	$nome='Alessandro';
	$cognome='Messina';
	$mail='alessandromessina95@hotmail.com';
	$telefono='3496795227';
				
	//Query: insert into user 
	$result = mysqli_query($connessione, "INSERT INTO UTENTE(USERNAME, PASSWORD, NOME, COGNOME, MAIL, TIPOLOGIA, TELEFONO) VALUES ('$username', '$password', '$nome', '$cognome', '$mail', '$tipologia', '$telefono');")
			or die("Query failed : " . mysqli_error($connessione));
	echo "<script> alert('Registrazione avvenuta con successo');</script>";
	echo "<script> window.location.assign('../index.html'); </script>";
				
	mysqli_close($connessione);
?>