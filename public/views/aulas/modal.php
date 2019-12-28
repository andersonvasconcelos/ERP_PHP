
<!-- Modal ADICIONAR AULA-->
<div class="modal fade" id="addaModal" tabindex="-1" role="dialog" aria-labelledby="addaModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addaModalLabel">Adicionar Aula</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=BASE_URL?>aulas/adicionar">
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_aula">
          <br>
          <label>Módulo / Curso</label>
          <select name="modulo_id" class="form-control">
            <option>Selecione</option>
            <?php foreach($modulo as $mod){?>
              <option value="<?=$mod['id_modulo']?>"><?=$mod['nome_modulo'].' / '.$mod['nome_curso']?></option>
            <?php } ?>
          </select>
          <br>
          <label>Ordem</label>
          <input type="text" class="form-control" name="ordem">
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

<!-- Modal DELETAR AULA-->
<div class="modal fade" id="delaModal" tabindex="-1" role="dialog" aria-labelledby="delaModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delaModalLabel">Atenção - Você tem Certeza disso? </h4>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo BASE_URL?>aulas/deletar/">
        <input type="hidden" name="id_aula" id="id_aula" class="form-control">
          Você esta preste a deletar uma aula!
      </div>
      <div class="modal-footer">
      <div class="form-group col-md-12">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">SIM! Deletar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>