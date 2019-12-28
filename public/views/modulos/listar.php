<?php require 'modal.php';?>

<h2><?=$pagina?></h2>
	<hr>

<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmModal">Adicionar Módulo</button>
</div>
<hr>
<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Curso</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_modulo']?></td>
			<td><?=$item['nome_modulo']?></td>
			<td><?=$item['nome_curso']?></td>
			<td><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delModulo" data-id_mod="<?=$item['id_modulo']?>">
				<i class="fa fa-trash"></i></a>
				<a href="<?=BASE_URL?>modulos/edit/<?=$item['id_modulo']?>" class="btn btn-sm btn-primary">
				<i class="fa fa-pen"></i>
				</a>
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
                <th>#</th>
				<th>Nome</th>
				<th>Curso</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>