
 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>segmentos/inserir">Adicionar Segmento</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($segmentos as $item){?>
		<tr>
			<td><?=$item['id_segmento']?></td>
			<td><?=$item['nome_segmento']?></td>
			<td><button class="btn btn-sm btn-danger seg" value="<?=$item['id_segmento']?>">
				<i class="fa fa-trash"></i></button>
				<a href="<?=BASE_URL?>segmentos/edit/<?=$item['slug_s']?>" class="btn btn-sm btn-primary">
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
			<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>