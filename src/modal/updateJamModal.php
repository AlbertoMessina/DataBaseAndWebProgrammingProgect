<div class="modal fade" id="updateJamModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center bg-dark">
        <h4 class="modal-title w-100 font-weight-bold text-white ">Modifica JamSession</h4>
        <button type="button" class="btn btn-outline-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST"  id = "alterJam" role="form">
        <div class=" row d-flex justify-content-start border-bottom  my-2 ">
          <label class= " font-weight-bold mb-2">Info generali </label>
        </div>

          <div class="row d-flex justify-content-center ">
            <div class=" col-4 pt-1 ">
              <label class="font-weight-bold mr-2"  for="genere_form">Genere  </label>
            </div>
            <div class=" col-8 p-0">
              <input type="text" id= "genere_form" name="marca" class="form-control text-capitalize validate"  required > </input>
            </div>
          </div>
          <div class="row d-flex justify-content-start  mt-2" >
            <div class=" col-4 pt-1 ">
              <label class ="font-weight-bold mr-2" for="data_form">Data evento  </label>
            </div>
            <div class=" col-6 p-0">
              <input type="date" id= "data_form" name="date" class="form-control  text-capitalize validate"  required > </input>
            </div>
          </div>
          <div class=" row d-flex justify-content-start border-top border-bottom border-black mt-4 ">
            <label class= " font-weight-bold  mt-2">Info Posizione </label>
          </div>
          <div class="row d-flex justify-content-start align-item-center mt-2" >
            <div class = "col-4  " >
              <label class = " font-weight-bold mt-1" for= " citta_form">Citta:  </label>
            </div>
            <div class="col-8 p-0">
              <input type="text" id= "citta_form" name="citta" class="form-control  text-capitalize validate"  required > </input>
            </div>
          </div>
          <div class="row d-flex justify-content-start  mt-2" >
            <div class = "col-4 " >
              <label class ="font-weight-bold mt-1 " for= "indirizzo_form">Indirizzo:  </label>
            </div>
            <div  class="col-8 p-0">
              <input type="text" id= "indirizzo_form" name="indirzzo" class="form-control text-capitalize  validate"  required > </input>
            </div>
            <div>
              <input type ="hidden" id="jamId_form"> </input>  
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center  bg-dark">
          <button type="submit" class="btn btn-outline-light btn-lg ">Salva</button>
        </div>
      </form>
    </div>
  </div>
</div>
