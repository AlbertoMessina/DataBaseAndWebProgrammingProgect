<?php

include '$Funzioni.php';
include '$Query.php';

// Controlla se è presente il cookie
$var_session = controllo_cookie();

class formattazione {

    public function start() {
		
		// Effettua il controllo sui cookie
		$var_session = controllo_cookie();
		?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Librerie css -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href="css/Personalizzazione.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">
	<!-- FIne librerie css -->
	
</head>

<body style=" background-color: #ABABAB;">

	<!-- Menu navigazione -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <a class="navbar-brand" href="index.php"><i style="margin-right: 10px;" class="fa fa-home" aria-hidden="true"></i>Home</a>
        <ul class="nav navbar-right top-nav">
			
			<?php
			
			// Menu utente
			if($var_session["login"] == 1) {
				?>
				<li><a href="Account.php"><i style="margin-right: 10px;" class="fa fa-user" aria-hidden="true"></i>Account</a></li>
				<li><a href="Logout.php"><i style="margin-right: 10px;" class="fa fa-sign-out" aria-hidden="true"></i></i>Logout</a></li>
				<?php
			}
			
			// Menu visitatore
			else {
				?>
				<li><a href="Registrazione.php"><i style="margin-right: 10px;" class="fa fa-registered" aria-hidden="true"></i>Registrati</a></li>
				<li><a href="Login.php"><i style="margin-right: 10px;" class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
				<?php
			}
			?>
			
        </ul>
	</nav>
	<!-- Fine menu navigazione -->

    <!-- Librerie js -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/clean-blog.min.js"></script>
	<script src="js/Funzioni.js"></script>
	<!-- Fine librerie js -->

</body>
</html>
	
	<?php
	}
}