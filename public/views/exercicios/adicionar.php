 <?php require 'modal.php'?>
 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">
 		
    <form method="POST" id="addEx">

<div class="col-md-12">
          <div class="btn-group" role="group" aria-label="...">
  <a data-toggle="modal" data-target="#importModal" type="button" class="btn btn-success">Importar Exercício</a>
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
              <option value="<?=$a['id_curso']?>"><?=$a['nome_curso']?></option>
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

      <div class="col-md-10">
        <h3 for="recipient-name" class="control-label"><strong>Informações do Exercício:</strong></h3> <hr>        
        <div class="form-group">
            <label for="recipient-name" class="control-label">Faça uma Pergunta:</label>
            <textarea id="summernote" name="pergunta"></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 1:</label>
         <textarea class="form-control" name="opcao1"></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 2:</label>
         <textarea class="form-control" name="opcao2"></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 3:</label>
         <textarea class="form-control" name="opcao3"></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 4:</label>
         <textarea class="form-control" name="opcao4"></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 5:</label>
         <textarea class="form-control" name="opcao5"></textarea>
        </div>
      </div>

      <div class="col-md-12">
        <h3 for="recipient-name" class="control-label"><strong>Escolha a resposta correta:</strong></h3> <hr> 
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta Correta:</label>
            <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao1" required />
                   <span class="label label-danger">Opção 1</span>
                
            </label>
             <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao2" required />
                  <span class="label label-primary">Opção 2</span>
                  
            </label>
             <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao3" required/>
                  <span class="label label-info">Opção 3</span>
                  
            </label>
              <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao4" required/>
                  <span class="label label-warning">Opção 4</span>
                  
            </label>
              <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao5" required/>
                  <span class="label label-success">Opção 5</span>
                  
            </label>
        </div>
      </div>


      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success" id="btnV"> Cadastrar Exercício</button>
        </div>
      </div>
 </form>
 </div>
</div>
</div>