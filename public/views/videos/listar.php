<?php require 'modal.php';?>
 <h2><?=$pagina?></h2>
	<hr>
	
<div class="btn-group" role="group" aria-label="...">
  <a href="<?=BASE_URL?>videos/adicionar" type="button" class="btn btn-success">Adicionar Vídeo</a>
</div>

<hr>

<table id="table_id" class="display table-bordered">
	<thead>
		<tr>
	<th>#</th>
	<th>Tipo</th>
	<th>Aula</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Link</th>
	<th>Ações</th>
</tr></thead>
	<tbody>
		<?php foreach($lista as $item){
			$tipo = $item['tipo'];
			$link = $item['link_video']?>
		<tr>
			<td><?=$item['id_video']?></td>
			<td><?=$tipo?></td>
			<td><?=$item['nome_aula']?></td>
			<td><?=$item['nome_modulo']?></td>
			<td><?=$item['nome_curso']?></td>

			<?php if($tipo == "Youtube"){?>

			<td>
				<a href="https://www.youtube.com/embed/<?=$link?>" target="blank">Ver video</a>
			</td>

			<?php } elseif ($tipo == "Vimeo") {?>

				<td>
					<a href="https://player.vimeo.com/video/<?=$link?>" target="blank">Ver video</a>
				</td>

			<?php } elseif ($tipo == "Mp4") {?>

				<td>
					<a href="<?=$link?>" target="blank">Ver video</a>
				</td>
				
			<?php } ?>

			<td>
				<a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delvModal" data-id_video="<?=$item['id_video']?>">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>

	<?php }?>

	</tbody>
	   <tfoot>
            <tr>
              <th>#</th>
	<th>Tipo</th>
	<th>Aula</th>
	<th>Módulo</th>
	<th>Curso</th>
	<th>Link</th>
	<th>Ações</th>
            </tr>
        </tfoot>
</table>
