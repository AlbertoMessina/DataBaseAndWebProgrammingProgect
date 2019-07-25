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
  <script type = "text/javascript" src = "js/dataTable/dataTableAccount.js" ></script>
  <script type = "text/javascript" src = "js/accountTable.js" ></script>


  <!-- Import per datatable -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- import per script della pagina -->


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
              <a class="nav-link" href="#">Gestione Informazioni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="instrumentConfiguration.php">Configurazione strumenti </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="jamSession.php">Jam Sassion</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class= "col-10 pr-0 rounded">
      <div class="row m-0  w-100">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark w-100 rounded-top">
          <div class = "d-flex justify-content-center m-auto">
            <label class = " d-flex    text-white" > Gestione Informazioni  </label>
          </div>
        </div>
        <div class="row m-0  w-100 content-colors rounded-down" style="height:95%">
          <div class ="row p-2 m-0 w-100 rounded-down">
            <table class="table table-striped text w-100" id = "educationExperienceTable">
              <thead class="thead-dark " >
                <tr>
                  <th>education_experience_id</th>
                  <th>Titolo</th>
                  <th>Anno</th>
                  <th>Locazione</th>
                  <th > <button id="new_btn_experience" class ="btn btn-secondary btn-sm" data-toggle = "modal" data-target ="#edModal">New <span class="fa fa-plus ml-1"></span></button></th>
                </tr>
              </thead>
              <tbody class = "bg-light">
                <tr>

                </tr>
              </tbody>
            </table>
          </div>
          <div class ="row p-2 m-0 w-100 rounded-down">
            <table class="table table-striped text  w-100" id="instrumentTable">
              <thead class="thead-dark " >
                <tr>
                  <th>instrument_id</th>
                  <th>Tipo</th>
                  <th>Marca</th>
                  <th>Modello</th>
                  <th>Personalizzazioni</th>
                    <th > <button id="new_btn_experience" class ="btn btn-secondary btn-sm" data-toggle = "modal" data-target ="#instrumentModal">New <span class="fa fa-plus ml-1"></span></button></th>
                </tr>
              </thead>
              <tbody class = "bg-light">
                <tr>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    
    </div>
    <!-- Footer -->
    <?php include 'components/footer.php';?>
    <!-- Footer -->
    <!-- include modal -->
    <?php include 'modal/edModal.php';?>
    <?php include 'modal/instrumentModal.php';?>
  </body>
  </html>
