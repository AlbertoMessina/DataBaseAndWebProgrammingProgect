// tabella istrument configuration modale step 3
$(document).ready(function(){
  $("#newJamModal").on('show.bs.modal', function (e) {
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
        { "visible" : false,   "targets": 0  },

      ],
      "aoColumns": [
        { "mData": "session_instrument_id" },
        { "mData": "titolo"},
        { "mData": "titolo_esperienza"},
        { "mData": "tipo"},
        {"mData": "marca"},
        {"mData": "modello"},
        {
          "mData" : null,
          "mRender": function(data, type, row) {
            return  '<input type="radio" name ="radioIns" value = "' + data.session_instrument_id +'" >'
          }
        },
      ],
    });
  });

  $("#acceptInviteModal").on('show.bs.modal', function (e) {
    var table =  $('.instrumentConfigurationTable').DataTable({
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
        { "visible" : false,   "targets": 0  },

      ],
      "aoColumns": [
        { "mData": "session_instrument_id" },
        { "mData": "titolo"},
        { "mData": "titolo_esperienza"},
        { "mData": "tipo"},
        {"mData": "marca"},
        {"mData": "modello"},
        {
          "mData" : null,
          "mRender": function(data, type, row) {
            return  '<input type="radio" name ="radioInsInvite" value = "' + data.session_instrument_id +'" >'
          }
        },
      ],
    });
    setTimeout(function() {
      table.columns.adjust();
    }, 200);
  });

});
