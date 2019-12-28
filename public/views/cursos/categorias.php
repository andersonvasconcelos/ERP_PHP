<form class="form-horizontal" action="<?=BASE_URL?>cursos/adicionar" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Cadastrar Categoria:</legend>

<!-- Search input-->
<div class="form-group">
  
  <div class="col-md-4">
  	<label class="">Nome</label>
    <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md">
  </div>

</div>

<div class="form-group">
  
  <div class="col-md-4">
  	<label class="control-label" for="searchinput">Codigo</label>
    <input name="codigo" type="text" placeholder="Codigo" class="form-control input-md">
  </div>
  
</div>

<hr>
<div class="form-group">
  
  <div class="col-md-4">
  	<input type="submit" name="" value="Cadastrar Categoria" class="btn btn-sm btn-success">
  </div>
  
</div>