//tabella modale step 2
$(document).ready(function(){
  $("#newJamModal").on('show.bs.modal', function (e) {
    var table =  $('#userTable').DataTable({
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "bProcessing": true,
      "scrollY": "200px",
      "scrollCollapse": true,
      "paging":         false,
      "info": false,
      "sAjaxSource": "phpOperation/Select/userJamSelect.php",
      "columnDefs": [
        { "orderable": false , "targets" : -1},
        { "width": "15%", "targets": -1 },
        { "visible" : false,   "targets": 0  },
      ],
      "aoColumns": [
        {"mData" : "userId"},
        { "mData": "nome" },
        { "mData": "email"},
        {
          "mData" : null,
          "mRender": function(data,  row) {
            return  '<input type="checkbox" class ="checkUser" value = "' + data.userId +'" >'
          }
        },
      ],
    });
  });
});
