<h2><?=$pagina?></h2>
<hr>
  <div class="rradio">
    <div class="interna">
      <div class="row">
        <form method="POST" action="<?=BASE_URL?>servicos/editar">
        <input type="hidden" name="id_servico" value="<?=$servico->id_servico?>">   
         		<div class="form-group col-md-7">
                <label class="control-label">* Nome:</label> 
                <input type="text" class="form-control cxa" name="nome_servico" value="<?=$servico->nome_servico?>" required>
            </div> 
            <div class="form-group col-md-7">
                <label class="control-label">* Valor:</label> 
                <input type="text" class="form-control" name="valor_servico" value="<?=$servico->valor_servico?>" required>
            </div> 
            <div class="col-md-12">
              <hr>
              <div class="form-group">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
                <button type="submit" class="btn btn-success"> Atualizar Serviço</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  