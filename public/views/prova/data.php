
 <h2><?=$pagina?></h2>
<hr>
<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
			<th>Data</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr><td><?php echo $this->formatData($item['data_prova'])?></td>
	
			<td>

					<a href="<?=BASE_URL?>prova/show/<?=$item['aluno_id']?>/<?=$item['curso_id']?>/<?=$item['area_id']?>/<?=$item['data_prova']?>" data-toggle="tooltip" data-placement="top" title="Ver Provas" style="padding-left: 15px" >
					<img src="<?=URL_IMG?>enter_icon-icons.com_48306.png" width="30px">
				</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	   <tfoot>
   		<tr>
			<th>Area</th>
			<th>Ações</th>
		</tr>
        </tfoot>
</table>
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>

