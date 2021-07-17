<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="css\all.css">		
		<link rel="stylesheet" href="css\bootstrap.css">
	    <script src="js\jquery.js"></script>
		<script src="js\bootstrap.js"></script>	
		<style>
		body
		{
				background-image:url("images/img2.jpg");
				height: auto;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				width:100%;
				background-size: cover;
				margin-top: 60px;
			    display: flex;
				-webkit-flex-flow: column wrap;
				justify-content: center; 
				align-items: center;
			}
		</style>
		
		<!-- user login script-->
		<script type="text/javascript">
					$(document).ready(function(){
				
					   $("#login").click(function(){
						
							name=$("#name").val();
							password=$("#password").val();
							 $.ajax({
								type: "POST",
								url: "user_check.php",
								data: "name="+name+"&password="+password,
								success: function(html){
								  if(html=='true')
								  {
									  
									  $("#add_err2").html('<div class="alert alert-success"> \
															<strong>Authenticated</strong> \ \
														</div>');

									window.location.href = "main.php";
								  
								  } else if (html=='false') {
										$("#add_err2").html('<div class="alert alert-danger"> \
															<strong>Authentication</strong> failure. \ \
														</div>');
										
								  
								  } else {
										$("#add_err2").html('<div class="alert alert-danger"> \
															<strong>Error</strong> processing request. Please try again. \ \
														</div>');
								  }
								},
								beforeSend:function()
								{
									$("#add_err2").html("Loading...");
								}
							});
							 return false;
						});
				});
			</script>
	</head>
<body>
	<div class="container">
				<div class="row">
					<div class="col-md-4"></div>
									<div class="col-md-4">
										<div class="modal-body border-radius_lg" style="background:#f0f0f5; border-radius:7px;">
											<form class="form" style="background:#f0f0f5; border-radius:3px;">
												<h4 class="text-center" >Login</h4>
												<div id="add_err2"></div>
												<div class="form-group">
													<label for="exampleInputEmail1">Username</label>
													<input type="name" class="form-control" name="email" id="name" placeholder="Email" value="" aria-describedby="emailHelp" required>
												</div>
												<div class="form-group">
													<label for="exampleInputPassword1">Password</label>
													<input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
												</div>
												
												<button type="submit" id="login" name="submit" class="btn btn-info">Login</button>
											</form>
										</div>
									</div>
									<div class="col-md-4"></div>
								</div>
							</div>
						
		</div>
</body>
</html>