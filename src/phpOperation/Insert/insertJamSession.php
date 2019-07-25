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
if(isset($_POST["genere"]) && isset($_POST["data"]) && isset($_POST["citta"]) && isset($_POST['indirizzo']) && isset($_POST['invito']) && isset($_POST['set']))
{
	// Leggi dati
	$genre = mysqli_real_escape_string($conn,$_POST["genere"]);
	$date = mysqli_real_escape_string($conn, $_POST["data"]);
	$city =   mysqli_real_escape_string($conn, $_POST["citta"]);
	$address =   mysqli_real_escape_string($conn, $_POST["indirizzo"]);
	$invite =  $_POST['invito'];
	$setInstrument =  mysqli_real_escape_string($conn, $_POST["set"]);
	$id = mysqli_real_escape_string($conn, $_SESSION['id']);
	$result0 = mysqli_query($conn,"START TRANSACTION");
	$query = "INSERT into place(city , address) values('".$city."' ,'".$address."')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$place_id = mysqli_insert_id($conn);
	$query1 = "INSERT into jam_session(user_id ,  date , place_id , genre) values('".$id."' ,'".$date."' , '".$place_id."' , '".$genre."')";
	$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
	// prelevo per effettuare l'inserimento degli inviti questi non verrano contati nella buona riuscita della creazione della jam
	$jam_id = mysqli_insert_id($conn);
	//ciclo per inserire gli inviti
	 foreach ($invite as $value) {
	 $query2 = "INSERT into invite(user_id , jam_session_id , invited_user) values('".$id."' , '".$jam_id."' , '".$value."')";
	 $result2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));

 }
	 $query3 = "INSERT INTO partecipate(user_id , jam_session_id, session_instrument_id ) values('".$id."' , '".$jam_id."' , '".$setInstrument."')";
	 $result3 = mysqli_query($conn , $query3) or die(mysqli_error($conn));
	if($result && $result1 && $result3)
	{
		mysqli_query($conn , "COMMIT");
		$answer = true;
	}else{
			mysqli_query($conn , "ROLLBACK");

	}

}
$json = json_encode($answer);
echo $json;
?>
