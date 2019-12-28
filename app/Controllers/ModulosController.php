<?php 
namespace Controllers;

use Core\Controller;
use Models\Modulos;
use Models\Cursos;

class ModulosController extends Controller{


	public function __construct(){
		$this->putLogin();
		if($this->hasPermisson('aba-cursos')){
			return true;
		}
		header("Location:".BASE_URL);
		exit;}
	
	public function index(){
		
	}

	public function listar(){
		$m = new Modulos();
		$c = new Cursos();
		
		$dados = array(
		'pagina' => 'Listar Módulos (Disciplinas)',
		'lista' => $m->getModulosAll(),
		'cursos' => $c->getCursosAll()
	);

	$this->loadTemplate('/modulos/listar', $dados);

	}

	public function adicionar(){
		$dados = array();
		if (!empty($_POST['nome_modulo'])) {
			$nome_modulo = $_POST['nome_modulo'];
			$curso_id = $_POST['curso_id'];

			$m = new Modulos();
			if($m->addModulo($nome_modulo, $curso_id)){
				$_SESSION['success'] = "Módulo cadastrado com sucesso";
				header('Location:'.BASE_URL.'modulos/listar');
				exit;
			}  else{
			$_SESSION['danger'] = "Erro: Módulo não foi cadastrado";
				header('Location:'.BASE_URL.'modulos/listar');
				exit;}
		} else{
			$_SESSION['danger'] = "Erro: Módulo não foi cadastrado";
				header('Location:'.BASE_URL.'modulos/listar');
				exit;}
	}

	public function edit($id){
		if(isset($id)){
			$m = new Modulos();
			$c = new Cursos();

			$dados = array(
			'pagina' => 'Editar Módulo',
			'mod' => $m->getModuloId($id),
			'cursos' => $c->getCursosAll()
	);
			$this->loadTemplate('/modulos/editar', $dados);
		}
	}

	public function editarModulo(){
		if (isset($_POST['id_modulo'])) {
			$id_modulo = $_POST['id_modulo'];
			$nome_modulo = $_POST['nome_modulo'];
			$curso_id = $_POST['curso_id'];

			$m = new Modulos();
			if($m->editarModulo($nome_modulo, $curso_id, $id_modulo)){
				$_SESSION['success'] = "Módulo editado com sucesso";
				header('Location:'.BASE_URL.'modulos/listar');
				exit;
			} else{ $_SESSION['danger'] = "Não foi possivel editar módulo";
					header('Location:'.BASE_URL.'modulos/listar');
					exit;
			      }
		}
	}

	public function deletar(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];

			$m = new modulos();
			if($m->deletModulo($id)){
			echo "Modulo deletado com sucesso!";
			} 
			else { echo 'Erro: Não foi possível deletar! Verifique se o modulo tem alguma aula cadastrada '; }
			} 
}

}