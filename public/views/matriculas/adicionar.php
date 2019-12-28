 <?php foreach ($alunos as $aluno): ?>
 
 <h3><?=$pagina?> :<strong> <?=$aluno['nome_aluno']?></strong></h3>
  <hr>
<div id="dialog-confirm" title="Escolha abaixo uma forma de pagamento"></div>
  <div class="rradio">
    <div class="interna">
    <div class="row">

  <form id="addMat" enctype="multipart/form-data">  
  <div class="aluno"><input type="hidden" name="id_aluno_docs" id="id_aluno_docs" value="<?=$aluno['id_aluno']?>"></div> 
      <div class="col-md-12">
          <hr class="hr">
          <h3 class="control-label"><strong>Matrícula (documentos e requerimentos): </strong></h3>
          <label class="col-md-12">Tipo de Matricula:</label>

         <div class="form-group col-md-3">
          <label class="radio-inline">
            <input type="radio" name="tipo_matricula" value="matricula"/>
            <span class="label label-success">Matrícula</span>
          </label>
        </div>

        <div class="form-group col-md-3">
          <label class="radio-inline">
            <input type="radio" name="tipo_matricula" value="classificacao"/>
            <span class="label label-primary">Classificação</span>
          </label>
        </div>
        <div class="form-group col-md-3">
          <label class="radio-inline">
            <input type="radio" name="tipo_matricula" value="aproveitamento"/>
            <span class="label label-warning">Aproveitamento</span>
          </label>
        </div>
        <!--div class="form-group col-md-3">
          <label class="radio-inline">
            <input type="radio" name="tipo_matricula" value="transferencia"/>
            <span class="label label-info">Transferência</span>
          </label>
        </div-->
      </div>

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
<div class="clas" style="display: none">
  <div class="list-group">
    <a href="#" class="list-group-item disabled">
             Documento de classificação abaixo</a>
  <button type="button" class="list-group-item docs" data-p="classificacao"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>
  GERAR REQUERIMENTO DE CLASSIFICAÇÃO</button>
</div>
</div>

<div class="ap" style="display: none">
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

<div class="tr" style="display: none">
  <div class="list-group">
    <a href="#" class="list-group-item disabled">
             Documento de transferência abaixo</a>

  <button type="button" class="list-group-item docs" data-p="transferencia_ensino_medio"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>
  GERAR REQUERIMENTO DE TRANSFERENCIA ENSINO MÉDIO</button>
</div></div>

           </div>
         </div>


  <input type="hidden" value="<?=$aluno['id_aluno']?>" id="aluno_id">
    <div class="col-md-12">
       <hr class="hr">
         <div class="form-group">
            <label for="recipient-name" class="control-label">Curso:</label>
            <select name="id_curso" id="id_curso" class="form-control">
              <option value="0">Selecione o Combo</option>

              <?php foreach($pacotes as $c){?>

              <option value="<?=$c['id_pacote']?>"><?=$c['nome_pacote']?></option>

            <?php }?>

            </select>
          </div> 
    </div>

       <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success"> Matricular Aluno</button>
        </div>
      </div>
</form>

</div>
    </div>

  </div>
</div>
<?php endforeach ?>