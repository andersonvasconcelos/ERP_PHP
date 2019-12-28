<?php 
namespace Controllers;

use Core\Controller;
use Models\Polos;
use Models\Colaboradores;

class ColaboradoresController extends Controller{

	public function __construct(){
		$this->putLogin();

			if($this->hasPermisson('aba-colaboradores')){
			return true;
		}
		header("Location:".BASE_URL);
		exit;
	}

		
		public function index(){
		$p = new Polos();
		$c = new Colaboradores();

		$dados = array(
		'pagina' => 'Adicionar Colaborador',
		'polos' => $p->getPolosAll(),
		'grupos' => $c->getGrupo()
		);

		$this->loadTemplate('colaboradores/adicionar', $dados);
		
		}

	public function listar()
	{
		$c = new Colaboradores();

		$listas = $this->admin() ? $listas = $c->getColaboradoresAll() : $c->getColaboradoresPolo($this->getUser()['polo_id']);

		$dados = array(
		'pagina' => 'Listar Colaboradores',
		'lista' => $listas,
		);
		
		$this->loadTemplate('colaboradores/listar', $dados);
	}

	public function adicionar(){
	
		$dados = array();
		if (!empty($_POST['nome_colaborador'])) {
			$nome = $_POST['nome_colaborador'];
			$cpf = $_POST['cpf']; 
		    $tel = $_POST['telefone_colaborador'];
		    $email = $_POST['email_colaborador'];
		    $senha = $_POST['senha']; 
		    $polo = $_POST['polo_id'];
		    $permissoes = $_POST['permissoes'];
		    $slug = mb_strtolower(preg_replace('/( )+/' , '-' , $nome)); 

		    if(isset($_FILES['imagem_colaborador'])) {
			$arquivo = $_FILES['imagem_colaborador'];
			$imagem = $arquivo['name'];
			$diretorio = 'assets/img/colaboradores/'.$slug.'/';
			$caminho = 'assets/img/colaboradores/'.$slug.'/'.$imagem;

		if (!file_exists($diretorio)){
			mkdir($diretorio, 0777, TRUE);
			}
			move_uploaded_file($arquivo['tmp_name'],  $caminho);
			}
		

			$c = new Colaboradores();
			if($c->addCol($nome, $cpf, $tel, $email, $senha, $polo, $permissoes, $imagem, $slug))
			{
				echo "Colaborador cadastrado com sucesso!";
			} 
			else 
			{
				echo "Não é possível cadastrar colaborador!";
			}
		} 
		else 
		{ 
			$_SESSION['danger'] = "Não é possível cadastrar colaborador!";
			header('Location:'.BASE_URL.'colaboradores/listar');
			exit; 
		}
}
	public function deletar(){
		if (isset($_POST['id_col'])) {
			$id = $_POST['id_col'];
			$a = new Colaboradores();
			if($a->deletCol($id)){
			echo "Colaborador deletado com sucesso!";
			} else{
				echo "Não é possível deletar colaborador!";
			}
		}
	}

	public function edit($slug){
		$c = new Colaboradores();

		$dados = array(
		'pagina' => 'Editar Colaborador',
		'col' => $c->getColId($slug),
		'grupos' => $c->getGrupo()
		 );
		
		$this->loadTemplate('colaboradores/editar', $dados);
	}

	public function editarCol()
	{
		if (isset($_POST['id_col'])) 
		{
			$c = new Colaboradores();

			$id_col = addslashes(trim($_POST['id_col']));
			$nome = addslashes(trim($_POST['nome_colaborador']));
			$cpf = addslashes(trim($_POST['cpf_colaborador'])); 
	    	$tel = addslashes(trim($_POST['telefone_colaborador']));
	    	$email = addslashes(trim($_POST['email_colaborador']));
	    	$ativo = addslashes(trim($_POST['ativo']));
	    	$permissoes = addslashes(trim($_POST['permissoes']));

	    	if (isset($_POST['senha']) && empty($_POST['senha']) == false) {
	    		$senha = addslashes(trim($_POST['senha']));
	    		$senha = md5($senha);
	    	} else{
	    		$senha = $c->getSenha($id_col);
	    	}

				
				if($c->editarCol($nome, $cpf, $tel, $email, $ativo, $senha, $id_col, $permissoes)){
					$_SESSION['success'] = "Colaborador editado com sucesso!";
					header("Location:".BASE_URL."colaboradores/listar");
					exit;
				} else {
					$_SESSION['danger'] = "Não foi possível editar 
					aula!";
					header("Location:".BASE_URL."colaboradores/listar");
					exit;
				}
		}	
	}

// Funções para gerenciar grupo e itens de permissoes//
	public function grupos(){
		$c = new Colaboradores();
		$dados = array(
			'pagina' => 'Listar grupos',
			'lista' => $c->getGrupo() );

		$this->loadTemplate('colaboradores/grupos', $dados);
	}

	public function addGrupo(){
		$nome = addslashes(trim($_POST['nome_grupo']));
		$c = new Colaboradores();

		if ($c->addGrupo($nome)){
			header("Location:".BASE_URL.'colaboradores/grupos');
			exit;
		}
	}

		public function itens(){
		$c = new Colaboradores();
		$dados = array(
			'pagina' => 'Listar Itens',
			'lista' => $c->getItens() 
		);

		$this->loadTemplate('colaboradores/itens', $dados);
	}

		public function addItem(){
		$nome = addslashes(trim($_POST['nome_item']));
		$slug = mb_strtolower(preg_replace('/( )+/' , '-' , $nome));

		$c = new Colaboradores();

		if ($c->addItem($nome, $slug)){
			header("Location:".BASE_URL.'colaboradores/itens');
			exit;
		}
	}

			public function vincular($id){
		
			$c = new Colaboradores();

			$dados = array(
			'pagina' => 'Vincular Permissões',
			'id_grupo' => $id,
			'lista' => $c->getItens(),
			'item_p' => $c->getItemId($id)  
			);

		$this->loadTemplate('colaboradores/vincular', $dados);
	}

	public function addPermissao(){

		if( isset( $_GET['status'] ) )
	{
		$id = (int)$this->getGet('id');
		$c = new Colaboradores();
		$grupo_id = $_GET['grupo_id'];

		if($c->insertPermission($id, $grupo_id)){
				echo "Permissão Inserida";
			}
	} elseif ($_GET['status'] == 0) {
		echo 'não ';
	} 
}
	public function getGet( $key ){
		return isset( $_GET[ $key ] ) ? $this->filter( $_GET[ $key ] ) : null;
}
	public function filter( $str ){
		return $str;//deixo a implementação desta por conta de vcs.
	}

	public function delPermissao(){

		if( isset( $_GET['status'] ) )
	{
		$id = (int)$this->getGet('id');
		$c = new Colaboradores();
		$grupo_id = $_GET['grupo_id'];

		if($c->deletePermission($id, $grupo_id)){
				echo "Permissão Deletada";
			}
	} elseif ($_GET['status'] == 0) {
		echo 'não ';
	} 
}

	
	public function getItens(){
		$c = new Colaboradores();
		$grupo_id = addslashes($_POST['grupo_id']);

		if ($resp = $c->getItemId($grupo_id)) {
			foreach ($resp as $key) {
				echo $key['permissoes_item_id'];
			}
		}else {
			echo 'erro';
		}
	}



}