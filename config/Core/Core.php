<?php 
namespace Core;

class Core{
	public function run(){
		$url = '/';
		if (isset($_GET['url'])) {
			$url .= $_GET['url'];
		}

		$params = arraY();

		if (!empty($url) && $url != '/') 
		{
			$url = explode('/', $url);
			array_shift($url);
			$currentController = $url[0].'Controller';
			array_shift($url);

			if (!empty($url[0]) && $url[0] != '/') 
			{
				$currentAction = $url[0];
				array_shift($url);
			} else{ $currentAction = 'index'; }

			if (count($url) > 0){ $params = $url; }
		} else{
			$currentController = 'HomeController';
			$currentAction = 'index';
		}
			$currentController = ucfirst($currentController);
			$prefix = 'Controllers\\';

			if (!file_exists('app/Controllers/'.$currentController.'.php') || 
			!method_exists($prefix.$currentController, $currentAction)) 
			{
				$currentController = 'NotfoundController';
				$currentAction = 'index';
			}
		
		$control = $prefix.$currentController;
		$cc = new $control();

		call_user_func_array(array($cc, $currentAction), $params);

	}
}