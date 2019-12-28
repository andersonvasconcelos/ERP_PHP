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
                margin-top: 4cm;
                margin-left: 2cm;
                margin-right: 2cm;
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
            .orient{float: left;margin-top: 180px; line-height: 25px;}
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
        </footer>

<main>
	<div class="header"></div>
	<div class="topu">
		<img src="<?=URL_IMG?>logoprova.png">
		<div class="titulo">		
			<p><b>Boletim Escolar</b></p>
		</div>
	</div> 
    <p align="center">Educação de Jovens e Adultos, na Etapa do Ensino Médio, na Modalidade Educação a Distância</p>
<table width="100%" border="0" cellspacing="0">
    <tr>
<td>CPF:</td>
<td><?=$notas->cpf_aluno?></td>
<td>CURSO:</td>
<td><?=$notas->nome_curso?></td>
<td>DATA:</td> 
<td><?=date('d/m/Y')?></td>
</tr>
</table>
<hr>

<?php if ($notas->area_id == 5) {?>

<table width="100%" border="1" cellspacing="0">
        <tr>
            <th>Nome</th>
            <th>RA</th>
            <th>Nota</th>
        </tr>
            <tr>
                <td><?=$notas->nome_aluno?></td>
                <td><?=$notas->numero_matricula?></td>
                <td><?=$notas->nota?></td>
            </tr>
    </table>
<?php } else{?>
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <th>Nome</th>
            <th>RA</th>
            <th>Ano</th>
            <th>Linguagens</th>
            <th>Matemática</th>
            <th>Ano</th>
            <th>Ciências Humanas</th>
            <th>Ciências Natureza</th>
        </tr>
            <tr>
                <td><?=$notas->nome_aluno?></td>
                <td><?=$notas->numero_matricula?></td>
                <td><?=$notas->nota?></td>
                <td><?=$notas->nota?></td>
                <td><?=$notas->nota?></td>
                <td><?=$notas->nota?></td>
                <td><?=$notas->nota?></td>
                <td><?=$notas->nota?></td>
            </tr>
    </table>
    <?PHP } ?>
</main>
  </body>
</html>
