 <h2><?=$pagina?></h2>
  <hr>
   <div class="rradio">
    <div class="interna">
 <div class="row">
 	<div class="col-md-12">
 		<form method="POST" action="<?=BASE_URL?>colaboradores/editarCol">
      <?php foreach($col as $item){?>
        <input type="hidden" name="id_col" value="<?=$item['id_colaborador']?>">
          <div class="form-group col-md-12">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" class="form-control cxa" name="nome_colaborador" value="<?=$item['nome_colaborador']?>" required>
          </div>

          <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">CPF:</label>
            <input type="text" class="form-control" name="cpf_colaborador" id="cpf" value="<?=$item['cpf_colaborador']?>" required>
          </div>

          <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">Telefone:</label>
            <input type="text" class="form-control" name="telefone_colaborador" value="<?=$item['telefone_colaborador']?>" required>
          </div>

          <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" class="form-control" name="email_colaborador" value="<?=$item['email_colaborador']?>" required>
          </div>

      <div class="form-group col-md-4">
      <label class="control-label" for="radios">Permissão</label>
      <select class="form-control" name="permissoes">
        <option value="<?=$item['id_grupo']?>" ><?=$item['nome_grupo']?></option>
        <?php foreach ($grupos as $grupo): ?>
          <option value="<?=$grupo['id_grupo']?>"><?=$grupo['nome_grupo']?></option>
          <?php endforeach ?>
          
      </select>
      </div>

      <div class="form-group col-md-4">
        <h4 for="recipient-name" class="control-label">Situação</h4>

        <label class="radio-inline">
          <input type="radio" name="ativo" value="1"
            <?php echo ($item['ativo'] == 1) ? "checked" : null; ?>/>
            <span class="label label-success">ATIVO</span>
        </label>

        <label class="radio-inline">
          <input type="radio" name="ativo" value="0"
          <?php echo ($item['ativo'] == 0) ? "checked" : null; ?>/>
          <span class="label label-danger">BLOQUEADO</span>
        </label>
        <br>
      </div>

      <?php if ($item['ativo'] == 0){?>

         <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">Senha:</label>
            <input type="text" class="form-control" name="senha">
          </div>

         <?php }?>

<div class="form-group col-md-12">
  <hr>
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
<button type="submit" class="btn btn-success">Salvar</button>
</div>

          
        </form>
         <?php } ?>
 </div>
</div>
</div>
</div>