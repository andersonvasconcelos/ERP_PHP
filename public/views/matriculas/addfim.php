 <h2><?=$pagina?></h2>
  <hr>
<div class="rradio">
    <div class="interna">
    	<div class="row">
    		<table id="table_id" class="display table-striped table-bordered">
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
			<td><?php echo substr($item['nome_curso'], 0, 19)?></td>
			<td><?php $this->verificarSituacao($item['situacao'])?></td>
			<td>

				<?php if($item['situacao'] === 'Matriculado'):?>

				<a class="btn btn-sm btn-fim" data-id="<?=$item['id_matricula']?>" data-toggle="tooltip" data-placement="top" title="Finalizar Matrícula"> 
				<i class="fa fa-graduation-cap fa-2x"></i></a>
				</a>

				<?php endif;?>				</td>
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
    	</div>
    </div>
</div>

