<h2><?=$pagina?></h2>
	<hr>
<a href="<?=BASE_URL?>pagamentos/gerarCarneIugu/<?=$ra?>" target="_BLANK" class="btn btn-sm btn-success">Gerar Carne</a>

<hr>
<?php if(!empty($boletos)){?>
<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Vencimento</th>
	<th>Valor</th>
	<th>Parcela</th>
	<th>Status</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
					<?php foreach ($boletos as $b) { 

						  $token = json_decode($b->iugu);
						  $token = $token->live_api_token;
						  $id = $b->id_fatura;
						  $iugu = $this->getFatura($id, $token); 
					?>

		<tr>
			<td><?=$b->ra?></td>
			<td><?=date("d/m/Y", strtotime($b->vencimento))?></td>
			<td>R$ <?=$b->valor?></td>
			<td><?=$b->parcela?></td>
			<td><?=$this->getFaturaStatus($iugu['status'])?></td>
			<td>
				

				<a href="<?=$b->boleto?>" target="_BLANK" class="ico"  data-toggle="tooltip" data-placement="top" title="Imprimir Boleto">
				<img src="<?=URL_IMG?>boleto-icone.png" class="ico">
				</a>

				<?php if($this->hasPermisson('aba-gateway-de-pagamento')):?>

				<a href="" class="ico btn-cancelar" data-id="<?=$b->id_fatura?>" data-token="<?=$token?>"  data-toggle="tooltip" data-placement="top" title="Cancelar Fatura">
				<img src="<?=URL_IMG?>Metrosecuritydenied_metr_11317.png" class="ico">
				</a>

				<?php if ($iugu['status'] == 'canceled') {?>
					<a href="" class="ico btn-del-canceled" data-id="<?=$id?>"  data-toggle="tooltip" data-placement="top" title="Deletar Fatura">
					<i class="btn btn-sm btn-warning fa fa-trash"></i>
					</a> 
				<?php }; ?>


				<?php endif; ?>

			</td>
			
		</tr>
	<?php } ?>
	
	</tbody>
	   <tfoot>
            <tr>
               <th>#</th>
			  	<th>Nome</th>
				<th>Polo</th>
				<th>Parcela</th>
				<th>Status</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>
<?php } ?>

<?php require_once 'modal.php'?>
