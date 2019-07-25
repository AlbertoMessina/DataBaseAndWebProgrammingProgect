<!DOCTYPE html>

<?php

include 'struct/$MasterPage.php';

$template = new formattazione();
$template->start();

?>

<html>
<head>
    <title>Account</title>
	
    <!-- Librerie CSS -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Fine librerie CSS -->
	
    <!-- Librerie js -->    
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>       
    <script src="js/DataTable.js"></script>
	<!-- Fine librerie js -->

</head>
<body>

<?php

// La pagina viene visualizzata solamente se l'utente è loggato
if($var_session["login"] == 1) {
	?>
	
	<div id="page-wrapper">
	
	    <div class="container-fluid">
	
			<!-- Messaggio di benvenuto -->
		    <div class="row">
		        <div class="col-lg-12">
		            <div class="alert alert-info alert-dismissable">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <i style="margin-right: 5px;" class="fa fa-info-circle"></i><strong>Benvenuto nella sezione Account!</strong>
		            </div>
		        </div>
		    </div>
			<!-- Fine messaggio di benvenuto -->
	
				<!-- Bottoni di inserimento -->
		        <div class="row">
					<?php
					// Visualizza se l'utente è un amministratore
					if($var_session["tipologia"] == 2) {
					?>
						<!-- Inserimento sviluppatore -->
						<div class="col-lg-3 col-md-6">
						    <div class="panel panel-primary">
								
								<!-- Titolo -->
						        <div class="panel-heading">
						            <div class="row">
						                <div class="col-xs-3">
											<i class="fa fa-user-plus fa-3x" aria-hidden="true"></i>
						                </div>
						                <div class="col-xs-9 text-right">
						                    <div>Inserisci uno sviluppatore!</div>
						                </div>
						            </div>
						        </div>
								<!-- Fine titolo -->
								
								<!-- Apertura modal -->
						        <a href="" data-toggle="modal" data-target="#modal_sviluppatore">
						            <div class="panel-footer">
						                <span class="pull-left">Insert</span>
						                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						                <div class="clearfix"></div>
						            </div>
						        </a>
								<!-- Fine apertura modal -->
								
						    </div>
						</div>
						<!-- Fine inserimento sviluppatore -->
						<?php
					}
					?>
					
					<?php
					// Visualizza se si è amministratori e/o sviluppatori
					if($var_session["tipologia"] == 2 || $var_session["tipologia"] == 1) {
						?>
						<!-- Inserimento modulo -->
						<div class="col-lg-3 col-md-6">
						    <div class="panel panel-green">
								
								<!-- Titolo -->
						        <div class="panel-heading">
						            <div class="row">
						                <div class="col-xs-3">
						                    <i class="fa fa-tasks fa-3x" aria-hidden="true"></i>
						                </div>
										<div class="col-xs-9 text-right">
						                    <div>Inserisci un modulo!</div>
						                </div>
						            </div>
						        </div>
								<!-- Fine titolo -->
								
								<!-- Apertura modal -->
						        <a href="" data-toggle="modal" data-target="#modal_modulo">
						            <div class="panel-footer">
						                <span class="pull-left">Insert</span>
						                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						                <div class="clearfix"></div>
						            </div>
						        </a>
								<!-- Fine apertura modal -->
							
						    </div>
						</div>
						<!-- Fine inserimento modulo -->
					
						<!-- Inserimento layout -->
						<div class="col-lg-3 col-md-6">
						    <div class="panel panel-yellow">
								
								<!-- Titolo -->
						        <div class="panel-heading">
						            <div class="row">
						                <div class="col-xs-3">
						                    <i class="fa fa-building fa-3x" aria-hidden="true"></i>
						                </div>
										<div class="col-xs-9 text-right">
						                    <div>Inserisci un layout!</div>
						                </div>
						            </div>
						        </div>
								<!-- Fine titolo -->
								
								<!-- Apertura modal -->
						        <a href="" data-toggle="modal" data-target="#modal_layout">
						            <div class="panel-footer">
						                <span class="pull-left">Insert</span>
						                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						                <div class="clearfix"></div>
						            </div>
						        </a>
								<!-- Fine apertura modal -->
								
						    </div>
						</div>
						<!-- Fine inserimento layout -->
						<?php
					}
					?>
				   
			    </div>
				<!-- Fine bottoni di inserimento -->

			<!-- Profilo amministratore -->
			<?php
			if($var_session["tipologia"] == 2) {
			?>

				<!-- DataTable sviluppatori -->
				<div class="row">
				    <div class="col-lg-12">
				        <div class="panel panel-default">
							
							<!-- Titolo -->
				            <div class="panel-heading">
				                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-terminal" aria-hidden="true"></i>Sviluppatori</h3>
				            </div>
							<!-- Fine titolo -->
							
				            <div class="panel-body">
				                <div class="table-responsive">
									<table id="sviluppatori" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        
								        <!-- Campi datatable -->
								        <thead>
								            <tr>
								                <th>Partita IVA</th>
												<th>Nome</th>
												<th>Cognome</th>
												<th>Telefono</th>
												<th>Update</th>
											</tr>
										</thead>
										<!-- Fine campi datatable -->
  
									</table>    
								</div>
				            </div>
				        </div>
				    </div>
				</div>
				<!-- Fine dataTable sviluppatori -->
				
				<!-- DataTable layut -->
				<div class="row">
				    <div class="col-lg-12">
				        <div class="panel panel-default">
							
							<!-- Titolo -->
				            <div class="panel-heading">
				                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-caret-square-o-up" aria-hidden="true"></i>Layout</h3>
				            </div>
							<!-- Fine titolo -->
							
				            <div class="panel-body">
				                <div class="table-responsive">
									<table id="layout" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        
								        <!-- Campi datatable -->
								        <thead>
								            <tr>
								                <th>ID</th>
												<th>Costo Totale</th>
												<th>Sviluppatore</th>
											</tr>
										</thead>
										<!-- Fine campi datatable -->
  
									</table>    
								</div>
				            </div>
				        </div>
				    </div>
				</div>
				<!-- Fine dataTable layout -->
				
				<!-- DataTable modulo -->
				<div class="row">
				    <div class="col-lg-12">
				        <div class="panel panel-default">
							
							<!-- Titolo -->
				            <div class="panel-heading">
				                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-flag" aria-hidden="true"></i>Modulo</h3>
				            </div>
							<!-- Fine titolo -->
							
				            <div class="panel-body">
				                <div class="table-responsive">
									<table id="modulo" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        
								        <!-- Campi datatable -->
								        <thead>
								            <tr>
								                <th>ID</th>
												<th>Nome</th>
												<th>Funzione</th>
												<th>Costo</th>
												<th>Update</th>
											</tr>
										</thead>
										<!-- Fine campi datatable -->
  
									</table>    
								</div>
				            </div>
				        </div>
				    </div>
				</div>
				<!-- Fine dataTable modulo -->

				<!-- Menu select -->
                <div class="row">
					
					<!-- Select sviluppatore -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">
							
							<!-- Titolo -->
                            <div class="panel-heading">
                                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-long-arrow-right fa-fw"></i>Seleziona lo sviluppatore</h3>
                            </div>
							<!-- Fine titolo -->
							
                            <div class="panel-body">
								
								<!-- Select sviluppatore -->
								<select name="sviluppatore" class="form-control" id="sviluppatore_send">
									<?php
									// Seleziona tutti gli sviluppatori e li visualizza in un option
									$query = query_seleziona_sviluppatori();
									echo('<option id="sviluppatore_send" value="">Seleziona lo sviluppatore...</option>');
									while($record = mysqli_fetch_assoc($query)) {
										echo('<option id="sviluppatore_send" value="'.$record["PIVA"].'">'.$record["NOME"].'</option>');
									}
									?>
								</select>
								<!-- Fine select sviluppatore -->
								
								<!-- DataTable layout sviluppatori -->
								<div class="row">
								    <div class="col-lg-12">
								        <div class="panel panel-default">
								            <div class="panel-body">
								                <div class="table-responsive">
													<table id="sviluppatori_layout" class="table table-striped table-bordered" cellspacing="0" width="100%">
					
												        <!-- Campi datatable -->
												        <thead>
												            <tr>
												                <th>ID</th>
																<th>Costo</th>
															</tr>
														</thead>
														<!-- Fine campi datatable -->
		
													</table>    
												</div>
								            </div>
								        </div>
								    </div>
								</div>
								<!-- Fine dataTable sviluppatori -->

							</div>	
                        </div>
                    </div>
					<!-- Fine select sviluppatore -->
					
					<!-- Select cliente -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">
							
							<!-- Titolo -->
                            <div class="panel-heading">
                                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-long-arrow-right fa-fw"></i>Seleziona il cliente</h3>
                            </div>
							<!-- Fine titolo -->
							
                            <div class="panel-body">
								
								<!-- Select utente -->
								<select name="utente" class="form-control" id="cliente_send">
									<?php
									// Seleziona tutti i clienti e li visualizza in un option
									$query = query_seleziona_id_cliente();
									echo('<option value="" >Seleziona l\'utente...</option>');
									while($record = mysqli_fetch_assoc($query)) {
										echo('<option id="cliente_send" value="'.$record["CODICE"].'">'.$record["CODICE"].'</option>');
									}
									?>
								</select>
								<!-- Fine select utente -->
								
								<!-- DataTable siti web clienti -->
								<div class="row">
								    <div class="col-lg-12">
								        <div class="panel panel-default">
								            <div class="panel-body">
								                <div class="table-responsive">
													<table id="siti_clienti" class="table table-striped table-bordered" cellspacing="0" width="100%">
					
												        <!-- Campi datatable -->
												        <thead>
												            <tr>
												                <th>CODICE</th>
																<th>Url</th>
																<th>Data</th>
																<th>Layout</th>
															</tr>
														</thead>
														<!-- Fine campi datatable -->
		
													</table>    
												</div>
								            </div>
								        </div>
								    </div>
								</div>
								<!-- Fine dataTable siti web clienti -->
								
                            </div>
                        </div>
                    </div>
					<!-- Fine select cliente -->
					
					<!-- Select layout -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">
							
							<!-- Titolo -->
                            <div class="panel-heading">
                                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-long-arrow-right a-fw"></i>Seleziona il layout</h3>
                            </div>
							<!-- Fine titolo -->
							
                            <div class="panel-body">
								
								<!-- Select layout -->
								<select name="layout" class="form-control" id="layout_send">
									<?php
									// Seleziona tutti i layout e li visualizza in un option
									$query = query_seleziona_layout();
									echo('<option value="" >Seleziona il layout...</option>');
									while($record = mysqli_fetch_assoc($query)) {
										echo('<option id="layout_send" value="'.$record["ID"].'">'.$record["ID"].'</option>');
									}
									?>
								</select>
								<!-- Fine select layout -->
								
								<!-- DataTable moduli layout-->
								<div class="row">
								    <div class="col-lg-12">
								        <div class="panel panel-default">
								            <div class="panel-body">
								                <div class="table-responsive">
													<table id="moduli_layout" class="table table-striped table-bordered" cellspacing="0" width="100%">
					
												        <!-- Campi datatable -->
												        <thead>
												            <tr>
												                <th>ID</th>
																<th>Nome</th>
																<th>Funzione</th>
																<th>Costo</th>
															</tr>
														</thead>
														<!-- Fine campi datatable -->
		
													</table>
												</div>
								            </div>
								        </div>
								    </div>
								</div>
								<!-- Fine dataTable moduli layout -->
								
                            </div>
                        </div>
                    </div>
					<!-- Fine select layout -->
					
                </div>
				<!-- Fine menu select -->
				
			<?php
			}
			?>
			<!-- Fine profilo amministratore -->
			
			<!-- Profilo sviluppatore -->
			<?php
			if($var_session["tipologia"] == 1) {
			?>
				<!-- DataTable vendite -->
				<div class="row">
				    <div class="col-lg-12">
				        <div class="panel panel-default">
							
							<!-- Titolo -->
				            <div class="panel-heading">
				                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-server" aria-hidden="true"></i>Layout venduti</h3>
				            </div>
							<!-- Fine titolo -->
							
				            <div class="panel-body">
				                <div class="table-responsive">
									<table id="layout_venduti" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        
								        <!-- Campi datatable -->
								        <thead>
								            <tr>
								                <th>ID</th>
												<th>Costo Totale</th>
												<th>Url</th>
											</tr>
										</thead>
										<!-- Fine campi datatable -->

									</table>    
								</div>
				            </div>
				        </div>
				    </div>
				</div>
				<!-- Fine dataTable vendite -->
				<?php
			}
			?>
			<!-- Fine profilo sviluppatore -->
			
			<!-- Profilo cliente -->
			<?php
			if($var_session["tipologia"] == 0) {
			?>
				<!-- DataTable siti commissionati -->
				<div class="row">
				    <div class="col-lg-12">
				        <div class="panel panel-default">
							
							<!-- Titolo -->
				            <div class="panel-heading">
				                <h3 class="panel-title"><i style="margin-right: 5px;" class="fa fa-desktop" aria-hidden="true"></i>Siti Commissionati</h3>
				            </div>
							<!-- Fine titolo -->
							
				            <div class="panel-body">
				                <div class="table-responsive">
									<table id="siti_commissionati" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        
								        <!-- Campi datatable -->
								        <thead>
								            <tr>
								                <th>CODICE</th>
												<th>Url</th>
												<th>Data_Pubblicazione</th>
												<th>Layout</th>
											</tr>
										</thead>
										<!-- Fine campi datatable -->

									</table>    
								</div>
				            </div>
				        </div>
				    </div>
				</div>
				<!-- Fine dataTable siti commissionati -->
				<?php
			}
			?>
			<!-- Fine profilo cliente -->
		
		</div>
	</div>
	<?php
}
// Se l'utente non è loggato viene reindirizzato alla pagina di login
else {
	echo "<meta http-equiv='Refresh' content='0; url=Login.php'>";
}
?>

