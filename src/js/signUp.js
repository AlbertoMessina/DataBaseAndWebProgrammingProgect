$(document).ready(function(){
   $('#check-Pass').on('click', function() {
      showPass();
   });
   $('#password-confirm').keyup( function() {
      checkPass();
   });
   $('#birth').change( function() {
      checkAge();
   });
   $("#imm-profile").change(function(){
      checkImage();
   });

 //chiamata ajax per vedere se è presente o meno nel db l'email
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
