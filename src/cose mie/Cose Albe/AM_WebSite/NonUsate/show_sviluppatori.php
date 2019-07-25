<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.html#login'); </script>"; 
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Mostra sviluppatori</title>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
		<script src="https//code.jquery.com/jquery-1.12.4.js"></script>
		<script>
			$(document).ready(function() {
				$('#tabEsterna').DataTable( {
					"order": [[ 0, "asc" ]]
				} );
			} );
		</script>
	</head>
	<body>
		<?php
			//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
			include("db.php");
				
			//Connessione host
			$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
            
            //Selezione database
			mysqli_select_db($connessione,$db) or die("Could not select database");
            
            
            
            $query="SELECT * FROM SVILUPPATORE";
            $result = mysqli_query($connessione, $query);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
				echo "<table id='tabEsterna' class='display' cellspacing='0' width='100%'>
						<br><caption><b>SVILUPPATORI</b></caption>
						<thead>
							<tr id='tabHeader'>
								<th>Partita Iva</i></th>
								<th>Nome</i></th>
								<th>Cognome</i></th>
								<th>Telefono</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Partita Iva</i></th>
								<th>Nome</i></th>
								<th>Cognome</i></th>
								<th>Telefono</th>
							</tr>
						</tfoot>
						<tbody>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr class='item'>"
						."<td>"  .$row["PIVA"]. "</td>"
						."<td>"  .$row["NOME"]. "</td>"
						."<td>"  .$row["COGNOME"]. "</td>"
						."<td>"  .$row["TELEFONO"]. "</td>"
						."</tr>";
				} echo "	</tbody>
						</table>";
            } else {
                echo "0 results";
            }
            
            mysqli_close($connessione);
			
        ?>
    <br>
    <a href="gestione_sviluppatori.php"><button>Ritorna alla pagina precedente</button></a>
	
	
	</body>
</html>