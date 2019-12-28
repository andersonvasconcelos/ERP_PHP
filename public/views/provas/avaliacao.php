
 <h2><?=$pagina?></h2>
	<hr>

<hr>
<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Polo</th>
			<th>Nome</th>
			<th>Curso</th>
			<th>Area</th>
			<th>Data</th>
			<th>Hora</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['numero_matricula']?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td><?php echo substr($item['nome_curso'], 0, 19)?></td>
			<td><?php echo substr($item['nome_area'], 0, 19)?></td>
			<td><?php echo $this->formatData($item['data_prova'])?></td>
			<td><?=$item['hora_prova']?></td>
			<td>
				<?=$this->imprimirProva($item['id_prova'])?>

			<!--a class="btn btn-sm btn-danger del" data-id="<?=$item['id_aluno']?>">
				<i class="fa fa-trash"></i></a-->
				<?php if($item['tentativa'] == 0){?>
				<a href="<?=BASE_URL?>prova/pPdf/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Imprimir Prova">
				<img src="<?=BASE_URL?>assets/img/Icone-Pdf-baixar-1.png" width="25px">
				</a>

			<?php } ?>

			
				<!--a href="<?=BASE_URL?>prova/gabarito/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Gabarito">
				<img src="<?=BASE_URL?>assets/img/Icone-Pdf-baixar-1.png" width="25px">
				</a-->
				<!--a href="<?=BASE_URL?>alunos/addMatricula/<?=$item['id_aluno']?>" class="btn btn-sm btn-warning">
				<i class="fa fa-check"></i>
				</a-->
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
				<th>Area</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>