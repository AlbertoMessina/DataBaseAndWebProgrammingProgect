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
  <link rel="stylesheet" href="libs/jquery.steps.css" type="text/css" />
  <link rel="stylesheet"   type="text/css" href="libs/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">


  <link href="css/main.css" rel="stylesheet">
  <script src="libs/popper.min.js"></script>
  <script src="libs/jquery.min.js"></script>
  <script src="libs/bootstrap.min.js"></script>
  <script src="libs/moment.js"></script>
  <!-- Import per datatable -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


  <!--import star rating libs -->
  <link rel="stylesheet" href="libs/starRating/star-rating-svg.css">
  <script src="libs/starRating/jquery.star-rating-svg.js"></script>



  <!-- import per script della pagina -->
  <script type = "text/javascript" src = "js/scripts.js" ></script>
  <script type = "text/javascript" src = "js/jamSession.js" ></script>
  <script type = "text/javascript" src = "js/stepWizard.js" ></script>

<!--import delle datatable -->
  <script type = "text/javascript" src = "js/dataTable/jamSessionTable.js" ></script>
  <script type = "text/javascript" src = "js/dataTable/showPartecipateTable.js" ></script>
  <script type = "text/javascript" src = "js/dataTable/userJamTable.js" ></script>
  <script type = "text/javascript" src = "js/dataTable/instrumentConfigurationTableModal.js" ></script>



