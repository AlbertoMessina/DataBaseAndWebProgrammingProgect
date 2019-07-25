<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
// inzio query;
$query = "START TRANSACTION";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$query1  = "CREATE temporary table
tmp(
  user_id int(11) DEFAULT -1,
  jam_session_id int(11),
  city varchar(45),
  date date,
  genre varchar(30),
  reply varchar(20) DEFAULT NULL
)";

$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
// prelevo da jam_session
$query2 = "INSERT into tmp(jam_session_id , date  , genre , city  )
           select j.jam_session_id ,j.date , j.genre , p.city
           from jam_session j join place p on j.place_id = p.place_id
           where j.user_id = $_SESSION[id]";

$result2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
// prelevo da partecipate

$query3 = "INSERT into tmp(user_id, jam_session_id , city  , date  , genre )
           select j.user_id ,j.jam_session_id , p.city , j.date , j.genre
           from (jam_session j join partecipate pa on j.jam_session_id = pa.jam_session_id) join  place p on j.place_id = p.place_id
           where pa.user_id = $_SESSION[id] and j.user_id != $_SESSION[id]
           ";
$result3 = mysqli_query($conn,$query3) or die(mysqli_error($conn));

$query7 = "INSERT into tmp
           select j.user_id ,j.jam_session_id , p.city , j.date , j.genre, i.reply
           from (jam_session j join invite i on j.jam_session_id = i.jam_session_id) join  place p on j.place_id = p.place_id
           where i.invited_user = $_SESSION[id] and i.reply = -1 ";
$result7 = mysqli_query($conn,$query7) or die(mysqli_error($conn));

$query4 = "SELECT * from tmp";
$result4 = mysqli_query($conn,$query4) or die(mysqli_error($conn));

// elimino la tabbella e faccio il commit
$query5 = " DROP TABLE tmp ";
$result5 = mysqli_query($conn,$query5) or die(mysqli_error($conn));

$query6 = "commit";
$result6 = mysqli_query($conn,$query6) or die(mysqli_error($conn));

$num_rows = mysqli_num_rows($result4);
$res = array();
while($row = mysqli_fetch_array($result4, MYSQLI_ASSOC))
{
  if($row['reply'] != NULL){
    $ruolo = "I";
  }else{
    // il ruolo se user_id = -1 allora = $_SESSION['id']  => proprietario della jam , altrimenti è partecipante
    $ruolo = ($row['user_id'] == -1) ? "C" : "P" ;
  }

  $res[] = array(
    'jamSessionId' => $row['jam_session_id'],
    'ruolo' => $ruolo,
    'genere' => $row['genre'],
    'citta'    => $row['city'],
    'data'    => $row['date'],
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
