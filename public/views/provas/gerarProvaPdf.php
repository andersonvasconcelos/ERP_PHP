<?php

require_once 'views/docs/vendor/autoload.php';

// verificar a página 

// referenciando o namespace do dompdf

use Dompdf\Dompdf;

// instanciando o dompdf

$dompdf = new Dompdf();

//lendo o arquivo HTML correspondente

$html = file_get_contents('https://erp.portaleja.com.br/prova/provaPdf/'.$id);

//inserindo o HTML que queremos converter

$dompdf->loadHtml($html);

// Definindo o papel e a orientação

$dompdf->setPaper('A4', 'portrait');
// Renderizando o HTML como PDF

$dompdf->render();


// Enviando o PDF para o browser

$dompdf->stream($pagina.'_'.$id.'.pdf', array( 'Attachment' => 0 ));

exit;