<?php
session_start();
include("../../db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$answer = false;
if(isset($_POST["jam_id"]) )
{

	$id =   mysqli_real_escape_string($conn, $_SESSION["id"]);
	$jamId = mysqli_real_escape_string($conn, $_POST["jam_id"]);


	$query ="UPDATE invite SET reply = 0  where jam_session_id ='".$jamId."' and invited_user = '".$id."' ";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if( $result  ){
	;
		$answer = true; // variabile ausialia per la corretta gestione dell'user
	}else
	{
		
	};
}
$json = json_encode($answer);
echo $json;
mysqli_close($conn);
?>
