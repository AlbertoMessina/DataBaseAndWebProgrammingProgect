<?php

include '../struct/$Query.php';

// Creazione datatable layout sviluppatore
if(isset($_GET["sviluppatore"])) {
	
	// Eleborazione delle variabili passate tramite metodo POST
	$sviluppatore = $_GET["sviluppatore"];
	
	// Seleziona i layout del dato sviluppatore
    $layout_x = query_layout_sviluppatore($sviluppatore);
	
	$tabella = "";
	
	while($record = mysqli_fetch_assoc($layout_x)) {
		
		$tabella.='{
			"id":"'.$record['ID'].'",
			"costo_totale":"'.$record['COSTO_TOTALE'].'"
		},';
		
	}
	
	// Elimina la virgola finale
	$tabella = substr($tabella,0, strlen($tabella) - 1);
	
	echo '{"data":['.$tabella.']}';
	
}

// Creazione datatable siti web cliente
if(isset($_GET["cliente"])) {
	
	// Eleborazione delle variabili passate tramite metodo POST
	$cliente = $_GET["cliente"];
	
	// Seleziona i layout del dato sviluppatore
    $sito_x = query_seleziona_siti($cliente);
	
	$tabella = "";
	
	while($record = mysqli_fetch_assoc($sito_x)) {
		
		$tabella.='{
			"codice":"'.$record['CODICE'].'",
			"url":"'.$record['URL'].'",
			"data_p":"'.$record['DATA_PUBBLICAZIONE'].'",
			"layout":"'.$record['LAYOUT'].'"
		},';
		
	}
	
	// Elimina la virgola finale
	$tabella = substr($tabella,0, strlen($tabella) - 1);
	
	echo '{"data":['.$tabella.']}';
	
}

// Creazione datatable moduli di un layout
if(isset($_GET["layout"])) {
	
	// Eleborazione delle variabili passate tramite metodo POST
	$layout = $_GET["layout"];
	
	// Seleziona i moduli del layout
    $modulo_x = query_seleziona_moduli_di_layout($layout);
	
	$tabella = "";
	
	while($record = mysqli_fetch_assoc($modulo_x)) {
		
		$tabella.='{
			"id":"'.$record['id'].'",
			"nome":"'.$record['nome'].'",
			"funzione":"'.$record['funzione'].'",
			"costo":"'.$record['costo'].'"
		},';
		
	}
	
	// Elimina la virgola finale
	$tabella = substr($tabella,0, strlen($tabella) - 1);
	
	echo '{"data":['.$tabella.']}';
	
}

?>