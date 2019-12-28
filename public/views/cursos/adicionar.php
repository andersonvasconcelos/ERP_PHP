 <h2><?=$pagina?></h2>
  <hr>
  <div class="rradio">
    <div class="interna">
        <div class="row">

         
 		       <form method="POST" id="addCurso">

        <div class="form-group col-md-4">
          <label>Polo</label>
          <select class="form-control" name="segmento">
            <option>Escolha um polo</option>
            <?php foreach($polos as $item){?>
            <option value="<?=$item['apelido']?>"><?=$item['apelido']?></option>
          <?php } ?>
          </select>
          
        </div>

         <div class="form-group col-md-4">
          <label>Tempo</label>
          <input type="text" class="form-control" name="tempo_de_acesso">
        </div>
        <div class="form-group col-md-4">
          <label>Valor</label>
          <input type="text" class="form-control dinheiro" placeholder="R$ 00,00" name="valor">
        </div>
        <div class="form-group col-md-3">
          <label>% Matriz</label>
          <input type="text" class="form-control" placeholder="%" name="comissao">
        </div>
        <div class="form-group col-md-3">
          <label>% Polo</label>
          <input type="text" class="form-control" placeholder="%" name="comissao">
        </div>
          <div class="form-group col-md-3">
          <label>% Terceirizado 1</label>
          <input type="text" class="form-control" placeholder="%" name="comissao">
        </div>

         <div class="form-group col-md-3">
          <label>% Terceirizado 2</label>
          <input type="text" class="form-control" placeholder="%" name="comissao">
        </div>

        <div class="form-group col-md-12">
          <label>Nome</label>
          <input type="text" class="form-control cxa" name="nome_curso">
        </div>

        <div class="form-group col-md-12">
          <label>Descrição</label>
           <textarea id="summernote" name="editordata"></textarea>
        </div>


  <div class="col-md-12">
    <hr>
    <div class="form-group">
      <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
      <button type="submit" class="btn btn-success">Cadastrar Curso</button>
    </div>
  </div>
</form>
 </div>
</div>
</div>
