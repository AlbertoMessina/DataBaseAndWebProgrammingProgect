// DataTable sviluppatori
$(document).ready(function() {			   
	$('#sviluppatori').DataTable( {	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
		"ajax": {
			"url": "jquery/DataTable_Sviluppatore.php",
        	"type": "POST"
		},					
		"columns": [
			{ "data": "p_iva" },
			{ "data": "nome" },
			{ "data": "cognome" },
			{ "data": "telefono" },
			{ "data": "update" }
			],
		"oLanguage": {
            "sProcessing":     "Caricamento...",
		    "sLengthMenu": 'Mostra <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">Tutti</option>'+
		        '</select> Sviluppatori',    
		    "sZeroRecords":    "Nessun risultato trovato.",
		    "sEmptyTable":     "Nessun sviluppatore presente.",
		    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
		    "sInfoEmpty":      "Nessun sviluppatore trovato.",
		    "sInfoFiltered":   "(File totali: _MAX_ file)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtra:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Attendi, caricamento in corso...",
		    "oPaginate": {
		        "sFirst":    "Primo",
		        "sLast":     "Ultimo",
		        "sNext":     "Seguente",
		        "sPrevious": "Antecedente"
		    },
		    "oAria": {
		        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
		        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
		    }
        }
	});
});
// --------------------------------------------------------

// DataTable layout
$(document).ready(function() {			   
	$('#layout').DataTable( {	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
		"ajax": {
			"url": "jquery/DataTable_Layout.php",
        	"type": "POST"
		},					
		"columns": [
			{ "data": "id" },
			{ "data": "costo_totale" },
			{ "data": "sviluppatore" }
			],
		"oLanguage": {
            "sProcessing":     "Caricamento...",
		    "sLengthMenu": 'Mostra <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">Tutti</option>'+
		        '</select> Layout',    
		    "sZeroRecords":    "Nessun risultato trovato.",
		    "sEmptyTable":     "Nessun layout presente.",
		    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
		    "sInfoEmpty":      "Nessun layout trovato.",
		    "sInfoFiltered":   "(File totali: _MAX_ file)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtra:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Attendi, caricamento in corso...",
		    "oPaginate": {
		        "sFirst":    "Primo",
		        "sLast":     "Ultimo",
		        "sNext":     "Seguente",
		        "sPrevious": "Antecedente"
		    },
		    "oAria": {
		        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
		        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
		    }
        }
	});
});
// --------------------------------------------------------

// DataTable modulo
$(document).ready(function() {			   
	$('#modulo').DataTable( {	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
		"ajax": {
			"url": "jquery/DataTable_Modulo.php",
        	"type": "POST"
		},					
		"columns": [
			{ "data": "id" },
			{ "data": "nome" },
			{ "data": "funzione" },
			{ "data": "costo" },
			{ "data": "update" }
			],
		"oLanguage": {
            "sProcessing":     "Caricamento...",
		    "sLengthMenu": 'Mostra <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">Tutti</option>'+
		        '</select> Moduli',    
		    "sZeroRecords":    "Nessun risultato trovato.",
		    "sEmptyTable":     "Nessun modulo presente.",
		    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
		    "sInfoEmpty":      "Nessun modulo trovato.",
		    "sInfoFiltered":   "(File totali: _MAX_ file)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtra:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Attendi, caricamento in corso...",
		    "oPaginate": {
		        "sFirst":    "Primo",
		        "sLast":     "Ultimo",
		        "sNext":     "Seguente",
		        "sPrevious": "Antecedente"
		    },
		    "oAria": {
		        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
		        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
		    }
        }
	});
});
// --------------------------------------------------------

// DataTable layout venduti
$(document).ready(function() {			   
	$('#layout_venduti').DataTable( {	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
		"ajax": {
			"url": "jquery/DataTable_Layout_Venduti.php",
        	"type": "POST"
		},					
		"columns": [
			{ "data": "id" },
			{ "data": "costo" },
			{ "data": "url" }
			],
		"oLanguage": {
            "sProcessing":     "Caricamento...",
		    "sLengthMenu": 'Mostra <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">Tutti</option>'+
		        '</select> Layout',    
		    "sZeroRecords":    "Nessun risultato trovato.",
		    "sEmptyTable":     "Nessun layout venduto.",
		    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
		    "sInfoEmpty":      "Nessun layout trovato.",
		    "sInfoFiltered":   "(File totali: _MAX_ file)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtra:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Attendi, caricamento in corso...",
		    "oPaginate": {
		        "sFirst":    "Primo",
		        "sLast":     "Ultimo",
		        "sNext":     "Seguente",
		        "sPrevious": "Antecedente"
		    },
		    "oAria": {
		        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
		        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
		    }
        }
	});
});
// --------------------------------------------------------

