<div class="modal fade" id="showJamModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center bg-dark">
        <h4 class="modal-title w-100 font-weight-bold text-white ">Informazioni JamSession</h4>
        <button type="button" class="btn btn-outline-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class=" row d-flex justify-content-start border-top border-bottom border-black mt-2 ">
          <label class= " font-weight-bold  mt-2">Info Generali</label>
        </div>
        <div class="row shadow   bg-white mt-4 mb-2  ml-2 ">
          <div class="col-6 ">
            <label class="font-weight-bold mr-2">Genere : </label>
            <label id= "genere"> </label>
          </div>
          <div class="col-6" >
            <div class = "d-flex justify-content-end">
              <label class ="font-weight-bold mr-2">Data evento:  </label>
              <label id="data">Non perventua </label>
            </div>
          </div>
        </diV>

        <div class=" row d-flex justify-content-start border-top border-bottom border-black mt-4 ">
          <label class= " font-weight-bold  mt-2">Info Posizione</label>
        </div>
        <div class="row shadow   bg-white mt-4 mb-2  ml-2 ">
          <div class ="col-6 ">
            <div class = "row m-2 " >
              <label class = " font-weight-bold mr-2">Citta:  </label>
              <label class ="text-capitalize" id="luogo"></label>
            </div>
            <div class = "row m-2 " >
              <label class ="font-weight-bold mr-2 ">Indirizzo:  </label>
              <label class ="text-capitalize" id="indirizzo">Indirizzo</label>
            </div>

          </div>
        </div>

        <div class=" row d-flex justify-content-center border-top border-bottom border-black mt-4 ">
          <label class= " font-weight-bold  mt-2">Partecipanti</label>
        </div>
        <div class = "row-12">
        <table class="table table-striped w-100" id = "partecipateJamTable">
          <thead class="thead-dark w-100 ">
            <tr>
              <th>Nome</th>
              <th>Tipo</th>
              <th>Marca</th>
              <th>Modello</th>
            </tr>
          </thead>
          <tbody class = "bg-light">
            <tr>
            </tr>
          </tbody>
        </table>
      </div>
        <div class="row d-flex justify-content-center mt-1 ">
          <label class = "row mr-2 ">Numero di Partecipanti: </label>
          <label id ="numPartecipanti"> </label>
        </div>
      </div>
    </div>
  </div>
</div>
