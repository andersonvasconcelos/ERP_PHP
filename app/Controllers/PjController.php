<?php 
namespace Controllers;

use Core\Controller;
use Models\Polos;
use Models\Home;

class PjController extends Controller{

	public function __construct(){$this->putLogin();}
		
		public function index(){
		$p = new Polos();
		$e = new Home();
		
		$dados = array(
		'pagina' => 'Gerar Boleto',
		'polos' => $p->getPolosAll(),
		'estados' => $e->getEstadosAll()
		);

		$this->loadView('pagamentos/pj/index', $dados);
		
		}

/*		SELECT matricula.*, financeiro.status 
FROM `matricula`
INNER JOIN financeiro ON matricula_id = id_matricula 
WHERE financeiro.status = 'pago'

SELECT id_unico, parcela, status FROM `financeiro` WHERE parcela = 1 AND status = 'pendente'*/

}