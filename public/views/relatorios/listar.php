 <h2><?=$pagina?></h2>
	<hr>
<div class="col-md-6">
	<form method="post">
		<input type="date" name="start">
		<input type="date" name="end">
		<input type="submit" class="btn btn-sm btn-primary" value="Pesquisar">
	</form>
</div>

<?php 


if (!empty($_POST['end'])) {
	# code...
$star = addslashes(trim($_POST['start']));
$star = str_replace("-", "", $star);
$end = addslashes(trim($_POST['end']));
$end = str_replace("-", "", $end);
$lista = $this->getRelatorioPolo($star, $end);

?>
<div class="col-md-6">
<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>relatorios/exportar/<?=$star.', '.$end?>">Exportar para excel</a>
</div>
</div>
<div class="col-md-12"><hr></div>

<table id="table_id" class="display table-bordered tb" style="font-size: 11px !important;">
	<thead class="bg-primary">
		<tr>
			<th>POLO</th>
			<th>RA</th>
			<th>ALUNO</th>
			<th>CURSO</th>
			<th>SIT.</th>
			<th>FPGTO</th>
			<th>QTD.P</th>
			<th>Nº.P</th>
			<th>R$</th>
			<th>VENC.</th>
			<th>STATUS</th>
			<th>PGT.</th>
			<th>RCB.</th>
			<th>R$ M. </th>
			<th>R$ P.</th>
			<th>TX</th>
		</tr>
</thead>
	<tbody>
		<?php 
			foreach($lista as $item){

				$token = json_decode($item->iugu);
				$token = $token->live_api_token;
				$iugu = $this->getFatura($item->id_fatura, $token);
				$comissao = $iugu['commission'];
				$taxa = $iugu['taxes_paid'];
				$sub_total = ((int)$iugu['commission_cents'] - (int)$iugu['taxes_paid_cents']) / 100;
				$dt_pgt = explode('T', $iugu['paid_at']);
				if (!empty($dt_pgt[0])) {$dt_pgt = date("d/m/Y", strtotime($dt_pgt[0]));} 
				else{$dt_pgt = '';}
		?>
		<tr>
			<td><?=$item->apelido?></td>
			<td><?=$item->ra?></td>
			<td><?=$item->nome_aluno?></td>
			<td><?=$item->nome_pacote?></td>
			<td><?=$item->situacao?></td>
			<td><?=$item->fdpgto?></td>
			<td><?=$item->qtd?></td>
			<td><?=$item->parcela?></td>
			<td>R$ <?=number_format($item->valor, '2', ',', '.')?></td>
			<td><?=date('d/m/Y', strtotime($item->vencimento))?></td>
			<td><?=$this->getFaturaStatus($iugu['status'])?></td>
			<td><?=$dt_pgt?></td>
			<td><?=$iugu['paid']?></td>
			<td><?=$comissao?></td>
			<td>R$ <?=number_format($sub_total, '2', ',', '.')?></td>
			<td><?=$taxa?></td-->
		</tr>
	<?php }?>
	</tbody>
	   <tfoot>
    	<tr>
			<th>POLO</th>
			<th>RA</th>
			<th>ALUNO</th>
			<th>CURSO</th>
			<th>SIT.</th>
			<th>FPGTO</th>
			<th>QTD.P</th>
			<th>Nº.P</th>
			<th>R$</th>
			<th>VENC.</th>
			<th>STATUS</th>
			<th>PGT.</th>
			<th>RCB.</th>
			<th>R$ M. </th>
			<th>R$ P.</th>
			<th>TX</th>
		</tr>
        </tfoot>
</table>
<?php } else{ ?>

	<div class="btn-group" role="group" aria-label="...">
  <a class="btn btn-success" href="<?=BASE_URL?>relatorios/exportar/<?=$star.', '.$end?>">Exportar para excel</a>
</div>
	<hr>
<?php } 
/*echo"<pre>";
	print_r($iugu);
	echo"</pre>";*/?>
