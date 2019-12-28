<?php require 'modal.php'?>
 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>colaboradores">Adicionar Colaborador</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Telefone</th>
	<th>Polo</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_colaborador']?></td>
			<td><?=$item['nome_colaborador']?></td>
			<td><?=$item['telefone_colaborador']?></td>
			<td><?=$item['apelido']?></td>
			<td>
				<a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delcModal" data-id_col="<?=$item['id_colaborador']?>" data-toggle="tooltip" data-placement="top" title="Deletar Colaborador">
				<i class="fa fa-trash"></i></a>

				<a href="<?=BASE_URL?>colaboradores/edit/<?=$item['slug_c']?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Colaborador">
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
			   <th>Telefone</th>
			   	<th>Polo</th>
			   <th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>