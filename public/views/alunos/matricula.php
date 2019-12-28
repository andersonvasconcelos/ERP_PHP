 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>alunos">Adicionar Alunos</a>
</div>

<hr>

<table id="table_id" class="display table table-striped table-bordered table-hover">
	<thead>
		<tr>
	 			<th>#</th>
	 			<th>Data</th>
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
			<td><?=$this->formatData($item['data_matricula'])?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['numero_matricula']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td><?php echo substr($item['nome_curso'], 0, 19)?></td>
			<td><?php $this->verificarSituacao($item['situacao'])?></td>
			<td class="ttable">
				
				<a href="<?=BASE_URL?>alunos/editarMatricula/<?=$item['id_matricula']?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Corrigir Matrícula"> 
					<img src="<?=URL_IMG?>edit.png" width="15px">
				</a>
				<a href="<?=BASE_URL?>docs/gerarPdf/contrato/<?=$item['numero_matricula']?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Contrato"> 
					<img src="<?=URL_IMG?>contract.png" width="15px">
				</a>
				<a href="<?=BASE_URL?>docs/index/<?=$item['numero_matricula']?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Requerimento"> 
					<img src="<?=URL_IMG?>Icone-Pdf-baixar-1.png" width="15px">
				</a>
				<a href="<?=BASE_URL?>docs/anexarDocs/<?=$item['id_aluno']?>"
					data-toggle="tooltip" data-placement="top" title="Anexar Documentos"> 
					<img src="<?=URL_IMG?>enter_icon-icons.com_48306.png" width="15px">
				</a>
			</td>
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
				<th>Nome</th>
				<th>Curso</th>
				<th>Situação</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>