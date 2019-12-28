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
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                font-size: 14px;

            }
            .linha{
            	font-size: 14px !important;
            	font-weight: bold !important;
                color: #000 !important;
                line-height: 0.8cm;
                
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
                background-image: url(assets/img/teste.png);
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
                height: 3cm;
                text-align: center;                
            }

            .pagenum-container img{
                 /** Extra personal styles **/
                 background-image: url(assets/img/teste.png);
                 background-repeat: no-repeat;
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
            .orient{float: left;margin-top: 180px; line-height: 25px;}
            .assinatura{text-align: center; margin-top: 30px; line-height: 9px;}
            .assinatura tr{margin: 0 auto; text-align: center; }
           
            </style>
         </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <!--header>
           
        </header-->

          <footer>
          <div class="linhal"></div> 
         <div class="pagenum-container">          
            EDC - Escola de Cursos <br>
            GEMS – Centro Educacional MS Ltda – EPP, CNPJ: 18.328.380/0001-53<br>
            Elpidio Belmontes de Barros, nº 47 – Vila Palmira<br>
            Fone: (67) 3363-0010 – site: www.portaledc.com.br 
        </div>
        </footer>

<main>
	<div class="header"></div>
	<div class="topu">
		<img src="<?=BASE_URL?>assets/img/logoprova.png">
		<div class="titulo">		
			<p><b>CURSO DE EDUCAÇÃO DE JOVENS E ADULTOS, NA ETAPA DO ENSINO MÉDIO, NA MODALIDADE EDUCAÇÃO A DISTÂNCIA</b></p>
		</div>
	</div> 
    <p align="center">Autorizado pela Deliberação CEE/MS N. º 11.636, de 13 de março de 2019 -  Publicada no D.O. n. 9.865, de 20/03/2019, pag. 10.</p>

    <br>
    <h3 align="center">DECLARAÇÃO</h3>


<br>
<br>
<?php foreach ($alunos as $a) {?>

    <p class="linha" align="justify">Eu, Fellipe de Lima Cuengas, Diretor Pedagógico da EDC – Escola de Cursos, sediada na   Rua Elpídio Belmontes de Barros, nº 47, Vila Palmira, Município de Campo Grande/MS, declaro, para fim exclusivo de ingresso neste Curso de Educação de Jovens e Adultos, no Módulo Inicial da Fase I na etapa do Ensino Médio, nesta escola que,  <?php echo $a['nome_aluno']?>, portador (a) do RG n.<?php echo $a['rg_aluno']?>, Órgão Expedidor: <?php echo $a['orgao_emissor']?>, UF.: <?php echo $a['estado_emissor']?>, comprovou,  por meio de avaliações, ter o domínio dos conhecimentos referente a etapa  do Ensino Fundamental.

</p>
<p>Para que surta os efeitos necessários, assino a presente.</p>
<?php } ?>
<br>
<br>

<p align="right">Campo Grande/MS, ______/_______________/_______.
</p>
	
        <br>
        <br>

<br>
<div class="assinatura">
        
                <p align="center">__________________________________<br>
                    <center>Fellipe de Lima Cuengas<br> <br>Diretor Pedagógico</center>
    </div>

</main>
  </body>
</html>
