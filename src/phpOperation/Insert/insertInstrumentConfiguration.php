<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$answer = false;
// Verifica se ci sono dati POST
if(isset($_POST["titolo"]) && isset($_POST["instrumentId"]) && isset($_POST["educationExperienceId"]))
{
	// Leggi dati
	$titolo = mysqli_real_escape_string($conn,$_POST["titolo"]);
	$note = mysqli_real_escape_string($conn, $_POST["note"]);
	$instrumentId =   mysqli_real_escape_string($conn, $_POST["instrumentId"]);
	$educationExperienceId =   mysqli_real_escape_string($conn, $_POST["educationExperienceId"]);
	$id = mysqli_real_escape_string($conn, $_SESSION['id']);
	$query = "INSERT into session_instrument(user_id ,  title , note , instrument_id , education_experience_id) values('".$id."' ,'".$titolo."' ,'".$note."'  ,'".$instrumentId."','".$educationExperienceId."')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($result)
	{
		$answer = true;
	}

}
$json = json_encode($answer);
echo $json;
?>
