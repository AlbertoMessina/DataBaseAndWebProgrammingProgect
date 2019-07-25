<?php
session_start();
include("../../db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$answer = false;
if(isset($_POST["jam_id"]) && isset($_POST["rating"]) )
{

	$id =   mysqli_real_escape_string($conn, $_SESSION["id"]);
	$jamId = mysqli_real_escape_string($conn, $_POST["jam_id"]);
	$rating = mysqli_real_escape_string($conn, $_POST["rating"]);
	// prelevo il session_instrument_id del user
	mysqli_query($conn, "START TRANSACTION") or die(mysqli_error($conn));
	$query ="SELECT session_instrument_id from partecipate where  jam_session_id ='".$jamId."' and user_id = '".$id."' ";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);
	$session_instrument_id = $row['session_instrument_id'];
	//cerco se è già presente un rating
	$query1 ="SELECT * from wallet where  jam_session_id ='".$jamId."' and user_id = '".$id."' and session_instrument_id ='".$session_instrument_id."' ";
	$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
	if($result1 && ((mysqli_num_rows($result1)) != 0)){
		// se trovo qualcosa effettuo l'update
		$query2 ="UPDATE wallet SET rating = '".$rating."'  where jam_session_id ='".$jamId."' and user_id = '".$id."' and session_instrument_id ='".$session_instrument_id."' ";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		if( $result2 ){
			mysqli_query($conn , "COMMIT");
			$answer = true; // variabile ausialia per la corretta gestione dell'user
		}else{
			mysqli_query($conn , "ROLLBACK");
			$answer = false; // variabile ausialia per la corretta gestione dell'user
		};
	}else{
		//se non trovo nulla inserisco un nuovo wallet
		$query3 ="INSERT into wallet(user_id , jam_session_id , session_instrument_id , rating) values('".$id."','".$jamId."', '".$session_instrument_id."' ,'".$rating."')  ";
		$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
		if( $result3  ){
			mysqli_query($conn , "COMMIT");
			$answer = true; // variabile ausialia per la corretta gestione dell'user
		}else
		{
			mysqli_query($conn , "ROLLBACK");
			$answer = false; // variabile ausialia per la corretta gestione dell'user
		};
	}

}
$json = json_encode($answer);
echo $json;
mysqli_close($conn);
?>
