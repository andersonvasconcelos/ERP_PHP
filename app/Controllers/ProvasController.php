<?php 
namespace Controllers;

use Core\Controller;
use Models\Pantigas;
use Models\Alunos;
use Models\Exercicios;

class ProvasController extends Controller{

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

		$p = new Pantigas();

		if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) {
			$listas = $p->getProvas();
		} 
		else{$listas = $p->getProvasPoloId($this->getUser()['polo_id']);}

		$dados = array(
			'pagina' => 'Listar Provas',
			'lista' => $listas
			);
		
		$this->loadTemplate('provas/listar', $dados);
	}

	public function editar($id){
		
		$p = new Pantigas();

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
			$id = addslashes(trim($_POST['id_prova']));
			
			$p = new Pantigas();

			if ($p->editarProva($data, $hora, $id)) {
				
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

		$p = new Pantigas();

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
				
				$p = new Pantigas();
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

			$p = new Pantigas();

			if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) {
				$listas = $p->getProvas();
			} 
			else{$listas = $p->getProvasPoloId($this->getUser()['polo_id']);}


			$dados = array(
				'pagina' => 'Listar Provas',
				'lista' => $listas
				);
			
			$this->loadTemplate('prova/avaliacao', $dados);
		}

	public function getAlunoMatriculado(){

		if (isset($_POST['id']) && !empty($_POST['id'])) {
			
			$id = addslashes(trim($_POST['id']));
			
			$e = new Exercicios();

			if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) 
			{
				$dados = $e->getAlunosMat($id);
			} 
			else{$dados = $e->getAlunosMatPolo($id, $this->getUser()['polo_id']);}

					echo '<option>'.'Selecione';
					foreach ($dados as $item) {
						echo '<option value="'.$item['aluno_id'].'">';
						echo $item['nome_aluno'];
						echo '</option>';
					}

		}
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

			$p = new Pantigas();

				if ($id_prova = $p->gerarProva($aluno, $curso, $data, $hora, $area))
			{
				$modulos = $p->getModuloArea($curso, $area);
			
				foreach ($modulos as $id) {
		
					$dados = $p->montarAvaliacaoArea($id['id_modulo']);

					foreach ($dados as $key) {

						$exer[] = $key['id_exercicio'];
					}
				}

				/*$dados = $p->montarEdf();
					foreach ($dados as $key) 
					{
						$exer[] = $key['id_exercicio'];
					}*/

				$json = json_encode($exer);
				if($p->salvarProvaGerada($json, $id_prova))
				{
					$_SESSION['success'] = "Prova cadastrada com sucesso";
					header('Location:'.BASE_URL.'prova/listar');
					exit;
				}
			}

			exit();

		}
		elseif (!isset($_POST['area']) && !empty($_POST['id_aluno'])) 
		{
			$aluno = addslashes(trim($_POST['id_aluno']));
			$curso = addslashes(trim($_POST['curso']));
			$data = addslashes(trim($_POST['data']));
			$hora = addslashes(trim($_POST['hora']));

			$p = new Pantigas();


			if ($id_prova = $p->gerarProva($aluno, $curso, $data, $hora, $area = 5))
			{
				$modulos = $p->getModulo($curso); //array(188,189,191,192,193,194,195);
				
				foreach ($modulos as $id) {
		
					$dados = $p->montarAvaliacao($id['id_modulo']);

					foreach ($dados as $key) {

						$exer[] = $key['id_exercicio'];
					}
				}

				$dados = $p->montarEdf();
					foreach ($dados as $key) 
					{
						$exer[] = $key['id_exercicio'];
					}

				$json = json_encode($exer);
				if($p->salvarProvaGerada($json, $id_prova))
				{
					$_SESSION['success'] = "Prova cadastrada com sucesso";
					header('Location:'.BASE_URL.'prova/listar');
					exit;
				}
			}
		}
		$_SESSION['danger'] = "Prova não foi cadastrada";
		header('Location:'.BASE_URL.'prova');
		exit;
	}

		public function provaPdf($id)
		{

			$a = new Pantigas;

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

	public function pPdf($id){
		$dados = array(
			'id' => $id,
			'pagina' => 'pdf'
			);
		$this->loadView('prova/gerarProvaPdf', $dados);
	}

	public function gabarito($id){
		if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) 
		{
			
			$a = new Pantigas;

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
			
			$a = new Pantigas;

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
	      
	        $p = new Pantigas();

	            if ($p->salvarRespostas($prova_id, $respostas_aluno)) 
	            {   
	             for ($i=1; $i <= $total_resp; $i++) 
	    	    {
	    	    	$acertos = ($certo[$i] == $resp[$i]) ? $acertos+1 : $acertos;
				} 	

				  $nota = $acertos * (10/$total_resp);
				  $nota = round($nota, 1);	

				  $tentativa = $p->getTentativa($prova_id) + 1;
				
				  $p->upTentativa($prova_id, $tentativa);	
				  $p->salvarNota($nota, $prova_id, $acertos);
	            	           

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

		$p = new Pantigas();

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
            	elseif ($dados['area_id'] != '5' && $dados['nota'] >= 5) 
            	{
            		$media_final = $dados['nota'] + 2;
            		$media_final = ($media_final <= 10) ? $media_final : 10; 
            		$msg_resultado = '<p class="alert alert-success">'.'Aluno Aprovado!!!!!'.'</p>';
            	}
            	else{
            		$media_final = $dados['nota'] + 2;
            		$msg_resultado = '<p class="alert alert-danger">Aluno Reprovado!!!!!</p>';
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

		$p = new Pantigas();
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

	public function boletim($id)
	{
		$p = new Pantigas();

		$dados = array(
	            'pagina' => "Boletim",
				'notas' => $p->getBoletim($id)
			);
			
		$this->loadView('prova/boletim', $dados);

	}
	public function respostas($id){

		$p = new Pantigas();
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


}