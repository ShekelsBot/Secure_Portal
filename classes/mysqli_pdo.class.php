<?php
class mysqli_pdo
{
	public $dbhost;
	public $dbuser;
	public $dbpass;

	//------------------------------ function ------------------------------//    
	function cis411()
	{
		$this->dbhost = '127.0.0.1';
		$this->dbuser = 'root';
		$this->dbpass = '';
		$dbname = __FUNCTION__;
		try {
			$pdo = new PDO("mysql:host=localhost;dbname=$dbname", $this->dbuser, $this->dbpass);
		} catch (PDOException $e) {
			echo "Error!: " . $e->getMessage();
			die();
		} //try		
		return $pdo;

	} //function	 

	//------------------------------ function ------------------------------//    
	public function authenticate_email($db, $email)
	{
		try {
			$pdo = $this->$db();
			$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($result) {
				// Email exists
				return true;
			} else {
				// Email does not exist
				return false;
			}
		} catch (PDOException $e) {
			echo "Error verifying email: " . $e->getMessage();
		}
	} //function

	//------------------------------ function ------------------------------//    
	public function authenticate_password($db, $email, $password)
	{
		try {
			$pdo = $this->$db();
			$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($result) {
				// Password is correct
				return true;
			} else {
				// Password is incorrect
				return false;
			}
		} catch (PDOException $e) {
			echo "Error verifying password: " . $e->getMessage();
		}
	} //function

} //class


	
?>