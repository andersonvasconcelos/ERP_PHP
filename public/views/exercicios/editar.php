 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">
 		
    <form method="POST" id="editEx">
      <?php foreach ($ex as $atv){?>

        <input type="hidden" name="id_e" value="<?=$atv['id_exercicio']?>">
      
      <div class="col-md-10">
        
        <h3 for="recipient-name" class="control-label"><strong>Informações do Exercício:</strong></h3>
        
        <hr>        
        
        <div class="form-group">
            <label for="recipient-name" class="control-label">Faça uma Pergunta:</label>
        <textarea id="summernote" name="pergunta"><?=$atv['pergunta']?></textarea>

        </div>

      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 1:</label>
         <textarea class="form-control" name="opcao1"><?=$atv['opcao1']?></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 2:</label>
         <textarea class="form-control" name="opcao2"><?=$atv['opcao2']?></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 3:</label>
         <textarea class="form-control" name="opcao3"><?=$atv['opcao3']?></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 4:</label>
         <textarea class="form-control" name="opcao4"><?=$atv['opcao4']?></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 5:</label>
         <textarea class="form-control" name="opcao5"><?=$atv['opcao5']?></textarea>
        </div>
      </div>

      <div class="col-md-12">

        <h3 for="recipient-name" class="control-label">
        <strong>Escolha a resposta correta:</strong></h3> 
        <hr> 

        <div class="form-group">

  <label for="recipient-name" class="control-label">Resposta Correta:</label>
    <label class="radio-inline">
       <input type="radio" name="resposta" value="opcao1"
       <?=($atv['resposta'] == 'opcao1') ? "checked" : null; ?> required />
        <span class="label label-danger">Opção 1</span>
    </label>

             <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao2" required 
      <?php echo ('opcao2' == $atv['resposta']) ? "checked" : null; ?>/>
                  <span class="label label-primary">Opção 2</span>
                  
            </label>
             <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao3" required 
      <?php echo ('opcao3' == $atv['resposta']) ? "checked" : null; ?>/>
                  <span class="label label-info">Opção 3</span>
                  
            </label>
              <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao4"
      <?php echo ('opcao4' == $atv['resposta']) ? "checked" : null; ?>/>
                  <span class="label label-warning">Opção 4</span>
                  
            </label>
              <label class="radio-inline">
                  <input type="radio" name="resposta" value="opcao5"
    <?php echo ('opcao5' == $atv['resposta']) ? "checked" : null; ?>/>
                  <span class="label label-success">Opção 5</span>
                  
            </label>
        </div>
      </div>

<?php } ?>
      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success" id="btnV"> Editar Exercício</button>
        </div>
      </div>
 </form>
 </div>
</div>
</div>