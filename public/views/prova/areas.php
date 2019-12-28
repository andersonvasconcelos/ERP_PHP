<html>
    <head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 2cm;
                margin-left: 1.5cm;
                margin-right: 1.5cm;
                margin-bottom: 2cm;
                font-size: 14px;

            }
            .linha{
            	font-size: 14px !important;
            	font-weight: bold !important;
                color: #000 !important;
                 }

            .linha img{
                display: inline-blcok;
                margin:2%;
                vertical-align:top;
            }
         
            .resp{
                font-size: 12px;
                color: #2d2d2d;
                display: inline-table;
            }

            /** Define the header rules **/
            .header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 4cm;

                /** Extra personal styles **/
                background-image: url(public/assets/img/teste.png);
                background-repeat: no-repeat;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
                text-align: center;

                /** Extra personal styles **/
                
            }

            .linhal{
                background-color: #d34817;
                color: white;
                text-align: center;
                line-height: 2.5cm;
                height: 10px;
                margin-bottom: 5px;
            }

              .topu{
                text-align: center;
                margin-bottom: 5px;
            }
            .orient{float: left;margin-top: 180px; line-height: 20px; margin-bottom: 40px;}
            .assinatura{float: right; margin-top: 30px; line-height: 9px;}
           
            .pagenum:before {content: counter(page);} 
            footer .pagenum:before {content: counter(page);} 

            </style>
         </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <!--header>
           
        </header-->

          <footer>
          <div class="linhal">
          </div> 
         <div class="pagenum-container">Página <span class="pagenum"></span></div>
        </footer>

<main>
	<div class="header"></div>
	<div class="topu">
		<img src="<?php echo URL_IMG.'logoprova.png'?>">
		<div class="titulo">		
			<p><b>CADERNO DE PROVA PRESENCIAL</b></p>
		</div>
	</div> 
    <p align="center">Educação de Jovens e Adultos, na Etapa do Ensino Médio, na Modalidade Educação a Distância</p>
    
<table width="100%" border="1" cellspacing="0">
        <tr>
            <td>CURSO: <?=mb_strtoupper($alunos['nome_curso'],'UTF-8')?></td>
        </tr>
         <tr>
            <td>NOME: <?=$alunos['nome_aluno']?></td>
        </tr>
        <tr>
            <td>CPF: <?=$alunos['cpf_aluno']?> </td>
        </tr>
        <tr>
            <td>PROVA: <?=mb_strtoupper($alunos['nome_area'],'UTF-8')?></td>
        </tr>
        <tr>
            <td>DISCIPLINA: <?=mb_strtoupper(substr($alunos['nome_modulo'], 8), 'UTF-8')?></td>
        </tr>
         <tr> 
            <td>DATA: <?php echo $this->formatData($alunos['data_prova'])?></td>
        </tr>
        <tr>
            <td>NOTA:  </td>
        </tr>      
    </table>

<br>
<br>

	<div class="assinatura">
		 <table>
		    <tr>
		    	<td colspan="2">___________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center> <?=$alunos['nome_aluno']?></center></td>
		    </tr>
            <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
            <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
            <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
            <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
		    <tr>
		        <td colspan="2">___________________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <center>ASSINATURA DO TUTOR</center></td>
		    </tr>
		</table> 
	</div>

	<div class="orient">
		<strong>ORIENTAÇÃO GERAL PARA A PROVA</strong>
			
		<ul>
    			<li>Verifique se seus dados conferem com os que aparecem nesse Caderno de Questão; em caso afirmativo, assine-o e leia atentamente as instruções para o seu preenchimento;</li>
    			<li>A prova vale 10 (dez) pontos, a média para aprovação, é 5,0 (cinco) pontos em cada componente curricular;</li>
    			<li>Não é permitido fazer uso de instrumentos auxiliares ou qualquer dispositivo eletrônico, inclusive telefone celular, ou ainda portar material que sirva de consulta;</li>
    			<li>Cada questão de múltipla escolha apresenta entre quatro a cinco alternativas de resposta, sendo apenas uma delas a correta;</li>
    			<li>O tempo disponível para esta prova, é de 2 (duas) horas;</li>
    			<li>Deixe sob a mesa apenas lápis, caneta esferográfica azul ou preta e borracha;</li>
    			<li>Quando terminar a prova, entregue ao tutor de sala;</li> 
    			<li>A prova deve estar devidamente assinada, caso contrário poderá ser invalidada;</li> 
    			<li>A última folha é destinada como rascunho, caso necessite.</li>
		</ul>

		<br>		
	</div>
    <p align="right"><strong>
        BOA PROVA!!!!
        </strong></p>
        <br>
        <br>

<br>
<?php 
    $ex = json_decode($alunos['exercicios_id']);
    $total = count($ex);

    $i = 1;
     
        foreach ($ex as $id_exercicio) {
        $r = $this->respostas($id_exercicio);
      
        echo '<p class="linha">';
        echo $i.'.'.strip_tags($r['pergunta'], '<img>');
        echo '</p>';

        
?>
    <p class="resp">A.&nbsp;( &nbsp;&nbsp; ) <?=$r['opcao1']?></p>

    <p class="resp">B.&nbsp;( &nbsp;&nbsp; ) <?=$r['opcao2']?></p>

    <p class="resp">C.&nbsp;( &nbsp;&nbsp; ) <?=$r['opcao3']?></p>

    <p class="resp">D.&nbsp;( &nbsp;&nbsp; ) <?=$r['opcao4']?></p>

    <?php if(!empty($r['opcao5'])){?>
    <p class="resp">E.&nbsp;( &nbsp;&nbsp; ) <?=$r['opcao5']?></p>
    <?php }

    //echo $this->mudarResposta($r['resposta']);
    ?>
<br>
<hr>

<?php $i++;} 

?>
</main>
  </body>
</html>
