 <h2><?=$pagina?></h2>
 <hr>
   <div class="rradio">
    <div class="interna">
      <div class="row">
        <form id="addDocs" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_aluno" value="<?=$id?>">
        <div class="col-md-12">
          <hr>
          <h3 for="recipient-name" class="control-label">
          <strong>Anexar Documentos:</strong></h3>
          <hr>
             <div class="form-group">
              <label for="recipient-name" class="control-label">Documentos :</label>
              <input type="file" class="form-control" name="docs">
            </div>
        </div>

        <div class="col-md-12">
          <hr>
          <div class="form-group">
            <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
            <button type="submit" class="btn btn-success"> Anexar</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>


  <?php require_once 'modal.php'?>

