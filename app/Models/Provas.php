<?php 
namespace Models;
use Core\Model;
use PDO;

class Provas extends Model{
	
	public function gerarProva($aluno, $curso, $data, $hora, $area, $mod)
	{
	 	$sql = "INSERT INTO provas SET aluno_id = :aluno, curso_id = :curso, data_prova = :data, hora_prova = :hora, area_id = :idarea, modulo_id = :mod";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':aluno', $aluno);
			$sql->bindValue(':curso', $curso);
			$sql->bindValue(':data', $data);
			$sql->bindValue(':hora', $hora);
			$sql->bindValue(':idarea', $area);
			$sql->bindValue(':mod', $mod);
		 	$sql->execute();
		
		 	if($sql->rowCount() >0){return $this->db->lastInsertId();}
		 	else{return false;}
	}

	public function editarProva($data, $hora, $aluno, $curso, $area)
	{
		$sql = "UPDATE provas SET data_prova = :dtt, hora_prova = :hhr 
		WHERE curso_id = :id 
		AND area_id = :area 
		AND aluno_id = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':dtt', $data);
		$sql->bindValue(':hhr', $hora);
		$sql->bindValue(':idd', $aluno);
		$sql->bindValue(':id', $curso);
		$sql->bindValue(':area', $area);
		$sql->execute(); 

			if ($sql->rowCount() > 0) {return true;exit;}
			return false;
	}

	public function upNomeProva($nome, $id)
	{

			$sql = "UPDATE provas_geradas SET prova_anexada = :prova WHERE prova_id = :idd";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':prova', $nome);
			$sql->bindValue(':idd', $id);
			$sql->execute(); 

			if ($sql->rowCount() > 0) {return true;exit;}
			return false;
	}


	public function getAlunosMat($id)
	{
			$sql = "SELECT matricula.aluno_id, 
			alunos.nome_aluno 
			FROM matricula 
			INNER JOIN alunos ON id_aluno = matricula.aluno_id
			WHERE curso_id = :idd AND situacao = :sit";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':idd', $id);
			$sql->bindValue(':sit', 'Matriculado');
			$sql->execute();

			if ($sql->rowCount() > 0) {$sql = $sql->fetchAll();}
			return $sql;
	}

	public function montarAvaliacao($id)
	{
		$sql = "SELECT * FROM exercicios WHERE modulo_id = :id ORDER BY rand() LIMIT 4";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) {$sql = $sql->fetchAll();}
			return $sql;
	}

		public function montarAvaliacaoArea($id)
	{
		$sql = "SELECT id_exercicio FROM exercicios WHERE modulo_id = :id ORDER BY rand() LIMIT 6";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) {$sql = $sql->fetchAll(PDO::FETCH_ASSOC);}
			return $sql;
	}

	public function montarEdf()
	{
		$sql = "SELECT * FROM exercicios WHERE modulo_id = :id ORDER BY rand() LIMIT 2";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', 190);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}



	public function salvarProvaGerada($json, $id_prova){
	
 $sql = "INSERT INTO provas_geradas SET exercicios_id = :idd, prova_id = :provaidd";

	$sql = $this->db->prepare($sql);
	$sql->bindValue(':idd', $json);
	$sql->bindValue(':provaidd', $id_prova);
 	$sql->execute();
 	if($sql->rowCount() >0){
 		return true;
 	}else{
 		return false;
 	}
}


public function getProvasPoloId($curso, $id){
	$sql = "SELECT 
	alunos.nome_aluno,
	alunos.polo_id,
	polos.apelido,
	matricula.numero_matricula,
	matricula.situacao,
	matricula.curso_id,
	provas.data_prova,
	provas.hora_prova,
	provas.curso_id,
	provas.aluno_id,
	provas.tentativa,
	provas.id_prova,
	provas.nota,
	cursos.nome_curso,
	area_conhecimento.nome_area,
	modulos.nome_modulo
	FROM provas
	INNER JOIN alunos on id_aluno = provas.aluno_id
	INNER JOIN polos on id_polo = alunos.polo_id
	INNER JOIN matricula on matricula.aluno_id = provas.aluno_id
	INNER JOIN cursos on cursos.id_curso = provas.curso_id
	INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id
	INNER JOIN modulos on modulos.id_modulo = provas.modulo_id
	WHERE polo_id = :idd
	AND tentativa <= :nt
	AND provas.curso_id = :ccur
	GROUP BY provas.aluno_id
	ORDER BY data_prova
	";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->bindValue(':ccur', $curso);
		$sql->bindValue(':nt', 3);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}

	public function getProvas($curso)
	{
		$sql = "SELECT 
		alunos.nome_aluno,
		polos.apelido,
		matricula.numero_matricula,
		provas.data_prova,
		provas.hora_prova,
		provas.curso_id,
		provas.aluno_id,
		provas.id_prova,
		provas.tentativa,
		cursos.nome_curso,
		area_conhecimento.nome_area,
		modulos.nome_modulo
		FROM provas
		INNER JOIN alunos on id_aluno = provas.aluno_id
		INNER JOIN polos on id_polo = alunos.polo_id
		INNER JOIN matricula on matricula.aluno_id = provas.aluno_id
		INNER JOIN cursos on cursos.id_curso = provas.curso_id
		INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id
		INNER JOIN provas_geradas on provas_geradas.prova_id = provas.id_prova
		INNER JOIN modulos on modulos.id_modulo = provas.modulo_id
		WHERE tentativa <= 3
		AND provas.curso_id = :ccur
		GROUP BY provas.aluno_id
		ORDER BY data_prova";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':ccur', $curso);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
			}
			return $sql;
	}

	public function getProvasAluno($aluno, $curso, $area, $data){
	$sql = "SELECT 
	alunos.nome_aluno,
	alunos.polo_id,
	alunos.cpf_aluno,
	polos.apelido,
	matricula.numero_matricula,
	matricula.situacao,
	provas.data_prova,
	provas.hora_prova,
	provas.curso_id,
	provas.aluno_id,
	provas.id_prova,
	provas.tentativa,
	provas.nota,
	provas_geradas.prova_anexada,
	cursos.nome_curso,
	area_conhecimento.nome_area,
	modulos.nome_modulo
	FROM provas
	INNER JOIN alunos on id_aluno = provas.aluno_id
	INNER JOIN polos on id_polo = alunos.polo_id
	INNER JOIN matricula on matricula.aluno_id = provas.aluno_id
	INNER JOIN cursos on cursos.id_curso = provas.curso_id
	INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id
	INNER JOIN provas_geradas on provas_geradas.prova_id = provas.id_prova
	INNER JOIN modulos on modulos.id_modulo = provas.modulo_id
	WHERE tentativa <= 3
	AND provas.aluno_id = :aluno
	AND provas.curso_id = :ccur
	AND provas.area_id = :area
	AND provas.data_prova = :dt
	GROUP BY provas.id_prova
	ORDER BY data_prova DESC, nome_area ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':aluno', $aluno);
		$sql->bindValue(':ccur', $curso);
		$sql->bindValue(':area', $area);
		$sql->bindValue(':dt', $data);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $sql;

	}

		public function getProvasAlunosPoloId($aluno, $curso, $id, $area){
	$sql = "SELECT 
	alunos.nome_aluno,
	alunos.polo_id,
	alunos.cpf_aluno,
	polos.apelido,
	matricula.numero_matricula,
	matricula.situacao,
	provas.data_prova,
	provas.hora_prova,
	provas.curso_id,
	provas.aluno_id,
	provas.id_prova,
	provas.tentativa,
	provas.nota,
	provas_geradas.prova_anexada,
	cursos.nome_curso,
	area_conhecimento.nome_area,
	modulos.nome_modulo
	FROM provas
	INNER JOIN alunos on id_aluno = provas.aluno_id
	INNER JOIN polos on id_polo = alunos.polo_id
	INNER JOIN matricula on matricula.aluno_id = provas.aluno_id
	INNER JOIN cursos on cursos.id_curso = provas.curso_id
	INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id
	INNER JOIN provas_geradas on provas_geradas.prova_id = provas.id_prova
	INNER JOIN modulos on modulos.id_modulo = provas.modulo_id
	WHERE tentativa <= 3
	AND provas.aluno_id = :aluno
	AND provas.curso_id = :ccur
	AND area_id = :area
	AND polo_id = :idd
	GROUP BY provas.id_prova
	ORDER BY data_prova DESC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':aluno', $aluno);
		$sql->bindValue(':ccur', $curso);
		$sql->bindValue(':area', $area);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $sql;

	}

		public function getArea($aluno, $curso){
	$sql = "SELECT alunos.polo_id, provas.aluno_id, provas.curso_id, provas.area_id, area_conhecimento.nome_area FROM provas 
INNER JOIN alunos on id_aluno = provas.aluno_id 
INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id 
WHERE tentativa <= 3 
AND provas.aluno_id = :aluno
AND provas.curso_id = :ccur 
GROUP BY provas.area_id 
ORDER BY area_id ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':aluno', $aluno);
		$sql->bindValue(':ccur', $curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $sql;

	}

		public function getPrintAlunosPoloId($aluno, $curso, $id){
	$sql = "SELECT 
	alunos.nome_aluno,
	alunos.polo_id,
	alunos.cpf_aluno,
	polos.apelido,
	matricula.numero_matricula,
	matricula.situacao,
	provas.data_prova,
	provas.hora_prova,
	provas.curso_id,
	provas.aluno_id,
	provas.id_prova,
	provas.tentativa,
	provas.nota,
	provas_geradas.prova_anexada,
	cursos.nome_curso,
	area_conhecimento.nome_area,
	modulos.nome_modulo
	FROM provas
	INNER JOIN alunos on id_aluno = provas.aluno_id
	INNER JOIN polos on id_polo = alunos.polo_id
	INNER JOIN matricula on matricula.aluno_id = provas.aluno_id
	INNER JOIN cursos on cursos.id_curso = provas.curso_id
	INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id
	INNER JOIN provas_geradas on provas_geradas.prova_id = provas.id_prova
	INNER JOIN modulos on modulos.id_modulo = provas.modulo_id
	WHERE tentativa <= 3
	AND provas.aluno_id = :aluno
	AND provas.curso_id = :ccur
	AND polo_id = :idd
	GROUP BY provas.id_prova
	ORDER BY data_prova DESC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':aluno', $aluno);
		$sql->bindValue(':ccur', $curso);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $sql;

	}

	public function getPrintAlunos($aluno, $curso){
	$sql = "SELECT 
	alunos.nome_aluno,
	alunos.polo_id,
	alunos.cpf_aluno,
	polos.apelido,
	matricula.numero_matricula,
	matricula.situacao,
	provas.data_prova,
	provas.hora_prova,
	provas.curso_id,
	provas.aluno_id,
	provas.id_prova,
	provas.tentativa,
	provas.nota,
	provas_geradas.prova_anexada,
	cursos.nome_curso,
	area_conhecimento.nome_area,
	modulos.nome_modulo
	FROM provas
	INNER JOIN alunos on id_aluno = provas.aluno_id
	INNER JOIN polos on id_polo = alunos.polo_id
	INNER JOIN matricula on matricula.aluno_id = provas.aluno_id
	INNER JOIN cursos on cursos.id_curso = provas.curso_id
	INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id
	INNER JOIN provas_geradas on provas_geradas.prova_id = provas.id_prova
	INNER JOIN modulos on modulos.id_modulo = provas.modulo_id
	WHERE tentativa <= 3
	AND provas.aluno_id = :aluno
	AND provas.curso_id = :ccur
	GROUP BY provas.id_prova
	ORDER BY data_prova DESC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':aluno', $aluno);
		$sql->bindValue(':ccur', $curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $sql;

	}



	public function getData($aluno, $curso, $area){
	$sql = "SELECT alunos.polo_id, provas.aluno_id, provas.curso_id, provas.area_id, 
	provas.data_prova, area_conhecimento.nome_area FROM provas 
INNER JOIN alunos on id_aluno = provas.aluno_id 
INNER JOIN area_conhecimento on area_conhecimento.id_area = provas.area_id 
WHERE tentativa <= 3 
AND provas.aluno_id = :aluno
AND provas.curso_id = :ccur
AND provas.area_id = :area 
GROUP BY provas.data_prova 
ORDER BY area_id ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':aluno', $aluno);
		$sql->bindValue(':ccur', $curso);
		$sql->bindValue(':area', $area);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $sql;

	}

	public function getCpf($id_prova){
		$sql = "SELECT alunos.cpf_aluno, provas.id_prova FROM provas
				INNER JOIN alunos on id_aluno = provas.aluno_id
				WHERE provas.id_prova = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_prova);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		return $sql;

	}
	

	public function getexerciciosProva($id)
	{
		$sql = "SELECT 
	alunos.nome_aluno,
	alunos.cpf_aluno,
	alunos.id_aluno,
	cursos.nome_curso,
	matricula.curso_id,
	matricula.situacao,
	provas_geradas.exercicios_id,
	provas.data_prova,
	provas.id_prova,
	provas.area_id,
	area_conhecimento.nome_area,
	modulos.nome_modulo
	FROM provas 
	INNER JOIN alunos on id_aluno = provas.aluno_id
	INNER JOIN cursos on cursos.id_curso = provas.curso_id
	INNER JOIN matricula on matricula.aluno_id = alunos.id_aluno
	INNER JOIN provas_geradas ON provas_geradas.prova_id = provas.id_prova
	INNER JOIN area_conhecimento ON area_conhecimento.id_area = provas.area_id
	INNER JOIN modulos ON modulos.id_modulo = provas.modulo_id
	WHERE provas_geradas.prova_id = :idd
	GROUP BY provas.area_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch(PDO::FETCH_ASSOC);
		}
		return $sql;

	}

	public function getPerguta($id)
	{
		$sql = "SELECT exercicios.pergunta FROM exercicios WHERE id_exercicio = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}

	public function getResposta($id)
	{
		$sql = "SELECT * FROM exercicios WHERE id_exercicio = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}

	public function getDados($id)
	{
		$sql = "SELECT provas.aluno_id,
					   provas.curso_id,
					   provas.data_prova,
					   provas.hora_prova,
					   provas.qtd_acertos,
					   provas.nota,
					   provas.area_id,
					   provas.id_prova,
					   provas.tentativa,
					   cursos.nome_curso,
					   alunos.nome_aluno,
					   matricula.numero_matricula,
					   area_conhecimento.nome_area,
					   modulos.nome_modulo
					   FROM provas_geradas 
					   INNER JOIN provas ON id_prova = prova_id
					   INNER JOIN alunos ON alunos.id_aluno = provas.aluno_id
					   INNER JOIN matricula ON matricula.aluno_id = alunos.id_aluno
					   INNER JOIN cursos ON cursos.id_curso = provas.curso_id
					   INNER JOIN area_conhecimento ON id_area = provas.area_id
					   INNER JOIN modulos ON modulos.id_modulo = provas.modulo_id
					   WHERE provas_geradas.prova_id = :idd
					   GROUP BY provas.aluno_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch(PDO::FETCH_ASSOC);
			return $sql;
		}
	}

	public function salvarRespostas($prova_id, $respostas)
	{
		$sql = "UPDATE provas_geradas SET respostas_provas = :rrp WHERE prova_id = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':rrp', $respostas);
		$sql->bindValue(':idd', $prova_id);
		$sql->execute();

			if ($sql->rowCount() > 0) {return true; exit();} 
				
		return false;
	}
	public function salvarNota($nota, $prova, $acerto)
	{
			$sql = "UPDATE provas SET nota = :nt, qtd_acertos = :qtd WHERE id_prova = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nt', $nota);
		$sql->bindValue(':qtd', $acerto);
		$sql->bindValue(':idd', $prova);
		$sql->execute();

			if ($sql->rowCount() > 0) 
			{
				return true;
				exit;
			} 
				
		return false;
	}
	public function getTentativa($id){
		$sql = "SELECT provas.tentativa FROM provas WHERE id_prova = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) 
		{
			$dados = $sql->fetch(PDO::FETCH_OBJ);
			return $dados;

			/*$sql = "SELECT sum(tentativa) as t FROM provas WHERE aluno_id = :id AND curso_id = :cid AND area_id = :aid";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $dados['aluno_id']);
			$sql->bindValue(':cid', $dados['curso_id']);
			$sql->bindValue(':aid', $dados['area_id']);
			$sql->execute();

			$teste = $sql->fetch(PDO::FETCH_ASSOC);
			return $teste['t'];*/
			exit();

		}

		return false;
	}

	public function upTentativa($id, $tentativa)
	{
		/*$sql = "SELECT provas.aluno_id, provas.curso_id, provas.area_id FROM provas WHERE id_prova = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetch(PDO::FETCH_ASSOC);
			*/

			$sql = "UPDATE provas SET tentativa = :tenta WHERE id_prova = :aid";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':tenta', $tentativa);
			$sql->bindValue(':aid', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) 
			{
			return true;
			exit(); 
			}
			

		return false;
	}

	public function getModulo($curso){
		$sql = "SELECT modulos.id_modulo FROM modulos WHERE curso_id = :iddc AND id_modulo != 190";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddc', $curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	public function getModuloArea($curso, $area){
		$sql = "SELECT modulos.id_modulo FROM modulos WHERE curso_id = :curso AND area = :area";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':curso', $curso);
		$sql->bindValue(':area', $area);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

	public function getProvaPdf($id)
	{
		$sql = "SELECT provas_geradas.prova_anexada, provas_geradas.prova_id FROM provas_geradas WHERE prova_id = :iddc ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddc', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_ASSOC);
		}
	}

	public function getBoletim($id, $curso)
	{
		$sql = "SELECT alunos.nome_aluno, alunos.cpf_aluno, matricula.numero_matricula, provas.nota, provas.area_id, cursos.nome_curso, area_conhecimento.nome_area, modulos.nome_modulo, provas.data_prova FROM provas 
		INNER JOIN alunos ON alunos.id_aluno = provas.aluno_id 
		INNER JOIN matricula ON matricula.aluno_id = provas.aluno_id 
		INNER JOIN cursos ON cursos.id_curso = provas.curso_id 
		INNER JOIN area_conhecimento ON area_conhecimento.id_area = provas.area_id 
		INNER JOIN modulos ON modulos.id_modulo = provas.modulo_id 
		WHERE provas.nota >= 3 AND provas.aluno_id = :idd AND cursos.id_curso = :id
		GROUP BY provas.id_prova
		ORDER BY provas.area_id ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->bindValue(':id', $curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_OBJ);
			return $sql;
		}
	}

		public function getBoletimDados($id, $curso)
	{
		$sql = "SELECT alunos.nome_aluno, alunos.cpf_aluno, matricula.numero_matricula, provas.area_id, cursos.nome_curso, area_conhecimento.nome_area, modulos.nome_modulo, provas.nota FROM provas 
		INNER JOIN alunos ON alunos.id_aluno = provas.aluno_id 
		INNER JOIN matricula ON matricula.aluno_id = provas.aluno_id 
		INNER JOIN cursos ON cursos.id_curso = provas.curso_id 
		INNER JOIN area_conhecimento ON area_conhecimento.id_area = provas.area_id 
		INNER JOIN modulos ON modulos.id_modulo = provas.modulo_id 
		WHERE provas.aluno_id = :idd AND cursos.id_curso = :id
		GROUP BY provas.id_prova LIMIT 1";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->bindValue(':id', $curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch(PDO::FETCH_OBJ);
			return $sql;
		}
	}
		public function getDataMatricula($aluno, $curso)
	{
		$sql = "SELECT matricula.data_matricula 
		FROM matricula 
		WHERE matricula.aluno_id = :idd 
		AND matricula.curso_id = :curso";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $aluno);
		$sql->bindValue(':curso', $curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch(PDO::FETCH_OBJ);
			return $sql;
		}
	}

		public function getDataProva($aluno, $curso)
	{
		$sql = "SELECT provas.data_prova 
		FROM provas 
		WHERE provas.aluno_id = :idd 
		AND provas.curso_id = :curso";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $aluno);
		$sql->bindValue(':curso', $curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll(PDO::FETCH_OBJ);
			return $sql;
		}
	}


}