
 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>prova">Agendar Prova</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead class="bg-info">
		<tr>
	<th>#</th>
	<th>Polo</th>
	<th>Nome</th>
	<th>Curso</th>
	<th>Data</th>
	<th>Hora</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['numero_matricula']?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td><?php echo substr($item['nome_curso'], 0, 19)?></td>
			<td><?php echo $this->formatData($item['data_prova'])?></td>
			<td><?=$item['hora_prova']?></td>
					<td>


				<?php if ($item['tentativa'] > 0 ): ?>
				
				
				<a href="<?=BASE_URL?>provas/nota/<?=$item['id_prova']?>" data-toggle="tooltip" data-placement="top" title="Nota"><img src="<?=BASE_URL?>assets/img/result.png" width="20px">
				</a>

				<?php endif ?>
	
				
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
             	<th>#</th>
				<th>Polo</th>
				<th>Nome</th>
				<th>Curso</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>