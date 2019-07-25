<div class="modal fade" id="acceptInviteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

      <div class=" d-flex justify-content-end text-center bg-dark w-100">
          <h4 class="modal-title w-100 font-weight-bold text-white  h-3 mt-2"> Seleziona un set</h4>
        <button type="button"  class="btn btn-outline-light m-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
          <div>
              <div class=" row d-flex justify-content-start border-bottom  my-2 ">
                <label class= " font-weight-bold mb-2">Configurazione strumenti </label>
              </div>
            <div>
              <table class="table table-striped text w-100 instrumentConfigurationTable">
                <thead class="thead-dark " >
                  <tr>
                    <th>session_instrument_id</th>
                    <th>Titolo Configurazione</th>
                    <th>Esperienza educativa</th>
                    <th>Strumento</th>
                    <th>Marca</th>
                    <th>Modello</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody class = "bg-light">
                  <tr>
                  </tr>
                </tbody>
              </table>
            </div>
          <div class = "hide-step" id ="jamSessionDiv">
          </div>
              <div class="row d-flex justify-content-end border-top border-black mt-4">
                <button id="btnAccept" type="button" class="btn btn-success btn-sm m-2 ">
                  <span >Accetta Invito</span>
                </button>
              </div>
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center  bg-dark">
      </div>
    </div>
  </div>
</div>
