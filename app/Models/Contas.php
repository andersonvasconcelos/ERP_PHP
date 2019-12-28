<?php 
namespace Models;
use Core\Model;
use PDO;

class Contas extends Model{

	private $credencial;
	private $chave;

	public function getBancos()
	{
		$sql = "SELECT * FROM bancos";
		$sql = $this->db->query($sql);


			if ($sql->rowCount() > 0) {
				$sql = $sql->fetchAll();
			}

		return $sql;
	}

	public function getConta($id_admin)
	{
		$sql = "SELECT * FROM conta_matriz WHERE admin_id = :iddadmin";
		$sql = $this->db->prepare($sql);

		$sql->bindValue(':iddadmin', $id_admin);
		$sql->execute();

			if ($sql->rowCount() > 0) {
				$sql = $sql->fetch();
				return $sql;
			} else{
				return false;
			}

		
	}

	// BUSCAR CREDENCIAL DA MATRIZ NO PJ BANK //
	public function getCredencialMatriz()
	{
		$sql = "SELECT conta_matriz.credencial FROM conta_matriz WHERE admin_id = :iddadmin";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddadmin', 1);
		$sql->execute();

			if ($sql->rowCount() > 0) 
			{
				$sql = $sql->fetch();
				$this->credencial = $sql['credencial'];
				return $this->credencial;
			} else{
				return false;
			}
	}

		// BUSCAR CHAVE DA MATRIZ NO PJ BANK //
	public function getChaveMatriz()
	{
		$sql = "SELECT conta_matriz.chave FROM conta_matriz WHERE admin_id = :iddadmin";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddadmin', 1);
		$sql->execute();

			if ($sql->rowCount() > 0) 
			{
				$sql = $sql->fetch();
				$this->chave = $sql['chave'];
				return $this->chave;
			} else{
				return false;
			}
	}

		// BUSCAR CREDENCIAL DO POLO NO PJ BANK //
	public function getCredencial($id)
	{
		$sql = "SELECT conta_matriz.credencial FROM conta_matriz WHERE admin_id = :iddadmin";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddadmin', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) 
			{
				$sql = $sql->fetch();
				return $sql['credencial'];

			} else{
				return false;
			}
	}

	// BUSCAR CHAVE DO POLO NO PJ BANK //
		public function getChave($id)
	{
		$sql = "SELECT conta_matriz.chave FROM conta_matriz WHERE admin_id = :iddadmin";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddadmin', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) 
			{
				$sql = $sql->fetch();
				return $sql['chave'];

			} else{
				return false;
			}
	}

	// BUSCAR CHAVE DO POLO NO PJ BANK //
		public function getIdConta($id)
	{
		$sql = "SELECT conta_matriz.id_conta FROM conta_matriz WHERE admin_id = :iddadmin";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':iddadmin', $id);
		$sql->execute();

			if ($sql->rowCount() > 0) 
			{
				$sql = $sql->fetch();
				return $sql['id_conta'];

			} else{
				return false;
			}
	}



	public function addConta($nome, $conta, $agencia, $banco, $cnpj, $ddd, $telefone, $email, $credencial, $chave, $conta_virtual, $admin_id)
	{
		$sql = "INSERT INTO conta_matriz SET
		admin_id = :admin_id,
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
		$sql->bindValue(':admin_id', $admin_id);
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

			if ($sql->rowCount() > 0) {return true;} 
			else{return false;}
	}

	public function credenciarContaPjBank($nome, $conta, $agencia, $banco, $cnpj, $ddd, $telefone, $email, $admin_id)
	{
				$curl = curl_init();

				  curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.pjbank.com.br/recebimentos",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => false,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>"{
				  	\n  \"nome_empresa\": \"$nome\",
				  	\n  \"conta_repasse\": \"$conta\",
				  	\n  \"agencia_repasse\": \"$agencia\",
				  	\n  \"banco_repasse\": \"$banco\",
				  	\n  \"cnpj\": \"$cnpj\",
				  	\n  \"ddd\": \"$ddd\",
				  	\n  \"telefone\": \"$telefone\",
				  	\n  \"email\": \"$email\"
				  	\n}",
				  CURLOPT_HTTPHEADER => array(
				    "Content-Type: application/json",
				    "Accept: application/json"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
				

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {

					$r = json_decode($response);
					$credencial = $r->credencial;
					$chave = $r->chave;
					$conta_virtual = $r->conta_virtual;
					$msg = $r->msg; 

					if($this->addConta($nome, $conta, $agencia, $banco, $cnpj, $ddd, $telefone, $email, $credencial, $chave, $conta_virtual, $admin_id)){
						return $msg;
					} else{return false;} 
				}
	}

	public function editarConta($client_id, $client_secret, $id_conta, $id_admin)
	{
	
		$sql = "UPDATE conta_matriz SET client_id = :cid, client_secret = :cs, id_conta = :idc WHERE admin_id = :iddadmin";

			$sql = $this->db->prepare($sql);
			
			$sql->bindValue(':cid', $client_id);
			$sql->bindValue(':cs', $client_secret);
			$sql->bindValue(':idc', $id_conta);
			$sql->bindValue(':iddadmin', $id_admin);
			$sql->execute();

				if ($sql->rowCount() > 0) {return true;} 
				else{return false;}
	}
}
