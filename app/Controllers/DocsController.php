<?php 
namespace Controllers;

use Core\Controller;
use Models\Alunos;
use Models\Docs;

class DocsController extends Controller{

	//public function __construct(){$this->putLogin();}
		
	public function index($id)
	{
			$a = new Alunos();

			$dados = array(
			'pagina' => 'Matrícular Aluno',
			'alunos' => $a->getAlunoId($id)
			);

			$this->loadTemplate('docs/adicionar', $dados);
	}

	public function listar($id){
		$d = new Docs();
		$docs = $d->getDocs($id);
		echo json_encode($docs);
		
	}
	public function anexarDocs($id)
	{	
			$dados = array('pagina' => 'Anexar Documentos', 'id' => $id);
			$this->loadTemplate('docs/anexar', $dados);
	}

	public function adicionar()
	{		
		
			
		$a = new Alunos();
		$id = addslashes($_POST['id_aluno']);
	
		// buscar cpf pelo id do aluno //
		$slug = $a->getCpf($id);
		// Tirar pontos e traços do CPF //
		$cpf = $this->limpaCPF_CNPJ($slug['cpf_aluno']);
		//Criar o caminho para salvar o documento
		$diretorio = 'public/assets/img/alunos/' .$cpf;

		//verificar se os docs foram enviados//
		if (isset($_FILES['docs']['tmp_name'])) 
		{		

			$arquivo = $_FILES['docs'];
			$type = $arquivo['type'];
	
				// Faz a verificação do tamanho do arquivo //
			if ($_FILES['docs']['size'] > 15728640) 
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
			$nome = rand(0, 999).time().$cpf.'.pdf';
			// Faz a verificação se a pasta para salvar a imagem existe //
			if (!file_exists($diretorio))
			{
				mkdir($diretorio, 0777, TRUE);
			}

			// ADICIONAR DOCUMENTOS NO BANCO DE DADOS //
			$d = new Docs();

	 			if ($d->addDocs($id, $nome)) 
	 			{
	 				// envia o documento para a pasta no sistema //
					move_uploaded_file($arquivo['tmp_name'], $diretorio.'/'.$nome);

					$r = array(
						'erro' => false,
						'msg' => 'Documentos Anexados com Sucesso'
					);

	 				echo json_encode($r);
	 				exit();
				} 
		}
				
				echo json_encode('Documentos não foram anexados');
				exit();
		
	}
	

	/*public function editar()
	{
		
		if (isset($_FILES['mat']['tmp_name'])) 
		{	
			$a = new Alunos();
			
			$arquivo = $_FILES['mat'];
			$id = addslashes($_POST['id_aluno_docs']);
			$slug = $a->getCpf($id);
			$slug = $this->limpaCPF_CNPJ($slug['cpf_aluno']);
			$diretorio = 'assets/img/alunos/'.$slug;
			$caminho = 'assets/img/alunos/'.$slug;
			$type = $arquivo['type'];
			$tipo = isset( $_POST["tipo_matricula"] ) ? $_POST["tipo_matricula"] : 'matricula';
					
						// Faz a verificação do tamanho do arquivo
			if ($_FILES['mat']['size'] > 15728640) {
				echo "O arquivo enviado é muito grande, envie arquivos de até 15 Mb.";
				exit;} 
			
				if ($type === 'application/pdf') 
				{	
					$nome = rand(0, 999).time().$slug.'matricula.pdf';
			
					if (!file_exists($diretorio)){mkdir($diretorio, 0777, TRUE);}

					move_uploaded_file($arquivo['tmp_name'], $caminho.'/'.$nome);
					echo "Requerimento anexado com sucesso! \n";
				}

				else{echo "Por favor, envie arquivos com as seguintes extensões: pdf \n";} 
		}	

		if (isset($_FILES['outro']['tmp_name'])) 
		{
			$outro = $_FILES['outro'];
			$type = $outro['type'];
				
						// Faz a verificação do tamanho do arquivo
			if ($_FILES['outro']['size'] > 15728640) {
				echo "O arquivo enviado é muito grande, envie arquivos de até 15 Mb.";
				exit;} 
		

			if ($type === 'application/pdf') 
			{
				$nome = base64_encode(rand(0, 999).time()).$slug.'requerimento.pdf';
			
					if (!file_exists($diretorio)){mkdir($diretorio, 0777, TRUE);}

					move_uploaded_file($outro['tmp_name'], $caminho.'/'.$nome);
					echo "Requerimento anexado com sucesso! \n";

			}else{echo "Por favor, envie arquivos com as seguintes extensões: pdf \n";
				 exit;} 
		

		} else {echo 'Requerimento não enviado';}

			

			$d = new Docs();
			 if ($id = $d->upDocs($id, $tipo)) {
			  	echo 'Documentos Anexados';
			  } else{echo 'Não é possível anexar documentos';}
	}


*/
	public function gerarPdf($pagina, $id){

		$dados = array(
			'pagina' => $pagina,
			'id' => $id);
		$this->loadView('docs/gerarPdf', $dados);
	}

