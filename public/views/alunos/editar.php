 <?php foreach ($alunos as $a) {?>
 <h2><?=$pagina?> / <?=$a['nome_aluno']?></h2>
  <hr>
 <div class="rradio">
    <div class="interna">

 <div class="row">

<!-- Se o aluno ainda nao estiver matriculado ele aparece o conteudo abaixo-->
<?php if($this->matriculado($a['id_aluno'])){?>

   <form method="POST" id="editAluno" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?=$a['id_aluno']?>">

    <div class="form-group col-md-12">
        <h3 class="control-label"><strong>Informações Pessoais:</strong></h3>
    </div>


     <div class="form-group col-md-12">
        <label class="control-label">* Nome:</label> 
        <em class="em">Nome completo por extenso e sem abreviação.</em>
        <input type="text" class="form-control cxa" name="nome_aluno" value="<?=$a['nome_aluno']?>" required>
      </div> 

       <div class="form-group col-md-4">
        <label class="control-label">* Sexo:</label>
       <input type="text" class="form-control cxa" name="sexo" value="<?=$a['sexo']?>" required>
      </div> 

      <div class="form-group col-md-8">
        <label class="control-label">* Estado Civil:</label>
          <input type="text" class="form-control cxa" name="estado_civil" value="<?=$a['estado_civil']?>" required>
      </div> 


      <div class="form-group col-md-3">
        <label class="control-label">* Data de Nascimento:</label>
        <input type="text" class="form-control data" name="data_de_nascimento" value="<?=$a['data_de_nascimento']?>" required>
      </div> 

      <div class="form-group col-md-3">
        <label for="recipient-name" class="control-label">* Estado de Nascimento:</label>
      <input type="text" class="form-control" name="estado_de_nascimento" value="<?=$a['estado_de_nascimento']?>" required>
      </div> 

      <div class="form-group col-md-3">
        <label for="recipient-name" class="control-label">* Cidade de Nascimento:</label>
        <input type="text" class="form-control" name="cidade_de_nascimento" value="<?=$a['cidade_de_nascimento']?>" required>
      </div> 

      <div class="form-group col-md-3">
        <label for="recipient-name" class="control-label">* Nacionalidade:</label>
        <input type="text" class="form-control cxa" name="nacionalidade" value="<?=$a['nacionalidade']?>" required>
      </div> 

       <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* RG/CNH:</label>
          <input type="text" class="form-control rg" name="rg" id="rg" value="<?=$a['rg_aluno']?>"  required="">
      </div>

      <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Estado Emissor:</label>
          <input type="text" class="form-control" name="estado_emissor" value="<?=$a['estado_emissor']?>" required="">
      </div>

      <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Orgão Emissor:</label>
          <input type="text" class="form-control cxa" name="orgao_emissor" value="<?=$a['orgao_emissor']?>" required="">
      </div>

       <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Data de Expedição:</label>
          <input type="text" class="form-control data" name="data_expedicao" value="<?=$a['data_expedicao']?>" required="">
      </div>
      
     <div class="form-group col-md-3">
       <label for="recipient-name" class="control-label">* CPF:</label>
       <input type="text" class="form-control" name="cpf" value="<?=$a['cpf_aluno']?>" required>
     </div> 

      <div class="form-group col-md-3">
          <label for="recipient-name" class="control-label">* Celular:</label>
          <input type="text" class="form-control cel" name="telefone_aluno" value="<?=$a['telefone_aluno']?>" required>
      </div>

      <div class="col-md-3">
          <div class="form-group">
            <label class="control-label">Telefone Comercial:</label>
            <input type="text" class="form-control tel" name="telefone_comercial" value="<?=$a['telefone_comercial']?>">
          </div>
      </div>

        <div class="col-md-3">
          <div class="form-group">
            <label class="control-label">Telefone Residencial:</label>
            <input type="text" class="form-control tel" name="telefone_residencial" value="<?=$a['telefone_residencial']?>"/>
          </div>
      </div>  
  <div class="col-md-12"> </div>
      <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Nome Mãe:</label>
            <em class="em">Nome completo por extenso e sem abreviação.</em>
            <input type="text" class="form-control cxa" name="nome_mae" value="<?=$a['nome_mae']?>" />
          </div>
      </div>

         <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">Nome Pai:</label>
            <em class="em">Nome completo por extenso e sem abreviação.</em>
            <input type="text" class="form-control cxa" name="nome_pai"  value="<?=$a['nome_pai']?>" />
          </div>
        </div>

         <div class="col-md-7">
          <div class="form-group">
            <label class="control-label">Local de Trabalho:</label>
            <input type="text" class="form-control cxa" name="local_trabalho" value="<?=$a['local_trabalho']?>">
          </div>
         </div>

         <div class="col-md-5">
          <div class="form-group">
            <label class="control-label">Profissão:</label>
            <input type="text" class="form-control cxa" name="profissao" value="<?=$a['profissao']?>">
          </div>
      </div>
    
          <div class="form-group col-md-7">
            <label for="recipient-name" class="control-label">* Email:</label>
            <input type="email" class="form-control" id="email" name="email_aluno" value="<?=$a['email_aluno']?>" required>
          </div>

      <div class="col-md-12">
        <hr class="hr">
         <h3 class="control-label"><strong>Endereço:</strong></h3>
       
       <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* CEP:</label>
            <input type="text" class="form-control" name="cep" value="<?=$a['cep']?>"required>
          </div>
        </div>

        <div class="col-md-10">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Rua:</label>
            <input type="text" class="form-control cxa" id="rua" name="endereco_aluno" value="<?=$a['endereco_aluno']?>" required>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Numero:</label>
            <input type="text" class="form-control" name="numero_aluno" value="<?=$a['numero_aluno']?>" required>
          </div>
        </div>

         <div class="col-md-10">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Complemento:</label>
            <input type="text" class="form-control" name="complemento" value="<?=$a['complemento']?>"  >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Bairro:</label>
            <input type="text" class="form-control cxa" id="bairro" name="bairro_aluno" value="<?=$a['bairro_aluno']?>" required>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Cidade:</label>
            <input type="text" class="form-control cxa" id="cidade" name="cidade_aluno" value="<?=$a['cidade_aluno']?>" required>
          </div>
        </div>

       <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Estado:</label>
            <input type="text" class="form-control cxa" id="uf" name="estado_aluno" value="<?=$a['estado_aluno']?>" required>
          </div>
        </div>  
          

      </div>

      <div class="col-md-12">
        <hr class="hr">
        <h3 class="control-label"><strong>Outras Informações</strong></h3>
             <div class="form-group col-md-7">
                <label for="recipient-name" class="control-label">* Possui Número INEP?</label>
                <input type="text" class="form-control" name="inep" value="<?=$a['inep']?>" required />
            </div>

          <div class="form-group col-md-12">
            <h4 for="recipient-name" class="control-label">Como conheceu a empresa?</h4>
            
                <input type="text" name="cc_empresa" class="form-control" value="<?=$a['cc_empresa']?>" required />             
          </div>

          <div class="form-group col-md-7">
               <label for="recipient-name" class="control-label"> Quem Indicou?</label>
            <input type="text" class="form-control" name="cc_empresa_id" value="<?=$a['cc_empresa_id']?>">
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
    <div class="aluno"></div>
    <hr class="hr">
    <h3 class="control-label"><strong>Gerenciar Documentos:</strong></h3>

       <?php $path .= preg_replace( '#[^0-9]#', '', $a['cpf_aluno']).'/';

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
  </div>
      <div class="modal-body sf">
        <div class="form-group">
        <label for="recipient-name" class="control-label">Documentos em PDF:</label>
        <input type="file" class="form-control" name="docs">
      </div>

           <div class="form-group">
            <img class='carregando' src='https://i.stack.imgur.com/xwRrg.gif' alt='' />
          </div>
      </div>
      <div class="col-md-12">
          <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
        </form>
      </div>
    </div>
    <?php } else{?>

      <!-- Se o aluno já esta matriculado mostrao o conteudo abaixo-->
    <form method="POST" id="editAluno" enctype="multipart/form-data">
      
      <input type="hidden" name="id" value="<?=$a['id_aluno']?>">
      
      <div class="col-md-12">
        <h3 for="recipient-name" class="control-label"><strong>Informações Pessoais:</strong></h3>
        <hr>
         <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" class="form-control cxa" name="nome_aluno" value="<?=$a['nome_aluno']?>" required>
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

          <?php 
                $path .= preg_replace( '#[^0-9]#', '', $a['cpf_aluno']).'/';
                echo $path;
                
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
        <hr>
        <h3 for="recipient-name" class="control-label">
        <strong>Anexar Documentos:</strong></h3>
        <hr>
           <div class="form-group">
              <label for="recipient-name" class="control-label">Documentos em PDF:</label>
              <input type="file" class="form-control" name="docs">
          </div>
      </div>

      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success"> Editar Aluno</button>
        </div>
      </div>
    <?php } ?>
 </form>
 </div>
</div>
</div>
  <?php } ?>