<?php
error_reporting(0);
require '../../api/vendor/autoload.php';
 
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
 
$clientId = 'Client_Id_b10b6fc52359cd87c02a249c54e3cf35e83604dc';
$clientSecret = 'Client_Secret_076820f9b30eed1253b6d4e3b2ff338fd6dc0df6';
 
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];
 
/*
* Este token será recebido em sua variável que representa os parâmetros do POST
* Ex.: $_POST['notification']
*/
$token = $_POST["notification"];
 
$params = [
  'token' => $token
];
 
try {
    $api = new Gerencianet($options);
    $chargeNotification = $api->getNotification($params, []);
  // Para identificar o status atual da sua transação você deverá contar o número de situações contidas no array, pois a última posição guarda sempre o último status. Veja na um modelo de respostas na seção "Exemplos de respostas" abaixo.
  
  // Veja abaixo como acessar o ID e a String referente ao último status da transação.
    
    // Conta o tamanho do array data (que armazena o resultado)
    $i = count($chargeNotification["data"]);
    // Pega o último Object chargeStatus
    $ultimoStatus = $chargeNotification["data"][$i-1];
    // Acessando o array Status
    $status = $ultimoStatus["status"];
    // Obtendo o ID da transação    
    $charge_id = $ultimoStatus["identifiers"]["charge_id"];
    // Obtendo a String do status atual
    $statusAtual = $status["current"];
    
    // Com estas informações, você poderá consultar sua base de dados e atualizar o status da transação especifica, uma vez que você possui o "charge_id" e a String do STATUS
  
    echo "O id da transação é: ".$charge_id." seu novo status é: ".$statusAtual;
 
    //print_r($chargeNotification);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}