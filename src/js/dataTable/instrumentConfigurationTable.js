//tabella instrument configuration
$(document).ready(function(){
  $("#messageError").hide();

  var table =  $('#instrumentConfigurationTable').DataTable({
    "bFilter": false,
    "dom": "Bfrtip",
    "responsive": true,
    "bDestroy": true,
    "bProcessing": true,
    "scrollY": "200px",
    "scrollCollapse": true,
    "paging":         false,
    "info": false,
    "sAjaxSource": "phpOperation/Select/sessionInstrumentSelect.php",
    "columnDefs": [
      { "orderable": false , "targets" : -1},
      { "width": "10%", "targets": -1 },
      { "orderable": false , "targets" : -2},
      { "width": "10%", "targets": -2 },
      { "visible" : false,   "targets": 0  },
      { "visible" : false,   "targets": -3  },
    ],
    "aoColumns": [
      { "mData": "session_instrument_id" },
      { "mData": "titolo"},
      { "mData": "titolo_esperienza"},
      { "mData": "tipo"},
      {"mData": "marca"},
      {"mData": "modello"},
      {"mData" : "note"},
      {
        "mData" : null,
        "mRender": function(data, type, row) {
          return '<button id = "btn_note" class="btn btn_note  btn-sm ml-3" data-toggle = "modal" data-note ="'+row.note+'" data-target ="#noteModal" >' + '<span class="fa fa-sticky-note"></span>' + '</button>';
        }
      },
      {
        "mData" : null,
        "mRender": function(data, type, row) {
          return '<button  class="btn btn-danger delete_btn btn-sm ml-4">' + '<span class="fa fa-times"></span>' + '</button>';
        }
      },
    ],
  });

  // gestione bottoni 
  $('#instrumentConfigurationTable tbody').on('click' , 'button.delete_btn' , function(){
    var obj = table.row( $(this).parents('tr') ).data();
    var sessionInstrumentId = obj.session_instrument_id;
    var currentButton = $(this);
    currentButton.prop("disabled",true);
    // prima effettuo il check della sesson_instrument se non è presente già per una jamSession, poi posso procedere all'eliminazione

    $.ajax({
      type:"POST",
      url:'phpOperation/Check/checkUsedSessionInstrument.php',
      data:
      {
        session_instrument_id : sessionInstrumentId
      },
      success: function(data)
      {
        // se è falsa allaro la mia configurazione non è inserita in nessuna jam , la posso cancellare
        event.preventDefault();
        if(data == "false"){
          $.ajax({
            type:"POST",
            url:'phpOperation/Delete/deleteSessionInstrument.php',
            data:
            {
              session_instrument_id :sessionInstrumentId
            },
            success: function(data)
            {
              table.ajax.reload();
            }
          });
        }else
        {
          $('#messageError').html("Impossibile cancellare , la configurazione è inserita per una jam");
          $("#messageError").show("slow");
          setTimeout(function() {
            $("#messageError").hide("slow");

            currentButton.prop("disabled",false);
          }, 3000);

        }
      }
    });
    event.preventDefault();
  });
});
