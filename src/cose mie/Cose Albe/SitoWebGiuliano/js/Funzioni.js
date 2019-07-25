// Apertura menu sviluppatore per la registrazione
$(document).ready(function(){
	$('#sviluppatore').click(function(){
		this.checked?$('#input_sviluppatore').show(1000):$('#input_sviluppatore').hide(); // jshint ignore:line
	});
});
// -----------------------------------------------------------

// Inserimento sviluppatore
$(document).on('submit', '#sviluppatore_form', function(event) {
	
	event.preventDefault();
	
	// Memorizza le variabili
	var p_iva = $('#p_iva').val();
	var nome = $('#nome').val();
	var cognome = $('#cognome').val();
	var telefono = $('#telefono').val();
	var mail = $('#mail').val();
	var password = $('#password').val();
	
	// Controlla se sono stati riempiti tutti i campi
	if(p_iva !== '' && nome !== '' && cognome !== '' && telefono !== '' && mail !== '' && password !== '') {
		
		// Invia le variabili tramite post
		$.ajax({
			url:"jquery/inserimento_sviluppatore.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			
			// Quando riceve risposta esegue le azioni
			success:function(data) {
				alert(data);
				$('#sviluppatore_form')[0].reset();
				$('#modal_sviluppatore').modal('hide');
				$('#sviluppatori').DataTable().ajax.reload();
			}
		});
	}
	else {
		alert("Riempi tutti i campi!");
	}
});
// ------------------------------------------------------

// Inserimento modulo
$(document).on('submit', '#modulo_form', function(event) {
	
	event.preventDefault();
	
	// Memorizza le variabili
	var nome_modulo = $('#nome_modulo').val();
	var funzione = $('#funzione').val();
	var costo = $('#costo').val();
	
	// Controlla se tutti i campi sono stati riempiti
	if(nome_modulo !== '' && funzione !== '' && costo !== '') {
		
		// Invia le variabili tramite post
		$.ajax({
			url:"jquery/inserimento_modulo.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			
			// Quando riceve risposta esegue le azioni
			success:function(data) {
				alert(data);
				$('#modulo_form')[0].reset();
				$('#modal_modulo').modal('hide');
				$('#modulo').DataTable().ajax.reload();
			}
		});
	}
	else {
		alert("Riempi tutti i campi!");
	}
});
// ------------------------------------------------------

// Inserimento layout
$(document).on('submit', '#layout_form', function(event) {
	
	event.preventDefault();
	
	// Memorizza le variabili
	var sviluppatore_layout = $('#sviluppatore_layout').val();
	var checkbox_value = "";
	$("input[name=modulo_layout]").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + "_";
        }
    });
	
	// Controlla se tutti i campi sono stati riempiti
	if(sviluppatore_layout !== '' && checkbox_value !== '') {
		
		// Invia le variabili tramite post
		$.ajax({
			
			url:"jquery/inserimento_layout.php",
			method:'POST',
			data: "sviluppatore_layout=" + sviluppatore_layout + "&checkbox_value=" + checkbox_value,
			dataType: "html",
			
			// Quando riceve risposta esegue le azioni
			success:function(data) {
				alert(data);
				$('#layout_form')[0].reset();
				$('#modal_layout').modal('hide');
				$('#layout').DataTable().ajax.reload();
			}
		});
	}
	else {
		alert("Riempi tutti i campi!");
	}
});
// ------------------------------------------------------

// Apertura modal per l'aggiornamento dello sviluppatore
$(document).on('click', '.update', function() {
	
	// Memorizza le variabili
	var p_iva_update = $(this).attr("id");
	
	// Invia le variabili tramite post
	$.ajax({
		url:"jquery/riempimento_input.php",
		method:"POST",
		data:{p_iva_update:p_iva_update},
		dataType:"json",
		
		// Esegue le azioni quando riceve risposta
		success:function(data) {
			$('#modal_upload_sviluppatore').modal('show');
			$('#p_iva_h').val(p_iva_update);
			$('#p_iva_u').val(p_iva_update);
			$('#nome_u').val(data.nome);
			$('#cognome_u').val(data.cognome);
			$('#telefono_u').val(data.telefono);
		}
	});
});
// ------------------------------------------------------

// Apertura modal per l'aggiornamento del modulo
$(document).on('click', '.update_modulo', function() {
	
	// Memorizza le variabili
	var id = $(this).attr("id");
	
	// Invia le variabili tramite post
	$.ajax({
		url:"jquery/riempimento_input.php",
		method:"POST",
		data:{id:id},
		dataType:"json",
		
		// Esegue le azioni quando riceve risposta
		success:function(data)
		{
			$('#modal_upload_modulo').modal('show');
			$('#id_m').val(id);
			$('#id_h').val(id);
			$('#nome_m').val(data.nome);
			$('#funzione_m').val(data.funzione);
			$('#costo_m').val(data.costo);
		}
	});
});
// ------------------------------------------------------

// Aggiornamento dati sviluppatore
$(document).on('submit', '#sviluppatore_upload_form', function(event) {
	
	event.preventDefault();
	
	// Memorizza le variabili
	var p_iva_u = $('#p_iva_u').val();
	var nome_u = $('#nome_u').val();
	var cognome_u = $('#cognome_u').val();
	var telefono_u = $('#telefono_u').val();
	
	// Controlla se i campi sono stati riempiti
	if(p_iva_u !== '' && nome_u !== '' && cognome_u !== '' && telefono_u !== '') {
		
		// Invia le variabili tramite post
		$.ajax({
			url:"jquery/aggiornamento_record.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			
			// Quando riceve risposta esegue le azioni
			success:function(data) {
				alert(data);
				$('#sviluppatore_upload_form')[0].reset();
				$('#modal_upload_sviluppatore').modal('hide');
				$('#sviluppatori').DataTable().ajax.reload();
			}
		});
	}
	else {
		alert("Riempi tutti i campi!");
	}
});
// ------------------------------------------------------

// Aggiornamento dati modulo
$(document).on('submit', '#modulo_upload_form', function(event) {
	
	event.preventDefault();
	
	// Memorizza le variabili
	var id_h = $('#id_h').val();
	var nome_m = $('#nome_m').val();
	var funzione_m = $('#funzione_m').val();
	var costo_m = $('#costo_m').val();
	
	// Controlla se tuti i campi sono stati riempiti
	if(id_h !== '' && nome_m !== '' && funzione_m !== '' && costo_m !== '') {
		
		// Invia le variabili tramite post
		$.ajax({
			url:"jquery/aggiornamento_record.php",
			method:'POST',
			data:new FormData(this),
			contentType:false,
			processData:false,
			
			// Quando riceve risposta esegue le azioni
			success:function(data) {
				alert(data);
				$('#modulo_upload_form')[0].reset();
				$('#modal_upload_modulo').modal('hide');
				$('#modulo').DataTable().ajax.reload();
				$('#layout').DataTable().ajax.reload();
			}
		});
	}
	else {
		alert("Riempi tutti i campi!");
	}
});
// ------------------------------------------------------