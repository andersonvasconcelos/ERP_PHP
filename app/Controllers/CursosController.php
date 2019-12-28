<?php 
namespace Controllers;

use Core\Controller;
use Models\Cursos;
use Models\Segmentos;
use Models\Polos;

class CursosController extends Controller{
	
	public function __construct(){
		$this->putLogin();
		
		if($this->hasPermisson('aba-cursos')){
			return true;
		}
		header("Location:".BASE_URL);
		exit;
	}

	public function index(){
		
	}

	public function listar(){
		$curso = new Cursos();
		
		$dados = array(
		'pagina' => 'Listar Cursos',
		'lista' => $curso->getCursosAll()

		);
		
		$this->loadTemplate('/cursos/listar', $dados);
	}

	public function inserir(){
		$s = new Segmentos();
		$p = new Polos();
		$dados = array(
			'pagina' => 'Adicionar Curso',
			'segmentos' => $s->getSegAll(),
			'polos' => $p->getPolosAll()
		);

		$this->loadTemplate('/cursos/adicionar', $dados);
	}

	public function adicionar(){
		$dados = array();
		if (!empty($_POST['nome_curso'])) {
			$nome_curso = $_POST['nome_curso'];
			$descricao = $_POST['descricao'];
			$segmento = $_POST['segmento'];
			$tempo_de_acesso = $_POST['tempo_de_acesso'];
			$valor = $_POST['valor'];
			$comissao = $_POST['comissao'];
			$slug = mb_strtolower(preg_replace('/( )+/' , '-' , $nome_curso));


			$curso = new Cursos();
			if($curso->addCurso($nome_curso, $descricao, $segmento,$tempo_de_acesso, $valor, $comissao, $slug)){
				echo "Curso cadastrado com sucesso!";
			} else { echo "ERRO: Curso não adastrado!";}
		}
	}

	public function deletar(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$curso = new Cursos();

			if($curso->deletCurso($id)){
				echo "Curso deletado com sucesso";
			} 
			else{
				echo 'Erro: Não foi possível deletar! Verifique se o curso tem algum módulo cadastrado '; }
		}
	}

	public function edit($slug){
		$dados = array(
		'pagina' => 'Editar Curso');

		$c = new Cursos();
		$dados['curso'] = $c->getCursoSlug($slug);

		$this->loadTemplate('/cursos/editar', $dados);

	}

	public function editarCurso(){
		if (isset($_POST['id_curso'])) {
			$id_curso = $_POST['id_curso'];
			$nome_curso = $_POST['nome_curso'];
			$descricao = $_POST['editordata'];
			$segmento = $_POST['segmento'];
			$tempo_de_acesso = $_POST['tempo_de_acesso'];
			$valor = $_POST['valor'];
			$comissao = $_POST['comissao'];
			$slug = mb_strtolower(preg_replace('/( )+/' , '-' , $nome_curso));

		$c = new Cursos();
		if($c->editarCurso($nome_curso, $descricao, $segmento, $tempo_de_acesso, $valor, $comissao, $slug, $id_curso)){
			$_SESSION['success'] = "Curso editado com sucesso";
				header('Location:'.BASE_URL.'cursos/listar');
				exit;
		} else{
			$_SESSION['danger'] = "Curso não pode ser editado";
				header('Location:'.BASE_URL.'cursos/listar');
				exit;
		}
	}else{
		$_SESSION['danger'] = "Curso não pode ser editado";
				header('Location:'.BASE_URL.'cursos/listar');
				exit;
	}
}

}