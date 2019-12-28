<!DOCTYPE html>
<html>
<head>
	<title>CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS</title>

<style type="text/css">
	body{font-size: 12px}
	.qd{border: solid 1px #000;padding: 10px;}
	.linha{line-height: 1.0;}
</style>

</head>
<body>
		
<center>
	<p><b>CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS</b></p>
</center>
<?php foreach ($alunos as $aluno): ?>

<p align="justify" >
	Pelo presente instrumento particular de CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS (“Contrato”), a <b>EDC – Escola de Cursos</b>, devidamente inscrita no CNPJ/MF sob o nº 18.328.380/0001-53, com sede na Rua Elpídio Belmontes de Barros, 47,Vila Palmira, cidade de Campo Grande, estado de Mato Grosso do Sul, doravante denominada de <b>CONTRATADA MATRIZ</b> e <b><?=$aluno['razao_social']?></b>, devidamente inscrita no CNPJ/MF sob o nº <?=$aluno['cnpj']?>, com sede na <?php echo str_replace('"', '', $aluno['endereco_polo'])?>, <?=$aluno['bairro']?>, <?=$aluno['cidade_polo']?> - <?=$aluno['estado_polo']?> doravante denominada de <b>CONTRATADA POLO</b> e o Aluno identificado e qualificado no quadro próprio abaixo, doravante denominado (a) <b>CONTRATANTE</b> e em conjunto com as CONTRATADAS "Partes", firmam o presente Contrato de Prestação de Serviços Educacionais com base no Estatuto e Regimento da CONTRATADA MATRIZ EDC – Escola de Cursos, aprovado junto a CEE/MS pela deliberaçãoNº 11.636 de 13/03/2019 nas disposições do Código de Defesa do Consumidor, Lei 9.870/99 e no que se segue:
</p>

<table width="100%" border="1" cellspacing="0">
		<tr>
			<th colspan="4" align="left">IDENTIFICAÇÃO DO CURSO</th>
		</tr>
			<tr>
				<td colspan="3">Curso: Educação de Jovens e Adultos, na Etapa do Ensino Médio, na Modalidade Educação a Distância</td>
				<td colspan="1">Registro Acadêmico: <?=$aluno['numero_matricula']?></td>
			</tr>

			<tr>
				<td colspan="3">Combo: <?=$aluno['nome_pacote']?> </td>
				<td colspan="1"></td>
			</tr>
		
			</tr>
			<tr>
				<td>Carga Horária: 1200 horas</td>
				<td>Modalidade: 100% ONLINE</td>
				<td colspan="2">Data de ingresso: <?=date('d/m/Y')?></td>
			</tr>

			<tr>
			<th colspan="4" align="left">IDENTIFICAÇÃO E DADOS PESSOAIS DO(A) CONTRATANTE </th>
			</tr>

			<tr>
			<th colspan="4" align="left">Nome completo: <?=$aluno['nome_aluno']?></th>
			</tr>
			
			<tr>
				<td>R.G. nº <?=$aluno['rg_aluno']?></td>
				<td>Órg. Exp.: <?=$aluno['orgao_emissor']?></td>
				<td>U.F.:<?=$aluno['estado_emissor']?></td>
				<td>C.P.F.: <?=$aluno['cpf_aluno']?></td>	
			</tr>

			<tr>
				<td>Sexo:<?=$aluno['sexo']?></td>
				<td>Sexo:<?=$aluno['estado_civil']?></td>
				<td>Data de nascimento: <?=$aluno['data_de_nascimento']?></td>
				<td>Idade: <?php echo $this->getIdade($aluno['data_de_nascimento'])?></td>	
			</tr>

			<tr>
				<td>Naturalidade: <?=$aluno['cidade_de_nascimento']?></td>
				<td>U.F.: <?=$aluno['estado_de_nascimento']?></td>
				<td colspan="2">Nacionalidade: <?=$aluno['nacionalidade']?></td>
			</tr>

			<tr>
				<td colspan="2">Endereço: <?=$aluno['endereco_aluno']?>  - <?=$aluno['numero_aluno']?> </td>
				<td>Telefone: <?=$aluno['telefone_aluno']?></td>
				<td>CEP: <?=$aluno['cep']?></td>
			</tr>

			<tr>
				<td>Bairro: <?=$aluno['bairro_aluno']?></td>
				<td colspan="2">Cidade: <?=$aluno['cidade_aluno']?></td>
				<td>UF: <?=$aluno['estado_aluno']?></td>
				
			</tr>

			<tr>
				<td colspan="4">Email: <?=$aluno['email_aluno']?></td>
			</tr>

			<tr>
			<th colspan="4" align="left">VALOR DOS MODULOS (ENCARGOS EDUCACIONAIS) </th>
			</tr>

			<tr>
				<td colspan="2">Valor Total do Combo: R$ <?=$aluno['valor_total']?></td>
				<td colspan="2">Data de vencimento da parcela: Todo dia 10<!--?php echo substr($aluno['data_vencimento'], 8)?--></td>
			</tr>

		<tr>
			<td>Valor do Combo c/ bolsa incentivo:R$ 2.859,00</td>
			<td>Valor do Combo c/ bolsa incentivo + Pontualidade:R$ 2.425,00</td>
			<td>Valor do Combo c/ bolsa incentivo + Pontualidade + Convênio ou Cartão Crédito
R$ 2.271,00</td>
			<td>Forma de Pagamento: <?=$aluno['forma_de_pagamento']?></td>
		</tr>

			<tr>
				<?=$this->getCombo($aluno['id_pacote'])?>
			</tr>

	</table>
	<br>
	<p>
	<b>CLÁUSULA 1ª - DO OBJETO DO CONTRATO:</b></p>

	<p align="justify" class="linha">
		1.1.	O presente contrato tem por objeto a prestação de serviços educacionais pelas CONTRATADAS ao (à) CONTRATANTE, de conteúdo determinado, independentemente do dia e mês da matrícula, no curso contratado e identificado no preâmbulo, por meio de aulas e demais atividades, com base no projeto pedagógico, programas de disciplinas e currículos aprovados pela CONTRATADA EDC – Escola de Cursos.</p>

<p>1.2.	As aulas serão ministradas 100% On line em ambiente virtual, tendo em vista a natureza do conteúdo e da técnica pedagógica adotada, sendo aplicado de forma presencial apenas as provas.</p>

<p>1.3.	O (a) CONTRATANTE se submete ao Estatuto; Regimento Geral; Projeto Pedagógico do Curso; demais normas e determinações emanadas das CONTRATADAS, os quais se encontram à disposição do (a) CONTRATANTE para consulta junto à CONTRATADA.</p>

<p>1.4	Caso o aluno tenha matriculado-se em algum COMBO, que é a nomenclatura da união de um ou mais módulos do Ensino Médio, este só poderá iniciar o módulo seguinte após concluir com êxito, conforme descrito no Projeto Pedagógico do Curso da CONTRATADA MATRIZ, o modulo contratado como inicial de seu combo, devendo para tanto estar com todas as demais obrigações com a instituição em dia.</p>

<p>1.5 	Para serviços de renovação de matrícula, transferência, transferência de polo ou unidade e cancelamento de matrícula, o (a) CONTRATANTE poderá solicitá-los pessoalmente no Polo de Apoio ou por outro meio que a CONTRATADA MATRIZ disponibilizar.</p>

<p><b>CLÁUSULA 2ª - DA FORMA DE CONTRATAÇÃO:</b></p>

<p>2.1.	O (a) CONTRATANTE poderá formalizar o Contrato via aceite eletrônico na web, nos termos da Medida Provisória nº 2200-2/2001, parágrafo 2º, artigo 10, telefone (call center), ou por outro meio disponibilizado pela CONTRATADA.</p>

<p>2.2.	Caso o Contrato seja formalizado via web, nos termos da Medida Provisória nº 2200-2/2001, parágrafo 2º, artigo 10, o aceite eletrônico implica na adesão expressa do (a) CONTRATANTE ao Contrato, independentemente de assinatura física das Partes, que expressamente reconhecem a validade e a segurança jurídica da produção documental eletrônica e seu processamento.</p>

<p>2.3.	No caso de formalização do Contrato via telefone (call Center), o (a) CONTRATANTE deverá confirmar posteriormente o aceite via web, nos temos do item 2.2, supra.</p>

<p>2.4.	Em todos os procedimentos realizados via telefone (call center), as Partes autorizam a gravação integral do atendimento realizado, conforme disposto no decreto n. 6.523, de 31 de julho de 2009 e a utilização e divulgação do áudio para quaisquer finalidades legalmente permitidas.</p>

<p>2.5.	A matrícula do (a) CONTRATANTE será efetivada após o seu regular pagamento, observando-se a compensação do cheque caso este seja a forma de pagamento.</p>

<p>2.6.	Havendo quaisquer débitos relativos ao pagamento de parcelas referentes a fase ou modulo letivo anterior, as CONTRATADAS poderão, a seu exclusivo critério, recusar a renovação da matrícula do (a) CONTRATANTE para o semestre seguinte, nos termos da lei nº 9.870/99.</p>

<p>2.7.	O presente Contrato tem a vigência descrita no quadro acima e sua renovação observará o disposto nesse Contrato.</p>

<p>2.8.	As informações pessoais, endereço e atualizações necessárias informadas pelo (a) CONTRATANTE são de sua inteira responsabilidade. O (a) CONTRATANTE deverá comunicar à CONTRATADA quaisquer alterações que venham a ocorrer em seus dados cadastrais, especialmente, a mudança de endereço para correspondência.</p>

<p>2.9.	O (a) CONTRATANTE expressamente declara, para todos os fins de direito e sob as penas da lei, que as suas informações pessoais e demais informações (incluindo, mas não se limitando a informações sobre endereço, estado civil, formação acadêmica, dentre outras ) prestadas para as CONTRATADAS e/ou a quaisquer terceiros no âmbito e em decorrência da contratação da prestação de serviços educacionais (matrícula ou renovação de matrícula), na atual fase e modulo e em quaisquer fase ou módulos que o (a) CONTRATANTE tenha mantido vínculo com as CONTRATADAS, são verdadeiras e condizentes com a realidade dos fatos à época em que tais declarações foram prestadas. A mesma declaração de veracidade se refere a todos os documentos disponibilizados pelo (a) CONTRATANTE às CONTRATADAS.</p>

<p>2.10.	O (a) CONTRATANTE deverá apresentar os documentos necessários e/ou solicitados pelas CONTRATADAS, bem como é responsável pela autenticidade e veracidade destes para fins de matrícula, sua renovação. Na hipótese de eventuais pendências e/ou irregularidades na documentação, apuradas no decorrer do Curso, o (a) CONTRATANTE se obriga a sanar a pendência e/ou irregularidade na documentação, apresentando a documentação suporte à CONTRATADA MATRIZ o mais rápido possível. A CONTRATADA MATRIZ reserva-se no direito de cancelar a matrícula ou não renová-la, caso o (a) CONTRATANTE não tenha sanado as pendências e/ou irregularidades na documentação.</p>

<p>2.11.	No caso de serem constatadas irregularidades na documentação após a conclusão do curso, as CONTRATADAS poderão recusar a emissão de documentos oficiais que tratam da situação acadêmica do (a) CONTRATANTE, até a sua efetiva regularização.</p>

<p>2.12.	O (a) CONTRATANTE, ao formalizar o Contrato via aceite eletrônico na web, confirma e aceita todos e quaisquer termos e condições dos contratos de prestação de serviços das Fases e Módulos referentes ao Curso, independentemente de tais contratos terem sido assinados ou confirmados via aceite eletrônico na web ou telefone.</p>

<p><b>CLÁUSULA 3ª - MENSALIDADES ESCOLARES</b></p>

<p>3.1.	O valor dos serviços educacionais está descrito no preâmbulo deste Contrato (valor do Modulo, bem como a forma de pagamento), e estarão sujeitos a reajustes e revisões anuais, conforme autorizado pela Lei 9.870 de 23.11.99.</p>

<p>3.2.	O valor da mensalidade escolar paga pelo (a) CONTRATANTE compreende apenas serviços coletivos prestados a todos os alunos. Serviços individuais solicitados pelo (a) CONTRATANTE, tais como provas de recuperação, 2ª via de documentos, solicitação de revisão de prova, matrícula em turma especial, disciplinas e estudos dirigidos decorrentes de reprovação, certidões, declarações, atestados, históricos escolares, guias de transferência e certificado em papel especial serão cobrados separadamente do (a) CONTRATANTE, conforme tabela de preço vigente.</p>

<p>3.3.	Na hipótese do CONTRATANTE cursar menos ou mais disciplinas no modulo em relação à grade curricular regular do modulo, a mensalidade escolar devida pelo CONTRATANTE será ajustada tendo como referência, conforme a Lei de Mensalidades Escolares (Lei 9.870/99): (a) o número de disciplinas cursadas; (b) os custos fixos da CONTRATADA e serviços que estarão disponibilizados em tempo integral ao CONTRATANTE, tais como AVA, biblioteca, setores de atendimentos, considerando-se, para os fins previstos nesta cláusula, o percentual de 20% (vinte por cento) sobre o total do modulo correspondente à grade curricular regular, o qual será aplicado integralmente.</p>

<p>3.4.	A CONTRATADA poderá conceder ao (à) CONTRATANTE gratuidade (s) escolar (es) (Bolsa de Estudos), aplicado sobre o valor do modulo para alunos calouros durante o primeiro modulo do Curso, reservando-se a CONTRATADA o direito a cancelar e/ou reduzir o percentual da bolsa de estudos para os módulos subsequentes ao primeiro.</p>

<p>Parágrafo Único: Eventual bolsa de estudos concedida no primeiro modulo, de acordo com o caput desta cláusula, não acumulará com as demais bolsas de estudos oferecidas pela CONTRATADA.</p>

<p>3.5.	O (a) CONTRATANTE candidato a qualquer modalidade de bolsa de estudos deverá efetuar o pagamento das mensalidades escolares até a data de eventual concessão de bolsa de estudos e/ou financiamento pleiteado.</p>

<p><b>CLÁUSULA 4ª - FORMA DE PAGAMENTO E INADIMPLEMENTO</b></p>

<p>4.1.	As mensalidades escolares subsequentes à matrícula deverão ser pagas pelo (a) CONTRATANTE até a data descrita no preâmbulo do presente Contrato, na rede bancária por meio de boleto, disponível nos setores das CONTRATADAS específicos para atendimento ao aluno, devendo o (a) CONTRATANTE providenciar sua obtenção e pagamento no prazo contratual.</p>

<p>4.2.	Na hipótese de atraso no pagamento da mensalidade escolar, seu valor será acrescido de multa de 2% (dois por cento), atualização monetária e juros moratórios de 1% (um por cento) ao mês.</p>

<p>4.3.	Caso o (a) CONTRATANTE seja beneficiário de bolsas de estudos parcial e atrase o pagamento da mensalidade escolar em determinado mês (pagamento após o vencimento), perderá automaticamente a bolsa de estudos (gratuidade) no mês em que houver o atraso, ficando responsável pelo pagamento da mensalidade escolar no valor integral e sem prejuízo da cobrança dos encargos legais, conforme previsto neste Contrato.</p>

<p>4.4.	A CONTRATADA poderá, em caso de inadimplência do CONTRATANTE, informar o nome do(a)	CONTRATANTE ao serviço de proteção ao crédito – SPC e demais órgãos de restrição ao crédito.</p>

<p>4.5.	A CONTRATADA, em caso de inadimplência, poderá, ainda: a) contatar o (a) CONTRATANTE via e-mail, correspondências, mensagem de texto e/ou ligação telefônica; e b) promover a competente cobrança dos valores, por meio do seu departamento financeiro, empresas especializadas ou, ainda, pela via judicial.

