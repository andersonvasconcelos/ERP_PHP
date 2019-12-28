<?php require 'modal.php'?>
 <h2><?=$pagina?></h2>
	<hr>
	
<table class="table table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Nome</th>
	<th>Vincular</th>
</tr></thead>
	<tbody>
		<form id="addVinculo" method="post">
			<input type="hidden" name="id_grupo" value="<?=$id_grupo?>">
		<?php foreach($lista as $item){?>
		<tr>
			<td><?=$item['id_curso']?></td>
			<td><?=$item['nome_curso']?></td>
			<td>
				<?php
				if ($item_p == true) {
			
				foreach ($item_p as $key){

				if($key['curso_id'] == $item['id_curso']){?>

				<input type="checkbox" name="itens[]" value="<?=$key['curso_id']?>" <?php echo ($key['curso_id'] > 0) ? "checked" : null;?>/>	

			<?php } 
			 } } ?> 
</td>		
				
				
		</tr>
	<?php }?>
		
	</tbody>
	   <tfoot>
            <tr>
              <th>#</th>
	<th>Nome</th>
	<th>Vincular</th>

            </tr>
        </tfoot>
</table>