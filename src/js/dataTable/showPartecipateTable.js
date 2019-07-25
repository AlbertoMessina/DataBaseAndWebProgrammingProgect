
// education_experience table
$(document).ready(function(){
  $("#showJamModal").on('show.bs.modal', function (e) {
    var triggerLink = $(e.relatedTarget);
    var jam_id = triggerLink.data("id");
    var table =  $('#partecipateJamTable').DataTable({
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "bProcessing": true,
      "scrollY":        "200px",
      "scrollCollapse": true,
      "paging":         false,
      "info": false,
      "ajax": {
        "url": "phpOperation/Select/partecipateSelect.php",
        "type": "POST",
        "data": {
          "jam_id": jam_id
        }
      },
      "aoColumns": [
        { "mData": "nome" },
        { "mData": "tipo strumento" },
        { "mData": "marca"},
        { "mData": "modello"},
      ],
    });

    setTimeout(function() {
      table.columns.adjust();
    }, 200);
  });

});
