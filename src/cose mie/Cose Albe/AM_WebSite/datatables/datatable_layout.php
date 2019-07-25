<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('../index.html#login'); </script>"; 
	}
	//Possono vederli tutti gli utenti (Serve a tutte e 3 le categoria tale datatable)
?>

<?php
	//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
	include("../db.php");
			
    //Connessione host
	$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
	//Selezione database
	mysqli_select_db($connessione,$db) or die("Could not select database");
    
	$result = mysqli_query($connessione, "SELECT * FROM LAYOUT");
	$num_rows = mysqli_num_rows($result);
	$res = array();
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	   $res[] = array(
		  'ID'=> $row['ID'],
		  'Sviluppatore' => $row['SVILUPPATORE'],
		  'Costo'=>$row['COSTO_TOTALE'],	  
		  'button'=>''
	   );
	}
	
	$json_data = array(
					"draw"            => 1,
					"recordsTotal"    => $num_rows,
					"recordsFiltered" => $num_rows,
					"data"            => $res
				);
	$json = json_encode($json_data);
	echo $json;
?>