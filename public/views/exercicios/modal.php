
<!-- Modal DELETAR VIDEO -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="importModalLabel">Importar Exercicios</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=BASE_URL?>exercicios/importarExcel" enctype="multipart/form-data">
          <input type="file" name="arquivo">
        
      </div>
      <div class="modal-footer">
      <div class="form-group col-md-12">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Importar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

