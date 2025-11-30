<?php

class Event{
	
	public function __construct(){
		$this->db = new Database();
	}

	public function getAllEvents(){
		$statement = $this->db->query("SELECT * FROM events ORDER BY date_time DESC", $params = array(), $fetchMode = 'fetchAll');
		return $statement;
	}

	public function getEvent($eventId){
		$statement = $this->db->query("SELECT * FROM events WHERE id=?", $params=array($eventId), $fetchMode='fetch');
		return $statement;
	}

	public function getTodayEvent($today){
		$statement = $this->db->query("SELECT * FROM events WHERE date_time=?", $params=array($today), $fetchMode='fetch');
		if($statement){
			return $statement;
		}else{
			return false;
		}
	}

	public function addNewEvent($title, $description, $eventDate){
		$statement = $this->db->query("INSERT INTO events (title, description, date_time) VALUES (?,?,?)", $params = array($title, $description, $eventDate));
		if($statement){
			return true;
		}else{
			return false;
		}
	}

	public function deleteEvent($eventId){
		$statement = $this->db->query("DELETE FROM events WHERE id=?", $params=array($eventId));
		if($statement){
			return true;
		}
	}

	public function updateEvent($eventId, $title, $description, $date_time){
		$statement = $this->db->query("UPDATE events SET title=?, description=?, date_time=? WHERE id=?", $params = array($title, $description, $date_time, $eventId));
		if($statement){
			return true;
		}
	}
}


?>