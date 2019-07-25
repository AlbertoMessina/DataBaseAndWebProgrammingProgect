<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('../index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] != 1){
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
    
    //Query: select PIVA from SVILUPPATORE
    $result = mysqli_query($connessione, "select PIVA from SVILUPPATORE"); 
 
    $res = array();
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       $res[] = array(
          'Piva'=> $row['PIVA'],
       );
    }
    $json = json_encode($res);
    echo $json;
?>