<?php if(!empty($saldo)){ 
    $comissao = $this->getComissao($saldo->volume_this_month); ?>
    
		<h2><?=$pagina?> : <?=$saldo->name?></h2>
	<hr>
	<hr>		
	                 <div class="row" >
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Saldo Atual
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$saldo->receivable_balance?>
                                    <span id="sparklineA"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading green">
                                   <i class="fa fa-cart-plus fa-3x" aria-hidden="true"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Transações Mensais
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$saldo->volume_this_month?>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading orange">
                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content orange">
                                <div class="circle-tile-description text-faded">
                                    A Receber
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$saldo->receivable_balance?>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-tasks fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    A Pagar
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$saldo->payable_balance?>
                                    <span id="sparklineB"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Comisão
                                </div>
                                <div class="circle-tile-number text-faded">
                                 R$ <?=$comissao?>

                                    <span id="sparklineC"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading purple">
                                    <i class="fa fa-comments fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content purple">
                                <div class="circle-tile-description text-faded">
                                   Para Saque
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$saldo->balance?>
                                    <span id="sparklineD"></span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                               	
           <div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
      
            <main>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIÇÃO</th>
                            <th class="text-right">VALOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left">
                            	<h3> Saldo do mês atual</h3>
                               	valor total de todas as transações realizadas no mês atual.
                            </td>
                            <td class="unit"><?=$saldo->volume_this_month?></td>
                        </tr>
                          <tr>
                            <td class="no">02</td>
                            <td class="text-left">
                            	<h3> Saldo do mês anterior</h3>
                               	valor total de todas as transações realizadas no mês anterior.
                            </td>
                            <td class="unit"><?=$saldo->volume_last_month?></td>
                        </tr>
                          <tr>
                            <td class="no">03</td>
                            <td class="text-left">
                            	<h3> Valor a receber</h3>
                               	valor total a receber no mês atual.
                            </td>
                            <td class="unit"><?=$saldo->receivable_balance?></td>
                        </tr>
                          <tr>
                            <td class="no">04</td>
                            <td class="text-left">
                            	<h3> Valor a pagar</h3>
                               	valor total a pagar no mês atual.
                            </td>
                            <td class="unit"><?=$saldo->payable_balance?></td>
                        </tr>
                          <tr>
                            <td class="no">05</td>
                            <td class="text-left">
                            	<h3> Taxas pagas no mês atual</h3>
                               	valor total de todas as taxas pagas no mês atual.
                            </td>
                            <td class="unit"><?=$saldo->taxes_paid_this_month?></td>
                        </tr>
                          <tr>
                            <td class="no">06</td>
                            <td class="text-left">
                            	<h3> Taxas pagas no mês anterior</h3>
                               	valor total de todas as taxas pagas no mês anterior.
                            </td>
                            <td class="unit"><?=$saldo->taxes_paid_last_month?></td>
                        </tr>
                          <tr>
                            <td class="no">07</td>
                            <td class="text-left">
                            	<h3> Disponível para saque</h3>
                               	valor total disponivel para sacar.
                            </td>
                            <td class="unit"><?=$saldo->balance_available_for_withdraw?></td>
                        </tr>
                        <tr>
                            <td class="no">08</td>
                            <td class="text-left">
                            	<h3> Valor sacado</h3>
                               	valor que foi solicitado para saque.
                            </td>
                            <td class="unit"><?=$saldo->protected_balance?></td>
                        </tr>
                        <tr>
                            <td class="no">09</td>
                            <td class="text-left">
                            	<h3> Pedido de saque</h3>
                               	valor do último saque realizado.
                            </td>
                            <td class="unit">R$ <?=$saldo->last_withdraw->amount?></td>
                        </tr>
                          <tr>
                            <td class="no">10</td>
                            <td class="text-left">
                            	<h3> Comissões pagas</h3>
                               	valor total pago de comissão para a matriz.
                            </td>
                            <td class="unit">R$ <?=$comissao?></td>
                        </tr>
                       
                    </tbody>
  
                </table>
          <input type="button" class="btn btn-danger" value="Voltar" onClick="history.go(-1)"> 
            </main>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div> 
					
<?php } ?>

