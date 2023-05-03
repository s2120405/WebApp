

<?php
//makes a connection the the database - User class
class User{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test3';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}

	
	//function that lists the users
	public function list_users(){
		$sql="SELECT * FROM users1";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
}

	//gets the user id from the users table
	function get_user_id($id){
		$sql="SELECT user_email FROM users1 WHERE user_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$user_id = $q->fetchColumn();
		return $user_id;
	}
	
	//gets the session if the user has logged in
	function get_session(){
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			return true;
		}else{
			return false;
		}
	}

	//checks if  the session if the input is valid
	public function check_login($email1,$password){
		
		$sql = "SELECT count(*) FROM users1 WHERE user_email = :email1 AND user_password = :password"; 
		$q = $this->conn->prepare($sql);
		$q->execute(['email1' => $email1,'password' => md5($password) ]);
		$number_of_rows = $q->fetchColumn();
		
		$password = md5($password);
	
		if($number_of_rows == 1){
			
			$_SESSION['login']=true;
			$_SESSION['user_email']=$email1;
			return true;
		}else{
			return false;
		}
	}
}