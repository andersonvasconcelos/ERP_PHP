
<h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">
       <div class="row">  
        <div class="col-md-12 ">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMatriz" aria-expanded="true" aria-controls="collapseMatriz">
        <h4 class="panel-title">MATRIZ</h4>
      </a>
    </div>
    <div id="collapseMatriz" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <div class="col-md-12">
            <br>
            <h3>PJ Bank</h3>
            <hr class="hr">
            <form>
              <div class="form-group col-md-8">
                <label>Nome</label>
                <input type="text" placeholder="Razão social da empresa" class="form-control" name="nome_empresa">
              </div>
              <div class="form-group col-md-4">
                <label>CNPJ</label>
                <input type="text" class="form-control" name="cnpj">
              </div>
               <div class="form-group col-md-2">
                <label>DDD</label>
                <input type="text" class="form-control" name="ddd">
              </div>
              <div class="form-group col-md-4">
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone">
              </div>
               <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" class="form-control" name="email">
              </div>
              <div class="form-group col-md-5">
                <label>Banco</label>
                <select name="banco_repasse" id="banco_repasse" quebradelinha="1" placeholder="Selecione um banco" class="form-control  hasPopover" comportamentos="Form_Elementos.popoverElemento " data-descricao-texto="Informe o banco onde o crédito será realizado. Obrigatoriamente tem que pertencer ao cnpj informado acima" data-descricao-local="right" data-descricao-evento="focus" data-original-title="" title="" carregado="sim">
    <option value="" label="Selecione um Banco" selected="selected">Selecione um Banco</option>
    <option value="001" label="Banco do Brasil">Banco do Brasil</option>
    <option value="003" label="Banco da Amazônia S.A.">Banco da Amazônia S.A.</option>
    <option value="004" label="Banco do Nordeste">Banco do Nordeste</option>
    <option value="021" label="Banestes">Banestes</option>
    <option value="027" label="Banco Besc">Banco Besc</option>
    <option value="033" label="Santander">Santander</option>
    <option value="035" label="BEC">BEC</option>
    <option value="037" label="Banco do Estado do Pará S.A.">Banco do Estado do Pará S.A.</option>
    <option value="038" label="Banestado">Banestado</option>
    <option value="041" label="Banrisul">Banrisul</option>
    <option value="047" label="Banese">Banese</option>
    <option value="070" label="Banco de Brasília">Banco de Brasília</option>
    <option value="077" label="Banco Intermedium S.A.">Banco Intermedium S.A.</option>
    <option value="084" label="Unicred Uniprime Norte do Paraná">Unicred Uniprime Norte do Paraná</option>
    <option value="085" label="Cecred">Cecred</option>
    <option value="095" label="Banco Confidence de Câmbio S.A">Banco Confidence de Câmbio S.A</option>
    <option value="104" label="Caixa Econômica Federal">Caixa Econômica Federal</option>
    <option value="136" label="Conf. Nacional das cooperativas centrais Unicreds">Conf. Nacional das cooperativas centrais Unicreds</option>
    <option value="212" label="Banco Original">Banco Original</option>
    <option value="237" label="Bradesco">Bradesco</option>
    <option value="244" label="Banco Cidade">Banco Cidade</option>
    <option value="291" label="BCN">BCN</option>
    <option value="341" label="Itaú">Itaú</option>
    <option value="347" label="Sudameris">Sudameris</option>
    <option value="389" label="Banco Mercantil Brasil">Banco Mercantil Brasil</option>
    <option value="399" label="HSBC">HSBC</option>
    <option value="422" label="Banco Safra">Banco Safra</option>
    <option value="453" label="Banco Rural">Banco Rural</option>
    <option value="479" label="Bank Boston">Bank Boston</option>
    <option value="633" label="Banco Rendimento S.A">Banco Rendimento S.A</option>
    <option value="641" label="BBV">BBV</option>
    <option value="741" label="BRP">BRP</option>
    <option value="745" label="Citibank">Citibank</option>
    <option value="748" label="Sicredi">Sicredi</option>
    <option value="756" label="Sicoob">Sicoob</option>
    <option value="888" label="PJBank">PJBank</option>