// DataTable siti_web commissionati
$(document).ready(function() {			   
	$('#siti_commissionati').DataTable( {	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
		"ajax": {
			"url": "jquery/DataTable_Siti_Commissionati.php",
        	"type": "POST"
		},					
		"columns": [
			{ "data": "codice" },
			{ "data": "url" },
			{ "data": "data" },
			{ "data": "layout" }
			],
		"oLanguage": {
            "sProcessing":     "Caricamento...",
		    "sLengthMenu": 'Mostra <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">Tutti</option>'+
		        '</select> Siti',    
		    "sZeroRecords":    "Nessun risultato trovato.",
		    "sEmptyTable":     "Nessun sito commissionato.",
		    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
		    "sInfoEmpty":      "Nessun sito trovato.",
		    "sInfoFiltered":   "(File totali: _MAX_ file)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtra:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Attendi, caricamento in corso...",
		    "oPaginate": {
		        "sFirst":    "Primo",
		        "sLast":     "Ultimo",
		        "sNext":     "Seguente",
		        "sPrevious": "Antecedente"
		    },
		    "oAria": {
		        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
		        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
		    }
        }
	});
});
// --------------------------------------------------------

// DataTable layout di uno sviluppatore
$(document).ready(function() {
	$('#sviluppatore_send').on('change', function() {
		$('#sviluppatori_layout').dataTable( {
			"bDeferRender": true,
			"bDestroy": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "jquery/menu_dinamico.php?sviluppatore="+$('#sviluppatore_send').val(),		
			"columns": [
				{ "data": "id" },
				{ "data": "costo_totale" }
				],
			"oLanguage": {
		        "sProcessing":     "Caricamento...",
			    "sLengthMenu": 'Mostra <select>'+
			        '<option value="10">10</option>'+
			        '<option value="20">20</option>'+
			        '<option value="30">30</option>'+
			        '<option value="40">40</option>'+
			        '<option value="50">50</option>'+
			        '<option value="-1">Tutti</option>'+
			        '</select>',    
			    "sZeroRecords":    "Nessun risultato trovato.",
			    "sEmptyTable":     "Nessun layout creato.",
			    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
			    "sInfoEmpty":      "",
			    "sInfoFiltered":   "",
			    "sInfoPostFix":    "",
			    "sSearch":         "Filtra:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Attendi, caricamento in corso...",
			    "oPaginate": {
			        "sFirst":    false,
			        "sLast":     false,
			        "sNext":     false,
			        "sPrevious": false
			    },
			    "oAria": {
			        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
			        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
			    }
		    }
		});
	});	
});
// --------------------------------------------------------

// DataTable siti web di un cliente
$(document).ready(function() {
	$('#cliente_send').on('change', function() {
		$('#siti_clienti').dataTable( {
			"bDeferRender": true,
			"bDestroy": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "jquery/menu_dinamico.php?cliente="+$('#cliente_send').val(),		
			"columns": [
				{ "data": "codice" },
				{ "data": "url" },
				{ "data": "data_p" },
				{ "data": "layout" }
				],
			"oLanguage": {
		        "sProcessing":     "Caricamento...",
			    "sLengthMenu": 'Mostra <select>'+
			        '<option value="10">10</option>'+
			        '<option value="20">20</option>'+
			        '<option value="30">30</option>'+
			        '<option value="40">40</option>'+
			        '<option value="50">50</option>'+
			        '<option value="-1">Tutti</option>'+
			        '</select>',    
			    "sZeroRecords":    false,
			    "sEmptyTable":     "Nessun sito acquistato.",
			    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
			    "sInfoEmpty":      "",
			    "sInfoFiltered":   "",
			    "sInfoPostFix":    "",
			    "sSearch":         "Filtra:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Attendi, caricamento in corso...",
			    "oPaginate": {
			        "sFirst":    false,
			        "sLast":     false,
			        "sNext":     false,
			        "sPrevious": false
			    },
			    "oAria": {
			        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
			        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
			    }
		    }
		});
	});	
});
// --------------------------------------------------------

// DataTable moduli di un layout
$(document).ready(function() {
	$('#layout_send').on('change', function() {
		$('#moduli_layout').dataTable( {
			"bDeferRender": true,
			"bDestroy": true,
			"sPaginationType": "full_numbers",
			"sAjaxSource": "jquery/menu_dinamico.php?layout="+$('#layout_send').val(),		
			"columns": [
				{ "data": "id" },
				{ "data": "nome" },
				{ "data": "funzione" },
				{ "data": "costo" }
				],
			"oLanguage": {
		        "sProcessing":     "Caricamento...",
			    "sLengthMenu": 'Mostra <select>'+
			        '<option value="10">10</option>'+
			        '<option value="20">20</option>'+
			        '<option value="30">30</option>'+
			        '<option value="40">40</option>'+
			        '<option value="50">50</option>'+
			        '<option value="-1">Tutti</option>'+
			        '</select>',    
			    "sZeroRecords":    "Nessun risultato trovato.",
			    "sEmptyTable":     "Questo layout non ha moduli.",
			    "sInfo":           "Mostrati _END_ file su _TOTAL_.",
			    "sInfoEmpty":      "",
			    "sInfoFiltered":   "",
			    "sInfoPostFix":    "",
			    "sSearch":         "Filtra:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Attendi, caricamento in corso...",
			    "oPaginate": {
			        "sFirst":    false,
			        "sLast":     false,
			        "sNext":     false,
			        "sPrevious": false
			    },
			    "oAria": {
			        "sSortAscending":  ": Abilitato per ordinare la colonna in ordine crescente",
			        "sSortDescending": ": Abilitato per ordinare la colonna in ordine decrescente"
			    }
		    }
		});
	});	
});
// --------------------------------------------------------