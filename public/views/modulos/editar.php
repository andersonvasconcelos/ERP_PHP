<h2><?=$pagina?></h2>
<hr>
<div class="row">
	<div class="col-md-6">
<form method="post" action="<?=BASE_URL?>modulos/editarModulo">
	<?php foreach($mod as $modulo){?>
		 <input type="hidden" name="id_modulo" value="<?=$modulo['id_modulo']?>">
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_modulo" value="<?=$modulo['nome_modulo']?>" required="">
          <br>
          <label>Curso</label>
          <select name="curso_id" class="form-control" required>
          <option value="<?=$modulo['id_curso']?>"><?=$modulo['nome_curso']?></option>
            
            <?php } 

            foreach($cursos as $curso){?>

           <option value="<?=$curso['id_curso']?>"><?=$curso['nome_curso']?></option> <?php } ?>
          </select>
          
          <br>
        <a href="javascript:window.history.go(-1)" class="btn btn-danger" data-dismiss="modal">Voltar</a>
        <button type="submit" class="btn btn-primary">Editar modulo</button>
      </form>
</div>
	</div>