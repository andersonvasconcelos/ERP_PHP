<?php
/*
* Criando e exportando planilhas do Excel
* /
*/
header('Content-Type: text/html; charset=utf-8');
// Definimos o nome do arquivo que será exportado
$arquivo = 'academico.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td>Polo</td>';
$html .= '<td>RA</td>';
$html .= '<td>Aluno</td>';
$html .= '<td>CPF</td>';
$html .= '<td>Pacote</td>';
$html .= '<td>Curso</td>';
$html .= '<td>Situação</td>';
$html .= '<td>Data Matricula</td>';
$html .= '<td>Endereço</td>';
$html .= '<td>Numero</td>';
$html .= '<td>Bairro</td>';
$html .= '<td>Cidade</td>';
$html .= '<td>Estado</td>';
$html .= '<td>CEP</td>';
$html .= '<td>Celular</td>';
$html .= '<td>Telefone Comercial </td>';
$html .= '<td>Telefone Residencial </td>';
$html .= '<td>Email</td>';
$html .= '<td>Responsavel</td>';
$html .= '</tr>';
foreach($lista as $item){                      
$html .= '<tr>';
$html .= '<td>'.$item->apelido.'</td>';
$html .= '<td>'.$item->numero_matricula.'</td>';
$html .= '<td>'.$item->nome_aluno.'</td>';
$html .= '<td>'.$item->cpf_aluno.'</td>';
$html .= '<td>'.$item->nome_pacote.'</td>';
$html .= '<td>'.$item->nome_curso.'</td>';
$html .= '<td>'.$item->situacao.'</td>';
$html .= '<td>'.$item->data_matricula.'</td>';
$html .= '<td>'.$item->endereco_aluno.'</td>';
$html .= '<td>'.$item->numero_aluno.'</td>';
$html .= '<td>'.$item->bairro_aluno.'</td>';
$html .= '<td>'.$item->cidade_aluno.'</td>';
$html .= '<td>'.$item->estado_aluno.'</td>';
$html .= '<td>'.$item->cep.'</td>';
$html .= '<td>'.$item->telefone_aluno.'</td>';
$html .= '<td>'.$item->telefone_comercial.'</td>';
$html .= '<td>'.$item->telefone_residencial.'</td>';
$html .= '<td>'.$item->email_aluno.'</td>';
$html .= '<td>'.$item->resp.'</td>';
$html .= '</tr>    ';
}
$html .= '</table>';


// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;