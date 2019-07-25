<?php
session_start();
include("../../db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$answer = false;
if(isset($_POST["genre"]) && isset($_POST["city"]) && isset($_POST["address"])   && isset($_POST["date"]) && isset($_POST["jamId"]) )
{
	// Leggi dati

	$genre = mysqli_real_escape_string($conn,$_POST["genre"]);
	$city = mysqli_real_escape_string($conn, $_POST["city"]);
	$address =   mysqli_real_escape_string($conn, $_POST["address"]);
	$date =  mysqli_real_escape_string($conn, $_POST["date"]);
	$jamId = mysqli_real_escape_string($conn, $_POST["jamId"]);
	// prelevo l'id del place per modificarne gli attributi
	$result0 = mysqli_query($conn,"START TRANSACTION");
	$query ="SELECT place_id FROM jam_session  where jam_session_id ='".$jamId."' ";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);
	$placeId = $row['place_id'];
	// query per la modifica del place
	$query2 = "UPDATE place SET city = '".$city."' , address = '".$address."' where place_id = '".$placeId."' ";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
	//query per la modifica della jam
	$query3 = "UPDATE jam_session SET  genre = '".$genre."' , date = '".$date."' WHERE jam_session_id = '".$jamId."' ";
	$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));


	if( $result && $result2 && $result3 ){
		mysqli_query($conn , "COMMIT");
		$answer = true; // variabile ausialia per la corretta gestione dell'user


	}else
	{
		mysqli_query($conn , "ROLLBACK");
	};
}
$json = json_encode($answer);
echo $json;
mysqli_close($conn);
?>
