<?php 
namespace Models;
use Core\Model;
use PDO;

class Matriculas extends Model{

	public function addMat($id, $id_curso, $pacote_id, $data, $ra, $tipo){
		
		$sql = "INSERT INTO matricula SET aluno_id = :id_aluno, curso_id = :id_curso, pacote_id = :pct, data_matricula = :data, numero_matricula = :ra, tipo_matricula = :tipo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_aluno', $id);
		$sql->bindValue(':id_curso', $id_curso);
		$sql->bindValue(':pct', $pacote_id);
		$sql->bindValue(':data', $data);
		$sql->bindValue(':ra', $ra);
		$sql->bindValue(':tipo', $tipo);
		$sql->execute();
		$id = $this->db->lastInsertId();

		if ($sql->rowCount() > 0) {return $id;}
		else{return false;}
	
	}

	public function existeMatricula($id, $id_curso){

		$sql = "SELECT * FROM matricula 
		WHERE curso_id = :id_curso
		AND aluno_id = :id_aluno";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_aluno', $id);
		$sql->bindValue(':id_curso', $id_curso);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else{return false;}
	}

	public function inserir($id, $id_curso, $data){
		foreach ($id as $ids) {
		$this->addMat($ids, $id_curso, $data);
		} 
		return true;

	}

	public function GetMatricula(){
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.aluno_id,
		matricula.curso_id,
		matricula.data_matricula,
		matricula.situacao,
		matricula.numero_matricula,
		alunos.id_aluno,
		alunos.polo_id,
		alunos.nome_aluno,
		alunos.email_aluno,
		alunos.sluga,
		alunos.telefone_aluno,
		alunos.cpf_aluno,
		alunos.data_de_nascimento,
		cursos.nome_curso,
		polos.apelido,
		cursos.valor 
		FROM matricula
		INNER JOIN alunos ON id_aluno = aluno_id
		INNER JOIN cursos ON id_curso = curso_id
		INNER JOIN polos ON id_polo = alunos.polo_id
		ORDER BY nome_curso ASC";

		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}

	public function getMatriculaId($id){
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.aluno_id,
		matricula.curso_id,
		matricula.data_matricula,
		matricula.negativa,
		matricula.numero_matricula,
		alunos.*,
		pacotes.nome_pacote,
		pacotes.valor_pacote,
		pacotes.valor_total,
		financeiro.id_unico
		FROM matricula
		INNER JOIN alunos ON id_aluno = aluno_id
		INNER JOIN pacotes ON id_pacote = pacote_id
		LEFT JOIN financeiro ON ra = numero_matricula
		WHERE id_matricula = :idd
		GROUP BY ra;
		";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}

		public function GetIdMatricula($id){
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.aluno_id,
		matricula.curso_id,
		matricula.data_matricula,
		matricula.negativa,
		matricula.situacao,
		alunos.*,
		cursos.nome_curso,
		cursos.valor,
		financeiro.id_unico
		FROM matricula
		INNER JOIN alunos ON id_aluno = aluno_id
		INNER JOIN cursos ON id_curso = curso_id
		LEFT JOIN financeiro ON ra = numero_matricula
		WHERE id_matricula = :idd
		GROUP BY ra;
		";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}

	public function GetMatriculaPolo($id){
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.aluno_id,
		matricula.curso_id,
		matricula.data_matricula,
		matricula.situacao,
		matricula.numero_matricula,
		alunos.id_aluno,
		alunos.polo_id,
		alunos.nome_aluno,
		alunos.email_aluno,
		alunos.sluga,
		alunos.telefone_aluno,
		alunos.cpf_aluno,
		alunos.data_de_nascimento,
		cursos.nome_curso,
		cursos.valor, 
		polos.apelido
		FROM matricula
		LEFT JOIN alunos ON id_aluno = aluno_id
		LEFT JOIN cursos ON id_curso = curso_id
		LEFT JOIN polos ON id_polo = alunos.polo_id
		WHERE polo_id = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}

	public function GetMatriculaConluida()
	{
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.aluno_id,
		matricula.curso_id,
		matricula.data_matricula,
		matricula.situacao,
		matricula.numero_matricula,
		alunos.id_aluno,
		alunos.polo_id,
		alunos.nome_aluno,
		alunos.email_aluno,
		alunos.sluga,
		alunos.telefone_aluno,
		alunos.cpf_aluno,
		alunos.data_de_nascimento,
		cursos.nome_curso,
		polos.apelido,
		cursos.valor 
		FROM matricula
		INNER JOIN alunos ON id_aluno = aluno_id
		INNER JOIN cursos ON id_curso = curso_id
		INNER JOIN polos ON id_polo = alunos.polo_id
		WHERE matricula.situacao = :sit
		ORDER BY nome_curso ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':sit', 'Concluido');
		$sql->execute();

		if ($sql->rowCount() > 0) 
		{
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $sql;
			exit();
		}
		
		return false;

	}

	public function GetMatriculaConluidaPolo($id)
	{
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.aluno_id,
		matricula.curso_id,
		matricula.data_matricula,
		matricula.situacao,
		matricula.numero_matricula,
		alunos.id_aluno,
		alunos.polo_id,
		alunos.nome_aluno,
		alunos.email_aluno,
		alunos.sluga,
		alunos.telefone_aluno,
		alunos.cpf_aluno,
		alunos.data_de_nascimento,
		cursos.nome_curso,
		polos.apelido,
		cursos.valor 
		FROM matricula
		INNER JOIN alunos ON id_aluno = aluno_id
		INNER JOIN cursos ON id_curso = curso_id
		INNER JOIN polos ON id_polo = alunos.polo_id
		WHERE matricula.situacao = :sit AND alunos.polo_id = :idd
		ORDER BY nome_curso ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':sit', 'Concluido');
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) 
		{
			$sql = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $sql;
			exit();
		}
		
