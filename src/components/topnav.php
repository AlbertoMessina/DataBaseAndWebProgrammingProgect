<div class="row m-0 w-100">
   <div class="col-12 p-0">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
         <a class="navbar-brand text-white">Home</a>

         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav d-flex w-100  justify-content-end">
            <?php
            if(isset($_SESSION['id']))
            {
              echo"
                    <li>
                    <button type='button' id='logout-button' class='btn btn-sm btn-secondary d-flex cursor-pointer' onclick='logout()''>Logout</button>
                    </li>";

            }
            ?>

               </ul>
                  </div>


            </nav>
         </div>

   </div>
</div>  <!--Fine Nav-->
