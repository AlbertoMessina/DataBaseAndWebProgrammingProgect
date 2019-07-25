<!DOCTYPE html>
<html lang="en">
<head>
   <title>Lets' Jam</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="libs/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
   <link href="css/main.css" rel="stylesheet">
   <script src="libs/jquery.min.js"></script>
   <script src="libs/popper.min.js"></script>
   <script src="libs/bootstrap.min.js"></script>
   <script type = "text/javascript" src = "js/scripts.js" ></script>
</head>
<body>
   <div class="row m-0 w-100">
      <div class="col-12 p-0">
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav d-flex w-100">

                  <li class="nav-item">
                     <a class="nav-link" href="#About-us">About Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#contact">Contatti</a>
                  </li>
                  <li class="dropdown d-flex align-items-center ml-auto  ">
                     <button type="button" class="btn btn-sm btn-secondary dropdown-toggle my-2 my-sm-0 cursor-pointer" data-toggle="dropdown"  >Login</button>
                     <div class="dropdown-menu mt-2 p-2 border border-dark" style="left:-200px; right:0px">
                        <div class="dropdown-header">Inserisci i tuoi dati di accesso:</div>
                        <!-- form login-->
                        <form class="form" role="form" method="POST" action="phpOperation/login.php" accept-charset="UTF-8" id="login-nav">
                           <div class="form-group">
                              <label class="dropdown-item-text mb-1 pl-0" for="InputUsername">Email:</label>
                              <input type="email" class="form-control pl-1" name="email" placeholder="Inserisci l'email" required>
                           </div>
                           <div class="form-group">
                              <label class=" dropdown-item-text mb-1 pl-0" for="InputPassword">Password:</label>
                              <input type="password" class="form-control pl-1" name="password" placeholder="Password" required>
                              <!-- <div class="help-block text-right"><a href="">Reset password ?</a></div> Questo mettilo se vuoi fare un riinvio pass-->
                              <!--Per fare il rinvioo dovresti chiedere username e email, generare una passw casuale , metterla nel DB e fornire tramite mai la password nuova all'utente -->
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-block cursor-pointer">Sign in</button>
                           </div>
                        </form>
                        <!-- fine form login-->
                        <div class="bottom text-center">
                           <label> New here ? </label>
                           <botton><a href="registrazione.php" class="cursor-pointer"> Join</a> </botton>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
   </div>  <!--Fine Nav-->
   <hr style="border:solid">
   <div class="row w-100 mt-2 m-0" id="Home">

      <!--Carosello-->
      <div class="col-md-2" ></div>
      <div class="col-md-8">
         <div id="my-carousel" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
               <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
               <li data-target="#my-carousel" data-slide-to="1"></li>
               <li data-target="#my-carousel" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="imm_carousel" src="img/musica5.jpg" alt="Los Angeles" >
                  <div class="carousel-caption">
                     <h3>Crea la tua sessione Jam</h3>
                     <p>Raggiungi più facilmente i tuoi amici</p>
                  </div>
               </div>
               <div class="carousel-item ">
                  <img class="imm_carousel" src="img/musica2.jpg" alt="Chicago">
                  <div class="carousel-caption">
                     <h3>Crea la live experience</h3>
                     <p>Costruisci il tuo evento live e fai nuove amicizie</p>
                  </div>
               </div>
               <div class="carousel-item ">
                  <img class="imm_carousel" src="img/musica3.jpg" alt="New York" >
                  <div class="carousel-caption">
                     <h3>Fai scorrere la musica</h3>
                     <p>Crea il tuo evento e lascia che sia musica!!</p>
                  </div>
               </div>
            </div>

            <a class="carousel-control-prev" role="button" href="#my-carousel" data-slide="prev" >
               <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" role="button"  href="#my-carousel" data-slide="next">
               <span class="carousel-control-next-icon"></span>
            </a>
         </div>
         <!--</div>-->
         <!--Fine Carosello-->
         <div class="col-md-2"></div>
      </div> <!--Fine colonna carosello-->
   </div> <!--fine row -->
   <hr  style="border:solid">

   <!--Info About Us-->
   <div class="row w-100 p-2 m-0" id="About-us">
      <div class="col-12"  style="background-color: rgba(252, 239, 222, 0.692)">
         <div class="row d-flex align-items-center justify-content-center">
            <span class=" border rounded mx-auto shadow p-2 mb-2 bg-white"><h3 class="m-0 px-2">About Us</h3></span>
         </div>
         <!--Card-->
         <div class="row mt-1"> <!--Primo gruppo di Card-->
            <div class="col-6">
               <div class="card ml-2 p-2">
                  <div class="card-body">
                     <div class="row">
                        <div class= "col-4">
                           <img class="card-img-top mb-2" src="img/liveMusic.png" alt="Card image" style="width:150px; height:150px">
                        </div>
                        <div class="col-6">
                           <h4 class="card-title d-flex align-items-center justify-content-center">Oraganizzazione</h4>
                           <p class="card-text">Organizza le tue sessioni live.</p>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
            <div class="col-6">
               <div class="card ml-2 p-2">
                  <div class="card-body">
                     <div class="row">
                        <div class= "col-4">
                           <img class="card-img-top mb-2" src="img/link1.jpg" alt="Card image" style="width:150px; height:150px">
                        </div>
                        <div class="col-6">
                           <h4 class="card-title d-flex align-items-center justify-content-center">Connessioni</h4>
                           <p class="card-text">Connettiti in modo rapido e veloce con tutti i tuoi contatti.</p>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>                        <!--Fine primo gruppo-->
         <div class="row mt-1">  <!--Secondo gruppo Card-->
            <div class="col-6">
               <div class="card ml-2 p-2">
                  <div class="card-body">
                     <div class="row">
                        <div class= "col-4">
                           <img class="card-img-top mb-2" src="img/musica4.jpg" alt="Card image" style="width:150px; height:150px">
                        </div>
                        <div class="col-6">
                           <h4 class="card-title d-flex align-items-center justify-content-center">Partecipa</h4>
                           <p class="card-text">Agli eventi musicali più gettonati del momento.</p>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
            <div class="col-6">
               <div class="card ml-2 p-2">
                  <div class="card-body">
                     <div class="row">
                        <div class= "col-4">
                           <img class="card-img-top mb-2" src="img/strumenti1.jpg" alt="Card image" style="width:150px; height:150px">
                        </div>
                        <div class="col-6">
                           <h4 class="card-title d-flex align-items-center justify-content-center">Esponi</h4>
                           <p class="card-text">I tuoi strumenti con cui prendere parte agli eventi.</p>
                        </div>
                     </div>

                  </div>
               </div>
            </div>

         </div>                  <!--Fine Secondo gruppo-->
      </div>

   </div>        <!--Fine Info About Us-->




   <!-- Footer -->


   <?php include 'components/footer.php'; ?>
   <!-- Footer -->
</body>
</html>
