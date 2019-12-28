<?php 
namespace Controllers;

use Core\Controller;
use Models\Contas;

class ContasController extends Controller{
		
		public function __construct()
		{
			$this->putLogin();

				if($this->hasPermisson('aba-gateway-de-pagamento')){
				return true;
				}

			header("Location:".BASE_URL);
			exit;
		}


		public function index()
		{	
			$bancos = new Contas;

			$id = $this->getUser()['polo_id'];

				if ($bancos->getConta($id) == true){
					$contas = $bancos->getConta($id);
				} else{
					$contas = array();
				}
 
			$dados = array(
				'pagina' => "Configurações de pagamentos",
				'bancos' => $bancos->getBancos(),
				'contas' => $contas
			);

			$this->loadTemplate('contas/index', $dados);
			
		}

	public function listar()
	{
		
		$c = new Contas();

		$id = $this->getUser()['polo_id'];

		$dados = $c->getConta($id);
		echo json_encode($dados);
	}

	public function adicionar()
	{
		
			if(isset($_POST['nome'])) {

				$c = new Contas();
				
				$nome = addslashes($_POST['nome']);
				$conta = $_POST['conta'];
				$agencia = $_POST['agencia'];
				$banco = $_POST['banco'];
				$cnpj = addslashes($_POST['cnpj']);
				$ddd = addslashes($_POST['ddd']);
				$telefone = addslashes($_POST['telefone']);
				$email = addslashes($_POST['email']);
				$credencial = addslashes(trim($_POST['credencial']));
				$chave = addslashes(trim($_POST['chave']));
				$conta_virtual = addslashes(trim($_POST['conta_virtual'])); 
				$admin_id = $this->getUser()['polo_id'];

					if($c->credenciarContaPjBank($nome, $conta, $agencia, $banco, $cnpj, $ddd, $telefone, $email, $admin_id))
					{
						echo "Conta cadastrada com sucesso";
						exit;
					} 
			}

		echo "Não é possível cadastrar conta!";
	}


	public function editarContaNet(){
				
		if(isset($_POST['client_id'])) {
		
			
			$client_id = addslashes(trim($_POST['client_id']));
			$client_secret = addslashes(trim($_POST['client_secret']));
			$id_conta = addslashes(trim($_POST['id_conta']));
			$admin_id = $this->getUser()['polo_id'];

			$c = new Contas();

				if($c->editarConta($client_id, $client_secret, $id_conta, $admin_id)){
					echo "Conta Adicionada com sucesso!";
				} else {
					echo "Não foi possivel editar conta";
				}
		}	
	}
}