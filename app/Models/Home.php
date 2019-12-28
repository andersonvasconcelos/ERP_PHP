<?php 
namespace Models;
use Core\Model;
use PDO;


class Home extends Model{

	public function getEstadosAll(){
		$sql = "SELECT * FROM estado";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

		public function getCidadesUf($uf){
		$sql = "SELECT * FROM municipio WHERE Uf = :uf";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':uf', $uf);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function addAlert($ra, $link)
	{
		$sql = "INSERT INTO alertas SET colaborador = :idd, ra = :ra, msg = :msg, link = :link";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', 4);
		$sql->bindValue(':ra', $ra);
		$sql->bindValue(':msg', 'em análise');
		$sql->bindValue(':link', $link);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return true;
			exit();
		}
		return false;
	}

	public function getAlerts()
	{
		$sql = "SELECT * FROM alertas INNER JOIN matricula ON numero_matricula = ra
				WHERE lido = :lido AND situacao = :sit GROUP BY ra";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':lido', '0');
		$sql->bindValue(':sit', 'Analise');
		$sql->execute();
		$array = array();
		if ($sql->rowCount() > 0) {
			$array['qtd'] = $sql->rowCount();
			return $array['qtd'];
		}
	}
	public function getRa($id)
	{
		$sql = "SELECT matricula.numero_matricula FROM matricula WHERE id_matricula = :lido";

		$sql = $this->db->prepare($sql);

		$sql->bindValue(':lido', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {$ra = $sql->fetch(PDO::FETCH_OBJ); return $ra->numero_matricula;}
	}
	public function getAlert()
	{
		$sql = "SELECT * FROM alertas
				INNER JOIN matricula ON numero_matricula = ra
				WHERE lido = :lido AND situacao = :sit
				GROUP BY ra";

		$sql = $this->db->prepare($sql);

		$sql->bindValue(':lido', '0');
		$sql->bindValue(':sit', 'Analise');
		$sql->execute();

		if ($sql->rowCount() > 0) {$array = $sql->fetchAll(PDO::FETCH_OBJ);return $array;}
	}
	public function upLido($id)
	{
		$sql = "UPDATE alertas SET lido = :lido WHERE id = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':lido', 1);
		$sql->bindValue(':idd', $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$dados = $this->getIdMatricula($id);
			return $dados;
			exit();}
		else{return false;}
	}

	public function getIdMatricula($id)
	{
		$sql = "SELECT matricula.id_matricula FROM matricula
				INNER JOIN alertas ON alertas.ra = matricula.numero_matricula
				WHERE alertas.id = :idd 
				AND situacao = :sit
				LIMIT 1";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':idd', $id);
				$sql->bindValue(':sit', 'Analise');
				$sql->execute();
				if ($sql->rowCount() > 0) {
					$array = $sql->fetch(PDO::FETCH_OBJ);
					return $array->id_matricula;
				}
	}
}