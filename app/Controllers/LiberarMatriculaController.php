<?php 
namespace Controllers;

use Core\Controller;
use Models\Matriculas;
use Models\Docs;
use Models\Contas;
use Models\Pagamentos;



class LiberarMatriculaController extends Controller{

		public function __construct()
		{
			$this->putLogin();

			if($this->hasPermisson('aba-liberação-de-matricula')){
				return true;
			}
		
			header("Location:".BASE_URL);
			exit;
		}
		
		public function index()
		{
			
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

			$this->loadTemplate('liberacao/listarMatriculas', $dados);
		}

		public function liberacao($id)
		{
			$a = new Matriculas();
			$d = new Docs();

			$dados = array(
				'pagina' => 'Liberar Matrícula',
				'alunos' => $a->GetIdMatricula($id),
				'docs' => $d->getDocs($id),
				'path' => ('public/assets/img/alunos/')
				);
		
			$this->loadTemplate('matriculas/liberar', $dados);
		}

		public function confirmaMatricula()
		{
			if (isset($_POST['id'])) {

				$m = new Matriculas();

				$id = addslashes(trim($_POST['id']));
				$id_aluno = addslashes(trim($_POST['id_aluno']));
				$id_curso = addslashes(trim($_POST['id_curso']));

				if ($m->matricularGlobal($id_aluno, $id_curso)) {
					$m->confirmaMatricula($id);
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

		public function getCredencialPolo($id){
			$conta = new Contas();
			return $conta->getCredencial($id);
		}

		public function getChavePolo($id){
			$conta = new Contas();
			return $conta->getChave($id);
		}


		public function formatData($data)
		{
			$data = date('d/m/Y', strtotime($data)); 
			return $data;
		}

		public function verificarPago($pago)
		{
			if ($pago == ""){
		    echo '<td><span class="btn btn-sm btn-danger">Não Pago</span></td>';
	        } else { 
	        echo '<td><span class="btn btn-sm btn-success">Pago</span></td>';
	    	} 
	    }

	    public function deletMatricula(){
	    	
	    	if (isset($_POST['id'])) {
	    		$id = addslashes(trim($_POST['id']));

		    	$m = new Matriculas();
		    	$p = new Pagamentos();

		    	if ($ra = $m->GetRaMatriculaId($id)) {
		    		$ra = $ra['numero_matricula'];
		    		if ($p->delPagamento($ra) || $m->deletMat($ra) ) 
		    		{

				    		echo "Matricula Deletada com Sucesso!";
							exit;
		
		    		}
		    	}
			}
		}


}