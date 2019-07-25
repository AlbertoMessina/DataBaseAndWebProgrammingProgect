<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$query  = "SELECT user_id ,name , surname , email FROM  users where user_id != $_SESSION[id]" ;
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$num_rows = mysqli_num_rows($result);
$res = array();
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
  $nome = $row['name'] . " " .  $row['surname'];
  $res[] = array(
    'userId' => $row['user_id'],
    'nome' => $nome,
    'email'      => $row['email'],
  );
};
$json_data = array(
                  "draw"            => 1,
                  "recordsTotal"    => $num_rows,
                  "recordsFiltered" => $num_rows,
                  "data"            => $res
              );
$json = json_encode($json_data);
echo $json;
mysqli_close($conn);
?>
