<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$result = false;
// Verifica se ci sono dati POST
if(isset($_POST["titolo"]) && isset($_POST["data"]) && isset($_POST["locazione"]))
{
	// Leggi dati
	$titolo = mysqli_real_escape_string($conn,$_POST["titolo"]);
	$data = mysqli_real_escape_string($conn, $_POST["data"]);
	$locazione =   mysqli_real_escape_string($conn, $_POST["locazione"]);
	$id = mysqli_real_escape_string($conn, $_SESSION['id']);
		$query = "INSERT INTO education_experience(title , year , place , user_id) VALUES( '".$titolo."' ,'".$data."','".$locazione."', '".$id."' )";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
$json = json_encode($result);
echo $json;

?>
