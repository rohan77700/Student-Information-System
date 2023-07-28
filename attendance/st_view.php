<?php

ob_start();
session_start();

?>
<?php include('../connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Attendance</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>
    *{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-decoration: none;
		}
    .navbar{
			height: 110px;
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
			font-size: 30px;
      padding-right: 90px;
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
    header{
      padding: 130px 70px 70px 70px;
      font-size: 15px;
      font-style: bold;
      text-align: center;
    }
    body { 
      background-color: whitesmoke; 
      margin: 0;
    }
    table input {
      background-color: whitesmoke; 
    }
    table td button {
      background-color: whitesmoke;
    }
    .row {
      display: flex;
      flex-wrap: wrap;
    }
    .content {
      flex: 30%;;
      padding: 10px;
    }
    label{
      font-size: 20px;
    }
    .save{
      background: white;
			height: 30px;
			width: 70px;
			padding: 0 5px;
			font-size: 18px;
			border: 1px solid silver;
			border-radius: 10px;
    }
    .save:hover {
      background-color: lightblue;
    }
    .status{
      font-size: 10px;
    }

</style>
</head>
<body>
    <nav class="navbar">
      <div class="max-width">
        <div class="logo"><a href="#"><img src="../img/CCCT.png" alt=""></a></div>
        <h1>Centre for Computers and Communication Technology</h1>  
        <a href="../student_dashboard.php" style="text-decoration:none;"><?php echo $_SESSION['std_name'];?></a>
        <a href="../logout.php">Logout</a>
      </div>
    </nav>

<header>

  <h2>Attendance Management System</h2>

</header>

<center>

<div class="row">

  <div class="content">
    <h3>View</h3><br><br>

    <form method="post" action="">

    <label>Select Subject:</label>
    <select name="whichcourse" style="border-radius: 10px;">
        <option  value="elective_1">Elective-I</option>
        <option  value="elective_2">Elective-II</option>
        <option  value="webtech">Web Technology</option>
        <option  value="webtechlab">Web Technology Lab</option>
        <option  value="soft_core">Soft-Core</option>
        <option  value="project">Major Project</option>
    </select>

      <p>  </p>
      <label>Student Roll No.:</label>
      <input type="text" name="sr_id">
      <input type="submit" class="save" style="border-radius: 10px;" name="sr_btn" value="Search!" >

    </form>

   
   <?php

    if(isset($_POST['sr_btn'])){

     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $single = mysqli_query($mysqli,"select stat_id,count(*) as countP from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course' and attendance.st_status='Present'");
      $singleT= mysqli_query($mysqli,"select count(*) as countT from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course'");
    //  $count_tot = mysql_num_rows($singleT);
  } 


  ?>

<br><br><br>
    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">

    <?php


    if(isset($_POST['sr_btn'])){

       $count_pre = 0;
       $i= 0;
       $count_tot;
       if ($row=mysqli_fetch_row($singleT))
       {
       $count_tot=$row[0];
       }
       while ($data = mysqli_fetch_array($single)) {
       $i++;
       
       if($i <= 1){
     ?>


     <tbody>
      <tr>
          <td>Student Roll No: </td>
          <td><?php echo $data['stat_id']; ?></td>
      </tr>


           <?php
         //}
        
        // }

      ?>
      
      <tr>
        <td>Total Class (Days): </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $data[1]; ?> </td>
      </tr>

      <tr>
        <td>Absent (Days): </td>
        <td><?php echo $count_tot -  $data[1]; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
    }}
     ?>
    </table>
  </form>

  </div>

</div>

</center>

</body>
</html>
