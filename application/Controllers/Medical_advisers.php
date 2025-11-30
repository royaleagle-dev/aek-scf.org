<?php

class Medical_advisers extends Controller{
    public function index(){
        new Template("medicalAdvisers.html", $data=[]);
    }

}

?>