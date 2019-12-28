<?php 
try{

$i = 1;


  foreach($data as $key => $dt){
  $data_vencimento = date('m/d/Y', strtotime($dt));
  $rand = str_replace('-', '', $cpf_cliente);
  $rand = str_replace('.', '', $rand);
  $rand = $rand.$i;

    if(is_array($valor))
    {
    $valo = $valor[$key];
    }else
    {
      $valo = $valor;
    }

$pedido = array(
  "vencimento" => $data_vencimento,
  "valor" => $valo,
  "juros" => 1,
  "multa" => 2,
  "desconto" => 0,
  "nome_cliente" => $nome_cliente,
  "cpf_cliente" => $cpf_cliente,
  "endereco_cliente" => $endereco_cliente,
  "numero_cliente" => $numero_cliente,
  "bairro_cliente" => $bairro_cliente,
  "cidade_cliente" => $cidade_cliente,
  "estado_cliente" => $estado_cliente,
  "cep_cliente" => $cep_cliente,
  "logo_url" => $logo,
  "texto" => "Educação de Jovens e Adultos",
  "grupo" => $cpf_cliente,
  "pedido_numero" => $rand,
  "webhook" => "http://www.educacaojovenseadultos.com.br/web/index.php",
  "split" => $split
);

$pedido = json_encode($pedido);

$teste = $this->curlPj($url, $pedido, $header);

$r = json_decode($teste);

 if ($r->status == '500' || $r->status == '400' || $r->status == '401' || $r->status == '403' ) {
  print_r($pedido);
  exit($teste);
 } 

 elseif ($r->status == '201'){

    $id_unico = $r->id_unico;
    $link_boleto = $r->linkBoleto;
    $linkGrupo = $r->linkGrupo;
    $linhaDigitavel = $r->linhaDigitavel;

    $this->salvarBoletos($aluno_id, $data_vencimento, $fpg, $valo, $i, $id_unico, $link_boleto, $linkGrupo, $rand, $empresa_convenio);

  }

  $i++;
}

echo $teste;

} catch (\Exception $e){
    exit(500);
}
