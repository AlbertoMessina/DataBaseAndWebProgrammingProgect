<?php

// Avvia la sessione


// Controlla ruolo


// Include dati DB
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_database = "cinema"; //Il nome del DB coincide con lo username

// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$Regista = $_GET["Regista"]; 
 
$result = mysqli_query($conn, "SELECT * FROM film WHERE Regista='".$Regista."'");
 
$num_rows = mysqli_num_rows($result);
  
$res = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'CodFilm'=> $row['CodFilm'],
      'Titolo' => $row['Titolo'],
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