 <?php foreach ($alunos as $a) {?>
 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">

 <div class="row">
 		
  <form method="POST" id="liberaMat" enctype="multipart/form-data">
      <div class="form-group col-md-12">
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

      <div class="col-md-12">
        <hr class="hr">
         <h3 class="control-label"><strong>Informações de Pagamento</strong></h3>
           <div class="form-group">

            <?php if (!empty($a['id_unico'])) {
           
              $id_unico = $a['id_unico'];

              $resp = $this->getBoletosPj($id_unico);?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Aluno</th>
        <th>Valor</th>
        <th>Vencimento</th>
        <th>Pagamento</th>
        <th>Registrado</th>
        <th>Situacao</th>
      </tr>
    </thead>
    <tbody>

    <?php foreach ($resp as $r): ?>

    <tr>
        
      <td><?=$r->id_unico?></td>
      <td><?=$r->pagador?></td>    
      <td><?=$r->valor?></td>
      <td><?php echo $this->formatData($r->data_vencimento)?></td>
      <td><?=$r->data_pagamento?></td>
      <td><span class="text-info"><?=$r->registro_sistema_bancario?></span></td>

        <?php $this->verificarPago($r->data_pagamento) ?>

    </tr>
          <?php endforeach ?>
  </tbody>
</table>
  
<?php } else{?>

<div class="alert alert-danger">ATENÇÃO: A FORMA DE PAGAMENTO NÃO FOI INFORMADA!</div>

<?php }?>
          </div>
      </div>
  
    <?php 

      foreach ($docs as $doc){ ?>
        
      
  <div class="aluno"></div> 
      <div class="col-md-12">
          <hr class="hr">
          <h3 class="control-label"><strong>Irformações de Documentoes e Requerimentos: </strong></h3>
          <label class="col-md-12">Tipo de Matricula:</label>

         <div class="form-group col-md-3">
            <span class="label label-success"> <?=$doc['tipo_matricula']?></span>
         </div>

        <div class="col-md-12">
          <label class="col-md-12">Documentos Enviados</label>

<label class="radio-inline">
  <input type="radio" name="docs_rg" value="<?=$doc['docs_rg']?>"
  <?php echo ($doc['docs_rg'] == 1) ? "checked" : null; ?>/>RG / CNH
</label>

<label class="radio-inline">
    <input type="radio" name="docs_cpf" value="<?=$doc['docs_cpf']?>"
    <?php echo ($doc['docs_cpf'] == 1) ? "checked" : null; ?>/>CPF / CNH
</label>

<label class="radio-inline">
<input type="radio" name="docs_comprovante_residencia" 
value="<?=$doc['docs_comprovante_residencia']?>"<?php echo ($doc['docs_comprovante_residencia'] == 1) ? "checked" : null; ?>/>Comprovante de Residencia
</label>

<label class="radio-inline">
  <input type="radio" name="docs_historico_escolar" value="<?=$doc['docs_historico_escolar']?>"
  <?php echo ($doc['docs_historico_escolar'] == 1) ? "checked" : null; ?>/> Histórico Escolar
</label>

<label class="radio-inline">
  <input type="radio" name="certidao" value="<?=$doc['certidao']?>"
  <?php echo ($doc['certidao'] == 1) ? "checked" : null; ?> disable/>Certidão
</label>

</div>
     
<?php } 
                $path .= $this->limpaCPF_CNPJ($a['cpf_aluno']).'/';
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
    <div class="col-md-12">
      <input type="hidden" name="id_matricula" value="<?=$a['id_matricula']?>">
      <input type="hidden" name="id_aluno" value="<?=$a['id_aluno']?>">
      <input type="hidden" name="id_curso" value="<?=$a['curso_id']?>">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="button" class="btn btn-success matricular"> Confirmar Matrícula</button>
          <button type="button" class="btn btn-default indeferir"> Indeferir Matrícula</button>
        </div>
      </div>
      <div class="col-md-12">
      <div class="negado" style="display: none">
        <hr class="hr">
         <h3 class="control-label"><strong>Por que foi indeferido</strong></h3>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Motivo da negativa:</label>
          <textarea class="form-control" style=" height: 230px;" name="motivo"></textarea>
          <br>
          <button type="button" class="btn btn-info pendente"> Salvar</button>
          </div>
      </div>
      </div>

           </div>
         </div>
 
      </div>
    
 </div>
</div>
</div>
<?php } ?>