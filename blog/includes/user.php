<?php
include('password.php');
class User extends Password{

    private $_db;

    function __construct($db){
    	parent::__construct();
    
    	$this->_db = $db;
    }

	private function get_user_hash($email){	
echo"9";
		try {
	echo"10";
			$stmt = $this->_db->prepare('SELECT password FROM members WHERE email = :email AND active="Yes" ');
			$stmt->execute(array('email' => $email));
		echo"11";	
			$row = $stmt->fetch();
			return $row['password'];
echo"12";
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function login($email,$password){
echo"7";
	echo"$email";
		echo"$password";
		 $hashed = $this->get_user_hash($email);
	
		if($this->password_verify($password,$hashed) == 1){
		    echo"8";
		    $_SESSION['loggedin'] = true;
		    return true;
		} 	
	}
		
	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}
	
}


?>