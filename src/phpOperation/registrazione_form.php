<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
// Verifica se ci sono dati POST
if(isset($_POST["FirstName"]) && isset($_POST["LastName"]) && isset($_POST["email"]) && isset($_POST["password"])  && isset($_POST["birth-date"]) )
{
	// Leggi dati
	$FirstName = mysqli_real_escape_string($conn,$_POST["FirstName"]);
	$LastName = mysqli_real_escape_string($conn, $_POST["LastName"]);
	$email =   mysqli_real_escape_string($conn, $_POST["email"]);
	$password =  mysqli_real_escape_string($conn, $_POST["password"]);
	$birth =  mysqli_real_escape_string($conn, $_POST["birth-date"]);
 $photoLocation = null ;
	if( isset($_FILES["immage"])){

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
			//determino il path per il salvataggio della mia immagine

			$photoLocation = 'img/profile/'.$fileNameNew;

		}
	}
	else
	{
		$immage= null;
	}
		; // fare il check della immagine, vedi come farlo in lato client perchè non è elegante in lato server

		// Cripta password
		$password = md5("pippo1" . $password);
		// inserisci nella tabella Account
		$result1 = mysqli_query($conn,"START TRANSACTION");
		$query = "INSERT INTO ACCOUNT(activation_date , passw , email) VALUES( curdate() ,'".$password."','".$email."')";
		$result2 = mysqli_query($conn, $query) or die(mysqli_error($conn));
		//prima di inserire in USER dovrei ottenere l'id dell'utente
		$id_user = mysqli_insert_id($conn);
		//ora inserisco nella tabella USER
		// Provare una volta inserite tante più cose ad inserire l'immagine
		$query1 = "INSERT INTO USERS( user_id , name , surname , birth , email , photo) VALUES('".$id_user."','".$FirstName."','".$LastName."','".$birth."','".$email."','".$photoLocation."')";
		$result3 = mysqli_query($conn , $query1) or die(mysqli_error($conn));
		if( $result2 && $result3 ){
			mysqli_query($conn , "COMMIT");
			//muovo il file caricato nella cartella ( torno nella cartella padre e la mando ad imm/profile)
			move_uploaded_file(	$fileTmpName , "../".$photoLocation );
			// salvo in sessione i valori dell'utente
			$_SESSION["FirstName"]=$FirstName;
			$_SESSION["id"]=$id_user;
			header("Location: ../accountInfo.php");
			mysqli_close($conn);
		}else{
			mysqli_query($conn , "ROLLBACK");
			unlink($photoLocation);
			mysqli_close($conn);
			header("Location: ../errorPage/errorRegistration.php");

		}
	}else{
		 mysqli_close($conn);
			header("Location:  ../errorPage/errorRegistration.php");
		};
?>
