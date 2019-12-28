<?php 
namespace Controllers;

use Core\controller;
use Models\Permissoes;
use Models\Home;

class HomeController extends Controller{

	public function __construct(){

		$this->putLogin();

		}

public function index(){
	$c = new Permissoes();
	//$a = new Home();

	$dados = array(
		'pagina' => 'Pagina Inicial'
		//'alerts' => $a->getAlert()
		//'permisson' => $c->getPermissions($this->getUser()['permissoes_id'])
	);

	$this->loadTemplate('home', $dados);
}	

public function getCidadesUf(){
			
		$uf = $_POST['estado'];
		$e = new Home();

		if($dados = $e->getCidadesUf($uf)){

			foreach ($dados as $post) {
		     echo '<option value="'.$post['Nome'].'">';
		     echo $post['Nome']; 	
		     echo '</option>';
			}
		}
	
	}


}