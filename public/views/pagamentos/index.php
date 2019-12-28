
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
                <h4 class="panel-title">PJ BANK</h4>
              </a>
            </div>
            <div id="collapseMatriz" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <div class="col-md-12">
                <br>
                <?php if (!empty($contas)) {?>
                  <div class="form-group col-md-6">
                    <label>Credencial</label>
                    <input type="text" disabled="" class="form-control" value="<?=$contas['credencial']?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Chave</label>
                    <input type="text" disabled="" class="form-control" value="<?=$contas['chave']?>">
                  </div>
                  <?php  } else{?>
                <form id="addCpj">
                  <div class="form-group col-md-8">
                    <label>Nome</label>
                    <input type="text" placeholder="Razão social da empresa" class="form-control" name="nome_empresa" id="nome">
                  </div>
                  <div class="form-group col-md-4">
                    <label>CNPJ</label>
                    <input type="text" class="form-control" name="cnpjs">
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
                    <select name="banco_repasse" id="banco_repasse" quebradelinha="1" placeholder="Selecione um banco" class="form-control">
                      <option value=""selected="selected">Selecione um Banco</option>

                      <?php foreach ($bancos as $banco) {?>
                        <option value="<?=$banco['cod_banco']?>"><?=utf8_encode($banco['nome_banco'])?></option>
                      <?php  } ?>
                    </select>
                    <input type="text" class="form-control" name="banco_repasse">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Agência</label>
                    <input type="text" class="form-control" name="agencia_repasse">
                  </div>
                  <div class="form-group col-md-4">
                    <label>conta</label>
                    <input type="text" class="form-control" name="conta_repasse">
                  </div>
                  <div class="form-group col-md-12">
                    <hr class="hr">
                    <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
                    <button type="submit" class="btn btn-success"> Salvar </button>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h4 class="panel-title">GERENCIA NET</h4>
            </a>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <div class="col-md-10">
                <form method="POST" id="addGeN">
                  <div class="form-group">
                    <label class="control-label">Cliente ID:</label>
                    <input type="text" class="form-control" name="client_id" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Cliente Secret:</label>
                    <input type="text" class="form-control" name="client_secret" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Identificador de Conta:</label>
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
