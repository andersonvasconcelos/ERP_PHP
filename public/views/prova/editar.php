 <h2><?=$pagina?></h2>
	<hr>
 <div class="rradio">
    <div class="interna">
		<div class="row">
 		 <form method="POST" action="<?=BASE_URL?>prova/editProva" enctype="multipart/form-data">
      

            <div class="form-group col-md-7">
              <label for="recipient-name" class="control-label">Data da Prova:</label>
              <input type="date" class="form-control" name="data">
            </div>  

            <div class="form-group col-md-7">
              <label for="recipient-name" class="control-label">Hora da Prova:</label>
              <input type="text" class="form-control" name="hora" value="<?php echo $lista['hora_prova']?>">
            </div> 

           
            
          

      <div class="col-md-12">
        <div class="form-group">
          <input type="hidden" name="id_prova" value="<?php echo $lista['id_prova']?>">
          <input type="hidden" name="curso" value="<?php echo $lista['curso_id']?>">
          <input type="hidden" name="area" value="<?php echo $lista['area_id']?>">
          <input type="hidden" name="aluno" value="<?php echo $lista['aluno_id']?>">
          
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success"> Salvar</button>
        </div>
      </div>

  </div>
			</form>
</div>
</div>
</div>


   
       
        
       
   

     
         
          
    