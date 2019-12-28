
 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>polos">Adicionar Polo</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Cidade</th>
	<th>UF</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($polos as $item){?>
		<tr>
			<td><?=$item['id_polo']?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['cidade_polo']?></td>
			<td><?=$item['estado_polo']?></td>
			<td><button class="btn btn-sm btn-danger" id="del" name="delete" value="<?=$item['id_polo']?>" data-toggle="tooltip" data-placement="top" title="Deletar Polo">
				<i class="fa fa-trash"></i></button>
				<a href="<?=BASE_URL?>polos/edit/<?=$item['slug']?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Polo">
				<i class="fa fa-eye"></i>
				</a>
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
            <th>#</th>
			<th>Nome</th>
			<th>Cidade</th>
			<th>UF</th>
			<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>