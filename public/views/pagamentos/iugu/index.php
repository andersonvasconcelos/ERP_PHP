<h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>iugu/adicionar">Adicionar Subconta</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Polo</th>
	<th>Status</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($contas as $item){
			$iugu = json_decode($item['iugu']);
			?>
		<tr>
			<td><?=$item['id']?></td>
			<td><?=$item['nome_empresa']?></td>
			<td><?=$item['apelido']?></td>
			<td><?php echo $this->getVerifica($iugu->account_id, $iugu->live_api_token)?></td>
			<td>
				<!--a class="btn btn-sm btn-danger del" data-id="<?=$item['id_aluno']?>"  data-toggle="tooltip" data-placement="top" title="Deletar Aluno">
				<i class="fa fa-trash"></i></a-->

				<a href="<?=BASE_URL?>iugu/edit/<?=$item['id']?>" class="btn btn-sm btn-primary"  data-toggle="tooltip" data-placement="top" title="Editar Conta">
				<i class="fa fa-pen"></i>
				</a>

				<a href="<?=BASE_URL?>iugu/verificar/<?=$item['id']?>" class="btn btn-sm btn-warning"  data-toggle="tooltip" data-placement="top" title="Verificar Conta">
				<i class="fas fa-check-square"></i>
				</a>
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
               <th>#</th>
			  	<th>Nome</th>
				<th>Polo</th>
				<th>Status</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>

<script type="text/javascript">
	
</script>