 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>matriculas/addFim">Informar Conclusão de Módulo</a>
</div>

<hr>
<?php if(!empty($matriculas)):?>
<table id="table_id" class="display table-striped table-bordered">
	<thead>
		<tr>
	 		<th>#</th>
			<th>Polo</th>
			<th>RA</th>
			<th>Nome</th>
			<th>Curso</th>
			<th>Situação</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($matriculas as $item){?>
		<tr>
			<td><?=$item['id_matricula']?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['numero_matricula']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td><?php echo substr($item['nome_curso'], 0, 19)?></td>
			<td><?php $this->verificarSituacao($item['situacao'])?></td>
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
            </tr>
        </tfoot>
</table>

<?php endif;?>
