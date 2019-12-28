 <?php foreach ($curso as $item) {?>

 <h2><?=$pagina?> / <?=$item['nome_curso']?></h2>
  <hr>
  <div class="rradio">
    <div class="interna">
        <div class="row">

        <form method="post" action="<?=BASE_URL?>cursos/editarCurso">
        <input type="hidden"  name="id_curso" value="<?=$item['id_curso']?>">

          <div class="form-group col-md-6">
          <label>Segmento</label>
          <input type="text" class="form-control" name="segmento" value="<?=$item['segmento']?>">
        </div>

        <div class="form-group col-md-2">
          <label>Tempo</label>
          <input type="text" class="form-control" name="tempo_de_acesso" value="<?=$item['tempo_de_acesso']?>">
        </div>
        <div class="form-group col-md-2">
          <label>Valor</label>
          <input type="text" class="form-control dinheiro" name="valor" value="<?=$item['valor']?>">
        </div>
        
        <div class="form-group col-md-2">
          <label>Comissão</label>
          <input type="text" class="form-control" name="comissao" value="<?=$item['comissao']?>">
        </div>
        
        <div class="form-group col-md-12">
          <br>
          <label>Nome do curso</label>
          <input type="text" class="form-control cxa" name="nome_curso" value="<?=$item['nome_curso']?>">
        </div>

        <div class="form-group col-md-12">
          <label>Descrição</label>
          <textarea id="summernote" name="editordata"><?=$item['descricao']?></textarea>
        </div>

      <div class="form-group col-md-12">
        <hr>
        <a href="javascript:history.back(-1)"class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-success">Editar Curso</button>
      </div>
    <?php } ?>
      </form>
    </div>
</div>