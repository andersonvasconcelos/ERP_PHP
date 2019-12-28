<?php 
namespace Models;
use Core\Model;
use PDO;

class Pacotes extends Model{
	
	public function addPacote($nome, $valor, $slug)
	{
		$sql = "INSERT INTO pacotes SET nome_pacote = :nome_curso, valor_pacote = :valor, slugp = :slug";

		 $sql = $this->db->prepare($sql);
		 $sql->bindValue(':nome_curso', $nome);
		 $sql->bindValue(':valor', $valor);
		 $sql->bindValue(':slug', $slug);
		 $sql->execute();

	 	if($sql->rowCount() >0){return true;}
	 	else{return false;}
	}

	public function getPacotesAll(){
		$sql = "SELECT * FROM pacotes";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			
		} 
		return $sql;
	}

	public function getCursoId($id){
		$sql = "SELECT * FROM cursos WHERE id_curso = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			} 
		return $sql;
	}

		public function getCursos($id){
		$sql = "SELECT curso_id FROM pacotes_cursos WHERE pacote_id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			} 
		return $sql;
	}


		public function pacoteCursos($id_curso, $id_pacote)
		{
		$sql = "INSERT INTO pacotes_cursos SET curso_id = :id, pacote_id = :id_pct";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_pct', $id_pacote);
		$sql->bindValue(':id', $id_curso);
		$sql->execute();

			return true;
	}

		public function getCursosId($id_pacote){

		$sql = "SELECT curso_id FROM pacotes_cursos WHERE pacote_id = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id_pacote);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $dados;
		} else{return false;}
		

	}


	public function getCursoSlug($slug){
		$sql = "SELECT * FROM cursos WHERE slugc = :id";
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


	public function deletCurso($id){
		if ($this->verificaModulo($id) == false) {
		$sql = "DELETE FROM cursos WHERE id_curso = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else { return false; }
	} else{
		return false;
	}
}

	public function editarCurso($nome_curso, $descricao, $segmento, $tempo_de_acesso, $valor, $comissao, $slug, $id_curso)
	{
		$sql = "UPDATE cursos SET nome_curso = :nome_curso, descricao = :descricao, segmento = :segmento, tempo_de_acesso = :tempo_de_acesso, valor = :valor, comissao = :comissao, slugc = :ss WHERE id_curso = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome_curso', $nome_curso);
 		$sql->bindValue(':descricao', $descricao);
 		$sql->bindValue(':segmento', $segmento);
 		$sql->bindValue(':tempo_de_acesso', $tempo_de_acesso);
 		$sql->bindValue(':valor', $valor);
 		$sql->bindValue(':comissao', $comissao);
 		$sql->bindValue(':ss', $slug);
 		$sql->bindValue(':id', $id_curso);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		} else{
			return false;
		}
	}

}