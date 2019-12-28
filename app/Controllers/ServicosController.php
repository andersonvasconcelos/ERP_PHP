<?php 
namespace Controllers;

use Core\Controller;
use Models\Servicos;
use Models\SubContas;

class ServicosController extends Controller
{
	public function __construct()
	{
		$this->putLogin();
		if($this->hasPermisson('aba-cursos')){return true;}
		header("Location:".BASE_URL);
		exit;
	}

	public function index()
	{
		$s = new Servicos();
		$dados = array(
		'pagina' => 'Listar Serviços',
		'lista' => $s->getServicosAll()
		);
		$this->loadTemplate('servicos/index', $dados);
	}

	public function adicionar()
	{
		$dados = array(
		'pagina' => 'Adicionar Serviço'
		);
		$this->loadTemplate('servicos/adicionar', $dados);
	}


	public function insert()
	{
		if (!empty($_POST['nome_servico'])) 
		{
			$nome = addslashes(trim($_POST['nome_servico']));
			$valor = addslashes(trim($_POST['valor_servico']));
			$slug = mb_strtolower(preg_replace('/( )+/' , '_' , $nome));

			$s = new Servicos();

				if($s->addServico($nome, $valor, $slug))
				{
					$_SESSION['sucess'] = "Serviço cadastrado com sucesso!";
					header('Location:'.BASE_URL.'servicos');
					exit;
				}
		}

		echo "ERRO: Serviço não adastrado!";
	}

	public function deletar($id)
	{
		if (!empty($id)) 
		{
			$s = new Servicos();

			if($s->deletServico($id))
			{
				$_SESSION['sucess'] = "Serviço deletado com sucesso!";
				header('Location:'.BASE_URL.'servicos');
				exit;
			} 
			else
			{
				$_SESSION['danger'] = "Não foi possivel deletar o serviço!";
				header('Location:'.BASE_URL.'servicos');
				exit;
			}
		}
	}


	public function edit($id)
	{
		$dados = array(
		'pagina' => 'Editar Serviços');
		$s = new Servicos();
		$dados['servico'] = $s->getServicoId($id);
		$this->loadTemplate('/servicos/editar', $dados);
	}

	public function editar()
	{
		if (!empty($_POST['nome_servico'])) 
		{
	
			$nome = addslashes(trim($_POST['nome_servico']));
			$valor = addslashes(trim($_POST['valor_servico']));
			$slug = mb_strtolower(preg_replace('/( )+/' , '_' , $nome));
			$id = addslashes(trim($_POST['id_servico']));

			$s = new Servicos();

				if($s->upServico($nome, $valor, $slug, $id))
				{
					$_SESSION['sucess'] = "Serviço cadastrado com sucesso!";
					header('Location:'.BASE_URL.'servicos');
					exit;
				}
		}
	}

	public function fatura()
	{
		$s = new Servicos();
		$dados = array(
		'pagina' => 'Gerar Fatura',
		'servicos' => $s->getServicosAll()
		);
		$this->loadTemplate('servicos/fatura', $dados);
	}

	public function boleto()
	{

		// Pegar e tratar variaveis // 
		$valor = addslashes(trim($_POST['valor']));
		$valor = str_replace(',', '', $valor);
		$phone = addslashes(trim($_POST['phone']));
		$phone = str_replace("-", "", $phone);
		$phone = str_replace(" ", "", $phone);
		$email = addslashes(trim($_POST['email']));
		$due_date = $_POST['due_date'];
		

		// Pegar dados da Subconta IUGU // 
			$user = json_decode($this->getUser()['iugu']);
			$token = $user->live_api_token;

		// Dados do cliente //
		$payer = Array(
		        "cpf_cnpj" => addslashes(trim($_POST['cpf'])),
		        "name" => addslashes(trim($_POST['name'])),
		        "phone_prefix" => addslashes(trim($_POST['phone_prefix'])),
		        "phone" => $phone,
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

		// Dados do serviço ou produto //
		$itens = Array(
					Array(
		            "description" => addslashes(trim($_POST['description'])),
		            "quantity" => "1",
		            "price_cents" => $valor
		        	),
	       		);

			// Dados desconto //
				$sdes = Array(
	        			Array(
				            "days" => 0,
				            "value_cents" => '001'
	        			),
	        		);

		$s = new SubContas();

		// Gerar Fatura na IUGU // 			$token, $email, $dt, $itens, $payer, $sdes
				if($dados = $s->criarFatura($token, $email, $due_date, $itens, $payer, $sdes))
				{
				// Preparar dados para salvar no nosso BD // 
				$vencimento = $dados['due_date'];
				$id_fatura = $dados['id'];
				$boleto = $dados['secure_url'];
				$cod = json_encode($dados['bank_slip']);
				$valor = substr($dados['total_cents'],0,-2);
				$fpg = 'BOLETO';
				$ra = addslashes(trim($_POST['id_aluno']));
				$resp = $this->getUser()['slug_c'];
				$convenio = '';
				$i = 1;
				$qtd = 1;
				
				// Salvar dados no nosso BD //
				$s->salvarFatura($ra, $fpg, $vencimento, $valor, $i, $qtd, $id_fatura, 
					$boleto, $cod, $convenio, $resp);

				echo json_encode($boleto);
			}
	}

	public function getAlunos()
	{
		if (!empty($_POST['cpf'])) {
			$cpf = addslashes(trim($_POST['cpf']));
			$cpfn = str_replace('.', '', $cpf);
			$cpfn = str_replace('-', '', $cpfn);

			$s = new Servicos();
			
			$dados = $s->getAlunos($cpf, $cpfn);
			echo json_encode($dados);
		}
	}
}