 <h2><?=$pagina?></h2>
	<hr>
 <div class="rradio">
    <div class="interna">
		<div class="row">
    
 		 <form method="POST" action="<?=BASE_URL?>prova/gerarProva" enctype="multipart/form-data">
      
	    	  <div class="col-md-7">
	 		      <div class="form-group">
            <label for="recipient-name" class="control-label">Curso:</label>
            <select class="form-control required" name="curso" id="curso">  
              <option value="0">Escolha um curso</option>
              <?php foreach ($aulas as $a) {?>
              <option value="<?=$a['id_curso']?>"><?=$a['nome_curso']?></option>
            <?php } ?>
            </select>
          </div>

<fieldset>

<!-- Form Name -->

<!-- Multiple Radios -->
<div class="form-group lg">
  <label class="control-label" for="radios">Area do Conhecimento:</label>
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="area" id="radios-0" value="1">
      LINGUAGENS
    </label>
  </div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="area" id="radios-1" value="2">
      MATEMÁTICA
    </label>
  </div>
  <div class="radio">
    <label for="radios-2">
      <input type="radio" name="area" id="radios-2" value="3">
      CIÊNCIAS DA NATUREZA
    </label>
  </div>
  <div class="radio">
    <label for="radios-3">
      <input type="radio" name="area" id="radios-3" value="4">
      CIÊNCIAS HUMANAS
    </label>
  </div>
  </div>

<!-- Multiple Radios (inline) -->
</fieldset>
           
            <div class="form-group">
            <label for="recipient-name" class="control-label">Aluno:</label>
            <select class="form-control required" name="id_aluno" id="id_aluno">  
              <option value="0">Escolha um aluno</option>
      
            </select>
          </div>

            <div class="form-group">
            <label for="recipient-name" class="control-label">Data da Prova:</label>
            <input type="date" class="form-control" name="data">
          </div>  

              <div class="form-group">
            <label for="recipient-name" class="control-label">Hora da Prova:</label>
            <input type="time" class="form-control" name="hora">
          </div> 

            <div class="form-group">
            <input type="submit" class="btn btn-success" value="Cadastrar Avaliação">
          </div> 
  </div>
			</form>
</div>
</div>
</div>


   
       
        
       
   

     
         
          
    