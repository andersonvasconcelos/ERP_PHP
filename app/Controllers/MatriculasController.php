<?php 
namespace Controllers;

use Core\Controller;
use Models\Matriculas;
use Models\Pacotes;
use Models\Home;
use Models\Docs;


class MatriculasController extends Controller{

		public function __construct()
		{
			$this->putLogin();

			if($this->hasPermisson('aba-aluno')){
				return true;
			}
		
			header("Location:".BASE_URL);
			exit;
		}
		
		public function index(){}

		public function adicionar()
		{

			if (isset($_POST['id'])) {

			$m = new Matriculas();
			$p = new Pacotes();
			$a = new Home();
			
			$id_aluno = addslashes(trim($_POST['id']));
			$id_curso = addslashes(trim($_POST['id_curso']));
			$tipo = addslashes(trim($_POST['tipo']));
			$cursos = $p->getCursos($id_curso);
			$polo_id = $m->GetPoloId($id_aluno);
			$data = date('Y/m/d');
			$ra = "0".$polo_id['polo_id']."000".$id_aluno;

			foreach ($cursos as $idc) {
				if($m->existeMatricula($id_aluno, $idc['curso_id'], $data)){
					$msg = array(
						'erro' => true,
						'msg' => 'Aluno já esta matriculado nesse curso!!!!'
					);

					echo json_encode($msg);
					exit;
				}
			 	else{
				 		$id = $m->addMat($id_aluno, $idc['curso_id'], $id_curso, $data, $ra, $tipo);
				 		$link = "liberarMatricula/liberacao/".$id;
			 		}
			}
			 	$a->addAlert($ra, $link);
			 	echo $id;
			 	
				} else{
					$msg = array('msg' => 'Erro ao Matricular!!!!!');
					echo json_encode($msg);
				  }
		}

		public function listar()
		{
			$m = new Matriculas();

			$dados  = array(
			'pagina' => "Listar Matrículas",
			'matriculas' => $m->GetMatricula()
			);

			$this->loadTemplate('matriculas/listar', $dados);
		}

		public function listarMatriculas()
		{
			$m = new Matriculas();

			$dados  = array(
			'pagina' => "Listar Matrículas",
			'matriculas' => $m->GetMatricula() 
			);

			$this->loadTemplate('matriculas/listarMatriculas', $dados);
		}

		public function liberacao($id)
		{
			$a = new Matriculas();
			$d = new Docs();

			$dados = array(
				'pagina' => 'Liberar Matrícula',
				'alunos' => $a->GetIdMatricula($id),
				'docs' => $d->getDocs($id),
				'path' => ('assets/img/alunos/')
				);
		
			$this->loadTemplate('matriculas/liberar', $dados);
		}

		public function moduloConcluido()
	{
		$m = new Matriculas();

		$matriculas = $this->admin() ? $matriculas = $m->GetMatriculaConluida() : $m->GetMatriculaConluidaPolo($this->getUser()['polo_id']);
	
			$dados  = array(
			'pagina' => "Módulos Concluidos",
			'matriculas' => $matriculas
			);

		$this->loadTemplate('matriculas/matConcluido', $dados);
	}

	public function addFim()
	{
			$m = new Matriculas();
			$matriculas = $this->admin() ? $m->GetMatricula() : $m->GetMatriculaPolo($this->getUser()['polo_id']);

			$dados  = array(
			'pagina' => "Informar Fim Módulo",
			'matriculas' => $matriculas
			);

			$this->loadTemplate('matriculas/addfim', $dados);
	}
	 public function fimMod()
	 {
	 	if ($_POST['id']) 
	 	{
	 		$id = addslashes(trim($_POST['id']));

	 		$m = new Matriculas();

	 		$aluno = $m->getAlunoMsg($id);

	 		$msg = 'O aluno:'.$aluno['nome_aluno']. ' com o RA:'.$aluno['numero_matricula']. ' acabou de concluir o modulo '.$aluno['nome_curso']. ' com sucesso.
	 		 (ERP Portal Eja)';
	 		 
	 		if ($m->fimMod($id)) 
	 		{	
	 			if($m->enviarEmail($msg))
	 			{
	 				$sms = $m->enviarSMS($msg);
	 				echo 'success';
	 				exit();
	 			}	
	 		}
	 	}
	 	echo 'Não foi possive flinalizar módulo!';
	 }

		public function confirmaMatricula()
		{
			if (isset($_POST['id'])) {
				$m = new Matriculas();

				$id = addslashes(trim($_POST['id']));

				if ($m->confirmaMatricula($id)) {
					echo "Matrícula confirmada com sucesso!";
					exit();
				}

			}
			echo "Erro: Não foi possível confirmar matícula!";
		}

		public function matriculaPendente(){
			if (isset($_POST['id'])) {
				$m = new Matriculas();

				$id = addslashes(trim($_POST['id']));
				$negativa = addslashes(trim($_POST['negativa']));

				if ($m->matriculaPendente($negativa, $id)) {
					echo "Matrícula indeferida com sucesso!";
					exit();
				}


			}
		}


}