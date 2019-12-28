 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a href="<?=BASE_URL?>exercicios/adicionar" type="button" class="btn btn-success">Adicionar Exercício</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Pergunta</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Ações</th>
	</tr>
</thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_exercicio']?></td>
			<td><?=$item['pergunta']?></td>
			<td><?=$item['nome_modulo']?></td>
			<td><?=$item['nome_curso']?></td>
			
			<td>
				<button class="btn btn-sm btn-danger" name="btdel" value="<?=$item['id_exercicio']?>">
					<i class="fa fa-trash"></i>
				</button>

				<a href="<?=BASE_URL?>exercicios/edit/<?=$item['id_exercicio']?>" class="btn btn-sm btn-primary">
				<i class="fa fa-eye"></i>
				</a>
			</td>
		</tr>

	<?php }?>

	</tbody>
	   <tfoot>
            <tr>
   	<th>#</th>
	<th>Pergunta</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Ações</th>
            </tr>
        </tfoot>
</table>
