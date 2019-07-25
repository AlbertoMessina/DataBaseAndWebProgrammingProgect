<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('../index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] == 3){
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

	$result = mysqli_query($connessione, "SELECT * FROM MODULO");	 
	$num_rows = mysqli_num_rows($result);
	$res = array();	
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	   $res[] = array(
		  'Id'=> $row['ID'],
		  'Nome' => $row['NOME'],
          'Funzione' => $row['FUNZIONE'],
		  'Costo'=>$row['COSTO'],	  
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