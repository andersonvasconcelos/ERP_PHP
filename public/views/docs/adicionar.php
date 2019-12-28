 <?php foreach ($alunos as $aluno): ?>
 
 <h3><?=$pagina?> :<strong> <?=$aluno['nome_aluno']?></strong></h3>
  <hr>
<div id="dialog-confirm" title="Escolha abaixo uma forma de pagamento"></div>
  <div class="rradio">
    <div class="interna">
    <div class="row">

  <form id="editDocs" enctype="multipart/form-data">  
  <div class="aluno"><input type="hidden" name="id_aluno_docs" id="id_aluno_docs" value="<?=$aluno['id_aluno']?>"></div> 

           <div class="col-md-12">
            <hr class="hr">
            <div class="list-group">

    <div class="mat">

              <a href="#" class="list-group-item active disabled">
              Clique em um requerimento abaixo</a>

              <button type="button" class="list-group-item docs" data-p="fase1_modulo_inicial"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              FASE I - MODULO INICIAL (1º ANO ENSINO MÉDIO)</button>

             <button type="button" class="list-group-item docs" data-p="fase2_modulo1">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
            FASE II MODULO I (2º ANO ENSINO MÉDIO)</button>

             <button type="button" class="list-group-item docs" data-p="fase2_modulo2">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
            FASE II MODULO II (3º ANO ENSINO MÉDIO)</button>
    </div>

<br>


<?php if($aluno['tipo_matricula'] == 'classificacao'):?>

<div class="clas">
  <div class="list-group">
    <a href="#" class="list-group-item disabled">
             Documento de classificação abaixo</a>
  <button type="button" class="list-group-item docs" data-p="classificacao"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>
  GERAR REQUERIMENTO DE CLASSIFICAÇÃO</button>
</div>
</div>

<?php endif; ?>

<?php if($aluno['tipo_matricula'] == 'aproveitamento'):?>

<div class="ap">
  <div class="list-group">
    <a href="#" class="list-group-item disabled">
             Documento de aproveitamento abaixo</a>
  <button type="button" class="list-group-item docs" data-p="aproveitamento"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>
  GERAR REQUERIMENTO DE APROVEITAMENTO</button>
</div>
     <div class="form-group col-md-12">
            <hr class="hr">
            <label>Enviar requerimento de aproveitamento.</label>
            <input type="file" class="form-control" name="outro">
           </div>
</div>

<?php endif; ?>

<?php if($aluno['tipo_matricula'] == 'transferencia_ensino_medio'):?>

<div class="tr">
  <div class="list-group">
    <a href="#" class="list-group-item disabled">transferencia</a>
    <button type="button" class="list-group-item docs" data-p="transferencia_ensino_medio">
      <span class="glyphicon glyphicon-save" aria-hidden="true"></span>GERAR REQUERIMENTO DE TRANSFERENCIA ENSINO MÉDIO</button>
  </div>
</div>
<?php endif; ?>

           </div>
         </div>
        </form>
    </div>

  </div>
</div>
<?php endforeach ?>