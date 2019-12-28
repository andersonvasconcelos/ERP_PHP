<?php 
namespace Models;
use Core\Model;
use PDO;

class Pagamentos extends Model{

	public function getBancos(){
		$sql = "SELECT * FROM bancos";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;

	}

	public function getConta(){
		$sql = "SELECT * FROM conta_matriz";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch();
		}
		return $sql;

	}

	public function getMatriculaIugu()
	{
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.numero_matricula,
		faturas.fdpgto,
		faturas.ra,
		alunos.nome_aluno,
		polos.apelido
		FROM faturas
		INNER JOIN matricula ON numero_matricula = faturas.ra
		INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
		INNER JOIN polos ON polos.id_polo = alunos.polo_id
		GROUP BY ra";

		$sql = $this->db->query($sql);

		if ($sql->rowCount() >0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getMatriculaIuguPolo($id)
	{
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.numero_matricula,
		faturas.fdpgto,
		faturas.ra,
		alunos.nome_aluno,
		polos.apelido
		FROM faturas
		INNER JOIN matricula ON numero_matricula = faturas.ra
		INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
		INNER JOIN polos ON polos.id_polo = alunos.polo_id
		WHERE id_polo = :idd
		GROUP BY ra";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() >0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}


	public function getMatricula(){
		$sql = "SELECT 
		matricula.id_matricula,
		matricula.numero_matricula,
		financeiro.forma_de_pagamento,
		financeiro.ra,
		alunos.nome_aluno,
		polos.apelido
		FROM financeiro
		INNER JOIN matricula ON numero_matricula = financeiro.ra
		INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
		INNER JOIN polos ON polos.id_polo = alunos.polo_id
		WHERE forma_de_pagamento = 'boleto'
		GROUP BY ra";

		$sql = $this->db->query($sql);

		if ($sql->rowCount() >0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}


	public function getMatriculaPolo($id){
		$sql = "SELECT matricula.id_matricula,
		financeiro.ra,
		financeiro.forma_de_pagamento,
		alunos.nome_aluno,
		polos.apelido
		FROM financeiro
		INNER JOIN matricula ON numero_matricula = ra
		INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
		INNER JOIN polos ON polos.id_polo = alunos.polo_id
		WHERE forma_de_pagamento = 'boleto' AND polo_id = :idd_polo
		GROUP BY ra";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd_polo', $id);
		$sql->execute();

		if ($sql->rowCount() >0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getMatriculas(){
		$sql = "SELECT matricula.id_matricula, alunos.nome_aluno, alunos.id_aluno, polos.apelido 
		FROM matricula 
		INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id 
		INNER JOIN polos ON polos.id_polo = alunos.polo_id 
		WHERE (matricula.numero_matricula NOT IN 
		(SELECT faturas.ra FROM faturas))
		AND (matricula.numero_matricula NOT IN 
		(SELECT financeiro.ra FROM financeiro))
		GROUP BY nome_aluno";

		$sql = $this->db->query($sql);
		$sql->execute();

		if ($sql->rowCount() >0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

		public function getMatriculasPolo($id){
		$sql = "SELECT matricula.numero_matricula, matricula.id_matricula, alunos.nome_aluno, alunos.id_aluno, polos.apelido 
		FROM matricula 
		INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id 
		INNER JOIN polos ON polos.id_polo = alunos.polo_id 
		WHERE (matricula.numero_matricula NOT IN 
		(SELECT faturas.ra FROM faturas))
		AND (matricula.numero_matricula NOT IN 
		(SELECT financeiro.ra FROM financeiro))
		AND (polo_id = :idd_polo)
		GROUP BY numero_matricula";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd_polo', $id);
		$sql->execute();

		if ($sql->rowCount() >0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}


	public function addConta($nome, $conta, $agencia, $banco, $cnpj, $ddd, $telefone, $email,$credencial, $chave, $conta_virtual){
		$sql = "INSERT INTO conta_matriz SET 
		nome_empresa = :nome, 
		conta_repasse = :conta,	
		agencia_repasse = :agencia,
		banco_repasse = :banco,
		cnpj = :cnpj,
		ddd = :ddd,
		telefone = :tel,
		email = :email,	
		credencial = :cred,
		chave = :chave,
		conta_virtual = :conta_v";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':conta', $conta);
		$sql->bindValue(':agencia', $agencia);
		$sql->bindValue(':banco', $banco);
		$sql->bindValue(':cnpj', $cnpj);
		$sql->bindValue(':ddd', $ddd);
		$sql->bindValue(':tel', $telefone);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':cred', $credencial);
		$sql->bindValue(':chave', $chave);
		$sql->bindValue(':conta_v', $conta_virtual);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else{
			return false;
		}


	}

	public function salvarBoletos($aluno_id, $data_vencimento, $fpg, 
		$valo, $resp, $i, $id_unico, $link_boleto, $linkGrupo, $rand, $empresa_convenio){
	
		$slq = "INSERT INTO financeiro SET ra = :aluno_id, data_vencimento = :data_ve, forma_de_pagamento = :fpg, valor = :valor, data = :data, responsavel = :resp, parcela = :parcela, id_unico = :id_unico, linkBoleto = :lboleto, linkGrupo = :linkGrupo, pedido_numero = :np, empresa_convenio = :empresa_convenio";

	    $sql = $this->db->prepare($slq);
	    $sql->bindValue(':aluno_id', $aluno_id);
	    $sql->bindValue(':data_ve', date('Y-m-d', strtotime($data_vencimento)));
	    $sql->bindValue(':fpg', $fpg);
	    $sql->bindValue(':valor', $valo);
	    $sql->bindValue(':data', date('Y-m-d'));
	    $sql->bindValue(':resp', $resp);
	    $sql->bindValue(':parcela', $i);
	    $sql->bindValue(':id_unico', $id_unico);
	    $sql->bindValue(':lboleto', $link_boleto);
	    $sql->bindValue(':linkGrupo', $linkGrupo);
	    $sql->bindValue(':np', $rand);
	    $sql->bindValue(':empresa_convenio', $empresa_convenio);
	    $sql->execute();

	}

	public function salvarCartao($id_aluno, $valor, $parcela, $resp, $id_unico){

			$slq = "INSERT INTO financeiro SET ra = :aluno_id, data_vencimento = :data_ve, forma_de_pagamento = :fpg, valor = :valor, data = :data, responsavel = :resp, parcela = :parcela, id_unico = :id_unico";

	    $sql = $this->db->prepare($slq);
	    $sql->bindValue(':aluno_id', $id_aluno);
	    $sql->bindValue(':data_ve', date("Y-m-d"));
	    $sql->bindValue(':fpg', 'CARTAO');
	    $sql->bindValue(':valor', $valor);
	    $sql->bindValue(':data', date("Y/m/d"));
	    $sql->bindValue(':resp', $resp);
	    $sql->bindValue(':parcela', $parcela);
	    $sql->bindValue(':id_unico', $id_unico);
	    $sql->execute();
	}

	public function getIds($ra)
	{
		$sql = "SELECT financeiro.id_unico FROM financeiro WHERE ra = :ra AND financeiro.forma_de_pagamento = :fmp";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ra', $ra);
		$sql->bindValue(':fmp', 'BOLETO');
		$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetchAll();
				return $sql;
				exit;
			}
		return false; 
	}

	public function delPagamento($ra)
	{	
		$sql = "DELETE FROM financeiro WHERE ra = :ra";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ra', $ra);
		$sql->execute();

			if ($sql->rowCount() > 0) {
				return true;
				exit;
			}
		return false; 
	}

	public function deleteBoleto($id)
	{
		$curl = curl_init();

			curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.pjbank.com.br/recebimentos/4bce13282b78a288bb368732975f4259d72a537e/transacoes/$id",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "DELETE",
		  CURLOPT_HTTPHEADER => array(
		    "X-CHAVE: f4a6ad891c3e23944c731c532b860f8ae0ccf511"
		  ),
		));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {exit ($err);} 
			else {return true;}
	}

	public function getBoletosPj($credencial, $chave, $id_unico)
	{
	
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.pjbank.com.br/recebimentos/$credencial/transacoes/$id_unico",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "X-CHAVE: $chave"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		$resp = json_decode($response);
		curl_close($curl);

			if ($err) {return "cURL Error #:" . $err;} 
			else { return $resp;}
	}

	public function getPagamentosPJ($credencial, $chave, $data_inicial, $data_final, $sit)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.pjbank.com.br/recebimentos/$credencial/transacoes?data_inicio=$data_inicial&data_fim=$data_final&pago=$sit&pagina=1",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "X-CHAVE: $chave"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		$resp = json_decode($response);
		curl_close($curl);

			if ($err) {return "cURL Error #:" . $err;} 
			else { return $resp;}
	}

	public function getBoletos($ra)
	{
		$sql = "SELECT DISTINCT matricula.aluno_id, polos.id_polo, conta_matriz.iugu, faturas.* 
				FROM `faturas` 
				INNER JOIN matricula ON matricula.numero_matricula = faturas.ra
				INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
				INNER JOIN polos ON polos.id_polo = alunos.polo_id
				INNER JOIN conta_matriz ON conta_matriz.admin_id = polos.id_polo
				WHERE ra = :ra ORDER BY id ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ra', $ra);
		$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetchAll(PDO::FETCH_OBJ);
				return $sql;
				exit;
			}
		return false; 
	}

		public function getIuguCarne($ra)
	{
		$sql = "SELECT DISTINCT matricula.aluno_id, polos.*, conta_matriz.iugu, pacotes.*, alunos.*, faturas.* 
				FROM `faturas` 
				INNER JOIN matricula ON matricula.numero_matricula = faturas.ra
				INNER JOIN alunos ON alunos.id_aluno = matricula.aluno_id
				INNER JOIN polos ON polos.id_polo = alunos.polo_id
				INNER JOIN conta_matriz ON conta_matriz.admin_id = polos.id_polo
				INNER JOIN pacotes ON matricula.pacote_id = pacotes.id_pacote
				WHERE ra = :ra 
				GROUP BY faturas.id ORDER BY id ASC";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ra', $ra);
		$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetchAll(PDO::FETCH_OBJ);
				return $sql;
				exit;
			}
		return false; 
	}
}