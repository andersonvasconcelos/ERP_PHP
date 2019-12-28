<h2><?=$pagina?></h2>
<hr>
<div class="rradio">
  <div class="interna">
    <div class="row">
      <form method="POST" id="addAluno" enctype="multipart/form-data">
        <div class="form-group col-md-12">
          <h3 class="control-label"><strong>Informações Pessoais:</strong></h3>
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">* Nome:</label>
          <em class="em">Nome completo por extenso e sem abreviação.</em>
          <input type="text" class="form-control cxa" name="nome_aluno" required>
        </div>
        <div class="form-group col-md-4">
          <label class="control-label">* Sexo:</label>
          <select  name="sexo" class="form-control">
            <option>----</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
          </select>
        </div>
        <div class="form-group col-md-8">
          <label class="control-label">* Estado Civil:</label>
          <input type="text" class="form-control cxa" name="estado_civil" required>
        </div>
        <div class="form-group col-md-3">
          <label class="control-label">* Data de Nascimento:</label>
          <input type="text" class="form-control data" name="data_de_nascimento" placeholder="00/00/0000" required>
        </div>
        <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Estado de Nascimento:</label>
          <select class="form-control" name="estado_de_nascimento">
            <option>Selecione</option>
            <?php foreach ($estados as $item): ?>
              <option value="<?=$item['Uf']?>"><?=$item['Uf']?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Cidade de Nascimento:</label>
          <select class="form-control" name="cidade_de_nascimento" required></select>
        </div>
        <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Nacionalidade:</label>
          <input type="text" class="form-control cxa" value="BRASILEIRA" name="nacionalidade" required>
         </div>
         <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* RG/CNH:</label>
          <input type="text" class="form-control rg" name="rg" id="rg" placeholder="00.000.000-0" required="">
         </div>
         <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Estado Emissor:</label>
          <select class="form-control" name="estado_emissor">
            <option>Selecione</option>
            <?php foreach ($estados as $item): ?>
              <option value="<?=$item['Uf']?>"><?=$item['Uf']?></option>
            <?php endforeach ?>
          </select>
         </div>
         <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Orgão Emissor:</label>
          <input type="text" class="form-control cxa" name="orgao_emissor" required="">
         </div>
         <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Data de Expedição:</label>
          <input type="text" class="form-control data" name="data_expedicao" required="">
         </div>
         <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* CPF:</label>
          <input type="text" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" required>
         </div>
         <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Celular:</label>
          <input type="text" class="form-control cel" name="telefone_aluno" id="telefone_aluno" placeholder="00 0 0000-0000" required>
         </div>
          <div class="form-group col-md-3">
            <label class="control-label">Telefone Comercial:</label>
            <input type="text" class="form-control tel" name="telefone_comercial" placeholder="00 0000-0000">
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Telefone Residencial:</label>
            <input type="text" class="form-control tel" name="telefone_residencial" placeholder="00 0000-0000" />
          </div>  
          <div class="form-group col-md-6">
            <label class="control-label">Nome Mãe:</label>
            <em class="em">Nome completo por extenso e sem abreviação.</em>
            <input type="text" class="form-control cxa" name="nome_mae" />
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Nome Pai:</label>
            <em class="em">Nome completo por extenso e sem abreviação.</em>
            <input type="text" class="form-control cxa" name="nome_pai" />
          </div>
          <div class="form-group col-md-7">
            <label class="control-label">Local de Trabalho:</label>
            <input type="text" class="form-control cxa" name="local_trabalho">
          </div>
          <div class="form-group col-md-5">
            <label class="control-label">Profissão:</label>
            <input type="text" class="form-control cxa" name="profissao">
          </div>    
          <div class="form-group col-md-7">
            <label for="recipient-name" class="control-label">* Email:</label>
            <input type="email" class="form-control" id="email" name="email_aluno" required>
          </div>
          <div class="form-group col-md-5">
            <label for="recipient-name" class="control-label">* Senha:</label>
            <input type="text" class="form-control" id="senha" name="senha_aluno" required>
          </div>
          <div class="col-md-12">
           <hr class="hr">
           <h3 class="control-label"><strong>Endereço:</strong></h3>
          <div class="form-group col-md-2">
            <label for="recipient-name" class="control-label">* CEP:</label>
            <input type="text" class="form-control" name="cep" onblur="pesquisacep(this.value);" required>
          </div>
          <div class="form-group col-md-10">
            <label for="recipient-name" class="control-label">* Rua:</label>
            <input type="text" class="form-control cxa" id="rua" name="endereco_aluno" required>
          </div>
          <div class="form-group col-md-2">
            <label for="recipient-name" class="control-label">* Numero:</label>
            <input type="text" class="form-control" name="numero_aluno" required>
          </div>
          <div class="form-group col-md-10">
            <label for="recipient-name" class="control-label">* Complemento:</label>
            <input type="text" class="form-control" name="complemento" >
          </div>
          <div class="form-group col-md-6">
            <label for="recipient-name" class="control-label">* Bairro:</label>
            <input type="text" class="form-control cxa" id="bairro" name="bairro_aluno" required>
          </div>
          <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">* Cidade:</label>
            <input type="text" class="form-control cxa" id="cidade" name="cidade_aluno" required>
          </div>
          <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">* Estado:</label>
            <input type="text" class="form-control cxa" id="uf" name="estado_aluno" required>
          </div>
          <div class="col-md-12">
           <hr class="hr">
           <h3 class="control-label"><strong>Outras Informações</strong></h3>
           <div class="form-group col-md-7">
            <label for="recipient-name" class="control-label">* Possui Número INEP?</label><br>
            <label class="radio-inline">
             <input type="radio" name="inep" value="sim" required />
             <span class="label label-success">Sim</span>
            </label>
            <label class="radio-inline">
             <input type="radio" name="inep" value="nao" required />
             <span class="label label-danger">Não</span>
            </label>
           </div>
           <div class="form-group col-md-7">
            <input type="text" class="form-control" placeholder="Número do INEP (Caso seja informado)" name="numero_do_inep">
           </div>
           <div class="form-group col-md-12">
            <h4 for="recipient-name" class="control-label">Como conheceu a empresa?</h4>
              <label class="radio-inline">
              <input type="radio" name="cc_empresa" value="indicacao" required />
              <span class="label label-default">INDICAÇÃO</span>
              </label>
              <br>
              <label class="radio-inline">
              <input type="radio" name="cc_empresa" value="facebook" required />
              <span class="label label-default">FACEBOOK</span>
              </label>
              <br>
              <label class="radio-inline">
              <input type="radio" name="cc_empresa" value="outdoor" required />
              <span class="label label-default">OUTDOOR</span>
              </label><br>
              <label class="radio-inline">
              <input type="radio" name="cc_empresa" value="radio" required />
              <span class="label label-default">RÁDIO</span>
              </label><br>
              <label class="radio-inline">
              <input type="radio" name="cc_empresa" value="tv" required />
              <span class="label label-default">TV</span>
              </label><br>
              <label class="radio-inline">
              <input type="radio" name="cc_empresa" value="acao empresa" required />
              <span class="label label-default">AÇÃO EMPRESA</span>
              </label><br>
              <label class="radio-inline">
              <input type="radio" name="cc_empresa" value="convenio" required />
              <span class="label label-default">CONVÊNIO</span>
              </label>
             </div>
             <div class="form-group col-md-7">
              <input type="text" class="form-control" name="cc_empresa_id" placeholder="Nome de quem indicou ou nome do convenio">
             </div>
            </div>
            <div class="col-md-12">
             <hr class="hr">
             <h3 class="control-label"><strong>Informações Adicionais</strong></h3>
            <label for="recipient-name" class="control-label">Observações:</label>
             <textarea id="summernote" name="editordata"></textarea>
          </div>
          <div class="col-md-12">
           <hr class="hr">
           <h3 class="control-label"><strong>Dados do Colaborador</strong></h3>
           <label for="recipient-name" class="control-label">Nome do Responsável:</label>
             <input type="text" class="form-control" name="resp">
          </div>
          <div class="col-md-12">
           <hr>
           <div class="form-group">
            <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
            <button type="submit" class="btn btn-success"> Cadastrar Aluno</button>
           </div>
          </div>
         </form>
         <div class="esconder" style="display: none;">
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

 
<?php require_once 'modal.php'?>
