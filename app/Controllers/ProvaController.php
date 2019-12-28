<?php 
namespace Controllers;

use Core\Controller;
use Models\Exercicios;
use Models\Provas;
use Models\Alunos;


class ProvaController extends Controller{

	//public function __construct(){$this->putLogin();}
	
	public function index()
	{
		$a = new Exercicios();

		$dados = array(
			'pagina' => 'Prova',
			'aulas' => $a->getCursosV()
		);
		
		$this->loadTemplate('/prova/index', $dados);
	}

	public function listar()
	{

		$a = new Exercicios();

		$dados = array(
			'pagina' => 'Listar Provas',
			'aulas' => $a->getCursosV()
			);
		
		$this->loadTemplate('prova/listar', $dados);
	}


	public function historico()
	{

		$a = new Exercicios();

		$dados = array(
			'pagina' => 'Listar Provas',
			'aulas' => $a->getCursosV()
			);
		
		$this->loadTemplate('prova/boletim/listar', $dados);
	}

	public function getProvas($curso)
	{
		$p = new Provas();
		return $p->getProvas($curso);
	}

		public function getProvasPoloId($curso, $id)
	{
		$p = new Provas();
		return $p->getProvasPoloId($curso, $id);
	}

	public function area($aluno, $curso)
	{

		$p = new Provas();
		$listas = $p->getArea($aluno, $curso);

		$dados = array(
			'pagina' => 'Listar Provas',
			'lista' => $listas
			);
		
		$this->loadTemplate('prova/area', $dados);
	}

		public function data($aluno, $curso, $area)
	{

		$p = new Provas();
		$listas = $p->getData($aluno, $curso, $area);

		$dados = array(
			'pagina' => 'Listar Provas',
			'lista' => $listas
			);
		
		$this->loadTemplate('prova/data', $dados);
	}

	public function show($aluno, $curso, $area, $data)
	{

		$p = new Provas();

		$listas = $this->admin() ? $p->getProvasAluno($aluno, $curso, $area, $data) : 
		$p->getProvasAlunosPoloId($aluno, $curso, $this->getUser()['polo_id'], $area);

		$dados = array(
			'pagina' => 'Listar Provas',
			'lista' => $listas
			);
		
		$this->loadTemplate('prova/show', $dados);
	}


	public function print($aluno, $curso)
	{
			
		$p = new Provas();

		$listas =  $this->admin() ? $p->getPrintAlunos($aluno, $curso) :
		$p->getPrintAlunosPoloId($aluno, $curso, $this->getUser()['polo_id']);

		$dados = array(
			'pagina' => 'Listar Provas',
			'lista' => $listas
			);
		
		$this->loadTemplate('prova/print', $dados);
	}


	public function editar($id)
	{
		
		$p = new Provas();

		$dados = array(
			'pagina' => 'Editar Data',
			'lista' => $p->getDados($id)
			);
		
		$this->loadTemplate('prova/editar', $dados);
	}

	public function editProva()
	{
		if (isset($_POST['data']) || isset($_POST['hora'])) {
			$data = addslashes(trim($_POST['data']));
			$hora = addslashes(trim($_POST['hora']));
			$aluno = addslashes(trim($_POST['aluno']));
			$curso = addslashes(trim($_POST['curso']));
			$area = addslashes(trim($_POST['area']));
			
			$p = new Provas();

			if ($p->editarProva($data, $hora, $aluno, $curso, $area)) {
				
				$_SESSION['success'] = "Data e Hora editada com sucesso";
				header('Location:'.BASE_URL.'prova/listar');
				exit;
			}
		}
				$_SESSION['danger'] = "Não foi possível editar Data e Hora";
				header('Location:'.BASE_URL.'prova/listar');
				exit;
	}

	public function upProva($id){

		$p = new Provas();

		$dados = array(
			'pagina' => 'Anexar Prova',
			'lista' => $p->getDados($id)
			);
		
		$this->loadTemplate('prova/subir', $dados);
	}

