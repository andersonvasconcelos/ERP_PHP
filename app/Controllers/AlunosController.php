<?php 
namespace Controllers;

use Core\Controller;
use Models\Home;
use Models\Polos;
use Models\Pacotes;
use Models\Matriculas;
use Models\Alunos;
use Models\Docs;

class AlunosController extends Controller{

	public function __construct()
	{
		$this->putLogin();

		if($this->hasPermisson('aba-aluno')){
			return true;
		}
		header("Location:".BASE_URL);
		exit;
	}
		
	public function index()
	{
		$p = new Polos();
		$e = new Home();
		$pac = new Pacotes();

		$dados = array(
		'pagina' => 'Adicionar Alunos',
		'polos' => $p->getPolosAll(),
		'estados' => $e->getEstadosAll(),
		'pacotes' => $pac->getPacotesAll(),
		);

		$this->loadTemplate('alunos/adicionar', $dados);
	}

	public function listar()
	{
		$c = new Alunos();

		$listas = $this->admin() ? $c->getAlunos() : $c->getAlunosPolo($this->getUser()['polo_id']);

		$dados = array(
		'pagina' => 'Listar Alunos',
		'lista' => $listas
		);
		
		$this->loadTemplate('alunos/listar', $dados);
	}

	public function adicionar()
	{	
		if(isset($_POST['nome_aluno'])) {

		$nome = addslashes(trim($_POST['nome_aluno']));
		$sexo = addslashes(trim($_POST['sexo']));
		$estado_civil = addslashes(trim($_POST['estado_civil']));
		$data_de_nascimento = addslashes(trim($_POST['data_de_nascimento']));
		$estado_de_nascimento = addslashes(trim($_POST['estado_de_nascimento']));
		$cidade_de_nascimento = addslashes(trim($_POST['cidade_de_nascimento']));
		$nacionalidade = addslashes(trim($_POST['nacionalidade']));
		$rg = addslashes(trim($_POST['rg']));
		$estado_emissor = addslashes(trim($_POST['estado_emissor']));
		$orgao_emissor  = addslashes(trim($_POST['orgao_emissor']));
		$data_expedicao = addslashes(trim($_POST['data_expedicao']));
		$cpf = addslashes(trim($_POST['cpf']));
		$tel = addslashes(trim($_POST['telefone_aluno']));
		$tc = addslashes(trim($_POST['telefone_comercial']));
		$tr = addslashes(trim($_POST['telefone_residencial']));
		$mae = addslashes(trim($_POST['nome_mae']));
		$pai = addslashes(trim($_POST['nome_pai']));
		$resp = addslashes(trim($_POST['resp']));
		$job = addslashes(trim($_POST['profissao']));
		$local_trabalho = addslashes(trim($_POST['local_trabalho']));
		$email = addslashes(trim($_POST['email_aluno']));
		$senha = addslashes(trim($_POST['senha_aluno']));
		$cep = addslashes(trim($_POST['cep']));
		$end = addslashes(trim($_POST['endereco_aluno']));
		$numero = addslashes(trim($_POST['numero_aluno']));
		$complemento = addslashes(trim($_POST['complemento']));
		$bairro_aluno = addslashes(trim($_POST['bairro_aluno']));
		$cidade_aluno = addslashes(trim($_POST['cidade_aluno']));
		$estado_aluno = addslashes(trim($_POST['estado_aluno']));
		$inep = addslashes(trim($_POST['inep']));
		if ($inep == 'sim') {$n_inep = addslashes(trim($_POST['numero_do_inep']));}
		else{$n_inep = 'Aluno não informou seu INEP';}
		$cc_empresa = addslashes(trim($_POST['cc_empresa']));
		$cc_empresa_id = addslashes(trim($_POST['cc_empresa_id']));
		$obs = addslashes(trim($_POST['editordata']));
		$slug = mb_strtolower(preg_replace('/( )+/' , '-' , $nome));
		$polo_id = $this->getUser()['polo_id'];

		$a = new Alunos();

		$aluno_id = $a->addAluno(
			$nome, $sexo, $estado_civil, $data_de_nascimento, $estado_de_nascimento,
$cidade_de_nascimento, $nacionalidade, $rg, $estado_emissor, $orgao_emissor, $data_expedicao, $cpf, 
$tel, $tc, $tr, $mae, $pai, $resp, $job, $local_trabalho, $email, $senha, $cep, $end, $numero, 
$complemento, $bairro_aluno, $cidade_aluno, $estado_aluno, $inep, $n_inep, $cc_empresa, 
$cc_empresa_id, $obs, $polo_id, $slug);

		if(!empty($aluno_id))
		{
		$a->createAluno($email, $senha, $nome);
		echo json_encode($aluno_id);
		exit();
		} 
			else {
				$aluno_id = 0;
				echo json_encode($aluno_id);
			}
	   }	else {
	   	echo 'Não é possível cadastrar aluno!';} 
	}