		return false;

	}

	public function fimMod($id)
	{
		$sql = "UPDATE matricula SET situacao = :sit WHERE id_matricula = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':sit', 'Concluido');
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) 
		{
			return true;
			exit();
		}
		
		return false;
	}


		public function GetPoloId($id)
		{
			$sql = "SELECT 
			alunos.polo_id
			FROM alunos
			WHERE id_aluno = :idd";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':idd', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetch();
				
			}

			return $sql;

		}

	public function confirmaMatricula($id)
	{
		$sql = "UPDATE matricula SET situacao = :stt WHERE id_matricula = :idd ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':stt', 'Matriculado');
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() >0) {
			return true;
			exit();
		}

		return false;
	}

		public function matriculaPendente($negativa, $id)
	{
		$sql = "UPDATE matricula SET situacao = :stt, negativa = :negs WHERE id_matricula = :idd ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':stt', 'Pendente');
		$sql->bindValue(':negs', $negativa);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() >0) {
			return true;
			exit();
		}

		return false;
	}

		public function upEditMatricula($id)
	{
		$sql = "UPDATE matricula SET situacao = :stt WHERE id_matricula = :idd ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':stt', 'Analise');
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() >0) {
			return true;
			exit();
		}

		return false;
	}

	public function getPedidos($id){
		$sql = "SELECT 
		financeiro.pedido_numero
		FROM financeiro 
		where ra = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if($sql->rowCount() > 0) {			
			$pedido = $sql->fetchAll();
		}
		return $pedido;
		
		}

	public function GetRaMatriculaId($id){
		$sql = "SELECT numero_matricula FROM matricula WHERE id_matricula = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_ASSOC);
			exit;
		}
	}

	public function deletMat($ra){
		$sql = "DELETE FROM matricula WHERE numero_matricula = :raa";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':raa', $ra);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
			exit();
		}
		return false;
	}

		public function matricularGlobal($id_aluno, $id_curso){

	// Define the endpoint URL //
	$request_url = 'https://escoladecursos.net.br/api/vinculaAlunoCurso';

	/* Adds params to data */
	$data = array(
	    'security_token' => '89FE7F17BED7F1D027BE02AE9B2399D7',
	    'idaluno' => $id_aluno,
	    'idcurso' => $id_curso
	);

	/* ... */
	$postFields = http_build_query($data);

	/* Preparing Query... */
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $request_url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	if ($result = curl_exec($ch)){
		return true;
	}
	
	curl_close($ch);

		}

			public function getAlunoMsg($id)
		{
			$sql = "SELECT alunos.nome_aluno, cursos.nome_curso, matricula.numero_matricula 
			FROM matricula 
			INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
			INNER JOIN cursos ON cursos.id_curso = matricula.curso_id
			WHERE matricula.id_matricula = :idd";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':idd', $id);
			$sql->execute();
			if ($sql->rowCount() > 0) {
				$sql = $sql->fetch(PDO::FETCH_ASSOC);
				return $sql;
				exit();
			}
			return false;
		}

		public function enviarSMS($msg)
		{

		  $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://utils.api.stdlib.com/sms@1.0.11/",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => [
		  						"to" => "+55067993454925",
		  						"body" => $msg
		  					],
		  CURLOPT_HTTPHEADER => array(
		  	"Authorization: Bearer tok_dev_U6Ln4jvZKA6ahRjtFgVfALfzCgLi3VAwNiGpu6cVUeE1whhHv974Z9HVZ9GfbfJ7"
		  ),
		));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			
			if ($err) {exit ($err);} 
			else {return true;}

		}

		public function enviarEmail($msg)
		{
			// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
			// O return-path deve ser ser o mesmo e-mail do remetente.
			$assunto = '[ERP-EJA] informa: Modulo Conluido';
			
			$headers = "MIME-Version: 1.1\r\n";
			$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
			$headers .= "From: contato@portaleja.com.br\r\n"; // remetente
			$headers .= "Return-Path: contato@portaleja.com.br\r\n"; // return-path
			$envio = mail("coordenacao.eja@portaledc.com.br", $assunto, $msg, $headers);
			 
			if($envio)
			return true;
			else
			 return false;
		}

}