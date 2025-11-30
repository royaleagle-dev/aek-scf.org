<?php

use Authentication\Login as Auth;

class Adminlogin{
	
	public function __construct(){

	}

	public function index(){
		new Template("adminPanel/login.html", $data=array());
	}

	public function authenticate(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if ($_POST['type'] == 'login'){
                $email = $_POST['email'];
                $password = $_POST['password'];
                //$color = $_POST['color'];

                $authenticate = new Auth ($email, $password);
                $authenticate = $authenticate->log_user_in();
                
                if($authenticate){
                    $url = redirect('dashboard');
                    $_SESSION['msg'] = "User Successfully Authenticated";
                    //echo json_encode(array("msg"=>"Login Attempt was Successful", "location"=>"$url"));
                    header("location: $url");
                }else{
                    $url = redirect('login');
                    $_SESSION['msg'] = "Incorrect Credentials Please Try Again";
                    echo json_encode(array("msg"=>"Login Attempt Failed", "location"=>"$url"));
                }
            }
        }
	}

}

?>