<?php 
namespace Controllers;
use Core\Controller;

class NotfoundController extends Controller{


	public function index()
	{
		$dados = array(
			'pagina' => 'Pagina 404'
			//'alerts' => $a->getAlert()
			//'permisson' => $c->getPermissions($this->getUser()['permissoes_id'])
		);

		$this->loadView('404', $dados);
	}	
}