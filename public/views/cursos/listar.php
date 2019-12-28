<?php require 'modal.php' ?>
 <h2><?=$pagina?></h2>
	<hr>
<div class="btn-group" role="group" aria-label="...">
  <a type="button" class="btn btn-success" href="<?=BASE_URL?>cursos/inserir">Adicionar Curso</a>
</div>
<hr>
<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Polo</th>
	<th>Nome</th>
	<th>Valor</th>
	<th>Comissão</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_curso']?></td>
			<td><?=$item['segmento']?></td>
			<td><?=$item['nome_curso']?></td>
			<td>R$ <?=$item['valor']?></td>
			<td><?=$item['comissao']?>%</td>
			<td><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal" data-whatever="<?=$item['id_curso']?>">
				<i class="fa fa-trash"></i></a>
				<a href="<?=BASE_URL?>cursos/edit/<?=$item['slugc']?>" class="btn btn-sm btn-primary">
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
	<th>Comissão</th>
	<th>Ações</th>
</tr>
	</tfoot>
</table>