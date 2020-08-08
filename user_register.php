<?php 
	session_start();
	
	include 'db.php';
	//Output any connection error
	if ($conn->connect_error) {
		die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
	}

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$number = mysqli_real_escape_string($conn, $_POST['number']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//VALIDATION

	if (strlen($name) < 2) {
		echo 'name';
	} elseif (strlen($number) < 10) {
		echo 'number';
	} elseif (strlen($email) <= 4) {
		echo 'eshort';
	} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		echo 'eformat';
	} elseif (strlen($password) <= 4) {
		echo 'pshort';
		
	//VALIDATION
		
	} else {
		
		//PASSWORD ENCRYPT
		$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
		
		$query = "SELECT * FROM users WHERE u_email='$email' AND u_name='$name' ";
		$result = mysqli_query($conn, $query) or die(mysqli_error());
		$num_row = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		
			if ($num_row < 1) {

				$insert_row = $conn->query("INSERT INTO users (u_name, u_number, u_email, u_password) VALUES ('$name', '$number', '$email', '$spassword')");

				if ($insert_row) {

					$_SESSION['login'] = $conn->insert_id;
					$_SESSION['name'] = $name;
					$_SESSION['email'] = $email;

					echo 'true';

				}

			} else {

				echo 'false';

			}
			
	}

?>