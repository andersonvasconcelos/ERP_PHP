 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">
 		
    <form method="POST" id="addforum">

<div class="col-md-12">
          <div class="btn-group" role="group" aria-label="...">
  <a href="<?=BASE_URL?>exercicios/adicionar" type="button" class="btn btn-success">Importar Exercício</a>
          </div>
      </div>


      <div class="col-md-12">
          <h3 for="recipient-name" class="control-label"><strong>Informações do curso:</strong></h3>
        <hr>
      </div>
      
      <div class="col-md-7">
 		     <div class="form-group">
            <label for="recipient-name" class="control-label">Curso:</label>
            <select class="form-control required" name="curso_id" id="curso_id">  
              <option value="0">Escolha um curso</option>
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
        <h3 for="recipient-name" class="control-label"><strong>Informações do Forum:</strong></h3> <hr>        
        <div class="form-group">
            <label for="recipient-name" class="control-label">Título:</label>
         <textarea class="form-control" name="titulo"></textarea>
        </div>
      </div>

      <div class="col-md-7">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Tópico :</label>
         <textarea class="form-control" name="topico"></textarea>
        </div>
      </div>

      <div class="col-md-7">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Descrição :</label>
         <textarea class="form-control" name="descricao"></textarea>
        </div>
      </div>

      <div class="col-md-12">
        <h3 for="recipient-name" class="control-label"><strong>Escolha a situação:</strong></h3> <hr> 
        <div class="form-group">
            <label for="recipient-name" class="control-label">Ativo:</label>
            <label class="radio-inline">
                  <input type="radio" name="ativo" value="sim" required />
                   <span class="label label-success">Sim</span>
                
            </label>
             <label class="radio-inline">
                  <input type="radio" name="ativo" value="não" required />
                  <span class="label label-danger">Não</span>
                  
            </label>
        </div>
      </div>


      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success" id="btnV"> Cadastrar Forum</button>
        </div>
      </div>
 </form>
 </div>
</div>
</div>