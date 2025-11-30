<?php

class Contact extends Controller{

	public function __construct(){

	}
    
    public function index(){
    	$data = [];
    	new Template("contact.html", $data);
    }
}

?>