 <table id="tb" class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Aluno</th>
        <th>Valor</th>
        <th>Vencimento</th>
        <th>Pagamento</th>
        <th>Registrado</th>
        <th>Situacao</th>
        <th>Ações</th>

      </tr>
    </thead>
    <tbody>

<?php
foreach ($ids as $id) {

	$resp = $this->getBoletosPj($id['id_unico']);


	foreach ($resp as $r): ?>

	    <tr>
	        
	      <td><?=$r->id_unico?>
	      	
	      </td>
	      <td><?=$r->pagador?></td>    
	      <td><strong>R$<?=$r->valor?>,00</strong></td>
	      <td><?php echo $this->formatData($r->data_vencimento)?></td>
	      <td><?php echo $this->formatData($r->data_pagamento)?></td>
	      <td><span class="text-info"><?=$r->registro_sistema_bancario?></span></td>

	        <?php $this->verificarPago($r->data_pagamento) ?>

	       <?php if($this->hasPermisson('aba-gateway-de-pagamento')):?>

	        <td>
	        	<a class="deletarBoleto" data-id="<?=$r->pedido_numero?>" data-toggle="tooltip" data-placement="top" title="Invalidar Boleto">
				<img src="<?=URL_IMG?>Metrosecuritydenied_metr_11317.png" class="ico"></a>
   			</td>

   		<?php endif; ?>
   		
	    </tr>
 <?php endforeach ?>	
 <?php } ?>         
	  </tbody>
	  <tfoot>
	  	<tr>
        <th>#</th>
        <th>Aluno</th>
        <th>Valor</th>
        <th>Vencimento</th>
        <th>Pagamento</th>
        <th>Registrado</th>
        <th>Situacao</th>
        <th>Ações</th>

      </tr>
	  </tfoot>
	</table>

