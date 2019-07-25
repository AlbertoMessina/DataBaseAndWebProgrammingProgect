<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$JamSessionId = $_POST['jam_id'];
// seleziono i partecipanti
$query  = "select  u.name , u.surname , i.type , i.brand , i.model from ((partecipate p join users u on p.user_id = u.user_id)
join session_instrument s on s.session_instrument_id = p.session_instrument_id ) join instrument i on i.instrument_id = s.instrument_id where p.jam_session_id = '".$JamSessionId."'" ;
//Ricerco il mome dei Partecipanti
//
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$num_rows = mysqli_num_rows($result);
$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $completeName = $row['name'] . "  " . $row['surname'];
  $res[] = array(
    'nome' => $completeName ,
    'tipo strumento'    => $row['type'],
    'marca'  => $row['brand'],
    'modello'  => $row['model'],

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
mysqli_close($conn);
?>
