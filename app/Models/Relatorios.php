<?php 
namespace Models;
use Core\Model;
use PDO;

class Relatorios extends Model{

	public function getRelatorio($start, $end)
	{
		$sql = "SELECT DISTINCT polos.apelido, alunos.nome_aluno, alunos.cpf_aluno, faturas.ra, pacotes.nome_pacote, matricula.situacao, faturas.fdpgto, faturas.qtd, faturas.parcela, faturas.valor, faturas.vencimento, faturas.id_fatura, faturas.convenio, faturas.responsavel, conta_matriz.iugu, alunos.resp FROM faturas
			INNER JOIN matricula ON numero_matricula = ra
			INNER JOIN alunos ON id_aluno = matricula.aluno_id
			INNER JOIN polos ON id_polo = alunos.polo_id
			INNER JOIN pacotes ON id_pacote = matricula.pacote_id
			INNER JOIN conta_matriz ON conta_matriz.admin_id = polos.id_polo
			WHERE faturas.vencimento BETWEEN :start AND :theend
			GROUP BY faturas.id";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':start', $start);
			$sql->bindValue(':theend', $end);
			$sql->execute();

			if ($sql->rowCount() >0) {$dados = $sql->fetchAll(PDO::FETCH_OBJ);return $dados;}
			else{return false;}
	}

	public function getRelatorioPolo($id, $start, $end)
	{
		$sql = "SELECT DISTINCT polos.apelido, alunos.nome_aluno, alunos.cpf_aluno, faturas.ra, pacotes.nome_pacote, matricula.situacao, faturas.fdpgto, faturas.qtd, faturas.parcela, faturas.valor, faturas.vencimento, faturas.id_fatura, faturas.convenio, faturas.responsavel, conta_matriz.iugu, alunos.resp FROM faturas
			INNER JOIN matricula ON numero_matricula = ra
			INNER JOIN alunos ON id_aluno = matricula.aluno_id
			INNER JOIN polos ON id_polo = alunos.polo_id
			INNER JOIN pacotes ON id_pacote = matricula.pacote_id
			INNER JOIN conta_matriz ON conta_matriz.admin_id = polos.id_polo
			WHERE alunos.polo_id = :idd
			AND faturas.vencimento BETWEEN :start AND :theend
			GROUP BY faturas.id";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':idd', $id);
			$sql->bindValue(':start', $start);
			$sql->bindValue(':theend', $end);
			$sql->execute();

		if ($sql->rowCount() >0) {$dados = $sql->fetchAll(PDO::FETCH_OBJ);return $dados;}
		else{return false;}
		
	}


	public function getRelatorioAll($polo)
	{
		$sql = "SELECT
			matricula.id_matricula,
			matricula.aluno_id,
			matricula.pacote_id,
			matricula.numero_matricula,
			polos.apelido,
			alunos.nome_aluno,
			alunos.telefone_aluno,
			alunos.telefone_residencial,
			alunos.telefone_comercial,
			alunos.email_aluno,
			alunos.resp,
			pacotes.nome_pacote,
			financeiro.data_vencimento,
			financeiro.valor,
			financeiro.parcela,
			financeiro.status,
			financeiro.id_unico
			FROM financeiro
			INNER JOIN matricula ON numero_matricula = ra
			INNER JOIN alunos ON id_aluno = aluno_id
			INNER JOIN polos ON id_polo = polo_id
			INNER JOIN pacotes ON id_pacote = pacote_id
			WHERE polo_id = :polo
			GROUP BY id_unico";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':polo', $polo);
		$sql->execute();

		if ($sql->rowCount() >0) {
			$dados = $sql->fetchAll();
		}
		return $dados;
		
	}

	public function relatorioAcademico()
	{
		$sql = "SELECT polos.apelido, alunos.nome_aluno, alunos.cpf_aluno, matricula.numero_matricula, pacotes.nome_pacote, cursos.nome_curso,  matricula.situacao, matricula.data_matricula, alunos.endereco_aluno, alunos.numero_aluno, alunos.complemento, alunos.bairro_aluno, alunos.cidade_aluno, alunos.estado_aluno, alunos.cep, alunos.telefone_aluno, alunos.telefone_comercial, alunos.telefone_residencial, alunos.email_aluno, alunos.resp
			FROM alunos
			INNER JOIN matricula ON matricula.aluno_id = alunos.id_aluno
			INNER JOIN polos ON id_polo = alunos.polo_id
			INNER JOIN pacotes ON id_pacote = matricula.pacote_id
			INNER JOIN cursos ON id_curso = matricula.curso_id";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll(PDO::FETCH_OBJ);
			return $dados;
		}else{return false;}
	}

	public function relatorioAcademicoPolo($id)
	{
		$sql = "SELECT polos.apelido, alunos.nome_aluno, alunos.cpf_aluno, matricula.numero_matricula, pacotes.nome_pacote, cursos.nome_curso,  matricula.situacao, matricula.data_matricula, alunos.endereco_aluno, alunos.numero_aluno, alunos.complemento, alunos.bairro_aluno, alunos.cidade_aluno, alunos.estado_aluno, alunos.cep, alunos.telefone_aluno, alunos.telefone_comercial, alunos.telefone_residencial, alunos.email_aluno, alunos.resp
			FROM alunos
			INNER JOIN matricula ON matricula.aluno_id = alunos.id_aluno
			INNER JOIN polos ON id_polo = alunos.polo_id
			INNER JOIN pacotes ON id_pacote = matricula.pacote_id
			INNER JOIN cursos ON id_curso = matricula.curso_id
			WHERE polo_id = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {$dados = $sql->fetchAll(PDO::FETCH_OBJ);return $dados;}
		else{return false;}
	}

		public function relatorioCompleto()
	{
		$sql = "SELECT polos.apelido, matricula.numero_matricula, pacotes.nome_pacote, cursos.nome_curso,  matricula.situacao, matricula.data_matricula, alunos.*
			FROM alunos
			INNER JOIN matricula ON matricula.aluno_id = alunos.id_aluno
			INNER JOIN polos ON id_polo = alunos.polo_id
			INNER JOIN pacotes ON id_pacote = matricula.pacote_id
			INNER JOIN cursos ON id_curso = matricula.curso_id";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll(PDO::FETCH_OBJ);
			return $dados;
		}else{return false;}
	}

}