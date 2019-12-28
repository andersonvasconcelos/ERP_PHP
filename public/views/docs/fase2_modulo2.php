<!DOCTYPE html>
<html>
<head>
	<title>Matricula Ensino Médio</title>

<style type="text/css">
	.qd{border: solid 1px #000;padding: 10px;}
	.linha{line-height: 1.4;}
</style>

</head>
<body>
		
	<div class="logo">
	<img src="public/assets/img/logo_edc_eja.png">
	</div>
<center>
	<p>CURSO DE EDUCAÇÃO DE JOVENS E ADULTOS, NA ETAPA DO ENSINO MÉDIO,
NA MODALIDADE EDUCAÇÃO A DISTÂNCIA.</p>
	<b>REQUERIMENTO DE MATRÍCULA</b>
</center>
<?php foreach ($alunos as $aluno): ?>
<p style="border: solid 1px; width:300px;" align="center">ID: <?=$aluno['n_inep']?> </p>
<p align="right">RA: <?=$aluno['numero_matricula']?> / POLO: <?=$aluno['apelido']?>  </p>
	<p align="justify" class="linha">Sr (a) Diretor(a) da EDC – Escola de Cursos, Eu, <strong><u> <?=$aluno['nome_aluno']?></u></strong>, filho(a) de<u> <?=$aluno['nome_mae']?> </u>e de <u><?=$aluno['nome_pai']?></u>, nacionalidade: <u><?=$aluno['nacionalidade']?></u>, nascido(a) em <u><?=$aluno['data_de_nascimento']?></u>, natural de <u><?=$aluno['cidade_de_nascimento']?> - <?=$aluno['estado_de_nascimento']?></u>, portador(a) do RG:<u><?=$aluno['rg_aluno']?> - SSP/<?=$aluno['estado_emissor']?></u>, CPF:<u><?=$aluno['cpf_aluno']?></u>, Profissão:<u> <?=$aluno['profissao']?> residente na Rua:<?=$aluno['endereco_aluno']?>, <?=$aluno['numero_aluno']?> Bairro: <?=$aluno['bairro_aluno']?> </u>, CEP: <u><?=$aluno['cep']?> </u> na cidade de:<u> <?=$aluno['cidade_aluno']?> </u> fone: <u> <?=$aluno['telefone_residencial']?> </u> celular: <u> <?=$aluno['telefone_aluno']?> </u>, tendo conhecimento e aceitando as disposições do Regimento Escolar e do Projeto Pedagógico do Curso de Educação de Jovens e Adultos, na etapa do ensino médio, na modalidade educação a distância, aprovado pela Deliberação <em>CEE/MS n. 11.636 de 13 de Março de 2019</em>, publicada no D.O. n. 9865 , de 20/03/2019 ,venho requerer MATRÍCULA na:</p>

	<div class="qd">
<p><u>Fase II Modulo II (3º Ano Ensino Médio).  Ano letivo: <u><?php echo date('Y')?></u></p>

<p>Estudante com deficiência, transtornos globais do desenvolvimento e altas habilidades ou superdotação? <br>
( &nbsp;&nbsp; ) sim (  &nbsp;&nbsp; ) não.</p>

<p>Qual(is)?_____________________________________________________________________</p>


<p>Nestes Termos, Pede Deferimento <u><?php echo date('d/m/Y')?></u></p>

 <table>
	<tr>
		<td>________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Responsável</td>
		<td>________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diretor</td>
		<td><p>&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
		<td>__________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;Funcionário(a) responsável</td>

	</tr>
</table>

<p>
( &nbsp;&nbsp; )Defiro
( &nbsp;&nbsp; )Indefiro
Data ___/___/____  
<br></p>
	

	</div>
	<p>
		Observações: <?php echo $aluno['obs']; ?>
	</p>
<?php endforeach; ?>
</body>
</html>