<!-- Modal insert sviluppatore -->
<div id="modal_sviluppatore" class="modal fade">
	<div class="modal-dialog">
        <!-- Form insert sviluppatore -->
		<form class="form-horizontal" method="post" id="sviluppatore_form">
            <fieldset>
                <div class="modal-content">
                    
                    <!-- Titolo modal -->
                	<div class="modal-header">
                		<button type="button" class="close" data-dismiss="modal">&times;</button>
                		<h4 class="modal-title">Aggiungi sviluppatore</h4>
                	</div>
                    <!-- Fine titolo modal -->
                    
                    <!-- Corpo modal -->
                	<div class="modal-body">
						
               			<!-- Input partita iva -->
               			<div class="form-group">
							<label class="col-md-4 control-label">Partita IVA</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Inserisci la Partita IVA...">
							</div>
						</div>
						<!-- Fine input partita iva -->
						
						<!-- Input nome -->
						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Inserisci il nome...">
							</div>
						</div>
						<!-- Fine input nome -->
						
						<!-- Input cognome -->
						<div class="form-group">
							<label class="col-md-4 control-label">Cognome</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="cognome" id="cognome" placeholder="Inserisci il cognome...">
							</div>
						</div>
						<!-- Fine input cognome -->

						<!-- Input telefono -->
						<div class="form-group">
							<label class="col-md-4 control-label">Telefono</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Inserisci il telefono...">
							</div>
						</div>
						<!-- Fine input telefono -->
						
						<!-- Input mail -->
						<div class="form-group">
							<label class="col-md-4 control-label">Mail</label>   
							<div class="col-md-5">
								<input type="email" class="form-control" name="mail" id="mail" placeholder="Inserisci la mail...">
							</div>
						</div>
						<!-- Fine input mail -->
						
						<!-- Input password -->
						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>   
							<div class="col-md-5">
								<input type="password" class="form-control" name="password" id="password" placeholder="Inserisci la password...">
							</div>
						</div>
						<!-- Fine input password -->
                    
                	</div>
                    <!-- Fine corpo modal -->
                    
                    <!-- Bottoni modal -->
                	<div class="modal-footer">
                		<input type="submit" class="btn btn-success" value="Inserisci">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                	</div>
                    <!-- Fine bottoni modal -->
                    
                </div>
            </fieldset>
		</form>
        <!-- Fine form insert sviluppatore -->
        
	</div>
