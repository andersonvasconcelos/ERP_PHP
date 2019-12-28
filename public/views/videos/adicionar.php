 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">
 		
    <form method="POST" id="addVideo">
      
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
            <label for="recipient-name" class="control-label">Tipo:</label>
            <label class="radio-inline">
                  <input type="radio" name="tipo" value="Youtube" required />
                   <span class="label label-danger">Youtube</span>
                
            </label>
             <label class="radio-inline">
                  <input type="radio" name="tipo" value="Vimeo" required />
                  <span class="label label-primary">Vimeo</span>
                  
            </label>
             <label class="radio-inline">
                  <input type="radio" name="tipo" value="Mp4" required/>
                  <span class="label label-info">Mp4</span>
                  
            </label>
        </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Link:</label>
            <input type="text" class="form-control" name="link" id="link" required>
          </div>
      </div>

      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success" id="btnV"> Cadastrar Vídeo</button>
        </div>
      </div>
 </form>
 </div>
</div>
</div>