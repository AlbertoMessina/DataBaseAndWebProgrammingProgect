<?php
// Avvia la sessione
session_start();
// Include dati DB
include("../../db.php");
// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$res = array();
if(isset($_POST['jam_id']))
{
  $jamId = $_POST['jam_id'];
  $userId = $_SESSION['id'];
  $query  = "SELECT u.user_id, u.name, u.surname , u.email , u.photo , s.title as setTitle , i.type , i.brand , i.model , e.title as edTitle
            from (((((users u join partecipate p on u.user_id = p.user_id)
            join session_instrument s on s.SESSION_INSTRUMENT_id = p.SESSION_INSTRUMENT_id )
            join instrument i on i.instrument_id = s.instrument_id))
            join education_experience e on e.education_experience_id = s.education_experience_id)
            where p.jam_session_id ='".$jamId."'  and p.user_id !=  '".$userId."'  ";

            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            $num_rows = mysqli_num_rows($result);
            if($result){
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
                $res[] = array(
                  'id'      => $row['user_id'],
                  'name'        => $row['name'],
                  'surname'     => $row['surname'],
                  'email'       => $row['email'],
                  'photo'       => $row['photo'],
                  'title'       => $row['setTitle'],
                  'type'        => $row['type'],
                  'brand'       => $row['brand'],
                  'model'       => $row['model'],
                  'edTitle'       => $row['edTitle']
                );
              };
            };
};
$json = json_encode($res);
echo $json;
mysqli_close($conn);
?>
