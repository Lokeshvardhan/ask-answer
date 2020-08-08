<?php
		session_start();
		include 'db.php';
		$name = $_POST['name'];
		$password = $_POST['password'];
		//Output any connection error
		if ($conn->connect_error) {
			die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}

		$query = "SELECT * FROM users WHERE u_name='$name' OR u_email='$name'";
		$result = mysqli_query($conn, $query) or die(mysqli_error());
		$num_row = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);

		if ($num_row >= 1) {

			if (password_verify($password, $row['u_password'])) {

				$_SESSION['login'] = $row['u_id'];
				$_SESSION['name'] = $row['u_name'];
				$_SESSION['email'] = $row['u_email'];
				echo 'true';
			}
			else {
				echo 'false';
			}

		} else {
			echo 'false';
		}

?>