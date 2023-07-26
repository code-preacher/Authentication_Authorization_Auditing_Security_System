	<?php
	include_once "config.php";

	class Crud extends Config
	{

		function __construct()
		{
			parent::__construct();
		}


		public function checkLogin($post)
		{
			$email=$this->cleanse($post['email']);
			$password=$this->cleanse($post['password']);
			$query = "SELECT * FROM login WHERE email= '$email' and password='$password'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				if ($row['role'] === '1') {
					$_SESSION['id'] = $email;
					$_SESSION['login'] = 1;
					header("location:admin/dashboard.php");
				} else if ($row['role'] === '3') {
					$_SESSION['id'] = $email;
					$_SESSION['login'] = 1;
					$message="Just logged in";
					$system_ip = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
			        $system_name = gethostbyaddr($system_ip);   // Obtains the pc name
			        $system_server=$_SERVER['HTTP_HOST']; 
					 $query="INSERT INTO session_log(user_id,message,system_name,system_ip,system_server) VALUES('$user_id','$message','$system_name','$system_ip','$system_server')";
	                   $this->con->query($query);
					header("location:user/dashboard.php");
				}
			}else{
	         header("location:login.php?msg=Invalid email or password&type=error");
	     }
	 }


	 		public function Audit($message,$email)
		{
			$email=$this->cleanse($email);
			$query = "SELECT * FROM user WHERE email= '$email'";
			$result = $this->con->query($query);
			if ($result->num_rows > 0) {
					$rs=$result->fetch_assoc();
					$user_id=$rs['id'];
					$system_ip = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
			        $system_name = gethostbyaddr($system_ip);   // Obtains the pc name
			        $system_server=$_SERVER['HTTP_HOST']; 
					$query="INSERT INTO session_log(user_id,message,system_name,system_ip,system_server) VALUES('$user_id','$message','$system_name','$system_ip','$system_server')";
	                   $this->con->query($query);
				}
	 }




	//Display All
	 public function displayAll($table)
	 {
	 	$query = "SELECT * FROM {$table}";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$data = array();
	 		while ($row = $result->fetch_assoc()) {
	 			$data[] = $row;
	 		}
	 		return $data;
	 	}else{
	 		return 0;
	 	}
	 }



	 public function displayAllWithOrder($table,$orderValue,$orderType)
	 {
	 	$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$data = array();
	 		while ($row = $result->fetch_assoc()) {
	 			$data[] = $row;
	 		}
	 		return $data;
	 	}else{
	 		return 0;
	 	}
	 }


	 public function displayAllSpecific($table,$value,$item)
	 {
	 	$query = "SELECT * FROM {$table} WHERE $value='$item' ";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$data = array();
	 		while ($row = $result->fetch_assoc()) {
	 			$data[] = $row;
	 		}
	 		return $data;
	 	}else{
	 		return 0;
	 	}
	 }


	 public function displayAllSpecificWithOrder($table,$value,$item,$orderValue,$orderType)
	 {
	 	$query = "SELECT * FROM {$table} WHERE $value='$item' ORDER BY {$orderValue} {$orderType}";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$data = array();
	 		while ($row = $result->fetch_assoc()) {
	 			$data[] = $row;
	 		}
	 		return $data;
	 	}else{
	 		return 0;
	 	}
	 }



	 public function displayOneSpecific($table,$item,$value)
	 {
	 	$item = $this->cleanse($item);
	 	$value = $this->cleanse($value);
	 	$query = "SELECT * FROM {$table} where $item='$value' ";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$row = $result->fetch_assoc();
	 		return $row;
	 	}else{
	 		return 0;
	 	}
	 }


	 public function displayOneSpecificWithOrder($table,$item,$value,$orderValue,$orderType)
	 {
	 	$item = $this->cleanse($item);
	 	$value = $this->cleanse($value);
	 	$query = "SELECT * FROM {$table} where $item='$value' ORDER BY {$orderValue} {$orderType}";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$row = $result->fetch_assoc();
	 		return $row;
	 	}else{
	 		return 0;
	 	}
	 }




	 public function displayWithLimit($table,$limit)
	 {
	 	$query = "SELECT * FROM {table} limit {$limit}";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$data = array();
	 		while ($row = $result->fetch_assoc()) {
	 			$data[] = $row;
	 		}
	 		return $data;
	 	}else{
	 		return 0;
	 	}
	 }




		//Display Specific
	 public function display($value)
	 {
	 	$id = $this->cleanse($value);
	 	$query = "SELECT name FROM login where email='$id' ";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$row = $result->fetch_assoc();
	 		return $row['name'];
	 	}else{
	 		return "No found records";
	 	}
	 }



	 public function displayOne($table,$value)
	 {
	 	$id = $this->cleanse($value);
	 	$query = "SELECT * FROM {$table} where email='$id' ";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$row = $result->fetch_assoc();
	 		return $row;
	 	}else{
	 		return 0;
	 	}
	 }

	 public function displayOne2($table,$item,$value)
	 {
	 	$id = $this->cleanse($value);
	 	$query = "SELECT * FROM {$table} where $item='$value' ";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$row = $result->fetch_assoc();
	 		return $row;
	 	}else{
	 		return 0;
	 	}
	 }


	  public function displayOneWithOrder($table,$item,$value,$orderValue,$orderType)
	 {
	 	$id = $this->cleanse($value);
	 	$query = "SELECT * FROM {$table} where $item='$value' ORDER BY $orderValue $orderType ";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$row = $result->fetch_assoc();
	 		return $row;
	 	}else{
	 		return 0;
	 	}
	 }


	 public function displayNameById($table,$value)
	 {
	 	$id = $this->cleanse($value);
	 	$query = "SELECT * FROM {$table} where id='$id' ";
	 	$result = $this->con->query($query);
	 	if ($result->num_rows > 0) {
	 		$row = $result->fetch_assoc();
	 		return $row['name'];
	 	}else{
	 		return 0;
	 	}
	 }



	//Counting All
	 public function countAll($table)
	 {
	 	$q=$this->con->query("SELECT id FROM {$table}");
	 	if ($q) {
	 		return $q->num_rows;
	 	} else {
	 		return 0;
	 	}


	 }



	 public function countAllWithTwo($table,$item,$value)
	 {
	 	$q=$this->con->query("SELECT id FROM {$table} where $item='$value' ");
	 	if ($q) {
	 		return $q->num_rows;
	 	} else {
	 		return 0;
	 	}


	 }



	// Inserting



	 public function addUser($value)
	 {

	 	$name = $this->cleanse($post['name']);
	 	$email = $this->cleanse($post['email']);
	 	$phone = $this->cleanse($post['phone']);
	 	$address = $this->cleanse($post['address']);
	 	$password = $this->cleanse($post['password']);
	 	$gender = $this->cleanse($post['gender']);

			 $system_ip = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
	         $system_name = gethostbyaddr($system_ip);   // Obtains the pc name
	         $system_server=$_SERVER['HTTP_HOST'];      // Obtains server name
	         $status='0';

	         $query="INSERT INTO user(name,email,password,gender,phone,address) VALUES('$name','$email','$password','$gender','$phone','$address')";
	         $query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','3')";

	         $sql = $this->con->query($query);
	         if ($sql==true) {
	         	header("Location:login.php?msg=Account was created successfully, Please login &type=success");
	         	$this->con->query($query2);
	         }else{
	         	header("Location:login.php?msg=Error adding data try again!&type=error");
	         }
	     }



	     public function updateAdmin($value)
	     {
	     	$data=$this->displayOne('user',$post['email']);
	     	$email=$data['email'];
	     	$password=$this->cleanse($post['password']);
	     	$query="UPDATE login SET password='$password' WHERE email='$email' ";
	     	$query2="UPDATE user SET password='$password' WHERE email='$email' ";
	     	$sql=$this->con->query($query);
	     	$sql2=$this->con->query($query2);
	     	if ($sql==true && $sql2==true) {
	     		$this->Audit('Just Updated Profile Password',$email);
	     		header("Location:profile.php?msg=Account was updated successfully&type=success");
	     	}else{
	     		header("Location:profile.php?msg=Error updating account try again!&type=error");
	     	}
	     }



	      public function updateAdmin2($value)
	     {
	     	$data=$this->displayOne('user',$post['email']);
	     	$email=$data['email'];
	     	$password=$this->cleanse($post['password']);
	     	$query="UPDATE login SET password='$password' WHERE email='$email' ";
	     	$sql=$this->con->query($query);
	     	if ($sql==true) {
	     		header("Location:profile.php?msg=Account was updated successfully&type=success");
	     	}else{
	     		header("Location:profile.php?msg=Error updating account try again!&type=error");
	     	}
	     }

	     public function updateLogout($email)
	     {
	     	$this->Audit('Just Logged out',$email);
	     	$this->con->query($query);
	     }




	     public function displayProfile($value)
	     {
	     	$id = $this->cleanse($value);
	     	$query = "SELECT * FROM login where email='$id' ";
	     	$result = $this->con->query($query);
	     	if ($result->num_rows > 0) {
	     		$row = $result->fetch_assoc();
	     		return $row;
	     	}else{
	     		return "No found records";
	     	}
	     }



	//Empty Table
	     public function emptyTable($table,$url) 
	     { 
	     	$id = $this->cleanse($id);
	     	$query = "TRUNCATE {$table}";

	     	$result = $this->con->query($query);

	     	if ($result == true) {
	     		header("Location:$url?msg=Data was successfully deleted&type=success");
	     	} else {
	     		header("Location:$url?msg=Error deleting data&type=error");
	     	}
	     }



	//Delete Items
	     public function delete($id, $table,$url) 
	     { 
	     	$id = $this->cleanse($id);
	     	$query = "DELETE FROM {$table} WHERE id = $id";

	     	$result = $this->con->query($query);

	     	if ($result == true) {
	     		header("Location:$url?msg=Data was successfully deleted&type=success");
	     	} else {
	     		header("Location:$url?msg=Error deleting data&type=error");
	     	}
	     }


	     public function deleteTwoTable($email,$table,$table2,$url) 
	     { 
	     	$email = $this->cleanse($email);
	     	$query = "DELETE FROM {$table} WHERE email= '$email'";
	     	$query2 = "DELETE FROM {$table2} WHERE email= '$email'";

	     	$result = $this->con->query($query);

	     	if ($result == true) {
	     		header("Location:$url?msg=Data was successfully deleted&type=success");
	     		$this->con->query($query2);
	     	} else {
	     		header("Location:$url?msg=Error deleting Data&type=error");
	     	}
	     }


	//Search
	     public function displaySearch($value)
	     {
		//Search box value assigning to $Name variable.
	     	$Name = $this->cleanse($value);
	     	$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
	     	$result = $this->con->query($query);
	     	if ($result->num_rows > 0) {
	     		$row = $result->fetch_assoc();
	     		return $row;
	     	}else{
	     		return false;
	     	}
	     }



	     public function cleanse($str)
	     {
	   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
	     	$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
	     	$str = stripslashes($str); /** Add Strip Slashes Protection */
	     	if($str!=''){
	     		$str=trim($str);
	     		return mysqli_real_escape_string($this->con,$str);
	     	}
	     }






	     public function greeting()
	     {
	      //Here we define out main variables 
	     	$welcome_string="Welcome!"; 
	     	$numeric_date=date("G"); 

	 //Start conditionals based on military time 
	     	if($numeric_date>=0&&$numeric_date<=11) 
	     		$welcome_string="Good Morning!,"; 
	     	else if($numeric_date>=12&&$numeric_date<=17) 
	     		$welcome_string="Good Afternoon!,"; 
	     	else if($numeric_date>=18&&$numeric_date<=23) 
	     		$welcome_string="Good Evening!,"; 

	     	return $welcome_string;

	     }



	 }

	 ?>

