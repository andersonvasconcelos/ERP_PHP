
<!-- Modal ADICIONAR GRUPO-->
<div class="modal fade" id="addmModal" tabindex="-1" role="dialog" aria-labelledby="addmModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addmModalLabel">Adicionar Grupo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=BASE_URL?>colaboradores/addGrupo">
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_grupo" required="">
          <br>
      </div>
      <div class="modal-footer">
      <div class="form-group col-md-12">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal ADICIONAR ITENS-->
<div class="modal fade" id="addiModal" tabindex="-1" role="dialog" aria-labelledby="addmModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addmModalLabel">Adicionar Itens</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=BASE_URL?>colaboradores/addItem">
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_item" required="">
          <br>
      </div>
      <div class="modal-footer">
      <div class="form-group col-md-12">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal DELETAR MODULO -->
<div class="modal fade" id="delcModal" tabindex="-1" role="dialog" aria-labelledby="delcModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delcModalLabel">Deletar Colaborador</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="delCol">
          
        <input type="hidden" name="id_col" id="id_col">
          Deseja realmente remover este Colaborador?
      </div>
      <div class="modal-footer">
      <div class="form-group col-md-12">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Deletar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>