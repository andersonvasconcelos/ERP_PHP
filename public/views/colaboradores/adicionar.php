 <h2><?=$pagina?></h2>
  <hr>
  <div class="rradio">
    <div class="interna">
        <div class="row">

         
 		       <form method="POST" id="addCol" enctype="multipart/form-data">
        <div class="col-md-12">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" class="form-control cxa" name="nome_colaborador" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <label for="recipient-name" class="control-label">Email:</label>
              <input type="text" class="form-control" name="email_colaborador" required>
            </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="recipient-name" class="control-label">CPF:</label>
            <input type="text" class="form-control cxa" name="cpf" id="cpf" placeholder="000.000.000-00" required>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Telefone:</label>
            <input type="text" class="form-control cel" name="telefone_colaborador" placeholder="00 00000-0000" required>
          </div>
        </div>
          
        <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Senha:</label>
            <input type="text" class="form-control" name="senha" required>
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
  <div class="col-md-4">
      <div class="form-group">
      <label class="control-label" for="radios">Permissão</label>
      <select class="form-control" name="permissoes">
        <option>Escolha uma permissão</option>
        <?php foreach ($grupos as $grupo): ?>
          <option value="<?=$grupo['id_grupo']?>"><?=$grupo['nome_grupo']?></option>
          <?php endforeach ?>
          
      </select>
      </div>
  </div>
  <div class="col-md-12">
        <br><hr>
      <div class="form-group">
        <label class="control-label" for="radios">Upload imagem do colaborador</label>
        <input type="file" class="form-control" name="imagem_colaborador">
      </div>
  </div>

  <div class="col-md-12">
    <br><hr>
    <div class="form-group">
      <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
      <button type="submit" class="btn btn-success">Cadastrar Colaborador</button>
    </div>
  </div>
</form>
 </div>
</div>
</div>
