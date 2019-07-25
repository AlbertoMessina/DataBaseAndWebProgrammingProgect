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
            $name=$_POST["nome"];
            $surname=$_POST["cognome"];
            $telephone=$_POST["telefono"];
            $piva=$_POST["piva"];
            
			//Controllo se non ci sono sviluppatori con la partita iva inserita
			$check=1;
			$result_check=mysqli_query($connessione, "SELECT PIVA FROM SVILUPPATORE")
							or die("Query failed : " . mysqli_error($connessione));
			if (mysqli_num_rows($result_check) > 0) {
				while($row = mysqli_fetch_assoc($result_check)) {
					if($piva == $row["PIVA"]){
						$check=0;
					}
				} 
			}
			
            //Query: insert into sviluppatori if check == 1
			if($check==1){
			$result = mysqli_query($connessione, "INSERT INTO SVILUPPATORE VALUES ('$piva', '$name', '$surname', '$telephone');")
						or die("Query failed : " . mysqli_error($connessione)); 
            echo "<script> alert('Inserimento avvenuto con successo');</script>";
			echo "<script> window.location.assign('../gestione_sviluppatori.php'); </script>";
			}else{
				echo "<script> alert('La partita iva inserita appartiene già ad un altro sviluppatore');</script>";
				echo "<script> window.location.assign('../gestione_sviluppatori.php'); </script>";
			}
            mysqli_close($connessione);
        ?>
        
        <br><br>
        <a href="../gestione_sviluppatori.php"><button>Ritorna alla pagina precedente</button></a>
	</body>
</html>