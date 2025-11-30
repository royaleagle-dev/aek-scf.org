<?php

private $session;
private $session_check;
private $eventModel;
private $galleryModel;
private $visitorModel;

class Adminpanel extends Controller{
	public function __construct(){
		$this->session = new Session();
        $session_check = $this->session->check_session_exist(array('email', 'firstname'));
        $this->session_check = true;
        if(!$session_check){
            $url = redirect('login');
            $_SESSION['msg'] = "User not authoized";
            header("location: $url");
            $this->session_check = false;
        }
        if(!$this->session_check){exit ("Not Authenticated");}
        $this->eventModel = $this->loadModel('Event');
        $this->galleryModel = $this->loadModel('Gallery');
		$this->visitorModel = $this->loadModel('Visitor');
	}

	public function index(){
		$data = array();
		echo "Admin Panel";
		new Template("adminPanel/index.html", $data);
	}

	public function visitors(){
		$allVisitors = count($this->visitorModel->getAllVisitors());
		$todayVisitors = count($this->visitorModel->getTodayVisitors());
		$data = [
			'allVisitors'=>$allVisitors,
			'todayVisitors'=>$todayVisitors,
		];
		new Template("adminPanel/visitors.html", $data);
	}

	public function events(){
		$data = [
			'events'=>$this->eventModel->getAllEvents(),
		];
		new Template("adminPanel/events.html", $data);
	}

	public function addEvent(){
		if(isset($_POST['addEvent'])){
			$title = $_POST['title'];
			$description = $_POST['description'];
			$date_time = $_POST['event-date'];
			$addEvent = $this->eventModel->addNewEvent($title, $description, $date_time);
			if($addEvent){
				//echo json_encode(array("status"=>"success"));
				$referrer = $_SERVER['HTTP_REFERER'];
				header("location: $referrer");
			}else{
				echo json_encode(array("status"=>"failure"));
			}
		}
	}

	public function deleteEvent($eventId){
		$eventId = $eventId[0];
		$delete_event = $this->eventModel->deleteEvent($eventId);
		if($delete_event){
			echo json_encode(array("status"=>"success"));
		}
	}

	public function updateEvent(){
		if(isset($_POST['editEvent'])){
			$title = $_POST['title'];
			$description = $_POST['description'];
			$date_time = $_POST['event-date'];
			$eventId = $_POST['eventId'];
			$editEvent = $this->eventModel->updateEvent($eventId, $title, $description, $date_time);
			if($editEvent){
				//echo json_encode(array("status"=>"success"));
				$referrer = $_SERVER['HTTP_REFERER'];
				header("location: $referrer");
			}else{
				echo json_encode(array("status"=>"failure"));
			}
		}	
	}

	public function gallery(){
		$photos = $this->galleryModel->getAllPhotos();
		$data=[
			'photos'=>$photos,
		];
		new Template("adminPanel/gallery.html", $data);
	}

	public function addToGallery(){

		// RESPONSE FUNCTION
		function verbose($ok=1,$info=""){
  			// THROW A 400 ERROR ON FAILURE
  			if ($ok==0) { http_response_code(400); }
  			die(json_encode(["ok"=>$ok, "info"=>$info]));
		}

		// INVALID UPLOAD
		if (empty($_FILES) || $_FILES['file']['error']) {
  			verbose(0, "Failed to move uploaded file.");
		}
		
		// THE UPLOAD DESITINATION - CHANGE THIS TO YOUR OWN
		$filePath = BASE_MEDIA_ROOT."/public/uploads/gallery/";

		//$filePath = __DIR__ . DIRECTORY_SEPARATOR . "uploads";
		if (!file_exists($filePath)) { 
  			if (!mkdir($filePath, 0777, true)) {
    			verbose(0, "Failed to create $filePath");
  			}
		}

		$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
		$filePath = $filePath.$fileName;
		$sourcePath = URL_ROOT."/uploads/gallery/".$fileName;
		
		// DEAL WITH CHUNKS
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
		
		if ($out) {
  		$in = @fopen($_FILES['file']['tmp_name'], "rb");
  			if ($in) {
    			while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
  			} else {
    			verbose(0, "Failed to open input stream");
  			}
  	
  			@fclose($in);
  			@fclose($out);
  			@unlink($_FILES['file']['tmp_name']);
  		} else {
  			verbose(0, "Failed to open output stream");
		}

		// CHECK IF FILE HAS BEEN UPLOADED
		if (!$chunks || $chunk == $chunks - 1) {
  			rename("{$filePath}.part", $filePath);
  			$date_added = date('Y-m-d');
			$addToDb = $this->galleryModel->addPhoto($sourcePath, $fileName, $date_added, $filePath);
		}
		verbose(1, "Upload OK");
	}

	public function deletePhoto($photoId){
		$referer = $_SERVER['HTTP_REFERER'];
		$photoId = $photoId[0];
		$getPhoto = $this->galleryModel->getPhoto($photoId);
		$photo_path = $getPhoto->real_path;
		unlink($photo_path);
		$delete = $this->galleryModel->deletephoto($photoId);
		if($delete){
			echo json_encode(array("status"=>'success'));
		}
	}

	public function logout(){
        Session::end_session();
        //$_SESSION['msg'] = "Session ended successfully";
        $url = "login";
        $url = redirect($url);
        header("location: $url");
    }
}


?>