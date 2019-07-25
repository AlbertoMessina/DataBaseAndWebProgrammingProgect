<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
    </head>
    <body>
        <?php
            if(isset($_POST["username"]) && isset($_POST["password"])){
                //Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
				include("db.php");
				
				//Connessione host
				$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
                        
                //Selezione database
                mysqli_select_db($connessione,$db) or die("Could not select database");
                
                //Prendo i parametri passati dal form
                $username = $_POST["username"];
                $password=($_POST["password"]);
                $password = md5 ($_POST["password"]);
                
                $result = mysqli_query($connessione, "SELECT * FROM UTENTE WHERE USERNAME = '$username' and PASSWORD = '$password';");
                
                $row=mysqli_fetch_array($result);
                if($row){
                    $_SESSION["username"] = $row["USERNAME"];
                    $_SESSION["tipologia"] = $row["TIPOLOGIA"];
                    $_SESSION["nomeUtente"] = $row["NOME"];
					$_SESSION["cognomeUtente"] = $row["COGNOME"];
                    $_SESSION["mailUtente"] = $row["MAIL"];
					$_SESSION["telefono"] = $row["TELEFONO"];
					header("location: home.php");
                }
                else {
                    echo "<script> alert('username e/o password errati'); window.location.assign('index.html#login');</script>";
                }
            }else echo "<script> window.location.assign('index.html#login'); </script>";
            
        ?>
        
        
    </body>
</html>
	