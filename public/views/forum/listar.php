 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a href="<?=BASE_URL?>forum/adicionar" type="button" class="btn btn-success">Adicionar Forum</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Titulo</th>
	<th>Aula</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Ativo</th>
	<th>Ações</th>
	</tr>
</thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_forum']?></td>
			<td><?=$item['titulo']?></td>
			<td><?=$item['nome_aula']?></td>
			<td><?=$item['nome_modulo']?></td>
			<td><?=$item['nome_curso']?></td>
			<td><?=$item['ativo']?></td>
			
			<td>
				<button class="btn btn-sm btn-danger" name="bdel" value="<?=$item['id_forum']?>">
					<i class="fa fa-trash"></i>
				</button>

				<a href="<?=BASE_URL?>forum/edit/<?=$item['id_forum']?>" class="btn btn-sm btn-primary">
				<i class="fa fa-eye"></i>
				</a>

				<a href="<?=BASE_URL?>forum/resp/<?=$item['id_forum']?>" class="btn btn-sm btn-warning">
				<i class="fa fa-pen"></i>
				</a>
			</td>
		</tr>

	<?php }?>

	</tbody>
	   <tfoot>
            <tr>
   	<th>#</th>
	<th>Titulo</th>
	<th>Aula</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Ativo</th>
	<th>Ações</th>
            </tr>
        </tfoot>
</table>
