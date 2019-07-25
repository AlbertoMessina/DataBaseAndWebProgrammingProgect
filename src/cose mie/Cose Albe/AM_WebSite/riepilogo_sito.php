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
		
		<title>Riepilogo Sito</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Style -->
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link rel="stylesheet" href="assets/css/standard.css" />
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
												<h2>Riepilogo sito</h2>
												<p> Visualizza velocemente alcuni dettagli del sito </p>
											</header>
											
											<!-- Riepilogo Clienti -->
											<h1 style='border: 1px solid RGBA(40,40,40,0.30);text-align:center;'>Riepilogo Clienti</h1>
											<div class="row" id="divRiepilogoClienti">
												<div id='selectCliente'  style='width:25%';'>
													<fieldset style="max-width: 40em;">
														<legend>&nbsp Seleziona Cliente &nbsp</legend>
														<table>
															<TR>
																<TD>ID cliente:</TD> 
																<TD>
																	<select id="clienteDropdown" name='clienteDropDown'> <option value='id' selected>Id</option> </select>
																</TD>
															</TR>
														</table>
													</fieldset>
												</div>
												
												<div id="showSitiWebCliente" style='width:70%;margin:4.3em 0 0 3.5em ; padding:0; border-left:1px solid RGBA(40,40,40,0.30); border-right:1px solid RGBA(40,40,40,0.30); border-radius: 5px;'>
													<div style='margin:0 1em 0 1em;'>
														<table id='tableSitiWeb' class='display tabEsterna' cellspacing='0' width='100%' style='padding:0; margin:0;text-align:center;'>
															<caption><b>SITI WEB</b></caption>
																<thead>
																	<tr>
																		<th>Codice</th>
																		<th>Url</th>
																		<th>Data pubblicazione</th>
																		<th>Cliente</th>
																		<th>Layout</th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th>Codice</th>
																		<th>Url</th>
																		<th>Data pubblicazione</th>
																		<th>Cliente</th>
																		<th>Layout</th>
																	</tr>
																</tfoot>
														</table>
													</div>
												</div>	
											</div>
											
											<br><br><br>
											
											<!-- Riepilogo Sviluppatori -->
											<h1 style='border: 1px solid RGBA(40,40,40,0.30);text-align:center;'>Riepilogo Sviluppatori</h1>
											<div class="row" id="divRiepilogoSviluppatori">
												<div id='selectSviluppatore' style='width:25%'>
													<fieldset style="max-width: 40em;">
														<legend>&nbsp Seleziona Sviluppatore &nbsp</legend>
														<table>
															<TR>
																<TD>Sviluppatore:</TD> 
																<TD>
																	<select id="sviluppatoreDropdown"> <option value='piva' selected>P.iva</option> </select>
																</TD>
															</TR>
														</table>
													</fieldset>
												</div>
												
												<div id="showLayoutSviluppatore" style='width:70%;margin:4.3em 0 0 3.5em ; padding:0; border-left:1px solid RGBA(40,40,40,0.30); border-right:1px solid RGBA(40,40,40,0.30); border-radius: 5px;'>
													<div style='margin:0 1em 0 1em;' >
														<table id='tableLayout' class='display tabEsterna' cellspacing='0' width='100%' style='padding:0; margin:0;text-align:center;'>
															<caption><b>LAYOUT</b></caption>
																<thead>
																	<tr>
																		<th>Id</th>
																		<th>Partita Iva Sviluppatore</th>
																		<th>Costo Totale</th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th>Id</th>
																		<th>Partita Iva Sviluppatore</th>
																		<th>Costo Totale</th>
																	</tr>
																</tfoot>
														</table>
													</div>
												</div>	
											</div>
											
											<br><br><br>
											
											<!-- Riepilogo Layout -->
											<h1 style='border: 1px solid RGBA(40,40,40,0.30);text-align:center;'>Riepilogo Layout</h1>
											<div class="row" id="divRiepilogoLayout" >
												<div id='selectLayout' style='width:25%'>
													<fieldset style="max-width: 40em;">
														<legend>&nbsp Seleziona Layout &nbsp</legend>
														<table>
															<TR>
																<TD>Id layout:</TD> 
																<TD>
																	<select id="layoutDropdown"> <option value='id' selected>Id</option> </select>
																</TD>
															</TR>
														</table>
													</fieldset>
												</div>
												
												<div id="showModuliLayout" style='width:70%;margin:4.3em 0 0 3.5em ; padding:0; border-left:1px solid RGBA(40,40,40,0.30); border-right:1px solid RGBA(40,40,40,0.30); border-radius: 5px;'>
													<div style='margin:0 1em 0 1em;'>
														<table id='tableModuli' class='display tabEsterna' cellspacing='0' width='100%' style='padding:0; margin:0;text-align:center;'>
															<caption><b>MODULI</b></caption>
																<thead>
																	<tr>
																		<th>Id</th>
																		<th>Nome</th>
																		<th>Funzione</th>
																		<th>Costo</th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th>Id</th>
																		<th>Nome</th>
																		<th>Funzione</th>
																		<th>Costo</th>
																	</tr>
																</tfoot>
														</table>
													</div>
												</div>	
											</div>
										
									
											<br><br>
											<header class="major">
											</header>
										
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
			$(document).ready(function(){
				var previousColor;
				$(".menuButtons").mouseover(function(){
					previousColor = $(this).css("background-color");
					$(this).css("background-color", "darkgray");
				});
				$(".menuButtons").mouseout(function(){
					
					$(this).css("background-color", previousColor);
				});
				
				/* DATATABLE SECTION */
				// Datatable cliente - siti web cliente
				$.ajax({
				   type: "GET",
				   url: "datatables/dataSelectClienti.php",
				   success: function(data){
					  var opts = $.parseJSON(data);
						 $.each(opts, function(i, d) {
							$('#clienteDropdown').append('<option value="' + d.Codice + '">' + d.Codice + '</option>');
						 });
				   }
				});
				
				$('#clienteDropdown').on('change', function() {
					$('#tableSitiWeb').dataTable( {
						"sAjaxSource": "datatables/datatable_sitiwebCliente.php?cliente="+$('#clienteDropdown').val(),
						"bFilter": true,
						"dom": "Bfrtip",
						"responsive": true,
						"bDestroy": true,         
						"aoColumns": [	   
							{ "mData": "Codice" },
							{ "mData": "Url"},
							{ "mData": "Data_Pubblicazione"},
							{ "mData": "Cliente"},
							{ "mData": "Layout"}, 
						],	  
					});
				});
				
				
				// Datatable sviluppatore - Layout sviluppatore
				$.ajax({
				   type: "GET",
				   url: "datatables/dataSelectSviluppatore.php",
				   success: function(data){
					  var opts = $.parseJSON(data);
						 $.each(opts, function(i, d) {
							$('#sviluppatoreDropdown').append('<option value="' + d.Piva + '">' + d.Piva + '</option>');
						 });
				   }
				});
				
				$('#sviluppatoreDropdown').on('change', function() {
					$('#tableLayout').dataTable( {
						"sAjaxSource": "datatables/datatable_layoutSvil.php?piva="+$('#sviluppatoreDropdown').val(),
						"bFilter": true,
						"dom": "Bfrtip",
						"responsive": true,
						"bDestroy": true,         
						"aoColumns": [	   
							{ "mData": "Id" },
							{ "mData": "Sviluppatore"},
							{ "mData": "Costo"}, 
						],	  
					});
				});
				
				
				// Datatable layout - moduli del layout
				$.ajax({
				   type: "GET",
				   url: "datatables/dataSelectLayout.php",
				   success: function(data){
					  var opts = $.parseJSON(data);
						 $.each(opts, function(i, d) {
							$('#layoutDropdown').append('<option value="' + d.ID + '">' + d.ID + '</option>');
						 });
				   }
				});
				
				$('#layoutDropdown').on('change', function() {
					$('#tableModuli').dataTable( {
						"sAjaxSource": "datatables/datatable_modulo.php?idlayout="+$('#layoutDropdown').val(),
						"bFilter": true,
						"dom": "Bfrtip",
						"responsive": true,
						"bDestroy": true,         
						"aoColumns": [	   
							{ "mData": "ID" },
							{ "mData": "Nome"},
							{ "mData": "Funzione"},
							{ "mData": "Costo"}, 
						],	  
					});
				});
				
			});
			</script>

	</body>
	
</html>