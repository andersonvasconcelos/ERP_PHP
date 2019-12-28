<?php 
namespace Controllers;

use Core\Controller;
use Models\Pacotes;
use Models\Cursos;

class PacotesController extends Controller{
	
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
		$curso = new Pacotes();
		
		$dados = array(
		'pagina' => 'Listar Pacotes',
		'lista' => $curso->getPacotesAll()

		);
		
		$this->loadTemplate('pacotes/listar', $dados);
	}


	public function inserir()
	{
		if (!empty($_POST['nome_pacote'])) {
			$nome = addslashes(trim($_POST['nome_pacote']));
			$valor = addslashes(trim($_POST['valor_pacote']));
			$slug = mb_strtolower(preg_replace('/( )+/' , '_' , $nome));

			$pacote = new Pacotes();

				if($pacote->addPacote($nome, $valor, $slug)){
					$_SESSION['sucess'] = "Pacote cadastrado com sucesso!";
					header('Location:'.BASE_URL.'pacotes/listar');
					exit;
				}
		}

		echo "ERRO: Pacote não adastrado!";
	}


			public function vincular($id)
		{
		
			$c = new Cursos();
			$p = new Pacotes();

			$dados = array(
			'pagina' => 'Vincular Cursos e Pacotes',
			'id_grupo' => $id,
			'lista' => $c->getCursosAll(),
			'item_p' => $p->getCursosId($id)  
			);

		$this->loadTemplate('pacotes/vincular', $dados);
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