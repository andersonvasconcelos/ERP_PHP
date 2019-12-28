 <h2><?=$pagina?></h2>
	<hr>

<?php if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) {?>
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>servicos/adicionar">Adicionar Serviço</a>
</div>
<?php } ?>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Valor</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item->id_servico?></td>
			<td><?=$item->nome_servico?></td>
			<td>R$ <?=$item->valor_servico?></td>
			<td>

				<?php if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) {?>

				<a class="btn btn-sm btn-danger" href="<?=BASE_URL?>servicos/deletar/<?=$item->id_servico?>"  data-toggle="tooltip" data-placement="top" title="Deletar Serviço">
				<i class="fa fa-trash"></i></a>

				<a href="<?=BASE_URL?>servicos/edit/<?=$item->id_servico?>" class="btn btn-sm btn-primary"  data-toggle="tooltip" data-placement="top" title="Editar Serviço">
				<i class="fa fa-pen"></i>
				</a>

			<?php } ?>
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
            <tr>
               <th>#</th>
			   <th>Nome</th>
			   <th>Telefone</th>
			   <th>Ações</th>
            </tr>
        </tfoot>
</table>