	public function anexarProva()
	{
		
		$a = new Alunos();

		if (isset($_FILES['provaup']['tmp_name'])) 
		{
			$arquivo = $_FILES['provaup'];
			$type = $arquivo['type'];
			$id = $_POST['aluno'];
			$id_prova = $_POST['id_prova'];
			
			$slug = $a->getCpf($id);
			$slug = $this->limpaCPF_CNPJ($slug['cpf_aluno']);
			$caminho = 'assets/img/alunos/'.$slug;

					// Faz a verificação do tamanho do arquivo
			if ($_FILES['provaup']['size'] > 15728640) {
			echo "O arquivo enviado é muito grande, envie arquivos de até 15 Mb.";} 

			// Faz a verificação se é PDF
			if ($type === 'application/pdf') {
				
				$p = new Provas();
				$nome = $_FILES["provaup"]["name"];
				
				if (!file_exists($caminho)){
				mkdir($caminho, 0777, TRUE);
				}
				
				move_uploaded_file($arquivo['tmp_name'], $caminho.'/'.$nome);

				$p->upNomeProva($nome, $id_prova);

				$_SESSION['success'] = "Prova Anexada com Sucesso!";
				header('Location:'.BASE_URL.'prova/listar');
				exit;
			}
		}
	}

		public function avaliacao()
		{

			$p = new Provas();
			$a = new Exercicios();

			$dados = array(
				'pagina' => 'Listar Provas',
				'aulas' => $a->getCursosV()
				);
			
			$this->loadTemplate('prova/avaliacao', $dados);
		}

	public function gerarProva()
	{
		if (isset($_POST['area']) && !empty($_POST['id_aluno']))
		{
			$aluno = addslashes(trim($_POST['id_aluno']));
			$curso = addslashes(trim($_POST['curso']));
			$data = addslashes(trim($_POST['data']));
			$hora = addslashes(trim($_POST['hora']));
			$area = addslashes(trim($_POST['area']));
			$date = date('Y-d-m');

			$p = new Provas();

			// Verificar se matricula foi a menos de 50 dias //
			//$this->ver50dias($aluno, $curso, $data);

			// Verificar se o aluno tem prova marcada a menos de 15 dias //
			//$this->ver15dias($aluno, $curso, $date);

			
				if ($modulos = $p->getModuloArea($curso, $area, $date))
			{
		
				foreach ($modulos as $key => $id) {

				$dados = $p->montarAvaliacaoArea($id['id_modulo']);
				
				foreach ($dados as $key) {

				$exer[] = $key['id_exercicio'];

				}

				$json = json_encode($exer);
				$id_prova = $p->gerarProva($aluno, $curso, $data, $hora, $area, $id['id_modulo']);
				$p->salvarProvaGerada($json, $id_prova);
				unset($exer);
				}
						echo json_encode("Prova cadastrada com sucesso");
					exit;
			}


		}
		elseif (!isset($_POST['area']) && !empty($_POST['id_aluno'])) 
		{
			$aluno = addslashes(trim($_POST['id_aluno']));
			$curso = addslashes(trim($_POST['curso']));
			$data = addslashes(trim($_POST['data']));
			$hora = addslashes(trim($_POST['hora']));
			$area = 5;
			$date = date('Y-m-d');

			$p = new Provas();

				// Verificar se matricula foi a menos de 50 dias //
			//$this->ver50dias($aluno, $curso, $data);

				// Verificar se o aluno tem prova marcada a menos de 15 dias //
			//$this->ver15dias($aluno, $curso, $date);

			$modulos = $p->getModulo($curso);

				
				foreach ($modulos as $id) {
		
					$dados = $p->montarAvaliacao($id['id_modulo']);

					foreach ($dados as $key) {

						$exer[] = $key['id_exercicio'];
					}
				}

				$id_prova = $p->gerarProva($aluno, $curso, $data, $hora, $area, $id['id_modulo']);
				
				$dados = $p->montarEdf();
					foreach ($dados as $key) 
					{
						$exer[] = $key['id_exercicio'];
					}

				$json = json_encode($exer);
				if($p->salvarProvaGerada($json, $id_prova))
				{
					echo json_encode('Prova Gerada com Sucesso');
					exit();
				}
		}
				$dados = array(
						'erro' => true,
						'msg' => 'ATENÇÃO: Prova Não Gerada'
						);

						echo json_encode($dados);
					    exit();
	}


