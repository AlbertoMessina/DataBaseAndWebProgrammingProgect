<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
if(isset($_POST['jam_id']) && isset($_POST['partecipantId']) ){
  $jamId = $_POST['jam_id'];
  $partecipantId = $_POST['partecipantId'];
  $query  = "SELECT r.note ,u.professionality , u.performance , u.impression FROM  user_rating r  join users u on u.user_id = r.rated_user where  u.user_id = '".$partecipantId."' " ;
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $res = array();
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    $res[] = array(
      'note' => $row['note'],
      'professionality'  => $row['professionality'],
      'performance' => $row['performance'],
      'impression' => $row['impression']

    );
  }
  $json = json_encode($res);
  echo $json;
}

mysqli_close($conn);
?>
