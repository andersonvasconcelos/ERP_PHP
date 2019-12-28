<?php 
namespace Models;
use Core\Model;

class Exercicios extends Model{
	
	public function addEx($curso, $modulo, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5, $resposta){
	
 $sql = "INSERT INTO exercicios SET curso_id = :curso, modulo_id = :modulo, pergunta = :pergunta, opcao1 = :opcao1, opcao2 = :opcao2, opcao3 = :opcao3, opcao4 = :opcao4, opcao5 = :opcao5, resposta = :resposta";

	$sql = $this->db->prepare($sql);
	$sql->bindValue(':curso', $curso);
	$sql->bindValue(':modulo', $modulo);
	$sql->bindValue(':pergunta', $pergunta);
	$sql->bindValue(':opcao1', $opcao1);
	$sql->bindValue(':opcao2', $opcao2);
	$sql->bindValue(':opcao3', $opcao3);
	$sql->bindValue(':opcao4', $opcao4);
	$sql->bindValue(':opcao5', $opcao5);
	$sql->bindValue(':resposta',$resposta);
 $sql->execute();
 	if($sql->rowCount() >0){
 		return true;
 	}else{
 		return false;
 	}
}

	public function getExAll(){
		$sql = "SELECT 
				exercicios.id_exercicio,
				cursos.id_curso,
				modulos.id_modulo,
				exercicios.pergunta,
				cursos.nome_curso,
				modulos.nome_modulo
				FROM exercicios
				INNER JOIN cursos ON id_curso = curso_id
				INNER JOIN modulos ON id_modulo = modulo_id";

		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			
		} 
		return $sql;
	}

	public function getExId($id){
		$sql = "SELECT * FROM exercicios WHERE id_exercicio = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			} 
		return $sql;
	}


	public function EditEx($pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5, $resposta, $id){
	
 $sql = "UPDATE exercicios SET pergunta = :pergunta, opcao1 = :opcao1, opcao2 = :opcao2, opcao3 = :opcao3, opcao4 = :opcao4, opcao5 = :opcao5, resposta = :resposta WHERE id_exercicio = :id";

	$sql = $this->db->prepare($sql);
	$sql->bindValue(':pergunta', $pergunta);
	$sql->bindValue(':opcao1', $opcao1);
	$sql->bindValue(':opcao2', $opcao2);
	$sql->bindValue(':opcao3', $opcao3);
	$sql->bindValue(':opcao4', $opcao4);
	$sql->bindValue(':opcao5', $opcao5);
	$sql->bindValue(':resposta',$resposta);
	$sql->bindValue(':id',$id);
 $sql->execute();
 	if($sql->rowCount() >0){
 		return true;
 	}else{
 		return false;
 	}
}

	public function deletEx($id){
		$sql = "DELETE FROM exercicios WHERE id_exercicio = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else { return false; }
	}

	public function getModulos($id){
		$sql = "SELECT * FROM modulos WHERE curso_id = :curso_id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':curso_id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

		public function getCursos(){
		$sql = "SELECT * FROM cursos";
		$sql = $this->db->query($sql);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getCursosV(){
		$sql = "SELECT * FROM cursos LIMIT 4";
		$sql = $this->db->query($sql);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getAlunosMat(){
		$sql = "SELECT matricula.aluno_id, 
		alunos.nome_aluno 
		FROM matricula 
		INNER JOIN alunos ON id_aluno = matricula.aluno_id
		GROUP BY nome_aluno";
		$sql = $this->db->query($sql);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

	public function getAlunosMatPolo($id, $id_polo){
		$sql = "SELECT matricula.aluno_id, 
		alunos.nome_aluno,
		alunos.polo_id
		FROM matricula 
		INNER JOIN alunos ON id_aluno = matricula.aluno_id
		WHERE (polo_id = :polo)
		GROUP BY nome_aluno";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':polo', $id_polo);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
		}
		return $sql;
	}

}