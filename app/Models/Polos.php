<?php 
namespace Models;
use Core\Model;

class Polos extends Model{

	public function adicionarPolo($nome, $cep_polo, $endereco_polo, $telefone_polo, $telefone_polo_2, $cidade_polo, $estado_polo, $apelido, $razao, $cnpj, $bairro, $slug){
		if ($this->exitePolo($nome, $endereco_polo, $apelido) == false) {

		$sql = "INSERT INTO polos SET 
		nome_polo = :nome_polo,
		razao_social = :razao_social, 
		cep_polo = :cep_polo,
		endereco_polo = :endereco_polo, 
		bairro = :bairro,
		telefone_polo = :telefone_polo, 
		telefone_polo_2 = :telefone_polo_2, 
		cidade_polo = :cidade_polo, 
		estado_polo = :estado_polo, 
		apelido = :apelido, 
		cnpj = :cnpj, 
		slug = :slug";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome_polo', $nome);
		$sql->bindValue(':razao_social', $razao);
		$sql->bindValue(':cep_polo', $cep_polo);
		$sql->bindValue(':endereco_polo', json_encode($endereco_polo, JSON_UNESCAPED_UNICODE));
		$sql->bindValue(':bairro', $bairro);
		$sql->bindValue(':telefone_polo', $telefone_polo);
		$sql->bindValue(':telefone_polo_2', $telefone_polo_2);
		$sql->bindValue(':cidade_polo', $cidade_polo);
		$sql->bindValue(':estado_polo', $estado_polo);
		$sql->bindValue(':apelido', $apelido);
		$sql->bindValue(':cnpj', $cnpj);
		$sql->bindValue(':slug', $slug);
		$sql->execute();

		if ($sql->rowCount() > 0){return true;}else{return false;}
	}else{
		return false;
	}
}

	public function getPolosAll(){
		$sql = "SELECT * FROM polos";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
					return $sql;


	}


	public function exitePolo($nome, $endereco_polo, $apelido){
		$sql = "SELECT * FROM polos 
		WHERE nome_polo = :nome_polo
		OR endereco_polo = :endereco_polo
		OR apelido = :apelido";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome_polo', $nome);
		$sql->bindValue(':endereco_polo', json_encode($endereco_polo, JSON_UNESCAPED_UNICODE));
		$sql->bindValue(':apelido', $apelido);
		$sql->execute();

		if ($sql->rowCount() > 0){return true;}else{ return false; }
	}

	public function getPoloSlug($slug){
		$sql = "SELECT * FROM polos WHERE slug = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $slug);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
			return $sql;
	}

	public function editarPolo($nome_polo, $endereco_polo, $telefone_polo, $cidade_polo, $estado_polo, $apelido, $id_polo){

		$sql = "UPDATE polos SET nome_polo = :nome_polo, endereco_polo = :endereco_polo, telefone_polo = :telefone_polo, cidade_polo = :cidade_polo, estado_polo = :estado_polo, apelido = :apelido
		WHERE id_polo = :id_polo";

		$sql = $this->db->prepare($sql);
		$sql->bindValue('nome_polo', $nome_polo);
		$sql->bindValue('endereco_polo', $endereco_polo);
		$sql->bindValue('telefone_polo', $telefone_polo);
		$sql->bindValue('cidade_polo', $cidade_polo);
		$sql->bindValue('estado_polo', $estado_polo);
		$sql->bindValue('apelido', $apelido);
		$sql->bindValue(':id_polo', $id_polo);
		$sql->execute();

		if ($sql->rowCount() > 0){return true;}else{return false;}

	}

	public function deletPolo($id){
		$sql = "DELETE FROM polos WHERE id_polo = :iddd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {return true;}
		else{return false;} 
	}

	public function createPolo($apelido){

	/* Define the endpoint URL */
	$request_url = 'https://escoladecursos.net.br/api/createPolo';

	/* Adds params to data */
	$data = array(
	    'security_token' => '89FE7F17BED7F1D027BE02AE9B2399D7',
	    'nome' => $apelido
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