<?php
session_start();
include("../../db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$answer = false;
if(isset($_POST["jam_id"]) && isset($_POST["set_id"]) )
{

	$id =   mysqli_real_escape_string($conn, $_SESSION["id"]);
	$setId=  mysqli_real_escape_string($conn, $_POST["set_id"]);
	$jamId = mysqli_real_escape_string($conn, $_POST["jam_id"]);
	// prelevo l'id del place per modificarne gli attributi
	$result0 = mysqli_query($conn,"START TRANSACTION");
	$query ="UPDATE invite SET reply = 1  where jam_session_id ='".$jamId."' and invited_user = '".$id."' ";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$query2 = "INSERT INTO PARTECIPATE(user_id ,jam_session_id ,session_instrument_id) values('".$id."' , '".$jamId."' ,'".$setId."')";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	if( $result && $result2 ){
		mysqli_query($conn , "COMMIT");
		$answer = true; // variabile ausialia per la corretta gestione dell'user
	}else
	{
		mysqli_query($conn , "ROLLBACK");
	};
}
$json = json_encode($answer);
echo $json;
?>
