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
if(isset($_POST["tipo"]) && isset($_POST["marca"]) && isset($_POST["modello"]))
{
	// Leggi dati
	$tipo = mysqli_real_escape_string($conn,$_POST["tipo"]);
	$marca = mysqli_real_escape_string($conn, $_POST["marca"]);
	$modello =   mysqli_real_escape_string($conn, $_POST["modello"]);
	$personalizzazioni =   mysqli_real_escape_string($conn, $_POST["personalizzazioni"]);
	$id = mysqli_real_escape_string($conn, $_SESSION['id']);
		$query = "INSERT INTO instrument( user_id, type , model ,brand, custom_option) VALUES('".$id."' ,'".$tipo."' ,'".$modello."'  ,'".$marca."','".$personalizzazioni."')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
$json = json_encode($result);
echo $json;
?>