</div>
<!-- Fine modal insert sviluppatore -->

<!-- Modal insert modulo -->
<div id="modal_modulo" class="modal fade">
	<div class="modal-dialog">
        <!-- Form insert modulo -->
		<form class="form-horizontal" method="post" id="modulo_form">
            <fieldset>
                <div class="modal-content">
                    
                    <!-- Titolo modal -->
                	<div class="modal-header">
                		<button type="button" class="close" data-dismiss="modal">&times;</button>
                		<h4 class="modal-title">Aggiungi modulo</h4>
                	</div>
                    <!-- Fine titolo modal -->
                    
                    <!-- Corpo modal -->
                	<div class="modal-body">
						
						<!-- Input nome -->
						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="nome_modulo" id="nome_modulo" placeholder="Inserisci il nome...">
							</div>
						</div>
						<!-- Fine input nome -->
						
						<!-- Input funzione -->
						<div class="form-group">
							<label class="col-md-4 control-label">Funzione</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="funzione" id="funzione" placeholder="Inserisci la funzione...">
							</div>
						</div>
						<!-- Fine input funzione -->
						
						<!-- Input costo -->
						<div class="form-group">
							<label class="col-md-4 control-label">Costo</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="costo" id="costo" placeholder="Inserisci il costo...">
							</div>
						</div>
						<!-- Fine input costo -->
                    
                	</div>
                    <!-- Fine corpo modal -->
                    
                    <!-- Bottoni modal -->
                	<div class="modal-footer">
                		<input type="submit" class="btn btn-success" value="Inserisci">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                	</div>
                    <!-- Fine bottoni modal -->
                    
                </div>
            </fieldset>
		</form>
        <!-- Fine form insert modulo -->
        
	</div>