<p>4.6.	Os custos e as despesas decorrentes do inadimplemento pelas Partes de quaisquer obrigações deste Contrato, incluindo-se as perdas e danos e honorários advocatícios, serão suportados pela parte que deu causa ao inadimplemento. Os honorários advocatícios, em caso de atuação administrativa, quando couberem, serão limitados a 10% (dez por cento) sobre o valor do débito atualizado.</p>

<p>4.7.	O (a) CONTRATANTE, com base no artigo 290 do Código Civil, declara-se expressamente ciente que os créditos relativos às mensalidades escolares, taxas de serviços administrativos e acordos, oriundas deste Contrato poderão ser objeto de cessão de crédito, independentemente de anuência prévia do (a) CONTRATANTE.</p>

<p>4.8.	Nos termos do artigo 368 da Lei nº. 10.406/2002 (Código Civil Brasileiro), o (a) CONTRATANTE, neste ato, autoriza e concorda que a CONTRATADA realize a compensação automática de eventuais créditos e débitos decorrentes do pagamento e/ou recebimento de encargos educacionais e/ou quaisquer outros valores devidos de parte à parte em razão da prestação dos serviços educacionais, podendo tal compensação ocorrer em mensalidades escolares pagas diretamente pelo (a) CONTRATANTE à CONTRATADA; em parcelas ou saldo de parcelamentos privados concedidos pela CONTRATADA ao (à) CONTRATANTE.</p>

