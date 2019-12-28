 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>alunos">Adicionar Alunos</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Polo</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_aluno']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td><?=$item['apelido']?></td>
			<td>
				<a class="btn btn-sm btn-danger del" data-id="<?=$item['id_aluno']?>"  data-toggle="tooltip" data-placement="top" title="Deletar Aluno">
				<i class="fa fa-trash"></i></a>

				<a href="<?=BASE_URL?>alunos/edit/<?=$item['sluga']?>" class="btn btn-sm btn-primary"  data-toggle="tooltip" data-placement="top" title="Editar Aluno">
				<i class="fa fa-pen"></i>
				</a>

				<a href="<?=BASE_URL?>alunos/addMatricula/<?=$item['id_aluno']?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Matricular Aluno">
				<i class="fa fa-check"></i>
				</a>
				<!--a href="<?=BASE_URL?>docs/index/<?=$item['id_aluno']?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Gerenciar Documentos">
				<i class="fa fa-check"></i-->
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
			   <th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>