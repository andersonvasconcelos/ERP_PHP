 <?php foreach ($alunos as $a) {?>
 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">

        <?php if ($a['situacao'] == "Pendente") {?>

      <div class="col-md-12">
         <h3 class="control-label"><strong>Por que foi indeferido</strong></h3>
           <div class="form-group">
            <label class="control-label">Motivo da negativa:</label>
            <textarea class="form-control" style=" height: 230px;" name=""><?=$a['negativa']?>
            </textarea>
          </div>
      </div>

       <div class="col-md-12">
        <h3 class="control-label"><strong>Informar Pagamento</strong></h3>
        <div class="btn btn-lg">
           <a href="<?=BASE_URL?>pagamentos/pj/<?=$a['id_matricula']?>" target="blank">
           <img src="<?=URL_IMG?>boleto-icone.png" class="ico"></a>
        </div>
      </div>


  <!--form method="POST" id="liberaMat" enctype="multipart/form-data"-->
      <!--div class="form-group col-md-12">
      <h3 class="control-label"><strong>Informações Pessoais:</strong></h3>
    </div>


 		 <div class="form-group col-md-9">
        <label class="control-label">* Nome:</label> 
        <em class="em">Nome completo por extenso e sem abreviação.</em>
        <input type="text" class="form-control cxa" name="nome_aluno" value="<?=$a['nome_aluno']?>" required>
      </div> 

       <div class="form-group col-md-3">
        <label class="control-label">* Sexo:</label>
       <input type="text" class="form-control" value="<?=$a['sexo']?>">
      </div> 

      <div class="form-group col-md-3">
        <label class="control-label">* Data de Nascimento:</label>
      <input type="text" class="form-control data" name="data_de_nascimento" value="<?=$a['data_de_nascimento']?>">
      </div> 

      <div class="form-group col-md-3">
        <label for="recipient-name" class="control-label">* Estado de Nascimento:</label>
      <input type="text" class="form-control" value="<?=$a['estado_de_nascimento']?>">
      </div> 

      <div class="form-group col-md-3">
        <label for="recipient-name" class="control-label">* Cidade de Nascimento:</label>
        <input type="text" class="form-control" value="<?=$a['cidade_de_nascimento']?>">
        
      </div> 

      <div class="form-group col-md-3">
        <label for="recipient-name" class="control-label">* Nacionalidade:</label>
        <input type="text" class="form-control" value="<?=$a['nacionalidade']?>">

      </div> 

       <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* RG:</label>
          <input type="text" class="form-control" value="<?=$a['rg_aluno']?>">
      </div>

      <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Estado Emissor:</label>
          <input type="text" class="form-control" value="<?=$a['estado_emissor']?>">
      </div>

      <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Orgão Emissor:</label>
          <input type="text" class="form-control" value="<?=$a['orgao_emissor']?>">
      </div>

       <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Data de Expedição:</label>
          <input type="text" class="form-control" value="<?=$a['data_expedicao']?>">
          
      </div>
      
     <div class="form-group col-md-3">
       <label for="recipient-name" class="control-label">* CPF:</label>
     <input type="text" class="form-control" value="<?=$a['cpf_aluno']?>">
     </div> 

      <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Celular:</label>
          <input type="text" class="form-control" value="<?=$a['telefone_aluno']?>">
      </div>

      <div class="col-md-3">
          <div class="form-group">
            <label class="control-label">Telefone Comercial:</label>
            <input type="text" class="form-control" value="<?=$a['telefone_comercial']?>">
          </div>
      </div>

        <div class="col-md-3">
          <div class="form-group">
            <label class="control-label">Telefone Residencial:</label>
            <input type="text" class="form-control" value="<?=$a['telefone_residencial']?>">
          </div>
      </div>  
  <div class="col-md-12"> </div>
      <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Nome Mãe:</label>
            <em class="em">Nome completo por extenso e sem abreviação.</em>
            <input type="text" class="form-control" value="<?=$a['nome_mae']?>" />
          </div>
      </div>

         <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Nome Pai:</label>
            <em class="em">Nome completo por extenso e sem abreviação.</em>
            <input type="text" class="form-control" value="<?=$a['nome_pai']?>" />
          </div>
        </div>

         <div class="col-md-7">
          <div class="form-group">
            <label class="control-label">Local de Trabalho:</label>
            <input type="text" class="form-control" value="<?=$a['local_trabalho']?>" />
          </div>
         </div>

         <div class="col-md-5">
          <div class="form-group">
            <label class="control-label">Profissão:</label>
            <input type="text" class="form-control" value="<?=$a['profissao']?>" />          
          </div>
      </div>
    
          <div class="form-group col-md-12">
            <label for="recipient-name" class="control-label">* Email:</label>
            <input type="text" class="form-control" value="<?=$a['email_aluno']?>" />
          </div>

      <div class="col-md-12">
        <hr class="hr">
         <h3 class="control-label"><strong>Endereço:</strong></h3>
       
       <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* CEP:</label>
            <input type="text" class="form-control" value="<?=$a['cep']?>" />
          </div>
        </div>

        <div class="col-md-10">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Rua:</label>
           <input type="text" class="form-control" value="<?=$a['endereco_aluno']?>" />
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Numero:</label>
           <input type="text" class="form-control" value="<?=$a['numero_aluno']?>" />
          </div>
        </div>

         <div class="col-md-10">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Complemento:</label>
            <input type="text" class="form-control" value="<?=$a['complemento']?>" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Bairro:</label>
            <input type="text" class="form-control" value="<?=$a['bairro_aluno']?>" />
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Cidade:</label>
            <input type="text" class="form-control" value="<?=$a['cidade_aluno']?>" />
          </div>
        </div>

       <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Estado:</label>
            <input type="text" class="form-control" value="<?=$a['estado_aluno']?>" />
          </div>
        </div>  
          

      </div>

      <div class="col-md-12">
        <hr class="hr">
        <h3 class="control-label"><strong>Outras Informações</strong></h3>
             <div class="form-group col-md-4">
                <label for="recipient-name" class="control-label">Número INEP</label>
           <input type="text" class="form-control" value="<?=$a['n_inep']?>" />
          </div>

          <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">Como conheceu a empresa?</label>
             <input type="text" class="form-control" value="<?=$a['cc_empresa']?>" />

          </div>

          <div class="form-group col-md-4">
            <label for="recipient-name" class="control-label">Quem indicou</label>
            <input type="text" class="form-control" value="<?=$a['cc_empresa_id']?>" />
          </div>

      </div>

      <div class="col-md-12">
        <hr class="hr">
         <h3 class="control-label"><strong>Informações Adicionais</strong></h3>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Observações:</label>
             <textarea id="summernote" name="editordata"><?=$a['obs']?></textarea>
          </div>
      </div>
          </div>
      </div-->


 <div class="col-md-12">
        <form id="upDocs"  enctype="multipart/form-data">
          <div class="aluno">
            
          </div> 
        <hr class="hr">
         <h3 class="control-label"><strong>Gerenciar Documentos:</strong></h3>

      <div class="modal-body sf">
        <div class="form-group">
            <label for="recipient-name" class="control-label">RG ou CNH:</label>
            <input type="file" class="form-control" name="docs_rg">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">* CPF ou CNH:</label>
            <input type="file" class="form-control" name="docs_cpf" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">* Comprovante de Residência:</label>
            <input type="file" class="form-control" name="docs_residencia" required="">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="control-label">* Historico Escolar:</label>
            <input type="file" class="form-control" name="docs_escolar" required="">
          </div>

           <div class="form-group">
            <label for="recipient-name" class="control-label">* Certidão de nascimento ou casamento:</label>
            <input type="file" class="form-control" name="certidao" required="">
          </div>

           <div class="form-group">
            <img class='carregando' src='http://i.stack.imgur.com/xwRrg.gif' alt='' />
          </div>
      </div>
       

          <div class="form-group col-md-12 center-block">
            <input type="hidden" name="id_aluno_docs" id="id_aluno_docs" value="<?=$a['id_aluno']?>">
            <br>           
            <!--a href=""  class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#docsModal"> Enviar Arquivos</a-->
             <button type="submit" class="btn btn-lg btn-block btn-primary">Salvar documentos</button>
          </div>
        </form>
      </div>

<form id="upEditDocs" enctype="multipart/form-data">  
  <div class="aluno">
    <input type="hidden" name="id_aluno_docs" id="id_aluno_docs" value="<?=$a['id_aluno']?>">
    <input type="hidden" name="id_mat" id="id_mat" value="<?=$a['id_matricula']?>">
  </div> 
      <div class="col-md-12">
          <hr class="hr">
          <h3 class="control-label"><strong>Matrícula (documentos e requerimentos): </strong></h3>
          <label class="col-md-12">Tipo de Matricula:</label>

         <div class="form-group col-md-3">
          <label class="radio-inline">
            <input type="radio" name="tipo_matricula" value="matricula" required />
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
        <div class="form-group col-md-3">
          <label class="radio-inline">
            <input type="radio" name="tipo_matricula" value="transferencia"/>
            <span class="label label-info">Transferência</span>
          </label>
        </div>
      </div>

           <div class="col-md-12">
            <hr class="hr">
            <div class="list-group">

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

           <div class="form-group col-md-12">
            <hr class="hr">
            <label>Enviar Requerimento de Matricula</label>
            <input type="file" class="form-control" name="mat" required="">
           </div>

           <div class="form-group col-md-12">
            <hr class="hr">
            <label>Enviar requerimento de classificação, aproveitamento ou transferência.</label>
            <input type="file" class="form-control" name="outro">
           </div>


           <div class="form-group col-md-3">
            <button type="submit" class="btn btn-primary hidebtn"> Enviar Arquivos</button>
          </div>
        </form>

<!--/>
             <?php 
                $path .= $a['cpf_aluno'].'/';
                if(file_exists($path)){$diretorio = dir($path);?>
    
      
          <div class="form-group col-md-12">
            <h3 for="recipient-name" class="control-label">
            <strong>Documentos Anexados:</strong></h3>

<?php echo 'Lista de Arquivos do aluno '.'<strong>'.$a['nome_aluno'].'</strong>'.':<br />';
            while($arquivo = $diretorio -> read()){ ?>
              <a href="<?=BASE_URL.$path.$arquivo?>" target="_blank"><?=$arquivo?></a><br />
                <?php } $diretorio -> close();?>          

        </div>

<?php }?>
<-->


    <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="button" class="btn btn-success editarM"> Salvar dados editados</button>
        </div>
      </div>


           </div>
         </div>
 
      </div>
    <?php } else{ ?>

    <div class="col-md-12">
      <div class="alert alert-warning"><strong>Atenção!</strong> Matrícula confirmada ou ainda em análise</div>
      <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
  </div>

   <?php } //FIM DO IF// ?>

 </div>
</div>
</div>

<?php } ?>