 <h2><?=$pagina?></h2>
	<hr>
 <div class="rradio">
    <div class="interna">
  		<div class="row">
     		 <form method="POST" action="<?=BASE_URL?>prova/anexarProva" enctype="multipart/form-data">
          
        	    	  <div class="col-md-7">
        	 		      
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">Subir Prova:</label>
                      <input type="file" name="provaup" class="form-control">
                    </div>



          
              <div class="form-group">
       <input type="hidden" class="form-control" name="id_prova" value="<?php echo $lista['id_prova']?>">
       <input type="hidden" class="form-control" name="aluno" value="<?php echo $lista['aluno_id']?>">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
                <button type="submit" class="btn btn-success"> Anexar</button>
              </div>
       

                  </div>

           
    			</form>
      </div>
    </div>
</div>


   
       
        
       
   

     
         
          
    