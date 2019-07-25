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

    // Mostra Layout venduti da uno sviluppatore
	//Prendo i parametri passati dal form delete modulo
	$pivaSLayout=$_GET["pivaSLayout"];
				
				
	$resultSL = mysqli_query($connessione, " SELECT L.ID as ID, L.COSTO_TOTALE as COSTO, W.URL AS URL FROM ((SVILUPPATORE S join LAYOUT L on L.SVILUPPATORE = S.PIVA) join SITO_WEB W on W.LAYOUT = L.ID) WHERE S.PIVA = '$pivaSLayout';")
							or die("Query failed : " . mysqli_error($connessione));
        
        $num_rows = mysqli_num_rows($resultSL);  
        $res = array();   
        while($row = mysqli_fetch_array($resultSL, MYSQLI_ASSOC)){
           $res[] = array(
              'Id'=> $row['ID'],
              'Costo_Totale' => $row['COSTO'],
              'URL' => $row['URL']
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
			
				
			