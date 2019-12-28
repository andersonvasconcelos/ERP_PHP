<!DOCTYPE html>
<html>
<head>
	<title>Requerimento de Aproveitamento</title>
	<style type="text/css">

	.qd{border: solid 1px #000;padding: 10px;}
	.table{
       margin: 0 auto;
   /* Altere para o valor da largura desejada. */
	}
	.carimbo{
		border: solid 1px #ccc;
		font-size: 10px;
		width: 140px;
		float: right;
		margin-top: 15px;
		padding: 0 5 5 5;
	}
	body{
		line-height: 1.4;
	}

</style>

</head>
<body>
		
	<div class="logo">
		<img src="assets/img/logo_edc_eja.png">
	</div>
<center>
	<h5><strong>CURSO DE EDUCAÇÃO DE JOVENS E ADULTOS, NA ETAPA DO ENSINO MÉDIO,
NA MODALIDADE EDUCAÇÃO A DISTÂNCIA.</strong></h5>
	<p>REQUERIMENTO DE APROVEITAMENTO DE ESTUDOS</p>
</center>
<?php foreach ($alunos as $aluno): ?>
	<p style="border: solid 1px; width:250px;" align="center">ID: <?=$aluno['n_inep']?> </p>
	<p align="right">RA: <?=$aluno['numero_matricula']?> / POLO: <?=$aluno['apelido']?>  </p>
	<p align="justify">Sr (a) Diretor(a) da EDC – Escola de Cursos, Eu, <strong><u> <?=$aluno['nome_aluno']?></u></strong>, filho(a) de<u> <?=$aluno['nome_mae']?> </u>e de <u><?=$aluno['nome_pai']?></u>, nacionalidade: <u><?=$aluno['nacionalidade']?></u>, nascido(a) em <u><?=$aluno['data_de_nascimento']?></u>, natural de <u><?=$aluno['cidade_de_nascimento']?> - <?=$aluno['estado_de_nascimento']?></u>, portador(a) do RG:<u><?=$aluno['rg_aluno']?> - SSP/<?=$aluno['estado_emissor']?></u>, CPF:<u><?=$aluno['cpf_aluno']?></u>, Profissão:<u> <?=$aluno['profissao']?> residente na Rua:<?=utf8_encode($aluno['endereco_aluno'])?>, Bairro: <?=utf8_encode($aluno['bairro_aluno'])?> </u>, CEP: <u><?=$aluno['cep']?> </u> na cidade de:<u> <?=$aluno['cidade_aluno']?> </u> fone: <u> <?=$aluno['telefone_residencial']?> </u> celular: <u> <?=$aluno['telefone_aluno']?> </u>, tendo conhecimento e aceitando as disposições do Regimento Escolar e do Projeto Pedagógico do Curso de Educação de Jovens e Adultos na Modalidade de Educação a Distância, aprovado pela Deliberação <em>CEE/MS n. 11.636 de 13 de Março de 2019</em>, publicada no D.O. n. 9865 , de 20/03/2019, venho requerer APROVEITAMENTO DE ESTUDOS na:</p>

	<div class="qd">
<p>Na Fase ____ - Modulo _____________________.  Ano letivo: <?php echo date('Y')?></p>


<p>Referente ao componentes curriculares de: __________________________________________________________________</p>

<p> Concluidos pelo:____________________</p>



<p>Nestes Termos, Pede Deferimento <u><?php echo date('d/m/Y')?></u></p>

 <table>
	<tr>
		<td>________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Requerente</td>
		<td><p>&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
		<td>________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diretor</td>
		<td>__________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;Funcionário(a) responsável</td>

	</tr>
</table>

<p>
( &nbsp;&nbsp; )Defiro
( &nbsp;&nbsp; )Indefiro
Data ___/___/____  
<br></p>
	
	</div>
<?php endforeach; ?>

<div class="carimbo">
<p>	Portaria nº_______________<br>
  Data: ____/____/_____<br>
 (&nbsp;&nbsp;&nbsp;&nbsp;) Aproveitamento <br>
 (&nbsp;&nbsp;&nbsp;&nbsp;) Classificação <br>
 (&nbsp;&nbsp;&nbsp;&nbsp;) Análise Documental</p>

</div>

	
</body>
</html>