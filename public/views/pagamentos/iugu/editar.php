 <?php foreach ($contas as $c) {?>
 <h2><?=$pagina?> </h2>
  <hr>
 <div class="rradio">
    <div class="interna">

 <div class="row">
      <!-- Se o aluno já esta matriculado mostrao o conteudo abaixo-->
    <form method="POST" id="editAluno" enctype="multipart/form-data">
      
      <input type="hidden" name="id" value="<?=$c['id']?>">
      
      <div class="col-md-12">
        <h3 for="recipient-name" class="control-label"><strong>Informações Pessoais:</strong></h3>
        <hr>
         <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" class="form-control cxa" name="nome_aluno" value="<?=$c['nome_empresa']?>" required>
          </div> 
      </div>

      <div class="col-md-6">
        <div class="form-group">
         <label for="recipient-name" class="control-label">CPF:</label>
         <input type="text" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" value="<?=$a['cpf_aluno']?>" required>
        </div> 
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="recipient-name" class="control-label">RG/CNH:</label>
          <input type="text" class="form-control" name="rg" id="rg" placeholder="000.000-000" value="<?=$a['rg_aluno']?>" required>
        </div>
      </div>


      <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Telefone:</label>
            <input type="text" class="form-control" name="telefone_aluno" value="<?=$a['telefone_aluno']?>" placeholder="00 00000-0000" required>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="text" class="form-control" name="email_aluno" value="<?=$a['email_aluno']?>" required>
          </div>
      </div>

  

      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success"> Classificar</button>
        </div>
      </div>
 </form>
 </div>
</div>
</div>
<?php } ?>