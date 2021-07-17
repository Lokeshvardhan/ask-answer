<?php 
	session_start();
	
	include 'db.php';
	//Output any connection error
	if ($conn->connect_error) {
		die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
	}

	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$category = mysqli_real_escape_string($conn, $_POST['category']);
	if (strlen($content) ==0) {
		echo 'contentnull';
	} elseif (strlen($category) ==0) {
		echo 'category';
	} elseif (strlen($content) <=10) {
		echo 'content';
	}else {

				$insert_que = $conn->query("INSERT INTO questions (u_id, q_content,q_cat) VALUES ('$_SESSION[login]', '$content','$category')");
				if ($insert_que) {
					echo 'true';
				}
				else {
				echo 'false';
				}
			}
?>