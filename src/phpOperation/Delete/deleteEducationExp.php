<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

if(isset($_POST['education_experience_id']))
{
  $education_experience_id = $_POST['education_experience_id'];
  $query = "DELETE FROM education_experience  WHERE education_experience_id = '".$education_experience_id."'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
}
mysqli_close($conn);
?>
