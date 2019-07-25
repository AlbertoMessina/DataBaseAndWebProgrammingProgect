<div class="modal fade" id="newJamModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">

      <div class=" d-flex justify-content-end text-center bg-dark w-100">
          <h4 class="modal-title w-100 font-weight-bold text-white  h-3 mt-2"> Creazione Jam Session</h4>
        <button type="button"  id="newJamModalClose" class="btn btn-outline-light m-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="" method="POST"  id = "newJamForm" role="form">
          <div id="step-1">
              <div class=" row d-flex justify-content-start border-bottom  my-2 ">
                <label class= " font-weight-bold mb-2">Step 1 -> Info generali </label>
              </div>

              <div class="row d-flex justify-content-center ">
                <div class=" col-4 pt-1 ">
                  <label class="font-weight-bold mr-2"  for="genere">Genere  </label>
                </div>
                <div class=" col-8 p-0">
                  <input type="text" id ="genereForm" name="genere" class="form-control text-capitalize ">
                </div>
              </div>
              <div class="row d-flex justify-content-start  mt-2" >
                <div class=" col-4 pt-1 ">
                  <label class ="font-weight-bold mr-2" for="data">Data evento  </label>
                </div>
                <div class=" col-6 p-0">
                  <input type="date" id= "dataForm" name="data" class="form-control  text-capitalize "   >
                </div>
              </div>
              <div class=" row d-flex justify-content-start border-top border-bottom border-black mt-4 ">
                <label class= " font-weight-bold  mt-2">Info Posizione </label>
              </div>
              <div class="row d-flex justify-content-start align-item-center mt-2" >
                <div class = "col-4  " >
                  <label class = " font-weight-bold mt-1" for= "citta">Citta:</label>
                </div>
                <div class="col-8 p-0">
                  <input type="text" id= "cittaForm" name="citta" class="form-control  text-capitalize "   >
                </div>
              </div>
              <div class="row d-flex justify-content-start  mt-2" >
                <div class = "col-4 " >
                  <label class ="font-weight-bold mt-1 " for= "indirizzo">Indirizzo:  </label>
                </div>
                <div  class="col-8 p-0">
                  <input type="text" id= "indirizzoForm" name="indirizzo" class="form-control text-capitalize  "  required >
                </div>
              </div>
              <div class="row d-flex justify-content-end border-top border-black mt-4">
                <button id="nextButton1" type="button" class="btn  btn-success btn-sm my-2">
                  <span >next</span>
                </button>
              </div>
          </div>
          <div id="step-2"  class="hide-step">
              <div class=" row d-flex justify-content-start border-bottom  my-2 ">
                <label class= " font-weight-bold mb-2">Step 2 -> Seleziona partecipanti </label>
              </div>
            <div>
              <table class="table table-striped w-100" id = "userTable">
                <thead class="thead-dark w-100 ">
                  <tr>
                    <th>userId</th>
                    <th>Nome</th>
                    <th>email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class = "bg-light">
                  <tr>
                  </tr>
                </tbody>
              </table>
            </div>
              <div  class="row d-flex justify-content-end border-top border-black mt-4">
                <button id="previousButton2" type="button" class="btn btn-sm m-2">
                  <span >Precendente</span>
                </button>
                <button id="nextButton2" type="button" class="btn btn-success btn-sm m-2">
                  <span >Next</span>
                </button>
              </div>
          </div>
          <div id="step-3" class="hide-step">
              <div class=" row d-flex justify-content-start border-bottom  my-2 ">
                <label class= " font-weight-bold mb-2">Step 3 -> Seleziona una configurazione con cui partecipare </label>
              </div>
            <div>
              <table class="table table-striped text w-100" id = "instrumentConfigurationTable">
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

              <div class="row d-flex justify-content-end border-top border-black mt-4">
                <button id="previousButton3" type="button" class="btn btn-danger btn-sm m-2 ">
                  <span >Precedente</span>
                </button>
                <button id="submitStep" type="button" class="btn btn-success btn-sm m-2 ">
                  <span >Crea</span>
                </button>
              </div>

          </div>
        </form>
      </div>

      <div class="modal-footer d-flex justify-content-center  bg-dark">
      </div>

    </div>
  </div>
</div>
