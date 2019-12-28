<?php

namespace Models;

use Core\Model;

class Alunos extends Model
{

	public function existeAluno($cpf, $email)
	{
		$sql = "SELECT * FROM alunos WHERE cpf_aluno = :cpf OR email_aluno = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cpf', $cpf);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function addAluno(
		$nome,
		$sexo,
		$estado_civil,
		$data_de_nascimento,
		$estado_de_nascimento,
		$cidade_de_nascimento,
		$nacionalidade,
		$rg,
		$estado_emissor,
		$orgao_emissor,
		$data_expedicao,
		$cpf,
		$tel,
		$tc,
		$tr,
		$mae,
		$pai,
		$resp,
		$job,
		$local_trabalho,
		$email,
		$senha,
		$cep,
		$end,
		$numero,
		$complemento,
		$bairro_aluno,
		$cidade_aluno,
		$estado_aluno,
		$inep,
		$n_inep,
		$cc_empresa,
		$cc_empresa_id,
		$obs,
		$polo_id,
		$slug
	) {

		if ($this->existeAluno($cpf, $email) == false) {
			$sql = "INSERT INTO alunos SET
			 nome_aluno = :nome_aluno,
			 sexo = :sexo,
			 estado_civil = :estado_civil,
			 data_de_nascimento = :data_de_nascimento,
			 estado_de_nascimento = :estado_de_nascimento,
			 cidade_de_nascimento = :cidade_de_nascimento,
			 nacionalidade = :nacionalidade,
			 rg_aluno = :rg_aluno,
			 estado_emissor = :estado_emissor,
			 orgao_emissor = :orgao_emissor,
			 data_expedicao = :data_expedicao,
			 cpf_aluno = :cpf_aluno,
			 telefone_aluno = :telefone_aluno,
			 telefone_comercial = :telefone_comercial,
			 telefone_residencial = :telefone_residencial,
			 nome_mae = :mae,
			 nome_pai = :pai,
			 resp = :resp,
			 profissao = :job,
			 local_trabalho = :local_trabalho,
			 email_aluno = :email_aluno,
			 senha_aluno = :senha_aluno,
			 cep = :cep,
			 endereco_aluno = :endereco_aluno,
			 numero_aluno = :numero_aluno,
			 complemento = :complemento,
			 bairro_aluno = :bairro_aluno,
			 cidade_aluno = :cidade_aluno,
			 estado_aluno = :estado_aluno,
			 inep = :inep,
			 n_inep = :n_inep,
			 cc_empresa = :cc_empresa,
			 cc_empresa_id = :cc_empresa_id,
			 obs = :obs,
			 polo_id = :idd,
			 sluga = :slug";

			$sql = $this->db->prepare($sql);
			$sql->bindValue(':nome_aluno', $nome);
			$sql->bindValue(':sexo', $sexo);
			$sql->bindValue(':estado_civil', $estado_civil);
			$sql->bindValue(':data_de_nascimento', $data_de_nascimento);
			$sql->bindValue(':estado_de_nascimento', $estado_de_nascimento);
			$sql->bindValue(':cidade_de_nascimento', $cidade_de_nascimento);
			$sql->bindValue(':nacionalidade', $nacionalidade);
			$sql->bindValue(':rg_aluno', $rg);
			$sql->bindValue(':estado_emissor', $estado_emissor);
			$sql->bindValue(':orgao_emissor', $orgao_emissor);
			$sql->bindValue(':data_expedicao', $data_expedicao);
			$sql->bindValue(':cpf_aluno', $cpf);
			$sql->bindValue(':telefone_aluno', $tel);
			$sql->bindValue(':telefone_comercial', $tc);
			$sql->bindValue(':telefone_residencial', $tr);
			$sql->bindValue(':mae', $mae);
			$sql->bindValue(':pai', $pai);
			$sql->bindValue(':resp', $resp);
			$sql->bindValue(':job', $job);
			$sql->bindValue(':local_trabalho', $local_trabalho);
			$sql->bindValue(':email_aluno', $email);
			$sql->bindValue(':senha_aluno', md5($senha));
			$sql->bindValue(':cep', $cep);
			$sql->bindValue(':endereco_aluno', $end);
			$sql->bindValue(':numero_aluno', $numero);
			$sql->bindValue(':complemento', $complemento);
			$sql->bindValue(':bairro_aluno', $bairro_aluno);
			$sql->bindValue(':cidade_aluno', $cidade_aluno);
			$sql->bindValue(':estado_aluno', $estado_aluno);
			$sql->bindValue(':inep', $inep);
			$sql->bindValue(':n_inep', $n_inep);
			$sql->bindValue(':cc_empresa', $cc_empresa);
			$sql->bindValue(':cc_empresa_id', $cc_empresa_id);
			$sql->bindValue(':obs', $obs);
			$sql->bindValue(':idd', $polo_id);
			$sql->bindValue(':slug', $slug);
			$sql->execute();
			$id = $this->db->lastInsertId();

			if ($sql->rowCount() > 0) {
				return $id;
				exit;
			} else {
				return false;
				exit;
			}
		}
	}

