<?php
include("./Dbh.php");

class User {

    private $id;
    private $email;
    private $password;

    function __construct(
		){
    }
    public function save(){
        $Dbh = new Dbh();

        $sql = "INSERT 
        INTO `users` (`id`, `email`, `password`) 
        VALUES (NULL, '".$this->getEmail()."', '".$this->getPassword()."');";


        $Dbh->connect()->query($sql);
 
}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}


}



?>