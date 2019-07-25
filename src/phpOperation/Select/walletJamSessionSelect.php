<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
if(isset($_POST['jam_id'])){
  $jamId = $_POST['jam_id'];
  $query  = "SELECT note , rating FROM  wallet  where jam_session_id = '".$jamId."'  and user_id = $_SESSION[id]" ;
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $res = array();
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    $res[] = array(
      'note' => $row['note'],
      'rating'    => $row['rating'],
    );
  }
  $json = json_encode($res);
  echo $json;
}

mysqli_close($conn);
?>
