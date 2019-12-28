<?php 
namespace Controllers;

use Core\Controller;
use Models\Exercicios;
use Models\Aulas;

class ExerciciosController extends Controller{

	public function __construct(){$this->putLogin();}
	
	public function index(){
		
	}

	public function listar(){
		$e = new Exercicios();
		
		$dados = array(
		'pagina' => 'Listar Exercícios',
		'lista' => $e->getExAll()
		);
		
		$this->loadTemplate('/exercicios/listar', $dados);
	}

	public function adicionar(){
		$e = new Exercicios();

		$dados = array(
		'pagina' => 'Adicionar Exercício',
		'aulas' => $e->getCursos()
		);
		
		$this->loadTemplate('/exercicios/adicionar', $dados);
	}

	public function add(){


		if (!empty($_POST['curso'])) {

			$curso = $_POST['curso'];
			$modulo = $_POST['modulo'];
			$pergunta = $_POST['pergunta'];  
			$opcao1 = $_POST['opcao1'];
			$opcao2 = $_POST['opcao2'];
			$opcao3 = $_POST['opcao3'];
			$opcao4 = $_POST['opcao4'];
			$opcao5 = $_POST['opcao5'];
			$resposta = $_POST['resposta'];
			
			$e = new Exercicios();

			if($e->addEx($curso, $modulo, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5, $resposta)){
				echo "Exercicio cadastrado com sucesso!";} 

			else{echo "Não é possível cadastrar exercicio!";}
		} 
		else{echo "Não é possível cadastrar exercicio!";}
}

	public function deletar(){
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$e = new Exercicios();
			if($e->deletEx($id)){
				echo "Exercicio deletado com sucesso!";
			} else{
				echo "Não é possível deletar exercicio!";
			}
		} else {echo "Não é possível deletar esxercicio!";}
	}

	public function edit($id){
		$c = new Exercicios();

		$dados = array(
		'pagina' => 'Editar Aluno',
		'ex' => $c->getExId($id)
		 );
		
		$this->loadTemplate('/exercicios/editar', $dados);
	}

	public function editar(){

	if (!empty($_POST['resposta'])) {

			$id = $_POST['id'];
			$pergunta = $_POST['pergunta'];  
			$opcao1 = $_POST['opcao1'];
			$opcao2 = $_POST['opcao2'];
			$opcao3 = $_POST['opcao3'];
			$opcao4 = $_POST['opcao4'];
			$opcao5 = $_POST['opcao5'];
			$resposta = $_POST['resposta'];
			
			$e = new Exercicios();

			if($e->EditEx($pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5, $resposta, $id)){
				echo "Exercicio editado com sucesso!";} 

			else{echo "Não é possível editar exercicio!";}
		} 
		else{echo "Não é possível editar exercicio!";}
}

	public function getModulo(){
		if (isset($_POST['id'])) {

			$id = $_POST['id'];
			$e = new Exercicios();

			if($dados = $e->getModulos($id)){
					echo '<option>'.'Selecione';
					foreach ($dados as $item) {
						echo '<option value="'.$item['id_modulo'].'">';
						echo $item['nome_modulo'];
						echo '</option>';
					}
				}


	}
}

		public function getMid(){
		
			if (isset($_POST['id'])) {

			$id = $_POST['id'];
			$a = new Aulas();

				if($dados = $a->getAulasMid($id)){
					echo '<option>'.'Selecione';
					foreach ($dados as $item) {
						echo '<option value="'.$item['id_modulo'].'">';
						echo $item['nome_modulo'];
						echo '</option>';
					}
				}
			} 
		}

		public function getAid(){
		
			if (isset($_POST['id'])) {

			$id = $_POST['id'];
			$a = new Aulas();

				if($dados = $a->getAulasAid($id)){
					echo '<option>'.'Selecione';
					foreach ($dados as $item) {
						echo '<option value="'.$item['id_aula'].'">';
						echo $item['nome_aula'];
						echo '</option>';
					}
				}
			} 
		}

		public function importarExcel()
		{
			$e = new Exercicios();

			if(!empty($_FILES['arquivo']['tmp_name']))
			{
				$arquivo = new DOMDocument;
				$arquivo->load($_FILES['arquivo']['tmp_name']);

				$linhas = $arquivo->getElementsByTagName('Row');

				$contLinha = 1;
				foreach ($linhas as $linha)
				{

						if($contLinha >1)
						{
							$curso = $linha->getElementsByTagName('Data')->item(0)->nodeValue;
							$modulo = $linha->getElementsByTagName('Data')->item(1)->nodeValue;
							$pergunta = $linha->getElementsByTagName('Data')->item(2)->nodeValue;
							$opcao1 = $linha->getElementsByTagName('Data')->item(3)->nodeValue;
							$opcao2 = $linha->getElementsByTagName('Data')->item(4)->nodeValue;
							$opcao3 = $linha->getElementsByTagName('Data')->item(5)->nodeValue;
							$opcao4 = $linha->getElementsByTagName('Data')->item(6)->nodeValue;
							$opcao5 = $linha->getElementsByTagName('Data')->item(7)->nodeValue;
							$resposta = $linha->getElementsByTagName('Data')->item(8)->nodeValue;

							$e->addEx($curso, $modulo, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5, $resposta);
						}
					$contLinha++;
				}

				$_SESSION['success'] = "Exercicios importados com sucesso";
					header('Location:'.BASE_URL.'exercicios/listar');
					exit;
			}
		}
}