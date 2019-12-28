<!-- Modal DELETAR CURSO-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Atenção</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="delCurso">
      <input type="hidden" name="id_curso" class="form-control" id="recipient-name">
      Deseja realmente remover este curso?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Remover</button></form>
      </div>
    </div>
  </div>
</div>

<!-- Modal ADICIONAR CURSO-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addModalLabel">Adicionar Curso</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="addCurso">

        <div class="form-group col-md-7">
          <br>
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_curso">
        </div>
        <div class="form-group col-md-7">
          <label>Descrição</label>
          <textarea class="form-control" name="descricao"></textarea>
        </div>
        <div class="form-group col-md-7">
          <label>Carga Horária</label>
          <input type="text" class="form-control" name="carga_horaria">
        </div>
        <div class="form-group col-md-7">
          <label>Tempo de Acesso</label>
          <input type="text" class="form-control" name="tempo_de_acesso">
        </div>
        <div class="form-group col-md-7">
          <label>Valor</label>
          <input type="text" class="form-control" name="valor">
        </div>
        <div class="form-group col-md-7">
          <label>Comissão</label>
          <input type="text" class="form-control" name="comissao">
        </div>
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