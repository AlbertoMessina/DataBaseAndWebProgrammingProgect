$(document).ready(function(){

  $.ajax({
    type:"POST",
    url:'phpOperation/Select/userSelect.php',
    success: function(data)
    {
      var row = (JSON.parse(data))[0];
      $('#nome').html(row['name']);
      $('#cognome').html(row['surname']);
      $('#email').html(row['email']);
    }
  });
  $("#noteModal").on('show.bs.modal', function (e) {
    var triggerLink = $(e.relatedTarget);
    var note = triggerLink.data("note");
    if (note == null || note == "")
    {

      $('#showNote').html("Nessuna nota inserita");
    }
    else{

      $('#showNote').html(note);
    }

  });

  //Gestione modal nuova Configurazione
  $('#insertConfiguration').submit(function(){
    var titolo = $("#titolo_form").val();
    var note = $("#note_form").val();
    var  instrumentId = $('.instrumentRadio:checked').val();
    var educationExperienceId = $('.educationExperienceRadio:checked').val();

    $.ajax({
      type:"POST",
      url:'phpOperation/Check/checkSessionInstrument.php',
      data:
      {
        'instrumentId':  instrumentId,
        'educationExperienceId':  educationExperienceId,
      },
      success: function(data)
      {
        if (data === "false")
        {
          // se è false allora non è stato trovato nulla
          event.preventDefault();
          $.ajax({
            type:"POST",
            url:'phpOperation/Insert/insertInstrumentConfiguration.php',
            data:
            {
              'titolo': titolo,
              'note': note,
              'instrumentId':  instrumentId,
              'educationExperienceId':  educationExperienceId,
            },
            success: function(data)
            {
              if (data === "true")
              {
                //se il data è vero l'inserimento è andato a buon fine
                alert("inserimento riuscito");
                $('#newConfigurationModal').modal('toggle');
                var table = $('#instrumentConfigurationTable').DataTable();
                table.ajax.reload();

              }
              else
              {
                $('#newConfigurationModal').modal('toggle');
                $("#messageError").html("Impossibile inserire si è verificato un errore");
                $("#messageError").show("slow");

                setTimeout(function() {
                  $("#messageError").hide("slow");
                  currentButton.prop("disabled",false);
                }, 3000);
              }
            }  // fine success insert
          }); // fine ajax insert

        } // fine if ajax check
        else
        {
          alert("impossibile inserire la configurazione, è già presente");
        }// fine else ajax check
      }// fine funzinoe success
    }); // fine chiamta ajax check
    event.preventDefault();
  });
  $('#newConfigurationModal').on('hidden.bs.modal', function (e) {
  $('form :input').val('');
})
});
