<!DOCTYPE html>
<html>
<head>
	<title>Requerimento de Classificação</title>
	<style type="text/css">
	.qd{
		height: 20px;
		margin-top: 10px;
	}
	.table{
       margin: 0 auto;
   /* Altere para o valor da largura desejada. */
	}
	body{
		line-height: 1.3;
	}

</style>

</head>
<body>
		
	<div class="logo">
		<img src="assets/img/logo_edc_eja.png">
	</div>
<center>
	<p>CURSO DE EDUCAÇÃO DE JOVENS E ADULTOS, NA ETAPA DO ENSINO MÉDIO,
NA MODALIDADE EDUCAÇÃO A DISTÂNCIA.</p>
	<b>REQUERIMENTO DE CLASSIFICAÇÃO</b>
</center>
<?php foreach ($alunos as $aluno): ?>
	<p style="border: solid 1px; width:300px;" align="center">ID: <?=$aluno['n_inep']?></p>
	<p align="right">RA: <?=$aluno['numero_matricula']?> / POLO: <?=$aluno['apelido']?>  </p>
	<p align="justify">Sr (a) Diretor(a) da EDC – Escola de Cursos, Eu, <strong><u> <?=$aluno['nome_aluno']?></u></strong>, filho(a) de<u> <?=$aluno['nome_mae']?> </u>e de <u><?=$aluno['nome_pai']?></u>, nacionalidade: <u><?=$aluno['nacionalidade']?></u>, nascido(a) em <u><?=$aluno['data_de_nascimento']?></u>, natural de <u><?=$aluno['cidade_de_nascimento']?> - <?=$aluno['estado_de_nascimento']?></u>, portador(a) do RG:<u><?=$aluno['rg_aluno']?> - SSP/<?=$aluno['estado_emissor']?></u>, CPF:<u><?=$aluno['cpf_aluno']?></u>, Profissão:<u> <?=$aluno['profissao']?> residente na <?=$aluno['endereco_aluno']?>, Bairro: <?=($aluno['bairro_aluno'])?> </u>, CEP: <u><?=$aluno['cep']?> </u> na cidade de:<u> <?=$aluno['cidade_aluno']?> </u> fone: <u> <?=$aluno['telefone_residencial']?> </u> celular: <u> <?=$aluno['telefone_aluno']?> </u> tendo conhecimento e aceitando as disposições do Regimento Escolar e do Projeto Pedagógico do Curso De Educação De Jovens E Adultos, Na Etapa Do Ensino Médio,
Na Modalidade Educação A Distância, aprovado pela Deliberação <em>CEE/MS n. 11.636 de 13 de Março de 2019</em>, publicada no D.O. n. 9865 , de 20/03/2019, venho requerer <?= mb_strtoupper("avaliação para comprovar conhecimentos referentes ao Ensino Fundamental.")?></p>

<p>Módulo Inicial da Fase I do Ensino Médio, do referido curso. </p>

<div class="qd"> </div>
<p>Nestes Termos, Pede Deferimento <?=date('d/m/Y')?> </p>
<br>
 <table class="table">
	<tr>
		<td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
		<td>________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assinatura do requerente</td>
		<td><p>&nbsp;&nbsp;&nbsp;&nbsp;</p></td>

	</tr>
</table>
<br>
<p>( X ) Defiro</p>
<p>( &nbsp;&nbsp; ) Indefiro</p>
<p>Data:_____/_____/_____</p>


 <table class="table">
	<tr>
		<td><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
		<td>________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diretor</td>
		<td><p>&nbsp;&nbsp;&nbsp;&nbsp;</p></td>

	</tr>
</table>

	<?php endforeach; ?>
</body>
</html>