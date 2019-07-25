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
            
            //Prendo i parametri passati dal form
            $name=$_POST["nome"];
            $funzione=$_POST["funzione"];
            $costo=$_POST["costo"];
            
            //Query: insert into sviluppatori
			$result = mysqli_query($connessione, "INSERT INTO MODULO(NOME,FUNZIONE,COSTO) VALUES ('$name', '$funzione', '$costo');")
						or die("Query failed : " . mysqli_error($connessione)); 
            echo "<script> alert('Inserimento avvenuto con successo');</script>";
			echo "<script> window.location.assign('../gestione_layout.php'); </script>";
			
            mysqli_close($connessione);
        ?>
        
        <br><br>
        <a href="../gestione_layout.php"><button>Ritorna alla pagina precedente</button></a>
	</body>
</html>