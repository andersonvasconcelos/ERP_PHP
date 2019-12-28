 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>alunos">Adicionar Alunos</a>
</div>

<hr>

<table id="table_id" class="table table-bordered table-striped">
	<thead>
		<tr>
				<th>#</th>
				<th>Data</th>
				<th>Polo</th>
				<th>RA</th>
				<th>Curso</th>
	           	<th>Nome</th>
	          	<th>Situação</th>
	           	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($matriculas as $item){?>
		<tr>
			<td><a href="<?php echo BASE_URL ?>pagamentos/iugu/<?=$item['id_matricula']?>" target="_Blank"><?=$item['id_matricula']?></a></td>
			<td><?=$this->formatData($item['data_matricula'])?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['numero_matricula']?></td>
			<td><?=$item['nome_curso']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td><?php $this->verificarSituacao($item['situacao'])?></span></td>    
			<td align="center">
				<a href="<?=BASE_URL?>liberarMatricula/liberacao/<?=$item['id_matricula']?>" data-toggle="tooltip" data-placement="top" title="Liberar Matrícula">
				<span class="glyphicon glyphicon-check alert-success" ></span></a>
				<a href="" class="delMat" data-id="<?=$item['id_matricula']?>" data-toggle="tooltip" data-placement="top" title="Excluir Matrícula">
				<span class="glyphicon glyphicon-remove alert-danger" ></span></a>
				<?php if ($item['curso_id'] == 76): ?>
					
				<a href="<?=BASE_URL?>docs/gerarPdf/ato/<?=$item['aluno_id']?>" target="_Blank" data-toggle="tooltip" data-placement="top" title="Gerar Ato">
				<span class="glyphicon glyphicon-download-alt alert-warning" ></span>
				</a>
				<?php endif ?>
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
              	<th>#</th>
				<th>Data</th>
				<th>Polo</th>
				<th>RA</th>
				<th>Curso</th>
	           	<th>Nome</th>
	          	<th>Situação</th>
	           	<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>