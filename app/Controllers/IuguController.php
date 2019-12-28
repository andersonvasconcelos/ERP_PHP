<?php 
namespace Controllers;

use Core\Controller;
use Models\SubContas;

class IuguController extends Controller{

	public function __construct()
	{
		$this->putLogin();

			if($this->hasPermisson('aba-pagamentos')){return true;}
		
		header("Location:".BASE_URL);
		exit;
	}

	public function index()
	{
		if (!$this->admin()) { return false; exit();}
		
		$i = new SubContas();
		$contas = $i->getContas();

		$dados  = array(
		'pagina' => "Listar SubContas",
		'contas' => $contas
		);

		$this->loadTemplate('pagamentos/iugu/index', $dados);
	}

		public function getVerifica($count_id, $live_token)
		{

			$contas = new SubContas();
			$status = $contas->verificaSubConta($count_id, $live_token);
			$this->alertVerSub($status);
		}

		public function alertVerSub($status)
		{
			switch ($status) {
				case 'accepted':
					echo '<span class="label label-success">'.$status.'</span>';
					break;
				
				default:
					echo '<span class="label label-danger">'.$status.'</span>';
					break;
			}
		}

		public function adicionar()
		{
			$polos = new SubContas();

			$dados  = array(
			'pagina' => "Adicionar SubConta",
			'polos' => $polos->getPolos()
			);

			$this->loadTemplate('pagamentos/iugu/adicionar', $dados);
		}

		public function save()
		{
			$name = addslashes(trim($_POST['name']));
			$polo = addslashes(trim($_POST['polo_id']));

			$conta = new SubContas();

			if ($conta->criarSubconta($name, $polo)) {
				location(BASE_URL.'iugu');
				exit();
			}
		}

		public function edit($id)
		{
			$polos = new SubContas();

			$dados  = array(
			'pagina' => "Editar SubConta",
			'contas' => $polos->getContasId($id)
			);

			$this->loadTemplate('pagamentos/iugu/editar', $dados);
		}

		public function verificar($id)
		{
			$polos = new SubContas();

			$dados  = array(
			'pagina' => "Verificar SubConta",
			'contas' => $polos->getContasId($id),
			);

			$this->loadTemplate('pagamentos/iugu/verificar', $dados);
		}	

		public function verificarSubConta()
		{

			$s = new SubContas();
			$data = array(
			'price_range' => addslashes(trim($_POST['price_range'])),
			'physical_products' => addslashes(trim($_POST['physical_products'])),
			'business_type' => addslashes(trim($_POST['business_type'])),
			'person_type' => addslashes(trim($_POST['person_type'])),
			'automatic_transfer' => addslashes(trim($_POST['automatic_transfer'])),
			'cnpj' => addslashes(trim($_POST['cnpj'])),
			'cpf' => addslashes(trim($_POST['cpf'])),
			'company_name' => addslashes(trim($_POST['company_name'])),
			'name' => addslashes(trim($_POST['name'])),
			'address' => addslashes(trim($_POST['address'])),
            'cep' => addslashes(trim($_POST['cep'])), 
            'city' => addslashes(trim($_POST['city'])),
            'state' => addslashes(trim($_POST['state'])),
            'telephone' => addslashes(trim($_POST['telephone'])),
            'bank' => addslashes(trim($_POST['bank'])),
            'bank_ag' => addslashes(trim($_POST['bank_ag'])),
            'account_type' => addslashes(trim($_POST['account_type'])),
            'bank_cc' => '00' . addslashes(trim($_POST['bank_cc']))
              );

            $account_id = addslashes(trim($_POST['account_id']));
            $user_token = addslashes(trim($_POST['user_token']));
      
            echo "<pre>";
			print_r($data);
			echo "</pre>";
            
            if ($dados = $s->verSubConta($data, $account_id, $user_token)) {
            	echo "<pre>";
            	print_r($dados);
            	echo "/<pre>";
            }


		}

			public function getTudoSubConta()
		{
			// Pegar dados da Subconta IUGU // 
			$user = json_decode($this->getUser()['iugu']);
			$token = $user->live_api_token;
			$id_conta = $user->account_id;

			$s = new SubContas();

			$dados = Array(
				'pagina' => 'Informações da Conta',
				'saldo' => $s->getTudoSubConta($token, $id_conta)
			);

			$this->loadRelatorio('pagamentos/iugu/saldo', $dados);
		}

