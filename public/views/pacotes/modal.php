<!-- Modal DELETAR CURSO-->
<div class="modal fade" id="addpModal" tabindex="-1" role="dialog" aria-labelledby="addpModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addpModalLabel">Atenção</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=BASE_URL?>pacotes/inserir">
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_pacote" required="">
          <br>
          <label>Valor</label>
          <input type="text" class="form-control" name="valor_pacote" required="">
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Adicionar</button></form>
      </div>
    </div>
  </div>
</div>