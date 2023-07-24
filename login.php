<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style>
		*{
			padding: 0;
			margin: 0;
		}
		body{
			background: url("img/ccctimg.jpg");
			align-items: center;
			justify-content: center;
			display: flex;
		}
		.center{
			position: relative;
			align-items: center;
			margin-top: 150px; 
			padding: 20px 70px 20px 70px;
			width: 600px;
			height: 400px;
			opacity: 70%;
			background: lightgray;
			border-radius: 20px;
		}
		.logo{
			text-align: center;
		}
		.logo img{
			margin: auto 0 10px 0;
			padding-top: 10px;
			height: -400px;
			width: 100px;
		}
		.label{
			text-align: center;
			padding: 30px 40px;
			font-size: 20px;
			font-weight: bolder;
		}
		.login_form{
			padding: 40px 150px;
		}
		.login_form input{
			background: white;
			height: 50px;
			width: 350px;
			padding: 0 5px;
			font-size: 18px;
			border: 1px solid silver;
			border-radius: 10px;
		}
		.login_form input:hover{
			background: lightblue;
		}
	</style>	
</head>
<body>
	
	<div class="center">
	<div class="logo"><a href="#"><img src="img/CCCT.png" alt=""></a></div>
	<h1 class="label">Centre For Computers Communication and Technology</h1><hr>
	<form class="login_form" action="" method="POST">
		<input type="submit" name="admin_login" value="Admin Login" required>
		<input type="submit" name="student_login" value="Student Login" required>
	</form>
	<?php
		if(isset($_POST['admin_login'])){
			$_SESSION['name']="sis";
			header("Location: admin_login.php");
		}
		if(isset($_POST['student_login'])){
			$_SESSION['name']="sis";
			header("Location: student_login.php");
		}
	?>

	</div>
</body>
</html>