	public function getAlunosAll()
	{
		$sql = "SELECT * FROM alunos";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getAlunos()
	{
		$sql = "SELECT alunos.id_aluno, alunos.nome_aluno, alunos.sluga, polos.apelido 
		FROM alunos
        INNER JOIN polos ON id_polo = polo_id";

		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getAlunosPolo($id)
	{
		$sql = "SELECT alunos.id_aluno, alunos.nome_aluno, alunos.sluga, alunos.polo_id, polos.apelido 
		FROM alunos
        INNER JOIN polos ON id_polo = polo_id
        WHERE alunos.polo_id = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getAlunosId($slug)
	{
		$sql = "SELECT * FROM alunos WHERE sluga = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $slug);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getAlunoId($id)
	{
		$sql = "SELECT alunos.*, 
		matricula.numero_matricula,
		matricula.tipo_matricula,
		pacotes.id_pacote,
		pacotes.nome_pacote, 
		pacotes.valor_pacote,
		pacotes.valor_total,
		financeiro.forma_de_pagamento,
		financeiro.data_vencimento,
		faturas.fdpgto,
		faturas.vencimento,
		polos.razao_social,
		polos.apelido,
		polos.endereco_polo,
		polos.cnpj,
		polos.bairro,
		polos.cidade_polo,
		polos.estado_polo	
		FROM alunos 
		LEFT JOIN matricula ON aluno_id = id_aluno
		LEFT JOIN pacotes ON id_pacote = matricula.pacote_id
		LEFT JOIN financeiro ON financeiro.ra = matricula.numero_matricula
		LEFT JOIN polos ON id_polo = alunos.polo_id
		LEFT JOIN faturas ON faturas.ra = matricula.numero_matricula
		WHERE alunos.id_aluno = :id OR faturas.ra = :id OR financeiro.ra = :id
		GROUP BY aluno_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getRa($numero)
	{
		$sql = "SELECT financeiro.ra FROM financeiro WHERE ra = :raa";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':raa', $numero);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		}

		return false;
	}

	public function getCpf($id)
	{
		$sql = "SELECT cpf_aluno FROM alunos WHERE id_aluno = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch(PDO::FETCH_ASSOC);
		}

		return $sql;
	}


	public function verificaModulo($id)
	{
		$sql = "SELECT * FROM modulos WHERE curso_id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		}
		return false;
	}


	public function deletAluno($id)
	{
		if ($this->alunoMatriculado($id) == false) {

			$sql = "DELETE FROM alunos WHERE id_aluno = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$this->deleteAluno($id);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function editarAluno($nome, $cpf, $rg, $tel, $email, $pai, $sexo, $id)
	{
		$sql = "UPDATE alunos SET nome_aluno = :nome_aluno, email_aluno = :email_aluno, cpf_aluno = :cpf_aluno, rg_aluno = :rg_aluno, telefone_aluno = :telefone_aluno, nome_pai = :nome_pai, sexo = :sexo WHERE id_aluno = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome_aluno', $nome);
		$sql->bindValue(':cpf_aluno', $cpf);
		$sql->bindValue(':rg_aluno', $rg);
		$sql->bindValue(':telefone_aluno', $tel);
		$sql->bindValue(':email_aluno', $email);
		$sql->bindValue(':nome_pai', $pai);
		$sql->bindValue(':sexo', $sexo);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
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

	public function verificaMatriculado($id)
	{
		$sql = "SELECT * FROM matricula WHERE aluno_id = :id AND situacao = :sitt";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->bindValue(':sitt', 'Matriculado');
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
			exit;
		}

		return false;
	}
	public function createAluno($email, $senha, $nome)
	{

		/* Define the endpoint URL */
		$request_url = 'https://escoladecursos.net.br/api/createAluno';

		/* Adds params to data */
		$data = array(
			'security_token' => '89FE7F17BED7F1D027BE02AE9B2399D7',
			'email' => $email,
			'senha' => md5($senha),
			'nome' => $nome,
			'status' => 1
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

		curl_exec($ch);
		curl_close($ch);
	}
	public function deleteAluno($id)
	{

		/* Define the endpoint URL */
		$request_url = 'https://escoladecursos.net.br/api/deleteAluno';

		/* Adds params to data */
		$data = array(
			'security_token' => '89FE7F17BED7F1D027BE02AE9B2399D7',
			'id' => $id
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

		curl_exec($ch);
		curl_close($ch);
	}
}
