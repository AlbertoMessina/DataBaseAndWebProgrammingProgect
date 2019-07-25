<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$jamSessionId = $_POST['jam_id'];
// seleziono i partecipanti
$query  = "SELECT j.genre, j.date , p.city,  p.address  , count(*) as partecipanti FROM (jam_session j join place p on p.place_id = j.place_id) join partecipate pa on pa.jam_session_id = j.jam_session_id where j.jam_session_id = '".$jamSessionId."'" ;
//Ricerco il mome dei Partecipanti
//
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $res[] = array(

    'genre'=> $row['genre'],
    'citta' => $row['city'],
    'indirizzo' => $row['address'],
    'partecipanti' => $row['partecipanti'],
    'date' => $row['date']
  );
}

$json = json_encode($res);
echo $json;
mysqli_close($conn);
?>
