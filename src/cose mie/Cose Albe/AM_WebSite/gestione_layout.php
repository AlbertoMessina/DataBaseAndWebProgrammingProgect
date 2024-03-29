<?php
	session_start();
	if(!isset($_SESSION["username"])){
		echo "<script> alert('Per poter accedere alla pagina desiderata devi prima effettuare il login'); window.location.assign('index.html#login'); </script>"; 
	}
	if($_SESSION["tipologia"] == 3){
		echo "<script> alert('Permesso negato'); window.location.assign('home.php'); </script>";
	}
?>

<!DOCTYPE HTML>

<html>
	
	<head>
		
		<title>Gestione Layout</title>
		<meta charset="utf-8" />
		
		<!-- Style -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
		</style>
        
        <script type="text/javascript">
			/* Funzione per validare il form di inserimento del Modulo */
			function validaForm_Inserimento_Modulo(){
				// Controllo che la lunghezza del campo "funzione" sia minore o uguale a 100
				if(document.Inserimento_Modulo.funzione.value.length>100)
					{
					alert("Non è possibile usare più di 100 caratteri per esprimere funzione. Impossibile procedere.");
					return false;
					}
				// Nota che qui non controllo che il nome non contenga numeri perchè in realtà può contenerli.
				return true;
			}
		</script>
		
		<?php
			//Includo le variabili $host, $usrname, $psw e $db per fare la connessione col database
			include("db.php");
			
			//Connessione host
			$connessione=mysqli_connect($host,$usrname,$psw, '',$porta) or die("Could not connect : " . mysqli_connect_error());
				
			//Selezione database
			mysqli_select_db($connessione,$db) or die("Could not select database");
			
			// Cancella modulo	
			if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["idM"])) {
				//Prendo i parametri passati dal form delete modulo
				$idModulo=$_POST["idM"];
				
				
				$result = mysqli_query($connessione, "select * from MODULO where ID='$idModulo';")
							or die("Query failed : " . mysqli_error($connessione));
				if (mysqli_num_rows($result)) {
					$result2 = mysqli_query($connessione, "delete from COMPONENTE where ID_MODULO='$idModulo';")
							or die("Query failed : " . mysqli_error($connessione));
					$result3 = mysqli_query($connessione, "delete from MODULO where ID='$idModulo';")
							or die("Query failed : " . mysqli_error($connessione));
					echo "<script> alert('Eliminazione avvenuta con successo');</script>";
				}else echo "<script> alert('Nessun modulo con id inserito è presente nel db');</script>";
			}
			
			// Cancella layout	
			if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["id_Layout"])) {
				//Prendo i parametri passati dal form delete modulo
				$idLayout=$_POST["id_Layout"];
				
				
				$result = mysqli_query($connessione, "select * from LAYOUT where ID='$idLayout';")
							or die("Query failed : " . mysqli_error($connessione));
				if (mysqli_num_rows($result)) {
					$result2 = mysqli_query($connessione, "delete from COMPONENTE where ID_LAYOUT='$idLayout';")
							or die("Query failed : " . mysqli_error($connessione));
					$result3 = mysqli_query($connessione, "delete from LAYOUT where ID='$idLayout';")
							or die("Query failed : " . mysqli_error($connessione));
					echo "<script> alert('Eliminazione avvenuta con successo');</script>";
				}else echo "<script> alert('Nessun layout con id inserito è presente nel db');</script>";
			}	
			
			//Query per visualizzare i moduli
				//$resultShowM = mysqli_query($connessione, "SELECT * FROM MODULO");
			$resultShowM2= mysqli_query($connessione, "SELECT * FROM MODULO");
			$resultShowMselect = mysqli_query($connessione, "SELECT * FROM MODULO");
			
			//Query per visualizzare i layout
				//$resultShowL = mysqli_query($connessione, "SELECT * FROM LAYOUT");
			$resultShowL2 = mysqli_query($connessione, "SELECT * FROM LAYOUT");
			
			//Query per visualizzare gli sviluppatori
			$resultShowS = mysqli_query($connessione, "SELECT * FROM SVILUPPATORE");
			$resultShowS2 = mysqli_query($connessione, "SELECT * FROM SVILUPPATORE");
			
			if($_SESSION["tipologia"]==2){
			$tel = $_SESSION["telefono"]; 
			$resultShowLCurrent = mysqli_query($connessione, "SELECT * FROM LAYOUT where SVILUPPATORE = (select PIVA from SVILUPPATORE where TELEFONO='$tel');");
			$resultShowSCurrent = mysqli_query($connessione, "SELECT * FROM SVILUPPATORE WHERE TELEFONO = '$tel'");
			$resultShowSCurrent2 = mysqli_query($connessione, "SELECT * FROM SVILUPPATORE WHERE TELEFONO = '$tel'");
			}
			
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
										<h1><a href="home.php" id="logo">Web Sites Developer</a></h1>

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
											
											// Developer
											if($_SESSION["tipologia"]==2){ echo "		
											<ul>
												<li style='margin-left:0.5em;'><a class='menuButtons' href='home.php'>Home</a></li>
												<li class='current_page_item'><a class='menuButtons' href='gestione_layout.php' > Gestione Layout </a></li>
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
												<h2>Gestione Layout</h2>
												<p>Gestisci i tuoi layout e i moduli da qui</p>
											</header>
											
											<!-- Contenuto -->
											
											<h1 style='border: 1px solid RGBA(40,40,40,0.30); text-align:center;'>Gestione Moduli</h1>
											<div class="row" id="divModulo">
												<!-- FORM MODULO -->
												<div id="formModulo" style="float:left; width:25em;">
													<FORM NAME="Inserimento_Modulo" ACTION="insert/insert_moduli.php" METHOD="POST" onsubmit='return validaForm_Inserimento_Modulo();'> 
													<fieldset style="max-width: 20em;">
														<legend> &nbsp Inserimento Modulo &nbsp </legend>
														<TABLE>
															<TR>
																<TD>Nome:</TD>
																<TD>
																	<INPUT NAME="nome" TYPE="text" SIZE="20" maxlength="20" required>
																</TD>
															</TR>
															<TR>
																<TD>Funzione:</TD>
																<TD>
																	<INPUT NAME="funzione" TYPE="text" maxlength="100" >
																</TD>
															</TR>
															<TR>
																<TD>Costo:</TD>
																<TD>
																	<INPUT NAME="costo" TYPE="number" SIZE="10" min="0" required>
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
													
													<FORM NAME="Elimina_Modulo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST"> 
													<fieldset style="max-width: 20em;">
														<legend> &nbsp Elimina Modulo &nbsp </legend>
														<TABLE>
															<TR>
																<TD>Id modulo:</TD>
																<TD>
																	<?php
																	echo "<select name='idM'>";
																	while($rowMs = mysqli_fetch_array($resultShowMselect, MYSQLI_ASSOC)){
																		echo "<option value='".$rowMs["ID"]."'>".$rowMs["ID"]."</option>";	
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
												
												<div id="showModuli" style='width:66%;margin:4.3em 0 0 3.5em ; padding:0; border-left:1px solid RGBA(40,40,40,0.30); border-right:1px solid RGBA(40,40,40,0.30);border-radius: 5px; '>
													<div style='margin:0 1em 0 1em;'>
														<table id='tableModuli' class='display' cellspacing='0' width='100%' style='text-align: center;'>
															<thead>
																<tr>
																	<th>Id modulo</th>
																	<th>Nome</th>
																	<th>Funzione</th>
																	<th>Costo</th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Id modulo</th>
																	<th>Nome</th>
																	<th>Funzione</th>
																	<th>Costo</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
											</div>
											
											<br><br><br>
											
											<h1 style='border: 1px solid RGBA(40,40,40,0.30);text-align:center;'>Gestione Layout</h1>
											<div class="row" id="divLayout">
												
												<!-- FORM LAYOUT -->
												<div id='formLayout'>
													<FORM NAME="Inserimento_Layout" ACTION="insert/insert_layout.php" METHOD="POST"> 
													<fieldset style="max-width: 40em;">
														<legend>&nbsp Inserimento Layout &nbsp</legend>
														<TABLE>
															<TR>
																<TD>Sviluppatore:</TD> 
																<TD >
																	<?php
																		echo "<select name='pivaSviluppatore'>";
																		if($_SESSION["tipologia"] == 1){
																			while($rowS = mysqli_fetch_array($resultShowS, MYSQLI_ASSOC)){
																			echo "<option value='".$rowS["PIVA"]."'>".$rowS["NOME"] ." ".$rowS["COGNOME"] ."</option>";	
																			}
																		}if($_SESSION["tipologia"] == 2){
																			while($rowSCurrent = mysqli_fetch_array($resultShowSCurrent, MYSQLI_ASSOC)){
																			echo "<option value='".$rowSCurrent["PIVA"]."'>".$rowSCurrent["NOME"] ." ".$rowSCurrent["COGNOME"] ."</option>";	
																			}
																		}
																		
																		echo "</select><br>";
																	?>
																</TD>
															</TR>
															<TR>
																<TD>
																	Seleziona i moduli:
																</TD>
															</TR>
															<TR>
																<TD>   
																	<?php
																		while($rowMod = mysqli_fetch_array($resultShowM2, MYSQLI_ASSOC)){
																			echo "<input type='checkbox' style='vertical-align: middle;' name='moduli[]' value='".$rowMod["ID"]."'> ".$rowMod["NOME"]."<br>";
																		}
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
													
													<br>
													
													<FORM NAME="Elimina_Layout" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST"> 
													<fieldset style="max-width: 20em;">
														<legend> &nbsp Elimina Layout &nbsp </legend>
														<TABLE>
															<TR>
																<TD>Id layout:</TD>
																<TD>
																	<?php
																	echo "<select name='id_Layout'>";
																	if($_SESSION["tipologia"] == 1){
																			while($rowL2 = mysqli_fetch_array($resultShowL2, MYSQLI_ASSOC)){
																			echo "<option value='".$rowL2["ID"]."'>".$rowL2["ID"]."</option>";	
																			}
																		}if($_SESSION["tipologia"] == 2){
																			while($rowLCurrent = mysqli_fetch_array($resultShowLCurrent, MYSQLI_ASSOC)){
																			echo "<option value='".$rowLCurrent ["ID"]."'>".$rowLCurrent ["ID"]."</option>";	
																			}
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
											
											
												<div id="showLayout" style='width:60%;margin:4.3em 0 0 3.5em ; padding:0; border-left:1px solid RGBA(40,40,40,0.30); border-right:1px solid RGBA(40,40,40,0.30);border-radius: 5px;'>
													<div style='margin:0 1em 0 1em;'>
														<table id='tableLayout' class='display' cellspacing='0' width='100%' style='text-align: center;'>
															<thead>
																<tr>
																	<th>Id layout</th>
																	<th>Costo totale</th>
																	<th>Partita Iva Sviluppatore</th>
																	<th></th>
																</tr>
															</thead>
															<tfoot>
																<tr>
																	<th>Id layout</th>
																	<th>Costo totale</th>
																	<th>Partita Iva Sviluppatore</th>
																	<th></th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
												<div id='dialog-form-layout' title='Moduli'>
														  <form>
															<table id='tableModuliLayout' class='display' cellspacing='0' width='100%' style='text-align:center;'>
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
											
											<br><br><br>
											
											<h1 style='border: 1px solid RGBA(40,40,40,0.30);text-align:center;'>Layout Venduti</h1>
											<div class="row" id="divLayoutVenduti">
												<!-- FORM LAYOUT VENDUTI-->
												<div id='formLayoutVenduti'>
													<FORM NAME="ScegliSviluppatore" action="show_layout_venduti.php" METHOD="POST"> 
													<fieldset style="max-width: 40em;">
														<legend>&nbsp Mostra layout venduti &nbsp</legend>
														<TABLE>
															<TR>
																<TD>Sviluppatore:</TD> 
																<TD >
																	<?php  
																		echo "<select name='pivaSLayout' id='sls'>";
																		echo "<option value='' selected> Scegli uno sviluppatore </option>";
																		if($_SESSION["tipologia"] == 1){
																			while($rowS = mysqli_fetch_array($resultShowS2, MYSQLI_ASSOC)){
																			echo "<option value='".$rowS["PIVA"]."'>".$rowS["NOME"] ." ".$rowS["COGNOME"] ."</option>";	
																			}
																		}
																		if($_SESSION["tipologia"] == 2){
																			while($rowSCurrent = mysqli_fetch_array($resultShowSCurrent2, MYSQLI_ASSOC)){
																			echo "<option value='".$rowSCurrent["PIVA"]."'>".$rowSCurrent["NOME"] ." ".$rowSCurrent["COGNOME"] ."</option>";	
																			}
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
											
												<div id="showLayoutSviluppatore" style='width:64%;margin:4.3em 0 0 3.5em ; padding:0; border-left:1px solid RGBA(40,40,40,0.30); border-right:1px solid RGBA(40,40,40,0.30); border-radius: 5px;'>
													<div style='margin:0 1em 0 1em;'>
														<table id='tableSls' class='display tabEsterna' cellspacing='0' width='100%' style='padding:0; margin:0;text-align:center;'>
															
																<thead>
																	<tr>
																		<th>Id-Layout</i></th>
																		<th>Costo Totale Layout</i></th>
																		<th>Url sito web</i></th>
																	</tr>
																</thead>
																<tfoot>
																	<tr>
																		<th>Id-Layout</i></th>
																		<th>Costo Totale Layout</i></th>
																		<th>Url sito web</i></th>
																	</tr>
																</tfoot>
														</table>
													</div>
												</div>
												
											</div>
											
											<br><br><br>
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
				function ShowLayout(id){
				   dialogLayout.dialog( "open" );
				   $('#tableModuliLayout').dataTable( {
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
				
				$('#tableModuli').dataTable( {
						  "sAjaxSource": "datatables/datatable_modulo_gl.php",
						  "bFilter": true,
						  "dom": "Bfrtip",
						  "responsive": true,
						  "bDestroy": true,         
						  "aoColumns": [	   
									{ "mData": "Id" },
									{ "mData": "Nome"},
									{ "mData": "Funzione"},
									{ "mData": "Costo"}, 
							  ],	  
				});
				
				$('#tableLayout').dataTable( {
						  "sAjaxSource": "datatables/datatable_layout.php",
						  "bFilter": true,
						  "dom": "Bfrtip",
						  "responsive": true,
						  "bDestroy": true,         
						  "aoColumns": [	   
									{ "mData": "ID" },
									{ "mData": "Costo"},
									{ "mData": "Sviluppatore"},
									{ "mData": "button",
									  "mRender": function(data, type, row){									
											  return '<input onclick="ShowLayout(\''+row.ID+'\')" type="button" value="Visualizza moduli"/>';
										   }
							  },
							  ],	  
				});
				
				$('#sls').on('change', function() {
					var table = $('#tableSls').dataTable( {
						  "sAjaxSource": "datatables/datatable_layout_venduti.php?pivaSLayout="+$('#sls').val(),
						  "bFilter": true,
						  "dom": "Bfrtip",
						  "responsive": true,
						  "bDestroy": true,         
						  "aoColumns": [	   
									{ "mData": "Id" },
									{ "mData": "Costo_Totale"},
									{ "mData": "URL"}, 
							  ],	  
					});
				});
			});
			</script>
			
			<script>
				
			</script>
			
	</body>
</html>