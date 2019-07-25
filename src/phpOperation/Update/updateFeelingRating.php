<?php
session_start();
include("../../db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

$answer = false;
if(isset($_POST["jam_id"]) && isset($_POST["rating"]) && isset($_POST["partecipantId"])  )
{

	$id =   mysqli_real_escape_string($conn, $_SESSION["id"]);
	$jamId = mysqli_real_escape_string($conn, $_POST["jam_id"]);
	$rating = mysqli_real_escape_string($conn, $_POST["rating"]);
	$partecipantId = mysqli_real_escape_string($conn, $_POST["partecipantId"]);
	// prelevo il session_instrument_id del user
	mysqli_query($conn, "START TRANSACTION") or die(mysqli_error($conn));
	//cerco se è già presente un rating
	$query ="SELECT * from user_rating where  jam_session_id ='".$jamId."' and user_id = '".$id."' and rated_user ='".$partecipantId."' ";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($result && ((mysqli_num_rows($result)) != 0)){
		// se trovo qualcosa effettuo l'update
		$query1 ="UPDATE user_rating SET impression = '".$rating."'  where jam_session_id ='".$jamId."' and user_id = '".$id."' and rated_user ='".$partecipantId."'  ";
		$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
		if( $result1 ){
			mysqli_query($conn , "COMMIT");
			$answer = true; // variabile ausialia per la corretta gestione dell'user
		}else{
			mysqli_query($conn , "ROLLBACK");
			$answer = false; // variabile ausialia per la corretta gestione dell'user
		};
	}else{
		//se non trovo nulla inserisco un nuovo wallet
		$query2 ="INSERT into user_rating(user_id , jam_session_id ,rated_user, impression) values('".$id."','".$jamId."', '".$partecipantId."' ,'".$rating."')  ";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
		if( $result2  ){
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
