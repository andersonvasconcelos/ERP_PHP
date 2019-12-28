<h2><?=$pagina?></h2>
<hr>
  <div class="rradio">
    <div class="interna">
      <div class="row">
        <form method="POST" id="gerarBoletoIugu" enctype="multipart/form-data" autocomplete="off">    
            <div class="col-lg-12">
                       <hr class="hr">
                        <h4> Informações do cliente</h4>
                        <input type="hidden" name="id_aluno" id="id_aluno">
                        <div class="form-group col-md-4">
                <label class="control-label">* CPF:</label> 
                <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
                        <div class="form-group col-md-8">
                            <label for="exampleInputEmail1">Nome do cliente: (<em class="atributo">nome</em>)</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Email: (<em class="atributo">email</em>)</label>
                            <input type="text" class="form-control" name="email" id="email" autocomplete="off" >
                        </div>

                          <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Prefixo: (<em class="atributo">67  </em>)</label>
                            <input type="text" class="form-control" name="phone_prefix" id="fixo">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="exampleInputPassword1">Telefone: (<em class="atributo">celular  </em>)</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>

                      

                        <!--div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Data de vencimento: </label>
                            <input required type="text" class="form-control" name="due_date">
                        </div-->

                    </div>

                    <div class="col-lg-12">
                         <hr class="hr">
                        <h4> Informação de endereço</h4>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Endereço</label>
                            <input type="text" class="form-control" id="rua" name="street" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Número</label>
                            <input type="text" class="form-control" id="numero" name="number" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro_cliente">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Cidade: </label>
                            <input type="text" class="form-control" id="cidade" name="city">
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Estado: </label>
                            <input type="text" class="form-control" id="estado" name="state" >
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">CEP: (<em class="atributo">13301512</em>)</label>
                            <input type="text" class="form-control" id="cep" name="zip_code">
                        </div>

                    </div>      
                          <div class="col-lg-12">
                         <hr class="hr">
                         
                         <?php if (!empty($servicos)): ?>

                        <h4> Informação do serviço</h4>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Serviço</label>
                          <select class="form-control" name="description">
                            <option>Selecione</option>
                            <?php foreach ($servicos as $s) {?>
                              <option value="<?=$s->nome_servico?>"><?=$s->nome_servico?> - <?=$s->valor_servico?></option>
                            <?php } ?>
                          </select>
                        </div>  
                        <?php endif ?> 
                        <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">Valor</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="10,00">
                        </div>
                         <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Data de Vencimento</label>
                            <input type="date" class="form-control" name="due_date">
                        </div>  
                    </div>           
            <div class="col-md-12">
              <hr>
              <div class="form-group">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
                <button type="submit" class="btn btn-success"> Gerar Fatura </button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  
   <div class="modal fade" id="myModalResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Retorno da emissão do Carnê.</h4>
                </div>
                <div class="modal-body">
                   
        <!--div responsável por exibir o resultado da emissão do boleto-->
       
            <div class="panel panel-success">
                <div class="panel-body">
                    <table id="carne" class="table table-bordered">
                        <tr>
                        
                        </tr>
                    </table>
                        
            </div>            
        </div>  
               
            </div>
        </div>
    </div>
</div>