		public function token()
		{
			$token = addslashes(trim($_POST['token']));
			$token = str_replace('-', '', $token);

			$email =  addslashes(trim($_POST['email']));
			$ra = addslashes(trim($_POST['id_aluno']));
			$resp = $this->getUser()['slug_c'];
			$fpg = 'CARTAO';
			$vencimento = date("Y-m-d");

			$user = json_decode($this->getUser()['iugu']);
			$api_token = $user->live_api_token;

			$parcelas = addslashes(trim($_POST['qtd_p']));
			$qtd = $parcelas;

			$valorP = str_replace(",", '', addslashes(trim($_POST['valorP'])));
			$valorP = str_replace(".", '', $valorP);
		
			$payer = Array(
		        "cpf_cnpj" => addslashes(trim($_POST['cpf_cnpj'])),
		        "name" => addslashes(trim($_POST['name'])),
		        "phone_prefix" => addslashes(trim($_POST['phone_prefix'])),
		        "phone" => addslashes(trim($_POST['phone'])),
		        "email" => $email,
		        "address" => Array(
		            "street" => addslashes(trim($_POST['street'])),
		            "number" => addslashes(trim($_POST['number'])),
		            "city" => addslashes(trim($_POST['city'])),
		            "state" => addslashes(trim($_POST['state'])),
		            "country" => "Brasil",
		            "zip_code" => addslashes(trim($_POST['zip_code']))
        			)
   				 );	

			$itens = Array(
	        			Array(
				            "description" => addslashes(trim($_POST['description'])),
				            "quantity" => "1",
				            "price_cents" => $valorP
	        			),
	        		);


			$s = new SubContas();

			$dados = $s->pagarCartao($api_token, $token, $email, $parcelas, $itens, $payer);

			$id_fatura = $dados['invoice_id'];
			$boleto = $dados['url'];
			$cod = $dados['token'];
			$convenio = 'card';

			if($s->salvarFatura($ra, $fpg, $vencimento, $valorP, $parcelas, $qtd, $id_fatura, $boleto, $cod, $convenio, $resp)){

			
				$_SESSION['success'] = "Cobrança gerada com sucesso";
				header("Location:".BASE_URL."pagamentos/iuguBoletos/".$ra);
				exit;
			}
		}

		public function invalidarFatura()
		{
			if (!empty($_POST['id'])) 
			{	
				$id = addslashes(trim($_POST['id']));
				$token = addslashes(trim($_POST['token']));
				
				$user = json_decode($this->getUser()['iugu']);
				$api_token = $user->live_api_token;
				
				$s = new SubContas();
				
				if ($s->invalidarFatura($id, $token)) 
				{
					echo "Cobrança cancelada com sucesso";
					exit;		
				} else{
					echo "Cobrança não foi cancelada";
				}		
			}
		}

		public function deletFatura()
		{
			if (!empty($_POST['id'])) 
			{	
				$id = $_POST['id'];
				
				$s = new SubContas();
				
				if ($s->deletarFatura($id)) 
				{
					echo 'Boleto deletado com sucesso';
				}
			}
		}

		public function editarFatura($id)
		{
			if (!empty($id)) 
			{	
				$user = json_decode($this->getUser()['iugu']);
				$api_token = $user->live_api_token;
				
				$s = new SubContas();
				
				if ($dados = $s->editarFatura($id, $api_token)) 
				{
					echo "<pre>";
					print_r($dados);
					echo "</pre>";
					/*$_SESSION['success'] = "Cobrança editada com sucesso";
					header("Location:".BASE_URL."pagamentos/listarFaturas");
					exit;*/		
				}			
			}
		}

		public function saque()
		{
			// Pegar dados da Subconta IUGU // 
			$user = json_decode($this->getUser()['iugu']);
			$token = $user->live_api_token;
			$id_conta = $user->account_id;

			$s = new SubContas();
			
			$dados  = array(
			'pagina' => "Solicitar Saque",
			'saldo' => $s->getTudoSubConta($token, $id_conta)
			);

			$this->loadTemplate('pagamentos/iugu/saque', $dados);
		}

			public function sacar()
		{
			$valor = str_replace('R$', '', addslashes(trim($_POST['valorSaque'])));
			$valor = str_replace('.', '', $valor);
			$valor = str_replace(',', '.', $valor);
			$valor = $valor - 2;
						 
			// Pegar dados da Subconta IUGU // 
			$user = json_decode($this->getUser()['iugu']);
			$token = $user->user_token;
			$id_subconta = $user->account_id;

			$s = new SubContas();

			if ($retorno = $s->transferirMatriz($token)) 
			{
				$s->sacar($id_subconta, $token, $valor);

				$_SESSION['success'] = "Saque efetuado com sucesso";
				header("Location:".BASE_URL."iugu/saque");
				exit;		
			}

		}
		public function getComissao($total)
		{
			$comissao = str_replace("R$", '', $total);
			$comissao = str_replace(',', '.', str_replace('.', '', $comissao));
			$comissao =  $comissao / 2;
			$comissao = number_format($comissao, '2', ',', '.');
			return $comissao;
		}
}
