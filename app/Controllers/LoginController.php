<?php 
namespace Controllers;

use Core\Controller;
use Models\Colaboradores;

class LoginController extends Controller{

	public function index(){
		
		$dados = array();
		$this->loadView('login/index', $dados);
	}

	public function logar(){

		$con = new Colaboradores();

		if(!empty($_POST["login"]) && !empty($_POST["senha"])){
			$login = addslashes(trim($_POST["login"]));
			$senha = addslashes(trim($_POST["senha"]));

			if (isset($_SESSION['login']) && $_SESSION['login'] >= 5) 
			{	
				$con->blockUser($login);
				echo $_SESSION['login'];//O '.$login.' foi bloqueado procure o diretor do seu polo!';
				exit;
			} 
			else
			{
				if($_SESSION['dados'] = $con->fazerLogin($login, $senha))
				{
					echo $_SESSION['login'] = 0;
					exit;
				}
				else
				{
					if (!isset($_SESSION['login'])) {$_SESSION['login'] = 1;}
					echo $_SESSION['login']++;

				}

			}

		}
			
			//header("Location:".BASE_URL."login");
			//exit;
	}


	public function logout(){
		session_destroy();
   		header("location:".BASE_URL."login");
   		exit();
	}

}