<?php 
namespace Models;
use Core\Model;
use Iugu;
use Iugu_Charge;
use Iugu_Account;
use Iugu_Invoice;
use Iugu_Customer;
use PDO;

require_once ('api/vendor/iugu-php/lib/Iugu.php');

class SubContas extends Model{

public function getContas()
	{
		$sql = "SELECT conta_matriz.*, polos.apelido FROM conta_matriz
		INNER JOIN polos ON id_polo = admin_id";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}

	public function getContasId($id)
	{
		$sql = "SELECT conta_matriz.*, polos.apelido FROM conta_matriz
		INNER JOIN polos ON id_polo = admin_id
		WHERE id = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch(PDO::FETCH_ASSOC);
		}
		return $sql;

	}

	public function getPolos()
	{
		$sql = "SELECT polos.apelido, polos.id_polo FROM polos
		INNER JOIN conta_matriz ON admin_id = id_polo";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function verificaSubConta($count_id, $live_token)
	{

		Iugu::setApiKey($live_token);
		$dados = Iugu_Account::search($count_id);
		return $dados['last_verification_request_status'];
	}

	public function criarSubconta($name, $polo)
	{
		if ($dados = $this->addSubConta($name, $polo)) {
			print_r($dados);
			return true;
			

			/*$sql = "INSERT INTO conta_iugu SET
			nome_iugu = :nome, 
			account_id = :id, 
			live_api_token: = :live, 
			test_api_token = :test, 
			user_token = :user, 
			polo_id = :polo";

			$sql = $this->db->prepare($sql);

			$sql->bindValue(':nome', $dados->name);
			$sql->bindValue(':id', $dados->account_id);
			$sql->bindValue(':live', $dados->live_api_token);
			$sql->bindValue(':test', $dados->test_api_token);
			$sql->bindValue(':user', $dados->user_token);
			$sql->bindValue(':polo', $polo);

			$sql->execute();

				if ($sql->rowCount() > 0){return true;}else{return false;}*/
		}
	}

	public function addSubConta($name, $polo)
	{
		$str = ':';
		$str = base64_encode($str);
		
		$curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.iugu.com/v1/marketplace/create_account",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => [
		  						"name" => $name,
		  						"commission_percent" =>50
		  					],
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic $str"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);


		$dados = json_decode($response);

		curl_close($curl);

		if ($err) {exit ($err);} 
		else {
			$this->insereIugu($response, $polo);
			return $dados;} 
	}

	public function insereIugu($dados, $polo)
	{
		$sql = 'UPDATE conta_matriz SET iugu = :iuguu WHERE admin_id = :polo';
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iuguu', $dados);
		$sql->bindValue(':polo', $polo);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else{
			return false;
		}
	}

	public function verSubConta($data, $account_id, $user_token)
	{
		$url = 'https://api.iugu.com/v1/accounts/'.$account_id.'/request_verification';

		$str = $user_token.':';
		$str = base64_encode($str);

		$curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $data,
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic $str"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);


		$dados = json_decode($response);

		curl_close($curl);

		if ($err) {exit ($err);} 
		else {return $dados;} 
	}

	public function getTudoSubConta($token, $id_conta)
	{
		$url = 'https://api.iugu.com/v1/accounts/'.$id_conta;

		$str = $token.':';
		$str = base64_encode($str);

		$curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic $str"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);


		$dados = json_decode($response);

		curl_close($curl);

		if ($err) {exit ($err);} 
		else {return $dados;} 
	}

	public function criarFatura($token, $email, $data_vencimento, $itens, $payer, $sdes)
	{
		Iugu::setApiKey($token);

		$dados = Iugu_Invoice::create(Array(
	    "email" => $email,
	    "due_date" => $data_vencimento,
    	"items" => $itens,
    	"payer" => $payer,
    	"notification_url" => 'https://portaleja.com.br/url/index.php',
    	"fines" => true,
    	"late_payment_fine" => "2",
    	"per_day_interest" => true,
    	"early_payment_discount" => true,
    	"early_payment_discounts" => $sdes
));

return $dados;

	}

