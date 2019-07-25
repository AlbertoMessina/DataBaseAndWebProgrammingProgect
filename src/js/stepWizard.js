$(document).ready(function(){
  // Gestione step wizard
  function resetModal(){
    $("#step-1").addClass('hide-step');
    $("#step-2").addClass('hide-step');
    $("#step-3").addClass('hide-step');
    $("#step-1").removeClass('hide-step');
    $('form :input').val('');
    var table = $("#userTable").DataTable();
    table.ajax.reload();

    var table1 = $("#instrumentConfigurationTable").DataTable();
    table1.ajax.reload();
  };
  // Gestione della validità dei campi e next
  $('#nextButton1').click(function () {
    // operazioni per vedere se  sono inseriti tutti i campi  inserito
    var genere = $("#genereForm").val();
    var indirizzo = $("#indirizzoForm").val();
    var citta = $("#cittaForm").val();
    var data = $("#dataForm").val();
    if( genere == null || genere == "" || !indirizzo || indirizzo == "" || !citta || citta == "" || !data || data == "" )
    {
      alert("Compila tutti i campi");
    }
    else
    {
      $("#step-1").addClass('hide-step');
      $("#step-2").removeClass('hide-step');};
      // refactoring della tabella
      setTimeout(function() {
        var table = $("#userTable").DataTable();
        table.columns.adjust();
      }, 100);
    });
    $('#nextButton2').click(function () {
      // controllo  per vedere se è inserito almeno un partecipante

      var count = 0;
      var checkUserArray = $('.checkUser');
      var checkUserLenght = checkUserArray.length;
      for(i = 0 ; i< checkUserLenght ; i++)
      {
        if(checkUserArray[i].checked )
        {
          count++;
        };
      };

      if(count == 0 )
      {
        alert("Devi invitare qualcuno sfigheto");

      }else
      {
        $("#step-2").addClass('hide-step');
        $("#step-3").removeClass('hide-step');
        setTimeout(function() {
          var table = $("#instrumentConfigurationTable").DataTable();
          table.columns.adjust();
        }, 80);
      };

    });

    // gestione del bottone di salvataggio
    $('#submitStep').click(function () {
      var set =  $('input[name="radioIns"]:checked').val();
      if( set == undefined)
      {
        alert("Scegliere un set");
      }
      else{

        // creo la chiamata ajax per il salvataggio della jam
        //step1
        var genere = $('#genereForm').val();
        var data = $('#dataForm').val();
        var citta = $('#cittaForm').val();
        var indirizzo = $('#indirizzoForm').val();
        //step 2
        var invito = [];
        var checkUserArray = $('.checkUser');
        var checkUserLenght = checkUserArray.length;
        for(i = 0 ; i< checkUserLenght ; i++)
        {
          if(checkUserArray[i].checked )
          {
            var value = checkUserArray[i].value;
            invito.push(value);
          };
        };
        // creo  la chiama ajax
        $.ajax({
          type:"POST",
          url:'phpOperation/Insert/insertJamSession.php',
          data:
          {
            'citta': citta,
            'indirizzo': indirizzo,
            'genere':  genere,
            'data':  data,
            'invito' : invito,
            'set' : set,
          },
          success: function(answer)
          {
            if (answer === "true")
            {
              //se il data è vero l'inserimento è andato a buon fine

              $('#newJamModal').modal('toggle');
              var table = $('#jamSessionTable').DataTable();
              table.ajax.reload();

            }
            else
            {
            alert("si è verificato un errore");
            }
          }  // fine success insert
        }); // fine ajax insert

      }


    });

    //  Gestione dei bottoni per tornare indietro
    $('#previousButton2').click(function () {
      $("#step-2").addClass('hide-step');
      $("#step-1").removeClass('hide-step');
    });
    $('#previousButton3').click(function () {
      $("#step-3").addClass('hide-step');
      $("#step-2").removeClass('hide-step');
    });
    //reset della modale alla chiusara
    $('#newJamModalClose').click(function()
    {
      resetModal();
    });
    //reset della modale alla chiusura
    $('#newJamModal').on('hidden.bs.modal', function (e) {
      resetModal();
    });
  });