<p><b>CLÁUSULA 5ª – DA VIGÊNCIA</b></p>

<p>5.1.	O Contrato tem duração de 1 (um) MODULO letivo e será prorrogado por igual período até a conclusão do Curso pelo CONTRATANTE, observando-se as correções da mensalidade escolar admitidas pela legislação em vigor, desde que: (a) o Contrato não seja alterado pelas CONTRATADAS;</p>

<p>
(b)	o (a) CONTRATANTE efetue o pagamento da matrícula relativa ao MODULO letivo subsequente e não existam mensalidades em atraso junto à CONTRATADA.</p>

<p>5.2.	O pagamento da matrícula para o MODULO subsequente (rematrícula) representa o aceite expresso do (a) CONTRATANTE para adesão ao Contrato vigente e seu interesse em manter o vínculo com a contratada por mais um período letivo.</p>

<p><b>CLÁUSULA 6ª – EXTINÇÃO DO CONTRATO</b></p>

<p>6.1.	O Contrato poderá ser rescindido nas seguintes hipóteses: a) por desistência ou trancamento, devidamente formalizados junto à CONTRATADA; b) pela CONTRATADA, por desligamento nos termos do Regimento Geral; c) por descumprimento contratual de quaisquer das Partes.</p>

<p>6.2.	O (a) CONTRATANTE poderá solicitar a desistência do Curso em até 30 (trinta) dias da Matricula do MODULO, junto à CONTRATADA, ficando responsável pelo pagamento integral das mensalidades escolares após esse prazo.</p>

