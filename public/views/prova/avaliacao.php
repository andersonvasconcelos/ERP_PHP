
 <h2><?=$pagina?></h2>
	<hr>
		<form action="" method="POST" name="prova">
   		<select class="form-control" name="curso" onchange="this.form.submit()">  
              	<option value="0">Escolha um curso</option>
              <?php foreach ($aulas as $a) {?>
              	<option value="<?=$a['id_curso']?>"><?=$a['nome_curso']?></option>
              <?php } ?>
        </select>
		</form>

		<?php if(isset($_POST['curso']))
		{
			$curso = addslashes(trim($_POST['curso']));

			if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) {
				$lista = $this->getProvas($curso);
			} 
			else{$lista = $this->getProvasPoloId($curso, $this->getUser()['polo_id']);}
		?>
<hr>
<table id="table_id" class="display table-bordered">
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
			<td>

			<!--a class="btn btn-sm btn-danger del" data-id="<?=$item['id_aluno']?>">
				<i class="fa fa-trash"></i></a-->
				<!--a href="<?=BASE_URL?>prova/pPdf/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Imprimir Prova">
				<img src="<?=BASE_URL?>assets/img/Icone-Pdf-baixar-1.png" width="25px">
				</a-->

				<a href="<?=BASE_URL?>prova/print/<?=$item['aluno_id']?>/<?=$item['curso_id']?>" data-toggle="tooltip" data-placement="top" title="Ver Provas" style="padding-left: 15px" >
					<img src="<?=URL_IMG?>enter_icon-icons.com_48306.png" width="30px">
				</a>


			
				<!--a href="<?=BASE_URL?>prova/gabarito/<?=$item['id_prova']?>" target="blank" data-toggle="tooltip" data-placement="top" title="Gabarito">
				<img src="<?=BASE_URL?>assets/img/Icone-Pdf-baixar-1.png" width="25px">
				</a-->
				<!--a href="<?=BASE_URL?>alunos/addMatricula/<?=$item['id_aluno']?>" class="btn btn-sm btn-warning">
				<i class="fa fa-check"></i>
				</a-->
			</td>
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
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
        </tfoot>
</table>

<?php } ?>