	public function deleteAluno()
	{
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$a = new Alunos();
			if($a->deletAluno($id)){echo "Aluno deletado com sucesso!";} 
			else{echo "Não é possível deletar aluno!";}
		}
	}

	public function edit($slug){
		$c = new Alunos();

		$dados = array(
		'pagina' => 'Editar Aluno',
		'alunos' => $c->getAlunosId($slug),
		'path' => ('public/assets/img/alunos/')
		 );
		
		$this->loadTemplate('/alunos/editar', $dados);
	}

	public function editarAluno()
	{
		if (isset($_POST['id']) && empty($_POST['id']) == false)
		{
		
			$c = new Alunos();

			$id = addslashes(trim($_POST['id']));
			$nome = addslashes(trim($_POST['nome_aluno']));
			$sexo = addslashes(trim($_POST['sexo']));
			$estado_civil = addslashes(trim($_POST['estado_civil']));
			$data_de_nascimento = addslashes(trim($_POST['data_de_nascimento']));
			$estado_de_nascimento = addslashes(trim($_POST['estado_de_nascimento']));
			$cidade_de_nascimento = addslashes(trim($_POST['cidade_de_nascimento']));
			$nacionalidade = addslashes(trim($_POST['nacionalidade']));
			$rg = addslashes(trim($_POST['rg']));
			$estado_emissor = addslashes(trim($_POST['estado_emissor']));
			$orgao_emissor  = addslashes(trim($_POST['orgao_emissor']));
			$data_expedicao = addslashes(trim($_POST['data_expedicao']));
			$cpf = $this->limpaCPF_CNPJ(addslashes(trim($_POST['cpf'])));
			$tel = addslashes(trim($_POST['telefone_aluno']));
			$tc = addslashes(trim($_POST['telefone_comercial']));
			$tr = addslashes(trim($_POST['telefone_residencial']));
			$mae = addslashes(trim($_POST['nome_mae']));
			$pai = addslashes(trim($_POST['nome_pai']));
			$job = addslashes(trim($_POST['profissao']));
			$local_trabalho = addslashes(trim($_POST['local_trabalho']));
			$email = addslashes(trim($_POST['email_aluno']));
			$cep = addslashes(trim($_POST['cep']));
			$end = addslashes(trim($_POST['endereco_aluno']));
			$numero = addslashes(trim($_POST['numero_aluno']));
			$complemento = addslashes(trim($_POST['complemento']));
			$bairro_aluno = addslashes(trim($_POST['bairro_aluno']));
			$cidade_aluno = addslashes(trim($_POST['cidade_aluno']));
			$estado_aluno = addslashes(trim($_POST['estado_aluno']));
			$inep = addslashes(trim($_POST['inep']));
			if ($inep == 'sim') {$n_inep = addslashes(trim($_POST['numero_do_inep']));}
			else{$n_inep = 'Aluno não informou seu INEP';}
			$cc_empresa = addslashes(trim($_POST['cc_empresa']));
			$cc_empresa_id = addslashes(trim($_POST['cc_empresa_id']));
			$obs = addslashes(trim($_POST['editordata']));
			$slug = mb_strtolower(preg_replace('/( )+/' , '-' , $nome));
			$diretorio = 'public/assets/img/alunos/' . $cpf;
		
				if (!empty($_FILES['docs']['tmp_name'])) 
				{
					$arquivo = $_FILES['docs'];
					$type = $arquivo['type'];
					$docs = 1;
				
							// Faz a verificação do tamanho do arquivo //
						if ($_FILES['docs']['size'] > 31457280) 
						{
							echo "O arquivo enviado é muito grande, envie arquivos de até 15 Mb.";
							exit();
						} 
							// Faz a verificação do tipo do arquivo se é pdf //
						if ($type !== 'application/pdf') 
						{
							echo "ERROO!!! Por favor, só envie arquivo com a extensão: PDF \n";
							exit();
						}
						
						// Criar o nome do arquivo //
						//$nome = base64_encode('docs').$cpf.'.pdf';
						$nome_docs = rand(0, 999).time().$cpf.'.pdf';
						// Faz a verificação se a pasta para salvar a imagem existe //
						if (!file_exists($diretorio))
						{
							mkdir($diretorio, 0777, TRUE);
						}
						// envia o documento para a pasta no sistema //
						move_uploaded_file($arquivo['tmp_name'], $diretorio. '/' .$nome_docs);
				}

			$c->editarAluno($nome, $cpf, $rg, $tel, $email, $pai, $sexo, $id);
			echo "success";
			exit();
			
		}else {echo "EROOO!!!!! Não foi possivel editar aluno";}
	}
		public function mat()
	{


			$dados = array(
			
			);

			$this->loadView('alunos/mat', $dados);
	}
	public function addMatricula($id)
	{
			$p = new Pacotes();
			$a = new Alunos();

			$dados = array(
			'pagina' => 'Matrícular Aluno',
			'pacotes' => $p->getPacotesAll(),
			'alunos' => $a->getAlunoId($id)
			);

			$this->loadTemplate('matriculas/adicionar', $dados);
	}

	public function matriculas()
	{
		$m = new Matriculas();
		$matriculas = $this->admin() ? $m->GetMatricula() : $m->GetMatriculaPolo($this->getUser()['polo_id']);

			$dados  = array(
			'pagina' => "Listar Matrículas",
			'matriculas' => $matriculas
			);

		$this->loadTemplate('alunos/matricula', $dados);
	}


		public function editarMatricula($id)
		{
			$a = new Matriculas();
			$d = new Docs();

			$dados = array(
				'pagina' => 'Editar Aluno Matriculado',
				'alunos' => $a->GetIdMatricula($id),
				'docs' => $d->getDocs($id),
				'path' => ('assets/img/alunos/'));
			
			$this->loadTemplate('alunos/listarAluno', $dados);
		}

		public function matriculado($id){
			$a = new Alunos();

			if ($a->verificaMatriculado($id) == false) {
				return true;
				exit;
			}

			return false; 
		}

		public function upEdit()
		{
			if (isset($_POST['id'])) {
				$m = new Matriculas();
				$a = new Home();

				$id = addslashes(trim($_POST['id']));

				if ($m->upEditMatricula($id)) {
					$link = "liberarMatricula/liberacao/".$id;
					$ra = $a->getRa($id);
			 		$a->addAlert($ra, $link);
					echo "Matrícula corrigida com sucesso!";
					exit();
				}


			}

		}

		public function verRa($numero)
		{
			$a = new Alunos();
			
			if ($a->getRa($numero) == false) 
			{
				return true;
				exit;
			}
			return false;
		}

		public function editDocs($docs)
		{
			if(!empty($_FILES[$docs]['name'])) {
			
			$docs = $_FILES[''.$docs.''];

			return $docs;
			}
		}

		
}