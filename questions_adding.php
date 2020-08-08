<?php 
	session_start();
	
	include 'db.php';
	//Output any connection error
	if ($conn->connect_error) {
		die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
	}

	$content = mysqli_real_escape_string($conn, $_POST['content']);
				$insert_row = $conn->query("INSERT INTO questions (u_id, q_content) VALUES ('$_SESSION[login]', '$content')");

				if ($insert_row) {

					echo 'true';
				}
				else {

				echo 'false';

				}
?>