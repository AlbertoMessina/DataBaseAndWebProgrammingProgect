<div class="modal fade" id="instrumentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center bg-dark">
      <h4 class="modal-title w-100 font-weight-bold text-white ">Inserimento Strumento</h4>
      <button type="button" class="btn btn-outline-light" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <form action="" method="POST"  id = "insertInstrument" role="form">
        <div class=" mb-5">
          <label  for="tipo_form">Tipo</label>
          <input type="text" id="tipo_form" name="tipo" class="form-control validate "  required>
        </div>
        <div class=" mb-5">
          <label  for="marca_form">Marca</label>
          <input type="text" id="marca_form" name="marca" class="form-control validate"  required>
        </div>
        <div class=" mb-5">
          <label  for="modello_form">Modello</label>
          <input type="text" id="modello_form"  name ="modello" class="form-control validate"  required>
        </div>
        <div >
          <label  for="personalizzazioni_form">Personalizzazioni</label>
          <input type="text" id="personalizzazioni_form"  name ="personalizzazioni" class="form-control validate">
        </div>
        <div id="errorMessageInstrument" class="text-danger d-flex justify-content-center" >
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center  bg-dark">
        <button type="submit" class="btn btn-outline-light btn-lg ">Salva</button>
      </div>
    </form>
  </div>
</div>
</div>
