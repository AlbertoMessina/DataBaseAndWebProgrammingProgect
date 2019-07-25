<?php
session_start();
include("../db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
if(isset($_POST["FirstName"]) && isset($_POST["LastName"]) && isset($_POST["email"])   && isset($_POST["birth-date"]) && isset($_FILES["immage"]) )
{
	// Leggi dati
	$FirstName = mysqli_real_escape_string($conn,$_POST["FirstName"]);
	$LastName = mysqli_real_escape_string($conn, $_POST["LastName"]);
	$email =   mysqli_real_escape_string($conn, $_POST["email"]);
	$birth =  mysqli_real_escape_string($conn, $_POST["birth-date"]);
	$newPhoto = false;
	if(!isset($_FILES['immage']) || $_FILES['immage']['error'] == UPLOAD_ERR_NO_FILE)
	{
		// se non è settato $_FILES oppure ho l'errore UPLOAD_ERR_NO_FILE costante allora mantengo lo stesso path
		$photoLocation = mysqli_real_escape_string($conn , $_POST['old_image']);

	}else
	{
		$file = $_FILES['immage'];
		$fileName = $_FILES['immage']['name'];
		$fileTmpName = $_FILES['immage']['tmp_name'];
		$fileError = $_FILES['immage']['error'];
		if($fileError === 0)
		{
			//estraggo l'estensione e modifico il nome del file
			$fileExt = explode('.' , $fileName);
			//prelevo l'ultimo elemento dato dall'explode e lo formatto in lowercase
			$fileActualExt =  strtolower(end($fileExt));
			//Salvo il file con un nome pseudocasuale per evitare eventuali sovrascritture da parte delgli utenti
			$fileNameNew = uniqid("" , true).".".$fileActualExt;
			$photoLocation = 'img/profile/'.$fileNameNew;
			$newPhoto = true;
		}

	}

	// update dell' account -> email
	$result1 = mysqli_query($conn,"START TRANSACTION");
	$query = "UPDATE USERS SET  name = '".$FirstName."' , surname = '".$LastName."' , birth = '".$birth."' , email = '".$email."' , photo ='".$photoLocation."' WHERE user_id = $_SESSION[id]";
	$result2 = mysqli_query($conn, $query) or die(mysqli_error($conn));

	// ora aggiorno l'users

	$query1 = "UPDATE ACCOUNT SET  email = '".$email."' WHERE id = $_SESSION[id]";
	$result3 = mysqli_query($conn , $query1) or die(mysqli_error($conn));
	if( $result2 && $result3 ){
		$unlinkOk = false; // variabile ausialia per la corretta gestione dell'user

		 if($newPhoto)
		 {
			 // eseguo l'unlink della vecchia foto
			 $unlinkOK = unlink($_POST['old_image']);
 			 //muovo il file caricato nella cartella
			 move_uploaded_file(	$fileTmpName ,"../".$photoLocation );

		 }

		 mysqli_query($conn , "COMMIT");
		 mysqli_close($conn);
		header("Location: ../accountInfo.php");
	}else{
		mysqli_close($conn);
		mysqli_query($conn , "ROLLBACK");
		header("Location: ../accountInfo.php");
	}
}else{
	mysqli_close($conn);
	 header("Location:  ../accountInfo.php");
};
?>
