<div class="modal fade" id="newConfigurationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center bg-dark">
        <h4 class="modal-title w-100 font-weight-bold text-white  h-3">Nuova Configurazione</h4>
        <button type="button" class="btn btn-outline-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST"  id = "insertConfiguration" role="form">
          <div class="col-12 p-0">
            <div class=" mb-5">
              <label class=" font-weight-bold" for="titlo_form ">Titolo Configurazione</label>
              <input type="text" id="titolo_form" name="titolo_form" class="form-control validate "  required>
            </div>
            <div class=" mb-5">
              <label class=" font-weight-bold" for="marca_form">Note</label>
              <input type="text" id="note_form" name="Note" class="form-control">
            </div>
          </div>
          <div class="col-12 p-0">
            <div class=" row d-flex justify-content-center border-top border-bottom border-black mt-4 ">
              <label class= " font-weight-bold  mt-2">Tabella esperienze</label>
            </div>
            <div class ="row p-2 m-0 w-100 rounded-down">
              <table class="table table-striped  w-100" id = "educationExperienceTable">
                <thead class="thead-dark w-100" >
                  <tr>
                    <th>education_experience_id</th>
                    <th>Titolo</th>
                    <th>Anno</th>
                    <th>Locazione</th>
                    <th ></th>
                  </tr>
                </thead>
                <tbody class = "bg-light">
                  <tr>

                  </tr>
                </tbody>
              </table>
            </div>
            <div class=" row d-flex justify-content-center border-top border-bottom border-black mt-4 ">
              <label class= " font-weight-bold  mt-2">Tabella strumenti</label>
            </div>
            <div class ="row p-2 m-0 w-100 rounded-down">
              <table class="table table-striped text  w-100   " id = "instrumentTable">
                <thead class="thead-dark " >
                  <tr>
                    <th>instrument_id</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modello</th>
                    <th > </th>
                  </tr>
                </thead>
                <tbody class = "bg-light">
                  <tr>
                  </tr>
                </tbody>
              </table>
            </div>

            <div id="errorMessageConfiguration" class="text-danger d-flex justify-content-center" >
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center  bg-dark">
          <button type="submit" class="btn btn-lg ">Salva</button>
        </div>
      </form>
    </div>
  </div>
</div>
