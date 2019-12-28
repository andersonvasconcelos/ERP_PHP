<?php 
namespace Controllers;

use Core\Controller;
use Models\Polos;

class PolosController extends Controller{

	public function __construct(){
		$this->putLogin();

		if($this->hasPermisson('aba-polos')){
		return true;}
		
		header("Location:".BASE_URL);
		exit;

	}

	public function index(){

		$dados = array(
		'pagina' => 'Adicionar Polo',
		);


		$this->loadTemplate('polos/adicionar', $dados);
}

	public function addPolo(){

		if (isset($_POST['nome_polo'])) {


			$nome = $_POST['nome_polo'];
			$apelido = $_POST['apelido'];
			$cep_polo = $_POST['cep_polo'];
			$endereco_polo = implode(',', $_POST['endereco_polo']);
			$telefone_polo = $_POST['telefone_polo'];
			$telefone_polo_2 = $_POST['telefone_polo_2'];
			$cidade_polo = $_POST['cidade_polo'];
			$estado_polo = $_POST['estado_polo'];
			$razao = $_POST['razao_social'];
			$cnpj = $_POST['cnpj'];
			$bairro = $_POST['bairro'];
			$slug =  mb_strtolower(preg_replace('/[ -]+/' , '-' , $apelido)); 
		}

			$p = new Polos();

			

			if($p->adicionarPolo($nome, $cep_polo, $endereco_polo, $telefone_polo, $telefone_polo_2, $cidade_polo, $estado_polo, $apelido, $razao, $cnpj, $bairro, $slug))
			{

				$p->createPolo($apelido);
				echo "Polo cadastrado com sucesso";

				}
			 	else { echo "ERRO: Esse Polo já foi cadastrado!";}

}
	public function listar(){
		$p = new Polos();

		$dados = array(
		'pagina' => 'Listar Polos',
		'polos' => $p->getPolosAll()
		);

		$this->loadTemplate('polos/listar', $dados);
	}


	public function edit($slug){
		$p = new Polos();

		$dados = array(
		'pagina' => 'Editar Polos',
		'polos' => $p->getPoloSlug($slug)
		);

		$this->loadTemplate('polos/editar', $dados);
	}

	public function editarPolo(){
		if (isset($_POST['nome_polo'])) {
			$id_polo = addslashes(trim($_POST['id_polo']));
			$nome_polo = addslashes(trim($_POST['nome_polo']));
			$endereco_polo = addslashes(trim($_POST['endereco_polo']));
			$telefone_polo = addslashes(trim($_POST['telefone_polo']));
			$cidade_polo = addslashes(trim($_POST['cidade_polo']));
			$estado_polo = addslashes(trim($_POST['estado_polo']));
			$apelido = addslashes(trim($_POST['apelido']));
			$endereco_polo = json_encode($endereco_polo, JSON_UNESCAPED_UNICODE);

			$p = new Polos();

			if($p->editarPolo($nome_polo, $endereco_polo, $telefone_polo, $cidade_polo, $estado_polo, $apelido, $id_polo)){
				echo "Polo editado com sucesso";
			} else { echo "ERRO: Não foi possível editar esse Polo!";}
		}
	}

	public function deletePolo(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];

			$p = new Polos();

			if($p->deletPolo($id)){echo "Polo deletado com sucesso! ";} 
			else{echo "Não foi possível deletar polo";}
		}
	}

}
