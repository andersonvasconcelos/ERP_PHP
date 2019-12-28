
<!-- Modal ADICIONAR MODULO-->
<div class="modal fade" id="addmModal" tabindex="-1" role="dialog" aria-labelledby="addmModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addmModalLabel">Adicionar Módulo</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=BASE_URL?>modulos/adicionar">
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_modulo" required="">
          <br>
          <label>Curso</label>
          <select name="curso_id" class="form-control" required>
            <option value="">Selecione</option>
            <?php foreach($cursos as $curso){?>
              <option value="<?=$curso['id_curso']?>"><?=$curso['nome_curso']?></option>
            <?php } ?>
          </select>
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
<div class="modal fade" id="delModulo" tabindex="-1" role="dialog" aria-labelledby="delModuloLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delModuloLabel">Deletar Módulo</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="delMod">
          
        <input type="hidden" name="id_modulo" id="id_modulo">
          Deseja realmente remover este curso?
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