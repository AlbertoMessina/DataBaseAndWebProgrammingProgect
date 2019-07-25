

$(document).ready(function(){

   $('.form-control').prop("disabled", true);

   $('#input-button').click(function(){
      //   var label_text = $('#butLabel').text(); //Get the text
      //('#butLabel').text( label_text.replace(" Modifica", "Aggiorna") ); //Replace and set the text back

      // abilito l'input nei form
      $('.form-control').prop("disabled", false);
      $(this).html("Aggiorna");

      setInterval(function(){
         $('#input-button').prop("type" , "submit");
         $('#form-id').prop("action" , "phpOperation/update_profile.php");
      } ,
      1000
   );
});


$('#birth').change( function() {
   checkAge();


});
$("#imm-profile").change(function(){
   checkImage();

});

$("#email").change(function(){
   $.ajax({
     type:"POST",
     url:'phpOperation/checkEmail.php',
     data:
     {
       email : $('#email').val()
     },
     success: function(data)
     {
       if(data === "true")
       {
         // se è true allora l'email esiste
         $('#emailError').html("E-mail già in uso");
         $("#input-button").prop('disabled' , true);
       }
       else
       {
           $('#emailError').html("");
           $("#input-button").prop('disabled' , false);
       }
     }
   });
});
});
