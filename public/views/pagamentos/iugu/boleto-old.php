<?php date_default_timezone_set( 'America/Sao_Paulo' ); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?=BASE_URL?>assets/bootstrap/css/style.css">
        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/bootstrap.js"></script>

        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/jquery.mask.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/scripts.js"></script>
       
        <script type="text/javascript" src="https://js.iugu.com/v2"></script>
        <script type="text/javascript" src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/formatter.6641df236f87bc55a536292d8565c870.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <title></title>
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
                    <ul class="nav navbar-nav"></ul>
                    <ul class="nav navbar-nav pull-right"></ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

<div class="container well">
    
<form action="<?=BASE_URL?>pagamentos/iuguFatura" method="post">

<?php foreach($matriculas as $item){
    $tel = $this->telefone($item['telefone_aluno']);
    $data_vencimento = $this->dt(); 
    $valor = $item['valor_pacote'];?>

         <div class="col-md-10">
                        <hr class="hr">
                        <h4><span class="bola">1</span> 
                        Escolha uma forma de pagamento</h4>

                         <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Forma de Pagamento </label>
                            <select class="form-control" name="formaPgt">
                                <option value="0">Selecione</option>
                                <!--option value="Boleto">Boleto </option-->
                                <option value="Boleto entrada + parcelas">Boleto</option>
                                <option value="cartao">Cartão de crédito</option>
                                <!--option value="Dois Cartões de crédito">Dois Cartões de crédito</option>
                                <option value="Boleto + Cartão">Boleto + Cartão</option-->
                            </select>
                        </div> 
                    </div>      

<div class="entradaP" style="display: none">

                    <div class="col-lg-10">
                        <h4><span class="bola">2</span> Informações do curso</h4>
                        <hr class="hr">

                        <div class="form-group col-md-7">
                            <label for="exampleInputEmail1">Curso: </label>
                            <input type="text" class="form-control" name="description" value="<?=$item['nome_pacote']?>" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Valor : (<em class="atributo">1000.98</em>)</label>
                            <input type="text" class="form-control" name="price_cents" value="<?=$valor?>" readonly>
                        </div>
                       
                         <div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Quantidade de itens: (<em class="atributo">amount</em>)</label>
                            <select  required name="quantity" class="form-control" disabled>
                                <?php for ($i = 1; $i < 20; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                    </div>
                    
                    <div class="col-lg-10">
                    	 <hr class="hr">
                        <h4><span class="bola">3</span> Informações do cliente</h4>
                <input type="hidden" name="id_aluno" id="id_aluno" value="<?=$item['numero_matricula']?>">

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nome do cliente: (<em class="atributo">nome</em>)</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?=$item['nome_aluno']?>">
                        </div>

                           <div class="form-group col-lg-6">
                            <label for="exampleInputPassword1">Email: (<em class="atributo">email</em>)</label>
                            <input required type="text" class="form-control" name="email" value="<?=$item['email_aluno']?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">CPF: (<em class="atributo">cpf</em>)</label>
                            <input type="text" class="form-control" id="cpf" name="cpf_cnpj" value="<?=$item['cpf_aluno']?>">
                        </div>

                          <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Prefixo: (<em class="atributo">67  </em>)</label>
                            <input type="text" class="form-control" name="phone_prefix" value="<?=substr($tel, 0, 2);?>">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Telefone: (<em class="atributo">celular  </em>)</label>
                            <input type="text" class="form-control" name="phone" value="<?=substr($tel, 2);?>">
                        </div>

                      

                        <!--div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Data de vencimento: </label>
                            <input required type="text" class="form-control" name="due_date">
                        </div-->

                    </div>

                    <div class="col-lg-10">
                         <hr class="hr">
                        <h4><span class="bola">4</span> Informação de endereço</h4>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Endereço</label>
                            <input type="text" class="form-control" id="rua" name="street" value="<?=$item['endereco_aluno']?>" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Número</label>
                            <input type="text" class="form-control" id="numero" name="number" value="<?=$item['numero_aluno']?>" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro_c" value="<?=$item['bairro_aluno']?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Cidade: </label>
                            <input type="text" class="form-control" id="cidade" name="city" value="<?=$item['cidade_aluno']?>">
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Estado: </label>
                            <input type="text" class="form-control" id="estado" name="state" value="<?=$item['estado_aluno']?>" >
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">CEP: (<em class="atributo">13301510</em>)</label>
                            <input type="text" class="form-control" id="cep" name="zip_code"  value="<?=$item['cep']?>" >
                        </div>

                    </div> 

              <div class="col-lg-10">
                         <hr class="hr">
                        <h4><span class="bola">5</span> Informação de Desconto</h4>
                        <div class="form-group col-md-12">
                            <select name="campanha" class="form-control cp" required="">
                                <option>Clique e selecione o desconto</option>
                                <option value="3100">Pontualidade</option>
                                <option value="4200">Convênio Empresa</option>
                                <option value="6000">Campanha Rebeca 30%</option>
                                <option value="0001">Area do Conhecimento</option>
                            <?php foreach($cp as $c){?>
                                <option value="<?=$c->desconto?>"><?=$c->nome_cp?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <!--div class="form-group col-md-3">
                            <label>Convênio</label>
                            <input type="radio" name="convenio" value="sim">Sim 
                            <input type="radio" name="convenio" value="nao" checked="">Não
                        </div-->

                        <div class="emp_conv" style="display: none;">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Observação</label>
                                <input type="text" class="form-control" name="empresa_convenio" required="">
                            </div>
                        </div>

            
                    </div>                        


    <div class="col-md-12">
        <hr class="hr">
    <h4><span class="bola">6</span> Finalizar</h4>

        <h4>Parcelas</h4>

          <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Valor da entrada</label>
            <input type="text" class="form-control" name="valorEntrada">
            <input type="hidden" class="form-control" name="price_cents" value="<?=$valor?>">
         </div> 

        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Quantidade de Parcelas </label>
            <input type="number" class="form-control" name="qtd" value="1" max="14" min="1">
        </div> 


        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Vencimento 1º Parcela (<em class="atributo">01-01-2019</em>)</label>
            <input type="text" class="form-control" id="" name="dt" value="<?=$data_vencimento?>">
        </div> 

           <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Data Vencimento(<em class="atributo">05/10/15/20/25</em>)</label>

            <select class="form-control" name="dia_vencimento">
                <option value="05">05</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>
            
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-success parcelas">Parcelas</button>
        </div>
   </div>
    <div class="col-lg-12">
        <table id="table" class="table table-striped table-bordered" style="display: none;">
            <tr>
                <th>Parcela</th>
                <th>Data Vencimento</th>
                <th>Valor</th>
            </tr>
            <tbody>
                
            </tbody>
            <tfoot style="display: none;">
               
            </tfoot>
        </table>
    </div>
     <div class="col-md-4">
        <button type="submit" class="btn btn-success">Gerar Boletos <img src="<?=BASE_URL?>assets/img/ok-mark.png"></button>
     </div> 
        </form>
</div>

<div class="cartao" style="display: none;">
        <form id="payment-form" action="<?=BASE_URL?>iugu/token" target="_blank" method="POST">
     <div class="col-lg-10">
                        <h4><span class="bola">2</span> Informações do curso</h4>
                        <hr class="hr">

                        <div class="form-group col-md-7">
                            <label for="exampleInputEmail1">Curso: </label>
                            <input type="text" class="form-control" name="description" value="<?=$item['nome_pacote']?>" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Valor : (<em class="atributo">1000.98</em>)</label>
                            <input type="text" class="form-control" name="price_cents" value="<?=$valor?>">
                        </div>
                       
                         <div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Quantidade de itens: (<em class="atributo">amount</em>)</label>
                            <select  required name="quantity" class="form-control" disabled>
                                <?php for ($i = 1; $i < 20; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                    </div>
                    
                    <div class="col-lg-10">
                         <hr class="hr">
                        <h4><span class="bola">3</span> Informações do cliente</h4>
                <input type="hidden" name="id_aluno" id="id_aluno" value="<?=$item['numero_matricula']?>">

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nome do cliente: (<em class="atributo">nome</em>)</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?=$item['nome_aluno']?>">
                        </div>

                           <div class="form-group col-lg-6">
                            <label for="exampleInputPassword1">Email: (<em class="atributo">email</em>)</label>
                            <input required type="text" class="form-control" name="email" value="<?=$item['email_aluno']?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">CPF: (<em class="atributo">cpf</em>)</label>
                            <input type="text" class="form-control" id="cpf" name="cpf_cnpj" value="<?=$item['cpf_aluno']?>">
                        </div>

                          <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Prefixo: (<em class="atributo">67  </em>)</label>
                            <input type="text" class="form-control" name="phone_prefix" value="<?=substr($tel, 0, 2);?>">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="exampleInputPassword1">Telefone: (<em class="atributo">celular  </em>)</label>
                            <input type="text" class="form-control" name="phone" value="<?=substr($tel, 2);?>">
                        </div>

                      

                        <!--div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Data de vencimento: </label>
                            <input required type="text" class="form-control" name="due_date">
                        </div-->

                    </div>

                    <div class="col-lg-10">
                         <hr class="hr">
                        <h4><span class="bola">4</span> Informação de endereço</h4>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Endereço</label>
                            <input type="text" class="form-control" id="rua" name="street" value="<?=$item['endereco_aluno']?>" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Número</label>
                            <input type="text" class="form-control" id="numero" name="number" value="<?=$item['numero_aluno']?>" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro_cliente" value="<?=$item['bairro_aluno']?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Cidade: </label>
                            <input type="text" class="form-control" id="cidade" name="city" value="<?=$item['cidade_aluno']?>">
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Estado: </label>
                            <input type="text" class="form-control" id="estado" name="state" value="<?=$item['estado_aluno']?>" >
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">CEP: (<em class="atributo">13301510</em>)</label>
                            <input type="text" class="form-control" id="cep" name="zip_code"  value="<?=$item['cep']?>" >
                        </div>

                    </div> 


   <div class="col-md-12">
     <hr class="hr">
                        <h4><span class="bola">5</span> Finalizar</h4> 
    <div class="usable-creditcard-form">
               <div class="col-md-6">
            <table>
<tbody>
<tr>
    <td><label>Total R$</label></td>
    <td><input type="text" class="total" name="valorP" value="<?=$valor?>" /></td>
</tr>
<tr name="condicao-pag" id="condicao-pag">
    <td><label>Condição de pagamento:</label></td>
    <td>
        <select class="form-control" />
            <option value=0>À vista</option>
            <option value=1>À prazo</option>
        </select>
    </td>
</tr>
<tr id="parcelamento" style="display:none"> 
    <td>Parcelar em</td>
    <td>
        <select id="n-parcelas" name="qtd_p" class="form-control">
            <option></option>
            <option value="2" selected>2x</option>
            <option value="3">3x</option>
            <option value="4">4x</option>
            <option value="5">5x</option>
            <option value="6">6x</option>
            <option value="7">7x</option>
            <option value="8">8x</option>
            <option value="9">9x</option>
            <option value="10">10x</option>
            <option value="11">11x</option>
            <option value="12">12x</option>
        </select>
    </td>
</tr>

<tr id="parcelas" style="display:none">
<td>Valor das Parcelas</td>
  
</tr>
</tbody>
</table>
        </div>
      <div class="wrapper">
        <div class="input-group nmb_a">
          <div class="icon ccic-brand"></div>
            <input autocomplete="off" class="credit_card_number" data-iugu="number" placeholder="Número do Cartão" type="text" value="" />
          </div>
        <div class="input-group nmb_b">
          <div class="icon ccic-cvv"></div>
            <input autocomplete="off" class="credit_card_cvv" data-iugu="verification_value" placeholder="CVV" type="text" value="" />
        </div>
        <div class="input-group nmb_c">
          <div class="icon ccic-name"></div>
            <input class="credit_card_name" data-iugu="full_name" placeholder="Titular do Cartão" type="text" value="" />
        </div>
        <div class="input-group nmb_d">
          <div class="icon ccic-exp"></div>
            <input autocomplete="off" class="credit_card_expiration" data-iugu="expiration" placeholder="MM/AA" type="text" value="" />
        </div>
      </div>
      <div class="footer">
        <img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/cc-icons.e8f4c6b4db3cc0869fa93ad535acbfe7.png" alt="Visa, Master, Diners. Amex" border="0" />
        <a class="iugu-btn" href="http://iugu.com" tabindex="-1"><img src="http://storage.pupui.com.br/9CA0F40E971643D1B7C8DE46BBC18396/assets/payments-by-iugu.1df7caaf6958f1b5774579fa807b5e7f.png" alt="Pagamentos por Iugu" border="0" /></a>
      </div>
    </div>

    <div class="token-area">
        <input type="text" name="token" id="token" value="" readonly="true" size="64" style="text-align:center" />
        <input type="hidden" name="id_aluno" id="id_aluno" value="<?=$item['numero_matricula']?>">
        <input type="hidden" id="name" name="name" value="<?=$item['nome_aluno']?>">
        <input type="hidden" name="email" value="<?=$item['email_aluno']?>">
        <input type="hidden" id="count_id" value="<?=$acount_id?>">
    </div>
       
    <div>
        <button type="submit" class="btn btn-success">Finalizar Pagamento<img src="<?=BASE_URL?>assets/img/ok-mark.png"></button>
    </div>
     </div> 
  </form>
    

    </div>


<?php } ?>
        <!--div responsável por exibir o resultado da emissão do boleto-->
          
</div> <!-- FIM CONATAINER WELL-->
   

<script type="text/javascript">
var count_id = $('#count_id').val();

Iugu.setAccountID(count_id);
//Iugu.setTestMode(true);

jQuery(function($) {
  $('#payment-form').submit(function(evt) {
    evt.preventDefault();
      var form = $(this);
      var tokenResponseHandler = function(data) {
          
          if (data.errors) {
              console.log(data.errors);
              alert("Erro salvando cartão: " + JSON.stringify(data.errors));
          } else {
              $("#token").val( data.id );
              form.get(0).submit();
          }
          
          // Seu código para continuar a submissão
          // Ex: form.submit();
      }
      
      Iugu.createPaymentToken(this, tokenResponseHandler);
      return false;
  });
});
</script>
</body>
</html>

<?php require_once 'modal.php'?>


