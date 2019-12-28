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
	<th>Polo</th>
	<th>RA</th>
	<th>Nome</th>
	<th>Curso</th>
	<th>Situação</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($matriculas as $item){?>
		<tr>
			<td><?=$item['id_matricula']?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['numero_matricula']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td><?php echo substr($item['nome_curso'], 0, 17)?></td>
			<td><?php $this->verificarSituacao($item['situacao'])?></td>
			<td>
				<a href="<?=BASE_URL?>matriculas/editar/<?=$item['id_matricula']?>" class="btn btn-sm btn-info">
				<i class="fa fa-pen"></i>
				</a>
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
               <th>#</th>
				<th>Polo</th>
				<th>RA</th>
				<th>Nome</th>
				<th>Curso</th>
				<th>Situação</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>