<p>6.3.	A não participação e/ou não comparecimento do (a) CONTRATANTE às aulas ou, prova, ou ainda, a sua desistência (abandono) do Curso sem a devida formalização junto à CONTRATADA, não o desobriga do pagamento dos valores contratos vencidos (a vencer) até o término do semestre letivo, considerando que a vaga permanecerá à disposição do (a) CONTRATANTE até o seu término.</p>

<p>6.6.	Considerando que as CONTRATADAS disponibilizaram ao (à) CONTRATANTE a vaga durante todo o período letivo, a rescisão deste Contrato pelo (a) CONTRATANTE (desligamento comunicado pelo CONTRATANTE à CONTRATADA) antes do término do modulo letivo em curso, implicará em multa a favor da CONTRATADA no montante correspondente a 20% (vinte por cento) das mensalidades escolares vincendas (a vencer) até o término do modulo em curso, desconsiderando-se eventual bolsa de estudos concedida pela CONTRATADA ao (à) CONTRATANTE.</p>

<p>6.7.	Caso o (a) CONTRATANTE seja beneficiário (a) de bolsa de estudos parcial ou integral durante o modulo letivo e venha a desistir do Curso antes do término do modulo cursado, o (a) CONTRATANTE deverá restituir à CONTRATADA o valor correspondente à bolsa de estudos recebida, tendo em vista que o pressuposto da bolsa de estudos é o (a) CONTRATANTE concluir o período letivo em que for beneficiário da mesma.</p>

