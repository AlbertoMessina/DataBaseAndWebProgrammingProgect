<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$check = true;
if(isset($_POST['email']))
{
  $email = $_POST['email'];
  $query = "SELECT * FROM ACCOUNT WHERE email = '".$email."' ";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  if($result && mysqli_num_rows($result) === 0)
  {
    // non è stato trovato nulla allora imposto la risposta a falso
    $check = false;
  }
}

$json = json_encode($check);
echo $json;
mysqli_close($conn);
?>
