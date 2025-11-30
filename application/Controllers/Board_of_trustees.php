<?php

class Board_of_trustees extends Controller{
    public function index(){
        new Template("boardOfTrustees.html", $data=[]);
    }
}

?>