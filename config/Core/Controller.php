<?php 
namespace Core;

use Models\Contas;
use Models\Pagamentos;
use Models\Colaboradores;
use Models\Permissoes;
use Models\Home;
use Models\SubContas;

class Controller{

private $user;

/*public function __construct(){
		if(empty($_SESSION['start'])){
			$_SESSION['start'] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
		}
		$token = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
		
		if ($token != $_SESSION['start']) {
		 exit();	
		 } 
	}*/

	public function loadTemplate($viewName, $viewData = array())
	{
		extract($viewData);
		require 'public/views/template/template.php';
	}

	public function loadView($viewName, $viewData = array())
	{
		extract($viewData);
		require 'public/views/'.$viewName.'.php';
	}
	public function loadRelatorio($viewName, $viewData = array())
	{
		extract($viewData);
		require 'public/views/template/relatorio.php';
	}

	public function loadAlert($tipo)
	{
		if(isset($_SESSION[$tipo]))
			{?>
				<div class="alert alert-<?=$tipo?>" role="alert"><?php echo $_SESSION[$tipo];?></div> 
				<?php unset($_SESSION[$tipo]); 
			}
	}

	public function curlPj($url, $pedido, $header)
	{

	  	  $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL =>$url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $pedido,
		  CURLOPT_HTTPHEADER => $header 
		));

			$response = curl_exec($curl);
			$err = curl_error($curl);

	 		curl_close($curl);

				if ($err) {return $err;} 
				else { return $response;}
	}

		public function getBoletosPj($id_unico)
	{
		$c = new Contas();
		$p = new Pagamentos();

		$credencial = $c->getCredencialMatriz();
		$chave = $c->getChaveMatriz();

		return $p->getBoletosPj($credencial, $chave, $id_unico);
		
	}


	public function putLogin()
	{

		$this->user = new Colaboradores();

			if (!$this->user->isLoged()){
				header("Location:".BASE_URL."login");
				exit;
			}
	}

	public function getUser(){
		return $_SESSION['dados'];
	}

	public function getAplelido($id)
	{
		$c = new Colaboradores();
		
			if ($array = $c->getApelido($id)) 
			{
				foreach ($array as $apelido) {
					
				}
				return $apelido;
			}		
		
	}

	public function hasPermisson($permisson_slug)
	{
		$m = new Permissoes();

		if (in_array($permisson_slug, $m->getPermissions($this->getUser()['permissoes_id']))) 
		{
			return true;
		} 
		else{ return false;}
	}

	public function verificarSituacao($situacao)
	    {
	    	if ($situacao == "Analise") {
	    	echo '<span class="btn btn-sm btn-warning">'.$situacao.'</span>';	
	    	}
	    	elseif ($situacao == "Pendente") {
	    	echo '<span class="btn btn-sm btn-danger">'.$situacao.'</span>';
	    	}
	    	elseif ($situacao == "Matriculado") {
	    	echo '<span class="btn btn-sm btn-success">'.$situacao.'</span>';
	    	}
	    	elseif ($situacao == "Concluido") {
	    	echo '<span class="btn btn-sm btn-concluido">'.$situacao.'</span>';
	    	}
	    }

	public function verificarPago($pago)
		{
			if ($pago == ""){
		    echo '<td><span class="btn btn-sm btn-danger">Não Pago</span></td>';
	        } else { 
	        echo '<td><span class="btn btn-sm btn-success">Pago</span></td>';
	    	} 
	    }

	public function formatData($data)
		{
			if(!empty($data)){
			$data = date('d/m/Y', strtotime($data)); 
			return $data; }
			else{
				return false;
			}
		}

		public function limpaCPF_CNPJ($valor)
		{
		 $valor = trim($valor);
		 $valor = str_replace(".", "", $valor);
		 $valor = str_replace(",", "", $valor);
		 $valor = str_replace("-", "", $valor);
		 $valor = str_replace("/", "", $valor);
		 return $valor;
		}

		public function getAlerts()
		{
			$a = new Home();
			$alerts = $a->getAlert();
			return $alerts;
		}

			public function getFatura($id, $token)
	{ 		

			$s = new SubContas();

			$fatura = $s->buscarFatura($token, $id);
			return $fatura;
	}

	public function getFaturaStatus($value)
	{
		switch ($value) {
			case 'paid':
				echo '<span class="label label-success"> Pago</span>';
				break;
			case 'pending':
				echo '<span class="label label-danger"> Pendente</span>';
				break;
			
			default:
				echo '<span class="label label-default">'.$value.'</span>';
				break;
		}
	}

	public function faturaStatus($value)
	{
		switch ($value) {
			case 'paid':
				return 'Pago';
				break;
			case 'pending':
				return 'Pendente';
			break;
		}
	}
	public function admin()
	{
		if ($this->getUser()['id_colaborador'] == 1 || $this->getUser()['id_colaborador'] == 4 ) {
			return true;
		}
		else{
			return false;
		}
	}
}