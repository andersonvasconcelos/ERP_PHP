<h2><?=$pagina?></h2>
<hr>
<div class="row">
	<div class="col-md-6">
<form method="post" action="<?=BASE_URL?>aulas/editarAula">
  <?php foreach ($lista as $aula) {?>
    <input type="text" class="form-control cxa" name="id_aula" value="<?=$aula['id_aula']?>">
	 <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_aula" value="<?=$aula['nome_aula']?>">
          <br>
          <label>Módulo</label>
          <select name="modulo_id" class="form-control">
          <option value="<?=$aula['id_modulo']?>"><?=$aula['nome_modulo']?></option>
            <?php foreach($modulo as $mod){?>
               <option value="<?=$mod['id_modulo']?>"><?=$mod['nome_modulo'].' / '.$mod['nome_curso']?></option>
            <?php } ?>
          </select>
          <br>
          <label>Ordem</label>
          <input type="text" class="form-control" name="ordem" value="<?=$aula['ordem']?>">
        <?php } ?>
          <br>
          <br>
        <a href="javascript:window.history.go(-1)" class="btn btn-danger" data-dismiss="modal">Voltar</a>
        <button type="submit" class="btn btn-primary">Editar aula</button>
      </form>
</div>
	</div>