</div>
<!-- Fine modal insert modulo -->

<!-- Modal insert layout -->
<div id="modal_layout" class="modal fade">
	<div class="modal-dialog">
        <!-- Form insert layout -->
		<form class="form-horizontal" method="post" id="layout_form">
            <fieldset>
                <div class="modal-content">
                    
                    <!-- Titolo modal -->
                	<div class="modal-header">
                		<button type="button" class="close" data-dismiss="modal">&times;</button>
                		<h4 class="modal-title">Aggiungi layout</h4>
                	</div>
                    <!-- Fine titolo modal -->
                    
                    <!-- Corpo modal -->
                	<div class="modal-body">
						
						<?php
						// Se l'utente è uno sviluppatore preleva la sua partita iva
						if($var_session["tipologia"] == 1) {
							$piva = query_select_piva($var_session["id"]);
							echo '<input type="hidden" value="'.$piva.'" id="sviluppatore_layout" name="sviluppatore_layout">';
						}
						// Se l'utente non è uno sviluppatore richiede l'inserimento della partita iva
						else {
							?>
							
							<!-- Select sviluppatore -->
							<div class="form-group">
								<label class="col-md-4 control-label">Sviluppatore</label>   
								<div class="col-md-5">
									<?php
									// Seleziona tutti gli sviluppatori e li visualizza in un option
									$sviluppatori = query_seleziona_sviluppatori();
									echo('<select name="sviluppatore_layout" class="form-control" id="sviluppatore_layout">');
										echo('<option value="">Seleziona lo sviluppatore...</option>');
										while($record = mysqli_fetch_assoc($sviluppatori)) {
											echo('<option value="'.$record["PIVA"].'">'.$record["PIVA"].'</option>');
										}
									echo('</select>');
									?>
								</div>
							</div>
							<!-- Fine select sviluppatore -->
							<?php
						}
						?>
						
						<!-- Checkbox moduli -->
						<div class="form-group">
							<label class="col-md-4 control-label">Moduli</label>   
							<div class="col-md-5">
								<?php
								// Seleziona tutti i moduli e li visualizza in delle checkbox
								$moduli = query_seleziona_moduli();
								while($record = mysqli_fetch_assoc($moduli)) {
									echo('<div class="checkbox">');
									echo('<label><input name="modulo_layout" type="checkbox" value="'.$record["ID"].'">'.$record["NOME"].'</label>');
									echo('</div>');
								}
								?>
							</div>
						</div>
						<!-- Fine checkbox moduli -->
						              
                	</div>
                    <!-- Fine corpo modal -->
                    
                    <!-- Bottoni modal -->
                	<div class="modal-footer">
                		<input type="submit" class="btn btn-success" value="Inserisci">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                	</div>
                    <!-- Fine bottoni modal -->
                    
                </div>
            </fieldset>
		</form>
        <!-- Fine form insert layout -->
        
	</div>
