<div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header text-center bg-dark">
        <h5 class="modal-title w-100 font-weight-bold text-white ">Conferma operazione</h5>
        <button type="button" class="btn btn-outline-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <Label id="labelCheck">  </label>
          <div > <label>Genere:</label> <label id="checkGenere" class= "ml-2"></label> </div>
          <div> <label>Città:</label> <label   id="checkCitta" class= "ml-2"></label>  </div>
          <div ><label>Data:</label> <label id="checkData" class= "ml-2"></label>  </div>
          <label id= "buttonTipe" class = "hide-step"> </label>
          <label id= "jamId" class = "hide-step"> </label>

        </div>
        <div class="modal-footer d-flex justify-content-center  bg-dark">
          <button id="confirmButton" class="btn  btn-lg btn-danger ">conferma</button>
        </div>
      </form>
    </div>
  </div>
</div>
