 <h2><?=$pagina?></h2>
	<hr>


<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>relatorios/exportarAcademico/?>">Exportar para excel</a>
</div>
<hr>
<?php if(!empty($lista)){?>
<table id="academico" class="cell-border table" style="width:100%">
	<thead>
		<tr>
			<th>POLO</th>
			<th>RA</th>
			<th>ALUNO</th>
			<th>PACOTE</th>
			<th>CURSO</th>
			<th>SITUAÇÃO</th>
		</tr>
</thead>
	<tbody>
		<?php 
			foreach($lista as $item){
				
		?>
		<tr>
			<td><?=$item->apelido?></td>
			<td><?=$item->numero_matricula?></td>
			<td><?=$item->nome_aluno?></td>
			<td><?=$item->nome_pacote?></td>
			<td><?=substr($item->nome_curso, 0, 19)?></td>
			<td><?=$item->situacao?></td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
    	<tr>
			<th>POLO</th>
			<th>RA</th>
			<th>ALUNO</th>
			<th>PACOTE</th>
			<th>CURSO</th>
			<th>SITUAÇÃO</th>
		</tr>
        </tfoot>
</table>

<?php } ?>
