<div class="esconder">
          <form id="addMat">
            <div class="aluno"> </div> 
            <div class="col-md-12">
             <hr class="hr">
             <h3 class="control-label"><strong>Matrícula: </strong></h3>
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
            </div>
             <div class="col-md-12">
              <hr class="hr">
              <label for="recipient-name" class="control-label">Curso:</label>
              <select name="id_curso" id="id_curso" class="form-control">
               <option value="0">Selecione o Combo</option>
               <?php foreach($pacotes as $c){?>
                <option value="<?=$c['id_pacote']?>"><?=$c['nome_pacote']?></option>
               <?php }?>
              </select>
             </div>
             <div class="col-md-12">
              <hr>
              <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
              <button type="submit" class="btn btn-success"> Matricular Aluno</button>
             </div>
          </form>
         </div>
