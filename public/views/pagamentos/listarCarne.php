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
			<td><?=$item['ra']?></td>
			<td><?=$item['apelido']?></td>
			<td><?=$item['nome_aluno']?></td>
			<td>
		 <a href="<?=BASE_URL?>pagamentos/getCarne/<?=$item['ra']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Imprimir Carne">
                  <img src="<?=URL_IMG?>boleto-icone.png" class="ico"></a>

        <a href="<?=BASE_URL?>pagamentos/verParcelas/<?=$item['ra']?>" data-toggle="tooltip" data-placement="top" title="Ver Parcelas">
                  <img src="<?=URL_IMG?>logo-minhas-financas.png" height="35px" ></a>

			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
              	<th>#</th>
				<th>Polo</th>
	           	<th>Nome</th>
	           	<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>