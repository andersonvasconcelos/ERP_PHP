<?php 
namespace Models;
use Core\Model;
use PDO;

class Servicos extends Model{
	
	public function addServico($nome, $valor, $slug)
	{
		$sql = "INSERT INTO servicos SET nome_servico = :nome, valor_servico = :valor, slug_servico = :slug";

		 $sql = $this->db->prepare($sql);
		 $sql->bindValue(':nome', $nome);
		 $sql->bindValue(':valor', $valor);
		 $sql->bindValue(':slug', $slug);
		 $sql->execute();

	 	if($sql->rowCount() >0){return true;}
	 	else{return false;}
	}

	public function getServicosAll()
	{
		$sql = "SELECT * FROM servicos";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {$sql = $sql->fetchAll(PDO::FETCH_OBJ);} 
		return $sql;
	}

	public function getServicoId($id)
	{
		$sql = "SELECT * FROM servicos WHERE id_servico = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {$sql = $sql->fetch(PDO::FETCH_OBJ);} 
		return $sql;
	}

	public function upServico($nome, $valor, $slug, $id)
	{
		$sql = "UPDATE servicos SET nome_servico = :nome, valor_servico = :valor, slug_servico = :slug 
				WHERE id_servico = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':valor', $valor);
		$sql->bindValue(':slug', $slug);
		$sql->bindValue(':idd', $id);
		$sql->execute();

	 	if($sql->rowCount() >0){return true;}
	 	else{return false;}
	}

	public function deletServico($id)
	{
		$sql = "DELETE FROM servicos WHERE id_servico = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {return true;}
		else{return false;}
	}

	public function getAlunos($cpf, $cpfn)
	{
		$sql = "SELECT alunos.*, matricula.numero_matricula FROM alunos 
				LEFT JOIN matricula ON aluno_id = id_aluno
				WHERE alunos.cpf_aluno = :cpf or alunos.cpf_aluno = :pf";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cpf', $cpf);
		$sql->bindValue(':pf', $cpfn);
		$sql->execute();

		if ($sql->rowCount() > 0) {$sql = $sql->fetch(PDO::FETCH_OBJ);} 
		return $sql;
	}


}