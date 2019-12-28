<?php
/*
* Criando e exportando planilhas do Excel
* /
*/
// Definimos o nome do arquivo que será exportado
header('Content-Type: text/html; charset=utf-8');

$arquivo = 'financeiro.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td>Polo</td>';
$html .= '<td>RA</td>';
$html .= '<td>Aluno</td>';
$html .= '<td>Cpf</td>';
$html .= '<td>Curso</td>';
$html .= '<td>Situação</td>';
$html .= '<td>Forma Pagamento</td>';
$html .= '<td>Parcela</td>';
$html .= '<td>Qtd Parcela</td>';
$html .= '<td>Valor</td>';
$html .= '<td>Vencimento</td>';
$html .= '<td>Status</td>';
$html .= '<td>Data Pagamento</td>';
$html .= '<td>Recebido</td>';
$html .= '<td>Repasse Matriz </td>';
$html .= '<td>Repasse Polo </td>';
$html .= '<td>Taxas Iugu</td>';
$html .= '<td>Convênio</td>';
$html .= '<td>Responsavel</td>';
$html .= '</tr>';
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
                      
$html .= '<tr>';
$html .= '<td>'.$item->apelido.'</td>';
$html .= '<td>'.$item->ra.'</td>';
$html .= '<td>'.$item->nome_aluno.'</td>';
$html .= '<td>'.$item->cpf_aluno.'</td>';
$html .= '<td>'.$item->nome_pacote.'</td>';
$html .= '<td>'.$item->situacao.'</td>';
$html .= '<td>'.$item->fdpgto.'</td>';
$html .= '<td>'.$item->parcela.'</td>';
$html .= '<td>'.$item->qtd.'</td>';
$html .= '<td> R$'.number_format($item->valor, '2', ',', '.').'</td>';
$html .= '<td>'.date('d/m/Y', strtotime($item->vencimento)).'</td>';
$html .= '<td>'.$this->faturaStatus($iugu['status']).'</td>';
$html .= '<td>'.$dt_pgt.'</td>';
$html .= '<td>'.$iugu['paid'].'</td>';
$html .= '<td>'.$comissao.'</td>';
$html .= '<td> R$ '.number_format($sub_total, '2', ',', '.').'</td>';
$html .= '<td>'.$taxa.'</td>';
$html .= '<td>'.$item->convenio.'</td>';
$html .= '<td>'.$item->responsavel.'</td>';
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