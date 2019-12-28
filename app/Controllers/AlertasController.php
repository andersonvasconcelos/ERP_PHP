<?php 
namespace Controllers;

use Core\Controller;
use Models\Home;

class AlertasController extends Controller{
		
		public function index()
		{
			$dados = array();
			$this->loadTemplate('notification/index', $dados);
		}

		public function qtAlertas()
		{
			$a = new Home();
			$alertas = $a->getAlerts();
			$dados = json_encode($alertas);
			echo $dados;
		}

		public function lidoAlert()
		{	
			$id = $_POST['id'];
			$a = new Home();
			if ($uid = $a->upLido($id)) {echo $uid;} 
			else{return false;}
		}

}