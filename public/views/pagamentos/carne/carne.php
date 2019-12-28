<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="author" content="Anderson Vasconcelos">
    <title>Carnê</title>
    <link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="<?=URL_CSS?>carne.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
  <div class="bto">
    Ao Imprimir o carnê certifique-se se a impressão está ajustada à página
    <br>
    <br>
    <button onclick="window.print()">IMPRIMIR CARNÊ</button>
    &nbsp;
    <?php /* echo "<a href=\"capa.php?endereco={$endereco_empresa}&tel={$tel_empresa}&logo={$logo}\" target=\"_blank\">IMPRIMIR CAPA DO CARNE</a>"; */?>
  </div>
  <div class="container-fluid">

<?php 
foreach ($boletos as $b) {

// Pegar dados da fatura na IUGU// 
  $token = json_decode($b->iugu);
  $token = $token->live_api_token;
  $id = $b->id_fatura;
  $iugu = $this->getFatura($id, $token); 

  if ($iugu->status == 'pending') {
  
  /*echo "<pre>";
  print_r($iugu);
  echo '</pre>';*/

// Pegar os descontos da fatura
$desconto = $iugu->total_cents - $iugu->early_payment_discounts[0]->value_cents;
$desconto = number_format($desconto / 100, 2, '.', ',');

$nome = $b->nome_aluno;
$endereco = $b->endereco_aluno;
$cpf = $b->cpf_aluno; 
$valor = $b->valor;
$qtd = $b->qtd;
$vence = $b->vencimento;
$ra = $b->ra;
$curso = $b->nome_pacote;
$nome_empresa = $b->razao_social;
$cnpj = $b->cnpj;
$endereco_empresa = $b->nome_polo;
$hoje = $this->formatData($b->data);
$count = $b->parcela;
$obs = 'Efetuando o pagamento até a data de vencimento será concedido desconto pontualidade.<br>
Para pagamento até dia ' . $this->formatData($vence) .  ' receber o valor de R$ ' . $desconto;

// Pegar dados 
$iugu = json_decode($b->cod);
$cod = $iugu->digitable_line;
$barcode = $iugu->barcode_data;
$codigo = $iugu->barcode;?>

  <!-- PARCELA -->
  <div class="parcela">
    <div class="grid">
      <div class="col3">
        <div class="destaca">
          <table width="100%" class="table table-bordered">
            <tr>
              <td colspan="3">
               <img src="<?=URL_IMG?>logoprova.png" height="31" style="float: left;">
            </tr>
           <tr>
              <td colspan="3">
                <small><strong>Nome Aluno</strong></small>
                <br><?=$nome?>              </td>
            </tr>
               <tr>
              <td>
                <small><strong>Ra</strong></small>
                <br><?=$ra?>              </td>
              <td colspan="2">
                <small><strong>CPF</strong></small>
                <br><?=$cpf?>              </td>
            </tr>
             <tr>
              <td colspan="3">
                <small><strong>Curso</strong></small>
                <br><?=$curso?>              </td>
            </tr>
              <tr>
              <td colspan="3">
                <small><strong>Vencimento</strong></small>
                <br><?=$this->formatData($vence)?> </td>
            </tr>
              <tr>
              <td colspan="3">
                <small><strong>Valor</strong></small>
                <br>R$ <?=$valor?></td>
            </tr>
            <tr>
              <td colspan="3">
                <small><strong>Parcela</strong></small>
                <br><?=$count?> / <?=$qtd?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col9">
        <table class="table table-bordered">
             <tr>
            <td colspan="2"><img src="<?=URL_IMG?>logoprova.png"></td>
            <td colspan="3"><strong>Código do Boleto</strong><br><?=$cod?></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Empresa Cedente</strong><br><?=$nome_empresa?></td>
            <td colspan="3"><strong>CNPJ</strong><br><?=$cnpj?></td>
          </tr>
         <tr>
            <td colspan="2"><strong>Nome Aluno</strong><br><?=$nome?></td>
            <td><strong>CPF</strong><br><?=$cpf?></td>
            <td colspan="2"><strong>Registro do Aluno</strong><br><?=$ra?></td>
          </tr>
          <tr>
           <td colspan="2">Curso<br><?=$curso?></td>
           <td>Valor: <br><?=$valor?> </td>
           <td>Parcela: <br><?=$count?> / <?=$qtd?></td>
           <td>Vencimento<br><?=$this->formatData($vence)?></td>
          </tr>
          <tr>
            <td colspan="5">
            <div class="nome"><?=$obs?></div></td>
          </tr>
            <tr>
            <td colspan="5" align="center">
              <img src="<?=$codigo?>" witd="100%"><br> <?=$barcode?> </td>
            </tr>
        </table>
      </div>
    </div>
  </div>
<?php 
  if (empty($count_quebra_pg)) { $count_quebra_pg = 0; } // Preenche Variavel
  $count_quebra_pg++; // contagem de loop
  if ($count_quebra_pg == 3) { // Adiciona quebra a cada 4 loops e zera a variavel
    echo "<div class=\"quebra-pagina\"></div>";
    $count_quebra_pg = 0;
  }
  # code...
  }
 } ?>
</div>
   </body>
</html>