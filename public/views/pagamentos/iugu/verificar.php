
 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">
<?php $iugu = json_decode($contas['iugu']);?>
 <div class="row">
  <form method="POST" action="<?=BASE_URL?>iugu/verificarSubConta">
    <input type="text" name="account_id" value="<?=$iugu->account_id?>">
    <input type="text" name="user_token" value="<?=$iugu->user_token?>">

 		 <div class="form-group col-md-4">
        <label class="control-label">* Valor máximo da venda :</label> 
        <em class="em">Obrigatório.</em>
          <select required  name="price_range" class="form-control">
          <option value=""></option>
          <option value="Até R$ 100,00">Até R$ 100,00</option>
          <option value="Entre R$ 100,00 e R$ 500,00">Entre R$ 100,00 e R$ 500,00</option>
          <option value="Mais que R$ 500,00">Mais que R$ 500,00</option>
        </select>
      </div> 

       <div class="form-group col-md-2">
        <label class="control-label">* Produto Físico:</label>
        <select required name="physical_products" class="form-control">
          <option value=""></option>
          <option value="true">Sim</option>
          <option value="false">Não</option>
        </select>
      </div> 

         <div class="form-group col-md-3">
          <label class="control-label">* Saque automático:</label>
          <select required name="automatic_transfer" class="form-control">
            <option value=""></option>
            <option value="true">Sim</option>
            <option value="false">Não</option>
          </select>
        </div> 

        <div class="form-group col-md-3">
          <label class="control-label">* Tipo de Conta:</label>
          <select required name="person_type" class="form-control">
            <option value=""></option>
            <option value="Pessoa Física">Pessoa Física</option>
            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
          </select>
        </div> 

      <div class="form-group col-md-6">
        <label class="control-label">* Nome Empresa:</label>
        <input type="text" class="form-control" name="company_name">
      </div> 

       <div class="form-group col-md-6">
        <label class="control-label">* Nome:</label>
        <input type="text" class="form-control" name="name">
      </div>

      <div class="form-group col-md-3">
        <label class="control-label">* Descrição do Negócio:</label>
        <input type="text" class="form-control" name="business_type" required>
      </div> 

       <div class="form-group col-md-3">
        <label class="control-label">* CNPJ:</label>
        <input type="text" class="form-control" name="cnpj">
      </div> 

       <div class="form-group col-md-3">
        <label class="control-label">* CPF:</label>
        <input type="text" class="form-control" name="cpf">
      </div> 

      <div class="form-group col-md-3">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Telefone:</label>
            <input type="text" class="form-control" name="telephone" >
          </div>
      </div> 

      <div class="col-md-12">
        <hr class="hr">
         <h3 class="control-label"><strong>Endereço:</strong></h3>
       
       <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* CEP:</label>
            <input type="text" class="form-control" name="cep" onblur="pesquisacep(this.value);" required>
          </div>
        </div>

        <div class="col-md-10">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Rua:</label>
            <input type="text" class="form-control cxa" id="rua" name="address" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Bairro:</label>
            <input type="text" class="form-control cxa" id="bairro" name="bairro_aluno" required>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Cidade:</label>
            <input type="text" class="form-control cxa" id="cidade" name="city" required>
          </div>
        </div>

       <div class="col-md-2">
          <div class="form-group">
            <label for="recipient-name" class="control-label">* Estado:</label>
            <input type="text" class="form-control cxa" id="uf" name="state" required>
          </div>
        </div>  
          

      </div>

      <div class="col-md-12">
        <hr class="hr">
         <h3 class="control-label"><strong>Informações Bancárias</strong></h3>
          <div class="form-group col-md-4">
          <label class="control-label">* Banco</label> 
          <em class="em">Obrigatório.</em>
            <select required  name="bank" class="form-control">
            <option value=""></option>
            <option value="Itaú">Itaú</option>
            <option value="Bradesco">Bradesco</option>
            <option value="Caixa Econômica">Caixa Econômica</option>
            <option value="Banco do Brasil">Banco do Brasil</option>
            <option value="Santander">Santander</option>
            <option value="Banrisul">Banrisul</option>
            <option value="Sicoob">Sicoob</option>
            <option value="Sicredi">Sicredi</option>
            <option value="Inter">Inter</option>
            <option value="BRB">BRB</option>
          </select>
          </div> 

       <div class="form-group col-md-2">
        <label class="control-label">* Tipo:</label>
        <select required name="account_type" class="form-control">
          <option value=""></option>
          <option value="Corrente">Corrente</option>
          <option value="Poupança">Poupança</option>
        </select>
      </div> 

         <div class="form-group col-md-3">
          <label class="control-label">* Agencia:</label>
            <input type="text" class="form-control" name="bank_ag" required>
        </div> 

        <div class="form-group col-md-3">
          <label class="control-label">* Conta:</label>
            <input type="text" class="form-control" name="bank_cc" required>
        </div> 


      <div class="col-md-12">
        <hr>
        <div class="form-group">
          <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
          <button type="submit" class="btn btn-success"> Verificar Conta</button>
        </div>
      </div>
</form>
       
    </div>
    </div>
 </div>
</div>
</div>
  