<p>6.8.	A bolsa de estudos parcial ou integral concedida pela CONTRATADA ao (à) CONTRATANTE terá vigência tão somente durante o modulo letivo em que for concedida, a partir da data de sua concessão, sendo que a renovação da matrícula para o período subsequente não representará a manutenção automática da bolsa de estudos para o CONTRATANTE.</p>

<p><b>CLÁUSULA 7ª - USO DE SENHA E ACESSO AO PORTAL DE SERVIÇOS DO ALUNO</b></p>

<p>7.1. Qualquer senha de acesso a sistemas da CONTRATADA recebida pelo (a) CONTRATANTE é de seu uso pessoal e intransferível.</p>

<p><b>CLÁUSULA 8ª – DAS DISPOSIÇÕES GERAIS</b></p>

<p>8.1.	A CONTRATADA não se responsabiliza por eventual perda, dano e/ou furto de aparelhos eletrônico, incluindo telefones celulares, ou quaisquer outros bens, incluindo valores, do (a) CONTRATANTE em sua
(s) unidade (s) escolar (es).</p>

<p>8.2.	É de inteira responsabilidade do (a) CONTRATANTE o cuidado com o uso, manuseio e guarda de equipamentos, aparelhos e materiais de sua propriedade, no (s) recinto (s) da CONTRATADA, ou em outros locais onde se desenvolvam as atividades do curso, ficando a CONTRATADA isenta de qualquer responsabilidade de substituição ou ressarcimento dos mesmos, em caso de danificação, perda e furto.</p>