</head>
<body>
  <?php include 'components/topnav.php'; ?>
  <div class = "row p-3 m-0 w-100" style="height: calc(100vh - 200px);">
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
              <a class="nav-link" href="instrumentConfiguration.php">Configurazione strumenti </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Jam Session</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class= "col-10 pr-0 rounded">
      <div class="row m-0  w-100">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark w-100 rounded-top">
          <div class = "d-flex justify-content-center m-auto">
            <label class = " d-flex    text-white" > Jam Session  </label>
          </div>
        </div>
        <div class="row m-0  w-100 content-colors rounded-down" style="height:95%">
          <div class ="row p-2 m-0 w-100  rounded-down" style="height:33%">
            <table class="table table-striped text w-100" id = "jamSessionTable">
              <thead class="thead-dark " >
                <tr>
                  <th>jamSessionId</th>
                  <th>Ruolo</th>
                  <th>Genere</th>
                  <th>Citta</th>
                  <th>data</th>
                  <th> <button id="newJamSassion" class ="btn btn-secondary btn-sm ml-3" data-toggle = "modal" data-target ="#newJamModal">New <span class="fa fa-plus ml-1"></span></button></th>
                </tr>
              </thead>
              <tbody class = "bg-light">
                <tr>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="enterJamDiv" class ="row pb-2 m-0 w-100 hide-step" style="height:65%">
            <label class="hide-step" id=jamIdLab> </label>
            <div class =" p-0 px-2"  style="width:65%">
              <div class ="row m-0 mb-1 border rounded bg-secondary" style="height:69% ">
                <div class="d-flex justify-content-center w-100" style="height:80%">
                  <div class="InfoUserJam w-50  border border-dark rounded  mt-2" style="background-color: #cccccc">
                    <div class= "row w-100 m-0 p-0 ">
                      <div class= "d-flex justify-content-center w-100 p-0 m-0">

                      <h4 id="titoloSet"  class= "text-capitalize font-weight-bold" > </h4>
                      </div>
                      <div class= "d-flex justify-content-start w-100 p-0  pl-2 m-0 mt-1">
                        <label>Info strumento:</label>
                      </div>
                      <div class= "d-flex justify-content-start w-100 p-0 pl-2  m-0 ">
                        <label class="mr-2">Tipo: </label> <label id="instrumentType"  class= "text-capitalize font-weight-bold" > </label>
                      </div>
                      <div class= "d-flex justify-content-start w-100 p-0 pl-2  m-0">
                        <label class="mr-2" >Modello:</label> <label id="instrumentModel"  class= "text-capitalize font-weight-bold" > </label>
                      </div>
                      <div class= "d-flex justify-content-start w-100 p-0 pl-2  m-0 ">
                        <label class="mr-2">Marca:</label> <label id="instrumentBrand"  class= "text-capitalize font-weight-bold" > </label>
                      </div>
                      <div class= "d-flex justify-content-start w-100 p-0  pl-2 m-0 ">
                        <label  class="mr-2">Titolo esposto:</label> <label id="eduExp"  class= "text-capitalize font-weight-bold" > </label>
                      </div>

                      <div class= "d-flex justify-content-end w-100 p-0 m-0">
                      <label id="partInfo"  class= "text-capitalize font-weight-bold pr-3" > </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center w-100" style="height:20%">
                  <div class="col-6 p-0">
                    <div class="d-flex justify-content-center w-100 h-100">
                      <button id="prevPartecipante" type="button" class="btn btn-success btn-sm m-2  ">
                        <span >Precedente</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-6 p-0">
                    <div class="d-flex  justify-content-center w-100 h-100">
                      <button id="nextPartecipante" type="button" class="btn btn-success btn-sm m-2  ">
                        <span >Sucessivo</span>
                      </button>
                    </div>
                  </div>
                </div>

              </div>
              <div class ="row m-0 border rounded  bg-secondary" style="height:30%">
                <div class ="col-3 p-0 m-2">
                  <div class="d-flex justify-content-center">
                    <h4 >Valutazione</h4>
                  </div>
                  <div class ="d-flex justify-content-center" id="rating">
                    <div id ="star">  </div>
                  </div>
                </div>
                <div class ="col-8 p-0 m-2">
                  <div class ="d-flex justify-content-center align-item-center w-100" style="height:80%" >
                    <div class=" w-100 h-100"  id="noteJamForm">
                      <textarea class="w-100 " id = "noteJam" name="comment" style="height:90%" value="Inserisci le tue note"></textarea>
                      <button  id  = "noteJamInput"  type="button" value = "Salva note" class="btn  btn-sm " >Salva</button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class ="col-4  border rounded bg-secondary ">
              <div class = "row d-flex justify-content-center" style="height:40% ">
                <div  class= "col-5  rounded  p-0 mt-2 w-100 h-100 bg-light "  >
                  <img  id= "immPartecipante" src="" class="m-0 p-1"  width="210" height="170" >
                </div>
                <div class= "col-5 p-0 w-100 h-100">
                  <div class="px-5 py-5">
                    <div class="row">
                      <label id="nPart"  class= "text-capitalize font-weight-bold">Nome partecipante </label>
                    </div>
                      <div class="row">
                      <label id="cPart" class= "text-capitalize font-weight-bold"> Cognome partecipante </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class = "row d-flex justify-content-center" style="height:30% ">
                <div  class= "p-2 w-100 h-100 ">
                  <div class=" w-100 h-100" id="noteUserForm" style="height:70%">
                    <textarea class="w-100  mt-2" id = "noteUserJam"  style="height:70%"   >Inserisci le tue note per l'utente</textarea>
                    <button  id  = "noteUserInput"   type="button" value = "Salva note" class="btn  btn-sm "  style="height:30%"  >Salva</button>
                  </div>
                </div>
              </div>
              <div class = "d-flex justify-content-center" style="height:30% ">
                <div  class= " w-100 h-100 ">
                  <label  >----------------------- Valutazione media utente -----------------------</label>
                  <div class ="d-flex justify-content-center" id="ratingProfessionalita">
                    <label  class = "mr-1">Professionalità:</label>
                    <div id ="starProfessionalita">  </div>
                  </div>
                  <div class ="d-flex justify-content-center" id="ratingPerformance">
                    <label class = "mr-3">Performance:</label>
                    <div id ="starPerformance">  </div>
                  </div>
                  <div class ="d-flex justify-content-center" id="ratingImpressioni">
                    <label class = "mr-4">Impressioni:</label>
                    <div id ="starFeeling">  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php include 'components/footer.php';?>
    <!-- Footer -->
    <!-- include modal -->
    <?php include 'modal/showJamModal.php';?>
    <?php include 'modal/updateJamModal.php';?>
    <?php include 'modal/newJamModal.php';?>
    <?php include 'modal/noteModal.php';?>
    <?php include 'modal/acceptInviteModal.php';?>
    <?php include 'modal/acceptInviteModal.php';?>
    <?php include 'modal/checkModal.php';?>


  </body>
  </html>
