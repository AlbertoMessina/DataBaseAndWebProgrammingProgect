
$(document).ready(function(){

  $("#insertEducationExperience").submit(function(){
    var titolo = $('#titolo_form').val();
    var data  = $('#data_form').val()
    var locazione = $('#locazione_form').val();
    $.ajax({
      type:"POST",
      url:'phpOperation/Insert/insertEducationExperience.php',
      data:
      {
        'titolo': titolo,
        'data': data,
        'locazione':  locazione,
      },
      success: function(data)
      {
        if (data === "true")
        {
          //se il data è vero l'inserimento è andato a buon fine
          //chiudo la modale
          $('#edModal').modal('toggle');
          var table = $('#educationExperienceTable').DataTable();
          table.ajax.reload();
        }
        else
        {
          $('#errorMessageEducation').html("Errore riprova");
        }
      }
    });
  });


  $("#insertInstrument").submit(function(){

    var tipo = $('#tipo_form').val();
    var marca  = $('#marca_form').val()
    var modello = $('#modello_form').val();
    var personalizzazioni = $('#personalizzazioni_form').val();
    $.ajax({
      type:"POST",
      url:'phpOperation/Insert/insertInstrument.php',
      data:
      {
        'tipo': tipo,
        'marca': marca,
        'modello':  modello,
        'personalizzazioni':  personalizzazioni,
      },
      success: function(data)
      {
        if (data === "true")
        {
          //se il data è vero l'inserimento è andato a buon fine
          //chiudo la modale
          $('#instrumentModal').modal('toggle');
          var table = $('#instrumentTable').DataTable();
          table.ajax.reload();
        }
        else
        {
          $('#errorMessageInstrument').html("Errore riprova");
        }
      }
    });
  });
});
