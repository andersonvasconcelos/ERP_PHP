 <h2><?=$pagina?></h2>
	<hr>

	
<!--div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>">Exportar</a>
</div-->
<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Pago</th>
	<th>Taxa</th>
	<th>Liquido</th>
	<th>Vencimento</th>
	<th>Pagamento</th>
	<th>Credito</th>
	<th>Parcela</th>

</tr></thead>
	<tbody>
		<?php foreach($pagamentos as $item){?>
		<tr>
			<td><?=$item->id_unico?></td>
			<td><?=$item->pagador?></td>
			<td><?=$item->valor_pago?></td>
			<td><?=$item->valor_tarifa?></td>
			<td><?=$item->valor_liquido?></td>
			<td><?php echo date("d/m/Y", strtotime($item->data_vencimento))?></td>
			<td><?php echo date("d/m/Y", strtotime($item->data_pagamento))?></td>
			<td><?php echo date("d/m/Y", strtotime($item->data_credito))?></td>
			<td><?=substr($item->pedido_numero, -1);?></td>
		
		</tr>
	<?php     

	$total_recebido += $item->valor_pago;
	$total_tarifa += $item->valor_tarifa;
	$total_liquido += $item->valor_liquido;

}?>
	</tbody>
	   <tfoot>
        		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Pago</th>
	<th>Taxa</th>
	<th>Liquido</th>
	<th>Vencimento</th>
	<th>Pagamento</th>
	<th>Credito</th>
	<th>Parcela</th>

</tr>
        </tfoot>
</table>
<br>
<table class="table table-bordered">
	<tr>
		<th>Total Recebido</th>
		<th>Total Tarifa</th>
		<th>Total Liquido</th>
	</tr>
	<tr>
		<td>R$<?=$total_recebido?></td>
		<td>R$<?=$total_tarifa?></td>
		<td>R$<?=$total_liquido?></td>
	</tr>
</table>
<script type="text/javascript">
	
</script>