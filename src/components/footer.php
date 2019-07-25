<!-- Footer -->
<footer class="page-footer font-white font-small bg-custom text-white w-100 m-0">
  <hr class="separator" style=" border:solid">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase" id="contact">Contact</h5>
        <p>Contatto telefonico: 0950000000</p> </br>

      </div>
      <!-- Grid column -->
      <div class="col-md-2 mx-auto">
        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase">Partnership</h5>
        <ul class="list-unstyled">

          <li><a class="cursor-pointer" href="http://www.unict.it">Università degli studi di catania</a> </li>
        </ul>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->
  <?php if(!isset($_SESSION["id"])){
    echo "
    <hr class='separator' style=' border:solid'>

    <ul class='list-unstyled list-inline text-center py-2'>
    <li class='list-inline-item'>
    <h5 class='mb-1'>Register for free</h5>
    </li>
    <li class='list-inline-item'>
    <a href='registrazione.php' class='btn btn-danger btn-rounded'>Sign up!</a>
    </li>
    </ul>";

  }
  ?>
  <hr class="separator my-1" style="border:solid">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <span><label>Alberto Messina O4600942 laurea trienale</label></span>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
