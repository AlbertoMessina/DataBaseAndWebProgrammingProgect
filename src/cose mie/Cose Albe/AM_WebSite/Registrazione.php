<!DOCTYPE HTML>
	
<html>
	
	<head>
		
		<title>Registrazione</title>
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
		<link rel="stylesheet" href="assets/css/standard.css" />
		
	</head>
	
		<?php
			$username=$password=$nome=$cognome=$mail=$tipologia=$telefono=$codice=$citta=$indirizzo=$partitaIva="";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
				include("db.php");
				
				//Connessione host
				$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
				//Selezione database
				mysqli_select_db($connessione,$db) or die("Could not select database");
				
				//Prendo i parametri passati dal form
				$tipologia=$_POST["tipologia"];
				if ($tipologia == "cliente") $tipologia=3;
				if ($tipologia == "sviluppatore") $tipologia=2;
				$username=$_POST["username"];
				$password=$_POST["password"]; $password = md5 ($password);
				$nome=$_POST["nome"];
				$cognome=$_POST["cognome"];
				$mail=$_POST["mail"];
				$telefono=$_POST["telefono"];
				$codice=$_POST["codice"];
				
				$partitaIva=$_POST["partitaIva"];
				
				$citta=$_POST["citta"];
				$indirizzo=$_POST["indirizzo"];
				
				//Controllo se l'username inserito non è già presente (in realtà tale controllo è superfluo perchè lo faccio già con ajax, ma lo lascio lo stesso)
				$check = 1;
				$result_check=mysqli_query($connessione, "SELECT USERNAME FROM UTENTE")
							or die("Query failed : " . mysqli_error($connessione));
				if (mysqli_num_rows($result_check) > 0) {
					while($row = mysqli_fetch_assoc($result_check)) {
						if($username == $row["USERNAME"]){
							$check=0;
						}
					} 
				}
				
				//Controllo se lo sviluppatore ha inserito un codice corretto
				$checkCodice = 0;
				if ($tipologia == 2 || $tipologia == 3){	//Se l'utente è uno sviluppatore o un cliente devo fare il controllo sul suo codice	
					$result_cod=mysqli_query($connessione, "SELECT CODICE FROM CODICEUTENTE")
							or die("Query failed : " . mysqli_error($connessione));
					if (mysqli_num_rows($result_cod) > 0) {
						while($rowC = mysqli_fetch_assoc($result_cod)) {
							if($codice == $rowC["CODICE"]){
								$checkCodice=1;
							}
						} 
					}
				}else{	//Se l'utente che si registra non è uno sviluppatore o un cliente allora il controllo salta
					$checkCodice = 1;
				}
				
				//Query: insert into user only if $check and $checkCodiceS are TRUE
				if($check==1 && $checkCodice==1){
					$result = mysqli_query($connessione, "INSERT INTO UTENTE(USERNAME, PASSWORD, NOME, COGNOME, MAIL, TIPOLOGIA, TELEFONO) VALUES ('$username', '$password', '$nome', '$cognome', '$mail', '$tipologia', '$telefono');")
								or die("Query failed : " . mysqli_error($connessione));
					
					//Dopo aver inserito l'utente inserisco anche il relativo cliente o sviluppatore: il legame tra utente e cliente/sviluppatore è il suo numero di telefono
					if($tipologia==2){
						$result = mysqli_query($connessione, "INSERT INTO SVILUPPATORE VALUES ('$partitaIva', '$nome', '$cognome', '$telefono');")
								or die("Query failed : " . mysqli_error($connessione));	
					}
					if($tipologia==3){
						$result = mysqli_query($connessione, "INSERT INTO CLIENTE(CITTA, INDIRIZZO, TELEFONO, N_SITI, SPESA_TOTALE) VALUES ('$citta', '$indirizzo', '$telefono', 0, 0);")
								or die("Query failed : " . mysqli_error($connessione));
					}
							
					echo "<script> alert('Registrazione avvenuta con successo');</script>";
					echo "<script> window.location.assign('index.html'); </script>";
				}else{
					if($check==0){
						echo "<script> alert('Username non disponibile (già esistente)'); </script>";
					}
					if($checkCodice==0){
						echo "<script> alert('Codice non valido'); </script>";
					}
					echo "<script> window.location.assign('Registrazione.php#main-wrapper'); </script>";
				}
				
				mysqli_close($connessione);
			}
		?>
	
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div class="container">

						<!-- Header -->
							<header id="header" >
								<div class="inner">
									<!-- Logo -->
										<h1><a style="padding-left: 5em; vertical-align: middle; font-size: 2.3em; " href="index.html" id="logo" >Web Sites Developer</a></h1>
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
												<a href="index.html" style="float:right; margin-right:2em; margin-top:3em;z-index: 10;" id="backButton" class="button medium">Indietro</a>
												<h2>Registrazione</h2> 
												<p>Registrati sul sito compilando il form sottostante. <br>Per poter completare la registrazione devi inserire il codice utente <br>che ti arriverà
												   via sms dopo aver chiamato il nostro servizio clienti.</p>
												
											</header>
											
											<!-- Contenuto -->
											<div class="row" id="myDiv">
												<div class="4u 12u(mobile)">
													<div id="sidebar">
			
														<!-- Sidebar -->

														<section>
														<div id="formRegistrazione"  >
															<form NAME="Registrazione" METHOD="POST" onsubmit='return submitCheck()' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
																<fieldset style="max-width: 30em; border-radius: 10px 0 0 10px;">
																	<legend> &nbsp Form registrazione &nbsp </legend>
																	<TABLE>
																		<!-- campi dello sviluppatore e del cliente (dell'utente in generale) -->
																		<TR>
																			<TD>Tipo account:</TD>
																			<TD>
																				<select name="tipologia" style="border-radius: 0;" onchange='selectTipologia(this.value)' required">
																					<option id="sceltaOption" value="scelta" selected>Scegli una tipologia</option>
																					<option value="cliente">Cliente</option>
																					<option value="sviluppatore">Sviluppatore</option>
																				</select>
																			</TD>
																		</TR>
																		<TR class='utente' style='display:none;'>
																			<TD>Username:</TD>
																			<TD>
																				<INPUT onchange='checkUsername()' id="usernameInput" NAME="username" TYPE="text" SIZE="45" maxlength="45" required value="<?php echo $username;?>">
																			</TD>
																		</TR>
																		<TR class='utente' style='display:none;'>
																			<TD>Password:</TD>
																			<TD>
																				<INPUT NAME="password" TYPE="password" SIZE="45" maxlength="45" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La password deve contenere almeno un numero, una lettera in minuscolo, una in maiuscolo e almeno 8 caratteri">
																			</TD>
																		</TR>
																		<TR class='utente' style='display:none;'>
																			<TD>Nome:</TD>
																			<TD>
																				<INPUT NAME="nome" TYPE="text" SIZE="20" maxlength="20" required pattern="[A-Z, a-z,ò,à,ù,',ì,è,é]{1,20}" title="Può contenere solo lettere" value="<?php echo $nome;?>">
																			</TD>
																		</TR>
																		<TR class='utente' style='display:none;'>
																			<TD>Cognome:</TD>
																			<TD>
																				<INPUT NAME="cognome" TYPE="text" SIZE="20" maxlength="20" required pattern="[A-Z, a-z,ò,à,ù,',ì,è,é]{1,20}" title="Può contenere solo lettere" value="<?php echo $cognome;?>">
																			</TD>
																		</TR>
																		<TR class='utente' style='display:none;'>
																			<TD>Mail:</TD>
																			<TD>
																				<INPUT NAME="mail" TYPE="text" SIZE="255" maxlength="255" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $mail;?>" title="La mail deve essere del formato  caratteri@caratteri.dominio (con dominio di 2 o 3 lettere) e tutta in minuscolo">
																			</TD>
																		</TR>
																		<TR class='utente' style='display:none;'>
																			<TD>Telefono:</TD>
																			<TD>
																				<INPUT NAME="telefono" TYPE="tel" SIZE="15" maxlength="15" required pattern="[0-9, +]{1,15}" value="<?php echo $telefono;?>" title="Inserisci il numero di telefono con il quale ci hai contattato">
																			</TD>
																		</TR>
																		<TR class='utente' style='display:none;'>
																			<TD>Codice:</TD>
																			<TD>
																				<INPUT NAME="codice" TYPE="text" SIZE="12" maxlength="12" required title="Inserisci qui il codice personale inviatoti via sms per registrarti">
																			</TD>
																		</TR>
																		
																		<!-- campi dello sviluppatore -->
																		<TR class='sviluppatore' style='display:none;'>
																			<TD>Partita Iva:</TD>
																			<TD>
																				<INPUT onchange='checkPiva();' NAME="partitaIva" TYPE="text" SIZE="11" maxlength="11" required pattern="[0-9]{1,11}">
																			</TD>
																		</TR>
																		
																		
																		<!-- campi del cliente -->
																		<TR class='cliente' style='display:none;'>
																			<TD>Città:</TD>
																			<TD>
																				<INPUT NAME="citta" TYPE="text" SIZE="20" maxlength="20" value="<?php echo $citta;?>">
																			</TD>
																		</TR>
																		<TR class='cliente' style='display:none;'>
																			<TD>Indirizzo:</TD>
																			<TD>
																				<INPUT NAME="indirizzo" TYPE="text" SIZE="30" maxlength="30" value="<?php echo $indirizzo;?>">
																			</TD>
																		</TR>
																		
																		<!-- Invio del modulo -->
																		<TR class='utente' style='display:none;'>
																			<TD>
																				<INPUT TYPE="submit" VALUE="Invia">
																			</TD>
																			<TD>
																				<INPUT TYPE="reset">
																			</TD>
																		</TR>
																	</TABLE>
																</fieldset>
															</form>
														</div>
														</section>
													</div>
												</div>
												
												<div class="8u 12u(mobile) important(mobile)">
													<div id="content">
														<!-- Content -->
														<article>
															<span class="image featured" style='margin-top:3em;'><img style='border-radius: 0 10px 10px 0;' src="images/sito_web_reg.jpg" alt="" /></span>
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
				//Controllo la tipologia di account
				function selectTipologia(value){
					$("#sceltaOption").hide();
					if (value == 'sviluppatore'){
						document.Registrazione.partitaIva.value="";
						$(".sviluppatore").show();
						$(".cliente").hide();
						$(".utente").show();
					}else{
						document.Registrazione.partitaIva.value='0';
						$(".sviluppatore").hide();
						$(".cliente").show();
						$(".utente").show();
					}
				}
				
				var checkUsrn = true;
				var checkPartiva = true;
				//Se l'username inserito è già presente nel db, allora informo l'utente.
				function checkUsername(){
					checkUsrn = true;
					var user = document.Registrazione.username.value;
					$.ajax({
                        url: 'check/checkUsername.php',
                        type: "get",
                        success:
                            function (data) {
                                var ar = JSON.parse(data);
                                var i = 0;
                                for (i = 0; i < ar.length; i++) {
                                    if (user == ar[i].USERNAME){
										alert("Username già utilizzato!");
										checkUsrn=false;
									}
                                }
                            }
                    });
				}
				
				function checkPiva(){
					checkPartiva = true;
					var piva = document.Registrazione.partitaIva.value;
					$.ajax({
                        url: 'check/checkPiva.php',
                        type: "get",
                        success:
                            function (data) {
                                var ar = JSON.parse(data);
                                var i = 0;
                                for (i = 0; i < ar.length; i++) {
                                    if (piva == ar[i].PIVA){
										alert("Partita Iva già utilizzata!");
										checkPartiva=false;
									}
                                }
                            }
                    });
				}
				
				//Se l'username inserito o la partita iva inserita è già presente nel db allora non faccio proprio effettuare il submit!
				function submitCheck(){
					if (checkUsrn == false){
						alert("Impossibile effettuare la registrazione: username già utilizzato!");
						return false;
					}else if(checkPartiva == false){
							alert("Impossibile effettuare la registrazione: partita iva già utilizzata!");
							return false;
						}else
							return true;
				}
				
			</script>
			
	</body>
	
</html>