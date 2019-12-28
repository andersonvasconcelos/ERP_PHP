 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a href="<?=BASE_URL?>apostilas/adicionar" type="button" class="btn btn-success">Adicionar Apostilas</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Aula</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Link</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_apostila']?></td>
			<td><?=$item['nome_apostila']?></td>
			<td><?=$item['nome_aula']?></td>
			<td><?=$item['nome_modulo']?></td>
			<td><?=$item['nome_curso']?></td>
			<td><a href="<?=BASE_URL.$item['link_apostila']?>" target="blank" class="btn btn-sm btn-info">Ver</a></td>
			<td>
				<button class="btn btn-sm btn-danger" name="btndel" value="<?=$item['id_apostila']?>">
					<i class="fa fa-trash"></i>
				</button>
			</td>
		</tr>

	<?php }?>

	</tbody>
	   <tfoot>
            <tr>
   	<th>#</th>
	<th>Nome</th>
	<th>Aula</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Link</th>
	<th>Ações</th>
            </tr>
        </tfoot>
</table>
