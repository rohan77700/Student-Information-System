<!DOCTYPE html>
<html>
<head>
	<title>Student Signup</title>
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
			margin-top: 60px; 
			padding: 20px 70px 20px 70px;
			width: 600px;
			height: 770px;
			opacity: 80%;
			background: lightgray;
			border-radius: 8px;
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
			font-weight: bold;
		}
		.login_form{
			padding: 40px 150px;
		}
		.login_form .font{
			font-size: 18px;
			margin: 5px 0;
		}
		.login_form input{
			height: 40px;
			width: 350px;
			padding: 0 5px;
			font-size: 18px;
			border: 1px solid silver;
			border-radius: 10px;
		}
		.login_form input[type="submit"]{
			margin: 45px 0 30px 0;
			height: 45px;
			width: 365px;
			border-radius: 10px;
			font-size: 20px;
			color: white;
			cursor: pointer;
			font-weight: bold;
			background: blue;
			transition: .5s;
		}
		.login_form input[type="submit"]:hover{
			background: lightgreen;
		}
		.login_form a{
			padding-left: 50px;
			font-size: 20px;
			color: sandybrown;
		}
		.login_form a:hover{
			color: saddlebrown;
		}
	</style>
</head>
<body>
	<div class="center">
		<div class="logo"><a href="#"><img src="img/CCCT.png" alt=""></a></div>
		<h1 class="label">Centre For Computers Communication and Technology</h1><hr>
			<form class="login_form" action="" method="post">
				<div class="font">Roll Number</div>
				<input type="text" name="roll_no" required>
				<div class="font">Username</div>
				<input type="text" name="username" required>
				<div class="font">Email</div>
				<input type="email" name="email" required>
				<div class="font">Password</div>
				<input type="password" name="password" required>
				<input type="submit" name="submit" value="Sign Up">
				Already Signin : <a href="student_login.php">Log In</a>
			</form>

		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sis");
				$query = "update student set username='$_POST[username]',email='$_POST[email]',password='$_POST[password]'
				where roll_no = '$_POST[roll_no]'";
				$query_run = mysqli_query($connection,$query);
				if($query_run)
				{
					header("Location: student_login.php");
				}
				else
				{
					echo "Error :".$query;
				}
					
			}	
						
		?>
	</div>
</body>
</html>
