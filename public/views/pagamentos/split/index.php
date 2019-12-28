<?php error_reporting(0);?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" href="<?=BASE_URL?>assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/bootstrap/css/style.css">
        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/bootstrap.js"></script>

        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/jquery.mask.js"></script>

        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/script-marketplace.js"></script>
        
         <script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/768fd9442e6f5451135f6a3c9b992505/'+v;s.async=false;s.id='768fd9442e6f5451135f6a3c9b992505';if(!document.getElementById('768fd9442e6f5451135f6a3c9b992505')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script>
        <title> </title>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=BASE_URL?>">
                        <img src="<?=BASE_URL?>assets/img/polos/CGD JC/logo.png" width="198" >
                    </a>
                </div>

                 <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   
                    </ul>

                    <ul class="nav navbar-nav pull-right">
                  
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

			
        
<?php foreach($matriculas as $item){
$tel = $this->telefone($item['telefone_aluno']);
$end = $this->endereco($item['endereco_aluno']);
?>
        <div class="container">
            <div class="col-md-12 well">
                <form id="form" method="POST" action="" class="">
                         
                         <div class="col-md-12">
                                
                        <h5>Informações do produto/serviço</h5>
                        <hr class="hr"> </div>
                        <div class="form-group col-lg-5">
                            <label for="exampleInputEmail1">Descrição do produto/serviço: (<em class="atributo">name</em>)</label>
                            <input required type="text" class="form-control" id="descricao" value="<?=$item['nome_curso']?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="exampleInputPassword1">Valor do produto/serviço: (<em class="atributo">value</em>)</label>
                            <input required type="text" class="form-control" id="valor" value="<?=$item['valor']?>">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Quantidade de itens: (<em class="atributo">amount</em>)</label>
                            <select  required id="quantidade" class="form-control">
                                <?php for ($i = 1; $i < 20; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                     <div class="col-md-12">
                                <hr class="hr"> 
                        <h5>Informações do cliente</h5>
                    </div>
                        <div class="form-group col-lg-3">
                            <label for="exampleInputEmail1">Nome do cliente: (<em class="atributo">name</em>)</label>
                            <input required type="text" class="form-control" id="nome_cliente" value="<?=$item['nome_aluno']?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="exampleInputPassword1">CPF: (<em class="atributo">cpf</em>)</label>
                            <input required type="text" class="form-control" id="cpf" value="<?=$item['cpf_aluno']?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="exampleInputPassword1">Telefone</label>
                            <input required type="text" class="form-control" id="telefone" value="<?=$tel?>">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Email: (<em class="atributo">email</em>)</label>
                            <input required type="text" class="form-control" id="email" value="<?=$item['email_aluno']?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="exampleInputPassword1">Data de nascimento: </label>
                            <input required type="text" class="form-control" id="nascimento" value="<?=$item['data_de_nascimento']?>">
                        </div>
                        <div class="col-md-12">
                                <hr class="hr"> 
                        <h5>Informação de endereço</h5></div>

                        <div class="form-group col-lg-4">
                            <label for="exampleInputEmail1">Rua: (<em class="atributo">street</em>)</label>
                            <input required type="text" class="form-control" id="rua" value="<?=$end[0]?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="exampleInputPassword1">Número: (<em class="atributo">number</em>)</label>
                            <input required type="text" class="form-control" id="numero" placeholder="Número" value="<?=$end[1]?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="exampleInputPassword1">Bairro: (<em class="atributo">neighborhood</em>)</label>
                            <input required type="text" class="form-control" id="bairro" value="<?=$item['bairro_aluno']?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="exampleInputPassword1">CEP: (<em class="atributo">zipcode</em>)</label>
                            <input required type="text" class="form-control" id="cep" value="<?=$item['cep']?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="exampleInputPassword1">Cidade: (<em class="atributo">city</em>)</label>
                            <input required type="text" class="form-control" id="cidade" value="<?=$item['cidade_aluno']?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="exampleInputPassword1">Estado: (<em class="atributo">state</em>)</label>
                            <input required type="text" class="form-control" id="estado" value="<?=$item['estado_aluno']?>">
                        </div>
                            <div class="col-md-12">
                                <hr class="hr"> 
                          <h5>Informações de pagamento</h5></div>
                        
                            <div class="form-group col-lg-4">
                                <label for="exampleInputPassword1">Número do cartão: (<em class="atributo">number</em>)</label>
                                <input required type="text" class="form-control" id="numero_cartao" placeholder="Número do cartão">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Bandeira: (<em class="atributo">brand</em>)</label>
                                <select required id="bandeira" class="form-control" >
                                    <option value="visa">Visa</option>
                                    <option value="mastercard">MasterCard</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Código: (<em class="atributo">cvv</em>)</label>
                                 <input required type="text" class="form-control" id="codigo_seguranca" placeholder="Código de segurança">
                            </div>
                      
                        
                             <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Mês de vencimento:</label>
                                <select required id="mes_vencimento" class="form-control" >
                                    <?php for($i=1;$i<=12;$i++):?>
                                        <option><?=$i?></option>
                                    <?php endfor;?>
                                </select>
                            </div>
                             <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Ano de vencimento:</label>
                                <select required id="ano_vencimento" class="form-control" >
                                    <?php for($i=2015;$i<=2025;$i++):?>
                                        <option><?=$i?></option>
                                    <?php endfor;?>
                                </select>
                            </div>
                            </form>
                      </div>

                        <div id="div_installments" class="form-group alert alert-success">
                                 <label for="exampleInputPassword1">Número de parcelas: (<em style="color: white" class="atributo">installments</em>) <br> <strong style="color:white" class="ex">Ex: 1 (int) </strong></label>
                                <select required style="color: black" id="installments" class="form-control" >
                                    <option>Selecione uma opção</option>
                                </select>
                            </div>
                 
                    <div class="col-md-12">
                        <button id="ver_parcelas" type="button" class="btn btn-default"> Definir número de parcelas <img src="<?=BASE_URL?>assets/img/next.png"></button>
                        <button id="btn_pg_cartao" type="button" class="btn btn-success hide"> Confirmar pagamento <img src="<?=BASE_URL?>assets/img/ok-mark.png"></button>
                    </div>

    
     </div>   

<?php } ?>

    <!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Aguarde um momento.</h4>
                </div>
                <div class="modal-body">
                    Estamos processando a requisição <img src="<?=BASE_URL?>assets/img/ajax-loader.gif">.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Fechar</button>
                </div>
            </div>
        </div>
    </div>

	<!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
    <div class="modal fade" id="myModalResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">Retorno de um pagamento com cartão, enviando apenas os dados obrigatórios .</h4>
                </div>
                <div class="modal-body">

        <!--div responsável por exibir o resultado da emissão do boleto-->
        <div id="boleto" class="hide">
            <div class="panel panel-success">
                <div id="" class="panel-body">
                    <table class="table">
                       <caption></caption>
                        <thead>
                            <tr>
                                <th>ID da transação(<em>charge_id</em>)</th>
                                <th>N° de parcelas (<em>installments</em>)</th>
                                <th>Valor da parcela (<em>installment_value</em>)</th>
                                <th>Status (<em>status</em>)</th>
                                <th>Total (<em>total</em>)</th>
                                <th>Método de pagamento (<em>payment</em>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="result_table">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>