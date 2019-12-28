<?php


$pedido = json_encode($pedido);

$teste = $this->curlPj($url, $pedido, $header);
$r = json_decode($teste);

header("location:$r->linkBoleto");
exit();
