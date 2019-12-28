<?php 
namespace Controllers;

use Core\Controller;
use Models\Campanhas;
use Models\Polos;

class CampanhasController extends Controller{
	
	public function __construct()
	{
		$this->putLogin();
		if($this->hasPermisson('aba-cursos')){return true;}
		header("Location:".BASE_URL);
		exit;
	}

	public function index(){}

	public function listar()
	{
		$c = new Campanhas();

		$dados = array(
			'pagina' => 'Listar Campanhas',
			'lista' => $c->getCpAll()
		);

		$this->loadTemplate('campanhas/listar', $dados);
	}

	public function inserir()
	{
		$p = new Polos();

		$dados = array(
			'pagina' => 'Adicionar Campanha',
			'polos' => $p->getPolosAll()
		);

		$this->loadTemplate('campanhas/adicionar', $dados);
	}

	public function add()
	{
		if (!empty($_POST['nome_cp'])){
			$nome_cp = addslashes(trim($_POST['nome_cp']));
			$desconto = addslashes(trim($_POST['desconto']));
			$polo = addslashes(trim($_POST['polo']));
			$cupom = addslashes(trim($_POST['cupom']));
			$inicio = addslashes(trim($_POST['inicio']));
			$fim = addslashes(trim($_POST['fim']));
			
			$c = new Campanhas();

			if($c->addCampanha($nome_cp, $desconto, $cupom, $inicio, $fim, $polo)){
				$_SESSION['success'] = "Campanha criada com sucesso";
				header('Location:'.BASE_URL.'campanhas/listar');
				exit;
			} else { echo "ERRO: Curso não adastrado!";}
		}
	}

	public function delete($id)
	{
			$c = new Campanhas();

			if($c->deletCp($id))
			{
				$_SESSION['success'] = "Campanha deletada com sucesso";
				header('Location:'.BASE_URL.'campanhas/listar');
				exit;
			} 
			else{
				$_SESSION['danger'] = "Impossível deletar campanha";
				header('Location:'.BASE_URL.'campanhas/listar');
				exit;
				}
	}
	
	public function editar($id)
	{
		$dados = array(
		'pagina' => 'Editar Campanhas');

		$c = new Campanhas();
		$p = new Polos();

		$dados['cp'] = $c->getCampanhasId($id);
		$dados['polos'] = $p->getPolosAll();

		$this->loadTemplate('campanhas/editar', $dados);

	}

	public function edit()
	{

		if (!empty($_POST['nome_cp'])){
			$nome_cp = addslashes(trim($_POST['nome_cp']));
			$desconto = addslashes(trim($_POST['desconto']));
			$polo = addslashes(trim($_POST['polo']));
			$cupom = addslashes(trim($_POST['cupom']));
			$inicio = addslashes(trim($_POST['inicio']));
			$fim = addslashes(trim($_POST['fim']));
			$id = addslashes(trim($_POST['id']));
			
			$c = new Campanhas();

			if($c->editCampanha($nome_cp, $desconto, $cupom, $inicio, $fim, $polo, $id)){
				$_SESSION['success'] = "Campanha editada com sucesso";
				header('Location:'.BASE_URL.'campanhas/listar');
				exit;
			} else { $_SESSION['danger'] = "Campanha Não foi editada";
				header('Location:'.BASE_URL.'campanhas/listar');
				exit;}
		}
	}

}