<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

if(isset($_POST['session_instrument_id']))
{
  $session_instrument_id = $_POST['session_instrument_id'];
  $query = "DELETE FROM session_instrument  WHERE session_instrument_id = '".$session_instrument_id."'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
}
mysqli_close($conn);
?>
