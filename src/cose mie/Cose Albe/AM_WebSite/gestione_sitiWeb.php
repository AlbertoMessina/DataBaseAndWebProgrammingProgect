<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] == 2){
		echo "<script> alert('Permesso negato'); window.location.assign('home.php'); </script>";
	}
?>

<!DOCTYPE HTML>

<html>
	
	<head>
		
		<title>Gestione siti web</title>
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
			input[type=text], input[type=number]{
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
			
			//Query
			$telefono=$_SESSION["telefono"];
			$query="select * from SITO_WEB where CLIENTE = (select C.CODICE
															from CLIENTE C 
															where C.TELEFONO = '$telefono'
															)";
			//Query per visualizzare i siti web
            $resultShowSW = mysqli_query($connessione, $query);
			$resultShowSWall = mysqli_query($connessione, "SELECT * FROM SITO_WEB");
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
											
										
											// Client
											if($_SESSION["tipologia"]==3){ echo "
											<ul>
												<li><a class='menuButtons' href='home.php'>Home</a></li>
												<li class='current_page_item'><a class='menuButtons' href='gestione_sitiWeb.php'>Gestione Siti Web</a></li>
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
												<h2>Gestione Siti Web</h2>
												<p><?php echo $_SESSION['nomeUtente'] ." " .$_SESSION['cognomeUtente']?>, gestisci i tuoi Siti Web!</p>
											</header>
											
											<!-- Contenuto -->
											<div class="row" id="myDiv">
												
												<?php
													if($_SESSION["tipologia"]==1){ echo"
													<div id='divModal' style='width:100%; text-align: center;'>
														<h1 style='border: 1px solid RGBA(40,40,40,0.30);'>Inserisci un sito Web</h1>
														<table id='tableClienti' class='display' cellspacing='0' width='100%'>
															<thead>
																<tr>
																	<th>Codice</th>
																	<th>Citt&agrave</th>
																	<th>Indirizzo</th>
																	<th>Telefono</th>
																	<th>Numero siti commissionati</th>
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
																	<th>Numero siti commissionati</th>
																	<th>Spesa totale</th>
																	<th></th>
																</tr>
															</tfoot>
														</table>
														
														
														<div id='dialog-form' title='Inserisci Sito Web'>
														<p class='validateTips'>Tutti i campi sono richiesti</p>
															<form id='formInsertSW' action='' method=''>
																<fieldset>
																	<table>
																		<tr>
																			<td> <label for='url'>Url Sito Web:</label> </td>
																			<td> <input type='text' name='url' id='url' class='text ui-widget-content ui-corner-all' required SIZE='50' maxlength='50'> </td>
																		</tr>
																		<tr>
																			<td> <label for='id_layout'>Id Layout:</label> </td>
																			<td> <input type='number' name='id_layout' id='id_layout'  class='text ui-widget-content ui-corner-all' required min='1'> </td>
																		</tr>
																		<tr>
																			<td> <label for='datepicker'>Data pubblicazione:</label> </td>
																			<td> <input type='text' name='datepicker' id='datepicker' required> </td>
																		</tr>
																	</table>
																	
																	<br>
																	
																	<!-- Allow form submission with keyboard without duplicating the dialog button -->
																	<table id='tableLayout' class='display' cellspacing='0' width='100%' style='text-align: center;'>
																		<thead>
																			<tr>
																				<th>ID</th>
																				<th>Sviluppatore</th>
																				<th>Costo</th>
																				<th></th>
																			</tr>
																		</thead>
																	</table>
																	<input type='submit' tabindex='-1' style='position:absolute; top:-1000px'>
															  </fieldset>
															  
															</form>
														</div>
														
														<div id='dialog-form-layout' title='Layout'>
														  <p class='validateTips'>Tutti i campi sono richiesti</p>
														 
														  <form>
															<table id='tableModuli' class='display' cellspacing='0' width='100%' style='text-align: center;'>
																<thead>
																	<tr>
																		<th>Id</th>
																		<th>Nome</th>
																		<th>Funzione</th>
																		<th>Costo</th>	 
																	</tr>
																</thead>
															</table>
															<input type='submit' tabindex='-1' style='position:absolute; top:-1000px'>
														  </form>
														</div>	
													</div>
												";} ?>
												<!-- End insert sito web (only for administrator) -->
												
												<!-- Show layout (only for cliente) -->
												<?php
													if($_SESSION["tipologia"]==3){ echo"
														<div id='dialog-form-layout' title='Layout'>
														  <form>
															<table id='tableModuli' class='display' cellspacing='0' width='100%' style='text-align: center;'>
																<thead>
																	<tr>
																		<th>Id</th>
																		<th>Nome</th>
																		<th>Funzione</th>
																		<th>Costo</th>	 
																	</tr>
																</thead>
															</table>
															<input type='submit' tabindex='-1' style='position:absolute; top:-1000px'>
														  </form>
														</div>	
													
												";} ?>
												<!-- Show layout (only for cliente) -->
												
												<?php
												if($_SESSION["tipologia"]==1){ echo "<div style='height:2%;'></div>"; };
												?>
												
												<!-- Show sito web (only for administrator and client) -->
												<div id='showSitiWeb' style='width:100%; text-align: center;'>
													<h1 style='border: 1px solid RGBA(40,40,40,0.30);'>Visualizza i Siti Web</h1> 
													<?php
														// Client: può visualizzare solo i suoi siti web
														if($_SESSION["tipologia"]==3){
															
															if (mysqli_num_rows($resultShowSW) > 0) {
																// output data of each row
																echo "<table class='display tabEsterna' cellspacing='0' width='100%' style='padding:0; margin:0;'>
																		<br><caption><b>SITI WEB</b></caption>
																		<thead>
																			<tr id='tabHeader'>
																				<th>Codice</i></th>
																				<th>Url</i></th>
																				<th>Data pubblicazione</i></th>
																				<th>Id cliente</th>
																				<th>Layout</th>
																				<th>Visualizza Layout</th>
																			</tr>
																		</thead>
																		<tfoot>
																			<tr>
																				<th>Codice</i></th>
																				<th>Url</i></th>
																				<th>Data pubblicazione</i></th>
																				<th>Id cliente</th>
																				<th>Layout</th>
																				<th>Visualizza Layout</th>
																			</tr>
																		</tfoot>
																		<tbody>";
																while($rowSW = mysqli_fetch_assoc($resultShowSW)) {
																	$idL = $rowSW["LAYOUT"];
																	echo "<tr>"
																		."<td>"  .$rowSW["CODICE"]. "</td>"
																		."<td>"  .$rowSW["URL"]. "</td>"
																		."<td>"  .$rowSW["DATA_PUBBLICAZIONE"]. "</td>"
																		."<td>"  .$rowSW["CLIENTE"]. "</td>"
																		."<td>"  .$rowSW["LAYOUT"]. "</td>"
																		."<td> <input onclick='ShowLayout($idL)' type='button' value='Visualizza Layout'/> </td>"
																		."</tr>";
																} echo "	</tbody>
																		</table>";
															} else {
																echo "0 results";
															}
														}
														
														// Administrator: può visualizzare tutti i siti web
														if($_SESSION["tipologia"]==1){ 
															if (mysqli_num_rows($resultShowSWall) > 0) {
																// output data of each row
																echo "<table class='display tabEsterna' cellspacing='0' width='100%' style='padding:0; margin:0;'>
																		<br><caption><b>SITI WEB</b></caption>
																		<thead>
																			<tr id='tabHeader'>
																				<th>Codice</i></th>
																				<th>Url</i></th>
																				<th>Data pubblicazione</i></th>
																				<th>Id cliente</th>
																				<th>Layout</th>
																				<th>Elimina</th>
																			</tr>
																		</thead>
																		<tfoot>
																			<tr>
																				<th>Codice</i></th>
																				<th>Url</i></th>
																				<th>Data pubblicazione</i></th>
																				<th>Id cliente</th>
																				<th>Layout</th>
																				<th>Elimina</th>
																			</tr>
																		</tfoot>
																		<tbody>";
																while($rowSWall = mysqli_fetch_assoc($resultShowSWall)) {
																	$codice = $rowSWall["CODICE"];
																	echo "<tr>"
																		."<td>"  .$rowSWall["CODICE"]. "</td>"
																		."<td>"  .$rowSWall["URL"]. "</td>"
																		."<td>"  .$rowSWall["DATA_PUBBLICAZIONE"]. "</td>"
																		."<td>"  .$rowSWall["CLIENTE"]. "</td>"
																		."<td>"  .$rowSWall["LAYOUT"]. "</td>"
																		."<td> <input onclick='deleteSitoWeb($codice)' type='button' value='Cancella SitoWeb'>"
																		."</tr>";
																} echo "	</tbody>
																		</table>";
															} else {
																echo "0 results";
															}
														}
													?>
												</div>
												<!-- End Show sito web (only for administrator and client) -->
												
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
				//Parte relativa alle modal 
				var idSelectedLayout;
				var idSelectedUser;
				
			   function deleteSitoWeb(codice){
					$.ajax({
                        url: 'delete/cancellaSitoWeb.php',
                        type: "POST",
						data: {
                            'codice': codice
                        },
                        success:
                            function (data) {
                                alert("Sito Web rimosso con successo");
								window.location.assign('gestione_sitiWeb.php');
                            }
                    });
			   }
			   
			   function ShowSitoWeb(id){
				   idSelectedUser = id;
				   dialogSitoWeb.dialog( "open" );
			   }
			   
			   function ShowLayout(id){
				   idSelectedLayout = id;
				   dialogLayout.dialog( "open" );
				   $('#tableModuli').dataTable( {
				   "sAjaxSource": "datatables/datatable_modulo.php?idlayout="+id,
				   "bFilter": true,
					   "dom": "Bfrtip",
					   "responsive": true,
					   "bDestroy": true,         
					   "aoColumns": [             
						   { "mData": "ID" },
						   { "mData": "Nome" },
						   { "mData": "Funzione" },
						   { "mData": "Costo"},
					   ],
				   });
			   }
			   
			   function InsertSitoWeb(){
				if ($("#url").val()==""){alert("Il campo 'url' è obbligatorio"); return false;}
				if ($("#id_layout").val()==""){alert("Il campo 'id layout' è obbligatorio"); return false;}
				if ($("#datepicker").val()==""){alert("Il campo 'data' è obbligatorio"); return false;}
				   $.ajax({
                        url: 'insert/insert_sitoWeb.php',
                        type: "POST",
						data: {
                            'url': $("#url").val(),
							'idCliente': idSelectedUser,
							'dataP': $("#datepicker").val(),
                            'idLayout': $("#id_layout").val()
                        },
                        success:
                            function (data) {
                                alert("Sito Web inserito con successo");
								window.location.assign('gestione_sitiWeb.php');
                            }
                    });
			   }
				   
			   $(document).ready( function() {
				
					//Parte grafica
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
				
					//Parte modal
				   $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
				   
				   dialogSitoWeb = $( "#dialog-form" ).dialog({
					 autoOpen: false,
					 height: 500,
					 width: 550,
					 modal: true,
					 buttons: {
					   "Inserisci SitoWeb": function() { InsertSitoWeb()},
					   Cancel: function() {
						 dialogSitoWeb.dialog( "close" );
						 formInsertSW.reset();
						 
					   }
					 },
					 close: function() {
						formInsertSW.reset();
					   //allFields.removeClass( "ui-state-error" );
					 }
				   });
				   
				   dialogLayout = $( "#dialog-form-layout" ).dialog({
					 autoOpen: false,
					 height: 500,
					 width: 550,
					 modal: true,
					 buttons: {
					   //"Inserisci Catering": function(){ InsertCatering()},
					   Cancel: function() {
						 dialogLayout.dialog( "close" );
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
											  return '<input onclick="ShowSitoWeb(\''+row.Codice+'\')" type="button" value="Inserisci SitoWeb"/>';
										   }
							  },
						  ],
						  
					});
					$('#tableLayout').dataTable( {
					"sAjaxSource": "datatables/datatable_layout.php",
					"bFilter": true,
						"dom": "Bfrtip",
						"responsive": true,
						"bDestroy": true,    
						"rowId": 'ID',
						"aoColumns": [
							{ "mData": "ID" },
							{ "mData": "Sviluppatore" },
							{ "mData": "Costo"},
							{ "mData": "button",
							  "mRender": function(data, type, row) {								
												return "<input onclick='ShowLayout("+row.ID+")' type='button' value='Visualizza Layout'/>";
												}
							},
						],
					});
					
					$('#tableLayout tbody').on( 'click', 'tr', function () {
					var table = $('#tableLayout').DataTable();
					idSelectedLayout= table.row(this).id();
					//alert(data.DT_RowId);	
						if ($(this).hasClass('selected')) {
							$(this).removeClass('selected');
						}
						else {
							table.$('tr.selected').removeClass('selected');
							$(this).addClass('selected');
						}
					});
				   
				});
			</script>
			

	</body>
	
</html>