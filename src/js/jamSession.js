$(document).ready(function(){
  //gestione modale show information
  $("#showJamModal").on('show.bs.modal', function (e) {
    var triggerLink = $(e.relatedTarget);
    var jam_id = triggerLink.data("id");
    $.ajax({
      type:"POST",
      url:'phpOperation/Select/jamSessionSearch.php',
      data:
      {
        jam_id :jam_id
      },
      success: function(data)
      {
        var row = (JSON.parse(data))[0];
        $('#genere').html(row['genre']);
        $('#luogo').html(row['citta']);
        $('#indirizzo').html(row['indirizzo']);
        $('#numPartecipanti').html(row['partecipanti']);
        $('#data').html(row['date']);
      }
    });

  });

  $("#updateJamModal").on('show.bs.modal', function (e) {
    var triggerLink = $(e.relatedTarget);
    var jam_id = triggerLink.data("id");
    $.ajax({
      type:"POST",
      url:'phpOperation/Select/jamSessionSearch.php',
      data:
      {
        jam_id :jam_id
      },
      success: function(data)
      {
        var row = (JSON.parse(data))[0];
        $('#genere_form').val(row['genre']);
        $('#citta_form').val(row['citta']);
        $('#indirizzo_form').val(row['indirizzo']);
        $('#data_form').val(row['date']);
        $('#jamId_form').val(jam_id);
      }
    });
  });

  $('#updateJamModal').submit(function(){
    var genere = $("#genere_form").val();
    var citta = $("#citta_form").val();
    var indirizzo = $('#indirizzo_form').val();
    var data = $('#data_form').val();
    var jamId =  $('#jamId_form').val();

    $.ajax({
      type:"POST",
      url:'phpOperation/Update/UpdateJamSession.php',
      data:
      {
        'genre': genere,
        'city' : citta,
        'address' : indirizzo,
        'date': data,
        'jamId' : jamId,
      },
      success: function(data)
      {
        if(data == "true")
        {

          $('#updateJamModal').modal('toggle');
          var table = $('#jamSessionTable').DataTable();
          table.ajax.reload();
        }
        else {
          alert("Errore nella modifica della jam ");
          $('#updateJamModal').modal('toggle');
        }
      }// fine funzinoe success
    }); // fine chiamta ajax check
    event.preventDefault();
  });

  $("#acceptInviteModal").on('show.bs.modal', function (e) {
    var triggerLink = $(e.relatedTarget);
    var jam_id = triggerLink.data("id");
    $("#jamSessionDiv").html(jam_id);
  });

  $('#btnAccept').click(function() {
    var jam_id =$("#jamSessionDiv").html();
    // prelevo il valore del set
    var set_id =  $('input[name="radioInsInvite"]:checked').val();
    $.ajax({
      type:"POST",
      url:'phpOperation/Insert/insertPartecipation.php',
      data:
      {
        jam_id :jam_id,
        set_id : set_id
      },
      success: function(data)
      {
        $('#acceptInviteModal').modal('toggle');
        var table = $('#jamSessionTable').DataTable();
        table.ajax.reload();
      }
    });
  });

  $("#checkModal").on('show.bs.modal', function (e) {
    var triggerLink = $(e.relatedTarget);
    console.log(e.relatedTarget);
    var jam_id = triggerLink.data("id");
    var button_id = triggerLink[0].id;
    var genere = triggerLink.data("genere");
    var citta = triggerLink.data("citta");
    var data = triggerLink.data("data");
    $("#checkGenere").html(genere);
    $("#checkCitta").html(citta);
    $("#checkData").html(data);
    $("#buttonTipe").html(button_id);
    $("#jamId").html((jam_id));
    if(button_id == "buttonDelete"){
      $("#labelCheck").html("Sicuro di voler eliminare la seguente Jam");
    }else{
      $("#labelCheck").html("Sicuro di voler uscire dalla seguente Jam");
    };

  });

  //getione bottone della modale
  $("#confirmButton").click(function(){
    var button_id = $("#buttonTipe").html();
    var jam_id =  $("#jamId").html();
    if(button_id == "buttonDelete"){
      // chiamta ajax per eliminare la jam
      $.ajax({
        type:"POST",
        url:'phpOperation/Delete/deleteJamSession.php',
        data:
        {
          jam_id :jam_id
        },
        success: function(data)
        {
          if(data === "true"){
            var table = $('#jamSessionTable').DataTable();
            table.ajax.reload();
            $('#checkModal').modal('toggle');
            alert("Cancellazione riuscita");
          }
        }
      });
    }else{
      // chiamata per lasciare la jam
      $.ajax({
        type:"POST",
        url:'phpOperation/Update/updatePartecipationLeaveJam.php',
        data:
        {
          jam_id :jam_id
        },
        success: function(data)
        {
          if(data === "true"){
            var table = $('#jamSessionTable').DataTable();
            table.ajax.reload();
            alert("Leave riuscita");
          }
        }
      });
    };

  });


  $('#jamSessionTable tbody').on('click' , 'button.btnRefuse' , function(){
    var table = $('#jamSessionTable').DataTable();
    var obj = table.row( $(this).parents('tr') ).data();
    var jam_id = obj.jamSessionId;
    $.ajax({
      type:"POST",
      url:'phpOperation/Update/updateRefuseInvite.php',
      data:
      {
        jam_id :jam_id
      },
      success: function(data)
      {
        var table = $('#jamSessionTable').DataTable();
        table.ajax.reload();
      }
    });
  });

  //chiamate ajax per il rating
  //** Funzioni per la creazione del rating **//
  //** STAR NOTE**
  function starNote( val ){
    var initialRating = val;
    $("#star").remove();
    $('#rating').append('<div id="star"></div>');
    $("#star").starRating({
      initialRating: initialRating,
      disableAfterRate:false,
      useFullStars: true,
      emptyColor: 'lightgray',
      strokeColor: '#000000',
      strokeWidth: 15,
      starSize: 40,
      useGradient: false,
      callback: function(currentRating, $el){
        ajaxStarNote(currentRating);
      }
    });
  };

  //** STAR Performance **//
  function starPerfomance( val){
    var initialRating = val;
    $("#starPerformance").remove();
    $('#ratingPerformance').append('<div id="starPerformance"></div>');
    $("#starPerformance").starRating({
      initialRating: val,
      disableAfterRate:false,
      useFullStars: true,
      emptyColor: 'lightgray',
      strokeColor: '#000000',
      strokeWidth: 10,
      starSize: 25,
      useGradient: false,
      callback: function(currentRating, $el){
        ajaxStarPerformance(currentRating);
      }
    });
  };
  //** STAR PROFESSIONALITY //**
  function starProfessionalita( val){
    var initialRating = val;
    $("#starProfessionalita").remove();
    $('#ratingProfessionalita').append('<div id="starProfessionalita"></div>');
    $("#starProfessionalita").starRating({
      initialRating: val,
      disableAfterRate:false,
      useFullStars: true,
      emptyColor: 'lightgray',
      strokeColor: '#000000',
      strokeWidth: 10,
      starSize: 25,
      useGradient: false,
      callback: function(currentRating, $el){
        ajaxStarProfessionalita(currentRating);
      }
    });
  };

  //** STAR IMPRESSIONI **//
    function starImpressioni( val){
     var initialRating = val;
      $("#starFeeling").remove();
      $('#ratingImpressioni').append('<div id="starFeeling"></div>');
      $("#starFeeling").starRating({
        initialRating: initialRating,
        disableAfterRate:false,
        useFullStars: true,
        emptyColor: 'lightgray',
        strokeColor: '#000000',
        strokeWidth: 10,
        starSize: 25,
        useGradient: false,
        callback: function(currentRating, $el){
          ajaxStarImpressioni(currentRating);
        }
      });

    };

  // ** Chiamte ajax per l'update del valore del rating **//
  // **  RATING NOTE **//
  function ajaxStarNote(val){
    var jam_id = $('#jamIdLab').html();
    var rating = val;
    $.ajax({
      type:"POST",
      url:'phpOperation/Update/updateNoteRating.php',
      data:
      {
        jam_id : jam_id,
        rating : rating,
      },
      success: function(data)
      {
        if(data === "true"){
          $("#star").starRating('setRating',rating) ;
        }
      }
    });
  };

//** ratingPerformance **//
function ajaxStarPerformance(val){
  var jam_id = $('#jamIdLab').html();
  var rating = val;
  var partecipante = partecipanti[currentIndex];
  var partecipantId = partecipante.id;
  $.ajax({
    type:"POST",
    url:'phpOperation/Update/updatePerformanceRating.php',
    data:
    {
      jam_id : jam_id,
      partecipantId : partecipantId,
      rating : rating,
    },
    success: function(data)
    {
      if(data === "true"){
          $("#starPerformance").starRating('setRating',rating);
      }
    }
  });
};
//** ratingProfessionalita **//

function ajaxStarProfessionalita(val){
  var jam_id = $('#jamIdLab').html();
  var rating = val;
  var partecipante = partecipanti[currentIndex];
  var partecipantId = partecipante.id;
  $.ajax({
    type:"POST",
    url:'phpOperation/Update/updateProfessionalismRating.php',
    data:
    {
      jam_id : jam_id,
      partecipantId : partecipantId,
      rating : rating,
    },
    success: function(data)
    {
      if(data === "true"){
          $("#starProfessionalita").starRating('setRating',rating);
      }
    }
  });
};
//** ratingImpressioni
function ajaxStarImpressioni(val){
  var jam_id = $('#jamIdLab').html();
  var rating = val;
  var partecipante = partecipanti[currentIndex];
  var partecipantId = partecipante.id;
  $.ajax({
    type:"POST",
    url:'phpOperation/Update/updateFeelingRating.php',
    data:
    {
      jam_id : jam_id,
      partecipantId : partecipantId,
      rating : rating,
    },
    success: function(data)
    {
      if(data === "true"){
        $("#starFeeling").starRating('setRating',rating);
      }
    }
  });
};
  // gestione della parte relativa alle informazioni dei partecipanti
  var partecipanti = [];
  var currentIndex = 0;
  var maxLenght;
  function setValoriPartecipante(x)
  {

    var jam_id = $('#jamIdLab').html();
    var partecipante = partecipanti[x];
    var partecipantId = partecipante.id;
    var immg = partecipante.photo;
    var name = partecipante.name;
    var surname = partecipante.surname;
    var email = partecipante.email;
    var titoloSet = partecipante.title;
    var titoloEd = partecipante.edTitle;
    var tipo = partecipante.type;
    var brand = partecipante.brand;
    var modello = partecipante.model
    $("#immPartecipante").attr("src" , immg);
    $("#nPart").html(name);
    $("#cPart").html(surname);
    $('#partInfo').html(email);
    $('#titoloSet').html(titoloSet);
    $('#instrumentType').html( tipo);
    $('#instrumentModel').html( modello );
    $('#instrumentBrand').html( brand);
    $('#eduExp').html(titoloEd);

    $.ajax({
      type:"POST",
      url:'phpOperation/Select/userRatingSelect.php',
      data:
      {
        jam_id :jam_id,
        partecipantId : partecipantId
      },
      success: function(data)
      {
        var row = (JSON.parse(data))[0];
        if(row != undefined){
          var impressioni =  row.impression != null ? row.impression : 0;
          var prestazioni = row.performance != null ? row.performance : 0;
          var professionalità = row.professionality != null ? row.professionality : 0;
          var note = "Inserisci le tue note";
          if(row.note != null){
            var note = row.note;
          }
          $("#noteUserJam").val(note);
          // set delle stelline
          //** impression **//
          starPerfomance(prestazioni);
          starProfessionalita(professionalità);
          starImpressioni(impressioni);
        }else{
          var note = "Inserisci le tue note";
          $("#noteUserJam").val(note);
          starPerfomance(0);
          starProfessionalita(0);
          starImpressioni(0);
        }
      }
    });

  };
  $('#jamSessionTable tbody').on('click' , 'button.btnEnter' , function(){
    var table = $('#jamSessionTable').DataTable();
    // setto il colore prima tutto in bianco
    table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
        $(this.node()).css("background-color", "white");;
    } );
    // successivamente lo evidenzio
    var  parent_row = $(this).closest('tr');
    parent_row.css("background-color", "Khaki");
    //** gestione del pulsante enter **//
    var obj = table.row( $(this).parents('tr') ).data();
    var jam_id = obj.jamSessionId;
    $("#jamIdLab").html(jam_id);

    //Chiamata ajax per le note jam session_start
    $.ajax({
      type:"POST",
      url:'phpOperation/Select/walletJamSessionSelect.php',
      data:
      {
        jam_id :jam_id
      },
      success: function(data)
      {

        var row = (JSON.parse(data))[0];
        if(row != undefined){
          var note = "Inserisci le tue note";
          if(row.note != null){
            var note = row.note;
          }
          var rating = row.rating
          $("#noteJam").val(note);
          //Procedura per  poter aggiornare le stelline
          starNote(rating);

        }else{
          $("#noteJam").val("Inserisci le tue note");
          starNote(0);
        };
      }
    });



    //chiamata ajax per riempire l'array di partecipanti
    $.ajax({
      type:"POST",
      url:'phpOperation/Select/partecipateJamSelect.php',
      data:
      {
        jam_id :jam_id
      },
      success: function(data)
      {

        partecipanti = (JSON.parse(data));
        currentIndex = 0;
        maxLenght = partecipanti.length;
        if(maxLenght === 0){
          $('#enterJamDiv').addClass('hide-step');
          alert("Nessun partecipante ");
        }else{
          $('#prevPartecipante').prop('disabled' , true);
          $('#prevPartecipante').removeClass('btn-success');
          $('#prevPartecipante').addClass('btn-danger');
          setValoriPartecipante(currentIndex);
          $('#enterJamDiv').removeClass('hide-step');
          if((currentIndex ===  0 ) & maxLenght === 1)
          {
            $('#nextPartecipante').prop('disabled' ,true);
            $('#nextPartecipante').removeClass('btn-success');
            $('#nextPartecipante').addClass('btn-danger');
          }


        };

      }
    });

  });



    //gestione bottoni nextPartecipate e prevPartecipate
    $('#nextPartecipante').click(function(){
      currentIndex = currentIndex + 1 ;

      setValoriPartecipante(currentIndex);
      $('#prevPartecipante').prop('disabled' ,false);
      $('#prevPartecipante').removeClass('btn-danger');
      $('#prevPartecipante').addClass('btn-success');
      if(currentIndex ===  (maxLenght - 1))
      {
        $('#nextPartecipante').prop('disabled' ,true);
        $('#nextPartecipante').removeClass('btn-success');
        $('#nextPartecipante').addClass('btn-danger');
      }

    });
    $('#prevPartecipante').click(function(){
      currentIndex = currentIndex - 1;
      setValoriPartecipante(currentIndex);

      if(currentIndex === 0)
      {
        $('#prevPartecipante').prop('disabled' , true);
        $('#prevPartecipante').removeClass('btn-success');
        $('#prevPartecipante').addClass('btn-danger');
      }
      if(currentIndex == (maxLenght - 2) )
      {
        $('#nextPartecipante').prop('disabled' , false);
        $('#nextPartecipante').removeClass('btn-danger');
        $('#nextPartecipante').addClass('btn-success');
      }

    });
    //gestione note jam
    $('#noteJamInput').click(function(){
      var note = $('#noteJam').val();
      var jam_id = $('#jamIdLab').html();
      $.ajax({
        type:"POST",
        url:'phpOperation/Update/updateNoteJam.php',
        data:
        {
          jam_id :jam_id,
          note : note

        },
        success: function(data)
        {

        }
      });
    });
    //gestione note user
    $('#noteUserInput').click(function(){
      var note = $('#noteUserJam').val();
      var jam_id = $('#jamIdLab').html();
      var partecipante = partecipanti[currentIndex];
      var partecipantId = partecipante.id;
      $.ajax({
        type:"POST",
        url:'phpOperation/Update/updateNoteUser.php',
        data:
        {
          jam_id :jam_id,
          note : note,
          partecipantId : partecipantId

        },
        success: function(data)
        {

        }
      });
    });

});
