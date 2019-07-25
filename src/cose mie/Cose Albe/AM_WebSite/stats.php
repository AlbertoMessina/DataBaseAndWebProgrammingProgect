<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.html#login'); </script>"; 
	}
?>

<!DOCTYPE HTML>

<html>
	
	<head>
		
		<title>Statistiche</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Style -->
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link rel="stylesheet" href="assets/css/standard.css" />
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
												<li><a class='menuButtons' href='home.php'>Home</a></li>
												<li><a class='menuButtons'>Gestione SitoWeb</a>
													<ul>
														<li><a href='gestione_clienti.php'>Gestione Clienti</a></li>
														<li><a href='gestione_sviluppatori.php'>Gestione Sviluppatori</a></li>
														<li><a href='gestione_layout.php'>Gestione Layout</a></li>
														<li><a href='gestione_sitiWeb.php'>Gestione Siti Web</a></li>
														<li><a href='riepilogo_sito.php'>Riepilogo Sito</a></li>
													</ul>
												</li>
												<li class='current_page_item'><a class='menuButtons' href='stats.php'>Stats</a></li>
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
												<li style='margin-left:0.5em;'><a class='menuButtons' href='home.php'>Home</a></li>
												<li><a class='menuButtons' href='gestione_layout.php' > Gestione Layout </a></li>
												<li class='current_page_item'><a class='menuButtons' href='stats.php'>Stats</a></li>
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
												<li><a class='menuButtons' href='home.php'>Home</a></li>
												<li><a class='menuButtons' href='gestione_sitiWeb.php'>Gestione Siti Web</a></li>
												<li class='current_page_item'><a class='menuButtons' href='stats.php'>Stats</a></li>
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
												<h2>Statistiche</h2>
												<p>Scopri le statistiche del sito!</p>
											</header>
											
											<!-- Contenuto -->
											<div class="row" id="myDiv">
												
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
						<div class="row">
							<!--
							<div class="3u 12u(mobile)">
									<section>
										<h2>Filler Links</h2>
										<ul class="divided">
											<li><a href="#">Quam turpis feugiat dolor</a></li>
											<li><a href="#">Amet ornare in hendrerit </a></li>
											<li><a href="#">Semper mod quisturpis nisi</a></li>
											<li><a href="#">Consequat etiam phasellus</a></li>
											<li><a href="#">Amet turpis, feugiat et</a></li>
											<li><a href="#">Ornare hendrerit lectus</a></li>
											<li><a href="#">Semper mod quis et dolore</a></li>
											<li><a href="#">Amet ornare in hendrerit</a></li>
											<li><a href="#">Consequat lorem phasellus</a></li>
											<li><a href="#">Amet turpis, feugiat amet</a></li>
											<li><a href="#">Semper mod quisturpis</a></li>
										</ul>
									</section>
							</div> -->
							
							<!-- 
							<div class="3u 12u(mobile)">
									<section>
										<h2>More Filler</h2>
										<ul class="divided">
											<li><a href="#">Quam turpis feugiat dolor</a></li>
											<li><a href="#">Amet ornare in in lectus</a></li>
											<li><a href="#">Semper mod sed tempus nisi</a></li>
											<li><a href="#">Consequat etiam phasellus</a></li>
										</ul>
									</section>
				
									<section>
										<h2>Even More Filler</h2>
										<ul class="divided">
											<li><a href="#">Quam turpis feugiat dolor</a></li>
											<li><a href="#">Amet ornare hendrerit lectus</a></li>
											<li><a href="#">Semper quisturpis nisi</a></li>
											<li><a href="#">Consequat lorem phasellus</a></li>
										</ul>
									</section>

							</div> -->
				
							
							<div class="6u 12u(mobile)">

								<!--
									<section>
										<h2><strong>ZeroFour</strong> by HTML5 UP</h2>
										<p>Hi! This is <strong>ZeroFour</strong>, a free, fully responsive HTML5 site
										template by <a href="http://twitter.com/ajlkn">AJ</a> for <a href="http://html5up.net/">HTML5 UP</a>.
										It's <a href="http://html5up.net/license/">Creative Commons Attribution</a>
										licensed so use it for any personal or commercial project (just credit us
										for the design!).</p>
										<a href="#" class="button alt icon fa-arrow-circle-right">Learn More</a>
									</section>
								-->
								
								<!-- Contact -->
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
						</div>
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