	public function salvarFatura($ra, $fpg, $vencimento, $valor, $i, $qtd, $id_fatura, $boleto, $cod, $convenio, $resp)
	{
		$slq = "INSERT INTO faturas SET ra = :ra, fdpgto = :fpg, vencimento = :ve, valor = :valor, 
		data = :data, parcela = :parcela, qtd = :qtd, id_fatura = :id, boleto = :lboleto, cod = :cod, convenio = :convenio, responsavel = :resp";
	
	    $sql = $this->db->prepare($slq);
	    $sql->bindValue(':ra', $ra);
	    $sql->bindValue(':fpg', $fpg);
	    $sql->bindValue(':ve', $vencimento);
	    $sql->bindValue(':valor', $valor);
	    $sql->bindValue(':data', date('Y-m-d'));
	 	$sql->bindValue(':parcela', $i);
	 	$sql->bindValue(':qtd', $qtd);
	    $sql->bindValue(':id', $id_fatura);
	    $sql->bindValue(':lboleto', $boleto);
	    $sql->bindValue(':cod', $cod);
	    $sql->bindValue(':convenio', $convenio);
	   	$sql->bindValue(':resp', $resp);
	   	$sql->execute();

	    if ($sql->rowCount() > 0) {return true;} 
	    else{return false;}
	}

		public function buscarFatura($token, $id_fatura)
	{
		Iugu::setApiKey($token);
		$dados = Iugu_Invoice::fetch($id_fatura);
		return $dados;
	}

	public function getFaturaId($token, $id_fatura)
	{
		Iugu::setApiKey($token);
		$dados = Iugu_Invoice::fetch($id_fatura);
		return $dados;
	}

	public function criarCliente($name, $email, $api_token)
	{
		Iugu::setApiKey($api_token);

		$dados = Iugu_Customer::create(Array(
			"email" => $email,
			"name" => $name
		));
		return $dados;

	}

 	public function pagarCartao($api_token, $token, $email, $parcelas, $itens, $payer)
 	{
 	
		 Iugu::setApiKey($api_token);

		$dados = Iugu_Charge::create(Array(
		    "token" => $token,
		    "email" => $email,
		    "months" => $parcelas,
		    "items" => $itens,
		    "payer" => $payer
		));
			return $dados;
	}

	public function invalidarFatura($id, $token)
	{
		Iugu::setApiKey($token);
		$invoice = Iugu_Invoice::fetch($id);
		
		if($invoice->cancel()){return true;} 
		else{return false;}
	}

	public function deletarFatura($id)
	{
		$sql = "DELETE FROM faturas WHERE id_fatura = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return true;
			exit();
		} else{return false;}
	}

	public function editarFatura($id, $token)
	{
		$url = 'https://api.iugu.com/v1/invoices/'.$id.'/duplicate';

		$str = $token.':';
		$str = base64_encode($str);

		$curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => [
		  						"due_date" => "20/08/2019"
		  					],
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic $str"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);


		$dados = json_decode($response);

		curl_close($curl);

		if ($err) {exit ($err);} 
		else {return $dados;} 
	}

	public function transferirMatriz($token)
	{
		$url = 'https://api.iugu.com/v1/transfers';

		$str = $token.':';
		$str = base64_encode($str);

		$curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => [
		  						"receiver_id" => "984A44C642C547EB8CF0155F8039D955",
		  						"amount_cents" => '200'
		  					],
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic $str"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);


		$dados = json_decode($response);

		curl_close($curl);

		if ($err) {exit ($err);} 
		else {return $dados;} 
	}

	public function sacar($id_subconta, $token, $valor)
	{
		$url = 'https://api.iugu.com/v1/accounts/'. $id_subconta.'/request_withdraw';

		$str = $token.':';
		$str = base64_encode($str);

		$curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => [
		  						"amount" => $valor
		  					],
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Basic $str"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);


		$dados = json_decode($response);

		curl_close($curl);

		if ($err) {exit ($err);} 
		else {return $dados;} 
	}

}