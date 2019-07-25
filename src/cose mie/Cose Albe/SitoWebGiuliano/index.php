<?php

include 'struct/$MasterPage.php';

$template = new formattazione;
$template->start();

?>

<html>
    
<head>
    <title>Index</title>
</head>
    
<body>
        
<!-- Presentazione -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Vuoi aprire una attività online?</h1>
                    <hr class="small">
                    <span class="subheading">Creiamo noi il sito web su misura per te!</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Fine presentazione -->

<!-- Contenuti in evidenza -->
<div class="container">
    <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="post-preview">
            <a href="Registrazione.php">
                <h2 class="post-title">
                    Per iniziare registrati!
                </h2>
            </a>
            <p style="color:white;" class="post-meta">Registrandoti potrai selezionare il layout che fa al tuo caso o vagliare soluzioni alternative!</p>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="post-preview">
            <a href="Login.php">
                <h2 class="post-title">
                    Sei registrato? Accedi!
                </h2>
            </a>
            <p style="color:white; margin-bottom: 0px;" class="post-meta">Effettuando il login potrai accedere alla pagina "Account" in cui potrai monitorare i siti web commissionati!</p>
        </div>
    </div>
</div>
<!-- Fine contenuti in evidenza -->

<!-- Info sito -->
<section id="services">
    <div style="margin-top: -40px;" class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 style="text-align: center;" class="section-heading">Funzionalit&agrave</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
	    <div class="row">
	        <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i style="color: black;" class="fa fa-4x fa fa-archive text-primary sr-icons"></i>
                    <h3 style="text-align: center;">Scegli un layout</h3>
                    <p style="color: white;" class="text-muted">Non hai un idea ben precisa di come dovrà essere il tuo sito? Scegli tra uno dei nostri layout!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i style="color: black;" class="fa fa-4x fa fa-child text-primary sr-icons"></i>
                    <h3 style="text-align: center;">Consulenza</h3>
                    <p style="color: white;" class="text-muted">Non sei sicuro di comprare un sito da noi? Non ti preoccupare! Offriamo una consulenza iniziale completamente gratuita!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i style="color: black;" class="fa fa-4x fa fa-users text-primary sr-icons"></i>
                    <h3 style="text-align: center;">Sviluppatore</h3>
                    <p style="color: white;" class="text-muted">Non sei interessato ad acquistare un sito ma a lavorare con noi? Entra anche tu a far parte della nostra comunità di sviluppatori!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i style="color: black;" class="fa fa-4x fa-eur text-primary sr-icons"></i>
                    <h3 style="text-align: center;">Costi</h3>
                    <p style="color: white;" class="text-muted">Grazie alla presenza di svariati layout scegli quello che si avvicina maggiormente al tuo budget!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fine info sito -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <h2 style="text-align: center;">Contatti</h2>
            <hr>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="#">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Fine footer -->

</body>
</html>