<?php

class Photogallery extends Controller{
	
	private $galleryModel;

	public function __construct(){
		$this->galleryModel = $this->loadModel("Gallery");

	}

	public function index(){
		$photos = $this->galleryModel->getAllPhotos();
		$data=[
			'photos'=>$photos,
		];
		new Template("gallery.html", $data);
	}
}

?>