<?php require 'modal.php'?>
 <h2><?=$pagina?></h2>
	<hr>
	
<table class="table table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Slug</th>
	<th>Vincular</th>
</tr></thead>
	<tbody>
		<form id="addVinculo" method="post">
			<input type="hidden" name="id_grupo" value="<?=$id_grupo?>">
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_item']?></td>
			<td><?=$item['nome_item']?></td>
			<td><?=$item['slug_item']?></td>
			<td>
				<?php
				if ($item_p == true) {
			
				foreach ($item_p as $key){

				if($key['permissoes_item_id'] == $item['id_item']){?>

				<input type="checkbox" name="itens[]" value="<?=$key['permissoes_item_id']?>" <?php echo ($key['permissoes_item_id'] > 0) ? "checked" : null;?>/>	

			<?php } 
			 } } ?> 
<input type="checkbox" id="dor" value="<?=$item['id_item']?>" name="itens[]">
				<input type="hidden" name="id" value="<?=$item['id_item']?>">
</td>		
				
				
		</tr>
	<?php }?>
		
	</tbody>
	   <tfoot>
            <tr>
               <th>#</th>
			   <th>Nome</th>
			   <th>Ações</th>
			   <th><input type="submit" class="btn btn-sm btn-danger" value="Deletar Permissões"></form>	
				</th>
            </tr>
        </tfoot>
</table>