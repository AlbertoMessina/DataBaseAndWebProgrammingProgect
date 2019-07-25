<?php
    //Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
	include("../db.php");
				
	//Connessione host
	$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
	//Selezione database
	mysqli_select_db($connessione,$db) or die("Could not select database");
				
	//Query: select PIVA from SVILUPPATORE 
	$result = mysqli_query($connessione, "select PIVA from SVILUPPATORE;")
							or die("Query failed : " . mysqli_error($connessione));
      
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$res[] = array('PIVA'=> $row["PIVA"]);
            }
		$json = json_encode($res);
		echo $json;
        }
    
	mysqli_close($connessione);
?>
        