
<h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">
       <div class="row">  

    <form method="POST" action="<?=BASE_URL?>pagamentos/verPagamentos" enctype="multipart/form-data">


        <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Data Inicial:</label>
          	<input type="date" name="data_inicial" class="form-control">
          </div>
        </div>

             <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Data Final:</label>
            <input type="date" name="data_final" class="form-control">

          </div>
        </div>

      <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Situação:</label>
            <select name="situacao" class="form-control">
            	<option>Selecione a Situação</option>
            	<option value="1">PAGO</option>
            	<option value="0">EM ABERTO</option>
            </select>
          </div>
        </div>


<div class="col-md-12">
  <hr>  
<div class="form-group">
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
<button type="submit" class="btn btn-success">Pesquisar</button>
</div>
</div>
          
        </form>

<script type="text/javascript">
	
</script>