<?php 
namespace Models;
use Core\Model;
use PDO;

class Campanhas extends Model{

	public function addCampanha($nome_campanha, $desconto, $cupom, $inicio, $fim, $polo)
	{
		$sql = "INSERT INTO campanhas SET nome_cp = :nome_cp, desconto = :desconto, cupom = :cc, inicio = :inicio, fim = :fim, polo_id = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome_cp', $nome_campanha);
		$sql->bindValue(':desconto', $desconto);
		$sql->bindValue(':cc', $cupom);
		$sql->bindValue(':inicio', $inicio);
		$sql->bindValue(':fim', $fim);
		$sql->bindValue(':idd', $polo);
		$sql->execute();
 		
 		if($sql->rowCount() >0){return true;}else{return false;}
	}

	public function getCpAll()
	{
		$sql = "SELECT campanhas.*, polos.apelido 
		FROM campanhas LEFT JOIN polos ON polos.id_polo = campanhas.polo_id";

		$sql = $this->db->query($sql);

			if ($sql->rowCount() > 0) {$sql = $sql->fetchAll(PDO::FETCH_OBJ);} 
			return $sql;
	}

	public function getCpId($id, $hoje)
	{
		$sql = "SELECT campanhas.*, polos.apelido 
				FROM campanhas 
				LEFT JOIN polos ON polos.id_polo = campanhas.polo_id 
				WHERE polo_id = :idd 
				AND :hoje BETWEEN campanhas.inicio AND campanhas.fim";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->bindValue(':hoje', $hoje);
		$sql->execute();

			if ($sql->rowCount() > 0) {$sql = $sql->fetchAll(PDO::FETCH_OBJ);}
			return $sql;
	}

	public function deletCp($id)
	{
		$sql = "DELETE FROM campanhas WHERE id_cp = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) {return true; exit();}
			return false;
	}

	public function getCampanhasId($id)
	{
		$sql = "SELECT campanhas.*, polos.apelido 
				FROM campanhas 
				LEFT JOIN polos ON polos.id_polo = campanhas.polo_id 
				WHERE id_cp = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) {$sql = $sql->fetch(PDO::FETCH_OBJ);}
			return $sql;
	}

	public function editCampanha($nome_campanha, $desconto, $cupom, $inicio, $fim, $polo, $id)
	{
		$sql = "UPDATE campanhas SET nome_cp = :nome_cp, desconto = :desconto, cupom = :cc, inicio = :inicio, fim = :fim, polo_id = :idd WHERE id_cp = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome_cp', $nome_campanha);
		$sql->bindValue(':desconto', $desconto);
		$sql->bindValue(':cc', $cupom);
		$sql->bindValue(':inicio', $inicio);
		$sql->bindValue(':fim', $fim);
		$sql->bindValue(':idd', $polo);
		$sql->bindValue(':id', $id);
		$sql->execute();
 		
 		if($sql->rowCount() >0){return true;}else{return false;}
	}
}
