<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
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
			width: 15%;
			top: 100px;
			margin-left: 87%;
			padding-top: 30px;
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
			top: 50px;
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
		center input[type='submit']{
			height: 25px;
			width: 155px;
			text-align: center;
			border: solid 1px silver;
			border-radius: 10px;
			background-color: whitesmoke;
		}
		center input[type='submit']:hover{
			background-color: lightblue;
		}
		center input[type='radio']{
			align-items: center;
			text-align: center;
			margin: 5px 0 5px 30px;
			width: 50px;
			height: 15px;
			border: 3px solid silver;
		}
		#id{
			border: 1px solid silver;
			text-align: center;
			width: 70px;
		}
		#name{
			border: 1px solid silver;
			text-align: center;
			width: 300px;
		}
		#td{
			border: 1px solid silver;
			text-align: center;
			width: 200px;
		}
		#dep{
			border: 1px solid silver;
			text-align: center;
			width: 120px;
		}
	</style>
	<?php
		session_start();
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sis");
	?>
</head>
<body>
	<nav class="navbar">
		<div class="max-width">
			<div class="logo"><a href="#"><img src="img/CCCT.png" alt="CCCT"></a></div>
			<h1>Centre for Computers and Communication Technology</h1>
			<div>Name:&nbsp;&nbsp;<?php echo $_SESSION['fullname'];?></div>  
			<a style= "padding-left: 20px;" href="logout.php">Logout</a>
		</div>
	</nav>
	<div class="show">
		<form class="nav" action="" method="post">
			<input type="submit" name="search_student" value="Search Student"><br><br>
			<input type="submit" name="add_new_student" value="Add Student"><br><br>
			<input type="submit" name="edit_student" value="Update Student"><br><br>
			<input type="submit" name="delete_student" value="Delete Student"><br><br>
			<input type="submit" name="show_faculty" value="Show Faculty"><br><br>
			<input type="submit" name="add_faculty" value="Add Faculty"><br><br>
			<input type="submit" name="edit_faculty" value="Update Faculty"><br><br>
			<input type="submit" name="delete_faculty" value="Delete Faculty"><br><br>
			<input type="submit" name="attendance" value="Attendance"><br><br>
		</form>
	</div>
	<div class="details"><br><br>
		<div class="demo">

			<?php
				if(isset($_POST['attendance'])){
					header("Location: attendance/attendance.php");
				}
			?>	

			<?php
				if(isset($_POST['search_student']))
				{
					?>
					<center>
					<form action="" method="post">
					<b>Enter Roll No:</b><input type="text" name="roll_no">
					<input type="submit" name="search_by_roll_no_for_search" value="Search">
					</form>
					</center>
					<?php
				}
				if(isset($_POST['search_by_roll_no_for_search']))
				{
					$query = "select * from student where roll_no = '$_POST[roll_no]'";
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


		<?php
			if(isset($_POST['delete_student']))
			{
				?>
				<center>
				<form action="delete_student.php" method="post">
				<b>Enter Roll No:</b><input type="text" name="roll_no">
				<input type="submit" name="search_by_roll_no_for_delete" value="Delete">
				</form>
				</center>
				<?php
			}
			?>


			<?php 
				if(isset($_POST['add_new_student'])){
			?>
					<center><h3>Fill the given details</h3><br>
					<form action="add_student.php" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td>
									<b>Upload Image:</b>
								</td> 
								<td>
									<input type="file" name="image" >
								</td>
							</tr>
							<tr>
								<td>
									<b>Roll No:</b>
								</td> 
								<td>
									<input type="text" name="roll_no" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" name="std_name" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Department:</b>
								</td> 
								<td>
									<input type="text" name="dept" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Batch:</b>
								</td> 
								<td>
									<input type="year" name="batch" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Semester:</b>
								</td> 
								<td>
									<input type="number" name="sem" min="1" max="6" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Father Name:</b>
								</td> 
								<td>
									<input type="text" name="father_name" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Father Contact:</b>
								</td> 
								<td>
									<input type="text" name="father_contact" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Date Of Birth:</b>
								</td> 
								<td>
									<input type="date" name="dob" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Gender:</b>
								</td> 
								<td>
									<input type="radio" name="gender" value="male" checked required>male
									<input type="radio" name="gender" value="female" required>female
								</td>
							</tr>
							<tr>
								<td>
									<b>Address:</b>
								</td> 
								<td>
									<input type="text" name="address" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Contact:</b>
								</td> 
								<td>
									<input type="text" name="std_contact" required>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><br><input style="margin-left: 25%;" type="submit" name="add" value="Add Student!"></td>
							</tr>
						</table>
					</form>
					</center>
					<?php
				}
			?>


			<?php
				if(isset($_POST['edit_student']))
				{
				?>
					<center>
					<form action="" method="post">
					<b>Enter Roll No:</b><input type="text" name="roll_no">
					<input type="submit" name="search_by_roll_no_for_edit" value="Search">
					</form>
					</center>
				<?php
				}
				if(isset($_POST['search_by_roll_no_for_edit']))
				{
					$query = "select * from student where roll_no = '$_POST[roll_no]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
				?>
						<center>
						<form action="admin_edit_student.php" method="post">
						<table>
							<tr>
								<td>
									<b>Roll No:</b>
								</td> 
								<td>
									<input type="text" name="roll_no" value="<?php echo $row['roll_no']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" name="std_name" value="<?php echo $row['std_name']?>">	
								</td>
							</tr>
							<tr>
								<td>
									<b>Department:</b>
								</td> 
								<td>
									<input type="text" name="dept" value="<?php echo $row['dept']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Batch:</b>
								</td> 
								<td>
									<input type="year" name="batch" value="<?php echo $row['batch']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Semester:</b>
								</td> 
								<td>
									<input type="number" name="sem" min="1" max="6" value="<?php echo $row['sem']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Father Name:</b>
								</td> 
								<td>
									<input type="text" name="father_name" value="<?php echo $row['father_name']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Father Contact:</b>
								</td> 
								<td>
									<input type="text" name="father_contact" value="<?php echo $row['father_contact']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Date Of Birth:</b>
								</td> 
								<td>
									<input type="date" name="dob" value="<?php echo $row['dob']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Gender:</b>
								</td> 
								<td>
									<input type="radio" name="gender" value="male">male
									<input type="radio" name="gender" value="female">female
								</td>
							</tr>
							<tr>
								<td>
									<b>Address:</b>
								</td> 
								<td>
									<input type="text" name="address" value="<?php echo $row['address']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Contact:</b>
								</td> 
								<td>
									<input type="text" name="std_contact" value="<?php echo $row['std_contact']?>">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><br><input style="margin-left: 25%;" type="submit" name="update" value="Save!"></td>
							</tr>
						</table>
						</form>
						</center>
						<?php
					}
				}
			?>	

			<?php 
				if(isset($_POST['add_faculty'])){
					?>
					<center><h3>Fill the given details</h3><br>
					<form action="add_faculty.php" method="post">
						<table>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" name="faculty_name" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Contact:</b>
								</td> 
								<td>
									<input type="number" name="contact" required>
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="email" name="email" required>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><br><input style="margin-left: 25%;" type="submit" name="add" value="Add Faculty!"></td>
							</tr>
						</table>
					</form>
					</center>
					<?php
				}
			?>


			<?php
				if(isset($_POST['edit_faculty']))
				{
				?>
					<center>
					<form action="" method="post">
					<b>Enter Faculty Name:</b><input type="text" name="faculty_name">
					<input type="submit" name="search_by_faculty_name_for_edit" value="Search">
					</form>
					</center>
				<?php
				}
				if(isset($_POST['search_by_faculty_name_for_edit']))
				{
					$query = "select * from faculty where faculty_name = '$_POST[faculty_name]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
				?>
						<center>
						<form action="edit_faculty.php" method="post">
						<table>
							<tr>
								<td>
									<b>Name:</b>
								</td> 
								<td>
									<input type="text" name="faculty_name" value="<?php echo $row['faculty_name']?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Contact:</b>
								</td> 
								<td>
									<input type="number" name="contact" value="<?php echo $row['contact']?>">	
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="email" name="email" value="<?php echo $row['email']?>">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><br><input style="margin-left: 25%;" type="submit" name="update" value="Save!"></td>
							</tr>
						</table>
						</form>
						</center>
						<?php
					}
				}
			?>

			<?php
			if(isset($_POST['delete_faculty']))
			{
				?>
				<center>
				<form action="delete_faculty.php" method="post">
				<b>Enter Faculty Id:</b><input type="text" name="faculty_id">
				<input type="submit" name="search_by_faculty_id_for_delete" value="Delete">
				</form>
				</center>
				<?php
			}
			?>

			<?php
				if(isset($_POST['show_faculty']))
				{
					?>
					<center>
						<h3>Faulty Details</h3><br>
						<table>
							<tr>
								<td id="id"><b>ID</b></td>
								<td id="name"><b>Name</b></td>
								<td id="td"><b>Contact</b></td>
								<td id="td"><b>Email</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from faculty";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
							<td id="id"><?php echo $row['faculty_id']?></td>
								<td id="name"><?php echo $row['faculty_name']?></td>
								<td id="td"><?php echo $row['contact']?></td>
								<td id="td"><?php echo $row['email']?></td>
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