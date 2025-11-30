<?php


class Gallery{
	public function __construct(){
		$this->db = new Database();
	}

	public function getPhoto($photoId){
		$statement = $this->db->query("SELECT * FROM gallery WHERE id=?", $params=array($photoId), $fetchMode='fetch');
		if($statement){
			return $statement;
		}
	}

	public function getAllPhotos(){
		$statement = $this->db->query("SELECT * FROM gallery ORDER BY id DESC", $params=array(), $fetchMode = 'fetchAll');
		return $statement;
	}

	public function deletePhoto($photoId){
		$statement = $this->db->query("DELETE FROM gallery WHERE id=?", $params=array($photoId));
		if($statement){
			return true;
			//echo json_encode(array("status"=>"success"));
		}
	}

	public function addPhoto($photo_path, $photo_name, $date_added, $real_path){
		$statement = $this->db->query("INSERT INTO gallery (photo_path, photo_name, date_added, real_path) VALUES(?,?,?,?)", $params=array($photo_path, $photo_name, $date_added, $real_path));
		if($statement){
			return true;
		}

	}
}

?>