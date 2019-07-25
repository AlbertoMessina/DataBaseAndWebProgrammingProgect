// education_experience table
$(document).ready(function(){

  var table =  $('#jamSessionTable').DataTable({
    "bFilter": false,
    "dom": "Bfrtip",
    "responsive": true,
    "bDestroy": true,
    "bProcessing": true,
    "scrollY": "150px",
    "scrollCollapse": true,
    "paging":         false,
    "info": false,
    "sAjaxSource": "phpOperation/Select/jamSessionSelect.php",
    "columnDefs": [
      { "orderable": false , "targets" : -1},
      { "width": "25%", "targets": -1 },
      { "visible" : false,   "targets": 0  },
      {"targets" : 1,
       "createdCell" : function(td, cellData, rowData, row, col) {
                       var partecipate = "<div class ='badge badge-lg badge-success  ml-4' style = 'width: 40px;' > P </div>" ;
                       var creator = "<div class ='badge badge-lg badge-primary  ml-4'  style = 'width: 40px;'>   C </div>";
                       var invite = "<div class ='badge badge-lg badge-warning  ml-4'  style = 'width: 40px;'>   I </div>"
                       $(td).html(creator);
                       if(cellData == "P") {
                         $(td).html(partecipate);
                       }
                       if(cellData == "I"){
                         $(td).html(invite);
                       }
       },
     }
    ],
    "aoColumns": [
      { "mData": "jamSessionId" },
      { "mData": "ruolo"},
      { "mData": "genere"},
      { "mData": "citta"},
      {"mData": "data"},
      {
        "mData" : null,
        "mRender": function(data, type, row) {
          // bottone che mostra le informazioni
          var buttonInfo = '<button class="btn  btn-sm ml-4" data-toggle = "modal" data-id ="'+row.jamSessionId+'" data-target ="#showJamModal" >' + '<span class="fas fa-eye"></span>' +  '</button>' ;
          //bottone per la modifica delle informazioni
          var buttonInfoSettings = '<button class="btn btn-primary btn-sm ml-4" data-toggle = "modal" data-id ="'+row.jamSessionId+'" data-target ="#updateJamModal" >' + '<span class="fas fa-pen-square"></span>' +  '</button>';
          // bottone per la cancellazione
          var buttonDelete = '<button id = "buttonDelete" class="btn btn-danger delete_btn btn-sm ml-4" data-toggle = "modal" data-id ="'+row.jamSessionId+'" data-genere = "'+row.genere+'"   data-citta ="'+row.citta+'" data-data ="'+row.data+'" data-target ="#checkModal">' + '<span class="fa fa-times"></span>' + '</button>';
          // bottone per "etrare" nella schermata della  jam con info sui partecipanti
          var buttonEnterJam = '<button  class="btn btn-success btnEnter btn-sm ml-4">' + "Enter" + '</button>';
          //bottone per i Partecipanti, per abbandonare la jam
          var buttonLeaveJam = '<button id = "buttonLeave" class="btn btn-info  btn-sm ml-1"  data-toggle = "modal" data-id ="'+row.jamSessionId+'" data-genere = "'+row.genere+'"   data-citta ="'+row.citta+'" data-data ="'+row.data+'" data-target ="#checkModal">' + "Leave" + '</button>';
          // bottoni per gli invitati.
          //Join -> Accetta l'invito
          var buttonJoinJam = '<button class="btn btn-success  btnJoin btn-sm ml-4" data-toggle = "modal" data-id ="'+row.jamSessionId+'" data-target ="#acceptInviteModal">' + "Join" + '</button>';
          // refuse -> rifiuta l'invito
          var buttonRefuseJam = '<button class="btn btn-danger btnRefuse btn-sm ml-4">' + "Refuse" + '</button>'
          var ruolo = row.ruolo;

          if(row.ruolo === "P") {
            return (buttonInfo +  buttonEnterJam + buttonLeaveJam);
          }
          if(ruolo === "C"){
            return (buttonInfo +  buttonInfoSettings + buttonEnterJam + buttonDelete);
          }
          if(ruolo ==="I"){
            return(buttonJoinJam + buttonRefuseJam);
          }
        }
      },
    ],
  });


});
