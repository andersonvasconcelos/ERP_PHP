<?php 
namespace Controllers;

use Core\Controller;
use Models\Segmentos;

class SegmentosController extends Controller{

	public function __construct(){$this->putLogin();}
		
		public function index(){
		$s = new Segmentos();
		$dados = array(
		'pagina' => 'Listar Segmentos',
		'segmentos' => $s->getSegAll()
		);

		$this->loadTemplate('/segmentos/listar', $dados);
		
		}

		public function inserir(){
		
		$dados = array(
		'pagina' => 'Adicionar Segmento'
		);

		$this->loadTemplate('/segmentos/adicionar', $dados);
		
		}


	public function adicionar(){
		$dados = array();
		if (!empty($_POST['nome'])) {
			$nome = $_POST['nome'];
		    $slug = mb_strtolower(preg_replace('/( )+/' , '-' , $nome)); 

			$s = new Segmentos();
			if($s->addSegmento($nome, $slug))
			{
				echo "Segmento cadastrado com sucesso!";
			} 
			else 
			{
				echo "Não é possível cadastrar segmento!";
			}
		} 
		else 
		{ 
			$_SESSION['danger'] = "Não é possível cadastrar segmento!";
			header('Location:'.BASE_URL.'segmentoss/listar');
			exit; 
		}
}
	public function deletar($id){
		
		$s = new Segmentos();
		 if($s->delet($id)){echo "Segmento deletado com sucesso!";} 
		 else{ echo "Não é possível deletar segmento!"; }
	}

	public function edit($slug){
		$s = new Segmentos();

		$dados = array(
		'pagina' => 'Editar Segmento',
		'segmento' => $s->getSegmentoSlug($slug)
		 );
		
		$this->loadTemplate('/segmentos/editar', $dados);
	}

	public function editar(){
		if (isset($_POST['nome'])) {
		 $id = $_POST['id'];
		 $nome = $_POST['nome'];

		 $s = new Segmentos();

			if($s->editar($nome, $id)){echo "Segmento editado com sucesso!";} 
			else {echo "Não foi possível editar!";}
		}	
	}

}