<p><b>CLÁUSULA 9ª –DO FORO</b></p>

<p>9.1. Para dirimir questões oriundas do Contrato, fica eleito o foro de Campo Grande-MS</p>

<p>E, por estarem justos e contratados, assinam o presente instrumento em duas vias de igual teor e forma, na presença das testemunhas abaixo, para que se produzam seus efeitos jurídicos.</p>

<br>
<br>
<br>
<br>
	
<p>CAMPO GRANDE - MS <?php echo date('d/m/Y')?></p>
<br>
<br>
<br>

<table align="center">
		<tr>
		<td colspan="2">______________________________________________________________<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <center> <?=$aluno['nome_aluno']?></center></td>
		</tr>
</table>
<br>
<br>

 <table align="center">
	<tr>

		<td colspan="2">___________________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <center> GEMS CENTRO EDUCACIONAL MS LTDA</center></td>
		<td class="3"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
		<td colspan="2">___________________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <center><?=$aluno['razao_social']?></center></td>
	

	</tr>
</table>
<br>
<br>
<p align="center"><b>Testemunhas</b></b></p>
 <table align="center">
		<td colspan="2">_____________________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
		<td class="3"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
		<td colspan="2">_____________________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	

	</tr>
</table>

 
<?php endforeach; ?>
</body>
</html>