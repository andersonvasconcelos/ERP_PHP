 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">
 		
    <form method="POST" id="editEx">
      <?php foreach ($forum as $fr){?>

        <input type="hidden" name="id_e" value="<?=$fr['id_forum']?>">
      
      <div class="col-md-10">
        
        <h3 for="recipient-name" class="control-label"><strong>Informações do Forum:</strong></h3>
        
        <hr>        
        
        <div class="form-group">
            <label for="recipient-name" class="control-label">Faça uma Pergunta:</label>
         <textarea class="form-control" name="pergunta"><?=$fr['titulo']?></textarea>
        </div>

      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Resposta 1:</label>
         <textarea class="form-control" name="opcao1"><?=$fr['topico']?></textarea>
        </div>
      </div>

      <div class="col-md-10">
        <br>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Descricao :</label>
         <textarea class="form-control" name="opcao2"><?=$fr['descricao']?></textarea>
        </div>
      </div>


      <div class="col-md-12">

        <h3 for="recipient-name" class="control-label">
        <strong>Escolha a resposta correta:</strong></h3> 
        <hr> 

        <div class="form-group">

  <label for="recipient-name" class="control-label">Ativo:</label>
    <label class="radio-inline">
       <input type="radio" name="ativo" value="SIM"
       <?=($fr['ativo'] == 'sim') ? "checked" : null; ?> required />
        <span class="label label-success">Sim</span>
    </label>

             <label class="radio-inline">
                  <input type="radio" name="ativo" value="Não" required 
      <?php echo ('não' == $fr['ativo']) ? "checked" : null; ?>/>
                  <span class="label label-danger">Não</span>
                  
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