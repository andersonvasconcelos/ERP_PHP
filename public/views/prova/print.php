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
						
				<?=$this->imprimirProva($item['id_prova'])?>

				<?php if($item['tentativa'] == 0 || $this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4){?>

					<a href="<?=BASE_URL?>prova/pPdf/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Imprimir Prova">
					<img src="<?=URL_IMG?>Icone-Pdf-baixar-1.png" width="25px">
					</a>

				<?php } 

		if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4) {?>

	<a href="<?=BASE_URL?>prova/gabarito/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Gabarito">
		<img src="<?=URL_IMG?>result.png" width="35px">
	</a>

	<!--a href="<?=BASE_URL?>prova/pPdf/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Imprimir Prova">
		<img src="<?=URL_IMG?>Icone-Pdf-baixar-1.png" width="25px">
	</a-->

				<?php } ?>

			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
        
        </tfoot>
</table>
<a href="javascript:window.history.go(-2)" class="btn btn-danger">Voltar</a>
<?php } ?>