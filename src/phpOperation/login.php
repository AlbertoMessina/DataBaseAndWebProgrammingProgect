<?php
// Includi dati DB
// Esporta $db_host, $db_user, $db_password, $db_database
include("../db.php");
// Connessione al database
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
// Avvia sessione per il salvataggio dei cookies
session_start();
// Verifica se sono stati mandati dati
if(isset($_POST["email"]) && isset($_POST["password"]))
{
  // Leggi dati
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Cripta password

  $password = md5("pippo1" . $password);

  // Cerca la coppia (username, password) nel database
  $result = mysqli_query($conn, "SELECT * FROM account A  WHERE A.email = '".$email."' AND A.passw = '".$password."'");
  if($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    //utente trovato leggi le sue informazioni e salvale in sessione
    $_SESSION["id"] = $row["id"] ;
    mysqli_close($conn);
    "<span>Utente trovato redirect alla home</span>  ";
    header("Location: ../accountInfo.php");
  }

  else
  {
    mysqli_close($conn);
    // utente non trovato
    header("Location: ../errorPage/notFoundLogin.php");

  }
}else{
  mysqli_close($conn);
  // errore generale
  header("Location: ../errorPage/errorLogin.php");


}
?>
