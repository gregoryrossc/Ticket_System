<?php
// this is the user class, it holds all of the data for the user object for logging in

class User
{

    public $users_email; //email address
    public $users_name; //users name
    public $users_password; //users password


    public function __construct($users_email, $users_name, $users_password)
    {
    $this->users_email = $users_email; //the users email address
    $this->user_name = $users_name; //the users name
    $this->users_password = $users_password; //the users password
    }
    

    public function get_users_email(){
        return $this->users_email;
    }

    public function get_users_name(){
        return $this->users_name;
    }

    public function set_users_email($users_email){
        return $this->$users_email;
    }

    public function set_users_name($users_name){
        $this->users_name = $users_name;
    }
    public function set_password($users_password){
        $this->users_password = $users_password;
    }

    public function toListUser(){ //tostring used to check email

        return "<li>$this->users_email</li>";
    }
	
}

?>