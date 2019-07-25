<?php
session_start();
include("../../db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$answer = false;
if(isset($_POST["jam_id"]))
{

	$id =   mysqli_real_escape_string($conn, $_SESSION["id"]);
	$jamId = mysqli_real_escape_string($conn, $_POST["jam_id"]);

	mysqli_query($conn, "START TRANSACTION") or die(mysqli_error($conn));
	$query ="UPDATE invite SET reply = -2  where jam_session_id ='".$jamId."' and invited_user = '".$id."' ";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$query1 ="DELETE from partecipate where jam_session_id ='".$jamId."' and user_id = '".$id."' ";
	$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
	if( $result  && $result1 ){
	;
		$answer = true; // variabile ausialia per la corretta gestione dell'user
		mysqli_query($conn , "COMMIT");
	}else
	{
			mysqli_query($conn , "ROLLBACK");
	};
}
$json = json_encode($answer);
echo $json;
mysqli_close($conn);
?>
