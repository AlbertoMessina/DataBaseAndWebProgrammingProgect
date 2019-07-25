<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('../index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] != 1){
		echo "<script> alert('Permesso negato'); window.location.assign('../home.php'); </script>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inserimento sviluppatori</title>
	</head>
	<body>
		<?php
			//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
			include("../db.php");
				
			//Connessione host
			$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
            
            //Selezione database
			mysqli_select_db($connessione,$db) or die("Could not select database");
            
            //Prendo i parametri passati dal form
            $citta=$_POST["citta"];
            $indirizzo=$_POST["indirizzo"];
            $telephone=$_POST["telefono"];
            
            //Query: insert into cliente
			$result = mysqli_query($connessione, "INSERT INTO CLIENTE(CITTA,INDIRIZZO,TELEFONO,N_SITI,SPESA_TOTALE) VALUES ('$citta', '$indirizzo', '$telephone', 0, 0);")
						or die("Query failed : " . mysqli_error($connessione)); 
            echo "<script> alert('Inserimento avvenuto con successo');</script>";
			echo "<script> window.location.assign('../gestione_clienti.php'); </script>";
			
            mysqli_close($connessione);
        ?>
        
        <br><br>
        <a href="../gestione_clienti.php"><button>Ritorna alla pagina precedente</button></a>
	</body>
</html>