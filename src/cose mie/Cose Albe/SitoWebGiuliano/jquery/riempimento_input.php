<?php

include '../struct/$Query.php';

// Aggiornamento sviluppatore
if(isset($_POST["p_iva_update"])) {
	
	$query = query_seleziona_sviluppatore_piva($_POST["p_iva_update"]);
	
	$row = mysqli_fetch_array($query);
	
	$output["p_iva"] = $row["PIVA"];
	$output["nome"] = $row["NOME"];
	$output["cognome"] = $row["COGNOME"];
	$output["telefono"] = $row["TELEFONO"];
	
	echo json_encode($output);
	
}

// Aggiornamento modulo
if(isset($_POST["id"])) {
	
	$query = query_seleziona_modulo_id($_POST["id"]);
	
	$row = mysqli_fetch_array($query);
	
	$output["id"] = $row["ID"];
	$output["nome"] = $row["NOME"];
	$output["funzione"] = $row["FUNZIONE"];
	$output["costo"] = $row["COSTO"];

	echo json_encode($output);
	
}

?>