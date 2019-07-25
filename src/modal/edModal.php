<div class="modal fade" id="edModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center bg-dark">
      <h4 class="modal-title w-100 font-weight-bold text-white ">Inserimento titolo di studio</h4>
      <button type="button" class="btn btn-outline-light" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <form action="" method="POST"  id = "insertEducationExperience" role="form">
        <div class=" mb-5">
          <label for="titolo_form">Titolo di studio</label>
          <input type="text" id="titolo_form" name="titolo" class="form-control validate "  required>
        </div>
        <div class=" mb-5">
          <label for="data_form">Data conseguimento del titolo</label>
          <input type="date" id="data_form" name="data" class="form-control validate"  required>
        </div>
        <div >
          <label  for="locazione_form">Locazione</label>
          <input type="text" id="locazione_form"  name ="locazione" class="form-control validate"  required>

        </div>
        <div id="errorMessageEducation" class="text-danger d-flex justify-content-center" >
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center  bg-dark">
        <button type="submit" class="btn btn-outline-light btn-lg ">Salva</button>
      </div>
    </form>
  </div>
</div>
</div>
