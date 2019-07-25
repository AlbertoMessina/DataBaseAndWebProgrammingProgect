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
   <script src="libs/moment.js"></script>
   <script type = "text/javascript" src = "js/scripts.js"></script>
   <script type = "text/javascript" src = "js/signUp.js"></script>
</head>
<body>
   <div class="row w-100 m-0">
      <div class="col-12 2-100 m-0 p-0 ">
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php" >Home</a>
            <button class="navbar-toggler cursor-pointer" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">

            </div>
         </nav>
      </div>
   </div>



   <div class="row w-100  mt-4 m-0">
      <div class="container border border-seconday rounded ">
         <form class="form-horizontal" role="form" method="POST" action="phpOperation/registrazione_form.php" enctype="multipart/form-data" >
            <div class="row d-flex justify-content-center border-bottom my-2">
               <div>
                  <h2>Register New User</h2>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3 field-label-responsive">
                  <label for="name">FirstName* :</label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center">
                        <div class="input-group-addon fa fa-address-card" style="width: 2.6rem"></div>
                        <input type="text" name="FirstName" class="form-control text-capitalize" id="name"
                        placeholder="Inserisci il tuo nome" required autofocus>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3 field-label-responsive">
                  <label for="email">LastName* :</label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center  text-capitalize">
                        <div class="input-group-addon fa fa-address-card" style="width: 2.6rem"></span></div>
                        <input type="text" name="LastName" class="form-control text-capitalize" id="LastName"
                        placeholder="Inserisci il tuo cognome" required autofocus>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3 field-label-responsive">
                  <label for="email">E-Mail Address* :</label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center">
                        <div class="input-group-addon fa fa-at" style="width: 2.6rem"></div>
                        <input type="email" name="email" class="form-control" id="email"
                        placeholder="Inserisci la tua e-mail" required autofocus>
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
                  <label for="password">Password* :</label>
               </div>
               <div class="col-md-6">
                  <div class="row form-group has-danger">
                     <div class=" col-12 input-group mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center">
                        <div class="input-group-addon fa fa-key" style="width: 2.6rem"></div>
                        <input type="password" name="password" class="form-control" id="passInput"
                        placeholder="insersici la password" required>
                     </div>

                     <div class="col-12 input-group mb-2 mr-sm-2 mb-sm-0 d-flex ">
                        <div class="ml-auto mt-1">
                           <input type="checkbox" class="form-check-input" id="check-Pass">
                           <label class="form-check-label" for="check-Pass">Mostra password</label>
                        </div>

                     </div>
                  </div>

               </div>
               <div class="col-md-3">
                  <div class="form-control-feedback">
                     <span class="text-danger align-middle" id="passError"> </span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3 field-label-responsive">
                  <label for="password">Confirm Password* :</label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="password" name="password-confirmation" class="form-control"
                        id="password-confirm" placeholder="Password"  required>
                     </div>
                  </div>
               </div>
            </div>
            <!--Dovresti fare una funzione per questa gestione password con l'altra-->
            <div class="row">
               <div class="col-md-3 field-label-responsive">
                  <label for="birth">Birth* :</label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group  mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center">
                        <div class="input-group-addon fa fa-calendar" style="width: 2.6rem">

                        </div>
                        <input type="date" name="birth-date" class="form-control"
                        id="birth" required>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-control-feedback">
                     <span class="text-danger align-middle" id="ageError"></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-3 field-label-responsive">
                  <label for="imm-profile">Profile Picture:</label>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group mb-2 mr-sm-2 mb-sm-0  d-flex align-items-center">
                        <div class="input-group-addon fa fa-folder" style="width: 2.6rem">

                        </div>
                        <input type="file" name="immage" class="form-control"
                        id="imm-profile">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-control-feedback">
                     <span class="text-danger align-middle" id="imageTypeError"> </span>
                     <span class="text-danger align-middle" id="imageSizeError"> </span>
                  </div>
               </div>
            </div>

            <div class="row my-2 border-top ">
               <div class="col-md-3 d-flex align-items-center mt-1"> <label>Field with * are required</label></div>
               <div class="col-md-6 d-flex align-items-center justify-content-center p-1 mt-1">
                  <button type="submit" class="btn btn-success cursor-pointer" id="input-button"><span class="fa fa-user-plus"></span> Register</button>
               </div>
            </div>
         </form>
      </div>
   </div>
      <!-- Footer -->
      <?php include 'components/footer.php';?>
      <!-- Footer -->
</body>
</html>