	public function matricula_ensino_fundamental($id){
		$a = new Alunos;
		$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/matricula_ensino_fundamental', $dados);
	}

	public function matricula_ensino_medio($id){
			$a = new Alunos;
			$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/matricula_ensino_medio', $dados);
	}

	public function fase1_modulo_inicial($id){
			$a = new Alunos;
			$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/fase1_modulo_inicial', $dados);
	}

		public function fase2_modulo1($id){
			$a = new Alunos;
			$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/fase2_modulo1', $dados);
	}

		public function fase2_modulo2($id){
			$a = new Alunos;
			$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/fase2_modulo2', $dados);
	}



	public function classificacao($id){
		$a = new Alunos;
		$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/classificacao', $dados);
	}

		public function aproveitamento($id)
		{
			$a = new Alunos;
			$dados = array(
				'id' => $id,
				'alunos' => $a->getAlunoId($id));
			$this->loadView('docs/aproveitamento', $dados);
		}

			public function ato($id)
		{
			$a = new Alunos;
			$dados = array(
				'id' => $id,
				'alunos' => $a->getAlunoId($id));
			$this->loadView('docs/ato', $dados);
		}

		public function contrato($id){

		$a = new Alunos;

		$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/contrato', $dados);
	}

	public function transferencia_ensino_fundamental($id){
		$a = new Alunos;
		$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/transferencia_ensino_fundamental', $dados);
	}

		public function transferencia_ensino_medio($id){
			$a = new Alunos;
			$dados = array(
			'id' => $id,
			'alunos' => $a->getAlunoId($id));
		$this->loadView('docs/transferencia_ensino_medio', $dados);
	}
	
	/*public function anexar()
	{
		if (isset($_FILES['contrato']['tmp_name'])) 
		{
			$contrato = $_FILES['contrato'];
			$type = $contrato['type'];
			$cpf = addslashes(trim($_POST['cpf']));
			$caminho = 'assets/img/alunos/'.$cpf;

			// Faz a verificação do tamanho do arquivo
			if ($_FILES['contrato']['size'] > 15728640) 
			{
			echo "O arquivo enviado é muito grande, envie arquivos de até 15 Mb.";
			} 
			
			if ($type === 'application/pdf') 
			{
			move_uploaded_file($contrato['tmp_name'], $caminho.'/'.'contrato_assinado.pdf');
				
				$_SESSION['success'] = "Contrato anexado com sucesso!";
				header('Location:'.BASE_URL.'alunos/matriculas');
				exit;

			}else
			{
				echo "Por favor, envie arquivos com as seguintes extensões: pdf \n";
			} 
		}
	}*/

	public function getIdade($data){

		 // Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('/', $data);
   
    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
   
    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

     return $idade ;
	}

	public function getCombo($combo)
	{
		if ($combo == 1) {

		echo '	
		<td>Valor do Modulo Preparatório no Combo Escolhido:R$ 599,50</td>
				<td>Valor do Modulo Inicial da Fase 1 no Combo Escolhido:R$ 1.200,00</td>
				<td>Valor do Modulo 1 da Fase 2 no Combo Escolhido:R$ 1.200,00</td>
				<td>Valor do Modulo 2 da Fase 2 no Combo Escolhido:R$ 790,00</td>';
		} else if ($combo == 2) {

			echo '	
		<td><center> --------- </center></td>
				<td>Valor do Modulo Inicial da Fase 1 no Combo Escolhido:R$ 1.200,00</td>
				<td>Valor do Modulo 1 da Fase 2 no Combo Escolhido:R$ 1.200,00</td>
				<td>Valor do Modulo 2 da Fase 2 no Combo Escolhido:R$ 790,00</td>';
		}

		else if ($combo == 3) {

			echo '	
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td>Valor do Modulo 1 da Fase 2 no Combo Escolhido:R$ 1.200,00</td>
		<td>Valor do Modulo 2 da Fase 2 no Combo Escolhido:R$ 790,00</td>';
		}

		else if ($combo == 4) {

			echo '	
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td>Valor do Modulo 2 da Fase 2 no Combo Escolhido:R$ 790,00</td>';
		}


		else if ($combo == 5) {

			echo '	
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td>Valor do pacote da área de conhecimento escolhido (LINGUAGENS): R$ 629,00</td>';
		}


		else if ($combo == 6) {

			echo '	
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td>Valor do pacote da área de conhecimento escolhido (MATEMÁTICA): R$ 449,00</td>';
		}


		else if ($combo == 7) {

			echo '	
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td>Valor do pacote da área de conhecimento escolhido (CIÊNCIAS DA NATUREZA): R$ 629,00</td>';
		}


		else if ($combo == 8) {

			echo '	
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td><center> --------- </center></td>
		<td>Valor do pacote da área de conhecimento escolhido (CIÊNCIAS HUMANAS): R$ 629,00</td>';
		}

	}

}