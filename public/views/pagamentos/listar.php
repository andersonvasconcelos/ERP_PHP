 <h2><?=$pagina?></h2>
	<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Polo</th>
	<th>Nome</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($matriculas as $item){?>
		<tr>
			<td><?=$item['id_matricula']?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td>
           <a href="<?=BASE_URL?>pagamentos/iugu/<?=$item['id_matricula']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Finalizar Pagamento">
           <img src="<?=URL_IMG?>boleto-icone.png" class="ico"></a>
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
               <th>#</th>
			   <th>Nome</th>
	           <th>Curso</th>
	           <th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>