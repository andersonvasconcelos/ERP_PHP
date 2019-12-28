
 <h2><?=$pagina?></h2>
<hr>
<table class="table table-bordered">
	
	<tbody>
		<tr>
			<td>Area</td>
			<td>Ações</td>
		</tr>
		<?php foreach($lista as $item){?>
		<tr><td><?php echo $item['nome_area']?></td>
	
			<td>

			<!--a class="btn btn-sm btn-danger del" data-id="<?=$item['id_aluno']?>">
				<i class="fa fa-trash"></i></a-->
				<!--a href="<?=BASE_URL?>prova/pPdf/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Imprimir Prova">
				<img src="<?=BASE_URL?>assets/img/Icone-Pdf-baixar-1.png" width="25px">
				</a-->

				<a href="<?=BASE_URL?>prova/data/<?=$item['aluno_id']?>/<?=$item['curso_id']?>/<?=$item['area_id']?>" data-toggle="tooltip" data-placement="top" title="Ver Provas" style="padding-left: 15px" >
					<img src="<?=URL_IMG?>enter_icon-icons.com_48306.png" width="30px">
				</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<a href="javascript:window.history.go(-1)" class="btn btn-danger">Voltar</a>

