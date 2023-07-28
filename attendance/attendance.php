<?php

ob_start();
session_start();

?>

<?php
    include('../connect.php');
      
    if(isset($_POST['att'])){

      $course = $_POST['whichcourse'];

      foreach ($_POST['st_status'] as $i => $st_status) {
        
        $stat_id = $_POST['stat_id'][$i];
        $dp = date('Y-m-d');
        $course = $_POST['whichcourse'];
        
        $stat = mysqli_query($mysqli,"insert into attendance(stat_id,course,st_status,stat_date) values('$stat_id','$course','$st_status','$dp')");

      }

    }
    
 ?>

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
      padding: 130px 70px 20px 70px;
      font-size: 10px;
      font-style: bold;
      text-align: center;
    }
    body{ 
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
      margin-top: 7px;
			padding: 0 5px 0 5px;
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
        <a href="../admin_dashboard.php" style="text-decoration:none;">Admin</a>
        <a href="attendance.php" style="text-decoration:none;">Attendance</a>
        <a href="view.php" style="text-decoration:none;">View</a>
        <a href="../logout.php">Logout</a>
      </div>
    </nav>


<header>

  <h2>Attendance Management System</h2>

</header>

<center>

<div class="row">

  <div class="content">
    <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
    <br>

    <center><p><?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?></p></center> 
    
    <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">

     <div class="form-group">

                <label>Enter Trade:</label>
                <select name="whichtrade" style="border-radius: 10px;" id="input1">
                  <option  value="dcst">DCST</option>
                  <option  value="dee">DEE</option>
                  <option  value="dcie">DCIE</option>
                  <option  value="denc">DENC</option>
                  <option  value="dme">DME</option>
                </select>
              
               <br>
     <input type="submit" class="save" value="Search" name="batch" />
     </div>
    </form>

    <div class="content"></div>
    <form action="" method="post">

      <div class="form-group">

        <label >Select Subject:</label>
              <select name="whichcourse" style="border-radius: 10px;" id="input1">
                <option  value="elective_1">Elective-I</option>
                <option  value="elective_2">Elective-II</option>
                <option  value="webtech">Web Technology</option>
                <option  value="webtechlab">Web Technology Lab</option>
                <option  value="soft_core">Soft-Core</option>
                <option  value="project">Major Project</option>
              </select>
      </div>
      <br>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Roll No.</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Semester</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
   <?php

    if(isset($_POST['batch'])){

     $i=0;
     $radio = 0;
     $trade = $_POST['whichtrade'];
     $all_query = mysqli_query($mysqli,"select * from student where student.dept = '$trade' order by roll_no asc");

     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     ?>
  <body>
     <tr>
       <td><?php echo $data['roll_no']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['roll_no']; ?>"> </td>
       <td><?php echo $data['std_name']; ?></td>
       <td><?php echo $data['dept']; ?></td>
       <td><?php echo $data['batch']; ?></td>
       <td><?php echo $data['sem']; ?></td>
       <td>
         <label>Present</label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" checked>
         <label>Absent </label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent" >
       </td>
     </tr>
  </body>

     <?php

        $radio++;
      } 
}
      ?>
    </table>

    <center><br>
    <input type="submit" class="save" value="Save!" name="att" />
  </center>

</form>
  </div>

</div>

</center>

</body>
</html>
