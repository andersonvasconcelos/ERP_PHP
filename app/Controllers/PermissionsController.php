<?php 
namespace Controllers;
use Core\Controller;

class PermissionsController extends Controller{

		public function getPermissions($id){
		$array = array();

		$sql = "SELECT permissoes_item_id FROM permissoes WHERE permissoes_grupo_id = :idd";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idd', $id);
		$sql->execute();

		if ($sql->rowCount() > 0 ) {
			$data = $sql->fetchAll();
			$ids = array();

			foreach ($data as $datas) {
				$ids[] = $datas['permissoes_item_id'];
			}

			$sql = "SELECT slug_item FROM permissoes_itens WHERE id_item IN (".implode(',', $ids).")";
			$sql = $this->db->query($sql);


			if ($sql->rowCount() > 0) {
			$data = $sql->fetchAll();

			foreach ($data as $data_item) {
						$array[] = $data_item['slug_item'];
					}	


		}
	}
	return $array;
}



}