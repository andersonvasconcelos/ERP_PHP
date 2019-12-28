
<!-- Modal -->
<div class="modal fade" id="docsModal" tabindex="-1" role="dialog" aria-labelledby="docsModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="docsModalLabel">Documentos Pessoais</h4>
      </div>
      <form id="addDocs"  enctype="multipart/form-data">
      <input type="text" class="form-control" name="aluno" id="aluno" name="">
      <div class="modal-body sf">
        <div class="form-group">
            <label for="recipient-name" class="control-label">RG:</label>
            <input type="file" class="form-control" name="docs_rg">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">CPF:</label>
            <input type="file" class="form-control" name="docs_cpf" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Comprovante de Residência:</label>
            <input type="file" class="form-control" name="docs_residencia" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Historico Escolar:</label>
            <input type="file" class="form-control" name="docs_escolar">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar documentos</button></form>
      </div>
    </div>
  </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Um momento.</h4>
                </div>
                <div class="modal-body">
                    Estamos processando a requisição <img src="<?=BASE_URL?>assets/img/ajax-loader.gif">.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>