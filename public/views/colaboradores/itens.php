<?php require 'modal.php'?>
 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="" data-toggle="modal" data-target="#addiModal">Adicionar Item</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Slug</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_item']?></td>
			<td><?=$item['nome_item']?></td>
			<td><?=$item['slug_item']?></td>
			<td><a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delcModal" data-id_col="<?=$item['id_colaborador']?>">
				<i class="fa fa-trash"></i></a>
				<a href="<?=BASE_URL?>colaboradores/edit/<?=$item['slug_c']?>" class="btn btn-sm btn-primary">
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
			   <th>Slug</th>
			   <th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>