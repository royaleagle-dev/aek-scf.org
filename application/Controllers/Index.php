<?php

class Index extends Controller {

    public function __construct(){
        //$this->churchModel = $this->loadModel('Church');
    }

    public function index(){
        $churchModel = $this->churchModel;
        new Template("index.html", $data=[]);
    }
}

?>