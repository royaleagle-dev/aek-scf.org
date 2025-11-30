<?php

class InstaGPT_testing extends Controller{
    public function index(){
        new Template("GPT_testing.html", $data=[]);
    }

}

?>