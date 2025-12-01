<?php

class Events extends Controller{

	private $eventModel;

	public function __construct(){
		$this->eventModel = $this->loadModel("Event");
	}

	public function index(){
		$today = date('Y-m-d');
		$todayEvent = $this->eventModel->getTodayEvent($today);
		$data = [
			'events'=> $this->eventModel->getAllEvents(),
			'todayEvent' => $todayEvent,
		];
		new Template("events.html", $data);
	}
}

?>