	public function pPdf($id)
	{
		$dados = array(
			'id' => $id,
			'pagina' => 'pdf'
			);
		$this->loadView('prova/gerarProvaPdf', $dados);
	}

	public function provaPdf($id)
		{

			$a = new Provas;

			$dados = array(
				'alunos' => $a->getexerciciosProva($id)
			);
			//print_r($dados);
			$areaC = $dados['alunos']['area_id'];

			if($areaC === '5'){
				$this->loadView('prova/contrato', $dados);
			}else{
				$this->loadView('prova/areas', $dados);
			}
		}

	public function gabarito($id)
	{
		if ($this->admin())
		{
			$a = new Provas();

			$dados = array(
				'dado' => $a->getDados($id),
				'alunos' => $a->getexerciciosProva($id));
			
			$this->loadTemplate('/prova/gabarito', $dados);
			exit;
		}

		header("Location:".BASE_URL);
		exit;
		
	}

	public function corrigir($id)
	{
			
			$a = new Provas;

			$dados = array(
				'pagina' => "Corrigir Prova",
				'dado' => $a->getDados($id),
				'alunos' => $a->getexerciciosProva($id));
			
			$this->loadTemplate('/prova/corrigir', $dados);
			exit;
	
		header("Location:".BASE_URL);
		exit;
		
	}
	public function correcao()
	{
		 if(!empty($_POST['respostas']))
		{
			$resp = $_POST['respostas'];
			$certo = $_POST['exer'];
			$prova_id = addslashes(trim($_POST['prova']));
			$area = addslashes(trim($_POST['area']));
			$total_resp = count($resp);
			$acertos = 0;
			$nota = 0;
	        $respostas_aluno = json_encode($resp);
	        $p = new Provas();
			
	            if ($p->salvarRespostas($prova_id, $respostas_aluno)) 
	            {   
	             for ($i=1; $i <= $total_resp; $i++) 
	    	    {
	    	    	$acertos = ($certo[$i] == $resp[$i]) ? $acertos+1 : $acertos;
				} 	

				  $nota = $acertos * (10/$total_resp);
				  $nota = round($nota, 1);	

				$t = $p->getTentativa($prova_id);
				$tentativa = $t->tentativa + 1;
				
				$p->salvarNota($nota, $prova_id, $acertos);
				$p->upTentativa($prova_id, $tentativa);
	            	           

					if ($area === '5' && $nota >= 7) 
					{$msg = '<p class="alert alert-success">'.'Aluno Aprovado!!!!!'.'</p>';}
					elseif ($area != '5' && $nota >= 5) 
					{$msg = '<p class="alert alert-success">'.'Aluno Aprovado!!!!!'.'</p>';}
					else{$msg = '<p class="alert alert-danger">Aluno Reprovado!!!!!</p>';}

	    			$dados = array(
		            'pagina' => "Resultado da Prova",
					'nota' => $nota,
					'acertos' => $acertos,
					'msg' => $msg,
					'dado' => $p->getDados($prova_id)
					);
				
					$this->loadTemplate('prova/resultado', $dados);
					exit();
				}
		}
		  $_SESSION['danger'] = "Prova não foi corrigida. Preenchar corretamente!";
		  header('Location:'.BASE_URL.'prova/listar');
		  exit; 
	}

	public function nota($id)
	{

		$p = new Provas();

			$dados = $p->getDados($id);

            	if ($dados['area_id'] === '5' && $dados['nota'] >= 7) 
            	{
            		$media_final = $dados['nota'];
            		$msg_resultado = '<p class="alert alert-success">'.'Aluno Aprovado!!!!!'.'</p>';
            	} 
            	elseif ($dados['area_id'] === '5' && $dados['nota'] < 7) 
            	{
            		$media_final = $dados['nota'];
            		$msg_resultado = '<p class="alert alert-danger">Aluno Reprovado!!!!!</p>';
            	} 
            	elseif ($dados['area_id'] != '5') 
            	{
            		$media_final = $dados['nota'] + 2;
            		$media_final = ($media_final <= 10) ? $media_final : 10;

            		if ($media_final >= 5) {
            		 	$msg_resultado = '<p class="alert alert-success">'.'Aluno Aprovado!!!!!'.'</p>';
            		 } else{
            		 	$msg_resultado = '<p class="alert alert-danger">Aluno Reprovado!!!!!</p>';
            		 }
            	}
	
			/*if ($dados['nota'] >= 7){$msg_resultado = '<p class="alert alert-success">'.'Aluno Aprovado!!!!!'.'</p>';}
		    else{$msg_resultado = '<p class="alert alert-danger">Aluno Reprovado!!!!!</p>';}*/

		 	$dados = array(
	            'pagina' => "Nota",
				'dado' => $dados,
				'media_final' => $media_final,
				'msg' => $msg_resultado
			);
			
		$this->loadTemplate('prova/nota', $dados);
	}

