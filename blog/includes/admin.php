<?php require'connect.php' ?>
<?php
class admin{
	function userlogin($uname,$password){
	$qury="select * from ss_author where email='$uname' AND password='$password' AND status='active' ";
	$run=mysql_query($qury);
		if(mysql_num_rows($run)>0){
		session_start();
		$_SESSION['email']=$uname;
		return true;		
		}
		else{
			//echo"login fail";
			echo"<script>alert('invalid password ')</script>";			
			return "false";
		}

	}	function getuserid($email){				$qury="select aid from ss_author where email='$email' ";		$run=mysql_query($qury);		$row=mysql_fetch_array($run);		$id=$row['aid'];		return $id;
	}		
}

?>