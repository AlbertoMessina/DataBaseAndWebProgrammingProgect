    <?php
			//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
			include("db.php");
			
			//Connessione host
			$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
			//Selezione database
			mysqli_select_db($connessione,$db) or die("Could not select database");
				
			$partitaIva="";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				//Prendo i parametri passati dal form
				$partitaIva=$_POST["pivaToDelete"];
				
				$result = mysqli_query($connessione, "select * from SVILUPPATORE where PIVA='$partitaIva';")
							or die("Query failed : " . mysqli_error($connessione));
				if (mysqli_num_rows($result)) {
					$result2 = mysqli_query($connessione, "delete from SVILUPPATORE where PIVA='$partitaIva';")
							or die("Query failed : " . mysqli_error($connessione));
                    echo "<script> alert('Eliminazione avvenuta con successo');</script>";
                    echo "<script> window.location.assign('gestione_sviluppatori.php'); </script>";
				}else echo "<script> alert('Nessuno sviluppatore con tale Partita Iva è presente nel db'); window.location.assign('gestione_sviluppatori.php');</script>"; 
			}
            
		?>