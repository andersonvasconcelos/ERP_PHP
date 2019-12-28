<?php 
namespace Models;
use Core\Model;

class Segmentos extends Model{
	
	public function addSegmento($nome, $slug){
	
 $sql = "INSERT INTO segmentos SET nome_segmento = :nome, slug_s = :slug";

 $sql = $this->db->prepare($sql);
 $sql->bindValue(':nome', $nome);
 $sql->bindValue(':slug', $slug);
 $sql->execute();
 	if($sql->rowCount() >0){
 		return true;
 	}else{
 		return false;
 	}
}

	public function getSegAll(){
		$sql = "SELECT * FROM segmentos";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			
		} 
		return $sql;
	}

	public function getSegmentoSlug($slug){
		$sql = "SELECT * FROM segmentos WHERE slug_s = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $slug);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			} 
		return $sql;
	}

		public function verificaModulo($id){
		$sql = "SELECT * FROM modulos WHERE curso_id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
			} 
		return false; }


	public function delet($id){
		
		$sql = "DELETE FROM segmentos WHERE id_segmento = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		  if ($sql->rowCount() > 0) {return true;} 
		  else { return false; }
	}

	public function editar($nome, $id)
	{
		$sql = "UPDATE segmentos SET nome_segmento = :nome WHERE id_segmento = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
 		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		} else{
			return false;
		}
	}

}