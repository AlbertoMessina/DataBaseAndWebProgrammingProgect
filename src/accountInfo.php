<?php
session_start();
if(!isset($_SESSION["id"])){
  echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.php'); </script>";
}
include("db.php");
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);
$query = "SELECT * FROM account A JOIN users U ON A.id = U.user_id WHERE u.user_id = '".$_SESSION["id"]."'";
$result = mysqli_query($conn , $query);
if($row = mysqli_fetch_array($result , MYSQLI_ASSOC))
{
  $_name = $row['name'];
  $_lastName = $row['surname'];
  $_birth = $row['birth'];
  $_email = $row['email'];
  if($row['photo'] != null)
  {
    $_photo = $row['photo'];
  }
  else {
    $_photo = 'img/ignoto.jpg';
  }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lets' Jam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="libs/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link href="css/main.css" rel="stylesheet">
  <script src="libs/popper.min.js"></script>
  <script src="libs/jquery.min.js"></script>
  <script src="libs/bootstrap.min.js"></script>
  <script src="libs/moment.js"></script>
  <script type = "text/javascript" src = "js/scripts.js" ></script>
  <script type = "text/javascript" src = "js/accountInfo.js" ></script>
</head>
<body>
  <?php include 'components/topnav.php'; ?>
  <div class = "row p-3 m-0 w-100" style="height: calc(100vh - 268px);">
    <div class = "col-2 p-0">
      <nav class="navbar  bg-dark navbar-dark rounded">
        <div >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Gestione Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="accountTable.php">Gestione informazioni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="instrumentConfiguration.php">Configurazione strumenti</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="jamSession.php">Jam Session</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class= "col-10 pr-0 rounded" >
      <div class="row m-0  w-100">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark w-100 rounded-top">
          <div class = "d-flex justify-content-center m-auto">
            <label class = " d-flex    text-white" >Le tue informazioni </label>
          </div>
        </div>
        <div class="row m-0  w-100 content-colors rounded-down">
          <div class="container mt-2">
            <form id= "form-id" class="form-horizontal" role="form" method="POST"  enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3 field-label-responsive">
                  <label class ="font-weight-bold " for="imm-profile ">Immagine del profilo:</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group d-flex align-items-center">
                    <img src= <?php  echo "'".$_photo."'" ;?> style="width:150px; height: 150px; margin-left: 2.6rem">
                    <div class="input-group mb-2 mb-sm-0">
                      <div class="input-group-addon" style="width: 2.6rem">
                      </div>
                      <input type="file" name="immage" class="form-control"
                      id="imm-profile" value = <?php  echo "'".$_photo."'" ;?> >
                      <input type="hidden" value=<?php  echo "'".$_photo."'" ;?> name="old_image" />
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-control-feedback">
                    <span class=" align-middle" id="imageTypeError"> </span>
                    <span class=" align-middle" id="imageSizeError"> </span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 field-label-responsive">
                  <label class ="font-weight-bold " for="name">Nome:</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 d-flex align-items-center">
                      <div class="input-group-addon fa fa-address-card" style="width: 2.6rem"></div>
                      <input type="text" name="FirstName" class="form-control text-capitalize" id="name"
                      placeholder="Insersci il nome"  value= <?php  echo "'".$_name."'";?> required autofocus>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 field-label-responsive">
                  <label class ="font-weight-bold " for="email">Cognome :</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 d-flex align-items-center">
                      <div class="input-group-addon fa fa-address-card" style="width: 2.6rem"></div>
                      <input type="text" name="LastName" class="form-control text-capitalize" id="LastName"
                      placeholder="Inserisci il cognome"   value= <?php  echo "'".$_lastName."'";?> required autofocus>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 field-label-responsive">
                  <label class ="font-weight-bold " for="email">Indirizzo E-Mail:</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group  mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center">
                      <div class="input-group-addon fa fa-at" style="width: 2.6rem"></div>
                      <input type="email" name="email" class="form-control" id="email"
                      placeholder="Inserisci l'email"   value= <?php  echo "'".$_email."'"; ?> required autofocus>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                   <div class="form-control-feedback">
                      <span class="text-danger align-middle" id="emailError"> </span>
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 field-label-responsive">
                  <label class ="font-weight-bold " for="birth">Data di nascita :</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 d-flex align-items-center">
                      <div class="input-group-addon" style="width: 2.6rem">
                        <span class="fa fa-calendar"></span>
                      </div>
                      <input type="date" name="birth-date" class="form-control"
                      id="birth" value = <?php echo "'".$_birth."'" ;?> required>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 field-label-responsive">
                  <span id = "ageError" > </span>
                </div>
              </div>
              <div class="row mb-3 justify-content-center">
                <div class="d-flex">
                  <button id ="input-button" class="btn btn-success cursor-pointer " value = "Modifica"><span class="fa fa-user-plus" id= "butLabel">Modifica</span> </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php include 'components/footer.php';?>
    <!-- Footer -->
  </body>
  </html>
