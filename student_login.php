<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
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
			height: 600px;
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
			padding: 0 150px;
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
		<h1 class="label">Student Panel</h1>
			<form class="login_form" action="" method="post">
				<div class="font">Username</div>
				<input type="text" name="username" required>
				<div class="font">Password</div>
				<input type="password" name="password" required>
				<input type="submit" name="submit" value="Log In">
				Not Signin : <a href="student_signup.php">Sign Up</a>
			</form>

		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sis");
				$query = "select * from student where username = '$_POST[username]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['username'] == $_POST['username'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['std_name'] =  $row['std_name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span>Wrong Username !!</span>
						<?php
					}
				}
			}
		?>
	</div>
</body>
</html>



			
			

