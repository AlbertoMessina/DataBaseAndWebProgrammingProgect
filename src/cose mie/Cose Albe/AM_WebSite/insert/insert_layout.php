<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('../index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] == 3){
		echo "<script> alert('Permesso negato'); window.location.assign('../home.php'); </script>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inserimento moduli</title>
	</head>
	<body>
		<?php
			//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
			include("../db.php");
				
			//Connessione host
			$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
            
            //Selezione database
			mysqli_select_db($connessione,$db) or die("Could not select database");
            
            // Verifica se ci sono dati POST
			if(isset($_POST["pivaSviluppatore"]) && isset($_POST["moduli"]))
			{
				// Leggi dati
				$pivaSviluppatore = $_POST["pivaSviluppatore"];
				$moduli = $_POST["moduli"];
				// Inseriamo il layout
				mysqli_query($connessione, "INSERT INTO LAYOUT(COSTO_TOTALE, SVILUPPATORE) VALUES (0, '$pivaSviluppatore');") or die(mysqli_error($connessione));
				// Leggiamo l'id del layout inserito
				$idLayout = mysqli_insert_id($connessione);
				// Inseriamo tutti i moduli selezionati nel menu
				foreach($moduli as $idModulo){
					mysqli_query($connessione, "INSERT INTO COMPONENTE VALUES ('$idLayout', '$idModulo');");
				}
				echo "<script> alert('Inserimento avvenuto con successo');</script>";
				echo "<script> window.location.assign('../gestione_layout.php'); </script>";
			}
			
			
			
            mysqli_close($connessione);
        ?>
        
        <br><br>
        <a href="../gestione_layout.php"><button>Ritorna alla pagina precedente</button></a>
	</body>
</html>