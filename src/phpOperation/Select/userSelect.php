<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$query  = "SELECT name , surname , email FROM  users  where user_id = $_SESSION[id] " ;
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$num_rows = mysqli_num_rows($result);
$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $res[] = array(
    'name' => $row['name'],
    'surname'    => $row['surname'],
    'email'      => $row['email'],

  );
}
$json = json_encode($res);
echo $json;
mysqli_close($conn);
?>
