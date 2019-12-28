<?php 
namespace Controllers;

use Core\Controller;
use Models\Pagamentos;
use Models\Contas;
use Models\Matriculas;
use Models\Campanhas;
use Models\SubContas;
use DateTime;

class PagamentosController extends Controller{

	public function __construct()
	{
		$this->putLogin();

			if($this->hasPermisson('aba-pagamentos')){return true;}
		
		header("Location:".BASE_URL);
		exit;
	}

	public function index(){}

	public function listarCarne()
	{
		$p = new Pagamentos();

			if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4) {
				$matriculas = $p->GetMatricula();
			 } 
			else{$matriculas = $p->GetMatriculaPolo($this->getUser()['polo_id']);}

		$dados  = array(
		'pagina' => "Imprimir Carne",
		'matriculas' => $matriculas
		);

		$this->loadTemplate('pagamentos/listarCarne', $dados);
	}
	public function listarFaturas()
	{
		$p = new Pagamentos();

			if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4) {
				 $matriculas = $p->getMatriculaIugu();
			 } 
			else{$matriculas = $p->getMatriculaIuguPolo($this->getUser()['polo_id']);}

		$dados  = array(
		'pagina' => "Listar Faturas Iugu",
		'matriculas' => $matriculas
		);

		$this->loadTemplate('pagamentos/iuguFaturas', $dados);
	}

		public function listar()
		{
			$p = new Pagamentos();

			if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4) {
				$matriculas = $p->getMatriculas();
			} 
			else{$matriculas = $p->getMatriculasPolo($this->getUser()['polo_id']);}

			$dados  = array(
			'pagina' => "Finalizar Pagamento",
			'matriculas' => $matriculas 
			);

			$this->loadTemplate('pagamentos/listar', $dados);
		}



		public function invalidarBoleto()
		{

			if (isset($_POST['id'])) {
				$id = addslashes(trim($_POST['id']));
				$p = new Pagamentos();

				if ($p->deleteBoleto($id)) {
					echo "Boleto Invalidado com sucesso";
				}
			}

		}

	public function salvarBoletos($aluno_id, $data_vencimento, $fpg, $valo, $i, $id_unico, $linkBoleto, $linkGrupo, $rand, $empresa_convenio)
	{
		$pagamento = new Pagamentos();

		$resp = $this->getUser()['slug_c'];

		$pagamento->salvarBoletos($aluno_id, $data_vencimento, $fpg, $valo, $resp, $i, $id_unico, $linkBoleto, $linkGrupo, $rand, $empresa_convenio);
	}

	public function salvarCartao($id_aluno, $valor, $parcela, $id_unico)
	{
		$pagamento = new Pagamentos();

		$resp = $this->getUser()['slug_c'];
		$pagamento->salvarCartao($id_aluno, $valor, $parcela, $resp, $id_unico);
	}

	public function getCarne($id)
	{
		$conta = new Contas();
		$m = new Matriculas();

		$credencial = $conta->getCredencialMatriz();
		$chave = $conta->getChaveMatriz();

		$dados = $m->getPedidos($id);

		foreach ($dados as $p) {
			$pedido_numero[] = $p['pedido_numero'];
		}

		
		$pedidos = array(
			'pedido_numero' => $pedido_numero,
			'formato' => 'carne' );


		$dados = array(
			'pedido' => $pedidos,
			'header' =>  array(
				"X-CHAVE: $chave",
				"Content-Type: application/json"
				),
			'url' => "https://api.pjbank.com.br/recebimentos/$credencial/transacoes/lotes"
			);

		$this->loadView('pagamentos/pj/carne', $dados);

	}

	public function verParcelas($ra)
	{	
		$p = new Pagamentos();

		$dados = array(
			'ids' => $p->getIds($ra)
		);
		
		$this->loadTemplate('pagamentos/pj/parcelas', $dados);
	}

		public function iugu($id)
		{
			$m = new Matriculas();
			$c = new Campanhas();
			$hoje = date('Y-m-d');

			$user = json_decode($this->getUser()['iugu']);
			$id_conta = $user->account_id;

			$dados  = array(
				'matriculas' => $m->getMatriculaId($id), 
				'acount_id' => $id_conta,
				'cp' => $c->getCpId($this->getUser()['polo_id'], $hoje)
			);
			
			$this->loadTemplate('pagamentos/iugu/boleto', $dados);
		}

		public function iuguFatura()
		{
			$email = 'boletosejaedc@gmail.com';


			if (!empty($_POST['valorEntrada'])) 
			{
				$i = $_POST['parcela'];
				$qtd = count($i) +1;
				array_push($i, '0'.($qtd));
			} else {
				$i = $_POST['parcela'];
			}

			
			// Valor das entradas + valor parcelas //
			$parcela = $_POST['valorParcelas'];
			$parcela = str_replace('.', '', $parcela);
			array_unshift($parcela, $_POST['valorEntrada']);
			
			
			// Datas de Vencimentos //
			$due_date = $_POST['datav'];
			array_unshift($due_date, $_POST['dt']);
			// Parcelas geradas //
		
			// Dados do cliente // 
			$payer = Array(
		        "cpf_cnpj" => addslashes(trim($_POST['cpf_cnpj'])),
		        "name" => addslashes(trim($_POST['name'])),
		        "phone_prefix" => addslashes(trim($_POST['phone_prefix'])),
		        "phone" => addslashes(trim($_POST['phone'])),
		        "email" => addslashes(trim($_POST['email'])),
		        "address" => Array(
		            "street" => addslashes(trim($_POST['street'])),
		            "number" => addslashes(trim($_POST['number'])),
		            "district" => addslashes(trim($_POST['bairro_c'])),
		            "city" => addslashes(trim($_POST['city'])),
		            "state" => addslashes(trim($_POST['state'])),
		            "country" => "Brasil",
		            "zip_code" => addslashes(trim($_POST['zip_code']))
        			)
   				 );	

			$s = new SubContas();
			$p = new Pagamentos();

			// Pegar dados da Subconta IUGU // 
			$user = json_decode($this->getUser()['iugu']);
			$token = $user->live_api_token;

			// Desconto da matricula // 
			$desconto = 001;
				
			foreach ($due_date as $key => $dt) 
			{
				// Dados do Produto // 
				$itens = Array(
	        			Array(
				            "description" => addslashes(trim($_POST['description'])),
				            "quantity" => "1",
				            "price_cents" => $parcela[$key]
	        			),
	        		);

				// Dados desconto //
				$sdes = Array(
	        			Array(
				            "days" => 0,
				            "value_cents" => $desconto
	        			),
	        		);

							// Gerar Fatura na IUGU // 
				$dados = $s->criarFatura($token, $email, $dt, $itens, $payer, $sdes);

				if(!empty($dados['errors']))
				{
					foreach ($dados['errors'] as $key => $value) 
					{
						$str = implode(" ", $value);
					}
					
					$msg = $key . ' ' . $str;
					$dados = array(
						"erro" => 1,
						"msg" => $msg
					);
					echo json_encode($dados);
					exit();				
				} else{
				
						// Preparar dados para salvar no nosso BD // 
						$vencimento = $this->data($dados['due_date']);
						$id_fatura = $dados['id'];
						$boleto = $dados['secure_url'];
						$cod = json_encode($dados['bank_slip']);
						$valor = substr($dados['total_cents'],0,-2);
						$fpg = 'BOLETO';
						$ra = addslashes(trim($_POST['id_aluno']));
						$resp = $this->getUser()['slug_c'];
						$convenio = addslashes(trim($_POST['empresa_convenio']));
						
						// Salvar dados no nosso BD //
						$s->salvarFatura($ra, $fpg, $vencimento, $valor, $i[$key], $qtd, $id_fatura, 
							$boleto, $cod, $convenio, $resp);
					} 

				// Desconto nas parcelas //
				$desconto = addslashes(trim($_POST['campanha']));
			}
			echo json_encode($ra);
		}

		public function iuguBoletos($ra)
		{
			$f = new Pagamentos();

			$dados  = array(
				'pagina' => 'Listar Boletos',
				'ra' => $ra,
				'boletos' => $f->getBoletos($ra));
			$this->loadTemplate('pagamentos/iugu/listar_boletos', $dados);
		}
	public function gerarCarneIugu($ra)
		{
			$f = new Pagamentos();
			
			$dados  = array(
				'pagina' => 'Listar Boletos',
				'ra' => $ra,
				'boletos' => $f->getIuguCarne($ra));
			$this->loadView('pagamentos/carne/carne', $dados);
		}
		public function getStatus($status)
		{
			switch ($status) {
				case 'paid':
					echo '<span class="label label-success">'.$status.'</span>';
					break;
				case 'pending':
					echo '<span class="label label-danger">'.$status.'</span>';
					break;
				
				default:
					# code...
					break;
			}
		}
		
		public function data($data)
		{
			$data_vencimento = strtotime(str_replace('/', '-', $data));
			$data_vencimento = date('Y-m-d',$data_vencimento);
		    return $data_vencimento;
		}


		public function telefone($telefone)
		{
			$telefone = preg_replace("/[^\w\s]/", "",str_replace(" ", "", $telefone));
			return $telefone;
		}

		public function endereco($end)
		{
			$end = explode(',', json_decode($end));
			return $end;
		} 

		public function dt()
		{
			$date = date('Y-m-d');
			$date = new DateTime($date);
			$date->modify('+4 day');
			$date = $date->format('d-m-Y');
			
			return $date; 
		}  

		public function vTotal($valor, $qtd)
		{
			$vtotal = str_replace('.', '', $valor);
		    $vtotal = str_replace(',', '', $vtotal);
		    $vtotal = intval(strval($vtotal/100)) / $qtd;

		    return $vtotal;
		} 

		public function getConvenio($nome_empresa)
		{
			if (!empty($nome_empresa)) 
			{
  				$desconto = '42.00';
  				return $desconto;
  			}else
  			{
				$desconto = '31.00';
	  			return $desconto;
			}
		}
}
