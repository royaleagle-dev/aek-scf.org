<?php

namespace Authentication;

class Login{
    private $email;
    private $password;
    private $statement;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
        $this->database = new \Database();
    }

    public function log_user_in(){
        $statement = $this->database->query("SELECT * FROM admin WHERE email=?", $params = array($this->email), $fetchmode = 'fetch');
        $supplied_password = $this->password;
        $hashed_password= $statement->password;
        if(password_verify($supplied_password, $hashed_password)){
            $session = new \Session();
            $session->set_session(array(
                'email'=>$statement->email,
                'firstname'=>$statement->firstname,
                )
            );
            return true;
        }else{
            return false;
        }
    }
}


?>