
<h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">
       <div class="row">  

 		<form method="POST" id="addPolo" enctype="multipart/form-data">

         <div class="col-md-12"> 
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" class="form-control cxa" name="nome_polo" id="nome_polo" required>
          </div>
         </div>

         <div class="col-md-3">
          <div class="form-group">
            <label for="recipient-name" class="control-label">CEP:</label>
            <input type="text" class="form-control cxa" name="cep_polo" onblur="pesquisacep(this.value);" required>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Rua:</label>
            <input type="text" class="form-control cxa" id="rua" name="endereco_polo[]" required>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Numero:</label>
            <input type="text" class="form-control cxa" name="endereco_polo[]" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Bairro:</label>
            <input type="text" class="form-control cxa" id="bairro" name="bairro" required>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cidade:</label>
            <input type="text" class="form-control cxa" id="cidade" name="cidade_polo" required>
          </div>
        </div>

       <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Estado:</label>
            <input type="text" class="form-control cxa" id="uf" name="estado_polo" required>
          </div>
        </div>

          <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Telefone 1:</label>
            <input type="text" class="form-control tel" name="telefone_polo" id="telefone_polo" placeholder="XX 0000-0000" required>
          </div>
        </div>

          <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Telefone 2:</label>
            <input type="text" class="form-control tel" name="telefone_polo_2" id="telefone_polo" placeholder="XX 0000-0000">
          </div>
        </div>

          
        <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Apelido:</label>
            <input type="text" class="form-control cxa" name="apelido" required>
          </div>
        </div>

         <div class="col-md-6"> 
          <div class="form-group">
            <label for="recipient-name" class="control-label">Razão Social:</label>
            <input type="text" class="form-control cxa" name="razao_social" required>
          </div>
         </div>

          <div class="col-md-6"> 
          <div class="form-group">
            <label for="recipient-name" class="control-label">CNPJ</label>
            <input type="text" class="form-control" name="cnpj" required>
          </div>
         </div>

          <!--div class="col-md-6"> 
          <div class="form-group">
            <label for="recipient-name" class="control-label">Upload logotipo</label>
            <input type="file" class="form-control" name="logo">
          </div>
         </div>

        <div class="col-md-6"> 
          <div class="form-group">
            <label for="recipient-name" class="control-label">Upload de documentos</label>
           <input type="file" class="form-control" name="docs">
          </div>
        </div-->


<div class="col-md-12">
  <hr>  
<div class="form-group">
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
<button type="submit" class="btn btn-success"> Cadastrar Polo</button>
</div>
</div>
          
        </form>
 </div>
</div>
</div>
</div>