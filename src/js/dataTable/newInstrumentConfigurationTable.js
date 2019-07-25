
// education_experience table
$(document).ready(function(){
  $("#newConfigurationModal").on('show.bs.modal', function (e) {

    var table =  $('#educationExperienceTable').DataTable({
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "bProcessing": true,
      "scrollY": "200px",
      "scrollCollapse": true,
      "paging":         false,
      "info": false,
      "sAjaxSource": "phpOperation/Select/educationExperienceSelect.php",
      "columnDefs": [

        { "width": "10%", "targets": -1 },
        { "orderable": false , "targets" : -1},
        { "visible" : false,   "targets":0  },
        {render: function (data, type, ) {
          return "<div class='text-wrap'>" + data + "</div>";
        },
        targets: 1},
      ],
      "aoColumns": [
        { "mData": "education_experience_id" },
        { "mData": "titolo" },
        { "mData": "anno"},
        { "mData": "locazione"},
        {
          "mData" : null,
          "mRender": function(data, row) {
            return '<input type="radio" class ="educationExperienceRadio" value = "' + data.education_experience_id +'" name = "educationExperienceRadio" > </input>';
          }
        },
      ],

    });
    setTimeout(function() {
    table.columns.adjust();
  }, 200);

  });
});

$(document).ready(function(){
  $("#newConfigurationModal").on('show.bs.modal', function (e) {

    var table =  $('#instrumentTable').DataTable({
      "bFilter": false,
      "dom": "Bfrtip",
      "responsive": true,
      "bDestroy": true,
      "bProcessing": true,
      "scrollY":        "200px",
      "scrollCollapse": true,
      "paging":         false,
      "info": false,
      "sAjaxSource": "phpOperation/Select/instrumentSelect.php",
      "columnDefs": [
        { "width": "10%", "targets":-1 },
        { "orderable": false , "targets" : -1},
        {
          "visible" : false,   "targets":0
        },
      ],
      "aoColumns": [
        { "mData": "instrument_id" },
        { "mData": "tipologia" },
        { "mData": "marca"},
        { "mData": "modello"},

        {
          "mData" : null,
          "mRender": function(data, type, full) {
            return '<input type="radio" class="instrumentRadio"  value = "' + data.instrument_id +'"name = "instrumentRadio"ml-5" > </input>';
          }
        },
      ],
    });
    setTimeout(function() {
      table.columns.adjust();
    }, 200);


  });
});
