<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] != 1){
		echo "<script> alert('Permesso negato'); window.location.assign('home.php'); </script>";
	}
?>

<!DOCTYPE HTML>

<html>
	
	<head>
		
		<title>Gestione Clienti</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Style -->
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
		
		<style>
			.image:before {opacity: 0.3;}
			/* Table */
			table {
				display: table;
				border-collapse: separate;
				border-spacing: 2px;
				border-color: gray;
			}
			td {
				display: table-cell;
				vertical-align: middle;
			}
			th {
				display: table-cell;
				vertical-align: inherit;
				font-weight: bold;
				text-align: center;
			}
			tr {
				display: table-row;
				vertical-align: inherit;
				border-color: inherit;
			}
			
			/* Form */
			form {
				display: block;
				margin-top: 0em;
			}
			caption { 
				display: table-caption;
				text-align: center;
				color: black;
			}
			legend {
				font-size: 1.2em;
				font-weight: bold;
				display: block;
				padding-left: 2px;
				padding-right: 2px;
				border: none;
			}
			fieldset { 
				display: block;
				margin-left: 2px;
				margin-right: 2px;
				padding-top: 0.35em;
				padding-bottom: 0.625em;
				padding-left: 0.75em;
				padding-right: 0.75em;
				border: 2px groove (internal value);
				border: 1px solid RGBA(40,40,40,0.30);
				border-radius: 10px;
			}
			input[type=text], input[type=number], input[type=tel]{
				padding: 0;
				height: 1.5em;
				border: 1px solid RGBA(50,50,50,0.1);
				border-radius: 7px;
			}
			input:focus{
				outline-color: rgba(255,255,255,0);
			}
			input[type=text]:focus{
				padding: 0;
				height: 1.5em;
				border: 1px solid RGBA(50,50,50,0.1);
				border-radius: 7px;
				outline-color: rgba(255,255,255,0);
			}
			button, input[type=button], button[type=button]{
				padding: 0 0.5em 0 0.5em;
				overflow: hidden; 
				font-size: 1em;
				background: rgba(50, 50, 50, 0.6);
			}
			button[type=button]{
				padding: 0.5em;
				overflow: hidden; 
				font-size: 1em;
				background: rgba(50, 50, 50, 0.8);
			}
			input[type=submit]{
				font-size: 1em;
				padding: 0 0.5em 0 0.5em;
				margin-top: 1em;
				overflow: hidden;
				background: rgba(50, 50, 50, 0.6);
				height: 1.8em;
			}
		</style>
		
		<?php
			//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
			include("db.php");
			
			//Connessione host
			$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
			//Selezione database
			mysqli_select_db($connessione,$db) or die("Could not select database");
				
			$codiceCliente="";
			if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["codiceCliente"])) {
				//Prendo i parametri passati dal form
				$codiceCliente=$_POST["codiceCliente"];
				
				$result = mysqli_query($connessione, "select * from CLIENTE where CODICE = '$codiceCliente';")
							or die("Query failed : " . mysqli_error($connessione));
				if (mysqli_num_rows($result)) {
					$result2 = mysqli_query($connessione, "delete from SITO_WEB where CLIENTE = '$codiceCliente';")
							or die("Query failed : " . mysqli_error($connessione));
					$result4 = mysqli_query($connessione, "delete from UTENTE where TELEFONO=(select TELEFONO from CLIENTE where CODICE = '$codiceCliente');")
							or die("Query failed : " . mysqli_error($connessione));
					$result3 = mysqli_query($connessione, "delete from CLIENTE where CODICE = '$codiceCliente';")
							or die("Query failed : " . mysqli_error($connessione));
					
					echo "<script> alert('Eliminazione avvenuta con successo');</script>";
				}else echo "<script> alert('Nessun cliente con tale Codice è presente nel db');</script>";
			}
			
			$resultShowC = mysqli_query($connessione, "SELECT * FROM CLIENTE");
			
            mysqli_close($connessione);
		?>
		
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
												<li class='current_page_item'><a class='menuButtons'>Gestione SitoWeb</a>
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
												<h2>Gestione Clienti</h2>
												<p>Gestisci i clienti del sito</p>
											</header>
											
											<!-- Contenuto -->
											<h1 style='border: 1px solid RGBA(40,40,40,0.30);text-align:center;'>Gestione Clienti</h1>
											<div class="row" id="myDiv">
												<div class="row" id="divCliente">
												<!-- FORM SVILUPPATORE -->
												<div id="formSviluppatore" style="float:left; width:25em;">
												<FORM NAME="Iscrizione_Cliente" ACTION="insert/insert_cliente.php" METHOD="POST"> 
													<fieldset style="max-width: 20em;">
														<legend> &nbsp Iscrizione Cliente &nbsp </legend>
														<TABLE>
															<TR>
																<TD>Telefono:</TD>
																<TD>
																	<INPUT NAME="telefono" TYPE="tel" SIZE="15" maxlength="15" required pattern="[0-9, +]{1,15}">
																</TD>
															</TR>
															<TR>
																<TD>Città:</TD>
																<TD>
																	<INPUT NAME="citta" TYPE="text" SIZE="20" maxlength="20">
																</TD>
															</TR>
															<TR>
																<TD>Indirizzo:</TD>
																<TD>
																	<INPUT NAME="indirizzo" TYPE="text" SIZE="30" maxlength="30">
																</TD>
															</TR>
															<!-- Invio del modulo -->
															<TR>
																<TD>
																	<INPUT TYPE="submit" VALUE="Invia">
																</TD>
															</TR>
														</TABLE>
													</fieldset>
												</FORM>
												
												<br>
												
												<FORM NAME="Elimina_Cliente" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" METHOD="POST"> 
													<fieldset style="max-width: 20em;">
														<legend> &nbsp Elimina Cliente &nbsp </legend>
														<TABLE>
															<TR>
																<TD>Codice cliente:</TD>
																<TD>
																	<?php
																	echo "<select name='codiceCliente'>";
																		while($rowC = mysqli_fetch_array($resultShowC, MYSQLI_ASSOC)){
																		echo "<option value='".$rowC["CODICE"]."'>".$rowC["CODICE"]."</option>";	
																		}
																	echo "</select><br>";
																	?>
																</TD>
															</TR>
															<!-- Invio del modulo -->
															<TR>
																<TD>
																	<INPUT TYPE="submit" VALUE="Invia">
																</TD>
															</TR>
														</TABLE>
													</fieldset>
												</FORM>
												
												</div>
												
												<div id='dialog-form-sitoweb' title='Layout'>
														  <form>
															<table id='tableSitoWeb' class='display' cellspacing='0' width='100%' style='text-align: center;'>
																<thead>
																	<tr>
																		<th>Codice</th>
																		<th>Url</th>
																		<th>Data Pubblicazione</th>
																		<th>Cliente</th>
																		<th>Layout</th>
																	</tr>
																</thead>
															</table>
															<input type='submit' tabindex='-1' style='position:absolute; top:-1000px'>
														  </form>
												</div>	
												
												<div id="showCliente" style='width:66%;margin:4.3em 0 0 3.5em ; padding:0; border-left:1px solid RGBA(40,40,40,0.30);border-right:1px solid RGBA(40,40,40,0.30);  border-radius: 5px; '>
													<div style='margin:0 1em 0 1em;'>
													<?php
														echo "
														<table id='tableClienti' class='display' cellspacing='0' width='100%' style='text-align: center;'>
															<thead>
																<tr>
																	<th>Codice</th>
																	<th>Citt&agrave</th>
																	<th>Indirizzo</th>
																	<th>Telefono</th>
																	<th>N° siti</th>
																	<th>Spesa totale</th>
																	<th></th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Codice</th>
																	<th>Citt&agrave</th>
																	<th>Indirizzo</th>
																	<th>Telefono</th>
																	<th>N° siti</th>
																	<th>Spesa totale</th>
																	<th></th>
																</tr>
															</tfoot>
														</table>"
														;
													?>
													</div>
												</div>
											</div>
											</div>
											
											<br><br>
											<header class="major">
											</header>
                                      
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
							<div class="6u 12u(mobile)">
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
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
			<script src="https//code.jquery.com/jquery-1.12.4.js"></script>
			
			<!-- Per le modal -->
			<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<!-- Per le modal -->
			
			<script>
				function ShowSitiWeb(cliente){
				   dialogSitoWeb.dialog( "open" );
				   $('#tableSitoWeb').dataTable( {
				   "sAjaxSource": "datatables/datatable_sitiwebCliente.php?cliente="+cliente,
				   "bFilter": true,
					   "dom": "Bfrtip",
					   "responsive": true,
					   "bDestroy": true,         
					   "aoColumns": [             
						   { "mData": "Codice" },
						   { "mData": "Url" },
						   { "mData": "Data_Pubblicazione"},
						   { "mData": "Cliente"},
						   { "mData": "Layout"},
					   ],
				   });
			   }
			   
				$(document).ready(function(){
					var previousColor;
					$(".menuButtons").mouseover(function(){
						previousColor = $(this).css("background-color");
						$(this).css("background-color", "darkgray");
					});
					$(".menuButtons").mouseout(function(){
						
						$(this).css("background-color", previousColor);
					});
					
					$('.tabEsterna').DataTable( {
						"order": [[ 0, "asc" ]]
					});
					
					dialogSitoWeb = $( "#dialog-form-sitoweb" ).dialog({
					 autoOpen: false,
					 height: 500,
					 width: 600,
					 modal: true,
					 buttons: {
					   //"Inserisci Catering": function(){ InsertCatering()},
					   Cancel: function() {
						 dialogSitoWeb.dialog( "close" );
					   }
					 },
					 close: function() {
					   //form[ 0 ].reset();
					   //allFields.removeClass( "ui-state-error" );
					 }
				   });
					
					$('#tableClienti').dataTable( {
						  "sAjaxSource": "datatables/datatable_cliente.php",
						  "bFilter": true,
						  "dom": "Bfrtip",
						  "responsive": true,
						  "bDestroy": true,         
						  "aoColumns": [	   
							  { "mData": "Codice" },
							  { "mData": "Citta"},
							  { "mData": "Indirizzo"},
							  { "mData": "Tel"},
							  { "mData": "N_Siti"},
							  { "mData": "Spesa_totale"},
							  { "mData": "button",
									"mRender": function(data, type, row){									
												  return "<input onclick='ShowSitiWeb("+row.Codice+")' type='button' value='Visualizza SitiWeb'/>";
											   }
								  },
							  ],
							  
					});
				});
			</script>

	</body>
	
</html>