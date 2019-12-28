<?php
error_reporting(0);
require 'api/vendor/autoload.php';

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$clientId = 'Client_Id_9e37d2ea5e5114dfdfea4c96541b96c00b7496c2';
$clientSecret = 'Client_Secret_8cef8f81c27e43afb63baa4a5f65a387b602c72a';
$poloParceiro = $id_conta;
$metadata = array(
    'notification_url'=>'https://portaleja.com.br/erp/views/notification/gerencia.php');
$id_aluno = addslashes(trim($_POST['id_aluno']));

if (isset($_POST)) {

    $options = [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'sandbox' => false // altere conforme o ambiente (true = desenvolvimento e false = produção)
    ];

	$repass_1 = [
		'payee_code' => $poloParceiro, //$_POST["codigo_usuario1"], // identificador da conta Gerencianet (repasse 1)
		'percentage' => 5000 //(int)$_POST["porcentagem1"] // porcentagem de repasse (2500 = 25%)
	];

	$repasses = [
	  $repass_1
	];

    $item_1 = [
        'name' => $_POST["descricao"],
        'amount' => (int) $_POST["quantidade"],
        'value' => (int) $_POST["valor"],
		'marketplace'=>array('repasses'=>$repasses)
    ];

    $items = [
        $item_1
    ];

    $body = [
        'items' => $items,
        'metadata' => $metadata
    ];

    $api = new Gerencianet($options);
    $charge = $api->createCharge([], $body);
     //var_dump($charge);die();
    if ($charge["code"] == 200) {

        // Formatando a data, convertendo do estino brasileiro para americano.
        $data_brasil = DateTime::createFromFormat('d/m/Y', $_POST["nascimento"]);
		
        $params = ['id' => $charge["data"]["charge_id"]];
        $customer = [
            'name' => $_POST["nome_cliente"],
            'cpf' => $_POST["cpf"],
            'phone_number' => $_POST["telefone"],
            'email' => $_POST["email"],
            'birth' => $data_brasil->format('Y-m-d')
        ];

        $paymentToken = $_POST["payament_token"];

        $billingAddress = [
            'street' => $_POST["rua"],
            'number' => $_POST["numero"],
            'neighborhood' => $_POST["bairro"],
            'zipcode' => str_replace("-", "", $_POST["cep"]),
            'city' => $_POST["cidade"],
            'state' => $_POST["estado"],
        ];

        $creditCard = [
            'installments' => (int) $_POST["installments"],
            'billing_address' => $billingAddress,
            'payment_token' => $paymentToken,
            'customer' => $customer
        ];

        $payment = [
            'credit_card' => $creditCard
        ];

        $body = [
            'payment' => $payment
        ];

        try {
            $api = new Gerencianet($options);
            $charge = $api->payCharge($params, $body);
  
             $id_unico = $charge['data']['charge_id'];
             $valor = $charge['data']['total'];
             $parcela = $charge['data']['installments'];
             $valorp = $charge['data']['installment_value'];


            $this->salvarCartao($id_aluno, $valor, $parcela, $id_unico);

            echo json_encode($charge);


        } catch (GerencianetException $e) {
            print_r($e->code);
            print_r($e->error);
            print_r($e->errorDescription);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}