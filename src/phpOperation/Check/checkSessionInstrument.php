<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$check = true;
if(isset($_POST['instrumentId']) && isset($_POST['educationExperienceId']))
{
  $instrumentId = $_POST['instrumentId'];
  $educationExperienceId =$_POST['educationExperienceId'];
  $query = "SELECT * from session_instrument where  instrument_id = '".$instrumentId."' and education_experience_id = '".$educationExperienceId."'";
  $result = mysqli_query($conn, $query) ;
  if($result && ((mysqli_num_rows($result) ) == 0))
  {
    // non è stato trovato nulla allora imposto la risposta a falso
    $check = false;
  }
}

$json = json_encode($check);
echo $json;
mysqli_close($conn);
?>
