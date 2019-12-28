 <h2><?=$pagina?></h2>
  <hr>
  <div class="rradio">
    <div class="interna">
        <div class="row">

         
 		       <form method="POST" action="<?=BASE_URL?>iugu/save">
        <div class="col-md-8">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome da subconta:</label>
            <input type="text" class="form-control cxa" name="name" required>
          </div>
        </div>

       <div class="col-md-4">
          <div class="form-group">
          <label class="control-label" for="radios">Polo</label>
          <select class="form-control" name="polo_id">
            <option>Selecione</option>
            <?php foreach($polos as $item){?>
              <option value="<?=$item['id_polo']?>"><?=$item['apelido']?></option>
            <?php } ?>
          </select>
          </div>
      </div>



  <div class="col-md-12">
    <br><hr>
    <div class="form-group">
      <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
  </div>
</form>
 </div>
</div>
</div>
