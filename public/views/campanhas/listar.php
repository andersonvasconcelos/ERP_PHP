 <h2><?=$pagina?></h2>
	<hr>
<div class="btn-group" role="group" aria-label="...">
  <a type="button" class="btn btn-success" href="<?=BASE_URL?>campanhas/inserir">Adicionar Campanha</a>
</div>
<hr>
<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Polo</th>
			<th>Nome</th>
			<th>Valor</th>
			<th>Cupom</th>
			<th>Validade</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item->id_cp?></td>
			<td><?=$item->apelido?></td>
			<td><?=$item->nome_cp?></td>
			<td>R$ <?=$item->desconto?></td>
			<td><?=$item->cupom?></td>
			<td><?=$this->formatData($item->fim)?></td>
			<td>
				<a href="<?=BASE_URL?>campanhas/delete/<?=$item->id_cp?>" class="btn btn-sm btn-danger">
					<i class="fa fa-trash"></i>
				</a>
				<a href="<?=BASE_URL?>campanhas/editar/<?=$item->id_cp?>" class="btn btn-sm btn-primary">
					<i class="fa fa-pen"></i>
				</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Polo</th>
			<th>Nome</th>
			<th>Valor</th>
			<th>Cupom</th>
			<th>Validade</th>
			<th>Ações</th>
		</tr>
	</tfoot>
</table>