<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
 $answer = false;
$mails = array();
if(isset($_POST['jam_id']))
{
  $jam_id = $_POST['jam_id'];
  mysqli_query($conn, "START TRANSACTION") or die(mysqli_error($conn));
  // cancello gli inviti
  $query1 = "DELETE from invite where jam_session_id = '".$jam_id."'";
  $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));

  //prima seleziono le email dei partecipanti, poi cancello
  $query2 = "SELECT email from users u join partecipate p on u.user_id = p.user_id where p.jam_session_id = '".$jam_id."' ";
  $result2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
  // prelevo le mail
  while($rowMail = mysqli_fetch_assoc($result2))
  {
    $mails[] = $rowMail;
  };
 // cancello dai partecipanti
  $query3 = "DELETE from partecipate where jam_session_id = '".$jam_id."' ";
  $result3 = mysqli_query($conn,$query3) or die(mysqli_error($conn));
  // seleziono la data per la  mail
  $query4 = "SELECT date from jam_session where jam_session_id = '".$jam_id."' ";
  $result4 = mysqli_query($conn,$query4) or die(mysqli_error($conn));
  $rowDate = mysqli_fetch_assoc($result4);
  // seleziono il place id per prenderne le informazioni
  $query5 = "SELECT  place_id FROM jam_session  WHERE  jam_session_id = '".$jam_id."'";
  $result5 = mysqli_query($conn,$query5) or die(mysqli_error($conn));
  $row = mysqli_fetch_assoc($result5);
  $placeId = $row['place_id'];
  // seleziono gli elementi per costruire la mail
  $query6 = "SELECT city, address FROM place where place_id = '".$placeId."'";
  $result6 = mysqli_query($conn,$query6) or die(mysqli_error($conn));
  $rowPlace = mysqli_fetch_assoc($result6);
  // cancello la jam
  $query7 = "DELETE from jam_session where jam_session_id = '".$jam_id."'";
  $result7 = mysqli_query($conn,$query7) or die(mysqli_error($conn));
  // cancello il place
  $query8 = "DELETE FROM place where place_id = '".$placeId."'";
  $result8 = mysqli_query($conn,$query8) or die(mysqli_error($conn));

  if($result1 && $result2 && $result3 && $result4  && $result5 && $result6  && $result7  && $result8)
  {
    $city =  $rowPlace['city'];
    $address = $rowPlace['address'];
    $date = $rowDate['date'];
    // invio delle mail
    /*
foreach ($mails as $value) {
  $to = '".$value."';

  $subject = "Eliminazione jamSession";

  $message = "
  <html>
  <head>
  <title>HTML email</title>
  </head>
  <body>
  <p>La seguente jam è stata eliminata</p>
  <table>
  <tr>
  <th>Citta</th>
  <th>Indirizzo</th>
  <th>Data</th>
  </tr>
  <tr>
  <td>'".$city."'</td>
  <td>'".$address."'</td>
  <td>'".$date."'</td>
  </tr>
  </table>
  </body>
  </html>
  ";

  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <webmaster@example.com>' . "\r\n";


  mail($to,$subject,$message,$headers);
}*/

		$answer = true;
    	mysqli_query($conn , "COMMIT");
  }else{
    	mysqli_query($conn , "ROLLBACK");
  };
}
$json = json_encode($answer);
echo $json;
mysqli_close($conn);
?>
