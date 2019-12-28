<?php 
namespace Controllers;

use Core\Controller;
use Models\Relatorios;

class RelatoriosController extends Controller{

	public function __construct()
	{
		$this->putLogin();

		if($this->hasPermisson('aba-aluno')){
			return true;
		}
		header("Location:".BASE_URL);
		exit;
	}
		
	public function index()	{}

	public function listar()
	{
		$r = new Relatorios();
		$id = $this->getUser()['polo_id'];

		$ano = date('Y');
		$start = $ano.'0101';
		$end = $ano.'1231';
		
		if ($id == 1) {$listas = $r->getRelatorio($start, $end);} 
		else{$listas = $r->getRelatorioPolo($id, $start, $end);}

		$dados = array(
		'pagina' => 'Relatório Geral',
		'lista' => $listas
		);
		
		$this->loadRelatorio('relatorios/listar', $dados);
	}

	public function getRelatorioPolo($start, $end)
	{
		$r = new Relatorios();

		$id = $this->getUser()['polo_id'];

		if ($id == 1) {$listas = $r->getRelatorio($start, $end);} 
		else{$listas = $r->getRelatorioPolo($id, $start, $end);}

		return $listas;
	}

	public function exportar($start)
	{
			$r = new Relatorios();
			$id = $this->getUser()['polo_id'];
			$data = explode(',', $start);

			if (empty($data[0])) {
				$ano = date('Y');
				$start = $ano.'0101';
				$end = $ano.'1231';
			} else{	
				$start = $data[0];
				$end = $data[1];
			}
			
			if ($id == 1) {$listas = $r->getRelatorio($start, $end);} 
			else{$listas = $r->getRelatorioPolo($id, $start, $end);}
			
			$dados = array('lista' => $listas);

			$this->loadView('/relatorios/excel/financeiro', $dados);
	}

	public function academico()
	{
		$r = new Relatorios();
		$id = $this->getUser()['polo_id'];

		$listas = $this->admin() ? $r->relatorioAcademico() : $r->relatorioAcademicoPolo($id); 

		$dados = array(
		'pagina' => 'Relatório Acadêmico',
		'lista' => $listas
		);
		
		$this->loadRelatorio('relatorios/academico', $dados);
	}

	public function exportarAcademico()
	{
			$r = new Relatorios();
			$id = $this->getUser()['polo_id'];

			$listas = $this->admin() ? $r->relatorioAcademico() : $r->relatorioAcademicoPolo($id);
			$dados = array('lista' => $listas);

			$this->loadView('/relatorios/excel/academico', $dados);
	}

			public function pagamentos()
		{
			
			$dados = array(
				'pagina' => 'Selecione o período');
			
			$this->loadTemplate('relatorios/pj', $dados);
		}

		public function completo()
	{
			$r = new Relatorios();
			$listas = $r->relatorioCompleto();

			$dados = array('lista' => $listas);

			$this->loadView('/relatorios/excel/completo', $dados);
	}


		
}