</div>
<!-- Fine modal insert layout -->

<!-- Modal upload sviluppatore -->
<div id="modal_upload_sviluppatore" class="modal fade">
	<div class="modal-dialog">
        <!-- Form upload sviluppatore -->
		<form class="form-horizontal" method="post" id="sviluppatore_upload_form">
            <fieldset>
                <div class="modal-content">
                    
                    <!-- Titolo modal -->
                	<div class="modal-header">
                		<button type="button" class="close" data-dismiss="modal">&times;</button>
                		<h4 class="modal-title">Upload sviluppatore</h4>
                	</div>
                    <!-- Fine titolo modal -->
                    
                    <!-- Corpo modal -->
                	<div class="modal-body">
						
               			<!-- Input partita iva -->
               			<div class="form-group">
							<label class="col-md-4 control-label">Partita IVA</label>   
							<div class="col-md-5">
								<input type="hidden" class="form-control" name="p_iva_h" id="p_iva_h">
								<input type="text" class="form-control" name="p_iva_u" id="p_iva_u" disabled>
							</div>
						</div>
						<!-- Fine input partita iva -->
						
						<!-- Input nome -->
						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="nome_u" id="nome_u">
							</div>
						</div>
						<!-- Fine input nome -->
						
						<!-- Input cognome -->
						<div class="form-group">
							<label class="col-md-4 control-label">Cognome</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="cognome_u" id="cognome_u">
							</div>
						</div>
						<!-- Fine input cognome -->
						
						<!-- Input telefono -->
						<div class="form-group">
							<label class="col-md-4 control-label">Telefono</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="telefono_u" id="telefono_u">
							</div>
						</div>
						<!-- Fine input telefono -->
                    
                	</div>
                    <!-- Fine corpo modal -->
                    
                    <!-- Bottoni modal -->
                	<div class="modal-footer">
                		<input type="submit" class="btn btn-success" value="Upload">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                	</div>
                    <!-- Fine bottoni modal -->
                    
                </div>
            </fieldset>
		</form>
        <!-- Fine form upload sviluppatore -->
        
	</div>
