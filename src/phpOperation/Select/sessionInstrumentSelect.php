<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$query  = "SELECT s.session_instrument_id,  s.title, e.title as experience_title  , i.type ,i.brand , i.model , s.note
from (education_experience  e join session_instrument s on e.education_experience_id = s.education_experience_id) join instrument i on i.instrument_id = s.instrument_id
where e.user_id = $_SESSION[id] " ;
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$num_rows = mysqli_num_rows($result);
$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $res[] = array(
    'session_instrument_id' => $row['session_instrument_id'],
    'titolo'    => $row['title'],
    'titolo_esperienza'    => $row['experience_title'],
    'tipo' => $row['type'],
    'marca'  => $row['brand'],
    'modello'  => $row['model'],
    'note' => $row['note']
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