	public function imprimirProva($id_prova)
	{

		$p = new Provas();
		$anexo = $p->getProvaPdf($id_prova);

		
			 if (!empty($anexo['prova_anexada'])) 
			 	{
				 	$id = $anexo['prova_id'];
				 	$cpf = $p->getCpf($id);

				 	foreach ($cpf as $key ) 
				 	{
						$cpf = $key['cpf_aluno'];
					 	
						echo '<a href="'.BASE_URL.'assets/img/alunos/'.$this->limpaCPF_CNPJ($cpf).'/'.$anexo['prova_anexada'].'" target="blank">Prova Anexada </a>';
				 	}
			 	}		
	}

		public function getAlunoMatriculado()
	{
		if (isset($_POST['id']) && !empty($_POST['id'])) 
		{
			
			$id = addslashes(trim($_POST['id']));
			$e = new Exercicios();
			$dados = $this->admin() ? $e->getAlunosMat($id) : $e->getAlunosMatPolo($id, $this->getUser()['polo_id']);
			
			echo '<option>' . 'Selecione' ;
			foreach ($dados as $item) {
				echo '<option value="' . $item['aluno_id'] . '">' ;
				echo $item['nome_aluno'];
				echo '</option>';
			}

		}
	}

	public function respostas($id){

		$p = new Provas();
		$r = $p->getResposta($id);
		return $r;
	}

	public function mudarResposta($resposta)
	{

		switch ($resposta) {
			case 'opcao1':
				return 'A';
				break;
			case 'opcao2':
				return 'B';
				break;
			case 'opcao3':
				return 'C';
				break;
			case 'opcao4':
				return 'D';
				break;
			case 'opcao5':
				return 'E';
				break;
			
		}
	}


public function boletim($id, $curso)
	{
		$p = new Provas();

		$dPessoais = $p->getBoletimDados($id, $curso);
		$dados = array(
	            'pagina' => "Boletim",
				'notas' => $p->getBoletim($id, $curso),
				'infor' => $dPessoais
			);
			
		$this->loadTemplate('prova/boletim/boletim', $dados);

	}

	public function ver50dias($aluno, $curso, $data)
	{
			$p = new Provas();

			$d = $p->getDataMatricula($aluno, $curso);
			$total = strtotime($data) - strtotime($d->data_matricula);
			$dias = floor($total / (60 * 60 * 24));

			if($dias < 50) {

					$dados = array(
						'erro' => true,
						'msg' => 'ATENÇÃO: Matricula tem menos de 50 dias. Aluno matriculado a '.$dias.' dias',
					);

					echo json_encode($dados);
					exit();
				}
	}

		public function ver15dias($aluno, $curso, $date)
	{
			$p = new Provas();

		if($d = $p->getDataProva($aluno, $curso)){
			foreach ($d as $dd ) {
			$total = strtotime($date) - strtotime($dd->data_prova);
			$dias = floor($total / (60 * 60 * 24));
			

			if($dias < 15) {

					$dados = array(
						'erro' => true,
						'msg' => 'ATENÇÃO: Aluno só poderá fazer outra prova daqui a '.$dias.' dias',
					);

					echo json_encode($dados);
					exit;
				}
			}
		}
		return true;
	}

	public function notaDez($media)
	{
		if (($media + 2) >= 10) {
			return number_format(10, 0, '.', ',');
		} else{
			return number_format($media + 2, 1, '.', ',');
		}
	}
	

}