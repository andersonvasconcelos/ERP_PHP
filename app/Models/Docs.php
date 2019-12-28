<?php 
namespace Models;
use Core\Model;
use PDO;

class Docs extends Model{

	public function existeAluno($cpf, $email)
	{
		$sql = "SELECT * FROM alunos WHERE cpf_aluno = :cpf OR email_aluno = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cpf', $cpf);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {return true;}
		else{return false;}	

	}

	
	public function addDocs($id, $nome)
	{
		
		if ($this->getDocsExist($id)) 
		{
			return $this->upDocs($id, $nome);
		} else 
		{
			$sql = "INSERT INTO docs SET aluno_id = :id, nome_docs = :name ";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->bindValue(':name', $nome);
			$sql->execute();
				if($sql->rowCount() > 0){return true;exit();}
				else{return false;exit();}
		}
	}
	
	
	public function getAlunos()
	{
		$sql = "SELECT alunos.id_aluno, alunos.nome_aluno, alunos.sluga, polos.apelido 
		FROM alunos INNER JOIN polos ON id_polo = polo_id";
		
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			
		} 
		return $sql;
	}

	public function getCpf($ra)
	{
		$sql = "SELECT alunos.cpf_aluno FROM matricula
		INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
		WHERE matricula.numero_matricula = :ra
		GROUP BY alunos.id_aluno";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ra', $ra);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch(PDO::FETCH_ASSOC);
			return $sql['cpf_aluno'];
			exit();
		}
		return false;
	}

	public function getDocs($id)
	{
		$sql = "SELECT * FROM docs WHERE aluno_id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			} 
		return $sql;
	}

	public function getDocsExist($id)
	{
		$sql = "SELECT * FROM docs WHERE aluno_id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {return true;exit();}

		return false;
		exit();
	}

	public function upDocs($id, $nome)
	{
		$sql = "UPDATE docs SET nome_docs = :name 
		WHERE aluno_id = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $nome);
 		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){return true; exit();} 
		else{return false; exit();}
	}

	private function alunoMatriculado($id)
	{
		$sql = "SELECT * FROM matricula WHERE aluno_id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
			} 
		return false; 
	}




	//public function createAluno($email, $senha, $nome){

	/* Define the endpoint URL */
	//$request_url = 'https://edcescoladecursos.com.br/api/createAluno';

	/* Adds params to data */
	/*$data = array(
	    'security_token' => '89FE7F17BED7F1D027BE02AE9B2399D7',
	    'email' => $email,
	    'senha' => $senha,
		'nome' => $nome,
		'status' => 1
	);

	/* ... */
	//$postFields = http_build_query($data);

	/* Preparing Query... */
	/*$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $request_url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	curl_exec($ch);
	curl_close($ch);

}*/

/*public function deleteAluno($id){

	/* Define the endpoint URL */
	//$request_url = 'https://edcescoladecursos.com.br/api/deleteAluno';

	/* Adds params to data */
	/*$data = array(
	    'security_token' => '89FE7F17BED7F1D027BE02AE9B2399D7',
	    'id' => $id
	);

	/* ... */
	/*$postFields = http_build_query($data);

	/* Preparing Query... */
	/*$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $request_url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	curl_exec($ch);
	curl_close($ch);

}*/



}