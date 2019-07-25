
// education_experience table
$(document).ready(function(){

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
      { "width": "5%", "targets": 4 },
      { "orderable": false , "targets" : 4},
      { "visible" : false,   "targets":0  },
      {render: function (data, type, full, meta) {
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
        "mRender": function(data, type, full) {
          return '<button class="btn btn-danger delete_btn btn-sm ml-4" >' + '<span class="fa fa-times"></span>' +  '</button>';
        }
      },
    ],

  });

  // gestione bottoni education
  $('#educationExperienceTable tbody').on('click' , 'button' , function(){
    var data = table.row( $(this).parents('tr') ).data();
    $.ajax({
      type:"POST",
      url:'phpOperation/Delete/deleteEducationExp.php',
      data:
      {
        education_experience_id : data.education_experience_id
      },
      success: function(data)
      {
        table.ajax.reload();
      }
    });
  });
});

$(document).ready(function(){

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
      { "width": "5%", "targets": 5 },
      { "orderable": false , "targets" : 5},
      {
        "visible" : false,   "targets":0
      },
    ],
    "aoColumns": [
      { "mData": "instrument_id" },
      { "mData": "tipologia" },
      { "mData": "marca"},
      { "mData": "modello"},
      { "mData": "personalizzazioni"},
      {
        "mData" : null,
        "mRender": function(data, type, full) {
          return '<button class="btn btn-danger delete_btn btn-sm ml-4">' + '<span class="fa fa-times"></span>' + '</button>';
        }
      },
    ],

  });


  // gestione bottoni instrument_table
  $('#instrumentTable tbody').on('click' , 'button' , function(){
    var data = table.row( $(this).parents('tr') ).data();
    $.ajax({
      type:"POST",
      url:'phpOperation/Delete/deleteInstrument.php',
      data:
      {
        instrument_id : data.instrument_id
      },
      success: function(data)
      {
        table.ajax.reload();
      }
    });

  });
});
