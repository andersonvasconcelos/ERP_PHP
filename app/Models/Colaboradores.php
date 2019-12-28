<?php 
namespace Models;
use Core\Model;
use PDO;

class Colaboradores extends Model{

	private $uid;	

	public function addCol($nome, $cpf, $tel, $email, $senha, $polo, $permissoes, $imagem, $slug)
	{
	
			 $sql = "INSERT INTO colaboradores SET 
			 		 nome_colaborador = :nome_colaborador, 
			 		 cpf_colaborador = :cpf_colaborador, 
			 		 telefone_colaborador = :telefone_colaborador, 
			 		 email_colaborador = :email_colaborador, 
			 		 senha_colaborador = :senha_colaborador,
			 		 imagem_colaborador = :imagem_colaborador,
			 		 polo_id = :idd,
			 		 permissoes_id = :permissoes,
			 		 slug_c = :slug";

			 $sql = $this->db->prepare($sql);
			 $sql->bindValue(':nome_colaborador', $nome);
			 $sql->bindValue(':cpf_colaborador', $cpf);
			 $sql->bindValue(':telefone_colaborador', $tel);
			 $sql->bindValue(':email_colaborador', $email);
			 $sql->bindValue(':senha_colaborador', md5($senha));
			 $sql->bindValue(':imagem_colaborador', $imagem);
			 $sql->bindValue(':idd', $polo);
			 $sql->bindValue(':permissoes', $permissoes);
			 $sql->bindValue(':slug', $slug); 
			 $sql->execute();

				 	if($sql->rowCount() > 0){return true;}
				 	else{return false;}
	}

	public function getColaboradoresAll()
	{
		$sql = "SELECT colaboradores.*,
				polos.apelido FROM colaboradores
				INNER JOIN polos ON polo_id = id_polo";

		$sql = $this->db->query($sql);

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetchAll();
			}

		return $sql;
	}

		public function getColaboradoresPolo($id)
	{
		$sql = "SELECT colaboradores.*,
				polos.apelido FROM colaboradores
				INNER JOIN polos ON polo_id = id_polo
				WHERE polo_id = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetchAll();
			}

		return $sql;
	}

	public function getColId($slug)
	{
		$sql = "SELECT colaboradores.*,
				polos.apelido,
				permissoes_grupo.*
				FROM colaboradores
				INNER JOIN polos ON polo_id = id_polo
				INNER JOIN permissoes_grupo ON id_grupo = permissoes_id
				WHERE slug_c = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $slug);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetchAll();
			} 
		return $sql;
	}

	public function getSenha($id)
	{
		$sql = "SELECT colaboradores.senha_colaborador
				FROM colaboradores
				WHERE id_colaborador = :idd";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			} 
		return $sql['senha_colaborador'];
	}

	public function isLoged()
	{
		if (!empty($_SESSION["dados"])) {
   			return true;
   		}
   			return false;
	}
	public function fazerLogin($login, $senha){

		$sql = "SELECT 
		colaboradores.*, 
		conta_matriz.* 
		FROM colaboradores 
		LEFT JOIN conta_matriz ON admin_id = polo_id
		WHERE (email_colaborador = :login OR cpf_colaborador = :login)
		AND (senha_colaborador = :senha 
		AND ativo = :aativo)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":login", $login);
		$sql->bindValue(":senha", md5($senha));
		$sql->bindValue(":aativo", 1);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$dados = $sql->fetch(PDO::FETCH_ASSOC);
			return $dados;
		}
		

	}

	public function blockUser($login){

		$sql = "UPDATE colaboradores SET ativo = :ativo 
		WHERE email_colaborador = :log OR cpf_colaborador = :log";

		$sql = $this->db->prepare($sql);

		$sql->bindValue(":log", $login);
		$sql->bindValue(":ativo", 0);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
			exit();
		}
		 return false;
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


	public function deletCol($id){
		$sql = "DELETE FROM colaboradores WHERE id_colaborador = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else { return false; } 
}

	public function editarCol($nome, $cpf, $tel, $email, $ativo, $senha, $id_col, $permissoes)
	{
		$sql = "UPDATE colaboradores SET nome_colaborador =  :nome_colaborador, cpf_colaborador = :cpf_colaborador, telefone_colaborador = :telefone_colaborador, email_colaborador = :email_colaborador, senha_colaborador = :senha, permissoes_id = :per, ativo = :ativo WHERE id_colaborador = :id";

		$sql = $this->db->prepare($sql);
		 $sql->bindValue(':nome_colaborador', $nome);
 		 $sql->bindValue(':cpf_colaborador', $cpf);
		 $sql->bindValue(':telefone_colaborador', $tel);
		 $sql->bindValue(':email_colaborador', $email);
		 $sql->bindValue(':senha', $senha);
		 $sql->bindValue(':per', $permissoes);
		 $sql->bindValue(':ativo', $ativo);
		 $sql->bindValue(':id', $id_col);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		} else{
			return false;
		}
	}

	public function getApelido($id)
	{
		$sql = "SELECT polos.apelido FROM polos WHERE id_polo = :idd";
		
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) {

				return $sql->fetch();} 
			else{return false;}
	}


//// Funções para gerenciar grupo e itens de permissoes//
	public function getGrupo(){

		$sql = "SELECT * FROM permissoes_grupo";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $dados;
		} else{return false;}
		

	}

	public function addGrupo($nome){
		$sql = "INSERT INTO permissoes_grupo SET nome_grupo = :nome";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else{return false;}
	}

		public function getItens(){

		$sql = "SELECT * FROM permissoes_itens";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $dados;
		} else{return false;}
		

	}


		public function getItemId($grupo_id){

		$sql = "SELECT permissoes_item_id FROM permissoes WHERE permissoes_grupo_id = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $grupo_id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $dados;
		} else{return false;}
		

	}

	public function addItem($nome, $slug){
		$sql = "INSERT INTO permissoes_itens SET nome_item = :nome, slug_item = :slug";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':slug', $slug);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else{return false;}
	}

	public function insertPermission($id, $grupo_id){
		$sql = "INSERT INTO permissoes SET permissoes_item_id = :i, permissoes_grupo_id = :grupo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':grupo', $grupo_id);
		$sql->bindValue(':i', $id);
		$sql->execute();

				return true;
	}

		public function deletePermission($id, $grupo_id){
		$sql = "DELETE FROM permissoes WHERE permissoes_item_id = :i AND permissoes_grupo_id = :grupo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':grupo', $grupo_id);
			$sql->bindValue(':i', $id);
			$sql->execute();
				return true;
	}



}