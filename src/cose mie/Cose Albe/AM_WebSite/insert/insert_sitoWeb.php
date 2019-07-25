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
	$url = $_POST["url"];
    $dataPubblicazione = $_POST["dataP"];
    $idCliente = $_POST["idCliente"];
    $idLayout = $_POST["idLayout"];
    
    
	//Query: insert into Sito Web 
	$result = mysqli_query($connessione, "INSERT INTO SITO_WEB(URL, DATA_PUBBLICAZIONE, CLIENTE, LAYOUT) VALUES ('$url', '$dataPubblicazione', '$idCliente', '$idLayout');")
			or die("Query failed : " . mysqli_error($connessione));
				
	mysqli_close($connessione);
?>