<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.html#login'); </script>"; 
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mostra Layout</title>
		
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
		
        <style>
          /* Applico lo stile alle tabelle di selezione */
		  
		  /*Stile per la tabella contenente i moduli*/
		  #tabInterna, #tabInterna td, #tabInterna tr{
			border: none;
			border-collapse: separate;
		  }
		  tr:nth-child(even) #tabInterna tr {
               background-color: #fff;
          }
		  tr:nth-child(odd) #tabInterna tr{
               background-color: RGB(250,250,250);
          }
		    
		</style>
	</head>
	<body>
		<?php
			//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
			include("db.php");
				
			//Connessione host
			$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
            
            //Selezione database
			mysqli_select_db($connessione,$db) or die("Could not select database");
            
            
            
            $query="SELECT * FROM LAYOUT";
            $result = mysqli_query($connessione, $query);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
				echo "<table id='tabEsterna' class='display' cellspacing='0' width='100%'>
						<br><caption><b>LAYOUTS</b></caption>
						<thead>
							<tr id='tabHeader'>
								<th>Id</i></th>
								<th>Costo Totale</i></th>
								<th>P.Iva Sviluppatore</i></th>
								<th>Moduli (Id, Nome, Funzione, Costo)</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Id</i></th>
								<th>Costo Totale</i></th>
								<th>P.Iva Sviluppatore</i></th>
								<th>Moduli (Id, Nome, Funzione, Costo)</th>
							</tr>
						</tfoot>
						<tbody>";
				while($rowL = mysqli_fetch_assoc($result)) {
					
					echo "<tr class='item'>"
						."<td>"  .($rowL['ID']). "</td>"
						."<td>"  .($rowL["COSTO_TOTALE"]). "</td>"
						."<td>"  .$rowL["SVILUPPATORE"]. "</td>"
						."<td>";
							$id_layout = $rowL["ID"];
							$query2 = "select M.ID, M.NOME, M.FUNZIONE, M.COSTO
									   from COMPONENTE C join MODULO M on C.ID_MODULO = M.ID
									   where C.ID_LAYOUT = $id_layout";
							$result2 = mysqli_query($connessione, $query2);
							echo "<table id='tabInterna'>";
							while($row2 = mysqli_fetch_assoc($result2)) {
								echo "<tr>"
									."<td>" ."ID: " .$row2["ID"] ."</td>"
								    ."<td>" ."NOME: " .$row2["NOME"] ."</td>"
									."<td>" ."FUNZIONE: " .$row2["FUNZIONE"] ."</td>"
									."<td>" ."COSTO: " .$row2["COSTO"] ."</td>"
									."</tr>";
							}
							echo "</table>";
							
						echo "</tr>";
				} echo "	</tbody>
						</table>";
            } else {
                echo "0 results";
            }
            
            mysqli_close($connessione);
			
        ?>
    <br>
    <a href="gestione_layout.php"><button>Ritorna alla pagina precedente</button></a>
	
	</body>
</html>