</select>
              </div>
               <div class="form-group col-md-3">
                <label>Agência</label>
                <input type="text" class="form-control" name="">
              </div>
               <div class="form-group col-md-4">
                <label>conta</label>
                <input type="text" class="form-control" name="">
              </div>
               
              <div class="form-group col-md-12">
                <hr class="hr">
              <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
              <button type="submit" class="btn btn-success"> Salvar </button>  </form>
              </div>
          

            <br>
              <h3>Gerencia Net</h3>
              <hr class="hr">
            <form method="POST" id="addPolo" enctype="multipart/form-data">

              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente ID:</label>
                <input type="text" class="form-control" name="client_id" required>
              </div>
             
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente Secret:</label>
                <input type="text" class="form-control" name="client_secret" required>
              </div>
            
              <div class="form-group">
                <label for="recipient-name" class="control-label">Identificador de Conta:</label>
                <input type="text" class="form-control" name="id_conta" required>
             </div>   
               <hr>  

              <div class="form-group">
              <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
              <button type="submit" class="btn btn-success"> Salvar </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h4 class="panel-title">POLO</h4>
        </a>
      
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
         <div class="col-md-10">
            <br>
            <h3>PJ Bank</h3>
            <hr class="hr">
            <form>
              <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
               <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
               <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
            </form>

            <br>
              <h3>Gerencia Net</h3>
              <hr class="hr">
            <form method="POST" id="addPolo" enctype="multipart/form-data">

              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente ID:</label>
                <input type="text" class="form-control" name="client_id" required>
              </div>
             
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente Secret:</label>
                <input type="text" class="form-control" name="client_secret" required>
              </div>
            
              <div class="form-group">
                <label for="recipient-name" class="control-label">Identificador de Conta:</label>
                <input type="text" class="form-control" name="id_conta" required>
             </div>   
               <hr>  

              <div class="form-group">
              <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
              <button type="submit" class="btn btn-success"> Salvar </button>
              </div>
          </form>
        </div>
 
        
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         <h4 class="panel-title">TERCEIRIZADO 1</h4>
       </a>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
         <div class="col-md-10">
            <br>
            <h3>PJ Bank</h3>
            <hr class="hr">
            <form>
              <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
               <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
               <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
            </form>

            <br>
              <h3>Gerencia Net</h3>
              <hr class="hr">
            <form method="POST" id="addPolo" enctype="multipart/form-data">

              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente ID:</label>
                <input type="text" class="form-control" name="client_id" required>
              </div>
             
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente Secret:</label>
                <input type="text" class="form-control" name="client_secret" required>
              </div>
            
              <div class="form-group">
                <label for="recipient-name" class="control-label">Identificador de Conta:</label>
                <input type="text" class="form-control" name="id_conta" required>
             </div>   
               <hr>  

              <div class="form-group">
              <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
              <button type="submit" class="btn btn-success"> Salvar </button>
              </div>
          </form>
        </div>        
      </div>
    </div>
  </div>

    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingT2">
      
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseT2" aria-expanded="false" aria-controls="collapseT2">
          <h4 class="panel-title">TERCEIRIZADO 2</h4></a>
    </div>
    <div id="collapseT2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingT2">
      <div class="panel-body">
         <div class="col-md-10">
            <br>
            <h3>PJ Bank</h3>
            <hr class="hr">
            <form>
              <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
               <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
               <div class="form-group">
                <label>Conta</label>
                <input type="texte" class="form-control" name="">
              </div>
            </form>

            <br>
              <h3>Gerencia Net</h3>
              <hr class="hr">
            <form method="POST" id="addPolo" enctype="multipart/form-data">

              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente ID:</label>
                <input type="text" class="form-control" name="client_id" required>
              </div>
             
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente Secret:</label>
                <input type="text" class="form-control" name="client_secret" required>
              </div>
            
              <div class="form-group">
                <label for="recipient-name" class="control-label">Identificador de Conta:</label>
                <input type="text" class="form-control" name="id_conta" required>
             </div>   
               <hr>  

              <div class="form-group">
              <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
              <button type="submit" class="btn btn-success"> Salvar </button>
              </div>
          </form>
        </div> 
      </div>
    </div>
  </div>
</div>
        </div>

 </div>
</div>
</div>
