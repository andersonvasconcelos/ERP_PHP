<style type="text/css">
	.tdacoes{
		width: 70px !important; padding: 1px !important; 
	}
	.tdacoes a{
		text-decoration: none !important;
	}
	.tdacoes img{
		margin: 0 auto !important;
		padding-left: 2px;
		padding-top: 13px !important;
	}
</style>
 <h2><?=$pagina?></h2>
	<hr>
	
	<?php if(!empty($lista)){ ?>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Polo</th>
			<th>Nome</th>
			<th>Curso</th>
			<th>Area</th>
			<th>Disciplina</th>
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
			<td><?php echo $item['nome_curso']?></td>
			<td><?php echo $item['nome_area']?></td>
			<td><?php echo substr($item['nome_modulo'], 8)?></td>
			<td><?php echo $this->formatData($item['data_prova'])?></td>
			<td><?=$item['hora_prova']?></td>
			<td class="tdacoes">

				<?php if ($item['tentativa'] == 0): ?>
					
				<a href="<?=BASE_URL?>prova/editar/<?=$item['id_prova']?>" data-toggle="tooltip" data-placement="top" title="Editar Data">
				<img src="<?=URL_IMG?>edit.png" width="20px">
				</a>
				<?php endif ?>
				
				<?php if ($item['tentativa'] < 3): ?>

				<a href="<?=BASE_URL?>prova/corrigir/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Corrigir Prova">
				<img src="<?=URL_IMG?>invoice.png" width="20px">
				</a>

				<?php endif ?>


				<?php if ($item['tentativa'] > 0 ): ?>
				
				<a href="<?=BASE_URL?>prova/upProva/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Anexar Prova">
				<img src="<?=URL_IMG?>subir_prova.png" width="20px">
				</a>	
				
				<a href="<?=BASE_URL?>prova/nota/<?=$item['id_prova']?>" data-toggle="tooltip" data-placement="top" title="Nota"><img src="<?=BASE_URL?>assets/img/result.png" width="20px">
				</a>

				<!--a href="<?=BASE_URL?>prova/boletim/<?=$item['id_prova']?>" data-toggle="tooltip" data-placement="top" title="Boletim"><img src="<?=BASE_URL?>assets/img/icone_presenca.png" width="20px">
				</a-->

				<?php endif ?>
	
				
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
        
        </tfoot>
</table>
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>
<?php } ?>