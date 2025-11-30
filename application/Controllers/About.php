<?php

class About extends Controller{

	public function __construct(){

	}
    
    public function index(){
    	$data = [];
    	new Template("about.html", $data);
    }
}

?>