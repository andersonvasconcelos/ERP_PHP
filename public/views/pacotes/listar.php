<?php require 'modal.php' ?>
 <h2><?=$pagina?></h2>
	<hr>
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="" data-toggle="modal" data-target="#addpModal">Adicionar Pacote</a>
</div>
<hr>
<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Valor</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_pacote']?></td>
			<td><?=$item['nome_pacote']?></td>
			<td><?=$item['valor_pacote']?></td>


			<td><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal" data-whatever="<?=$item['id_curso']?>">
				<i class="fa fa-trash"></i></a>
				<a href="<?=BASE_URL?>pacotes/vincular/<?=$item['id_pacote']?>" class="btn btn-sm btn-primary">
				<i class="fa fa-eye"></i>
				</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Valor</th>
			<th>Ações</th>
		</tr>
	</tfoot>
</table>