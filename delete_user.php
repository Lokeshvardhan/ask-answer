<?php 
		session_start();
		include 'db.php';
		if(isset($_REQUEST['del_id']))
		{
			$chk_del_sql="DELETE FROM users WHERE u_id='$_REQUEST[del_id]' " ;
			$chk_del_run=mysqli_query($conn,$chk_del_sql);
		}
		?>
		