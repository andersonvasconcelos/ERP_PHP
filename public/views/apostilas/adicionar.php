 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">
 		
    <form method="POST" id="addApostila" enctype="multipart/form-data">
      
      <div class="col-md-7">
 		     <div class="form-group">
            <label for="recipient-name" class="control-label">Curso:</label>
            <select class="form-control required" name="curso_id" id="curso_id">  
              <option>Selecione</option>
              <?php foreach ($aulas as $a) {?>
              <option value="<?=$a['curso_id']?>"><?=$a['nome_curso']?></option>
            <?php } ?>
            </select>
          </div> 
      </div>

      <div class="col-md-7">
        <div class="form-group">
         <label for="recipient-name" class="control-label">Módulo:</label>
         <select class="form-control" name="id_modulo" id="id_modulo" required>
           <option>Escolha um módulo</option>
         </select>
        </div> 
      </div>

      <div class="col-md-7">
        <div class="form-group">
          <label for="recipient-name" class="control-label">Aula:</label>
          <select required aria-required="true" class="form-control" name="id_aula" id="id_aula">
            <option>Escolha uma aula</option>
          </select>
          
        </div>
      </div>

      <div class="col-md-7">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Enviar Apostila:</label>
         <input type="file" class="form-control" name="apostila">
        </div>
      </div>


      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success" id="btnV"> Cadastrar Apostila</button>
        </div>
      </div>
 </form>
 </div>
</div>
</div>