</div>
<!-- Fine modal upload sviluppatore -->

<!-- Modal upload modulo -->
<div id="modal_upload_modulo" class="modal fade">
	<div class="modal-dialog">
        <!-- Form upload modulo -->
		<form class="form-horizontal" method="post" id="modulo_upload_form">
            <fieldset>
                <div class="modal-content">
                    
                    <!-- Titolo modal -->
                	<div class="modal-header">
                		<button type="button" class="close" data-dismiss="modal">&times;</button>
                		<h4 class="modal-title">Upload modulo</h4>
                	</div>
                    <!-- Fine titolo modal -->
                    
                    <!-- Corpo modal -->
                	<div class="modal-body">
                        
               			<!-- Input id -->
               			<div class="form-group">
							<label class="col-md-4 control-label">ID</label>   
							<div class="col-md-5">
								<input type="hidden" class="form-control" name="id_h" id="id_h">
								<input type="text" class="form-control" name="id_m" id="id_m" disabled>
							</div>
						</div>
						<!-- Fine input id-->
						
						<!-- Input nome -->
						<div class="form-group">
							<label class="col-md-4 control-label">Nome</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="nome_m" id="nome_m">
							</div>
						</div>
						<!-- Fine input nome -->
						
						<!-- Input funzione -->
						<div class="form-group">
							<label class="col-md-4 control-label">Funzione</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="funzione_m" id="funzione_m">
							</div>
						</div>
						<!-- Fine input funzione -->
						
						<!-- Input costo -->
						<div class="form-group">
							<label class="col-md-4 control-label">Costo</label>   
							<div class="col-md-5">
								<input type="text" class="form-control" name="costo_m" id="costo_m">
							</div>
						</div>
						<!-- Fine input costo -->
                    
                	</div>
                    <!-- Fine corpo modal -->
                    
                    <!-- Bottoni modal -->
                	<div class="modal-footer">
                		<input type="submit" class="btn btn-success" value="Upload">
                		<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                	</div>
                    <!-- Fine bottoni modal -->
                    
                </div>
            </fieldset>
		</form>
        <!-- Fine form upload sviluppatore -->
        
	</div>
</div>
<!-- Fine modal upload sviluppatore -->

</body>
</html>