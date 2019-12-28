
 <h2><?=$pagina?></h2>
	<hr>

<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>prova">Agendar Prova</a>
</div>

<hr>
		<form action="" method="GET" name="prova">
   		<select class="form-control" name="curso" onchange="this.form.submit()">  
              	<option value="0">Escolha um curso</option>
              <?php foreach ($aulas as $a) {?>
              	<option value="<?=$a['id_curso']?>"><?=$a['nome_curso']?></option>
              <?php } ?>
        </select>
		</form>

		<?php if(isset($_GET['curso']))
		{
			$curso = addslashes(trim($_GET['curso']));

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
			<td><?php echo $this->formatData($item['data_prova'])?></td>
			<td><?=$item['hora_prova']?></td>
					<td>

				<a href="<?=BASE_URL?>prova/boletim/<?=$item['aluno_id']?>/<?=$item['curso_id']?>" data-toggle="tooltip" data-placement="top" title="Boletim" style="padding-left: 15px" >
					<img src="<?=URL_IMG?>enter_icon-icons.com_48306.png" width="30px">
				</a>	

	
				
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
				<th>Data</th>
				<th>Hora</th>
				<th>Ações</th>
            </tr>
        </tfoot>
</table>
<?php } ?>

