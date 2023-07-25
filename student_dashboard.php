<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-decoration: none;
		}
		.navbar{
			height: 100px;
			width: 100%;
			padding: 15px 0;
			background: rgb(70,200,150);
			background: linear-gradient(90deg, rgba(70,200,150,1) 35%, rgba(70,200,250,1) 100%);
			position: fixed;
			color: black;
			font-size: 20px;
			font-weight: 600;
			padding-left: 5px;
		}
		.navbar h1{
			font-size: 35px;
			font-weight: 600;
			color: white;
		}
		.navbar .max-width{
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding-left: 100px;
		}
		.navbar .max-width .logo{
			text-align: center;
		}
		.navbar .max-width .logo img{
			position: relative;
			margin: auto 0 10px 0;
			height: -400px;
			width: 100px;
		}
		.navbar .max-width a{
			padding-right: 50px;
			color: black;
		}
		.navbar .max-width a:hover{
			color: white;
		}
		.nav{
			height: 100%;
			width: 20%;
			top: 100px;
			padding-top: 100px;
			padding-left: 30px;
			background: rgb(70,200,250);
			background: linear-gradient(0deg, rgba(70,200,250,1) 35%, rgba(70,200,150,1) 100%);
			position: fixed;
		}
		.pic{
			position: absolute;
			text-align: left;
			padding-left: 100px;
		}
		.show{
			height: 70%;
			width: 10%;
			top: 20%;
			margin-left: 86%;
			position: fixed;
		}
		.show input{
			background: whitesmoke;
			height: 50px;
			width: 155px;
			padding: 0 5px;
			font-size: 18px;
			border: 1px solid silver;
			border-radius: 10px;
		}
		.show input:hover{
			background: lightblue;
		}
		.details{
			height: 75%;
			width: 70%;
			background-color: whitesmoke;
			position: fixed;
			left: 15%;
			top: 20%;
			font-size: 20px;
			border: solid 1px black;
			border-radius: 20px;
		}
		center input{
			width: 300px;
			height: 30px;
			text-align: center;
			border: solid 1px silver;
			border-radius: 10px;
		}

	</style>
	<?php
		session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sis");
	?>
</head>
<body>
	<nav class="navbar">
		<div class="max-width">
			<div class="logo"><a href="#"><img src="img/CCCT.png" alt=""></a></div>
			<h1>Centre for Computers and Communication Technology</h1>
			<div>Name:&nbsp;&nbsp;<?php echo $_SESSION['std_name'];?></div>  
			<a href="logout.php">Logout</a>
		</div>
	</nav>
	<div class="show">
		<form class="nav" action="" method="post">
			<input type="submit" name="show_detail" value="Show Profile"><br><br>
			<input type="submit" name="view" value="View Attendance"><br><br>
		</form>
	</div>
	
		<?php
				if(isset($_POST['view'])){
					header("Location: attendance/st_view.php");
				}
			?>	
			
	<div class="details"><br><br><br>
		<div class="demo">
			<?php
			if(isset($_POST['show_detail']))
			{
				$query = "select * from student where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
			?>

					<?php 
						//$sql = mysqli_query($mysqli,"select * from student where image = '$_POST[image]'");
						//while ($row = mysqli_fetch_assoc($sql)){
					?>
						

						<div class="pic">
							<?php if(empty($row['image'])){?>
							<img src="img/images.png" width="130" height="130" alt="" />
							<?php }else{ ?>
							<img src="<?php echo "uploads/".$row['image']; ?>" width="130" height="130" />
							<?php }?>
						</div>


				<center>
					<table>
						<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['roll_no']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['std_name']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Department:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['dept']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Batch:</b>
							</td> 
							<td>
								<input type="year" value="<?php echo $row['batch']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Semester:</b>
							</td> 
							<td>
								<input type="number" value="<?php echo $row['sem']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Father Name:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['father_name']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Father Contact:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['father_contact']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Date Of Birth:</b>
							</td> 
							<td>
								<input type="date" value="<?php echo $row['dob']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Gender:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['gender']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Address:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['address']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Contact:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['std_contact']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="email" value="<?php echo $row['email']?>" disabled>
							</td>
						</tr>
					</table>				
				</center>
				
				<?php
				}	
			}
			?>

		</div>
	</div>
</body>
</html>