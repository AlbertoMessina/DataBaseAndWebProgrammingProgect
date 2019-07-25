/* CONSTANTS */
var basePath = "localhost/Mio_progetto/";

/* VARIABLES */

/* FUNCTIONS */
function logout() {
   redirect("phpOperation/logout.php");
}

// Funzione generale per il redirect. Effettua il redirect al path specificato.
function redirect(path)
{
   window.location.href = path;
};

//Funzioni per il check degli imput
// Utili per la registrazione
function showPass() {
   var x = document.getElementById("passInput");
   x.type = (x.type === "password") ? "text" : "password";
}


function checkPass(){
   //Store the password field objects into variables ...
   var pass1 = document.getElementById('passInput');
   var pass2 = document.getElementById('password-confirm');
   //Store the Confimation Message Object ...
   var message = document.getElementById('passError');
   //Set the colors we will be using ...
   var goodColor = "#66cc66";
   var badColor = "#ff6666";
   //Compare the values in the password field
   //and the confirmation field
   if(pass1.value == pass2.value){
      //The passwords match.
      //Set the color to the good color and inform
      //the user that they have entered the correct password
      pass2.style.backgroundColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Passwords Match!"
   }else{
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Passwords Do Not Match!"
   }
}

function checkAge()
{

   var birth = document.getElementById("birth").value.split("-");

   var today_date = moment().format('L').split("/");
   var today_year = today_date[2];    //anno
   var today_month = today_date[1];   //mese
   var today_day = today_date[0];     //giorno
   var age = today_year - birth[0];

   if ( today_month < (birth[1] - 1))
   {
      age--;
   }
   if (((birth[1] - 1) == today_month) && (today_day < birth[2]))
   {
      age--;
   }
   if( age < 16)
   {
      $('#ageError').html("Devi avere almeno 16 anni");
      $("#input-button").prop('disabled' , true);
   }
   else
   {
      $('#ageError').html("");
      $("#input-button").prop('disabled' , false);
   }

}


function checkImage ()
{
   var image = $('#imm-profile').val();
   // splitto il nome de file
    var fileExt = image.split(".");
   //estraggo l'estensione (ultimo elemento dell'array $fileExt)
   var fileActualExt = (fileExt[fileExt.length - 1]).toLowerCase();

   var allowed = ["jpg" , "jpeg" , "png"];
   //controllo se l'estensione è giusta
   if($.inArray(fileActualExt , allowed) !== -1)
   {
      // la scelta va bene
      $('#imageTypeError').html("");
      $("#input-button").prop('disabled' , false);
   }
   else
   {

      $('#imageTypeError').html("L'immagine deve essere uno tra i seguenti formati : jpg , jpeg , png ");
      $("#input-button").prop('disabled' , true);

   }

   var image_Size =  document.getElementById("imm-profile").files[0].size;
   if(image_Size < 200000)
   {
            $('#imageSizeError').html("");
            $("#input-button").prop('disabled' , false);

   }else
   {

            $('#imageSizeError').html("Dimensione massima 2 Mb");
            $("#input-button").prop('disabled' , true);

   }
}
