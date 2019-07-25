<?php
session_start();
if(!isset($_SESSION["id"])){
  echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.php'); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lets' Jam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"   type="text/css" href="libs/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link href="css/main.css" rel="stylesheet">
  <script src="libs/popper.min.js"></script>
  <script src="libs/jquery.min.js"></script>
  <script src="libs/bootstrap.min.js"></script>
  <script src="libs/moment.js"></script>
  <!-- import per script della pagina -->
  <script type = "text/javascript" src = "js/scripts.js" ></script>
  <script type = "text/javascript" src = "js/instrumentConfiguration.js" ></script>

  <!-- Import per datatable -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!--import datatable -->
  <script type = "text/javascript" src = "js/dataTable/instrumentConfigurationTable.js" ></script>
    <script type = "text/javascript" src = "js/dataTable/newInstrumentConfigurationTable.js" ></script>




</head>
<body>
  <?php include 'components/topnav.php'; ?>
  <div class = "row p-3 m-0 w-100" style="height: calc(100vh - 268px);">
    <div class = "col-2 p-0">
      <nav class="navbar  bg-dark navbar-dark rounded">
        <div >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="accountInfo.php">Gestione Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="accountTable.php">Gestione Informazioni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Configurazione strumenti </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="jamSession.php">Jam Session</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class= "col-10 pr-0 rounded">
      <div class="row m-0  w-100">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark w-100 rounded-top">
          <div class = "d-flex justify-content-center m-auto">
            <label class = " d-flex    text-white" > Configurazione strumenti  </label>
          </div>
        </div>
        <div class="row m-0  w-100 content-colors rounded-down" style="height:95%">
          <div class="col-2 h-100 p-1 " style=" background-color: rgba(100,100,100)">
            <div class =" border mt-2 ">
              <div class ="row-12 m-1">
                <label class ="text-white font-weight-bold">Name : </label>
              </div>
              <div class ="row-12 m-1">
                <label id='nome' class="text-white text-capitalize ">nome Utente </label>
              </div>
            </div>
            <div class ="border mt-1 ">
              <div class ="row-12 m-1">
                <label class ="text-white font-weight-bold  mr-2">Cognome : </label>
              </div>
              <div class ="row-12 m-1">
                <label id='cognome' class="text-white text-capitalize"> Cognome utente </label>
              </div>
            </div>
            <div class ="border mt-1 ">
              <div class ="row-12 m-1">
                <label class ="text-white font-weight-bold  mr-2">Email : </label>
              </div>
              <div class ="row-12 m-1">
                <label id ='email' class="text-white"> email-utente </label>
              </div>
            </div>
          </div>
          <div class = "col-10 p-0">
            <div id ='variableContent' class ="row p-2 m-0 w-100 rounded-down">
              <?php include 'components\instrumentConfigurationComponents\configurationTable.html'?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php include 'components/footer.php';?>
    <!-- Footer -->
    <!-- include modal -->
    <?php include 'modal/noteModal.php';?>
    <?php include 'modal/newConfigurationModal.php';?>

  </body>
  </html>
