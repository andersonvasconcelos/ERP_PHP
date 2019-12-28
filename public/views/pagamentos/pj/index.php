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
         <script type="text/javascript" src="<?=BASE_URL?>assets/bootstrap/js/script-marketplace.js"></script>

         <script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://api.gerencianet.com.br/v1/cdn/ec998b3a10b2c4b7b7faca936b2b8867/'+v;s.async=false;s.id='ec998b3a10b2c4b7b7faca936b2b8867';if(!document.getElementById('ec998b3a10b2c4b7b7faca936b2b8867')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script>



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
    
<form id="form" class="form" method="post">

<?php foreach($matriculas as $item){
    $tel = $this->telefone($item['telefone_aluno']);
    $data_vencimento = $this->dt(); 
    $valor = $item['valor_pacote'];?>

                    <div class="col-lg-10">
                        <h4><span class="bola">1</span> Informações do curso</h4>
                        <hr class="hr">

                        <div class="form-group col-md-7">
                            <label for="exampleInputEmail1">Curso: </label>
                            <input type="text" class="form-control" id="descricao" value="<?=$item['nome_pacote']?>" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Valor de (<em class="atributo"><?=$item['valor_total']?></em>) por:</label>
                            <input type="text" class="form-control" id="valor" value="<?=$valor?>" disabled>
                        </div>
                       
                         <div class="form-group col-lg-2">
                            <!--label for="exampleInputPassword1">Quantidade de itens: (<em class="atributo">amount</em>)</label-->
                            <select  required id="quantidade" class="form-control" disabled>
                                <?php for ($i = 1; $i < 20; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                    </div>
                    
                    <div class="col-lg-10">
                    	 <hr class="hr">
                        <h4><span class="bola">2</span> Informações do cliente</h4>
                <input type="hidden" name="id_aluno" id="id_aluno" value="<?=$item['numero_matricula']?>">

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nome do cliente: (<em class="atributo">nome</em>)</label>
                            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?=$item['nome_aluno']?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">CPF: (<em class="atributo">cpf</em>)</label>
                            <input type="text" class="form-control" id="cpf" name="cpf_cliente" value="<?=$item['cpf_aluno']?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Telefone: (<em class="atributo">celular  </em>)</label>
                            <input type="text" class="form-control" id="telefone" value="<?=$tel?>">
                        </div>

                         <div class="form-group col-lg-6">
                            <label for="exampleInputPassword1">Email: (<em class="atributo">email</em>)</label>
                            <input required type="text" class="form-control" id="email" value="<?=$item['email_aluno']?>">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">Data de nascimento: </label>
                            <input required type="text" class="form-control" id="nascimento" value="<?=$item['data_de_nascimento']?>">
                        </div>

                         <div class="form-group col-lg-3">
                            <label for="exampleInputPassword1">RG: </label>
                            <input required type="text" class="form-control" id="nascimento" value="<?=$item['rg_aluno']?>">
                        </div>


                    </div>

                                <div class="col-lg-10">
                         <hr class="hr">
                        <h4><span class="bola">3</span> Informação de endereço</h4>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Endereço</label>
                            <input type="text" class="form-control" id="rua" name="endereco_cliente" value="<?=$item['endereco_aluno']?>" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero_cliente" value="<?=$item['numero_aluno']?>" require>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro_cliente" value="<?=$item['bairro_aluno']?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Cidade: </label>
                            <input type="text" class="form-control" id="cidade" name="cidade_cliente" value="<?=$item['cidade_aluno']?>">
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Estado: </label>
                            <input type="text" class="form-control" id="estado" name="estado_cliente" value="<?=$item['estado_aluno']?>" >
                        </div>

                          <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">CEP: (<em class="atributo">13301510</em>)</label>
                            <input type="text" class="form-control" id="cep" name="cep_cliente"  value="<?=$item['cep']?>" >
                        </div>

                    </div>

                    <div class="col-md-10">
                    	<hr class="hr">
                        <h4><span class="bola">4</span> 
                        Informação de pagamento</h4>

                         <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Forma de Pagamento </label>
                            <select class="form-control" name="formaPgt">
                            	<option value="0">Escolha uma forma de pagamento</option>
                            	<!--option value="Boleto">Boleto </option-->
                            	<option value="Boleto entrada + parcelas">Carnê</option>
                            	<option value="cartao">Cartão de crédito</option>
                            	<!--option value="Dois Cartões de crédito">Dois Cartões de crédito</option>
                            	<option value="Boleto + Cartão">Boleto + Cartão</option-->
                            </select>
                        </div> 
                    </div>

 <div class="col-md-12">
 	<div class="boletoP" style="display: none">

        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Vencimento 1º Parcela (<em class="atributo">01-01-2019</em>)</label>
            <input type="text" class="form-control" id="" name="dt" value="<?=$data_vencimento?>">
        </div> 

	 	<div class="form-group col-md-3">

            <?php   $valor = (int) str_replace(".", "", $valor);
            $data = $data_vencimento;

            for ($i=0; $i < 12; $i++) {
            $p = $i +1; 
            $valor_parcela = $valor / $p;?>

                <label class="radio"> 
                <input type="radio" name="valorf" value="<?=$valor_parcela?>"><?=$i+1?>x <?php echo $valor_parcela; ?> 
                </label>

                <input type="hidden" class="form-control" value="00<?=$i+1?>" name="parcela[]">
                <input type="hidden" class="form-control" value="<?php echo $data;?>" name="nameval[]">

                    <?php // pegar a data e acrescentar mais um mês.
                    $data = new DateTime($data);
                    $data->modify('+1 month');
                    $data = $data->format('d-m-Y');

                     } ?>

	    </div> 

	    <div class="col-md-4">
            <button type="button" class="btn btn-success cnd">Gerar Boletos <img src="<?=BASE_URL?>assets/img/ok-mark.png"></button>
	    </div> 
    </div>


<div class="entradaP" style="display: none;">

     <form method="POST">

     	<label>Convênio</label>
     	<input type="radio" name="convenio" value="sim">Sim 
     	<input type="radio" name="convenio" value="nao" checked="">Não

     	<div class="emp_conv" style="display: none;">
	     	<div class="form-group col-md-12">
	            <label for="exampleInputEmail1">Empresa Convênio</label>
	            <input type="text" class="form-control" name="empresa_convenio">
	        </div>
     	</div>

        <h4>Parcelas</h4>

          <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Valor da entrada</label>
            <input type="text" class="form-control" name="valorEntrada">
        </div> 

        <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Quantidade de Parcelas </label>
            <input type="number" class="form-control" name="qtd" value="1" max="14" min="1">
        </div> 


        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Vencimento 1º Parcela (<em class="atributo">01-01-2019</em>)</label>
            <input type="text" class="form-control" id="" name="dt" value="<?=$data_vencimento?>">
        </div> 

        <div class="col-md-2">
        <button type="button" class="btn btn-success parcela">Parcelas</button>
        </div>

         <div class="col-md-3">
            <button type="button" class="btn btn-success bep" style="display: none;">Gerar Boletos <img src="<?=BASE_URL?>assets/img/ok-mark.png"></button>
        </div>
    </form>

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
	           
</div>

<div class="cartao" style="display: none;">

     <div class="form-group col-lg-4">
                <label for="exampleInputPassword1">Número do cartão: (<em class="atributo">number</em>)</label>
                 <input required type="text" class="form-control" id="numero_cartao" placeholder="Número do cartão">
    </div>
                            <div class="form-group col-lg-2">
                                <label for="exampleInputPassword1">Bandeira: (<em class="atributo">brand</em>)</label>
                                <select required id="bandeira" class="form-control" >
                                    <option value="visa">Visa</option>
                                    <option value="mastercard">MasterCard</option>
                                    <option value="elo">Elo</option>
                                    <option value="diners">Diners</option>
                                    <option value="amex">Amex</option>
                                    <option value="hipercard">Hipercard</option>
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
                                    <?php for($i=2015;$i<=2030;$i++):?>
                                        <option><?=$i?></option>
                                    <?php endfor;?>
                                </select>
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
        <!--div responsável por exibir o resultado da emissão do boleto-->
          
</form>
</div> <!-- FIM CONATAINER WELL-->
   

</body>
</html>

<?php require_once 'modal.php'?>


