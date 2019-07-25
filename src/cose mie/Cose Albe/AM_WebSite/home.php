<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.html#login'); </script>"; 
	}
?>

<!DOCTYPE HTML>

<html>
	
	<head>
		
		<title>Home: Web Sites Developer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Style -->
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<style>
			.image:before {opacity: 0.3;}
		</style>
		
	</head>
	
	
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div class="container">

						<!-- Header -->
							<header id="header" >
								<div class="inner">

									<!-- Logo -->
										<h1 ><a href="home.php" id="logo" >Web Sites Developer</a></h1>

									<!-- Nav -->
										
										<nav id="nav">
											
											<?php
											// Administrator
											if($_SESSION["tipologia"]==1){ echo"
											<ul>
												<li class='current_page_item'><a class='menuButtons' href='home.php'>Home</a></li>
												<li><a class='menuButtons'>Gestione SitoWeb</a>
													<ul>
														<li><a href='gestione_clienti.php'>Gestione Clienti</a></li>
														<li><a href='gestione_sviluppatori.php'>Gestione Sviluppatori</a></li>
														<li><a href='gestione_layout.php'>Gestione Layout</a></li>
														<li><a href='gestione_sitiWeb.php'>Gestione Siti Web</a></li>
														<li><a href='riepilogo_sito.php'>Riepilogo Sito</a></li>
													</ul>
												</li>
												<li><a class='menuButtons' href='stats.php'>Stats</a></li>
												<li>
													<i class='second icon fa-cog menuButtons' style='font-size: 1.2em; border-radius: 4px; padding: 0.1em; color:white; margin-top:0.5em;'></i>
													<ul>
														<li><a href='logout.php'>Logout</a></li>
													</ul>
												</li>
											</ul>";}
											
											// Developer
											if($_SESSION["tipologia"]==2){ echo "		
											<ul>
												<li style='margin-left:0.5em;' class='current_page_item'><a class='menuButtons' href='home.php'>Home</a></li>
												<li><a class='menuButtons' href='gestione_layout.php' > Gestione Layout </a></li>
												<li><a class='menuButtons' href='stats.php'>Stats</a></li>
												<li>
													<i class='second icon fa-cog menuButtons' style='font-size: 1.2em; border-radius: 4px; padding: 0.1em; color:white; margin-top:0.5em;'></i>
													<ul>
														<li><a href='logout.php'>Logout</a></li>
													</ul>
												</li>
											</ul>";}
											
											// Client
											if($_SESSION["tipologia"]==3){ echo "
											<ul>
												<li class='current_page_item'><a class='menuButtons' href='home.php'>Home</a></li>
												<li><a class='menuButtons' href='gestione_sitiWeb.php'>Gestione Siti Web</a></li>
												<li><a class='menuButtons' href='stats.php'>Stats</a></li>
												<li>
													<i class='second icon fa-cog menuButtons' style='font-size: 1.2em; border-radius: 4px; padding: 0.1em; color:white; margin-top:0.5em;'></i>
													<ul>
														<li><a href='logout.php'>Logout</a></li>
													</ul>
												</li>
											</ul>";}
											?>
										</nav>
										
								</div>
							</header>
					</div>
				</div>

            
			<!-- Main Wrapper -->
			<div id="main-wrapper">
					<div class="wrapper style2">
						<div class="inner">
							<div class="container">
								<div id="content">


									<!-- Content -->

										<article>
											
											<!-- Header del content -->
											<header class="major">
												<h2>HomePage</h2>
												<p style='font-size:1.5em;'>Benvenuto <?php echo $_SESSION['nomeUtente'] ." " .$_SESSION['cognomeUtente']?>!</p>
											</header>
											
											<!-- Contenuto -->
											<div class="row" id="myDiv">
												<div class="4u 12u(mobile)" style='width:50%;'>
													<div id="sidebar">
														<section>
															<?php
															if($_SESSION["tipologia"]==3){ echo "
															<p style='font-size:1.5em;'>Grazie per aver effettuato il login. Ora che sei loggato puoi accedere ai servizi offerti dal nostro
															sito web. In particolare cliccando sull'opportuno bottone (<a href='gestione_sitiWeb.php'>Gestione SitiWeb</a>) puoi visualizzare
															tutti i siti Web da te commissionati. </p>
															<p style='font-size:1.5em;'>Ricorda che per poter commissionare un sito occorre contattarci presso uno dei nostri
															<a href='home.php#footer-wrapper'> riferimenti</a>. Saremo lieti di ascoltarti e di realizzare la tua richiesta.</p>
															<p style='font-size:1.5em;'>Se anche dopo esserti registrato hai dei dubbi circa il nostro servizio controlla le
															statistiche nell'apposita <a href='stats.php'>pagina</a>: scoprirai che sono già in molti ad averci scelto!
															</p>
															";}
															if($_SESSION["tipologia"]==2){ echo "
															<p style='font-size:1.5em;'>Grazie per aver effettuato il login. Ora che sei loggato puoi accedere ai servizi offerti dal nostro
															sito web. In particolare cliccando sull'opportuno bottone (<a href='gestione_layout.php'>Gestione Layout</a>)  puoi visualizzare
															tutti i tuoi layout e moduli e gestirli come più preferisci. Ricorda che è possibile accedere unicamente ai tuoi layout e che
															ogni modifica effettuata è definitiva sul database del sito.</p>
															<p style='font-size:1.5em;'>Per ulteriori informazioni contatta un amministratore presso uno dei nostri <a href='home.php#footer-wrapper'>
															contatti</a> (in fondo alla pagina).</p>
															<p style='font-size:1.5em;'></p>
															";}
															if($_SESSION["tipologia"]==1){ echo "
															<p style='font-size:1.5em;'>Grazie per aver effettuato il login. Ora che sei loggato puoi gestire il Sito Web in tutti
															i suoi dettagli. In particolare cliccando sul bottone 'Gestione SitoWeb' puoi accedere a tutte le pagine per gestire: Layout degli
															sviluppatori, Moduli, Utenti, Sviluppatori e Siti Web. Sempre nella sezione 'Gestione SitoWeb' è presente infine una pagina riassuntiva
															del sito stesso.
															</p>
															<p style='font-size:1.5em;'>Ricorda che ogni modifica apportata è definitiva sul database, dunque procedi con cautela.</p>
															<p style='font-size:1.5em;'></p>
															";}
															?>
														</section>
													</div>
												</div>
												
												<div class="8u 12u(mobile) important(mobile)" style='width:50%;'>
													<div id="content">
			
														<!-- Content -->
														<article>
															<span class="image featured"><img style="border-radius: 0 10px 10px 0;" src="<?php if ($_SESSION['tipologia']==3) echo 'images/homepage.jpg'; if ($_SESSION['tipologia']==2) echo 'images/homepage2.jpg'; if ($_SESSION['tipologia']==1) echo 'images/homepage3.jpg'; ?>" alt="" /></span> 
														</article>
													</div>
												</div>
											</div>
                                        
										</article>

								</div>
							</div>
						</div>
					</div>
					
				</div>

			<!-- Footer Wrapper -->
				<div id="footer-wrapper" style="padding: 3em 20px 0em 20px;">
					<footer id="footer" class="container">
						
						<!-- Contact&Maps -->
						<div class="row">
							<!-- Contact -->
							<div class="3u 12u(mobile)">
									<section>
										<h2>Contatti</h2>
										<div>
											<div class="row">
												<div class="6u 12u(mobile)">
													<dl class="contact">
														<dt>Twitter</dt>
														<dd><a href="https://twitter.com/A_Messina95">@A_Messina95</a></dd>
														<dt>Facebook</dt>
														<dd><a href="https://www.facebook.com/alessandro.messina.161">Alessandro Messina</a></dd>
														<dt>WWW</dt>
														<dd><a href="index.html">www.WebSitesDelevoper.com</a></dd>
														<dt>Email</dt>
														<dd><a href="https://outlook.live.com">alessandromessina95@hotmail.com</a></dd>
														<dt>Address</dt>
														<dd style="width:27em;">
															Università degli studi di Catania (Cittadella Universitaria),
															Viale Andrea Doria, Catania, Sicilia, Italia
														</dd>
														<dt>Phone</dt>
														<dd>3496795227</dd>
													</dl>
												</div>
											</div>
										</div>
									</section>
							</div>
							
							<div class="3u 12u(mobile)">
							</div>
							
							<!-- GoogleMaps -->
							<div class="6u 12u(mobile)">
								<section>
									<div id="map" style="width:100%;height:350px; float:right; border:3px solid RGB(25,25,25); border-radius: 5px"></div>
								</section>
							</div> 
						</div>
						
						<!-- Copyright -->
						<div class="row" >
							<div class="12u">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; Web Sites Developer. All rights reserved. <br> Delevoper: Alessandro Messina.</li>
									</ul>
								</div>
							</div>
						</div>
						
					</footer>
				</div>

		</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			
			<!-- GoogleMaps -->
			<script>
				function myMap() {
				var myCenter = new google.maps.LatLng(37.526202,15.074738);
				var mapCanvas = document.getElementById("map");
				var mapOptions = {center: myCenter, zoom: 17};
				var map = new google.maps.Map(mapCanvas, mapOptions);
				var marker = new google.maps.Marker({position:myCenter});
				marker.setMap(map);
				}
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAljVXs_QCdn1caX2YjBzeVu4txFO5Rdfg&callback=myMap"></script>
			
			<!-- JQuery -->
			<script>
			$(document).ready(function(){
				var previousColor;
				$(".menuButtons").mouseover(function(){
					previousColor = $(this).css("background-color");
					$(this).css("background-color", "darkgray");
				});
				$(".menuButtons").mouseout(function(){
					
					$(this).css("background-color", previousColor);
				});
			});
			</script>

	</body>
	
</html>