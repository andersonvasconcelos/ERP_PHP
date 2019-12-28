<?php 
namespace Models;
use Core\Model;

class Modulos extends Model{
	
	public function addModulo($nome_modulo, $curso_id){
	
 $sql = "INSERT INTO modulos SET nome_modulo = :nome_modulo, curso_id = :curso_id";

 $sql = $this->db->prepare($sql);
 $sql->bindValue(':nome_modulo', $nome_modulo);
 $sql->bindValue(':curso_id', $curso_id);

 $sql->execute();
 	if($sql->rowCount() >0){
 		return true;
 	}else{
 		return false;
 	}
}

	public function getModulosAll(){
		$sql = "SELECT 
		modulos.nome_modulo,
		modulos.id_modulo,
		cursos.nome_curso
		FROM modulos
		INNER JOIN cursos ON id_curso = curso_id";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			
		} 
		return $sql;
	}

	public function getModuloId($id){
		$sql = "SELECT 
		modulos.nome_modulo,
		modulos.id_modulo,
		cursos.nome_curso,
		cursos.id_curso
		FROM modulos
		INNER JOIN cursos ON id_curso = curso_id
		WHERE id_modulo = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

		public function verificaAula($id){
		$sql = "SELECT * FROM aulas WHERE modulo_id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		}
		return false;
	}

	public function editarModulo($nome_modulo, $curso_id, $id_modulo){
		$sql = "UPDATE modulos SET 
		nome_modulo = :nome_modulo, 
		curso_id = :curso_id 
		WHERE id_modulo = :id_modulo";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome_modulo', $nome_modulo);
		$sql->bindValue(':curso_id', $curso_id);
		$sql->bindValue(':id_modulo', $id_modulo);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else{return false;}
	}

	public function deletModulo($id){
		if ($this->verificaAula($id) == false) {
			$sql = "DELETE FROM modulos WHERE id_modulo = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				return true;
			} else { return false; }
	   }
    }
}