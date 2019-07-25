<?php

// Avvia la sessione


// Controlla ruolo

$CodFilm = $_POST["CodFilm"];
// Include dati DB
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_database = "cinema"; //Il nome del DB coincide con lo username

// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$result = mysqli_query($conn, "SELECT * FROM film WHERE CodFilm=".$CodFilm);

$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'CodFilm'=> $row['CodFilm'],
      'Titolo' => $row['Titolo'],
      'AnnoProduzione' => $row['AnnoProduzione'],
	  'Regista'=> $row['Regista'],      
   );
}
$json = json_encode($res);
echo $json;
?>