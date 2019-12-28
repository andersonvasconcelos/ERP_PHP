 <h2><?=$pagina?></h2>
  <hr>
 <div class="rradio">
    <div class="interna">
 <div class="row">
 	<div class="col-md-6">
 		<form method="POST" id="editPolo">
      <?php foreach($polos as $item){?>
        <input type="hidden" name="id_polo" value="<?=$item['id_polo']?>">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" class="form-control cxa" name="nome_polo" value="<?=$item['nome_polo']?>" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Endereço:</label>
            <input type="text" class="form-control cxa" name="endereco_polo" value="<?=json_decode($item['endereco_polo'])?>" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Telefone:</label>
            <input type="text" class="form-control cxa" name="telefone_polo" value="<?=$item['telefone_polo']?>" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Cidade:</label>
            <input type="text" class="form-control cxa" name="cidade_polo" value="<?=$item['cidade_polo']?>" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Estado:</label>
            <input type="text" class="form-control cxa" name="estado_polo" value="<?=$item['estado_polo']?>" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">Apelido:</label>
            <input type="text" class="form-control cxa" name="apelido" value="<?=$item['apelido']?>" required>
          </div>
<hr>
<div class="form-group">
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
<button type="submit" class="btn btn-success" id="beditPolo">Editar Polo</button>
</div>

          
        </form>
         <?php } ?>
 </div>
</div>
</div>
</div>